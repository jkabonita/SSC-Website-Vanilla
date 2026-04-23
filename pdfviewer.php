<?php
session_start();

// Validate file parameter
if (!isset($_GET['file']) || empty(trim($_GET['file']))) {
    header('Location: documents.php');
    exit;
}

$raw_file = trim($_GET['file']);

// Security: strip all path traversal sequences
$raw_file = str_replace(['../', '..\\', '\\'], '', $raw_file);

// Remove query-string portion for filesystem checks
$file_path = strtok($raw_file, '?');

// Only allow files from uploads/ or documents/ directories
$allowed = false;
foreach (['uploads/', 'documents/'] as $dir) {
    if (strpos($file_path, $dir) === 0) { $allowed = true; break; }
}
if (!$allowed) {
    header('Location: documents.php');
    exit;
}

// Validate file exists and is a PDF
if (!file_exists($file_path)) {
    header('Location: documents.php?error=notfound');
    exit;
}

if (strtolower(pathinfo($file_path, PATHINFO_EXTENSION)) !== 'pdf') {
    header('Location: documents.php');
    exit;
}

$file_name   = htmlspecialchars(basename($file_path));
$pdf_serve   = 'view_pdf.php?file=' . urlencode($file_path);
$pdf_serve_h = htmlspecialchars($pdf_serve);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $file_name; ?> — PDF Viewer | CSPC-SSC</title>
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/Cp38FdLC/logo.png">
    
    <!-- Preconnect to CDNs for faster loading -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; overflow: hidden; font-family: 'Inter', sans-serif; }
        .tb-btn {
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: 0.375rem; transition: background 0.15s, transform 0.1s;
            cursor: pointer; user-select: none;
        }
        .tb-btn:hover    { background: rgba(255,255,255,0.1); }
        .tb-btn:active   { background: rgba(255,255,255,0.18); transform: scale(0.95); }
        .tb-btn:disabled { opacity: 0.35; cursor: not-allowed; transform: none; }
        #viewer {
            scrollbar-width: thin;
            scrollbar-color: #4b5563 #111827;
        }
        #viewer::-webkit-scrollbar       { width: 7px; }
        #viewer::-webkit-scrollbar-track { background: #111827; }
        #viewer::-webkit-scrollbar-thumb { background: #374151; border-radius: 4px; }
        #canvas-wrap canvas {
            display: block;
            margin: 0 auto 20px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.5);
            border-radius: 2px;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
        }
        /* Lazy loading placeholder */
        .page-placeholder {
            background: #1f2937;
            border: 1px dashed #374151;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 0.875rem;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body class="flex flex-col bg-gray-950" style="height:100vh;">

    <!-- Toolbar -->
    <header class="bg-gray-800 border-b border-gray-700 px-3 py-2 flex items-center gap-2 flex-shrink-0 shadow-xl z-10">

        <a href="documents.php"
           class="tb-btn gap-1.5 text-gray-300 hover:text-white px-3 py-1.5 text-sm font-medium border border-gray-600 rounded-lg">
            <i class="fas fa-arrow-left text-xs"></i>
            <span class="hidden sm:inline">Back</span>
        </a>

        <span class="w-px h-5 bg-gray-600"></span>

        <!-- Filename -->
        <div class="flex-1 min-w-0 flex items-center gap-2">
            <i class="fas fa-file-pdf text-red-400 flex-shrink-0 text-sm"></i>
            <span class="text-gray-200 text-sm font-medium truncate" title="<?php echo $file_name; ?>">
                <?php echo $file_name; ?>
            </span>
        </div>

        <span class="w-px h-5 bg-gray-600"></span>

        <!-- Page navigation -->
        <div class="flex items-center gap-0.5">
            <button id="btn-prev" class="tb-btn w-8 h-8 text-gray-300 hover:text-white" disabled>
                <i class="fas fa-chevron-left text-xs"></i>
            </button>
            <div class="flex items-center gap-1 px-1">
                <input id="page-input" type="number" min="1" value="1"
                       class="w-11 text-center bg-gray-700 text-gray-200 text-sm rounded px-1 py-0.5 border border-gray-600 focus:outline-none focus:border-blue-500">
                <span class="text-gray-500 text-sm">/</span>
                <span id="page-total" class="text-gray-400 text-sm min-w-[1.5rem] text-center">—</span>
            </div>
            <button id="btn-next" class="tb-btn w-8 h-8 text-gray-300 hover:text-white" disabled>
                <i class="fas fa-chevron-right text-xs"></i>
            </button>
        </div>

        <span class="w-px h-5 bg-gray-600"></span>

        <!-- Zoom -->
        <div class="flex items-center gap-0.5">
            <button id="btn-zoom-out" class="tb-btn w-8 h-8 text-gray-300 hover:text-white">
                <i class="fas fa-search-minus text-xs"></i>
            </button>
            <span id="zoom-label" class="text-gray-400 text-xs w-12 text-center select-none">100%</span>
            <button id="btn-zoom-in" class="tb-btn w-8 h-8 text-gray-300 hover:text-white">
                <i class="fas fa-search-plus text-xs"></i>
            </button>
            <button id="btn-fit" title="Fit to width" class="tb-btn w-8 h-8 text-gray-300 hover:text-white">
                <i class="fas fa-expand-alt text-xs"></i>
            </button>
        </div>

        <span class="w-px h-5 bg-gray-600 hidden sm:block"></span>

        <!-- Actions -->
        <div class="hidden sm:flex items-center gap-1">
            <a href="<?php echo $pdf_serve_h; ?>" download="<?php echo $file_name; ?>"
               class="tb-btn gap-1.5 text-gray-300 hover:text-white px-3 py-1.5 text-sm border border-gray-600 rounded-lg">
                <i class="fas fa-download text-xs"></i>
                <span class="hidden md:inline">Download</span>
            </a>
            <a href="<?php echo $pdf_serve_h; ?>" target="_blank"
               class="tb-btn gap-1.5 text-gray-300 hover:text-white px-3 py-1.5 text-sm border border-gray-600 rounded-lg">
                <i class="fas fa-external-link-alt text-xs"></i>
                <span class="hidden md:inline">Open</span>
            </a>
        </div>
    </header>

    <!-- Viewer -->
    <main id="viewer" class="flex-1 overflow-auto bg-gray-900 py-6 px-4">

        <div id="state-loading" class="flex flex-col items-center justify-center h-full text-gray-400 gap-3">
            <div class="w-10 h-10 border-2 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
            <p class="text-sm">Loading document…</p>
        </div>

        <div id="state-error" class="hidden flex-col items-center justify-center h-full">
            <div class="bg-red-900/30 border border-red-700/60 rounded-2xl p-8 text-center max-w-sm">
                <i class="fas fa-exclamation-triangle text-red-400 text-4xl mb-4"></i>
                <h2 class="text-red-300 font-semibold text-lg mb-2">Could not load PDF</h2>
                <p class="text-gray-400 text-sm mb-5">The document viewer encountered an error.</p>
                <a href="<?php echo $pdf_serve_h; ?>" target="_blank"
                   class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors">
                    <i class="fas fa-external-link-alt text-xs"></i>
                    Open in Browser
                </a>
            </div>
        </div>

        <div id="canvas-wrap" class="hidden"></div>
    </main>

    <!-- Status bar -->
    <div class="bg-gray-800 border-t border-gray-700 px-4 py-1 flex items-center justify-between flex-shrink-0">
        <span id="status" class="text-gray-500 text-xs">Loading…</span>
        <span class="text-gray-600 text-xs hidden sm:block">CSPC — Supreme Student Council</span>
    </div>

    <!-- PDF.js from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        const PDF_URL   = <?php echo json_encode($pdf_serve); ?>;

        // DOM
        const elLoading = document.getElementById('state-loading');
        const elError   = document.getElementById('state-error');
        const elWrap    = document.getElementById('canvas-wrap');
        const elStatus  = document.getElementById('status');
        const elPageIn  = document.getElementById('page-input');
        const elTotal   = document.getElementById('page-total');
        const btnPrev   = document.getElementById('btn-prev');
        const btnNext   = document.getElementById('btn-next');
        const zoomLbl   = document.getElementById('zoom-label');

        let pdfDoc      = null;
        let scale       = 1.2;
        let currentPage = 1;
        let renderedPages = new Set();
        let renderQueue = [];
        let isRendering = false;

        const setStatus = (msg) => elStatus.textContent = msg;
        const syncZoom  = () => zoomLbl.textContent = Math.round(scale * 100) + '%';
        const syncNav   = () => {
            btnPrev.disabled = !pdfDoc || currentPage <= 1;
            btnNext.disabled = !pdfDoc || currentPage >= pdfDoc.numPages;
        };

        // Create placeholder for a page
        function createPlaceholder(num, viewport) {
            const placeholder = document.createElement('div');
            placeholder.id = 'placeholder-' + num;
            placeholder.className = 'page-placeholder';
            placeholder.style.width = viewport.width + 'px';
            placeholder.style.height = viewport.height + 'px';
            placeholder.style.maxWidth = '100%';
            placeholder.innerHTML = `<i class="fas fa-file-pdf text-2xl"></i>`;
            return placeholder;
        }

        // Render a single page
        async function renderPage(num) {
            if (renderedPages.has(num)) return;
            
            const page     = await pdfDoc.getPage(num);
            const viewport = page.getViewport({ scale });
            
            // Replace placeholder with canvas
            const placeholder = document.getElementById('placeholder-' + num);
            const canvas = document.createElement('canvas');
            canvas.id = 'pc-' + num;
            canvas.width  = viewport.width;
            canvas.height = viewport.height;
            canvas.style.maxWidth = '100%';
            
            if (placeholder) {
                placeholder.replaceWith(canvas);
            } else {
                elWrap.appendChild(canvas);
            }
            
            await page.render({ 
                canvasContext: canvas.getContext('2d', { alpha: false }), 
                viewport 
            }).promise;
            
            renderedPages.add(num);
        }

        // Progressive rendering with priority queue
        async function processRenderQueue() {
            if (isRendering || renderQueue.length === 0) return;
            
            isRendering = true;
            const pageNum = renderQueue.shift();
            
            try {
                await renderPage(pageNum);
            } catch (err) {
                console.error('Error rendering page', pageNum, err);
            }
            
            isRendering = false;
            
            if (renderQueue.length > 0) {
                requestAnimationFrame(processRenderQueue);
            } else {
                setStatus(`${pdfDoc.numPages} page${pdfDoc.numPages !== 1 ? 's' : ''} · ${Math.round(scale * 100)}% zoom`);
            }
        }

        // Queue pages for rendering (visible pages first)
        function queuePageRender(num, priority = false) {
            if (renderedPages.has(num) || renderQueue.includes(num)) return;
            
            if (priority) {
                renderQueue.unshift(num);
            } else {
                renderQueue.push(num);
            }
            
            processRenderQueue();
        }

        // Initialize all pages with placeholders, then render progressively
        async function initializePages() {
            elWrap.innerHTML = '';
            elWrap.classList.remove('hidden');
            renderedPages.clear();
            renderQueue = [];
            
            // Create placeholders for all pages
            const firstPage = await pdfDoc.getPage(1);
            const viewport = firstPage.getViewport({ scale });
            
            for (let i = 1; i <= pdfDoc.numPages; i++) {
                const placeholder = createPlaceholder(i, viewport);
                elWrap.appendChild(placeholder);
            }
            
            // Render first 3 pages immediately (priority)
            const initialPages = Math.min(3, pdfDoc.numPages);
            for (let i = 1; i <= initialPages; i++) {
                queuePageRender(i, true);
            }
            
            // Queue remaining pages
            for (let i = initialPages + 1; i <= pdfDoc.numPages; i++) {
                queuePageRender(i, false);
            }
            
            setStatus(`Loading pages…`);
        }

        // Re-render all pages (for zoom changes)
        async function renderAll() {
            elWrap.innerHTML = '';
            renderedPages.clear();
            renderQueue = [];
            
            for (let i = 1; i <= pdfDoc.numPages; i++) {
                setStatus(`Rendering page ${i} of ${pdfDoc.numPages}…`);
                await renderPage(i);
            }
            setStatus(`${pdfDoc.numPages} page${pdfDoc.numPages !== 1 ? 's' : ''} · ${Math.round(scale * 100)}% zoom`);
        }

        function scrollToPage(num) {
            const el = document.getElementById('pc-' + num) || document.getElementById('placeholder-' + num);
            if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function goToPage(num) {
            if (!pdfDoc) return;
            currentPage = Math.max(1, Math.min(num, pdfDoc.numPages));
            elPageIn.value = currentPage;
            syncNav();
            scrollToPage(currentPage);
            
            // Prioritize rendering nearby pages
            for (let i = -2; i <= 2; i++) {
                const pageNum = currentPage + i;
                if (pageNum >= 1 && pageNum <= pdfDoc.numPages) {
                    queuePageRender(pageNum, true);
                }
            }
        }

        async function fitToWidth() {
            if (!pdfDoc) return;
            const page  = await pdfDoc.getPage(1);
            const nat   = page.getViewport({ scale: 1 });
            const avail = document.getElementById('viewer').clientWidth - 32;
            scale = Math.max(0.25, Math.min(4, avail / nat.width));
            syncZoom();
            renderAll();
        }

        // Load PDF
        pdfjsLib.getDocument({
            url: PDF_URL,
            cMapUrl: 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/cmaps/',
            cMapPacked: true,
            disableAutoFetch: false,
            disableStream: false
        }).promise.then(async (pdf) => {
            pdfDoc = pdf;
            elLoading.classList.add('hidden');
            elTotal.textContent = pdf.numPages;
            elPageIn.max = pdf.numPages;
            syncNav();
            syncZoom();
            await initializePages();
            syncNav();
            
            // Intersection Observer for lazy rendering
            const io = new IntersectionObserver((entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) {
                        const match = e.target.id.match(/(pc|placeholder)-(\d+)/);
                        if (match) {
                            const pageNum = +match[2];
                            currentPage = pageNum;
                            elPageIn.value = currentPage;
                            syncNav();
                            
                            // Render this page and nearby pages
                            queuePageRender(pageNum, true);
                            if (pageNum > 1) queuePageRender(pageNum - 1, true);
                            if (pageNum < pdfDoc.numPages) queuePageRender(pageNum + 1, true);
                        }
                    }
                });
            }, { root: document.getElementById('viewer'), threshold: 0.3, rootMargin: '200px' });
            
            // Observe all pages
            document.querySelectorAll('[id^="pc-"], [id^="placeholder-"]').forEach((el) => io.observe(el));
        }).catch((err) => {
            console.error(err);
            elLoading.classList.add('hidden');
            elError.classList.remove('hidden');
            elError.classList.add('flex');
            setStatus('Failed to load document');
        });

        // Controls
        btnPrev.addEventListener('click', () => goToPage(currentPage - 1));
        btnNext.addEventListener('click', () => goToPage(currentPage + 1));
        elPageIn.addEventListener('change', () => goToPage(parseInt(elPageIn.value) || 1));
        elPageIn.addEventListener('keydown', (e) => { if (e.key === 'Enter') goToPage(parseInt(elPageIn.value) || 1); });
        document.getElementById('btn-zoom-out').addEventListener('click', () => { scale = Math.max(0.25, +(scale - 0.25).toFixed(2)); syncZoom(); renderAll(); });
        document.getElementById('btn-zoom-in').addEventListener('click',  () => { scale = Math.min(4,   +(scale + 0.25).toFixed(2)); syncZoom(); renderAll(); });
        document.getElementById('btn-fit').addEventListener('click', fitToWidth);
        document.addEventListener('keydown', (e) => {
            if (document.activeElement === elPageIn) return;
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown')  goToPage(currentPage + 1);
            if (e.key === 'ArrowLeft'  || e.key === 'ArrowUp')    goToPage(currentPage - 1);
            if (e.key === '+' || e.key === '=') { scale = Math.min(4,   +(scale + 0.25).toFixed(2)); syncZoom(); renderAll(); }
            if (e.key === '-')                  { scale = Math.max(0.25,+(scale - 0.25).toFixed(2)); syncZoom(); renderAll(); }
        });
    </script>
</body>
</html>
