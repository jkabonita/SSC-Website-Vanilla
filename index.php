<?php
session_start();
require_once "config/database.php";

// Dynamic counts from DB — single query with GROUP BY
$doc_count = $treas_count = $legis_count = $sec_count = 0;
$_counts_res = mysqli_query($conn, "SELECT category, COUNT(*) AS total FROM documents GROUP BY category");
if ($_counts_res) {
    while ($r = mysqli_fetch_assoc($_counts_res)) {
        $doc_count += (int)$r['total'];
        if ($r['category'] === 'treasurer')   $treas_count = (int)$r['total'];
        elseif ($r['category'] === 'legislative') $legis_count = (int)$r['total'];
        elseif ($r['category'] === 'secretary')   $sec_count   = (int)$r['total'];
    }
    mysqli_free_result($_counts_res);
}

// Get current event banner photo
$event_photo = null;
$_ep = mysqli_query($conn, "SELECT setting_value FROM site_settings WHERE setting_key='event_photo'");
if($_ep){
    $_ep_row = mysqli_fetch_assoc($_ep);
    if($_ep_row && !empty($_ep_row['setting_value']) && file_exists($_ep_row['setting_value'])){
        $event_photo = $_ep_row['setting_value'];
    }
    mysqli_free_result($_ep);
}

$page_title       = 'CSPC — Supreme Student Council | Home';
$page_description = 'Promoting transparency and student welfare through accessible documentation and information sharing. Empowering students through leadership, service, and advocacy.';
$current_page     = 'home';
include 'includes/head.php';
?>

