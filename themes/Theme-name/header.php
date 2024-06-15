<!DOCTYPE html>
<html lang="en">

<head>
    <title>New project</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#191919">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?=TEMPLATE_PATH?>/css/critical.css">
    <link rel="stylesheet" href="<?=TEMPLATE_PATH?>/css/common.css">
    <link rel="stylesheet" href="<?=TEMPLATE_PATH?>/css/sections/header.css" />
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?=TEMPLATE_PATH?>/css/sections/footer.css" />
    <?php wp_head(); ?>
</head>
<?php 
    $header = get_field('header','option');
?>
<body class="page__body">
    <div class="site-container">
        <header class="header">
            <div class="container">
            
            </div>
        </header>
        <div class="menu mobile-show">
        
        </div>
        <main class="main">