<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc($title ?? 'Blog com CodeIgniter 4')  ?></title>

    <!-- Favicons -->
    <link href="<?php echo site_url() ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo site_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo site_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo site_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo site_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Por algum motivo
      este cara <link href="<?php echo site_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
      interfere na janela modal 
    -->

    <!-- Template Main CSS Files -->
    <link href="<?php echo site_url() ?>assets/css/variables.css" rel="stylesheet">
    <link href="<?php echo site_url() ?>assets/css/main.css" rel="stylesheet">
</head>

<body>
    <?= $this->include('partials/header') ?>
    <main id="main">
        <?= $this->renderSection('content') ?>
    </main><!-- End #main -->
    <?= $this->include('partials/footer') ?>
</body>

</html>