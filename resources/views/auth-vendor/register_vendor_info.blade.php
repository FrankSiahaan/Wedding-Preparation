<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="text-center mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-1">Vendor Registration</h2>
                <p class="text-sm text-gray-500">Complete the registration form</p>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-md">
                    <p class="text-sm text-green-600">{{ session('success') }}</p>
                </div>
            @endif

            <form action="#" method="POST" class="space-y-6">
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
                        value="{{ old('vendor_info') }}"
                        placeholder="Enter vendor name or business info"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('vendor_info') border-red-500 @enderror"
                    >
                    @error('vendor_info')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
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
                        value="{{ old('client_name') }}"
                        placeholder="Enter client name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('client_name') border-red-500 @enderror"
                    >
                    @error('client_name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
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
                        value="{{ old('contact_email') }}"
                        placeholder="Enter email address"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition bg-white @error('contact_email') border-red-500 @enderror"
                    >
                    <p class="text-xs text-red-500 mt-2">Email*</p>
                    @error('contact_email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
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
                        value="{{ old('phone_number') }}"
                        placeholder="Enter phone number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('phone_number') border-red-500 @enderror"
                    >
                    @error('phone_number')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
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
                            value="{{ old('city_1') }}"
                            placeholder="City"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('city_1') border-red-500 @enderror"
                        >
                        @error('city_1')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
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
                            value="{{ old('province') }}"
                            placeholder="Province"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('province') border-red-500 @enderror"
                        >
                        @error('province')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
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
                            value="{{ old('postal_code_1') }}"
                            placeholder="Postal Code"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('postal_code_1') border-red-500 @enderror"
                        >
                        @error('postal_code_1')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
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
                            value="{{ old('city_2') }}"
                            placeholder="City"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('city_2') border-red-500 @enderror"
                        >
                        @error('city_2')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
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
                            value="{{ old('postal_code_2') }}"
                            placeholder="Postal Code"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('postal_code_2') border-red-500 @enderror"
                        >
                        @error('postal_code_2')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
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
                    <a 
                        href="{{ url('/') }}"
                        class="px-6 py-2 text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition font-medium"
                    >
                        Cancel
                    </a>
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
</div>
