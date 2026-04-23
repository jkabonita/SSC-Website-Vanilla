<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config/database.php";

$upload_err = $upload_success = $event_photo_err = "";

// --- Handle event banner photo upload ---
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["upload_event_photo"])){
    if(!is_dir("uploads/events")){ @mkdir("uploads/events", 0755, true); }
    $allowed_types = ['image/jpeg','image/png','image/gif','image/webp','image/bmp'];
    $allowed_exts  = ['jpg','jpeg','png','gif','webp','bmp'];
    if(isset($_FILES["event_photo"]) && $_FILES["event_photo"]["error"] === UPLOAD_ERR_OK){
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime  = finfo_file($finfo, $_FILES["event_photo"]["tmp_name"]);
        finfo_close($finfo);
        $ext = strtolower(pathinfo($_FILES["event_photo"]["name"], PATHINFO_EXTENSION));
        if(in_array($mime, $allowed_types, true) && in_array($ext, $allowed_exts, true)){
            // Remove old banner file
            $old_res = mysqli_query($conn, "SELECT setting_value FROM site_settings WHERE setting_key='event_photo'");
            if($old_res && $old_row = mysqli_fetch_assoc($old_res)){
                if(!empty($old_row['setting_value']) && file_exists($old_row['setting_value'])){ @unlink($old_row['setting_value']); }
            }
            // Process & compress: center-crop to 1080×1080 JPEG quality 85
            $src_img = null;
            switch($mime) {
                case 'image/jpeg': $src_img = @imagecreatefromjpeg($_FILES['event_photo']['tmp_name']); break;
                case 'image/png':  $src_img = @imagecreatefrompng($_FILES['event_photo']['tmp_name']); break;
                case 'image/gif':  $src_img = @imagecreatefromgif($_FILES['event_photo']['tmp_name']); break;
                case 'image/webp': $src_img = function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($_FILES['event_photo']['tmp_name']) : null; break;
                case 'image/bmp':  $src_img = function_exists('imagecreatefrombmp')  ? @imagecreatefrombmp($_FILES['event_photo']['tmp_name'])  : null; break;
            }
            if(!$src_img){ $event_photo_err = "Failed to process the image. Please try a JPG, PNG, GIF, or WEBP file."; }
            else {
                $size      = 1080;
                $src_w     = imagesx($src_img);
                $src_h     = imagesy($src_img);
                $crop_side = min($src_w, $src_h);
                $src_x     = (int)(($src_w - $crop_side) / 2);
                $src_y     = (int)(($src_h - $crop_side) / 2);
                $dst_img   = imagecreatetruecolor($size, $size);
                $white     = imagecolorallocate($dst_img, 255, 255, 255);
                imagefill($dst_img, 0, 0, $white);
                imagecopyresampled($dst_img, $src_img, 0, 0, $src_x, $src_y, $size, $size, $crop_side, $crop_side);
                imagedestroy($src_img);
                $new_name    = "event_banner_" . time() . ".jpg";
                $target_path = "uploads/events/" . $new_name;
                if(imagejpeg($dst_img, $target_path, 85)){
                    imagedestroy($dst_img);
                    $sql = "INSERT INTO site_settings (setting_key, setting_value) VALUES ('event_photo', ?)
                            ON DUPLICATE KEY UPDATE setting_value=VALUES(setting_value), updated_at=NOW()";
                    if($stmt = mysqli_prepare($conn, $sql)){
                        mysqli_stmt_bind_param($stmt, "s", $target_path);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                    }
                    header("Location: dashboard.php?event_photo=success");
                    exit;
                } else {
                    imagedestroy($dst_img);
                    $event_photo_err = "Failed to save the processed image. Check folder permissions.";
                }
            }
        } else { $event_photo_err = "Invalid file type. Only image files (JPG, PNG, GIF, WEBP, BMP) are allowed."; }
    } else { $event_photo_err = "Please select an image file to upload."; }
}

// --- Handle event banner removal ---
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove_event_photo"])){
    $old_res = mysqli_query($conn, "SELECT setting_value FROM site_settings WHERE setting_key='event_photo'");
    if($old_res && $old_row = mysqli_fetch_assoc($old_res)){
        if(!empty($old_row['setting_value']) && file_exists($old_row['setting_value'])){ @unlink($old_row['setting_value']); }
    }
    mysqli_query($conn, "DELETE FROM site_settings WHERE setting_key='event_photo'");
    header("Location: dashboard.php?event_photo=removed");
    exit;
}

