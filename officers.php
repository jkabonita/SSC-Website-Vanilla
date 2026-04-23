<?php
session_start();
require_once "config/database.php";
$page_title       = 'Officers - CSPC Supreme Student Council';
$page_description = 'Meet the dedicated student leaders who serve the CSPC community with passion, integrity, and commitment to excellence.';
$current_page     = 'officers';
include 'includes/head.php';
?>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

    <!-- Hero Section -->
    <section class="gradient-bg py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Our Officers</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Meet the dedicated student leaders who serve the CSPC community with passion, integrity, and commitment to excellence.
            </p>
        </div>
    </section>

    <!-- Academic Year Tabs -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Officer Search Bar -->
            <div class="flex justify-center mb-6">
                <div class="relative w-full max-w-md">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 text-sm"></i>
                    </div>
                    <input type="text" id="officer-search"
                           oninput="filterOfficers(this.value)"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                           placeholder="Search officers by name or role...">
                </div>
            </div>

            <!-- Academic Year Tabs (Flowbite) -->
            <div class="flex justify-center mb-8">
                <div class="border-b border-gray-200">
                    <ul class="flex -mb-px text-sm font-medium text-center text-gray-500"
                        id="officers-tab" data-tabs-toggle="#officers-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                    id="tab-2024"
                                    data-tabs-target="#officers-2024"
                                    type="button" role="tab"
                                    aria-controls="officers-2024"
                                    aria-selected="false">
                                Academic Year 2024-2025
                            </button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                    id="tab-2025"
                                    data-tabs-target="#officers-2025"
                                    type="button" role="tab"
                                    aria-controls="officers-2025"
                                    aria-selected="true">
                                Academic Year 2025-2026
                            </button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg"
                                    id="tab-2026"
                                    data-tabs-target="#officers-2026"
                                    type="button" role="tab"
                                    aria-controls="officers-2026"
                                    aria-selected="false">
                                Academic Year 2026-2027
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

        <div id="officers-tab-content">
            <!-- 2024-2025 Officers -->
            <div id="officers-2024" class="officers-content hidden" role="tabpanel" aria-labelledby="tab-2024">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                    <!-- President -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/3mgcdnpp/Trixia-Kate-Morata.png" alt="Trixia Kate S. Morata" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-crown text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Trixia Kate S. Morata</h3>
                            <p class="text-blue-600 font-semibold mb-3">President and Student Trustee</p>
                            <p class="text-gray-600 text-sm mb-2">AB English 4B</p>
                            <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09638466140" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:trmorata@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 11, 2001</p>
                        </div>
                    </div>

                    <!-- Vice President Internal -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/9C4r0wd/Ann-Kyla-Aquiler.png" alt="Ann Kyla V. Aquiler" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-tie text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ann Kyla V. Aquiler</h3>
                            <p class="text-blue-600 font-semibold mb-3">Vice President for Internal Affairs</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 3A</p>
                            <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09203108574" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:anaquiler@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: October 10, 2003</p>
                        </div>
                    </div>

                    <!-- Vice President External -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/VcZPrL4r/Judah-Espero.png" alt="Judah Paulo Espero" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-handshake text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Judah Paulo Espero</h3>
                            <p class="text-blue-600 font-semibold mb-3">Vice President for External Affairs</p>
                            <p class="text-gray-600 text-sm mb-2">BSM 4A</p>
                            <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09460007334" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jpespero@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: July 21, 2003</p>
                        </div>
                    </div>

                    <!-- Secretary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/VcQ6gzh8/Allyza-Mae-Paz.png" alt="Allyza Mae N. Paz" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-pen text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Allyza Mae N. Paz</h3>
                            <p class="text-blue-600 font-semibold mb-3">Secretary</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3C</p>
                            <p class="text-gray-500 text-xs mb-3">Perpetual Help, Iriga City, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09384893000" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:alpaz@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 14, 2003</p>
                        </div>
                    </div>

                     <!-- Treasurer -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/WvwNbFN7/Jessil-Martinez.png" alt="Jessil C. Martinez" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-coins text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jessil C. Martinez</h3>
                            <p class="text-blue-600 font-semibold mb-3">Treasurer</p>
                            <p class="text-gray-600 text-sm mb-2">BSBA FM 2A</p>
                            <p class="text-gray-500 text-xs mb-3"></p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09566429351" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jessmartinez@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 15, 2005</p>
                        </div>
                    </div>

                  

                    <!-- Property Custodian -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/xbSDB8H/Sheildon-Polvoriza.png" alt="Sheildon I. Polvoriza" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-box text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Sheildon I. Polvoriza</h3>
                            <p class="text-blue-600 font-semibold mb-3">Property Custodian</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3C</p>
                            <p class="text-gray-500 text-xs mb-3">La Trinidad, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09929891643" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:shpolvoriza@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: December 15, 2002</p>
                        </div>
                    </div>

                    <!-- Auditor -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/4nG9xDzS/Xavier-Gabalfin.png" alt="Mark Xavier L. Gabalfin" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-search text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Mark Xavier L. Gabalfin</h3>
                            <p class="text-blue-600 font-semibold mb-3">Auditor</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 4D</p>
                            <p class="text-gray-500 text-xs mb-3">San Miguel, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09810031551" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:magabalfin@cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: November 10, 2002</p>
                        </div>
                    </div>

                    <!-- Business Manager 1 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/5x6dwxkp/Felix-Bermeo.png" alt="Felix II W. Bermeo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-briefcase text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Felix II W. Bermeo</h3>
                            <p class="text-blue-600 font-semibold mb-3">Business Manager</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 2C</p>
                            <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09929547551" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:febermeo@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 15, 2005</p>
                        </div>
                    </div>

                    <!-- Business Manager 2 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/GDbQZ9H/Abby-Gonzales.png" alt="Abegail B. Gonzales" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-briefcase text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Abegail B. Gonzales</h3>
                            <p class="text-blue-600 font-semibold mb-3">Business Manager</p>
                            <p class="text-gray-600 text-sm mb-2">BSTM 4B</p>
                            <p class="text-gray-500 text-xs mb-3">Curry, Pili, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09103438181" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:abegonzales@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 18, 2001</p>
                        </div>
                    </div>

                    <!-- Public Relations Officer -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/nsQ5jdxY/Amanda-Lazaro.png" alt="Armando C. Lazaro III" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-bullhorn text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Armando C. Lazaro III</h3>
                            <p class="text-blue-600 font-semibold mb-3">Public Relations Officer</p>
                            <p class="text-gray-600 text-sm mb-2">AB English 2B</p>
                            <p class="text-gray-500 text-xs mb-3">Luluasan, Balatan, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09277216072" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:arlazaro@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: June 11, 2004</p>
                        </div>
                    </div>

                    <!-- Secretary of the Student Trustee -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/7xXbp4NR/Eloisa-Padayao.png" alt="Eloisa Mae L. Padayao" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-edit text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Eloisa Mae L. Padayao</h3>
                            <p class="text-blue-600 font-semibold mb-3">Secretary of the Student Trustee</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 2B</p>
                            <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09667020586" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:elopadayao@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 15, 2004</p>
                        </div>
                    </div>

                    <!-- Secretary of the Student Trustee -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Dfr51G5d/John-Aldon-Repatacodo.png" alt="John Aldon N. Repatacodo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-edit text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">John Aldon N. Repatacodo</h3>
                            <p class="text-blue-600 font-semibold mb-3">Secretary of the Student Trustee</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 2N</p>
                            <p class="text-gray-500 text-xs mb-3">1055, Zone 6, Sta. Justina, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09171785642" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:johrepatacodo@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 5, 2001</p>
                        </div>
                    </div>

                    <!-- CHS - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/nMR9v6sx/Marinelle-Vela.png" alt="Marinelle A. Vela" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-university text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Marinelle A. Vela</h3>
                            <p class="text-blue-600 font-semibold mb-3">CHS - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 4D</p>
                            <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09615120786" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:mvela@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: May 9, 2003</p>
                        </div>
                    </div>

                    <!-- CHS - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Mxy45brP/Jester-Sumpay.png" alt="Jester SJ. Sumpay" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-university text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jester SJ. Sumpay</h3>
                            <p class="text-blue-600 font-semibold mb-3">CHS - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 2F</p>
                            <p class="text-gray-500 text-xs mb-3">Salvacion, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09271191805" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jessumpay@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 24, 2004</p>
                        </div>
                    </div>

                    <!-- CCS - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/F4tMgKHB/Ramelle-Mhiro-Fortuna.png" alt="Ramelle Mhiro F. Fortuna" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-laptop-code text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ramelle Mhiro F. Fortuna</h3>
                            <p class="text-blue-600 font-semibold mb-3">CCS - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSCS 3A</p>
                            <p class="text-gray-500 text-xs mb-3">San Juan, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09561708582" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:rafortuna@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 29, 2004</p>
                        </div>
                    </div>

                    <!-- CCS - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Gf28xj6r/Julian-Paul-Padua.png" alt="Julian Paul M. Padua" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-laptop-code text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Julian Paul M. Padua</h3>
                            <p class="text-blue-600 font-semibold mb-3">CCS - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSIT 3A</p>
                            <p class="text-gray-500 text-xs mb-3">La Purisima, Pili, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09518995060" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jupadua@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: August 10, 2003</p>
                        </div>
                    </div>

                    <!-- CTHBM - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/1twGJth2/Franz-Patrick-Nabor.png" alt="Franz Patrick N. Nabor" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-hotel text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Franz Patrick N. Nabor</h3>
                            <p class="text-blue-600 font-semibold mb-3">CTHBM - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSOA 4B</p>
                            <p class="text-gray-500 text-xs mb-3">Topas Sogod, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09501883350" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:frnabor@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 15, 2001</p>
                        </div>
                    </div>

                    <!-- CTHBM - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/DHQbmPBS/Paul-Brian-Brioso.png" alt="Paul Brian P. Brioso" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-hotel text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Paul Brian P. Brioso</h3>
                            <p class="text-blue-600 font-semibold mb-3">CTHBM - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSTM 3D</p>
                            <p class="text-gray-500 text-xs mb-3">Purok 2 Cobangbang, Daet, Camarines Norte</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09682805650" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:pabrioso@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: August 12, 2003</p>
                        </div>
                    </div>

                    <!-- CEA - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Kzcs2GYF/Ron-Andrew-Oaferina.png" alt="Ron Andrew T. Oaferina" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-building text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ron Andrew T. Oaferina</h3>
                            <p class="text-blue-600 font-semibold mb-3">CEA - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 4D</p>
                            <p class="text-gray-500 text-xs mb-3">Magsaysay St., Sta. Elena, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09636599218" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:rooaferina@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 11, 2002</p>
                        </div>
                    </div>

                    <!-- CEA - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/R4C7HS9m/Francis-Joseph-Sola.png" alt="Francis Joseph T. Sola" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-building text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Francis Joseph T. Sola</h3>
                            <p class="text-blue-600 font-semibold mb-3">CEA - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSECE 3A</p>
                            <p class="text-gray-500 text-xs mb-3">213, Zone 3A, San Francisco, Ocampo, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09569510242" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:frsola@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: November 24, 2003</p>
                        </div>
                    </div>

                    <!-- CAS - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/XxkpRTnN/Khiarra-Beredico.png" alt="Khiarra Chrisha L. Beredico" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-graduation-cap text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Khiarra Chrisha L. Beredico</h3>
                            <p class="text-blue-600 font-semibold mb-3">CAS - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BPA 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Tres Reyes, Bato, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09568874538" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:khberedico@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 1, 2004</p>
                        </div>
                    </div>

                    <!-- CAS - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Z6WFS6VF/Au-Balanlay.png" alt="Khryzzlyn Au M. Balanlay" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-graduation-cap text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Khryzzlyn Au M. Balanlay</h3>
                            <p class="text-blue-600 font-semibold mb-3">CAS - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">AB English 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09103074855" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:khbalanlay@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: December 6, 2003</p>
                        </div>
                    </div>

                    <!-- CTDE - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Zsmq0XY/Shemaiah-Buita.png" alt="Shemaiah Buita" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-chalkboard-teacher text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Shemaiah Buita</h3>
                            <p class="text-blue-600 font-semibold mb-3">CTDE - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BCAED 2A</p>
                            <p class="text-gray-500 text-xs mb-3">San Juan, Baao, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09123584253" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:shbuita@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: July 11, 2005</p>
                        </div>
                    </div>

                    <!-- CTDE - College Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/qYNgj86S/Kyla-Navo.png" alt="Kyla B. Navo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-chalkboard-teacher text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Kyla B. Navo</h3>
                            <p class="text-blue-600 font-semibold mb-3">CTDE - College Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BTVTEd ELX 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Zone 2 Luluasan, Balatan, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09285689458" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:kynavo@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: December 9, 2002</p>
                        </div>
                    </div>

                    <!-- Buhi Campus Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/DHpjM86W/Mae-Angela-Bagalacsa.png" alt="Mae Angela N. Bagalacsa" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-map-marker-alt text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Mae Angela N. Bagalacsa</h3>
                            <p class="text-blue-600 font-semibold mb-3">Buhi Campus Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSOA 4A</p>
                            <p class="text-gray-500 text-xs mb-3">Sagrada Familia, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09857586883" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:mabagalacsa@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: January 2, 2003</p>
                        </div>
                    </div>

                    <!-- Buhi Campus Representative -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Hf1KXmkx/Harrel-Jane-Balang.png" alt="Harrel Jane L. Balang" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-map-marker-alt text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Harrel Jane L. Balang</h3>
                            <p class="text-blue-600 font-semibold mb-3">Buhi Campus Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSOA 3B</p>
                            <p class="text-gray-500 text-xs mb-3">Sta. Justina, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09481271069" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:harbalang@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: October 28, 2003</p>
                        </div>
                    </div>

                    <!-- Assistant Secretary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/WNGLD2y9/Ma-Lourdes-Carmen-Tulabot.png" alt="Ma. Lourdes Carmen A. Tulabot" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-plus text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ma. Lourdes Carmen A. Tulabot</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Secretary</p>
                            <p class="text-gray-600 text-sm mb-2">BPA 2B</p>
                            <p class="text-gray-500 text-xs mb-3">San Agustin, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09503020246" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:matulabot@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: November 5, 2004</p>
                        </div>
                    </div>

                      <!-- Assistant Secretary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/pBhMSYmd/Edmund-Bigata.png" alt="Edmund M. Bigata" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-plus text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Edmund M. Bigata</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Secretary</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 4B</p>
                            <p class="text-gray-500 text-xs mb-3">San Buenaventura, Buhi,
Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09774773803" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:edmbigata@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: November 25, 2001</p>
                        </div>
                    </div>

                    <!-- Assistant Secretary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/dJKxPwBg/Mikaela-Quibot.png" alt="Mikaela P. Quibot" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-plus text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Mikaela P. Quibot</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Secretary</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Layon, Ligao City, Albay</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09919551099" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:miquibot@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: January 19, 2004</p>
                        </div>
                    </div>

                    <!-- Assistant Secretary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Cp00D5nf/Ralph-Joefrancis-Abonal.png" alt="Ralph Joefrancis D. Abonal" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-plus text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ralph Joefrancis D. Abonal</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Secretary</p>
                            <p class="text-gray-600 text-sm mb-2">BPA 2B</p>
                            <p class="text-gray-500 text-xs mb-3">San Juan, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09690264216" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:raabonal@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 14, 2004</p>
                        </div>
                    </div>

                    <!-- Assistant Secretary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Q7hfKzfK/Karsten-Turalde.png" alt="Karsten Clyde S. Turalde" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-plus text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Karsten Clyde S. Turalde</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Secretary</p>
                            <p class="text-gray-600 text-sm mb-2">BSIT 2C</p>
                            <p class="text-gray-500 text-xs mb-3">Santa Teresita, Polangui, Albay</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09085099063" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:katuralde@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: January 12, 2005</p>
                        </div>
                    </div>

                    <!-- Assistant Treasurer -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/MDSy2TQQ/Earl-Sopena.png" alt="John Earl M. Sope-a" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-coins text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">John Earl M. Sope-a</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Treasurer</p>
                            <p class="text-gray-600 text-sm mb-2">BS Applied Math 3A</p>
                            <p class="text-gray-500 text-xs mb-3">002, Zone 2, Ombao, Polpog, Bula, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09387430482" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:josopena@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: March 4, 2004</p>
                        </div>
                    </div>

                      <!-- Assistant Treasurer -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/353ShSxQ/Anne-Cano.png" alt="Anne Vishna B. Cano" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-coins text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Anne Vishna B. Cano</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Treasurer</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3D</p>
                            <p class="text-gray-500 text-xs mb-3">San Miguel, Iriga City, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09566429351" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:ancano@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: July 23, 2002</p>
                        </div>
                    </div>

                    <!-- Assistant Property Custodian (Logistics) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/d0fDhHQ2/Hanilav-Mora.png" alt="Hanilav C. Mora" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-boxes text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Hanilav C. Mora</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Logistics)</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 4A</p>
                            <p class="text-gray-500 text-xs mb-3">357, Zone 4, Sabatan St., La Medalla, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09286564091" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:hamora@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: October 5, 2000</p>
                        </div>
                    </div>

                    <!-- Assistant Property Custodian (Logistics) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/ZR7qxT0P/Jerome-Ken-Royales.png" alt="Jerome Ken S. Royales" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-boxes text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jerome Ken S. Royales</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Logistics)</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Zone 3, Bagumbayan, Libmanan, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09319981631" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jeroyales@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 4, 2004</p>
                        </div>
                    </div>

                    <!-- Assistant Property Custodian (Logistics) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/200rggLq/Keneth-Christian-Bulawan.png" alt="Keneth Christian R. Bulawan" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-boxes text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Keneth Christian R. Bulawan</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Logistics)</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3C</p>
                            <p class="text-gray-500 text-xs mb-3">San Roque, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09384892986" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:kebulawan@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 20, 2003</p>
                        </div>
                    </div>

                    <!-- Assistant Property Custodian (Inventory) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Y752qgFP/Mary-France-Paz.png" alt="Mary France A. Paz" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-clipboard-list text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Mary France A. Paz</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Inventory)</p>
                            <p class="text-gray-600 text-sm mb-2">BSHM 2E</p>
                            <p class="text-gray-500 text-xs mb-3">Zone 2, Dinaga, Canaman, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09917365628" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:mapaz@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 16, 2005</p>
                        </div>
                    </div>

                    <!-- Assistant Property Custodian (Supply) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/m5g2gc13/Margaux-Obrero.png" alt="Margaux Francine L. Obrero" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-truck text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Margaux Francine L. Obrero</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Supply)</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 3L</p>
                            <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09294221025" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:margobrero@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: December 12, 2003</p>
                        </div>
                    </div>

                    <!-- Assistant Auditor -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/6c0Tyd8w/Art-Bigayan.png" alt="Art A. Bigayan" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-search-plus text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Art A. Bigayan</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Auditor</p>
                            <p class="text-gray-600 text-sm mb-2">BCAEd 4A</p>
                            <p class="text-gray-500 text-xs mb-3">San Juan, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09369244537" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:artbigayan@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: May 10, 2001</p>
                        </div>
                    </div>

                    <!-- Assistant Auditor -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Qv1rPHBq/Joberth-Iballar.png" alt="Joberth B. Iballar" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-search-plus text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Joberth B. Iballar</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Auditor</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Zone 3, Sta. Justina, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09850594056" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:joiballar@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: October 12, 2004</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Multimedia and Design) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/k2PqLrz0/Nescel-Clyde-Malapo.png" alt="Nescel Clyde C. Malapo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Nescel Clyde C. Malapo</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3B</p>
                            <p class="text-gray-500 text-xs mb-3">Purok 3 Maroroy Daraga, Albay</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09095868235" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:nesmalapo@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: August 27, 2002</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Multimedia and Design) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/FLSYqMqP/Jeriel-Agua.png" alt="Jeriel L. Agua" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jeriel L. Agua</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                            <p class="text-gray-600 text-sm mb-2">BSBA-FM 1B</p>
                            <p class="text-gray-500 text-xs mb-3">San Buena, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09489087139" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jeagua@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: January 5, 2005</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Multimedia and Design) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/YTPj4yLL/TJ-Marquez.png" alt="TJ G. Marquez" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">TJ G. Marquez</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 1B</p>
                            <p class="text-gray-500 text-xs mb-3">Zone 1, San Francisco, Iriga City, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09913154009" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:tjmarquez@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: July 16, 2006</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Multimedia and Design) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/yFpb4FXN/Albert-Jerome-Mata.png" alt="Albert Jerome P. Mata" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Albert Jerome P. Mata</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                            <p class="text-gray-600 text-sm mb-2">BSIT 1C</p>
                            <p class="text-gray-500 text-xs mb-3">Zone 4, San Vicente, Bato, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09500508806" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:almata@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 8, 2006</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Multimedia and Design) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/5hvDh0Dj/Jancee-Kenn-Abonita.png" alt="Jancee Kenn E. Abonita" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jancee Kenn E. Abonita</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                            <p class="text-gray-600 text-sm mb-2">BSIT 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Zone 1, San Miguel, Bato, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09913527843" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jaabonita@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: May 9, 2004</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Multimedia and Design) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/ymfJtQWr/Pollyn-Bustarga.png" alt="Pollyn C. Bustarga" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Pollyn C. Bustarga</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                            <p class="text-gray-600 text-sm mb-2">BSOA 4B</p>
                            <p class="text-gray-500 text-xs mb-3">San Vicente Sur, Iriga City, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09939399103" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:pobustarga@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 15, 2003</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Multimedia and Design) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/JRbbRR37/Rafael-Rivera.png" alt="Rafael P. Rivera" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Rafael P. Rivera</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3C</p>
                            <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09468689288" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:rarivera@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: August 24, 2003</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Publications) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Zz0TPPgc/Andrew-Prima.png" alt="Joseph Andrew P. Prima" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-newspaper text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Joseph Andrew P. Prima</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Publications)</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 2D</p>
                            <p class="text-gray-500 text-xs mb-3">La Trinidad, Iriga City, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09776133627" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:joprima@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: May 25, 2004</p>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officer (Publications) -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/S76mg9CF/Iya-Lagyap.png" alt="Iya T. Lagyap" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-newspaper text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Iya T. Lagyap</h3>
                            <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Publications)</p>
                            <p class="text-gray-600 text-sm mb-2">BSM 1B</p>
                            <p class="text-gray-500 text-xs mb-3">117 Zone 5 Mactan Street, San Agustin Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09932581292" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:iylagyap@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: March 22, 2006</p>
                        </div>
                    </div>

                    <!-- Students' Rights, Welfare, and Gender and Development Committee -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/XxN60Hcx/Weng-Arines.png" alt="Wenreme B. Arines" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-balance-scale text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Wenreme B. Arines</h3>
                            <p class="text-blue-600 font-semibold mb-3">Students' Rights, Welfare, and Gender and Development Committee</p>
                            <p class="text-gray-600 text-sm mb-2">AB English 4A</p>
                            <p class="text-gray-500 text-xs mb-3">La Purisima, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09197298976" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:wearines@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 19, 2003</p>
                        </div>
                    </div>

                    <!-- Sports and Cultural Development Officer -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/bMqdPPSg/CSPC-3934.jpg" alt="Kim Iverson D. Dasmari-as" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-trophy text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Kim Iverson D. Dasmari-as</h3>
                            <p class="text-blue-600 font-semibold mb-3">Sports and Cultural Development Officer</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 4C</p>
                            <p class="text-gray-500 text-xs mb-3">Sta. Justina, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09074236422" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:kidasmarias@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 4, 2002</p>
                        </div>
                    </div>

                    <!-- Environmental Concerns Committee -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/jZ1gBJ3n/Aron-Carl-Obrero.png" alt="Aron Carl Vincent S. Obrero" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-leaf text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Aron Carl Vincent S. Obrero</h3>
                            <p class="text-blue-600 font-semibold mb-3">Environmental Concerns Committee</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 2G</p>
                            <p class="text-gray-500 text-xs mb-3">548 Nierva St., Zone 3, La Purisima, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09053934511" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:arobrero@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: November 18, 2004</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2025-2026 Officers -->
            <div id="officers-2025" class="officers-content" role="tabpanel" aria-labelledby="tab-2025">
                <!-- Executive Officers -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Executive Officers</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- President and Student Trustee -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/FkSQNz0b/President-and-Student-Trustee.jpg" alt="Ann Kyla V. Aquiler" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-crown text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ann Kyla V. Aquiler</h3>
                            <p class="text-blue-600 font-semibold mb-3">President and Student Trustee</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 4A</p>
                            <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09511818907" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:anaquiler@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: October 10, 2003</p>
                        </div>
                    </div>

                    <!-- Vice President for Internal Affairs -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/XZk2knwQ/Allyza-Mae-N-Paz.jpg" alt="Allyza Mae N. Paz" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-user-tie text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Allyza Mae N. Paz</h3>
                            <p class="text-blue-600 font-semibold mb-3">Vice President for Internal Affairs</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 4C</p>
                            <p class="text-gray-500 text-xs mb-3">Perpetual Help, Iriga City, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09384893000" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:alpaz@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 14, 2003</p>
                        </div>
                    </div>

                    <!-- Vice President for External Affairs -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/MyFPp15F/Vice-President-for-External-Affairs.jpg" alt="Armando III C. Lazaro" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-handshake text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Armando III C. Lazaro</h3>
                            <p class="text-blue-600 font-semibold mb-3">Vice President for External Affairs</p>
                            <p class="text-gray-600 text-sm mb-2">AB ELS 3B</p>
                            <p class="text-gray-500 text-xs mb-3">Luluasan Balatan, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09277216072" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:arlazaro@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: June 11, 2004</p>
                        </div>
                    </div>

                    <!-- Secretary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/JRSsqCTX/Secretary.jpg" alt="Ralph Joefrancis D. Abonal" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-pen text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ralph Joefrancis D. Abonal</h3>
                            <p class="text-blue-600 font-semibold mb-3">Secretary</p>
                            <p class="text-gray-600 text-sm mb-2">BPA 3B</p>
                            <p class="text-gray-500 text-xs mb-3">San Juan, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09690264216" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:raabonal@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 14, 2004</p>
                        </div>
                    </div>

                    <!-- Treasurer -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/HTrbn079/Treasurer.jpg" alt="Jessil C. Martinez" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-coins text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jessil C. Martinez</h3>
                            <p class="text-blue-600 font-semibold mb-3">Treasurer</p>
                            <p class="text-gray-600 text-sm mb-2">BSBA-FM 3A</p>
                            <p class="text-gray-500 text-xs mb-3">Sagrada, Baao, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09674179185" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jessmartinez@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 15, 2005</p>
                        </div>
                    </div>

                    <!-- Property Custodian -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Mxy45brP/Jester-Sumpay.png" alt="Jester Carl SJ. Sumpay" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-box text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jester Carl SJ. Sumpay</h3>
                            <p class="text-blue-600 font-semibold mb-3">Property Custodian</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 3F</p>
                            <p class="text-gray-500 text-xs mb-3">Salvacion, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09271191805" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jessumpay@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 24, 2004</p>
                        </div>
                    </div>

                    <!-- Auditor -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/Kg9v009/Auditor.jpg" alt="Joberth B. Iballar" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-search text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Joberth B. Iballar</h3>
                            <p class="text-blue-600 font-semibold mb-3">Auditor</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 4A</p>
                            <p class="text-gray-500 text-xs mb-3">Sta. Justina, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09850594056" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:joiballar@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: October 12, 2004</p>
                        </div>
                    </div>

                    <!-- Public Relations Officer -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/S4krB0Dq/Public-Relations-Officer.jpg" alt="Jeriel L. Agua" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-bullhorn text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jeriel L. Agua</h3>
                            <p class="text-blue-600 font-semibold mb-3">Public Relations Officer</p>
                            <p class="text-gray-600 text-sm mb-2">BSBA-FM 2B</p>
                            <p class="text-gray-500 text-xs mb-3">San Buena, Buhi, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09489087139" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jeagua@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: January 5, 2005</p>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Special Secretaries -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Special Secretaries</h3>
                    <div class="flex justify-center">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 max-w-4xl">
                        <!-- Secretary to the President and Student Trustee -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/h1w0Dy5N/Secretary-to-the-President-and-Student-Trustee.jpg" alt="Maria Lourdes Carmen A. Tulabot" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-user-edit text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Maria Lourdes Carmen A. Tulabot</h3>
                                <p class="text-blue-600 font-semibold mb-3">Secretary to the President and Student Trustee</p>
                                <p class="text-gray-600 text-sm mb-2">BPA 3B</p>
                                <p class="text-gray-500 text-xs mb-3">San Agustin, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09503020246" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:matulabot@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: November 5, 2004</p>
                            </div>
                        </div>

                        <!-- Visual Secretary to the President and Student Trustee -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/1YS8HBVB/Visual-Secretary-to-the-President-and-Student-Trustee.jpg" alt="Felix II W. Bermeo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-camera text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Felix II W. Bermeo</h3>
                                <p class="text-blue-600 font-semibold mb-3">Visual Secretary to the President and Student Trustee</p>
                                <p class="text-gray-600 text-sm mb-2">BSCE 3C</p>
                                <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09929547551" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:febermeo@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: February 15, 2005</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Campus Representatives -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Campus Representatives</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Buhi Campus Representatives -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/kVb81WnV/Joshua-Villadares.jpg" alt="Joshua A. Villadares" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-map-marker-alt text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Joshua A. Villadares</h3>
                                <p class="text-blue-600 font-semibold mb-3">Buhi Campus - Representative</p>
                                <p class="text-gray-600 text-sm mb-2">BSOA 4D</p>
                                <p class="text-gray-500 text-xs mb-3">Sta. Elena, Buhi, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09274986690" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:jovilladares@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: May 26, 2004</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/S4DVpRwY/Edna-B-Sarto.jpg" alt="Edna B. Sarto" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-map-marker-alt text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Edna B. Sarto</h3>
                                <p class="text-blue-600 font-semibold mb-3">Buhi Campus - Representative</p>
                                <p class="text-gray-600 text-sm mb-2">BSOA 4D</p>
                                <p class="text-gray-500 text-xs mb-3">Sagrada Familia, Buhi, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09519594202" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:edsarto@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: November 1, 2003</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- College Representatives -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">College Representatives</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        <!-- College of Arts and Sciences Representatives -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/YFpJChrP/Khiarra-Chrisha-L-Beredico.jpg" alt="Khiarra Chrisha L. Beredico" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-graduation-cap text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Khiarra Chrisha L. Beredico</h3>
                                <p class="text-blue-600 font-semibold mb-3">College of Arts and Sciences - Representative</p>
                                <p class="text-gray-600 text-sm mb-2">BPA 4A</p>
                                <p class="text-gray-500 text-xs mb-3">Tres Reyes, Bato, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09568874538" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:khberedico@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: February 1, 2004</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/HLcJFDwz/Aries-L-Malapitan.jpg" alt="Aries L. Malapitan" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-graduation-cap text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Aries L. Malapitan</h3>
                                <p class="text-blue-600 font-semibold mb-3">College of Arts and Sciences - Representative</p>
                                <p class="text-gray-600 text-sm mb-2">BSDevCom 4A</p>
                                <p class="text-gray-500 text-xs mb-3">San Antonio, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09670372522" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:armalapitan@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: May 14, 2004</p>
                            </div>
                        </div>

                    <!-- College of Computer Studies Representatives -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/7J3Y9Xjp/Jude-Daniel-Fajardo.jpg" alt="Jude Daniel P. Fajardo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-laptop-code text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Jude Daniel P. Fajardo</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Computer Studies - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSCS 4A</p>
                            <p class="text-gray-500 text-xs mb-3">San Roque, Baao, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09695667001" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:jufajardo@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: September 29, 2003</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/qYYvWBDW/Ramelle-Mhiro-F-Fortuna.jpg" alt="Ramelle Mhiro F. Fortuna" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-laptop-code text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ramelle Mhiro F. Fortuna</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Computer Studies - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSCS 4A</p>
                            <p class="text-gray-500 text-xs mb-3">San Juan, Nabua, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09561708582" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:rafortuna@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 29, 2004</p>
                        </div>
                    </div>

                    <!-- College of Engineering and Architecture Representatives -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/bgBMWQHj/Lyka-G-Regaspi.jpg" alt="Lyka G. Regaspi" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-building text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Lyka G. Regaspi</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Engineering and Architecture - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSCE 3B</p>
                            <p class="text-gray-500 text-xs mb-3">San Roque, Bato, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09810444481" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:lyregaspi@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: January 23, 2005</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/bZ1rgPb/Francis-Joseph-T-Sola.jpg" alt="Francis Joseph T. Sola" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-building text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Francis Joseph T. Sola</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Engineering and Architecture - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSECE 4A</p>
                            <p class="text-gray-500 text-xs mb-3">San Francisco, Ocampo, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09569510242" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:frsola@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: November 24, 2003</p>
                        </div>
                    </div>

                    <!-- College of Health Sciences Representatives -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/CKF1jqJb/Ellise-Andrea-D-Nuyda.jpg" alt="Ellise Andrea D. Nuyda" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-university text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Ellise Andrea D. Nuyda</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Health Sciences - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 4A</p>
                            <p class="text-gray-500 text-xs mb-3">Divina Pastora, Bato, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09455378418" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:elnuyda@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 9, 2003</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/7xXbp4NR/Eloisa-Padayao.png" alt="Eloisa Mae L. Padayao" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-university text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Eloisa Mae L. Padayao</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Health Sciences - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSN 3B</p>
                            <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09667020586" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:elopadayao@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 15, 2004</p>
                        </div>
                    </div>

                    <!-- College of Technological and Developmental Education Representatives -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/W4TSC0ZF/Shemaiah-B-Buita.jpg" alt="Shemaih B. Buita" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-chalkboard-teacher text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Shemaiah B. Buita</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Technological and Developmental Education - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BCAED 3A</p>
                            <p class="text-gray-500 text-xs mb-3">San Juan, Baao, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09123584253" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:shbuita@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: July 11, 2005</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/fz4wnPy4/Lynnel-C-Qui-ano.jpg" alt="Lynnel C. Qui-ano" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-chalkboard-teacher text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Lynnel C. Qui-ano</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Technological and Developmental Education - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BTVTED FSM 4B</p>
                            <p class="text-gray-500 text-xs mb-3">Sitio Bangad, Baliuag Viejo, Minalabac, Camarines Sur</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09923975238" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:lyquinano@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: April 5, 2004</p>
                        </div>
                    </div>

                    <!-- College of Tourism, Hospitality, and Business Management Representatives -->
                    

                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/1YGpz7wq/Felix-Jr-C-Namoro.jpg" alt="Felix Jr. C. Namoro" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-hotel text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Felix Jr. C. Namoro</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Tourism, Hospitality, and Business Management - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSHM 4D</p>
                            <p class="text-gray-500 text-xs mb-3">Sto Ni-o, Iriga City</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09283305783" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:fenamoro@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: February 21, 2003</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                        <div class="text-center">
                            <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img src="https://i.ibb.co/qMPvj2Rk/Edgar-D-Pedragosa.jpg" alt="Edgar D. Pedragosa" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                    <i class="fas fa-hotel text-blue-600 text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Kaye Diaz</h3>
                            <p class="text-blue-600 font-semibold mb-3">College of Tourism, Hospitality, and Business Management - Representative</p>
                            <p class="text-gray-600 text-sm mb-2">BSTM 4C</p>
                            <p class="text-gray-500 text-xs mb-3">Apud, Libon, Albay</p>
                            <div class="flex justify-center space-x-3 mb-3">
                                <a href="tel:09922614618" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="mailto:edpedragosa@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                            <p class="text-gray-500 text-xs">Birthday: November 2, 2003</p>
                        </div>
                    </div>
                </div>
