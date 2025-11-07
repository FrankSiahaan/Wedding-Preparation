<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success - WeddingMart</title>
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

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            
            <!-- Success Card -->
            <div class="bg-white rounded-2xl shadow-lg p-12">
                
                <!-- Success Icon with Badge -->
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <!-- Pink Badge - Simple Circle -->
                        <svg class="w-32 h-32" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Outer light pink circle -->
                            <circle cx="60" cy="60" r="55" fill="#f5b6d4"/>
                            
                            <!-- Inner darker pink circle -->
                            <circle cx="60" cy="60" r="40" fill="#ec4899"/>
                            
                            <!-- White checkmark -->
                            <path d="M45 60 L54 70 L75 48" 
                                  stroke="white" 
                                  stroke-width="6" 
                                  stroke-linecap="round" 
                                  stroke-linejoin="round" 
                                  fill="none"/>
                        </svg>
                    </div>
                </div>

                <!-- Success Message -->
                <div class="text-center">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">
                        Terimakasih telah mendaftar !
                    </h2>
                    <p class="text-sm text-gray-500 mb-8">
                        Pendaftaran Anda telah berhasil. Kami akan meninjau aplikasi Anda dan menghubungi Anda segera.
                    </p>

                    <!-- Action Button -->
                    <div class="flex justify-center gap-4">
                        <a 
                            href="/"
                            class="px-8 py-3 text-white bg-gradient-to-r from-pink-400 to-pink-500 rounded-lg hover:from-pink-500 hover:to-pink-600 transition font-medium shadow-md"
                        >
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>