// --- Handle single document edit ---
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_doc"])){
    $edit_id       = (int)$_POST["edit_id"];
    $edit_name     = trim($_POST["edit_name"]);
    $edit_display  = trim($_POST["edit_display"]);
    $edit_category = $_POST["edit_category"];
    $allowed_cats  = ['treasurer','legislative','secretary'];
    if($edit_id > 0 && $edit_name !== '' && in_array($edit_category, $allowed_cats, true)){
        $sql = "UPDATE documents SET original_name=?, display_name=?, category=? WHERE id=?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sssi", $edit_name, $edit_display, $edit_category, $edit_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
    header("Location: dashboard.php?edit=success");
    exit;
}

// --- Handle bulk action ---
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bulk_action"])){
    $action = $_POST["bulk_action"];
    $ids    = isset($_POST["doc_ids"]) ? array_filter(array_map('intval', (array)$_POST["doc_ids"])) : [];
    if(!empty($ids)){
        $ph    = implode(',', array_fill(0, count($ids), '?'));
        $types = str_repeat('i', count($ids));
        if($action === 'delete'){
            $sql = "SELECT file_path FROM documents WHERE id IN ($ph)";
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, $types, ...$ids);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                while($r = mysqli_fetch_assoc($res)){ if(file_exists($r['file_path'])) @unlink($r['file_path']); }
                mysqli_stmt_close($stmt);
            }
            $sql = "DELETE FROM documents WHERE id IN ($ph)";
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, $types, ...$ids);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        } elseif(in_array($action, ['treasurer','legislative','secretary'], true)){
            $sql = "UPDATE documents SET category=? WHERE id IN ($ph)";
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, 's'.$types, $action, ...$ids);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
    }
    header("Location: dashboard.php?bulk=success");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["upload"])){
    $target_dir = "uploads/";
    $section = $_POST["section"];
    $display_name = trim($_POST["display_name"] ?? "");
    if($display_name === "") {
        $display_name = $_SESSION["username"];
    }
    $uploaded_count = 0;
    $err_msgs = [];

    foreach($_FILES["files"]["name"] as $key => $raw_name) {
        if($_FILES["files"]["error"][$key] !== UPLOAD_ERR_OK) {
            $err_msgs[] = htmlspecialchars(basename($raw_name)) . ": upload error.";
            continue;
        }
        $file_name   = basename($raw_name);
        $target_file = $target_dir . $file_name;
        $file_type   = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if($file_type !== "pdf") {
            $err_msgs[] = htmlspecialchars($file_name) . " is not a PDF — skipped.";
            continue;
        }

        if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $target_file)) {
            $sql = "INSERT INTO documents (original_name, file_path, category, uploaded_by, display_name, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, "sssis", $file_name, $target_file, $section, $_SESSION["id"], $display_name);
                if(mysqli_stmt_execute($stmt)){
                    $uploaded_count++;
                } else {
                    $err_msgs[] = "DB error saving " . htmlspecialchars($file_name) . ".";
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            $err_msgs[] = "Could not move " . htmlspecialchars($file_name) . ".";
        }
    }

    if($uploaded_count > 0) {
        header("Location: dashboard.php?upload=success&count=" . $uploaded_count);
        exit;
    } else {
        $upload_err = !empty($err_msgs) ? implode(" ", $err_msgs) : "No files were uploaded.";
    }
}

// Fetch documents
$documents = [];
$sql = "SELECT d.id, d.original_name, d.file_path, d.category, d.display_name, d.created_at, u.name AS username FROM documents d JOIN users u ON d.uploaded_by = u.id ORDER BY d.created_at DESC";
if($result = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_assoc($result)){
        $documents[] = $row;
    }
    mysqli_free_result($result);
}

$section_names = [
    'treasurer'   => 'Treasurer Files',
    'legislative' => 'Legislative Files',
    'secretary'   => 'Secretary Files',
];

