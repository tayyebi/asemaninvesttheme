<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="https://gmpg.org/xfn/11" />

  <?php wp_head(); ?>

  <title><?php bloginfo('name'); ?></title>

  <?php wp_enqueue_scripts(); ?>
</head>

<body <?php body_class(); ?> style="direction: <?php _e('ltr'); ?>;">
  <?php wp_body_open(); ?>

  <header>

    <div class="widgets">
      <?php get_sidebar('primary'); ?>
    </div>


    <?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

    if (has_custom_logo() && function_exists('the_custom_logo')) {
      echo '<img class="logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
    } else {
      echo '<h1>' . get_bloginfo('name') . '</h1>';
    }
    ?>

    <nav>
      <?php wp_nav_menu(array(
        'theme_location' => 'header-menu',

        // do not fall back to first non-empty menu
        // 'theme_location' => '__no_such_location',

        // do not fall back to wp_page_menu()
        'fallback_cb' => false
      )); ?>
    </nav>

    <ul class="login-stuff">
      <li class="login">
        <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" alt="ورود">
          ورود
        </a>
      </li>
      <li class="register">
        <a href="<?php echo esc_url(wp_registration_url(get_permalink())); ?>" alt="ثبت‌نام">
          ثبت نام
        </a>
      </li>
    </ul>

  </header>

  <main>
  
    <div class="container">