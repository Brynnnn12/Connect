<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect - Jaringan Sosial Mini Anda</title>

    <!-- Memuat vite js/css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Memuat Google Font (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Menerapkan font Inter sebagai default */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-900">

    <!-- Header / Navbar -->
    <x-partials.header />

    <!-- Hero Section -->
    <x-partials.hero />

    <!-- Footer -->
    <x-partials.footer />

</body>

</html>