// Get current event banner for dashboard preview
$current_event_photo = null;
$_ep = mysqli_query($conn, "SELECT setting_value FROM site_settings WHERE setting_key='event_photo'");
if($_ep && $_ep_row = mysqli_fetch_assoc($_ep)){
    if(!empty($_ep_row['setting_value']) && file_exists($_ep_row['setting_value'])){
        $current_event_photo = $_ep_row['setting_value'];
    }
}
?>
<?php
$page_title = 'Dashboard — CSPC Supreme Student Council';
$page_description = 'Admin dashboard for managing documents and monitoring uploads for the CSPC Supreme Student Council.';
$current_page = 'dashboard';
include 'includes/head.php';
?>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col">
<?php include 'includes/nav.php'; ?>

    <!-- Hero Section -->
    <section class="gradient-bg py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Admin Dashboard</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Welcome back, <?php echo htmlspecialchars($_SESSION["username"]); ?>! 
                Manage documents and monitor uploads for the CSPC Supreme Student Council.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Alert Messages -->
            <?php if(!empty($upload_err)): ?>
                <div id="upload-err-alert" class="flex items-center p-4 mb-8 text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                    <i class="fas fa-exclamation-circle flex-shrink-0 mr-3"></i>
                    <span class="text-sm font-medium"><?php echo htmlspecialchars($upload_err); ?></span>
                    <button type="button" data-dismiss-target="#upload-err-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg p-1.5 hover:bg-red-200 inline-flex h-8 w-8 items-center justify-center transition-colors">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>
            
            <?php if(isset($_GET['edit']) && $_GET['edit'] === 'success'): ?>
                <div id="edit-ok-alert" class="flex items-center p-4 mb-8 text-blue-800 rounded-lg bg-blue-50 border border-blue-200" role="alert">
                    <i class="fas fa-check-circle flex-shrink-0 mr-3"></i>
                    <span class="text-sm font-medium">Document updated successfully.</span>
                    <button type="button" data-dismiss-target="#edit-ok-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 items-center justify-center transition-colors">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(isset($_GET['bulk']) && $_GET['bulk'] === 'success'): ?>
                <div id="bulk-ok-alert" class="flex items-center p-4 mb-8 text-purple-800 rounded-lg bg-purple-50 border border-purple-200" role="alert">
                    <i class="fas fa-check-circle flex-shrink-0 mr-3"></i>
                    <span class="text-sm font-medium">Bulk action applied successfully.</span>
                    <button type="button" data-dismiss-target="#bulk-ok-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-purple-50 text-purple-500 rounded-lg p-1.5 hover:bg-purple-200 inline-flex h-8 w-8 items-center justify-center transition-colors">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(isset($_GET['upload']) && $_GET['upload'] === 'success'): ?>
                <div id="upload-ok-alert" class="flex items-center p-4 mb-8 text-green-800 rounded-lg bg-green-50 border border-green-200" role="alert">
                    <i class="fas fa-check-circle flex-shrink-0 mr-3"></i>
                    <?php $up_count = max(1, intval($_GET['count'] ?? 1)); ?>
                    <span class="text-sm font-medium"><?php echo $up_count === 1 ? 'File has been uploaded successfully.' : $up_count . ' files uploaded successfully.'; ?></span>
                    <button type="button" data-dismiss-target="#upload-ok-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200 inline-flex h-8 w-8 items-center justify-center transition-colors">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>

            <?php if(!empty($event_photo_err)): ?>
                <div id="event-err-alert" class="flex items-center p-4 mb-8 text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                    <i class="fas fa-exclamation-circle flex-shrink-0 mr-3"></i>
                    <span class="text-sm font-medium"><?php echo htmlspecialchars($event_photo_err); ?></span>
                    <button type="button" data-dismiss-target="#event-err-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg p-1.5 hover:bg-red-200 inline-flex h-8 w-8 items-center justify-center transition-colors">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(isset($_GET['event_photo']) && $_GET['event_photo'] === 'success'): ?>
                <div id="event-ok-alert" class="flex items-center p-4 mb-8 text-green-800 rounded-lg bg-green-50 border border-green-200" role="alert">
                    <i class="fas fa-check-circle flex-shrink-0 mr-3"></i>
                    <span class="text-sm font-medium">Event banner uploaded successfully. It is now visible on the homepage.</span>
                    <button type="button" data-dismiss-target="#event-ok-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200 inline-flex h-8 w-8 items-center justify-center transition-colors">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(isset($_GET['event_photo']) && $_GET['event_photo'] === 'removed'): ?>
                <div id="event-rm-alert" class="flex items-center p-4 mb-8 text-orange-800 rounded-lg bg-orange-50 border border-orange-200" role="alert">
                    <i class="fas fa-check-circle flex-shrink-0 mr-3"></i>
                    <span class="text-sm font-medium">Event banner removed from the homepage.</span>
                    <button type="button" data-dismiss-target="#event-rm-alert" aria-label="Close"
                            class="ml-auto -mx-1.5 -my-1.5 bg-orange-50 text-orange-500 rounded-lg p-1.5 hover:bg-orange-200 inline-flex h-8 w-8 items-center justify-center transition-colors">
                        <i class="fas fa-times text-xs"></i>
                    </button>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Upload Form -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 rounded-full p-3 mr-4">
                            <i class="fas fa-upload text-blue-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Upload Document</h2>
                    </div>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-folder mr-2"></i>Select Category
                            </label>
                            <select name="section" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" required>
                                <option value="">Choose a category...</option>
                                <option value="treasurer">Treasurer Files</option>
                                <option value="legislative">Legislative Files</option>
                                <option value="secretary">Secretary Files</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user mr-2"></i>Uploaded By (Display Name)
                            </label>
                            <input type="text" name="display_name"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                                   placeholder="<?php echo htmlspecialchars($_SESSION['username']); ?> (leave blank to use your name)">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-file-pdf mr-2"></i>Select PDF File
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="fileInput" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold" id="fileLabel">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PDF files only &mdash; multiple selection supported</p>
                                    </div>
                                    <input type="file" name="files[]" class="hidden" accept=".pdf" multiple required id="fileInput">
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" name="upload" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-upload mr-2"></i>Upload Documents
                        </button>
                    </form>
                </div>

                <!-- Statistics -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover">
                    <div class="flex items-center mb-6">
                        <div class="bg-green-100 rounded-full p-3 mr-4">
                            <i class="fas fa-chart-bar text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Statistics</h2>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-3xl font-bold text-blue-600 mb-2"><?php echo count($documents); ?></div>
                            <div class="text-sm text-gray-600">Total Documents</div>
                        </div>
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <div class="text-3xl font-bold text-green-600 mb-2">Admin</div>
                            <div class="text-sm text-gray-600">Your Role</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Banner Upload -->
            <div class="mt-8 bg-white rounded-xl shadow-lg p-8 card-hover">
                <div class="flex items-center mb-6">
                    <div class="bg-amber-100 rounded-full p-3 mr-4">
                        <i class="fas fa-image text-amber-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Upcoming Event Banner</h2>
                        <p class="text-gray-500 text-sm mt-0.5">Upload a photo to display on the homepage beside the CSPC title.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                    <!-- Upload form -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-image mr-2"></i>Select Event Photo
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="eventPhotoInput" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-amber-50 hover:border-amber-400 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold" id="eventFileLabel">Click to upload event photo</span></p>
                                        <p class="text-xs text-gray-500">JPG, PNG, GIF, WEBP, BMP &mdash; any image format</p>
                                    </div>
                                    <input type="file" name="event_photo" id="eventPhotoInput" class="hidden" accept="image/*" required>
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="upload_event_photo"
                                class="w-full bg-amber-500 hover:bg-amber-600 text-white py-3 px-6 rounded-lg font-semibold transition-colors">
                            <i class="fas fa-upload mr-2"></i>Upload Event Banner
                        </button>
                    </form>

                    <!-- Current photo preview -->
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-3"><i class="fas fa-eye mr-2 text-gray-500"></i>Current Banner on Homepage</p>
                        <?php if($current_event_photo): ?>
                        <div class="rounded-xl overflow-hidden border-2 border-amber-200 shadow-md" style="aspect-ratio:1/1;">
                            <img src="<?php echo htmlspecialchars($current_event_photo); ?>" alt="Current Event Banner"
                                 class="w-full h-full object-cover block">
                        </div>
                        <form method="post" action="" class="mt-3">
                            <button type="submit" name="remove_event_photo"
                                    onclick="return confirm('Remove the current event banner from the homepage?')"
                                    class="w-full bg-red-50 hover:bg-red-500 text-red-600 hover:text-white border border-red-200 hover:border-red-500 py-2.5 rounded-lg font-medium text-sm transition-all">
                                <i class="fas fa-trash mr-2"></i>Remove Banner
                            </button>
                        </form>
                        <?php else: ?>
                        <div class="rounded-xl border-2 border-dashed border-gray-200 p-10 flex flex-col items-center justify-center text-gray-400">
                            <i class="fas fa-image text-4xl mb-3 opacity-30"></i>
                            <p class="text-sm font-medium">No event banner uploaded yet</p>
                            <p class="text-xs mt-1">Upload a photo to display it on the homepage.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Documents List -->
            <div class="mt-12 bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-list text-purple-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Uploaded Documents</h2>
                    </div>
                </div>
                
                <div class="flex flex-wrap items-center justify-between gap-3 px-8 py-3 border-b border-gray-100">
                    <!-- Bulk action toolbar (hidden until rows selected) -->
                    <form method="post" action="" id="bulkForm" class="flex flex-wrap items-center gap-2">
                        <input type="hidden" name="bulk_action" id="bulkActionInput" value="">
                        <div id="bulkToolbar" class="hidden flex-wrap items-center gap-2">
                            <span id="selectedCount" class="text-sm font-medium text-gray-600">0 selected</span>
                            <span class="text-gray-300">|</span>
                            <span class="text-xs text-gray-500 font-medium">Move to:</span>
                            <button type="button" onclick="submitBulk('treasurer')"
                                    class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors">
                                <i class="fas fa-coins mr-1"></i>Treasurer
                            </button>
                            <button type="button" onclick="submitBulk('legislative')"
                                    class="bg-indigo-100 hover:bg-indigo-200 text-indigo-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors">
                                <i class="fas fa-gavel mr-1"></i>Legislative
                            </button>
                            <button type="button" onclick="submitBulk('secretary')"
                                    class="bg-green-100 hover:bg-green-200 text-green-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors">
                                <i class="fas fa-pen-nib mr-1"></i>Secretary
                            </button>
                            <button type="button" onclick="submitBulk('delete')"
                                    class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors">
                                <i class="fas fa-trash mr-1"></i>Delete
                            </button>
                        </div>
                        <!-- Hidden checkboxes container (cloned by JS) -->
                        <div id="bulkIdsContainer"></div>
                    </form>
                    <a href="generate_report.php"
                       class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        <i class="fas fa-file-pdf"></i>Export PDF Report
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-4 w-10">
                                    <input type="checkbox" id="selectAll" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Name</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Section</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Display Name</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Upload Date</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php if(empty($documents)): ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-inbox text-4xl mb-4"></i>
                                        <p class="text-lg">No documents uploaded yet</p>
                                        <p class="text-sm">Upload your first document using the form above</p>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php
                                $cat_badge = [
                                    'treasurer'   => 'bg-blue-100 text-blue-800',
                                    'legislative' => 'bg-indigo-100 text-indigo-800',
                                    'secretary'   => 'bg-green-100 text-green-800',
                                ];
                                ?>
                                <?php foreach($documents as $doc): ?>
                                <?php $badge = $cat_badge[$doc['category']] ?? 'bg-gray-100 text-gray-700'; ?>
                                <tr class="hover:bg-gray-50 transition-colors doc-row"
                                    data-id="<?php echo $doc['id']; ?>"
                                    data-name="<?php echo htmlspecialchars($doc['original_name'], ENT_QUOTES); ?>"
                                    data-display="<?php echo htmlspecialchars($doc['display_name'] ?? $doc['username'], ENT_QUOTES); ?>"
                                    data-category="<?php echo htmlspecialchars($doc['category']); ?>">
                                    <td class="px-4 py-4 w-10">
                                        <input type="checkbox" class="doc-checkbox w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer"
                                               value="<?php echo $doc['id']; ?>">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-file-pdf text-red-500 mr-3 flex-shrink-0"></i>
                                            <span class="text-sm font-medium text-gray-900 break-all"><?php echo htmlspecialchars($doc['original_name']); ?></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo $badge; ?>">
                                            <?php echo htmlspecialchars($section_names[$doc['category']] ?? $doc['category']); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <?php echo htmlspecialchars($doc['display_name'] ?? $doc['username']); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo $doc['created_at'] ? date('M d, Y', strtotime($doc['created_at'])) : '—'; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-3">
                                            <button type="button" onclick="openEditModal(this.closest('tr'))" title="Edit"
                                                    class="text-yellow-500 hover:text-yellow-700 transition-colors">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="pdfviewer.php?file=<?php echo urlencode($doc['file_path']); ?>"
                                               target="_blank" title="View"
                                               class="text-blue-600 hover:text-blue-900 transition-colors">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="delete_document.php?id=<?php echo $doc['id']; ?>"
                                               onclick="return confirm('Are you sure you want to delete this document?')" title="Delete"
                                               class="text-red-600 hover:text-red-900 transition-colors">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>

    <!-- Edit Document Modal -->
    <div id="editModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900"><i class="fas fa-edit mr-2 text-yellow-500"></i>Edit Document</h3>
                <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="post" action="" class="px-6 py-5 space-y-4">
                <input type="hidden" name="edit_doc" value="1">
                <input type="hidden" name="edit_id" id="editId">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-file-pdf mr-1 text-red-500"></i>File Name</label>
                    <input type="text" name="edit_name" id="editName" required
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-sm transition-colors">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-user mr-1"></i>Display Name</label>
                    <input type="text" name="edit_display" id="editDisplay"
                           class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-sm transition-colors"
                           placeholder="Leave blank to keep current">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-folder mr-1"></i>Category</label>
                    <select name="edit_category" id="editCategory" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-sm transition-colors">
                        <option value="treasurer">Treasurer Files</option>
                        <option value="legislative">Legislative Files</option>
                        <option value="secretary">Secretary Files</option>
                    </select>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white py-2.5 rounded-lg font-semibold text-sm transition-colors">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                    <button type="button" onclick="closeEditModal()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2.5 rounded-lg font-semibold text-sm transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // File upload label
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const files = e.target.files;
            const label = document.getElementById('fileLabel');
            if (files.length === 1) {
                label.textContent = files[0].name;
            } else if (files.length > 1) {
                label.textContent = files.length + ' files selected';
            } else {
                label.textContent = 'Click to upload';
            }
        });

        // Event photo file label
        document.getElementById('eventPhotoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            document.getElementById('eventFileLabel').textContent = file ? file.name : 'Click to upload event photo';
        });

        // --- Checkbox / Bulk ---
        const selectAll    = document.getElementById('selectAll');
        const bulkToolbar  = document.getElementById('bulkToolbar');
        const selectedCount= document.getElementById('selectedCount');
        const bulkIdsContainer = document.getElementById('bulkIdsContainer');

        function getChecked() {
            return Array.from(document.querySelectorAll('.doc-checkbox:checked'));
        }

        function updateBulkBar() {
            const checked = getChecked();
            if (checked.length > 0) {
                bulkToolbar.classList.remove('hidden');
                bulkToolbar.classList.add('flex');
                selectedCount.textContent = checked.length + ' selected';
            } else {
                bulkToolbar.classList.add('hidden');
                bulkToolbar.classList.remove('flex');
            }
            selectAll.indeterminate = checked.length > 0 && checked.length < document.querySelectorAll('.doc-checkbox').length;
            selectAll.checked = checked.length > 0 && checked.length === document.querySelectorAll('.doc-checkbox').length;
        }

        selectAll.addEventListener('change', function() {
            document.querySelectorAll('.doc-checkbox').forEach(cb => cb.checked = this.checked);
            updateBulkBar();
        });

        document.querySelectorAll('.doc-checkbox').forEach(cb => {
            cb.addEventListener('change', updateBulkBar);
        });

        function submitBulk(action) {
            const checked = getChecked();
            if (checked.length === 0) return;
            if (action === 'delete' && !confirm('Delete ' + checked.length + ' document(s)? This cannot be undone.')) return;
            document.getElementById('bulkActionInput').value = action;
            bulkIdsContainer.innerHTML = '';
            checked.forEach(cb => {
                const inp = document.createElement('input');
                inp.type = 'hidden'; inp.name = 'doc_ids[]'; inp.value = cb.value;
                bulkIdsContainer.appendChild(inp);
            });
            document.getElementById('bulkForm').submit();
        }

        // --- Edit Modal ---
        function openEditModal(row) {
            document.getElementById('editId').value       = row.dataset.id;
            document.getElementById('editName').value     = row.dataset.name;
            document.getElementById('editDisplay').value  = row.dataset.display;
            document.getElementById('editCategory').value = row.dataset.category;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        document.getElementById('editModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditModal();
        });
    </script>
</body>
</html>