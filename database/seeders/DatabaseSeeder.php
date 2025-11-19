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
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
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
            'user_id' => null,
            'name' => 'Elegant Wedding Decorations',
            'email' => 'elegant@wedding.com',
            'phone' => '021-1234567',
            'address' => 'Jl. Wedding Street No. 1, Jakarta',
            'description' => 'Menyediakan berbagai dekorasi pernikahan yang elegan dan mewah',
            'logo' => 'vendors/elegant-logo.jpg',
        ]);

        $vendor2 = Vendor::create([
            'user_id' => null,
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
        $categoryDecor = Category::create([
            'name' => 'Dekorasi',
            'slug' => 'dekorasi',
            'description' => 'Berbagai pilihan dekorasi untuk pernikahan Anda',
            'image' => 'categories/decoration.jpg',
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

        // Create Products - Decoration
        $product1 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryDecor->id,
            'name' => 'Paket Dekorasi Premium Garden',
            'description' => 'Paket dekorasi lengkap dengan tema garden untuk pernikahan outdoor. Termasuk pelaminan, backdrop, meja tamu, dan dekorasi meja.',
            'price' => 15000000,
            'stock' => 10,
            'image' => 'products/decor-garden.jpg',
        ]);

        $product2 = Product::create([
            'vendor_id' => $vendor1->id,
            'category_id' => $categoryDecor->id,
            'name' => 'Paket Dekorasi Classic Indoor',
            'description' => 'Dekorasi klasik elegant untuk pernikahan indoor. Dilengkapi dengan lighting profesional dan flower arrangement.',
            'price' => 12000000,
            'stock' => 15,
            'image' => 'products/decor-classic.jpg',
        ]);

        // Create Products - Catering
        $product3 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Katering Premium 200 Pax',
            'description' => 'Menu katering premium untuk 200 orang. Termasuk appetizer, main course, dessert, dan welcome drink.',
            'price' => 25000000,
            'stock' => 20,
            'image' => 'products/catering-premium.jpg',
        ]);

        $product4 = Product::create([
            'vendor_id' => $vendor2->id,
            'category_id' => $categoryCatering->id,
            'name' => 'Paket Katering Standard 100 Pax',
            'description' => 'Paket katering standar untuk 100 orang dengan menu yang lezat dan berkualitas.',
            'price' => 10000000,
            'stock' => 30,
            'image' => 'products/catering-standard.jpg',
        ]);

        // Create Products - Photography
        $product5 = Product::create([
            'vendor_id' => $vendor3->id,
            'category_id' => $categoryPhoto->id,
            'name' => 'Paket Foto & Video Full Day',
            'description' => 'Paket lengkap fotografi dan videografi full day. Termasuk 2 fotografer, 2 videografer, drone, dan album premium.',
            'price' => 8000000,
            'stock' => 25,
            'image' => 'products/photo-fullday.jpg',
        ]);

        $product6 = Product::create([
            'vendor_id' => $vendor3->id,
            'category_id' => $categoryPhoto->id,
            'name' => 'Paket Foto Half Day',
            'description' => 'Paket fotografi half day dengan 1 fotografer profesional dan album digital.',
            'price' => 4000000,
            'stock' => 35,
            'image' => 'products/photo-halfday.jpg',
        ]);

        // Create Product Images
        $products = [$product1, $product2, $product3, $product4, $product5, $product6];
        foreach ($products as $product) {
            for ($i = 1; $i <= 3; $i++) {
                Productimage::create([
                    'product_id' => $product->id,
                    'image' => "products/{$product->id}-image-{$i}.jpg",
                ]);
            }
        }

        // Create Product Attributes for Product 1 (Decoration)
        $attrColor1 = Productattribute::create([
            'product_id' => $product1->id,
            'name' => 'Warna Tema'
        ]);
        $attrSize1 = Productattribute::create([
            'product_id' => $product1->id,
            'name' => 'Ukuran Acara'
        ]);

        // Create Attribute Values
        $colorWhite = Productattributevalue::create([
            'attribute_id' => $attrColor1->id,
            'value' => 'Putih Gold',
        ]);
        $colorPink = Productattributevalue::create([
            'attribute_id' => $attrColor1->id,
            'value' => 'Pink Soft',
        ]);
        $colorBlue = Productattributevalue::create([
            'attribute_id' => $attrColor1->id,
            'value' => 'Biru Tosca',
        ]);

        $sizeSmall = Productattributevalue::create([
            'attribute_id' => $attrSize1->id,
            'value' => 'Small (50-100 pax)',
        ]);
        $sizeMedium = Productattributevalue::create([
            'attribute_id' => $attrSize1->id,
            'value' => 'Medium (100-200 pax)',
        ]);
        $sizeLarge = Productattributevalue::create([
            'attribute_id' => $attrSize1->id,
            'value' => 'Large (200+ pax)',
        ]);

        // Create Product Variants for Product 1
        $variant1 = Productvariant::create([
            'product_id' => $product1->id,
            'sku' => 'DECOR-GARDEN-WHITE-MED',
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
            'sku' => 'DECOR-GARDEN-PINK-MED',
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

        // Create Product Attributes for Product 3 (Catering)
        $attrMenu = Productattribute::create([
            'product_id' => $product3->id,
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

        // Create variants for catering
        $variant3 = Productvariant::create([
            'product_id' => $product3->id,
            'sku' => 'CATERING-INDO-200',
            'price' => 25000000,
            'stock' => 10,
        ]);

        Productvariantvalue::create([
            'variant_id' => $variant3->id,
            'value_id' => $menuIndo->id,
        ]);

        // Create Reviews
        Review::create([
            'product_id' => $product1->id,
            'user_id' => $user1->id,
            'rating' => 5,
            'comment' => 'Dekorasi sangat indah dan sesuai dengan tema yang kami inginkan. Vendor sangat profesional!',
        ]);

        Review::create([
            'product_id' => $product1->id,
            'user_id' => $user2->id,
            'rating' => 4,
            'comment' => 'Bagus, hanya saja setup agak lama. Overall puas dengan hasilnya.',
        ]);

        Review::create([
            'product_id' => $product3->id,
            'user_id' => $user1->id,
            'rating' => 5,
            'comment' => 'Makanan enak dan pelayanan ramah. Tamu undangan sangat puas!',
        ]);

        Review::create([
            'product_id' => $product5->id,
            'user_id' => $user2->id,
            'rating' => 5,
            'comment' => 'Hasil foto dan video sangat memuaskan. Fotografer profesional dan kreatif!',
        ]);

        $this->command->info('Data dummy berhasil dibuat!');
    }
}