<div></div>
                <!-- Assistant Officers Section -->
                <div></div>
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Assistant Officers</h3>
                    
                    <!-- Assistant Secretaries (Executive) -->
                    <div></div>
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Secretaries (Executive)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/kgfZX5W2/Christian-Gabrielle-B-Pa-ac.jpg" alt="Christian Gabrielle B. Pa-ac" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-user-plus text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Christian Gabrielle B. Pa-ac</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Secretary (Executive)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSN 1E</p>
                                    <p class="text-gray-500 text-xs mb-3">San Nicolas, Nabua, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09511674211" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:chpaac@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: March 15, 2006</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/dXBkZxc/Iya-T-Lagyap.jpg" alt="Iya T. Lagyap" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-user-plus text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Iya T. Lagyap</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Secretary (Executive)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSM 2B</p>
                                    <p class="text-gray-500 text-xs mb-3">San Agustin, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09932581292" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:iylagyap@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: March 22, 2006</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Secretaries (Legislative) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Secretaries (Legislative)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/0jHR3DfH/Adriel-C-Aquiler.jpg" alt="Adriel C. Aquiler" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-gavel text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Adriel C. Aquiler</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Secretary (Legislative)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSN 4A</p>
                                    <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09100754242" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:adaquiler@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: November 1, 2003</p>
                                </div>
                            </div>

                        
                    </div>

                    <!-- Assistant Treasurers -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Treasurers</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/Y7sp3Jwd/John-Del-Rainer-M-Amucan.jpg" alt="John Del Rainer M. Amucan" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-coins text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">John Del Rainer M. Amucan</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Treasurer</p>
                                    <p class="text-gray-600 text-sm mb-2">BSBA-FM 3A</p>
                                    <p class="text-gray-500 text-xs mb-3">San Nicolas, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09542932941" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:joamucan@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: October 27, 2005</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/nMX0fjdP/Samantha-Shane-C-Comia.jpg" alt="Samantha Shane C. Comia" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-coins text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Samantha Shane C. Comia</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Treasurer</p>
                                    <p class="text-gray-600 text-sm mb-2">BSBA-FM 3A</p>
                                    <p class="text-gray-500 text-xs mb-3">Matacon, Polangui, Albay</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09636752562" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:sacomia@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: September 15, 2004</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Property Custodians (Logistics) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Property Custodians (Logistics)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/9kWB5tF3/Luke-Andrei-O-Ronquillo.jpg" alt="Luke Andrei O. Ronquillo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-boxes text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Luke Andrei O. Ronquillo</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Logistics)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSN 1E</p>
                                    <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09480782265" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:luronquillo@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: May 27, 2007</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/chFRNk07/Ma-Divine-Verna-G-Ope-a.jpg" alt="Ma. Divine Verna G. Ope-a" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-boxes text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ma. Divine Verna G. Ope-a</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Logistics)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSCE 1A</p>
                                    <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09093212067" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:maopena@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: April 6, 2007</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/VYmjZJ0x/Camile-C-Salvadora.jpg" alt="Camile C. Salvadora" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-boxes text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Camille C. Salvadora</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Logistics)</p>
                                    <p class="text-gray-600 text-sm mb-2">AB ELS 3A</p>
                                    <p class="text-gray-500 text-xs mb-3">Sto. Ni-o, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09954719632" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:casalvadora@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: May 11, 2004</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Property Custodians (Supply) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Property Custodians (Supply)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/QBjcNQ5/Mark-James-L-Laniog.jpg" alt="Mark James L. Laniog" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-truck text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mark James L. Laniog</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Supply)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSN 3N</p>
                                    <p class="text-gray-500 text-xs mb-3">San Nicolas, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09755463223" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:malaniog@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: October 15, 2003</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/8LYq1JVZ/Joseph-Andrew-P-Prima.jpg" alt="Joseph Andrew P. Prima" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-truck text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Joseph Andrew P. Prima</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Supply)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSN 3D</p>
                                    <p class="text-gray-500 text-xs mb-3">La Trinidad, Iriga City, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09776133627" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:joprima@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: May 25, 2004</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Property Custodians (Inventory) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Property Custodians (Inventory)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100 mx-auto max-w-sm">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/4ZPWVZKm/Julian-Paul-M-Padua.jpg" alt="Julian Paul M. Padua" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-clipboard-list text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Julian Paul M. Padua</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Property Custodian (Inventory)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSIT 4B</p>
                                    <p class="text-gray-500 text-xs mb-3">La Purisima, Pili, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09518995060" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:jupadua@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: August 10, 2003</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officers (Technical) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Public Relations Officers (Technical Director)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100 mx-auto max-w-sm">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/hxJ03bn5/Jancee-Kenn-E-Abonita.jpg" alt="Jancee Kenn E. Abonita" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-cog text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Jancee Kenn E. Abonita</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Technical)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSIT 4B</p>
                                    <p class="text-gray-500 text-xs mb-3">San Miguel, Bato, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09913527843" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:jaabonita@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: May 9, 2004</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officers (Multimedia and Design) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Public Relations Officers (Multimedia and Design)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/N6N2gBWF/Jud-Aci-Dassler-A-Bolalin.jpg" alt="Jud Aci Dassler A. Bolalin" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Jud Aci Dassler A. Bolalin</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSIT 2A</p>
                                    <p class="text-gray-500 text-xs mb-3">Perpetual Help, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09928996773" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:judbolalin12@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: December 2, 2005</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/wNsvjkLH/TJ-G-Marquez.jpg" alt="TJ G. Marquez" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">TJ G. Marquez</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSCE 2B</p>
                                    <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09913154094" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:tjmarquez@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: July 16, 2006</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/yFz0pxnB/Rainer-A-De-Los-Santos.jpg" alt="Rainer A. De Los Santos" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-palette text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Rainer A. De Los Santos</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Multimedia and Design)</p>
                                    <p class="text-gray-600 text-sm mb-2">AB ELS 4A</p>
                                    <p class="text-gray-500 text-xs mb-3">Topas Proper, Nabua, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09690264499" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:radelossantos@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: November 5, 2003</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officers (Publication) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Public Relations Officers (Publication)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/GvTCSvky/Khryzzlyn-Au-M-Balanlay.jpg" alt="Khryzzlyn Au M. Balanlay" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-newspaper text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Khryzzlyn Au M. Balanlay</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Publication)</p>
                                    <p class="text-gray-600 text-sm mb-2">AB ELS 4A</p>
                                    <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Nabua, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09103074855" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:khbalanlay@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: December 6, 2003</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/Kcrj1sQf/Marcela-Ciamel-L-Platilla.jpg" alt="Marcela Ciamel L. Platilla" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-newspaper text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Marcela Ciamel L. Platilla</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Public Relations Officer (Publication)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSIT 2E</p>
                                    <p class="text-gray-500 text-xs mb-3">Curry, Pili, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09709348183" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:maplatilla@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: October 25, 2005</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Public Relations Officers (Documentation) -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Public Relations Officers (Documentation)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/vCz97bXF/Ganther-T-Coronel.jpg" alt="Ganther T. Coronel" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-violet-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-file-alt text-violet-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ganther T. Coronel</h3>
                                    <p class="text-violet-600 font-semibold mb-3">Assistant Public Relations Officer (Documentation)</p>
                                    <p class="text-gray-600 text-sm mb-2">BPA 2A</p>
                                    <p class="text-gray-500 text-xs mb-3">Cumacap, Antipolo Old, Nabua, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09079214224" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:gacoronel@my.cspc.edu.ph" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: August 30, 2006</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/bM4p00nS/Glendon-James-M-Abordo.jpg" alt="Glendon James M. Abordo" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-violet-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-file-alt text-violet-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Glendon James M. Abordo</h3>
                                    <p class="text-violet-600 font-semibold mb-3">Assistant Public Relations Officer (Documentation)</p>
                                    <p class="text-gray-600 text-sm mb-2">BS ENREP 3B</p>
                                    <p class="text-gray-500 text-xs mb-3">Mayon Vista Subdivison, Ligao City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09632319289" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:glabordo@my.cspc.edu.ph" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: December 6, 2004</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/Xkdj1skK/Julius-Gabriel-Cabalquinto.jpg" alt="Julius Gabriel Cabalquinto" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-violet-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-file-alt text-violet-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Julius Gabriel Cabalquinto</h3>
                                    <p class="text-violet-600 font-semibold mb-3">Assistant Public Relations Officer (Documentation)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSHM 3F</p>
                                    <p class="text-gray-500 text-xs mb-3">San Antonio, Ogbon, Nabua, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09925916353" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:jucabalquinto@my.cspc.edu.ph" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: February 25, 2004</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/p7cyYbM/Carl-Anthony-S-Acbang.jpg" alt="Carl Anthony S. Acbang" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-violet-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-file-alt text-violet-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Carl Anthony S. Acbang</h3>
                                    <p class="text-violet-600 font-semibold mb-3">Assistant Public Relations Officer (Documentation)</p>
                                    <p class="text-gray-600 text-sm mb-2">BSIT 2C</p>
                                    <p class="text-gray-500 text-xs mb-3">Aro-Aldao, Nabua, Camarines Sur</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09630322435" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:caacbang@my.cspc.edu.ph" class="text-violet-600 hover:text-violet-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: November 10, 2005</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assistant Auditors -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 text-center">Assistant Auditors</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/MkBwFyt1/Krystine-Joy-A-Gospe.jpg" alt="Krystine Joy A. Gospe" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-search-plus text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Krystine Joy A. Grospe</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Auditor</p>
                                    <p class="text-gray-600 text-sm mb-2">BSBA-FM 3A</p>
                                    <p class="text-gray-500 text-xs mb-3">San Isidro, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09814436795" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:krgrospe@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: December 7, 2004</p>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                                <div class="text-center">
                                    <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="https://i.ibb.co/ks6Dy8f2/Joel-Jr-R-Casyao.jpg" alt="Joel Jr. R. Casyao" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                            <i class="fas fa-search-plus text-blue-600 text-4xl"></i>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Joel Jr. R. Casyao</h3>
                                    <p class="text-blue-600 font-semibold mb-3">Assistant Auditor</p>
                                    <p class="text-gray-600 text-sm mb-2">BSN 4G</p>
                                    <p class="text-gray-500 text-xs mb-3">Sto. Ni-o, Iriga City</p>
                                    <div class="flex justify-center space-x-3 mb-3">
                                        <a href="tel:09708607218" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <a href="mailto:jocasyao@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <p class="text-gray-500 text-xs">Birthday: October 10, 2003</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Committee Directors Section -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Committee Directors</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Student Rights and Welfare Committee Director -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/MkqNqRGt/Santiago-III-F-Roldan.jpg" alt="Santiago III F. Roldan" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-balance-scale text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Santiago III F. Roldan</h3>
                                <p class="text-blue-600 font-semibold mb-3">Student Rights and Welfare Committee Director</p>
                                <p class="text-gray-600 text-sm mb-2">AB ELS 3A</p>
                                <p class="text-gray-500 text-xs mb-3">San Nicolas, Nabua, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09452501183" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:saroldan@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: August 23, 2004</p>
                            </div>
                        </div>

                        <!-- Gender and Development Committee Director -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/pjF9fy76/Jasmine-Claire-C-Tangtang.jpg" alt="Jasmine Claire C. Tangtang" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-rose-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-venus-mars text-rose-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Jasmine Claire C. Tangtang</h3>
                                <p class="text-rose-600 font-semibold mb-3">Gender and Development Committee Director</p>
                                <p class="text-gray-600 text-sm mb-2">BSN 3I</p>
                                <p class="text-gray-500 text-xs mb-3">Tandaay, Nabua, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09637765074" class="text-rose-600 hover:text-rose-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:jatangtang@my.cspc.edu.ph" class="text-rose-600 hover:text-rose-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: December 29, 2004</p>
                            </div>
                        </div>

                        <!-- Sports and Cultural Committee Director -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/9dGRPy3/Sheildon-I-Polvoriza.jpg" alt="Sheildon I. Polvoriza" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-trophy text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Sheildon I. Polvoriza</h3>
                                <p class="text-blue-600 font-semibold mb-3">Sports and Cultural Committee Director</p>
                                <p class="text-gray-600 text-sm mb-2">BSCE 4C</p>
                                <p class="text-gray-500 text-xs mb-3">La Trinidad, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09929891643" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:shpolvoriza@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: December 15, 2003</p>
                            </div>
                        </div>

                        <!-- Environmental Concerns Committee Director -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/pjLXvKt2/Sannydel-E-Bersabe.jpg" alt="Sannydel E. Bersabe" class="w-full h-full object-cover" loading="lazy" decoding="async" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display: none;">
                                        <i class="fas fa-leaf text-blue-600 text-4xl"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Sannydel E. Bersabe</h3>
                                <p class="text-blue-600 font-semibold mb-3">Environmental Concerns Committee Director</p>
                                <p class="text-gray-600 text-sm mb-2">BSN 2C</p>
                                <p class="text-gray-500 text-xs mb-3">Santiago Old, Nabua, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-3">
                                    <a href="tel:09514305238" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                    <a href="mailto:sabersabe@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                                <p class="text-gray-500 text-xs">Birthday: May 14, 2006</p>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- 2026-2027 Officers - Coming Soon -->
            <div id="officers-2026" class="officers-content hidden" role="tabpanel" aria-labelledby="tab-2026" style="display: none;">
                <div class="flex flex-col items-center justify-center py-20 px-4" style="min-height: 400px;">
                    <div class="text-center max-w-md">
                        <div class="mb-6">
                            <i class="fas fa-clock text-blue-600 text-6xl mb-4"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Coming Soon</h3>
                        <p class="text-lg text-gray-600 mb-6">
                            The officers for Academic Year 2026-2027 will be announced soon.
                        </p>
                        <div class="inline-flex items-center gap-2 px-6 py-3 bg-blue-50 text-blue-600 rounded-lg border border-blue-200">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="font-semibold">Academic Year 2026-2027</span>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end #officers-tab-content -->
        </div><!-- end max-w-7xl -->
    </section>

