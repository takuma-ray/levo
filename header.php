<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- slickのcssのCDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
</head>
<!-- Google tag (gtag.js) Googleアナリティクス-->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HBQKJ7PFEN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HBQKJ7PFEN');
</script>


<body <?php body_class(); ?>>

<header>
    <div class="logo">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/levo_logo.png" alt="Logo" class="logo-image">
            L'evo Company
        </a>
    </div>

    <button class="hamburger-button" id="hamburger-button">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>

<!-- モーダル -->
<div id="menu-modal" class="menu-modal">
    <div class="menu-modal-content">
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/modal.js"></script>
<?php wp_footer(); ?>
</body>
</html>