<body class="bg-gray-50 font-sans min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

    <!-- Hero Section -->
    <section class="gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-white animate-slide-up">
                    <div class="flex items-center space-x-4 mb-6">
                        <img src="https://i.ibb.co/Cp38FdLC/logo.png" alt="CSPC-SSC Logo" class="h-20 w-20 object-contain bg-white rounded-full p-2">
                        <div>
                            <h1 class="text-4xl md:text-5xl font-bold mb-4">CSPC Supreme Student Council</h1>
                            <p class="text-xl text-blue-100">Academic Year 2025-2026</p>
                        </div>
                    </div>
                    <p class="text-lg text-blue-100 mb-8 leading-relaxed">
                        Promoting transparency and student welfare through accessible documentation and information sharing. 
                        Empowering students through leadership, service, and advocacy.
                    </p>
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
                        <a href="officers.php"
                           class="text-blue-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-white/50 font-semibold rounded-lg text-sm px-6 py-3 text-center transition-colors">
                            <i class="fas fa-users mr-2"></i>View Officers
                        </a>
                        <a href="documents.php"
                           class="text-white bg-white/20 hover:bg-white/30 focus:ring-4 focus:ring-white/30 font-semibold rounded-lg text-sm px-6 py-3 text-center border border-white/40 transition-colors backdrop-blur-sm">
                            <i class="fas fa-users mr-2"></i>Documents
                        </a>
                        <button onclick="document.getElementById('aboutModal').classList.remove('hidden')"
                                class="text-white bg-white/20 hover:bg-white/30 focus:ring-4 focus:ring-white/30 font-semibold rounded-lg text-sm px-6 py-3 text-center border border-white/40 transition-colors backdrop-blur-sm">
                            <i class="fas fa-info-circle mr-2"></i>About Platform
                        </button>
                    </div>
                </div>
                <div class="animate-bounce-in mt-6 lg:mt-0 w-full max-w-xs sm:max-w-sm lg:max-w-full mx-auto">
                    <?php if($event_photo): ?>
                    <div class="rounded-2xl overflow-hidden shadow-2xl border-2 border-white/30">
                        <div class="glass-effect px-4 py-2.5 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-white"></i>
                            <p class="text-white text-sm font-semibold">Upcoming Event</p>
                        </div>
                        <div class="w-full" style="aspect-ratio:1/1;">
                            <img src="<?php echo htmlspecialchars($event_photo); ?>"
                                 alt="Upcoming Event"
                                 class="w-full h-full object-cover block">
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="glass-effect rounded-2xl p-8 flex flex-col items-center justify-center text-center" style="aspect-ratio:1/1; max-height:320px;">
                        <i class="fas fa-calendar-alt text-5xl text-white/40 mb-4"></i>
                        <p class="text-white font-semibold mb-1">No Upcoming Event</p>
                        <p class="text-blue-100 text-sm">Check back soon for announcements.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Strip (moved from hero) -->
    <section class="bg-blue-700 border-b border-blue-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 text-center">
                <div class="py-2">
                    <div class="bg-white/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-alt text-xl text-white"></i>
                    </div>
                    <h3 class="text-white font-semibold text-sm">Transparency</h3>
                    <p class="text-blue-200 text-xs">Open access to all documents</p>
                </div>
                <div class="py-2">
                    <div class="bg-white/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-handshake text-xl text-white"></i>
                    </div>
                    <h3 class="text-white font-semibold text-sm">Leadership</h3>
                    <p class="text-blue-200 text-xs">Student-driven initiatives</p>
                </div>
                <div class="py-2">
                    <div class="bg-white/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-heart text-xl text-white"></i>
                    </div>
                    <h3 class="text-white font-semibold text-sm">Service</h3>
                    <p class="text-blue-200 text-xs">Dedicated to student welfare</p>
                </div>
                <div class="py-2">
                    <div class="bg-white/20 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-bullhorn text-xl text-white"></i>
                    </div>
                    <h3 class="text-white font-semibold text-sm">Advocacy</h3>
                    <p class="text-blue-200 text-xs">Voice of the student body</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Documents Overview Section -->
    <section class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Official Documents</h2>
                <p class="text-gray-500 text-sm mt-1">Publicly accessible SSC records by category</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- Total -->
                <div class="bg-blue-600 rounded-2xl p-6 text-white flex items-center gap-5 shadow-lg">
                    <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-folder-open text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-4xl font-extrabold"><?php echo $doc_count; ?></p>
                        <p class="text-blue-100 text-sm font-medium mt-0.5">Total Documents</p>
                        <a href="documents.php" class="inline-flex items-center gap-1 text-xs text-white/80 hover:text-white mt-1 transition-colors">
                            Browse all <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Treasurer -->
                <div class="bg-white border-2 border-blue-100 rounded-2xl p-6 flex items-center gap-5 shadow hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-coins text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-4xl font-extrabold text-blue-700"><?php echo $treas_count; ?></p>
                        <p class="text-gray-600 text-sm font-medium mt-0.5">Treasurer Files</p>
                        <a href="documents.php?section=treasurer" class="inline-flex items-center gap-1 text-xs text-blue-500 hover:text-blue-700 mt-1 transition-colors">
                            View files <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                        <div class="flex items-center gap-2 mt-2 border-t border-blue-50 pt-2">
                                <img src="https://i.ibb.co/HTrbn079/Treasurer.jpg" alt="Jessil C. Martinez"
                                     class="w-7 h-7 rounded-full object-cover border border-blue-200 flex-shrink-0"
                                     onerror="this.style.display='none'">
                                <p class="text-xs text-blue-400 leading-tight"><span class="font-medium text-blue-500">Jessil C. Martinez</span><br><span class="text-blue-300">Treasurer &bull; AY 2025&ndash;2026</span></p>
                            </div>
                    </div>
                </div>

                <!-- Legislative -->
                <div class="bg-white border-2 border-indigo-100 rounded-2xl p-6 flex items-center gap-5 shadow hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-gavel text-indigo-600 text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-4xl font-extrabold text-indigo-700"><?php echo $legis_count; ?></p>
                        <p class="text-gray-600 text-sm font-medium mt-0.5">Legislative Files</p>
                        <a href="documents.php?section=legislative" class="inline-flex items-center gap-1 text-xs text-indigo-500 hover:text-indigo-700 mt-1 transition-colors">
                            View files <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Secretary -->
                <div class="bg-white border-2 border-green-100 rounded-2xl p-6 flex items-center gap-5 shadow hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-pen-nib text-green-600 text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-4xl font-extrabold text-green-700"><?php echo $sec_count; ?></p>
                        <p class="text-gray-600 text-sm font-medium mt-0.5">Secretary Files</p>
                        <a href="documents.php?section=secretary" class="inline-flex items-center gap-1 text-xs text-green-500 hover:text-green-700 mt-1 transition-colors">
                            View files <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                        <div class="flex items-center gap-2 mt-2 border-t border-green-50 pt-2">
                                <img src="https://i.ibb.co/JRSsqCTX/Secretary.jpg" alt="Ralph Joefrancis D. Abonal"
                                     class="w-7 h-7 rounded-full object-cover border border-green-200 flex-shrink-0"
                                     onerror="this.style.display='none'">
                                <p class="text-xs text-green-400 leading-tight"><span class="font-medium text-green-500">Ralph Joefrancis D. Abonal</span><br><span class="text-green-300">Secretary &bull; AY 2025&ndash;2026</span></p>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Executive Officers Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Executive Officers</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Meet our dedicated team of student leaders who work tirelessly to serve the CSPC community.
                </p>
            </div>

            <!-- Year tabs -->
            <div class="flex justify-center mb-8">
                <div class="border-b border-gray-200">
                    <ul class="flex -mb-px text-sm font-medium text-center text-gray-500"
                        id="exec-tab" data-tabs-toggle="#exec-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg border-transparent text-gray-500 hover:text-blue-600 hover:border-blue-300"
                                    id="exec-tab-2024"
                                    data-tabs-target="#exec-2024"
                                    type="button" role="tab"
                                    aria-controls="exec-2024"
                                    aria-selected="false">
                                Academic Year 2024-2025
                            </button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg border-blue-600 text-blue-600"
                                    id="exec-tab-2025"
                                    data-tabs-target="#exec-2025"
                                    type="button" role="tab"
                                    aria-controls="exec-2025"
                                    aria-selected="true">
                                Academic Year 2025-2026
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="exec-tab-content">
                <!-- 2024-2025 Executive Officers -->
                <div id="exec-2024" class="hidden" role="tabpanel" aria-labelledby="exec-tab-2024">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        <!-- President -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/3mgcdnpp/Trixia-Kate-Morata.png" alt="Trixia Kate S. Morata" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-crown text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Trixia Kate S. Morata</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">President and Student Trustee</p>
                                <p class="text-gray-600 text-xs mb-1">AB English 4B</p>
                                <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09638466140" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:trmorata@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: April 11, 2001</p>
                            </div>
                        </div>

                        <!-- VP Internal -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/9C4r0wd/Ann-Kyla-Aquiler.png" alt="Ann Kyla V. Aquiler" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-user-tie text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Ann Kyla V. Aquiler</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Vice President for Internal Affairs</p>
                                <p class="text-gray-600 text-xs mb-1">BSN 3A</p>
                                <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09203108574" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:anaquiler@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: October 10, 2003</p>
                            </div>
                        </div>

                        <!-- VP External -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/VcZPrL4r/Judah-Espero.png" alt="Judah Paulo Espero" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-handshake text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Judah Paulo Espero</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Vice President for External Affairs</p>
                                <p class="text-gray-600 text-xs mb-1">BSM 4A</p>
                                <p class="text-gray-500 text-xs mb-3">Sto. Domingo, Nabua, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09460007334" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:jpespero@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: July 21, 2003</p>
                            </div>
                        </div>

                        <!-- Secretary -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/VcQ6gzh8/Allyza-Mae-Paz.png" alt="Allyza Mae N. Paz" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-pen text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Allyza Mae N. Paz</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Secretary</p>
                                <p class="text-gray-600 text-xs mb-1">BSCE 3C</p>
                                <p class="text-gray-500 text-xs mb-3">Perpetual Help, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09384893000" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:alpaz@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: September 14, 2003</p>
                            </div>
                        </div>

                        <!-- Treasurer -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/WvwNbFN7/Jessil-Martinez.png" alt="Jessil C. Martinez" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-coins text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Jessil C. Martinez</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Treasurer</p>
                                <p class="text-gray-600 text-xs mb-1">BSBA FM 2A</p>
                                <p class="text-gray-500 text-xs mb-3">&nbsp;</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09566429351" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:jessmartinez@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: July 23, 2002</p>
                            </div>
                        </div>

                        <!-- Property Custodian -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/xbSDB8H/Sheildon-Polvoriza.png" alt="Sheildon I. Polvoriza" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-box text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Sheildon I. Polvoriza</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Property Custodian</p>
                                <p class="text-gray-600 text-xs mb-1">BSCE 3C</p>
                                <p class="text-gray-500 text-xs mb-3">La Trinidad, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09929891643" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:shpolvoriza@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: December 15, 2002</p>
                            </div>
                        </div>

                        <!-- Auditor -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/4nG9xDzS/Xavier-Gabalfin.png" alt="Mark Xavier L. Gabalfin" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-search text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Mark Xavier L. Gabalfin</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Auditor</p>
                                <p class="text-gray-600 text-xs mb-1">BSN 4D</p>
                                <p class="text-gray-500 text-xs mb-3">San Miguel, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09810031551" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:magabalfin@cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: November 10, 2002</p>
                            </div>
                        </div>

                        <!-- PRO -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/nsQ5jdxY/Amanda-Lazaro.png" alt="Armando C. Lazaro III" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-bullhorn text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Armando C. Lazaro III</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Public Relations Officer</p>
                                <p class="text-gray-600 text-xs mb-1">AB English 2B</p>
                                <p class="text-gray-500 text-xs mb-3">Luluasan, Balatan, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09277216072" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:arlazaro@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: June 11, 2004</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- 2025-2026 Executive Officers -->
                <div id="exec-2025" role="tabpanel" aria-labelledby="exec-tab-2025">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        <!-- President -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/FkSQNz0b/President-and-Student-Trustee.jpg" alt="Ann Kyla V. Aquiler" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-crown text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Ann Kyla V. Aquiler</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">President and Student Trustee</p>
                                <p class="text-gray-600 text-xs mb-1">BSN 4A</p>
                                <p class="text-gray-500 text-xs mb-3">San Francisco, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09511818907" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:anaquiler@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: October 10, 2003</p>
                            </div>
                        </div>

                        <!-- VP Internal -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/XZk2knwQ/Allyza-Mae-N-Paz.jpg" alt="Allyza Mae N. Paz" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-user-tie text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Allyza Mae N. Paz</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Vice President for Internal Affairs</p>
                                <p class="text-gray-600 text-xs mb-1">BSCE 4C</p>
                                <p class="text-gray-500 text-xs mb-3">Perpetual Help, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09384893000" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:alpaz@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: September 14, 2003</p>
                            </div>
                        </div>

                        <!-- VP External -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/MyFPp15F/Vice-President-for-External-Affairs.jpg" alt="Armando III C. Lazaro" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-handshake text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Armando III C. Lazaro</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Vice President for External Affairs</p>
                                <p class="text-gray-600 text-xs mb-1">AB ELS 3B</p>
                                <p class="text-gray-500 text-xs mb-3">Luluasan, Balatan, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09277216072" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:arlazaro@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: June 11, 2004</p>
                            </div>
                        </div>

                        <!-- Secretary -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/JRSsqCTX/Secretary.jpg" alt="Ralph Joefrancis D. Abonal" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-pen text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Ralph Joefrancis D. Abonal</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Secretary</p>
                                <p class="text-gray-600 text-xs mb-1">BPA 3B</p>
                                <p class="text-gray-500 text-xs mb-3">San Juan, Nabua, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09690264216" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:raabonal@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: September 14, 2004</p>
                            </div>
                        </div>

                        <!-- Treasurer -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/HTrbn079/Treasurer.jpg" alt="Jessil C. Martinez" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-coins text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Jessil C. Martinez</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Treasurer</p>
                                <p class="text-gray-600 text-xs mb-1">BSBA-FM 3A</p>
                                <p class="text-gray-500 text-xs mb-3">Sagrada, Baao, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09674179185" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:jessmartinez@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: September 15, 2005</p>
                            </div>
                        </div>

                        <!-- Property Custodian -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/Mxy45brP/Jester-Sumpay.png" alt="Jester Carl SJ. Sumpay" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-box text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Jester Carl SJ. Sumpay</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Property Custodian</p>
                                <p class="text-gray-600 text-xs mb-1">BSN 3F</p>
                                <p class="text-gray-500 text-xs mb-3">Salvacion, Iriga City</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09271191805" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:jessumpay@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: February 24, 2004</p>
                            </div>
                        </div>

                        <!-- Auditor -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/Kg9v009/Auditor.jpg" alt="Joberth B. Iballar" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-search text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Joberth B. Iballar</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Auditor</p>
                                <p class="text-gray-600 text-xs mb-1">BSCE 4A</p>
                                <p class="text-gray-500 text-xs mb-3">Sta. Justina, Buhi, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09850594056" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:joiballar@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: October 12, 2004</p>
                            </div>
                        </div>

                        <!-- PRO -->
                        <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="w-32 h-40 mx-auto mb-4 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                    <img src="https://i.ibb.co/S4krB0Dq/Public-Relations-Officer.jpg" alt="Jeriel L. Agua" class="w-full h-full object-cover" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="bg-blue-100 rounded-lg w-32 h-40 flex items-center justify-center" style="display:none;"><i class="fas fa-bullhorn text-blue-600 text-4xl"></i></div>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Jeriel L. Agua</h3>
                                <p class="text-blue-600 font-semibold text-sm mb-2">Public Relations Officer</p>
                                <p class="text-gray-600 text-xs mb-1">BSBA-FM 2B</p>
                                <p class="text-gray-500 text-xs mb-3">San Buena, Buhi, Camarines Sur</p>
                                <div class="flex justify-center space-x-3 mb-2">
                                    <a href="tel:09489087139" class="text-blue-600 hover:text-blue-700"><i class="fas fa-phone"></i></a>
                                    <a href="mailto:jeagua@my.cspc.edu.ph" class="text-blue-600 hover:text-blue-700"><i class="fas fa-envelope"></i></a>
                                </div>
                                <p class="text-gray-400 text-xs">Birthday: January 5, 2005</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="officers.php" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                    <i class="fas fa-users mr-2"></i>View All Officers
                </a>
            </div>
        </div>
    </section>

    <!-- About This Platform -->
    <section class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700 mb-5">
                <i class="fas fa-laptop-code mr-2"></i>Development Team
            </span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">About This Platform</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                This information disclosure system was proposed and developed by dedicated SSC officers to promote transparency, financial accountability, and accessible documentation for the CSPC student body.
            </p>
            <button onclick="document.getElementById('aboutModal').classList.remove('hidden')"
                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors shadow-lg">
                <i class="fas fa-users mr-2"></i>Meet the Proposers
            </button>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 gradient-bg">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Get Involved with CSPC - Supreme Student Council</h2>
            <p class="text-xl text-blue-100 mb-8">
                Join us in making a difference in the CSPC community. Your voice matters, and together we can create positive change.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="officers.php"
                   class="text-blue-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-white/50 font-semibold rounded-lg text-sm px-8 py-3 text-center transition-colors">
                    <i class="fas fa-users mr-2"></i>Meet the Officers
                </a>
                <a href="documents.php"
                   class="text-white bg-white/20 hover:bg-white/30 focus:ring-4 focus:ring-white/30 font-semibold rounded-lg text-sm px-8 py-3 text-center border border-white/40 transition-colors backdrop-blur-sm">
                    <i class="fas fa-file-alt mr-2"></i>Browse Documents
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->

    <!-- ============================================================
         ABOUT THIS PLATFORM MODAL
         ============================================================ -->
    <!-- Scrollable overlay — the overlay itself scrolls so the modal always fits any screen height -->
    <div id="aboutModal"
         class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/60"
         onclick="if(event.target===this||event.target.id==='aboutModalInner') document.getElementById('aboutModal').classList.add('hidden')">
        <div id="aboutModalInner" class="min-h-full flex items-center justify-center p-3 sm:p-6">
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl w-full max-w-5xl my-4 animate-slide-up relative">

            <!-- Modal Header — compact on mobile -->
            <div class="gradient-bg rounded-t-2xl sm:rounded-t-3xl px-4 py-4 sm:px-8 sm:py-8 text-center relative">
                <button onclick="document.getElementById('aboutModal').classList.add('hidden')"
                        class="absolute top-3 right-4 text-white/70 hover:text-white transition-colors text-xl leading-none"
                        aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                <div class="flex items-center justify-center gap-3 mb-1 sm:mb-3">
                    <img src="https://i.ibb.co/Cp38FdLC/logo.png" alt="SSC Logo"
                         class="h-10 w-10 sm:h-16 sm:w-16 object-contain bg-white rounded-full p-1.5 sm:p-2 flex-shrink-0">
                    <div class="text-left">
                        <h2 class="text-lg sm:text-2xl md:text-3xl font-bold text-white leading-tight">About This Platform</h2>
                        <p class="text-blue-100 text-xs sm:text-sm mt-0.5">TransFormation &mdash; SSC Information Disclosure System</p>
                    </div>
                </div>
                <p class="hidden sm:block text-blue-100 text-sm max-w-xl mx-auto leading-relaxed mt-2">
                    Developed by SSC officers to promote transparency, financial accountability, and accessible documentation for the CSPC student body.
                </p>
            </div>

            <!-- Developers Grid -->
            <div class="p-3 sm:p-6 md:p-8">
                <p class="text-center text-gray-400 text-xs font-semibold uppercase tracking-widest mb-3 sm:mb-5">
                    Platform Proposers &amp; Developers
                </p>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-4">

                    <!-- Jeriel Agua -->
                    <div onclick="openProfileModal('jeriel')" class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-2 sm:p-5 border border-blue-100 flex flex-col items-center text-center gap-2 sm:gap-3 cursor-pointer hover:shadow-lg transition-shadow">
                        <img src="https://i.ibb.co/FLSYqMqP/Jeriel-Agua.png" alt="Jeriel Agua"
                             class="flex-shrink-0 rounded-lg sm:rounded-xl object-cover shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44"
                             loading="lazy" decoding="async"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="bg-blue-600 rounded-lg sm:rounded-xl flex-shrink-0 flex items-center justify-center shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44" style="display: none;">
                            <i class="fas fa-bullhorn text-white text-lg sm:text-3xl"></i>
                        </div>
                        <div class="min-w-0 w-full">
                            <h4 class="font-bold text-gray-900 text-xs sm:text-base leading-tight">Jeriel Agua</h4>
                            <p class="text-blue-600 font-semibold text-xs sm:text-sm mb-1 sm:mb-2">PRO</p>
                            <span class="inline-block bg-blue-600 text-white font-medium rounded-full leading-snug"
                                  style="font-size:9px;padding:2px 7px;">
                                <span class="hidden sm:inline">TransFormation: An Information Disclosure System</span>
                                <span class="sm:hidden">TransFormation</span>
                            </span>
                        </div>
                    </div>

                    <!-- Jessil C. Martinez -->
                    <div onclick="openProfileModal('jessil')" class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-2 sm:p-5 border border-blue-100 flex flex-col items-center text-center gap-2 sm:gap-3 cursor-pointer hover:shadow-lg transition-shadow">
                        <img src="https://i.ibb.co/WvwNbFN7/Jessil-Martinez.png" alt="Jessil C. Martinez"
                             class="flex-shrink-0 rounded-lg sm:rounded-xl object-cover shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44"
                             loading="lazy" decoding="async"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="bg-blue-500 rounded-lg sm:rounded-xl flex-shrink-0 flex items-center justify-center shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44" style="display: none;">
                            <i class="fas fa-coins text-white text-lg sm:text-3xl"></i>
                        </div>
                        <div class="min-w-0 w-full">
                            <h4 class="font-bold text-gray-900 text-xs sm:text-base leading-tight">Jessil C. Martinez</h4>
                            <p class="text-blue-600 font-semibold text-xs sm:text-sm mb-1 sm:mb-2">Treasurer</p>
                            <span class="inline-block bg-blue-600 text-white font-medium rounded-full leading-snug"
                                  style="font-size:9px;padding:2px 7px;">
                                <span class="hidden sm:inline">FinTech: Empowering Financial Transparency</span>
                                <span class="sm:hidden">FinTech</span>
                            </span>
                        </div>
                    </div>

                    <!-- Ralph Joefrancis Abonal -->
                    <div onclick="openProfileModal('ralph')" class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-2 sm:p-5 border border-blue-100 flex flex-col items-center text-center gap-2 sm:gap-3 cursor-pointer hover:shadow-lg transition-shadow">
                        <img src="https://i.ibb.co/Cp00D5nf/Ralph-Joefrancis-Abonal.png" alt="Ralph Joefrancis Abonal"
                             class="flex-shrink-0 rounded-lg sm:rounded-xl object-cover shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44"
                             loading="lazy" decoding="async"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="bg-blue-600 rounded-lg sm:rounded-xl flex-shrink-0 flex items-center justify-center shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44" style="display: none;">
                            <i class="fas fa-pen-nib text-white text-lg sm:text-3xl"></i>
                        </div>
                        <div class="min-w-0 w-full">
                            <h4 class="font-bold text-gray-900 text-xs sm:text-base leading-tight">Ralph Abonal</h4>
                            <p class="text-blue-600 font-semibold text-xs sm:text-sm mb-1 sm:mb-2">Secretary</p>
                            <span class="inline-block bg-blue-600 text-white font-medium rounded-full leading-snug"
                                  style="font-size:9px;padding:2px 7px;">
                                <span class="hidden sm:inline">Document Management and Tracking for Council Files</span>
                                <span class="sm:hidden">Doc. Management</span>
                            </span>
                        </div>
                    </div>

                    <!-- Jancee Kenn Abonita -->
                    <div onclick="openProfileModal('jancee')" class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-2 sm:p-5 border border-blue-100 flex flex-col items-center text-center gap-2 sm:gap-3 cursor-pointer hover:shadow-lg transition-shadow">
                        <img src="https://i.ibb.co/5hvDh0Dj/Jancee-Kenn-Abonita.png" alt="Jancee Kenn Abonita"
                             class="flex-shrink-0 rounded-lg sm:rounded-xl object-cover shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44"
                             loading="lazy" decoding="async"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="bg-blue-500 rounded-lg sm:rounded-xl flex-shrink-0 flex items-center justify-center shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44" style="display: none;">
                            <i class="fas fa-code text-white text-lg sm:text-3xl"></i>
                        </div>
                        <div class="min-w-0 w-full">
                            <h4 class="font-bold text-gray-900 text-xs sm:text-base leading-tight">Jancee Kenn Abonita</h4>
                            <p class="text-blue-600 font-semibold text-xs sm:text-sm mb-1 sm:mb-2">P.R.O. Technical Director</p>
                            <span class="inline-block bg-blue-600 text-white font-medium rounded-full leading-snug"
                                  style="font-size:9px;padding:2px 7px;">
                                <span class="hidden sm:inline">Platform Architecture &amp; Development Lead</span>
                                <span class="sm:hidden">Development Lead</span>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Joberth Iballar -->
                    <div onclick="openProfileModal('joberth')" class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-2 sm:p-5 border border-blue-100 flex flex-col items-center text-center gap-2 sm:gap-3 cursor-pointer hover:shadow-lg transition-shadow">
                        <img src="https://i.ibb.co/Qv1rPHBq/Joberth-Iballar.png" 
                             alt="Joberth Iballar"
                             class="flex-shrink-0 rounded-lg sm:rounded-xl object-cover shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44"
                             loading="lazy" decoding="async"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="bg-blue-600 rounded-lg sm:rounded-xl flex-shrink-0 flex items-center justify-center shadow-md border-2 border-blue-200 w-14 h-20 sm:w-32 sm:h-44" style="display: none;">
                            <i class="fas fa-search text-white text-lg sm:text-3xl"></i>
                        </div>
                        <div class="min-w-0 w-full">
                            <h4 class="font-bold text-gray-900 text-xs sm:text-base leading-tight">Joberth Iballar</h4>
                            <p class="text-blue-600 font-semibold text-xs sm:text-sm mb-1 sm:mb-2">Auditor</p>
                            <span class="inline-block bg-blue-600 text-white font-medium rounded-full leading-snug" style="font-size:9px;padding:2px 7px;">
                                <span class="hidden sm:inline">E-Audit Compass</span>
                                <span class="sm:hidden">E-Audit Compass</span>
                            </span>
                        </div>
                    </div>

                </div>

                <p class="text-center text-gray-400 text-xs mt-4 pt-3 sm:mt-6 sm:pt-4 border-t border-gray-100">
                    Academic Year 2025&ndash;2026 &bull; <br> CSPC Supreme Student Council
                </p>
            </div>
        </div>
        </div>
    </div>

    <!-- ============================================================
         INDIVIDUAL PROFILE MODALS
         ============================================================ -->
    
    <!-- Profile Modal Container -->
    <div id="profileModal" class="hidden fixed inset-0 z-[60] overflow-y-auto bg-black/70" onclick="if(event.target===this||event.target.id==='profileModalInner') closeProfileModal()">
        <div id="profileModalInner" class="min-h-full flex items-center justify-center p-3 sm:p-6">
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl w-full max-w-2xl my-4 animate-slide-up relative">
                
                <!-- Modal Header -->
                <div class="gradient-bg rounded-t-2xl sm:rounded-t-3xl px-6 py-6 text-center relative">
                    <button onclick="closeProfileModal()" class="absolute top-3 right-4 text-white/70 hover:text-white transition-colors text-xl" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="flex flex-col items-center gap-4">
                        <img id="profileImage" src="" alt="" class="w-32 h-44 object-cover rounded-xl shadow-lg border-4 border-white" loading="lazy" decoding="async">
                        <div>
                            <h2 id="profileName" class="text-2xl md:text-3xl font-bold text-white"></h2>
                            <p id="profileCurrentRole" class="text-blue-100 text-sm mt-1"></p>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6 md:p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-history text-blue-600"></i>
                        Position History
                    </h3>
                    <div id="profileHistory" class="space-y-3">
                        <!-- History items will be inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Profile data
        const profiles = {
            jeriel: {
                name: 'Jeriel Agua',
                image: 'https://i.ibb.co/FLSYqMqP/Jeriel-Agua.png',
                currentRole: 'P.R.O. AY 2025-2026',
                history: [
                    { year: '2025-2026', position: 'P.R.O.' },
                    { year: '2024-2025', position: 'Assistant P.R.O. Multimedia and Design Officer' }
                ]
            },
            jessil: {
                name: 'Jessil C. Martinez',
                image: 'https://i.ibb.co/WvwNbFN7/Jessil-Martinez.png',
                currentRole: 'Treasurer AY 2025-2026',
                history: [
                    { year: '2025-2026', position: 'Treasurer' },
                    { year: '2024-2025', position: 'Treasurer' }
                ]
            },
            ralph: {
                name: 'Ralph Joefrancis Abonal',
                image: 'https://i.ibb.co/Cp00D5nf/Ralph-Joefrancis-Abonal.png',
                currentRole: 'Secretary AY 2025-2026',
                history: [
                    { year: '2025-2026', position: 'Secretary' },
                    { year: '2024-2025', position: 'Assistant Secretary' }
                ]
            },
            jancee: {
                name: 'Jancee Kenn Abonita',
                image: 'https://i.ibb.co/5hvDh0Dj/Jancee-Kenn-Abonita.png',
                currentRole: 'Assistant P.R.O. Technical Director AY 2025-2026',
                history: [
                    { year: '2025-2026', position: 'Assistant P.R.O. Technical Director' },
                    { year: '2024-2025', position: 'Assistant P.R.O. Multimedia and Design Officer/Technical' }
                ]
            },
            joberth: {
                name: 'Joberth Iballar',
                image: 'https://i.ibb.co/Qv1rPHBq/Joberth-Iballar.png',
                currentRole: 'Auditor AY 2025-2026',
                history: [
                    { year: '2025-2026', position: 'Auditor' },
                    { year: '2024-2025', position: 'Assistant Auditor' },
                    { year: '2023-2024', position: 'Environmental Concerns Committee Director' }
                ]
            }
        };

        function openProfileModal(profileId) {
            const profile = profiles[profileId];
            if (!profile) return;

            // Populate modal
            document.getElementById('profileImage').src = profile.image;
            document.getElementById('profileImage').alt = profile.name;
            document.getElementById('profileName').textContent = profile.name;
            document.getElementById('profileCurrentRole').textContent = profile.currentRole;

            // Build history
            const historyContainer = document.getElementById('profileHistory');
            historyContainer.innerHTML = profile.history.map((item, index) => `
                <div class="flex items-start gap-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm">
                        ${profile.history.length - index}
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-900">${item.position}</p>
                        <p class="text-sm text-gray-600">Academic Year ${item.year}</p>
                    </div>
                </div>
            `).join('');

            // Show modal
            document.getElementById('profileModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeProfileModal();
            }
        });
    </script>

<?php include 'includes/footer.php'; ?>
</body>
</html>