<!DOCTYPE html>
<html lang="fr">

<head>
    
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="admin/fonts/icomoon/style.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="admin/css/main.min.css" />

    @yield('extra-css')

</head>

<body class="bg-light">

    @yield('content')

    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS files -->
    <script src="admin/js/custom.js"></script>

    @yield('extra-js')

</body>

</html>