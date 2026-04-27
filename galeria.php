<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria - OSKameleon</title>
    <link rel="icon" href="image_0.png" type="image/png">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    
    <script src="script.js" defer></script>
</head>
<body class="bg-gray-50 text-gray-800 font-inter flex flex-col min-h-screen">

    <nav class="bg-white/95 backdrop-blur-sm shadow-md fixed w-full z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="index.html"><img src="image_0.png" alt="Logo OSKameleon" class="h-16 w-auto hover:scale-105 transition-transform"></a>
                </div>
                
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="index.html#dlaczego-my" class="text-gray-600 hover:text-blue-600 font-medium transition">Dlaczego my?</a>
                    <a href="oferta.html" class="text-gray-600 hover:text-blue-600 font-medium transition">Oferta</a>
                    <a href="cennik.html" class="text-gray-600 hover:text-blue-600 font-medium transition">Cennik</a>
                    
                    <a href="galeria.php" class="text-blue-600 font-bold transition">Galeria</a>
                    <a href="blog.html" class="text-gray-600 hover:text-blue-600 font-medium transition">Blog</a>
                    <a href="index.html#opinie" class="text-gray-600 hover:text-blue-600 font-medium transition">Opinie</a>
                    
                    <a href="index.html#kontakt" class="kameleon-gradient text-white px-6 py-3 rounded-full font-bold hover:shadow-lg hover:shadow-blue-500/30 transition-all hover:-translate-y-1">Zapisz się</a>
                </div>
                
                <div class="md:hidden flex items-center"><button id="mobile-menu-btn" class="text-gray-600 hover:text-blue-600 focus:outline-none"><i class="fas fa-bars text-2xl"></i></button></div>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 shadow-lg">
                <a href="index.html#dlaczego-my" class="block px-3 py-2 text-base font-medium text-gray-700">Dlaczego my?</a>
                <a href="oferta.html" class="block px-3 py-2 text-base font-medium text-gray-700">Oferta</a>
                <a href="cennik.html" class="block px-3 py-2 text-base font-medium text-gray-700">Cennik</a>
                <a href="galeria.php" class="block px-3 py-2 text-base font-bold text-blue-600 bg-blue-50">Galeria</a>
                <a href="blog.html" class="block px-3 py-2 text-base font-medium text-gray-700">Blog</a>
                <a href="index.html#opinie" class="block px-3 py-2 text-base font-medium text-gray-700">Opinie</a>
                <a href="index.html#kontakt" class="block px-3 py-2 text-base font-bold kameleon-text-gradient">Zapisz się</a>
            </div>
        </div>
    </nav>

    <header class="pt-32 pb-16 bg-gray-900 text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-20 hero-bg"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center reveal">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Nasza Galeria</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Zobacz naszych zadowolonych kursantów i flotę w akcji!</p>
        </div>
    </header>

    <main class="flex-grow py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                    // Ścieżka do folderu ze zdjęciami
                    $folder = 'zdjecia_galeria/';
                    
                    // Sprawdź czy folder istnieje
                    if (is_dir($folder)) {
                        // Pobierz pliki graficzne (wsparcie dla małych i dużych liter rozszerzeń)
                        $images = glob($folder . "*.{jpg,jpeg,png,JPG,JPEG,PNG}", GLOB_BRACE);

                        if ($images) {
                            foreach($images as $image) {
                                echo '
                                <div class="group relative aspect-[4/3] rounded-2xl overflow-hidden shadow-lg cursor-pointer reveal hover:shadow-2xl transition-all duration-300">
                                    <img src="'.$image.'" alt="Zdjęcie z galerii" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                        <p class="text-white font-bold text-lg"><span class="kameleon-text-gradient">OSKameleon</span> Galeria</p>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo '<p class="text-center col-span-3 text-gray-500 py-10">Na razie nie ma tu zdjęć. Zajrzyj wkrótce!</p>';
                        }
                    } else {
                        echo '<p class="text-center col-span-3 text-red-500 py-10">Błąd: Folder "zdjecia_galeria" nie istnieje na serwerze.</p>';
                    }
                ?>
            </div>

            <div class="mt-16 text-center reveal">
                <a href="index.html#kontakt" class="kameleon-gradient text-white px-8 py-4 rounded-full font-bold shadow-lg hover:shadow-blue-500/40 transition-all hover:-translate-y-1">
                    Dołącz do naszych kursantów!
                </a>
            </div>
        </div>
    </main>

    <footer class="bg-[#0f172a] text-gray-400 py-12 border-t border-gray-800/50 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12 text-center md:text-left">
                
                <div>
                    <h4 class="text-white font-bold text-lg mb-2">OSKameleon</h4>
                    <p class="text-xs text-gray-500 font-mono mb-4">NIP: 695 135 37 35</p>
                    
                    <p class="text-sm leading-relaxed mb-6">
                        Twoja szkoła jazdy w Legnicy i Jaworze. Profesjonalizm, spokój i nowoczesne podejście do szkolenia kierowców.
                    </p>
                    
                    <div class="p-4 bg-gray-800/50 rounded-xl border border-gray-700/50">
                        <p class="text-xs font-bold text-gray-300 uppercase mb-1">Dane do wpłat:</p>
                        <p class="text-sm text-white font-mono">Credit Agricole</p>
                        <p class="text-sm text-blue-400 font-mono font-bold tracking-wide">10 1940 1076 5172 6977 0000 0000</p>
                        <p class="text-xs text-gray-500 mt-1">Tytuł: Imię i Nazwisko + Kategoria</p>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Szybkie linki</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="Katb.html" class="hover:text-blue-500 transition flex items-center justify-center md:justify-start"><i class="fas fa-chevron-right text-xs mr-2 text-gray-600"></i> Kategoria B</a></li>
                        <li><a href="motocylke.html" class="hover:text-blue-500 transition flex items-center justify-center md:justify-start"><i class="fas fa-chevron-right text-xs mr-2 text-gray-600"></i> Motocykle</a></li>
                        <li><a href="KatAM.html" class="hover:text-blue-500 transition flex items-center justify-center md:justify-start"><i class="fas fa-chevron-right text-xs mr-2 text-gray-600"></i> Kategoria AM</a></li>
                        <li><a href="KatAMCZ.html" class="hover:text-blue-500 transition flex items-center justify-center md:justify-start"><i class="fas fa-chevron-right text-xs mr-2 text-gray-600"></i> Microcar</a></li>
                        <li class="pt-2"><a href="cennik.html" class="text-white hover:text-blue-400 transition font-bold">Zobacz Cennik</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Kontakt</h4>
                    
                    <div class="mb-4 text-sm flex flex-col items-center md:items-start">
                        <span class="text-gray-500 text-xs uppercase font-bold mb-1">Adres biura:</span>
                        <span class="text-white"><i class="fas fa-map-pin mr-2 text-lime-500"></i>ul. Armii Krajowej 12/9</span>
                        <span class="pl-6">59-400 Jawor</span>
                    </div>

                    <p class="text-sm mb-2 hover:text-white transition"><a href="tel:+48693397973"><i class="fas fa-phone mr-2 text-blue-500"></i> 693 397 973</a></p>
                    <p class="text-sm mb-6 hover:text-white transition"><a href="mailto:biuro@oskameleon.pl"><i class="fas fa-envelope mr-2 text-purple-500"></i> biuro@oskameleon.pl</a></p>
                    
                    <a href="https://www.facebook.com/OSKameleon" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-4 py-2 bg-[#1877F2] text-white text-sm font-bold rounded-full hover:bg-blue-600 transition shadow-lg hover:shadow-blue-500/30">
                        <i class="fab fa-facebook fa-lg mr-2"></i> Facebook
                    </a>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm font-medium text-gray-600 gap-4">
                <div class="flex flex-col md:flex-row gap-2 md:gap-4 text-center md:text-left">
                    <p>© 2026 Szkoła Jazdy OSKameleon.</p>
                    <span class="hidden md:inline text-gray-700">|</span>
                    <a href="https://sosinskiweb.pl" target="_blank" class="hover:text-blue-400 transition flex items-center justify-center gap-2 group">
                        Projekt i realizacja: <span class="text-gray-400 group-hover:text-white font-bold transition">SosinskiWeb</span>
                    </a>
                </div>

                <div class="flex gap-6">
                    <a href="pp.html" class="hover:text-white transition">Polityka Prywatności</a>
                    <a href="#" class="hover:text-white transition">Regulamin</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>