<?php
/*
 * Shared navigation partial.
 * Expected variable (set before including):
 *   $current_page – one of: 'home', 'officers', 'documents', 'attendance', 'dashboard'
 */
$current_page = $current_page ?? '';

function nav_cls($page, $current) {
    $base = 'nav-link px-3 py-2 rounded-lg font-medium text-sm transition-colors ';
    return $base . ($page === $current ? 'active text-blue-600' : 'text-gray-600 hover:text-blue-600');
}
function mob_cls($page, $current) {
    $base = 'flex items-center px-3 py-2.5 rounded-lg font-medium text-sm ';
    return $base . ($page === $current ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50');
}
?>
<nav class="bg-white/95 backdrop-blur-sm shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Brand -->
            <div class="flex items-center">
                <a href="index.php" class="flex items-center space-x-3 group">
                    <img src="https://i.ibb.co/Cp38FdLC/logo.png" alt="SSC Logo"
                         class="h-9 w-9 object-contain transition-transform group-hover:scale-110">
                    <div class="flex flex-col leading-tight">
                        <span class="text-base font-bold text-gray-900">CSPC - SSC</span>
                        <span class="text-xs text-gray-500 hidden sm:block">Supreme Student Council</span>
                    </div>
                </a>
            </div>

            <!-- Desktop links -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="index.php"    class="<?php echo nav_cls('home',      $current_page); ?>">Home</a>
                <a href="officers.php" class="<?php echo nav_cls('officers',  $current_page); ?>">Officers</a>
                <a href="documents.php"class="<?php echo nav_cls('documents', $current_page); ?>">Documents</a>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                 
                    <a href="dashboard.php"  class="<?php echo nav_cls('dashboard',  $current_page); ?>">Dashboard</a>
                    <a href="logout.php"
                       class="ml-2 bg-red-50 hover:bg-red-500 text-red-600 hover:text-white px-4 py-2 rounded-lg font-medium text-sm transition-all border border-red-200 hover:border-red-500">
                        <i class="fas fa-sign-out-alt mr-1.5"></i>Logout
                    </a>
                <?php endif; ?>
            </div>

            <!-- Mobile hamburger -->
            <div class="md:hidden flex items-center">
                <button data-collapse-toggle="navbar-mobile" type="button"
                        class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                        aria-controls="navbar-mobile" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <i class="fas fa-bars text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="navbar-mobile" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg">
        <div class="px-3 pt-2 pb-3 space-y-1">
            <a href="index.php"    class="<?php echo mob_cls('home',      $current_page); ?>"><i class="fas fa-home w-5 mr-2 text-center"></i>Home</a>
            <a href="officers.php" class="<?php echo mob_cls('officers',  $current_page); ?>"><i class="fas fa-users w-5 mr-2 text-center"></i>Officers</a>
            <a href="documents.php"class="<?php echo mob_cls('documents', $current_page); ?>"><i class="fas fa-file-alt w-5 mr-2 text-center"></i>Documents</a>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
              
                <a href="dashboard.php"  class="<?php echo mob_cls('dashboard',  $current_page); ?>"><i class="fas fa-tachometer-alt w-5 mr-2 text-center"></i>Dashboard</a>
                <a href="logout.php"     class="flex items-center px-3 py-2.5 rounded-lg text-red-600 hover:bg-red-50 font-medium text-sm">
                    <i class="fas fa-sign-out-alt w-5 mr-2 text-center"></i>Logout
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>
