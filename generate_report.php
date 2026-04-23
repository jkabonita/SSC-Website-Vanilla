<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once "vendor/autoload.php";
require_once "config/database.php";

$section_names = [
    'president'               => 'President & Student Trustee',
    'vice-president-internal' => 'VP - Internal Affairs',
    'vice-president-external' => 'VP - External Affairs',
    'secretary'               => 'Secretary',
    'treasurer'               => 'Treasurer',
    'auditor'                 => 'Auditor',
    'property-custodian'      => 'Property Custodian',
    'public-relations'        => 'Public Relations Officer',
    'other'                   => 'Other',
];

// Optional category filter
$filter_category = isset($_GET['category']) ? trim($_GET['category']) : '';

$documents = [];
$sql  = "SELECT d.original_name, d.category, d.created_at, u.name AS uploaded_by
         FROM documents d
         JOIN users u ON d.uploaded_by = u.id";
$params = [];
$types  = "";

if ($filter_category !== '' && $filter_category !== 'all') {
    $sql    .= " WHERE d.category = ?";
    $params[] = $filter_category;
    $types   .= "s";
}
$sql .= " ORDER BY d.created_at DESC";

if ($stmt = mysqli_prepare($conn, $sql)) {
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $documents[] = $row;
    }
    mysqli_stmt_close($stmt);
}

// ── TCPDF ──────────────────────────────────────────────────────────────────

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator('CSPC SSC');
$pdf->SetAuthor($_SESSION['username'] ?? 'Admin');
$pdf->SetTitle('Documents Report — CSPC SSC');
$pdf->SetSubject('Document Listing');
$pdf->SetKeywords('CSPC, SSC, Documents, Report');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
$pdf->SetFooterMargin(10);
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(true, 20);

// Custom footer
$pdf->setFooterFont(['helvetica', 'I', 8]);
$pdf->setFooterData([100, 100, 100], [100, 100, 100]);

$pdf->AddPage();

// ── Header block ───────────────────────────────────────────────────────────

// Blue banner
$pdf->SetFillColor(30, 64, 175); // blue-800
$pdf->Rect(0, 0, 210, 38, 'F');

$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetXY(0, 8);
$pdf->Cell(210, 10, 'CSPC \xe2\x80\x94 Supreme Student Council', 0, 1, 'C');

$pdf->SetFont('helvetica', '', 11);
$pdf->SetXY(0, 20);
$pdf->Cell(210, 8, 'Official Documents Report', 0, 1, 'C');

$pdf->SetFont('helvetica', 'I', 9);
$pdf->SetXY(0, 28);
$pdf->Cell(210, 6, 'Generated on ' . date('F d, Y \a\t g:i A') . ' by ' . htmlspecialchars($_SESSION['username'] ?? 'Admin'), 0, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->Ln(18);

// ── Summary box ────────────────────────────────────────────────────────────

$pdf->SetFillColor(239, 246, 255); // blue-50
$pdf->SetDrawColor(147, 197, 253); // blue-300
$pdf->RoundedRect(15, $pdf->GetY(), 180, 14, 3, '1111', 'DF');

$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetXY(15, $pdf->GetY() + 3);
$categoryLabel = ($filter_category !== '' && $filter_category !== 'all')
    ? ($section_names[$filter_category] ?? $filter_category)
    : 'All Categories';
$pdf->Cell(180, 8,
    'Total Documents: ' . count($documents) . '   |   Category: ' . $categoryLabel,
    0, 1, 'C');

$pdf->Ln(6);

// ── Table ──────────────────────────────────────────────────────────────────

if (empty($documents)) {
    $pdf->SetFont('helvetica', 'I', 11);
    $pdf->SetTextColor(120, 120, 120);
    $pdf->Cell(0, 20, 'No documents found.', 0, 1, 'C');
} else {
    // Column widths: name, category, uploaded by, date
    $colW = [90, 48, 27, 25];

    // Header row
    $pdf->SetFillColor(30, 64, 175);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('helvetica', 'B', 9);
    $pdf->SetDrawColor(255, 255, 255);
    $pdf->SetLineWidth(0.3);

    $headers = ['Document Name', 'Category', 'Uploaded By', 'Date'];
    foreach ($headers as $i => $h) {
        $pdf->Cell($colW[$i], 8, $h, 1, 0, 'L', true);
    }
    $pdf->Ln();

    // Data rows
    $pdf->SetTextColor(30, 30, 30);
    $pdf->SetFont('helvetica', '', 8.5);
    $pdf->SetDrawColor(203, 213, 225); // slate-300

    $fill = false;
    foreach ($documents as $doc) {
        $pdf->SetFillColor($fill ? 239 : 255, $fill ? 246 : 255, $fill ? 255 : 255);

        $name     = $doc['original_name'];
        $category = $section_names[$doc['category']] ?? ucfirst($doc['category']);
        $uploader = $doc['uploaded_by'];
        $date     = date('M d, Y', strtotime($doc['created_at']));

        // Calculate row height based on wrapped text in name cell
        $lineH   = 5.5;
        $nameLines = $pdf->getNumLines($name, $colW[0] - 2);
        $rowH    = max($lineH * $nameLines, $lineH);

        // Check page break
        if ($pdf->GetY() + $rowH > 272) {
            $pdf->AddPage();
            // Re-draw header
            $pdf->SetFillColor(30, 64, 175);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont('helvetica', 'B', 9);
            foreach ($headers as $i => $h) {
                $pdf->Cell($colW[$i], 8, $h, 1, 0, 'L', true);
            }
            $pdf->Ln();
            $pdf->SetTextColor(30, 30, 30);
            $pdf->SetFont('helvetica', '', 8.5);
        }

        $x = $pdf->GetX();
        $y = $pdf->GetY();

        // Draw cells
        $pdf->MultiCell($colW[0], $rowH, $name,     1, 'L', $fill, 0, $x,                                    $y);
        $pdf->MultiCell($colW[1], $rowH, $category, 1, 'L', $fill, 0, $x + $colW[0],                         $y);
        $pdf->MultiCell($colW[2], $rowH, $uploader, 1, 'L', $fill, 0, $x + $colW[0] + $colW[1],              $y);
        $pdf->MultiCell($colW[3], $rowH, $date,     1, 'L', $fill, 1, $x + $colW[0] + $colW[1] + $colW[2],   $y);

        $fill = !$fill;
    }
}

// ── Output ─────────────────────────────────────────────────────────────────

$filename = 'SSC_Documents_Report_' . date('Y-m-d') . '.pdf';
$pdf->Output($filename, 'D'); // 'D' = force download
