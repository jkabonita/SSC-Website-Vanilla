<?php
session_start();
require_once "config/database.php";

$section = isset($_GET['section']) ? $_GET['section'] : 'all';
$search  = isset($_GET['search'])  ? $_GET['search']  : '';
$documents = [];

$sql    = "SELECT d.id, d.original_name, d.file_path, d.category, d.display_name, d.created_at, u.name AS username, COALESCE(d.display_name, u.name) AS display_label FROM documents d JOIN users u ON d.uploaded_by = u.id";
$params = [];
$types  = "";

if ($section != 'all') {
    $sql      .= " WHERE d.category = ?";
    $params[]  = $section;
    $types    .= "s";
}

if (!empty($search)) {
    $sql          .= ($section != 'all' ? " AND" : " WHERE") . " (d.original_name LIKE ? OR d.description LIKE ?)";
    $search_param  = "%$search%";
    $params[]      = $search_param;
    $params[]      = $search_param;
    $types        .= "ss";
}

$sql .= " ORDER BY d.created_at DESC";

if ($stmt = mysqli_prepare($conn, $sql)) {
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $documents[] = $row;
        }
    }
    mysqli_stmt_close($stmt);
}

$section_names = [
    'treasurer'   => 'Treasurer File',
    'legislative' => 'Legislative File',
    'secretary'   => 'Secretary File',
];

$section_colors = [
    'treasurer'   => 'bg-blue-100 text-blue-800',
    'legislative' => 'bg-indigo-100 text-indigo-800',
    'secretary'   => 'bg-green-100 text-green-800',
];

