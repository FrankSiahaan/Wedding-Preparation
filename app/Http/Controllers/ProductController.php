<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function home()
    {
        $categories = Category::withCount('products')->get();
        $featuredProducts = $this->productRepository->getAll()
            ->take(6)
            ->load(['images', 'reviews', 'vendor']);

        return view('product.homepageafterlogin', compact('categories', 'featuredProducts'));
    }


    public function index(Request $request)
    {
        // $products = $this->productRepository->getAll();
        // $categories = Category::all();
        $url = 'http://api-product.test/api/products';

        // Tambahkan parameter category jika ada
        if ($request->has('category')) {
            $url .= '?category=' . $request->get('category');
        }

        $response = Http::get($url);

        // Convert array to collection of objects
        $products = $response->json()['products'];

        $categories = $response->json()['category'];

        return view('product.daftarproduct', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.tambah_produk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'venue_type' => 'nullable|string',
            'capacity' => 'nullable|integer',
            'location' => 'nullable|string',
            'facilities' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
            'status' => 'nullable|boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // Convert facilities array to JSON
        if (isset($validated['facilities'])) {
            $validated['facilities'] = json_encode($validated['facilities']);
        }

        // Set default status if not provided
        $validated['status'] = $request->has('status') ? true : false;

        Product::create($validated);

        return redirect()
            ->route('vendor.kelola_produk')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('vendor.product_detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Decode facilities JSON to array
        if ($product->facilities) {
            $product->facilities = json_decode($product->facilities, true);
        }

        return view('auth.edit_produk', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'venue_type' => 'nullable|string',
            'capacity' => 'nullable|integer',
            'location' => 'nullable|string',
            'facilities' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:10240',
            'status' => 'nullable|boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        // Convert facilities array to JSON
        if (isset($validated['facilities'])) {
            $validated['facilities'] = json_encode($validated['facilities']);
        }

        // Set status
        $validated['status'] = $request->has('status') ? true : false;

        $product->update($validated);

        return redirect()
            ->route('vendor.kelola_produk')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete image if exists
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('vendor.kelola_produk')
            ->with('success', 'Produk berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $products = $this->productRepository->getProductBySearch($request->input('search'));
        $categories = Category::all();
        return view('product.daftarproductfilter', compact('products', 'categories'));
    }

    public function filter(Request $request)
    {
        $filterData = [
            'kategori' => $request->input('kategori'),
            'lokasi' => $request->input('lokasi'),
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
        ];

        $products = $this->productRepository->getProductByFilter($filterData);
        $categories = Category::all();
        return view('product.daftarproductfilter', compact('products', 'categories'));
    }

    public function cart()
    {
        //
    }

    public function detail(Request $request)
    {
        $detail = $this->productRepository->getDetailProductById($request->id);
        return view('product.detailproduct', compact('detail'));
    }
}
