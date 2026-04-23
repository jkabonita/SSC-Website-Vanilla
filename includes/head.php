<?php
/*
 * Shared <head> partial.
 * Expected variables (set before including this file):
 *   $page_title       – <title> text
 *   $page_description – meta description / OG description
 */
$page_title       = $page_title       ?? 'CSPC — Supreme Student Council';
$page_description = $page_description ?? 'Promoting transparency and student welfare through accessible documentation and information sharing.';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Favicon -->
    <link rel="icon"       type="image/x-icon" href="https://i.ibb.co/Cp38FdLC/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/Cp38FdLC/logo.png">
    <link rel="apple-touch-icon" href="https://i.ibb.co/Cp38FdLC/logo.png">

    <!-- Open Graph -->
    <meta property="og:title"       content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image"       content="https://i.ibb.co/Cp38FdLC/logo.png">
    <meta property="og:url"         content="<?php echo 'https://' . htmlspecialchars($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="CSPC — Supreme Student Council">

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image"       content="https://i.ibb.co/Cp38FdLC/logo.png">

    <!-- Standard Meta -->
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords"    content="CSPC, Supreme Student Council, Student Welfare, Transparency, Leadership, Camarines Sur Polytechnic Colleges">
    <meta name="author"      content="CSPC — Supreme Student Council">

    <!-- Preconnect to external origins -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://i.ibb.co">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CSS -->
    <link href="assets/css/flowbite.min.css" rel="stylesheet">

    <!-- Font Awesome (non-render-blocking) -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"></noscript>

    <!-- Inter font (non-render-blocking) -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"></noscript>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50:  '#eff6ff', 100: '#dbeafe', 200: '#bfdbfe', 300: '#93c5fd',
                            400: '#60a5fa', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8',
                            800: '#1e40af', 900: '#1e3a8a',
                        },
                        secondary: {
                            50:  '#f8fafc', 100: '#f1f5f9', 200: '#e2e8f0', 300: '#cbd5e1',
                            400: '#94a3b8', 500: '#64748b', 600: '#475569', 700: '#334155',
                            800: '#1e293b', 900: '#0f172a',
                        }
                    },
                    fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] },
                    animation: {
                        'fade-in':   'fadeIn 0.5s ease-in-out',
                        'slide-up':  'slideUp 0.6s ease-out',
                        'bounce-in': 'bounceIn 0.8s ease-out',
                    },
                    keyframes: {
                        fadeIn:   { '0%': { opacity: '0' },                              '100%': { opacity: '1' } },
                        slideUp:  { '0%': { transform: 'translateY(20px)', opacity: '0' },'100%': { transform: 'translateY(0)',   opacity: '1' } },
                        bounceIn: { '0%': { transform: 'scale(0.3)',       opacity: '0' }, '50%': { transform: 'scale(1.05)' }, '70%': { transform: 'scale(0.9)' }, '100%': { transform: 'scale(1)', opacity: '1' } }
                    }
                }
            }
        }
    </script>
    <style>
        /* Shared utility classes used across all pages */
        .gradient-bg  { background: #1d4ed8; }
        .glass-effect { background: rgba(255,255,255,0.15); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.30); }
        .card-hover   { transition: transform 0.28s ease, box-shadow 0.28s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 22px 44px rgba(0,0,0,0.13); }
        .nav-link { position: relative; transition: color 0.2s; }
        .nav-link::after { content: ''; position: absolute; bottom: -3px; left: 0; width: 0; height: 2px; background: #3b82f6; border-radius: 2px; transition: width 0.28s ease; }
        .nav-link:hover::after,
        .nav-link.active::after { width: 100%; }
        .section-badge { display: inline-flex; align-items: center; font-size: 0.7rem; font-weight: 600; padding: 2px 10px; border-radius: 9999px; letter-spacing: 0.03em; }
    </style>
    <!-- Flowbite JS (deferred — not needed for first paint) -->
    <script src="assets/js/flowbite.min.js" defer></script>
</head>
