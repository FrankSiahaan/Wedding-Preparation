<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration - Verifikasi Identitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    
    <!-- Header with Logo - Fixed at top with white background -->
    <div class="bg-white border-b border-gray-200 py-4 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center">
                <svg class="w-14 h-14" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Heart shape -->
                    <path d="M40 25 C35 18, 25 18, 25 28 C25 38, 40 48, 40 48 C40 48, 55 38, 55 28 C55 18, 45 18, 40 25 Z" 
                          stroke="#B8860B" stroke-width="2" fill="none"/>
                    
                    <!-- Top ornament -->
                    <circle cx="40" cy="15" r="2" fill="#B8860B"/>
                    <line x1="40" y1="17" x2="40" y2="22" stroke="#B8860B" stroke-width="1.5"/>
                    
                    <!-- Bottom decorative swirls -->
                    <!-- Left swirl -->
                    <path d="M30 50 Q25 52, 23 56 Q22 58, 24 60" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    <path d="M23 56 Q20 58, 20 62" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    
                    <!-- Center bottom -->
                    <path d="M40 50 L40 58" stroke="#B8860B" stroke-width="1.5"/>
                    <circle cx="40" cy="60" r="2.5" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    
                    <!-- Right swirl -->
                    <path d="M50 50 Q55 52, 57 56 Q58 58, 56 60" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    <path d="M57 56 Q60 58, 60 62" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    
                    <!-- Decorative curves connecting to center -->
                    <path d="M35 50 Q37 54, 40 56" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                    <path d="M45 50 Q43 54, 40 56" stroke="#B8860B" stroke-width="1.5" fill="none"/>
                </svg>
                <div class="ml-4">
                    <h1 class="text-xl font-bold text-gray-800">WeddingMart</h1>
                    <p class="text-xs text-gray-500">Marketplace Pernikahan Terpercaya</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            
            <!-- Main Title - Center aligned -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-semibold text-gray-800 mb-2">Vendor Registration</h1>
                <p class="text-sm text-gray-500">Selesaikan Registrasi Anda</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-md p-8">
            
            <!-- Section Header -->
            <div class="mb-6">
                <h3 class="text-base font-semibold text-gray-800 mb-1">Verifikasi identitas</h3>
                <p class="text-xs text-gray-500">Buat Identitas login Anda</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                @csrf
                <!-- Vendor Info -->
                <div>
                    <label for="vendor-info" class="block text-sm font-medium text-gray-700 mb-2">
                        Vendor Info
                    </label>
                    <input 
                        type="text" 
                        id="vendor-info" 
                        name="vendor_info"
                        placeholder="Enter vendor name or business info"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                    >
                </div>

                <!-- Client Name -->
                <div>
                    <label for="client-name" class="block text-sm font-medium text-gray-700 mb-2">
                        Client Name
                    </label>
                    <input 
                        type="text" 
                        id="client-name" 
                        name="client_name"
                        placeholder="Enter client name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                    >
                </div>

                <!-- Contact Email (Full Width) -->
                <div class="bg-pink-50 border border-pink-200 rounded-md p-4">
                    <label for="contact-email" class="block text-sm font-medium text-gray-700 mb-2">
                        Contact Email
                    </label>
                    <input 
                        type="email" 
                        id="contact-email" 
                        name="contact_email"
                        placeholder="Enter email address"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition bg-white"
                    >
                    <p class="text-xs text-red-500 mt-2">Email*</p>
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone-number" class="block text-sm font-medium text-gray-700 mb-2">
                        Phone Number
                    </label>
                    <input 
                        type="tel" 
                        id="phone-number" 
                        name="phone_number"
                        placeholder="Enter phone number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                    >
                </div>

                <!-- Three Column Layout for City, Province, Postal Code -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- City 1 -->
                    <div>
                        <label for="city-1" class="block text-sm font-medium text-gray-700 mb-2">
                            City 1
                        </label>
                        <input 
                            type="text" 
                            id="city-1" 
                            name="city_1"
                            placeholder="City"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        >
                    </div>

                    <!-- Province -->
                    <div>
                        <label for="province" class="block text-sm font-medium text-gray-700 mb-2">
                            Province
                        </label>
                        <input 
                            type="text" 
                            id="province" 
                            name="province"
                            placeholder="Province"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        >
                    </div>

                    <!-- Postal Code 1 -->
                    <div>
                        <label for="postal-code-1" class="block text-sm font-medium text-gray-700 mb-2">
                            Postal Code 1
                        </label>
                        <input 
                            type="text" 
                            id="postal-code-1" 
                            name="postal_code_1"
                            placeholder="Postal Code"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        >
                    </div>
                </div>

                <!-- Two Column Layout for City 2 and Postal Code 2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- City 2 -->
                    <div>
                        <label for="city-2" class="block text-sm font-medium text-gray-700 mb-2">
                            City 2
                        </label>
                        <input 
                            type="text" 
                            id="city-2" 
                            name="city_2"
                            placeholder="City"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        >
                    </div>

                    <!-- Postal Code 2 -->
                    <div>
                        <label for="postal-code-2" class="block text-sm font-medium text-gray-700 mb-2">
                            Postal Code 2
                        </label>
                        <input 
                            type="text" 
                            id="postal-code-2" 
                            name="postal_code_2"
                            placeholder="Postal Code"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                        >
                    </div>
                </div>

                <!-- Description/Instructions -->
                <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                    <p class="text-sm text-gray-600 italic">
                        * You may submit this form here, most vendor can be INVITED
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center pt-4">
                    <button 
                        type="button"
                        class="px-6 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition font-medium"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit"
                        class="px-8 py-2 text-white bg-gradient-to-r from-pink-400 to-pink-500 rounded-md hover:from-pink-500 hover:to-pink-600 transition font-medium shadow-md"
                    >
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>