<?php include 'includes/footer.php'; ?>
    <script>
    // Initialize Flowbite tabs manually to ensure proper functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('#officers-tab button[role="tab"]');
        const tabPanels = document.querySelectorAll('#officers-tab-content > div[role="tabpanel"]');
        
        console.log('Tab buttons found:', tabButtons.length);
        console.log('Tab panels found:', tabPanels.length);
        
        // Function to switch tabs
        function switchTab(targetId) {
            console.log('Switching to tab:', targetId);
            
            // Hide all panels using inline style
            tabPanels.forEach(panel => {
                panel.style.display = 'none';
            });
            
            // Remove active state from all buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('border-blue-600', 'text-blue-600');
                btn.classList.add('border-transparent', 'text-gray-500', 'hover:text-blue-600', 'hover:border-blue-300');
                btn.setAttribute('aria-selected', 'false');
            });
            
            // Show target panel using inline style
            const targetPanel = document.querySelector(targetId);
            console.log('Target panel found:', targetPanel ? 'yes' : 'no');
            if (targetPanel) {
                targetPanel.style.display = 'block';
                console.log('Panel display style:', targetPanel.style.display);
            }
            
            // Activate clicked button
            const activeButton = document.querySelector(`button[data-tabs-target="${targetId}"]`);
            if (activeButton) {
                activeButton.classList.add('border-blue-600', 'text-blue-600');
                activeButton.classList.remove('border-transparent', 'text-gray-500', 'hover:text-blue-600', 'hover:border-blue-300');
                activeButton.setAttribute('aria-selected', 'true');
            }
        }
        
        // Add click handlers to tab buttons
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-tabs-target');
                switchTab(targetId);
                
                // Clear search when switching tabs
                const searchInput = document.getElementById('officer-search');
                if (searchInput) {
                    searchInput.value = '';
                    filterOfficers('');
                }
            });
        });
        
        // Initialize default tab (2025-2026)
        switchTab('#officers-2025');
    });

    function filterOfficers(query) {
        const q = query.toLowerCase().trim();
        document.querySelectorAll('#officers-tab-content .bg-white.rounded-xl.shadow-lg').forEach(card => {
            const name = (card.querySelector('h3')?.textContent || '').toLowerCase();
            const roleEl = card.querySelector('p.font-semibold') || card.querySelector('[class*="font-semibold"]');
            const role = (roleEl?.textContent || '').toLowerCase();
            card.style.display = (!q || name.includes(q) || role.includes(q)) ? '' : 'none';
        });
    }
    </script>
</body>
</html>