$page_title       = 'Documents — CSPC Supreme Student Council';
$page_description = 'Access official documents, reports, and resources. Promoting transparency through accessible documentation.';
$current_page     = 'documents';
include 'includes/head.php';
?>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

    <!-- Hero Section -->
    <section class="gradient-bg py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Documents &amp; Resources</h1>
            <p class="text-blue-100 max-w-2xl mx-auto text-base">
                Official SSC documents &mdash; Treasurer, Legislative &amp; Secretary records.
            </p>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-4 bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row gap-3 items-center">
                <!-- Category Pill Buttons -->
                <div class="flex gap-2 flex-shrink-0">
                    <a href="documents.php<?php echo !empty($search) ? '?search='.urlencode($search) : ''; ?>"
                       class="px-4 py-2 rounded-full text-sm font-semibold border transition-colors <?php echo $section === 'all' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-gray-600 border-gray-300 hover:border-blue-400 hover:text-blue-600'; ?>">
                        All
                    </a>
                    <a href="documents.php?section=treasurer<?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>"
                       class="px-4 py-2 rounded-full text-sm font-semibold border transition-colors <?php echo $section === 'treasurer' ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-gray-600 border-gray-300 hover:border-blue-400 hover:text-blue-600'; ?>">
                        <i class="fas fa-coins mr-1"></i>Treasurer Files
                    </a>
                    <a href="documents.php?section=legislative<?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>"
                       class="px-4 py-2 rounded-full text-sm font-semibold border transition-colors <?php echo $section === 'legislative' ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white text-gray-600 border-gray-300 hover:border-indigo-400 hover:text-indigo-600'; ?>">
                        <i class="fas fa-gavel mr-1"></i>Legislative Files
                    </a>
                    <a href="documents.php?section=secretary<?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>"
                       class="px-4 py-2 rounded-full text-sm font-semibold border transition-colors <?php echo $section === 'secretary' ? 'bg-green-600 text-white border-green-600' : 'bg-white text-gray-600 border-gray-300 hover:border-green-400 hover:text-green-600'; ?>">
                        <i class="fas fa-pen-nib mr-1"></i>Secretary Files
                    </a>
                </div>
                <!-- Search Bar -->
                <form action="" method="GET" class="flex gap-2 flex-1 w-full">
                    <input type="hidden" name="section" value="<?php echo htmlspecialchars($section); ?>">
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-sm"></i>
                        </div>
                        <input type="text" name="search"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                               placeholder="Search documents&hellip;"
                               value="<?php echo htmlspecialchars($search); ?>">
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-lg font-medium text-sm transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                    <?php if (!empty($search)): ?>
                        <a href="documents.php<?php echo $section !== 'all' ? '?section='.urlencode($section) : ''; ?>"
                           class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-3 py-2.5 rounded-lg text-sm transition-colors" title="Clear search">
                            <i class="fas fa-times"></i>
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </section>

    <!-- Documents Section -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">
                        <?php echo $section == 'all' ? 'All Documents' : ($section_names[$section] ?? 'Documents'); ?>
                    </h2>
                    <p class="text-sm text-gray-500 mt-0.5">
                        <?php echo count($documents); ?> document<?php echo count($documents) != 1 ? 's' : ''; ?> found
                    </p>
                </div>
            </div>

            <?php
            $officer_cards = [
                'treasurer' => [
                    '2024' => ['name'=>'Jessil C. Martinez',        'role'=>'Treasurer',                    'course'=>'BSBA-FM 2A', 'img'=>'https://i.ibb.co/WvwNbFN7/Jessil-Martinez.png'],
                    '2025' => ['name'=>'Jessil C. Martinez',        'role'=>'Treasurer',                    'course'=>'BSBA-FM 3A', 'img'=>'https://i.ibb.co/HTrbn079/Treasurer.jpg'],
                ],
                'secretary' => [
                    '2024' => ['name'=>'Allyza Mae N. Paz',         'role'=>'Secretary',                    'course'=>'BSCE 3C',    'img'=>'https://i.ibb.co/VcQ6gzh8/Allyza-Mae-Paz.png'],
                    '2025' => ['name'=>'Ralph Joefrancis D. Abonal','role'=>'Secretary',                    'course'=>'BPA 3B',     'img'=>'https://i.ibb.co/JRSsqCTX/Secretary.jpg'],
                ],
                'legislative' => [
                    '2024' => ['name'=>'Ann Kyla V. Aquiler',       'role'=>'VP for Internal Affairs',      'course'=>'BSN 3A',     'img'=>'https://i.ibb.co/9C4r0wd/Ann-Kyla-Aquiler.png'],
                    '2025' => ['name'=>'Allyza Mae N. Paz',         'role'=>'VP for Internal Affairs',      'course'=>'BSCE 4C',    'img'=>'https://i.ibb.co/XZk2knwQ/Allyza-Mae-N-Paz.jpg'],
                ],
            ];
            $sec_colors = [
                'treasurer'   => ['border'=>'border-blue-300',  'ring'=>'ring-blue-100',  'badge'=>'bg-blue-50 text-blue-600',  'role'=>'text-blue-600'],
                'secretary'   => ['border'=>'border-green-300', 'ring'=>'ring-green-100', 'badge'=>'bg-green-50 text-green-600','role'=>'text-green-600'],
                'legislative' => ['border'=>'border-indigo-300','ring'=>'ring-indigo-100','badge'=>'bg-indigo-50 text-indigo-600','role'=>'text-indigo-600'],
            ];
            if (isset($officer_cards[$section])):
                $oc   = $officer_cards[$section];
                $col  = $sec_colors[$section];
            ?>
            <div class="flex flex-wrap items-end gap-4 mb-7">
                <!-- AY 2024-2025 — smaller / past -->
                <div class="bg-white rounded-xl border border-gray-200 shadow p-3 flex items-center gap-3 opacity-75 hover:opacity-100 transition-opacity">
                    <img src="<?php echo htmlspecialchars($oc['2024']['img']); ?>"
                         alt="<?php echo htmlspecialchars($oc['2024']['name']); ?>"
                         class="w-12 h-16 rounded-lg object-cover border border-gray-200 flex-shrink-0"
                         onerror="this.style.display='none'">
                    <div>
                        <span class="text-xs text-gray-400 font-medium block mb-0.5">AY 2024&ndash;2025</span>
                        <p class="text-sm font-bold text-gray-700 leading-tight"><?php echo htmlspecialchars($oc['2024']['name']); ?></p>
                        <p class="text-xs <?php echo $col['role']; ?> font-medium"><?php echo htmlspecialchars($oc['2024']['role']); ?></p>
                        <p class="text-xs text-gray-400"><?php echo htmlspecialchars($oc['2024']['course']); ?></p>
                    </div>
                </div>

                <!-- AY 2025-2026 — bigger / current -->
                <div class="bg-white rounded-xl border-2 <?php echo $col['border']; ?> shadow-md p-4 flex items-center gap-4 ring-2 <?php echo $col['ring']; ?>">
                    <img src="<?php echo htmlspecialchars($oc['2025']['img']); ?>"
                         alt="<?php echo htmlspecialchars($oc['2025']['name']); ?>"
                         class="w-16 h-20 rounded-lg object-cover border-2 <?php echo $col['border']; ?> flex-shrink-0"
                         onerror="this.style.display='none'">
                    <div>
                        <span class="text-xs font-semibold <?php echo $col['badge']; ?> px-2 py-0.5 rounded-full block mb-1">Current &bull; AY 2025&ndash;2026</span>
                        <p class="text-base font-bold text-gray-900 leading-tight"><?php echo htmlspecialchars($oc['2025']['name']); ?></p>
                        <p class="text-sm font-semibold <?php echo $col['role']; ?>"><?php echo htmlspecialchars($oc['2025']['role']); ?></p>
                        <p class="text-xs text-gray-500"><?php echo htmlspecialchars($oc['2025']['course']); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Documents Grid -->
            <?php if(empty($documents)): ?>
                <div class="bg-white rounded-xl shadow p-10 text-center">
                    <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-700 mb-1">No Documents Found</h3>
                    <p class="text-gray-500 text-sm mb-5">
                        <?php if(!empty($search)): ?>No documents match your search.<?php else: ?>No documents in this category yet.<?php endif; ?>
                    </p>
                    <?php if(!empty($search) || $section != 'all'): ?>
                        <a href="documents.php" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium text-sm transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>View All
                        </a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    <?php foreach($documents as $doc): ?>
                        <?php
                        $web_path = $doc['file_path'];
                        if (preg_match('/[A-Za-z]:\\\\xampp\\\\htdocs\\\\sscwebsite\\\\uploads\\\\(.+)/', $web_path, $matches)) {
                            $web_path = 'uploads/' . $matches[1];
                        }
                        if (strpos($web_path, 'uploads/') === false && strpos($web_path, '\\') !== false) {
                            $web_path = 'uploads/' . basename($web_path);
                        }
                        $cache_buster = $doc['id'] . '-' . strtotime($doc['created_at']);
                        $web_path_with_timestamp = $web_path . '?v=' . $cache_buster;
                        $cat_color = $section_colors[$doc['category']] ?? 'bg-gray-100 text-gray-700';
                        $cat_name  = $section_names[$doc['category']]  ?? ucfirst($doc['category'] ?? 'Unknown');
                        ?>
                        <div class="bg-white rounded-xl shadow border border-gray-100 p-4 flex flex-col gap-3 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between">
                                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-file-pdf text-blue-600 text-lg"></i>
                                </div>
                                <span class="<?php echo $cat_color; ?> text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                    <?php echo htmlspecialchars($cat_name); ?>
                                </span>
                            </div>
                            <p class="text-sm font-semibold text-gray-900 line-clamp-2 leading-snug" title="<?php echo htmlspecialchars($doc['original_name']); ?>">
                                <?php echo htmlspecialchars($doc['original_name']); ?>
                            </p>
                            <div class="text-xs text-gray-500 flex items-center gap-3">
                                <span><i class="fas fa-user mr-1"></i><?php echo htmlspecialchars($doc['display_label'] ?? $doc['username'] ?? '&mdash;'); ?></span>
                                <span><i class="fas fa-calendar mr-1"></i><?php echo date('M d, Y', strtotime($doc['created_at'])); ?></span>
                            </div>
                            <div class="flex gap-2 mt-auto">
                                <a href="pdfviewer.php?file=<?php echo urlencode($doc['file_path']); ?>"
                                   class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-1.5 px-3 rounded-lg text-xs font-medium transition-colors flex items-center justify-center gap-1">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <button onclick="showQR('<?php echo htmlspecialchars($web_path_with_timestamp); ?>')"
                                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-1.5 px-3 rounded-lg text-xs font-medium transition-colors" title="QR Code">
                                    <i class="fas fa-qrcode"></i>
                                </button>
                                <a href="<?php echo htmlspecialchars($web_path_with_timestamp); ?>" download
                                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-1.5 px-3 rounded-lg text-xs font-medium transition-colors" title="Download">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- QR Code Modal (Flowbite) -->
    <div id="qrModal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black/50">
        <div class="relative p-4 w-full max-w-md">
            <div class="relative bg-white rounded-2xl shadow-2xl">
                <!-- Header -->
                <div class="flex items-center justify-between p-5 border-b border-gray-200 rounded-t-2xl">
                    <h3 class="text-lg font-semibold text-gray-900"><i class="fas fa-qrcode mr-2 text-green-600"></i>Document QR Code</h3>
                    <button type="button" onclick="closeQRModal()"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- Body -->
                <div class="p-6 text-center">
                    <div id="qrCodeContainer" class="mb-4 flex justify-center"></div>
                    <p class="text-sm text-gray-500">Scan to view or download this document.</p>
                </div>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>

    <script>
    function showQR(filePath) {
        document.getElementById('qrModal').classList.remove('hidden');
        var qrContainer = document.getElementById('qrCodeContainer');
        qrContainer.innerHTML = '';
        var currentUrl = window.location.href;
        var baseUrl = currentUrl.substring(0, currentUrl.lastIndexOf('/') + 1);
        var absoluteUrl = new URL(filePath, baseUrl).href;
        var img = document.createElement('img');
        img.src = 'https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=' + encodeURIComponent(absoluteUrl);
        img.alt = 'QR Code';
        img.className = 'max-w-full h-auto rounded-lg';
        qrContainer.appendChild(img);
    }
    function closeQRModal() {
        document.getElementById('qrModal').classList.add('hidden');
    }
    document.getElementById('qrModal').addEventListener('click', function(e) {
        if (e.target === this) closeQRModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeQRModal();
    });
    </script>
</body>
</html>