<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Show vendor login form
     */
    public function showLoginForm()
    {
        // If already logged in as vendor, redirect to dashboard
        if (Auth::check() && Auth::user()->role === 'admin' && Auth::user()->vendor) {
            return redirect()->route('vendor.dashboard');
        }

        return view('auth-vendor.login_vendor');
    }

    /**
     * Handle vendor login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists, has admin role, and password is correct
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan.',
            ])->withInput($request->only('email'));
        }

        if ($user->role !== 'admin') {
            return back()->withErrors([
                'email' => 'Akun Anda tidak memiliki akses vendor. Silakan login sebagai customer.',
            ])->withInput($request->only('email'));
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->withInput($request->only('email'));
        }

        // Check if user has vendor profile, create if not exists
        if (!$user->vendor) {
            // Create vendor profile automatically for admin user
            Vendor::create([
                'user_id' => $user->id,
                'name' => $user->name . ' Store',
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => 'Alamat belum diatur',
                'description' => 'Deskripsi toko belum diatur. Silakan update profil vendor Anda.',
            ]);

            // Refresh user to load the new vendor relationship
            $user->refresh();
        }

        // Login the user
        Auth::login($user, $request->filled('remember'));

        $request->session()->regenerate();

        return redirect()->intended(route('vendor.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('vendor.login');
    }

    /**
     * Display vendor store page with products
     */
    public function show($id)
    {
        // Load vendor with products and calculate stats from actual database relations
        $vendor = Vendor::with(['products' => function ($query) {
            $query->with(['images', 'reviews', 'orderitems'])->where('is_active', 1);
        }])->findOrFail($id);

        // Calculate vendor stats from actual relations
        $totalProducts = $vendor->products->count();

        // Calculate total sold from orderitems
        $totalSold = $vendor->products->sum(function ($product) {
            return $product->orderitems->sum('quantity');
        });

        // Calculate average rating from reviews
        $allRatings = $vendor->products->flatMap(function ($product) {
            return $product->reviews->pluck('rating');
        });
        $avgRating = $allRatings->count() > 0 ? $allRatings->avg() : 0;

        // Calculate total reviews
        $totalReviews = $vendor->products->sum(function ($product) {
            return $product->reviews->count();
        });

        // Get products with sorting
        $sortBy = request('sort', 'newest');
        $products = $vendor->products()
            ->with(['images', 'reviews', 'orderitems'])
            ->where('is_active', true);

        switch ($sortBy) {
            case 'price_low':
                $products = $products->orderBy('price', 'asc');
                break;
            case 'price_high':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'best_seller':
                // Sort by total sold calculated from orderitems
                $products = $products->withSum('orderitems', 'quantity')
                    ->orderBy('orderitems_sum_quantity', 'desc');
                break;
            case 'rating':
                // Sort by average rating calculated from reviews
                $products = $products->withAvg('reviews', 'rating')
                    ->orderBy('reviews_avg_rating', 'desc');
                break;
            default:
                $products = $products->orderBy('created_at', 'desc');
        }

        $products = $products->paginate(12)->through(function ($product) {
            // Add calculated stats to each product for display
            $product->avg_rating = $product->reviews->count() > 0
                ? $product->reviews->avg('rating')
                : 0;
            $product->total_review = $product->reviews->count();
            $product->total_sold = $product->orderitems->sum('quantity');
            return $product;
        });

        return view('product.kunjungitoko', compact(
            'vendor',
            'products',
            'totalProducts',
            'totalSold',
            'avgRating',
            'totalReviews'
        ));
    }

    /**
     * Display vendor dashboard for admin users
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Get or create vendor profile for this admin user
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan. Silakan hubungi administrator.');
        }

        // Load vendor products with relations
        $products = $vendor->products()
            ->with(['images', 'reviews', 'orderitems'])
            ->get();

        // Calculate vendor statistics
        $totalProducts = $products->count();
        $activeProducts = $products->where('is_active', true)->count();

        // Calculate total sold from orderitems
        $totalSold = $products->sum(function ($product) {
            return $product->orderitems->sum('quantity');
        });

        // Calculate total revenue from orderitems
        $totalRevenue = $products->sum(function ($product) {
            return $product->orderitems->sum(function ($item) {
                return $item->quantity * $item->price;
            });
        });

        // Calculate average rating from reviews
        $allRatings = $products->flatMap(function ($product) {
            return $product->reviews->pluck('rating');
        });
        $avgRating = $allRatings->count() > 0 ? $allRatings->avg() : 0;

        // Calculate total reviews
        $totalReviews = $products->sum(function ($product) {
            return $product->reviews->count();
        });

        // Get recent products (last 5)
        $recentProducts = $products->sortByDesc('created_at')->take(5);

        // Get recent orders (last 10)
        $recentOrders = \App\Models\Orderitems::with(['transaction.user', 'product'])
            ->whereHas('product', function ($q) use ($vendor) {
                $q->where('vendor_id', $vendor->id);
            })
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('vendor.dashboard', compact(
            'vendor',
            'products',
            'totalProducts',
            'activeProducts',
            'totalSold',
            'totalRevenue',
            'avgRating',
            'totalReviews',
            'recentProducts',
            'recentOrders'
        ));
    }

    /**
     * Display vendor products management page
     */
    public function products()
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        $products = $vendor->products()
            ->with(['images', 'category', 'variants'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('vendor.products', compact('vendor', 'products'));
    }

    /**
     * Show form to create new product
     */
    public function createProduct()
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        $categories = \App\Models\Category::all();

        return view('vendor.product-form', compact('vendor', 'categories'));
    }

    /**
     * Store new product
     */
    public function storeProduct(Request $request)
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'boolean',
            'images' => 'required|array|min:1|max:5',
            'images.*' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'images.required' => 'Minimal 1 foto produk harus diupload.',
            'images.min' => 'Minimal 1 foto produk harus diupload.',
            'images.max' => 'Maksimal 5 foto yang dapat diupload.',
            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Gambar harus berformat: jpeg, jpg, atau png.',
            'images.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Create product
        $product = $vendor->products()->create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'product_id' => $product->id,
                    'image' => $path
                ]);
            }
        }

        // DEBUG: Log all request data
        \Log::info('=== PRODUCT STORE DEBUG ===');
        \Log::info('All request data:', $request->all());
        \Log::info('Has attributes:', [$request->has('attributes'), is_array($request->get('attributes'))]);
        \Log::info('Has variants:', [$request->has('variants'), is_array($request->get('variants'))]);

        // Handle product variants
        if ($request->has('attributes') && is_array($request->input('attributes'))) {
            \Log::info('Attributes received:', $request->input('attributes'));

            // Track attribute names to avoid duplicates
            $processedAttributeNames = [];

            foreach ($request->input('attributes') as $attributeData) {
                if (!empty($attributeData['name']) && !empty($attributeData['values'])) {
                    $attributeName = trim($attributeData['name']);

                    // Skip if attribute name already processed for this product
                    if (in_array(strtolower($attributeName), $processedAttributeNames)) {
                        \Log::warning('Skipping duplicate attribute:', ['name' => $attributeName]);
                        continue;
                    }

                    // Create attribute
                    $attribute = $product->attributes()->create([
                        'name' => $attributeName
                    ]);

                    $processedAttributeNames[] = strtolower($attributeName);

                    // Create attribute values
                    $values = explode(',', $attributeData['values']);
                    foreach ($values as $value) {
                        $value = trim($value);
                        if (!empty($value)) {
                            $attribute->values()->create([
                                'value' => $value
                            ]);
                        }
                    }
                }
            }
        } else {
            \Log::info('No attributes in request or not an array');
        }

        // Handle variant combinations
        if ($request->has('variants') && is_array($request->input('variants'))) {
            \Log::info('Variants received:', $request->input('variants'));

            foreach ($request->input('variants') as $variantData) {
                if (!empty($variantData['sku'])) {
                    // Create variant
                    $variant = $product->variants()->create([
                        'sku' => $variantData['sku'],
                        'price' => $variantData['price'] ?? $product->price,
                        'stock' => $variantData['stock'] ?? 0,
                    ]);

                    \Log::info('Variant created:', ['id' => $variant->id, 'sku' => $variant->sku]);

                    // Link variant to attribute values
                    if (isset($variantData['attributes']) && is_array($variantData['attributes'])) {
                        foreach ($variantData['attributes'] as $attrData) {
                            // Find the attribute value by name and value
                            $attribute = $product->attributes()->where('name', $attrData['name'])->first();
                            if ($attribute) {
                                $attributeValue = $attribute->values()->where('value', $attrData['value'])->first();
                                if ($attributeValue) {
                                    $variant->variantvalues()->create([
                                        'value_id' => $attributeValue->id
                                    ]);
                                    \Log::info('Variant value linked:', ['variant_id' => $variant->id, 'value_id' => $attributeValue->id]);
                                }
                            }
                        }
                    }
                }
            }
        } else {
            \Log::info('No variants in request or not an array');
        }

        return redirect()->route('vendor.products')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Show form to edit product
     */
    public function editProduct($id)
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        $product = $vendor->products()
            ->with(['images', 'category', 'attributes.values', 'variants.attributeValues'])
            ->findOrFail($id);
        $categories = \App\Models\Category::all();

        return view('vendor.product-form', compact('vendor', 'product', 'categories'));
    }

    /**
     * Update product
     */
    public function updateProduct(Request $request, $id)
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        $product = $vendor->products()->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'boolean',
            'images' => 'nullable|array|max:5',
            'images.*' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'images.max' => 'Maksimal 5 foto yang dapat diupload.',
            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Gambar harus berformat: jpeg, jpg, atau png.',
            'images.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Update product data
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        // Handle new image uploads (optional when editing)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'product_id' => $product->id,
                    'image' => $path
                ]);
            }
        }

        // DEBUG: Log all request data for update
        \Log::info('=== PRODUCT UPDATE DEBUG ===');
        \Log::info('Product ID:', [$product->id]);
        \Log::info('All request data:', $request->all());
        \Log::info('Has attributes:', [$request->has('attributes'), is_array($request->get('attributes'))]);
        \Log::info('Has variants:', [$request->has('variants'), is_array($request->get('variants'))]);

        // Handle product variants update
        if ($request->has('attributes') && is_array($request->input('attributes'))) {
            // Delete old attributes and variants
            foreach ($product->attributes as $oldAttribute) {
                $oldAttribute->values()->delete();
                $oldAttribute->delete();
            }
            foreach ($product->variants as $oldVariant) {
                $oldVariant->variantvalues()->delete();
                $oldVariant->delete();
            }

            // Create new attributes
            $processedAttributeNames = [];

            foreach ($request->input('attributes') as $attributeData) {
                if (!empty($attributeData['name']) && !empty($attributeData['values'])) {
                    $attributeName = trim($attributeData['name']);

                    // Skip if attribute name already processed
                    if (in_array(strtolower($attributeName), $processedAttributeNames)) {
                        \Log::warning('Skipping duplicate attribute in update:', ['name' => $attributeName]);
                        continue;
                    }

                    $attribute = $product->attributes()->create([
                        'name' => $attributeName
                    ]);

                    $processedAttributeNames[] = strtolower($attributeName);

                    $values = explode(',', $attributeData['values']);
                    foreach ($values as $value) {
                        $value = trim($value);
                        if (!empty($value)) {
                            $attribute->values()->create([
                                'value' => $value
                            ]);
                        }
                    }
                }
            }

            // Create new variant combinations
            if ($request->has('variants') && is_array($request->input('variants'))) {
                foreach ($request->input('variants') as $variantData) {
                    if (!empty($variantData['sku'])) {
                        $variant = $product->variants()->create([
                            'sku' => $variantData['sku'],
                            'price' => $variantData['price'] ?? $product->price,
                            'stock' => $variantData['stock'] ?? 0,
                        ]);

                        if (isset($variantData['attributes']) && is_array($variantData['attributes'])) {
                            foreach ($variantData['attributes'] as $attrData) {
                                $attribute = $product->attributes()->where('name', $attrData['name'])->first();
                                if ($attribute) {
                                    $attributeValue = $attribute->values()->where('value', $attrData['value'])->first();
                                    if ($attributeValue) {
                                        $variant->variantvalues()->create([
                                            'value_id' => $attributeValue->id
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('vendor.products')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Delete product
     */
    public function deleteProduct($id)
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        $product = $vendor->products()->findOrFail($id);

        // Delete images from storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $product->delete();

        return redirect()->route('vendor.products')->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Delete product image
     */
    public function deleteProductImage($id)
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return response()->json(['success' => false, 'message' => 'Vendor tidak ditemukan'], 403);
        }

        // Find the image and verify it belongs to vendor's product
        $image = \App\Models\Productimage::findOrFail($id);
        $product = $image->product;

        if ($product->vendor_id !== $vendor->id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        // Check if this is the last image
        if ($product->images()->count() <= 1) {
            return response()->json(['success' => false, 'message' => 'Tidak dapat menghapus gambar terakhir'], 400);
        }

        // Delete from storage
        Storage::disk('public')->delete($image->image);

        // Delete from database
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Gambar berhasil dihapus']);
    }

    /**
     * Show vendor profile edit page
     */
    public function profile()
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        return view('vendor.profile', compact('vendor'));
    }

    /**
     * Update vendor profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($vendor->logo) {
                Storage::disk('public')->delete($vendor->logo);
            }
            $validated['logo'] = $request->file('logo')->store('vendors', 'public');
        }

        $vendor->update($validated);

        return redirect()->route('vendor.profile')->with('success', 'Profil berhasil diupdate!');
    }

    /**
     * Display booking requests
     */
    public function bookings()
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        // Get transactions that contain vendor's products
        $query = \App\Models\Transaction::with(['orderitems.product.images', 'orderitems.variant', 'user', 'address'])
            ->whereHas('orderitems', function ($q) use ($vendor) {
                $q->whereHas('product', function ($q2) use ($vendor) {
                    $q2->where('vendor_id', $vendor->id);
                });
            });

        // Filter by order status if provided
        if (request('status')) {
            $query->where('oder_status', request('status'));
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('vendor.bookings', compact('vendor', 'orders'));
    }

    public function bookingDetail($id)
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'Profil vendor tidak ditemukan.');
        }

        // Get transaction with vendor's products only
        $transaction = \App\Models\Transaction::with([
            'orderitems' => function ($q) use ($vendor) {
                $q->whereHas('product', function ($q2) use ($vendor) {
                    $q2->where('vendor_id', $vendor->id);
                })->with(['product.images', 'variant.attributeValues.attribute']);
            },
            'user',
            'address'
        ])
            ->whereHas('orderitems', function ($q) use ($vendor) {
                $q->whereHas('product', function ($q2) use ($vendor) {
                    $q2->where('vendor_id', $vendor->id);
                });
            })
            ->findOrFail($id);

        return view('vendor.booking-detail', compact('vendor', 'transaction'));
    }
}
