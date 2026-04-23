<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    
    <!-- Security Headers -->
    <meta http-equiv="Content-Security-Policy" content="frame-src https://sscattendance.iceiy.com http://sv101.ifastnet.com https://errors.infinityfree.net; default-src 'self' 'unsafe-inline' 'unsafe-eval' blob: data:; script-src 'self' 'unsafe-inline' 'unsafe-eval' blob: https://sscattendance.iceiy.com; img-src 'self' data: https: http:; style-src 'self' 'unsafe-inline' https:;">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body, html {
            height: 100%;
            overflow: hidden;
        }
        
        iframe {
            width: 100vw;
            height: 100vh;
            border: none;
            display: block;
        }
    </style>
</head>
<body>
    <iframe 
        src="https://sscattendance.iceiy.com/?i=1" 
        title="SSC Attendance System"
        allow="storage-access; camera; microphone; geolocation; fullscreen"
        sandbox="allow-same-origin allow-scripts allow-forms allow-popups allow-top-navigation allow-storage-access-by-user-activation"
        referrerpolicy="strict-origin-when-cross-origin"
        loading="lazy">
    </iframe>
</body>
</html>
