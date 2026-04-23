<footer class="bg-gray-900 text-white py-12 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Brand column -->
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <img src="https://i.ibb.co/Cp38FdLC/logo.png" alt="Logo"
                         class="h-9 w-9 object-contain bg-white/10 rounded-full p-1">
                    <span class="text-lg font-bold leading-tight">CSPC — Supreme Student Council</span>
                </div>
                <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                    Promoting transparency and student welfare through accessible documentation and information sharing.
                </p>
                <div class="flex space-x-2">
                    <a href="https://www.facebook.com/CSPC.SSC" target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 bg-gray-800 hover:bg-blue-600 text-gray-400 hover:text-white rounded-lg flex items-center justify-center transition-all">
                        <i class="fab fa-facebook text-sm"></i>
                    </a>
                 
                    <a href="https://www.instagram.com/cspcssc" target="_blank"
                       class="w-9 h-9 bg-gray-800 hover:bg-blue-600 text-gray-400 hover:text-white rounded-lg flex items-center justify-center transition-all">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Quick links -->
            <div>
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <?php
                    $footer_links = [
                        ['href' => 'index.php',     'label' => 'Home'],
                        ['href' => 'officers.php',  'label' => 'Officers'],
                        ['href' => 'documents.php', 'label' => 'Documents'],
                        ['href' => 'login.php',     'label' => 'Login'],
                    ];
                    foreach ($footer_links as $lnk): ?>
                        <li>
                            <a href="<?php echo $lnk['href']; ?>"
                               class="text-gray-400 hover:text-white text-sm transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-xs text-gray-600"></i>
                                <?php echo $lnk['label']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-4">Contact Info</h3>
                <div class="space-y-3">
                    <?php
                    $contacts = [
                        ['icon' => 'fa-map-marker-alt', 'text' => 'CSPC Main Campus'],
                   
                        ['icon' => 'fa-envelope',       'text' => 'ssc@cspc.edu.ph'],
                         ['icon' => 'fa-envelope',       'text' => 'sscservices@cspc.edu.ph'],
                    ];
                    foreach ($contacts as $c): ?>
                        <p class="flex items-center gap-3 text-sm text-gray-400">
                            <span class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas <?php echo $c['icon']; ?> text-xs"></i>
                            </span>
                            <?php echo $c['text']; ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-6 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-gray-500 text-sm">&copy; <?php echo date('Y'); ?> CSPC — Supreme Student Council. All rights reserved.</p>
            <p class="text-gray-600 text-xs">Academic Year 2025–2026</p>
        </div>
    </div>
</footer>

<!-- Flowbite JS (handles navbar collapse, modals, dropdowns, tooltips) -->
<script src="assets/js/flowbite.min.js"></script>
