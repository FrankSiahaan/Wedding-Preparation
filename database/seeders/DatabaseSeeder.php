<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Productvariant;
use App\Models\Productattribute;
use App\Models\Productattributevalue;
use App\Models\Productvariantvalue;
use App\Models\Address;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Users
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        $user2 = User::create([
            'name' => 'Early Sembiring',
            'email' => 'early@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        $seller1 = User::create([
            'name' => 'Toko Lenni',
            'email' => 'lenni@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $seller2 = User::create([
            'name' => 'Toko Alya',
            'email' => 'alya@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);



        // Create Addresses
        Address::create([
            'user_id' => $user1->id,
            'recipient_name' => 'John Doe',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 123',
            'street' => 'Komplek Green Valley',
            'city' => 'Jakarta',
            'province' => 'DKI Jakarta',
            'postal_code' => '12345',
            'is_default' => true,
        ]);

        Address::create([
            'user_id' => $user1->id,
            'recipient_name' => 'John Doe',
            'phone' => '081234567891',
            'address' => 'Jl. Sudirman No. 456',
            'street' => 'Gedung Plaza',
            'city' => 'Bandung',
            'province' => 'Jawa Barat',
            'postal_code' => '40123',
            'is_default' => false,
        ]);

        Address::create([
            'user_id' => $user2->id,
            'recipient_name' => 'Jane Smith',
            'phone' => '082345678901',
            'address' => 'Jl. Gatot Subroto No. 789',
            'street' => 'RT 05 RW 03',
            'city' => 'Surabaya',
            'province' => 'Jawa Timur',
            'postal_code' => '60123',
            'is_default' => true,
        ]);

        // Create Vendors
        $vendor1 = Vendor::create([
            'user_id' => $seller1->id,
            'name' => 'Elegant Wedding Decorations',
            'email' => 'elegant@wedding.com',
            'phone' => '021-1234567',
            'address' => 'Jl. Wedding Street No. 1, Jakarta',
            'description' => 'Menyediakan berbagai dekorasi pernikahan yang elegan dan mewah',
            'logo' => 'vendors/elegant-logo.jpg',
        ]);

        $vendor2 = Vendor::create([
            'user_id' => $seller2->id,
            'name' => 'Premium Catering Services',
            'email' => 'premium@catering.com',
            'phone' => '021-2345678',
            'address' => 'Jl. Food Avenue No. 2, Jakarta',
            'description' => 'Layanan katering premium untuk acara pernikahan Anda',
            'logo' => 'vendors/catering-logo.jpg',
        ]);

        $vendor3 = Vendor::create([
            'user_id' => null,
            'name' => 'Professional Photography',
            'email' => 'photo@wedding.com',
            'phone' => '021-3456789',
            'address' => 'Jl. Camera Street No. 3, Jakarta',
            'description' => 'Jasa fotografi profesional untuk mengabadikan momen spesial Anda',
            'logo' => 'vendors/photo-logo.jpg',
        ]);

        // Create Categories
        $categoryClothes = Category::create([
            'name' => 'Pakaian',
            'slug' => 'pakaian',
            'description' => 'Berbagai pilihan pakaian untuk pernikahan Anda',
            'image' => 'categories/pakaian.jpg',
        ]);

        $categoryCatering = Category::create([
            'name' => 'Katering',
            'slug' => 'katering',
            'description' => 'Menu katering lezat untuk acara pernikahan',
            'image' => 'categories/catering.jpg',
        ]);

        $categoryPhoto = Category::create([
            'name' => 'Fotografi',
            'slug' => 'fotografi',
            'description' => 'Paket fotografi profesional',
            'image' => 'categories/photography.jpg',
        ]);

        $categoryVenue = Category::create([
            'name' => 'Venue',
            'slug' => 'venue',
            'description' => 'Tempat acara pernikahan yang indah',
            'image' => 'categories/venue.jpg',
        ]);

        $categoryMakeover = Category::create([
            'name' => 'Makeover',
            'slug' => 'makeover',
            'description' => 'MakeOver dan Hair style untuk pernikahan yang indah',
            'image' => 'categories/makeover.jpg',
        ]);

        // Create Products for Vendor 1 (Elegant Wedding Decorations) - 7 Products
        $product1 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryClothes->id,
            'name' => 'Gaun Pengantin Mewah Princess',
            'description' => 'Gaun pengantin model princess dengan detail payet dan kristal Swarovski. Termasuk veil dan aksesoris.',
            'price' => 15000000,
            'stock' => 10,
            'image' => 'products/baju/baju1.jpeg',
        ]);

        $product2 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryClothes->id,
            'name' => 'Gaun Pengantin Modern Minimalis',
            'description' => 'Gaun pengantin dengan desain modern minimalis yang elegant dan timeless.',
            'price' => 12000000,
            'stock' => 15,
            'image' => 'products/baju/baju2.jpeg',
        ]);

        $product3 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryClothes->id,
            'name' => 'Gaun Pengantin Muslimah Syari',
            'description' => 'Gaun pengantin muslimah dengan desain syari yang anggun dan elegan.',
            'price' => 10000000,
            'stock' => 12,
            'image' => 'products/baju/baju3.jpeg',
        ]);

        $product4 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryVenue->id,
            'name' => 'Venue Ballroom Luxury',
            'description' => 'Ballroom mewah dengan kapasitas 500 tamu. Termasuk AC, sound system, dan lighting profesional.',
            'price' => 30000000,
            'stock' => 8,
            'image' => 'products/venue/venue4.jpg',
        ]);

        $product5 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryVenue->id,
            'name' => 'Venue Garden Outdoor',
            'description' => 'Taman outdoor yang indah dengan pemandangan alam. Kapasitas hingga 300 tamu.',
            'price' => 20000000,
            'stock' => 10,
            'image' => 'products/venue/venue5.jpg',
        ]);

        $product6 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryVenue->id,
            'name' => 'Venue Hotel Bintang 5',
            'description' => 'Venue hotel bintang 5 dengan fasilitas lengkap dan pelayanan premium untuk acara pernikahan Anda.',
            'price' => 35000000,
            'stock' => 20,
            'image' => 'products/venue/venue6.jpg',
        ]);

        $product7 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryVenue->id,
            'name' => 'Venue Gedung Modern',
            'description' => 'Gedung modern dengan arsitektur kontemporer dan fasilitas lengkap untuk pernikahan Anda.',
            'price' => 25000000,
            'stock' => 8,
            'image' => 'products/venue/venue7.jpg',
        ]);

        // Create Products for Vendor 2 (Premium Catering Services) - 6 Products
        $product8 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Katering Premium 200 Pax',
            'description' => 'Menu katering premium untuk 200 orang. Termasuk appetizer, main course, dessert, dan welcome drink.',
            'price' => 25000000,
            'stock' => 20,
            'image' => 'products/katering/katering1.png',
        ]);

        $product9 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Katering Standard 100 Pax',
            'description' => 'Paket katering standar untuk 100 orang dengan menu yang lezat dan berkualitas.',
            'price' => 10000000,
            'stock' => 30,
            'image' => 'products/katering/katering2.png',
        ]);

        $product10 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Katering Deluxe 300 Pax',
            'description' => 'Paket katering deluxe untuk 300 orang dengan menu international dan live cooking station.',
            'price' => 40000000,
            'stock' => 15,
            'image' => 'products/katering/katering3.png',
        ]);

        $product11 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Prasmanan Nusantara',
            'description' => 'Paket prasmanan dengan menu nusantara pilihan untuk 150 orang.',
            'price' => 18000000,
            'stock' => 25,
            'image' => 'products/katering/katering4.png',
        ]);

        $product12 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Buffet International',
            'description' => 'Buffet dengan menu international fusion untuk 200 orang.',
            'price' => 28000000,
            'stock' => 18,
            'image' => 'products/katering/katering5.png',
        ]);

        $product13 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Snack & Dessert Bar',
            'description' => 'Paket snack box dan dessert bar lengkap untuk 200 orang.',
            'price' => 8000000,
            'stock' => 35,
            'image' => 'products/katering/katering6.png',
        ]);

        // Create Products for Vendor 3 (Professional Photography) - 5 Products
        $product14 = Product::create([
            'vendor_id' => $vendor3->id,
            'category_id' => $categoryPhoto->id,
            'name' => 'Paket Foto & Video Full Day',
            'description' => 'Paket lengkap fotografi dan videografi full day. Termasuk 2 fotografer, 2 videografer, drone, dan album premium.',
            'price' => 8000000,
            'stock' => 25,
            'image' => 'products/fotografi/fotografi1.jpg',
        ]);

        $product15 = Product::create([
            'vendor_id' => $vendor3->id,
            'category_id' => $categoryPhoto->id,
            'name' => 'Paket Foto Half Day',
            'description' => 'Paket fotografi half day dengan 1 fotografer profesional dan album digital.',
            'price' => 4000000,
            'stock' => 35,
            'image' => 'products/fotografi/fotografi2.jpg',
        ]);

        $product16 = Product::create([
            'vendor_id' => $vendor3->id,
            'category_id' => $categoryPhoto->id,
            'name' => 'Paket Pre-Wedding Indoor',
            'description' => 'Paket foto pre-wedding indoor studio dengan berbagai konsep dan kostum.',
            'price' => 3500000,
            'stock' => 40,
            'image' => 'products/fotografi/fotografi3.jpg',
        ]);

        $product17 = Product::create([
            'vendor_id' => $vendor3->id,
            'category_id' => $categoryMakeover->id,
            'name' => 'Paket Makeup Pengantin Akad',
            'description' => 'Paket makeup dan hairdo untuk acara akad nikah. Termasuk touch up dan false lashes.',
            'price' => 3500000,
            'stock' => 30,
            'image' => 'products/makeover/makeover1.jpg',
        ]);

        $product18 = Product::create([
            'vendor_id' => $vendor3->id,
            'category_id' => $categoryMakeover->id,
            'name' => 'Paket Makeup Pengantin Resepsi',
            'description' => 'Paket makeup dan hairdo untuk acara resepsi pernikahan dengan look yang glamor dan tahan lama.',
            'price' => 5000000,
            'stock' => 20,
            'image' => 'products/makeover/makeover2.jpg',
        ]);

        // Create Product Images - setiap produk punya 4 gambar unik sesuai kategori

        // Baju images untuk product 1-3 (4 gambar per produk, tidak ada duplikat)
        Productimage::create(['product_id' => $product1->id, 'image' => 'products/baju/baju1.jpeg']);
        Productimage::create(['product_id' => $product1->id, 'image' => 'products/baju/baju2.jpeg']);
        Productimage::create(['product_id' => $product1->id, 'image' => 'products/baju/baju3.jpeg']);
        Productimage::create(['product_id' => $product1->id, 'image' => 'products/baju/baju5.jpg']);

        Productimage::create(['product_id' => $product2->id, 'image' => 'products/baju/baju6.jpg']);
        Productimage::create(['product_id' => $product2->id, 'image' => 'products/baju/baju7.jpg']);
        Productimage::create(['product_id' => $product2->id, 'image' => 'products/baju/baju8.jpeg']);
        Productimage::create(['product_id' => $product2->id, 'image' => 'products/baju/baju9.jpeg']);

        Productimage::create(['product_id' => $product3->id, 'image' => 'products/baju/baju10.png']);
        Productimage::create(['product_id' => $product3->id, 'image' => 'products/baju/baju11.jpeg']);
        Productimage::create(['product_id' => $product3->id, 'image' => 'products/baju/baju12.jpeg']);
        Productimage::create(['product_id' => $product3->id, 'image' => 'products/baju/baju13.jpg']);

        // Venue images untuk product 4-7 (4 gambar per produk)
        Productimage::create(['product_id' => $product4->id, 'image' => 'products/venue/venue1.jpg']);
        Productimage::create(['product_id' => $product4->id, 'image' => 'products/venue/venue2.jpg']);
        Productimage::create(['product_id' => $product4->id, 'image' => 'products/venue/venue3.jpg']);
        Productimage::create(['product_id' => $product4->id, 'image' => 'products/venue/venue4.jpg']);

        Productimage::create(['product_id' => $product5->id, 'image' => 'products/venue/venue5.jpg']);
        Productimage::create(['product_id' => $product5->id, 'image' => 'products/venue/venue6.jpg']);
        Productimage::create(['product_id' => $product5->id, 'image' => 'products/venue/venue7.jpg']);
        Productimage::create(['product_id' => $product5->id, 'image' => 'products/venue/venue8.jpg']);

        Productimage::create(['product_id' => $product6->id, 'image' => 'products/venue/venue9.jpg']);
        Productimage::create(['product_id' => $product6->id, 'image' => 'products/venue/venue10.jpg']);
        Productimage::create(['product_id' => $product6->id, 'image' => 'products/venue/venue11.jpg']);
        Productimage::create(['product_id' => $product6->id, 'image' => 'products/venue/venue12.jpg']);

        Productimage::create(['product_id' => $product7->id, 'image' => 'products/venue/venue13.jpg']);
        Productimage::create(['product_id' => $product7->id, 'image' => 'products/venue/venue14.jpg']);
        Productimage::create(['product_id' => $product7->id, 'image' => 'products/venue/venue15.jpg']);
        Productimage::create(['product_id' => $product7->id, 'image' => 'products/baju/baju14.jpeg']);

        // Katering images untuk product 8-13 (4 gambar per produk)
        Productimage::create(['product_id' => $product8->id, 'image' => 'products/katering/katering1.png']);
        Productimage::create(['product_id' => $product8->id, 'image' => 'products/katering/katering2.png']);
        Productimage::create(['product_id' => $product8->id, 'image' => 'products/katering/katering3.png']);
        Productimage::create(['product_id' => $product8->id, 'image' => 'products/katering/katering4.png']);

        Productimage::create(['product_id' => $product9->id, 'image' => 'products/katering/katering5.png']);
        Productimage::create(['product_id' => $product9->id, 'image' => 'products/katering/katering6.png']);
        Productimage::create(['product_id' => $product9->id, 'image' => 'products/katering/katering7.png']);
        Productimage::create(['product_id' => $product9->id, 'image' => 'products/katering/katering8.png']);

        Productimage::create(['product_id' => $product10->id, 'image' => 'products/katering/katering9.png']);
        Productimage::create(['product_id' => $product10->id, 'image' => 'products/katering/katering10.png']);
        Productimage::create(['product_id' => $product10->id, 'image' => 'products/katering/katering11.png']);
        Productimage::create(['product_id' => $product10->id, 'image' => 'products/katering/katering12.png']);

        Productimage::create(['product_id' => $product11->id, 'image' => 'products/katering/katering13.png']);
        Productimage::create(['product_id' => $product11->id, 'image' => 'products/katering/katering14.png']);
        Productimage::create(['product_id' => $product11->id, 'image' => 'products/katering/katering15.png']);
        Productimage::create(['product_id' => $product11->id, 'image' => 'products/baju/baju15.jpeg']);

        Productimage::create(['product_id' => $product12->id, 'image' => 'products/fotografi/fotografi5.jpg']);
        Productimage::create(['product_id' => $product12->id, 'image' => 'products/fotografi/fotografi6.jpeg']);
        Productimage::create(['product_id' => $product12->id, 'image' => 'products/fotografi/fotografi7.jpeg']);
        Productimage::create(['product_id' => $product12->id, 'image' => 'products/fotografi/fotografi8.jpeg']);

        Productimage::create(['product_id' => $product13->id, 'image' => 'products/fotografi/fotografi9.jpeg']);
        Productimage::create(['product_id' => $product13->id, 'image' => 'products/fotografi/fotografi10.jpeg']);
        Productimage::create(['product_id' => $product13->id, 'image' => 'products/fotografi/fotografi11.jpg']);
        Productimage::create(['product_id' => $product13->id, 'image' => 'products/fotografi/fotografi12.jpg']);

        // Fotografi images untuk product 14-16 (4 gambar per produk)
        Productimage::create(['product_id' => $product14->id, 'image' => 'products/fotografi/fotografi1.jpg']);
        Productimage::create(['product_id' => $product14->id, 'image' => 'products/fotografi/fotografi2.jpg']);
        Productimage::create(['product_id' => $product14->id, 'image' => 'products/fotografi/fotografi3.jpg']);
        Productimage::create(['product_id' => $product14->id, 'image' => 'products/makeover/makeover11.jpg']);

        Productimage::create(['product_id' => $product15->id, 'image' => 'products/fotografi/fotografi13.jpg']);
        Productimage::create(['product_id' => $product15->id, 'image' => 'products/fotografi/fotografi14.jpg']);
        Productimage::create(['product_id' => $product15->id, 'image' => 'products/fotografi/fotografi15.jpg']);
        Productimage::create(['product_id' => $product15->id, 'image' => 'products/makeover/makeover12.jpeg']);

        Productimage::create(['product_id' => $product16->id, 'image' => 'products/makeover/makeover13.jpg']);
        Productimage::create(['product_id' => $product16->id, 'image' => 'products/makeover/makeover14.jpg']);
        Productimage::create(['product_id' => $product16->id, 'image' => 'products/makeover/makeover15.jpeg']);
        Productimage::create(['product_id' => $product16->id, 'image' => 'products/venue/venue1.jpg']);

        // Makeover images untuk product 17-18 (4 gambar per produk)
        Productimage::create(['product_id' => $product17->id, 'image' => 'products/makeover/makeover1.jpg']);
        Productimage::create(['product_id' => $product17->id, 'image' => 'products/makeover/makeover2.jpg']);
        Productimage::create(['product_id' => $product17->id, 'image' => 'products/makeover/makeover3.jpeg']);
        Productimage::create(['product_id' => $product17->id, 'image' => 'products/makeover/makeover4.jpg']);

        Productimage::create(['product_id' => $product18->id, 'image' => 'products/makeover/makeover5.jpg']);
        Productimage::create(['product_id' => $product18->id, 'image' => 'products/makeover/makeover6.jpeg']);
        Productimage::create(['product_id' => $product18->id, 'image' => 'products/makeover/makeover7.jpeg']);
        Productimage::create(['product_id' => $product18->id, 'image' => 'products/makeover/makeover8.jpeg']);

        // Create Product Attributes for Product 1 (Gaun Pengantin)
        $attrColor1 = Productattribute::create([
            'product_id' => $product1->id,
            'name' => 'Warna Gaun'
        ]);
        $attrSize1 = Productattribute::create([
            'product_id' => $product1->id,
            'name' => 'Ukuran'
        ]);

        // Create Attribute Values
        $colorWhite = Productattributevalue::create([
            'attribute_id' => $attrColor1->id,
            'value' => 'Putih Gading',
        ]);
        $colorPink = Productattributevalue::create([
            'attribute_id' => $attrColor1->id,
            'value' => 'Soft Pink',
        ]);
        $colorGold = Productattributevalue::create([
            'attribute_id' => $attrColor1->id,
            'value' => 'Champagne Gold',
        ]);

        $sizeSmall = Productattributevalue::create([
            'attribute_id' => $attrSize1->id,
            'value' => 'S (Small)',
        ]);
        $sizeMedium = Productattributevalue::create([
            'attribute_id' => $attrSize1->id,
            'value' => 'M (Medium)',
        ]);
        $sizeLarge = Productattributevalue::create([
            'attribute_id' => $attrSize1->id,
            'value' => 'L (Large)',
        ]);

        // Create Product Variants for Product 1 (Gaun Pengantin)
        $variant1 = Productvariant::create([
            'product_id' => $product1->id,
            'sku' => 'GAUN-PRINCESS-WHITE-M',
            'price' => 15000000,
            'stock' => 5,
        ]);

        Productvariantvalue::create([
            'variant_id' => $variant1->id,
            'value_id' => $colorWhite->id,
        ]);
        Productvariantvalue::create([
            'variant_id' => $variant1->id,
            'value_id' => $sizeMedium->id,
        ]);

        $variant2 = Productvariant::create([
            'product_id' => $product1->id,
            'sku' => 'GAUN-PRINCESS-PINK-M',
            'price' => 15500000,
            'stock' => 5,
        ]);

        Productvariantvalue::create([
            'variant_id' => $variant2->id,
            'value_id' => $colorPink->id,
        ]);
        Productvariantvalue::create([
            'variant_id' => $variant2->id,
            'value_id' => $sizeMedium->id,
        ]);

        // Create Product Attributes for Product 3 (Gaun Muslimah)
        $attrStyle = Productattribute::create([
            'product_id' => $product3->id,
            'name' => 'Model Hijab'
        ]);
        $attrSize3 = Productattribute::create([
            'product_id' => $product3->id,
            'name' => 'Ukuran'
        ]);

        $styleTraditional = Productattributevalue::create([
            'attribute_id' => $attrStyle->id,
            'value' => 'Hijab Traditional',
        ]);
        $styleModern = Productattributevalue::create([
            'attribute_id' => $attrStyle->id,
            'value' => 'Hijab Modern',
        ]);

        $size3Small = Productattributevalue::create([
            'attribute_id' => $attrSize3->id,
            'value' => 'S (Small)',
        ]);
        $size3Medium = Productattributevalue::create([
            'attribute_id' => $attrSize3->id,
            'value' => 'M (Medium)',
        ]);

        // Create variants for gaun muslimah
        $variant3 = Productvariant::create([
            'product_id' => $product3->id,
            'sku' => 'GAUN-MUSLIMAH-TRAD-M',
            'price' => 10000000,
            'stock' => 6,
        ]);

        Productvariantvalue::create([
            'variant_id' => $variant3->id,
            'value_id' => $styleTraditional->id,
        ]);
        Productvariantvalue::create([
            'variant_id' => $variant3->id,
            'value_id' => $size3Medium->id,
        ]);

        $variant4 = Productvariant::create([
            'product_id' => $product3->id,
            'sku' => 'GAUN-MUSLIMAH-MOD-M',
            'price' => 10500000,
            'stock' => 6,
        ]);

        Productvariantvalue::create([
            'variant_id' => $variant4->id,
            'value_id' => $styleModern->id,
        ]);
        Productvariantvalue::create([
            'variant_id' => $variant4->id,
            'value_id' => $size3Medium->id,
        ]);

        // Create Product Attributes for Product 8 (Katering)
        $attrMenu = Productattribute::create([
            'product_id' => $product8->id,
            'name' => 'Jenis Menu'
        ]);

        $menuIndo = Productattributevalue::create([
            'attribute_id' => $attrMenu->id,
            'value' => 'Menu Indonesia',
        ]);
        $menuWestern = Productattributevalue::create([
            'attribute_id' => $attrMenu->id,
            'value' => 'Menu Western',
        ]);
        $menuFusion = Productattributevalue::create([
            'attribute_id' => $attrMenu->id,
            'value' => 'Menu Fusion',
        ]);

        // Create variants for katering
        $variant5 = Productvariant::create([
            'product_id' => $product8->id,
            'sku' => 'KATERING-INDO-200',
            'price' => 25000000,
            'stock' => 10,
        ]);

        Productvariantvalue::create([
            'variant_id' => $variant5->id,
            'value_id' => $menuIndo->id,
        ]);

        $variant6 = Productvariant::create([
            'product_id' => $product8->id,
            'sku' => 'KATERING-WESTERN-200',
            'price' => 27000000,
            'stock' => 10,
        ]);

        Productvariantvalue::create([
            'variant_id' => $variant6->id,
            'value_id' => $menuWestern->id,
        ]);

        // Create Reviews
        Review::create([
            'product_id' => $product1->id,
            'user_id' => $user1->id,
            'rating' => 5,
            'comment' => 'Gaun pengantin yang sangat indah! Detail payet dan kristalnya luar biasa. Terima kasih!',
        ]);

        Review::create([
            'product_id' => $product1->id,
            'user_id' => $user2->id,
            'rating' => 4,
            'comment' => 'Gaun bagus dan sesuai ekspektasi. Ukurannya pas dan nyaman dipakai.',
        ]);

        Review::create([
            'product_id' => $product2->id,
            'user_id' => $user1->id,
            'rating' => 5,
            'comment' => 'Gaun minimalis yang sangat elegan dan timeless. Perfect untuk pernikahan saya!',
        ]);

        Review::create([
            'product_id' => $product8->id,
            'user_id' => $user1->id,
            'rating' => 5,
            'comment' => 'Makanan enak dan pelayanan ramah. Tamu undangan sangat puas!',
        ]);

        Review::create([
            'product_id' => $product9->id,
            'user_id' => $user2->id,
            'rating' => 4,
            'comment' => 'Katering yang bagus dengan harga terjangkau. Recommended!',
        ]);

        Review::create([
            'product_id' => $product14->id,
            'user_id' => $user2->id,
            'rating' => 5,
            'comment' => 'Hasil foto dan video sangat memuaskan. Fotografer profesional dan kreatif!',
        ]);

        Review::create([
            'product_id' => $product14->id,
            'user_id' => $user1->id,
            'rating' => 5,
            'comment' => 'Tim fotografer sangat ramah dan profesional. Hasilnya luar biasa!',
        ]);

        Review::create([
            'product_id' => $product4->id,
            'user_id' => $user2->id,
            'rating' => 5,
            'comment' => 'Venue ballroom yang mewah dan megah. Sangat puas!',
        ]);

        $this->command->info('Data dummy berhasil dibuat!');
        $this->command->info('Total Vendor: 3');
        $this->command->info('- Vendor 1: 7 produk (3 Pakaian + 4 Venue)');
        $this->command->info('- Vendor 2: 6 produk (Katering)');
        $this->command->info('- Vendor 3: 5 produk (3 Fotografi + 2 Makeover)');
        $this->command->info('Total Produk: 18 produk');
        $this->command->info('Kategori: Pakaian, Venue, Katering, Fotografi, Makeover');
    }
}
