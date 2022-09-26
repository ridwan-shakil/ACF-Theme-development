<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-wrap">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="mb-0 phone pl-md-2">
                                    <!-- phone  -->
                                    <?php if (get_field('phone', 'options')) : ?>
                                        <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> <?php echo get_field('phone', 'options'); ?></a>
                                    <?php endif; ?>
                                    <!-- email  -->
                                    <?php if (get_field('email', 'options')) : ?>
                                        <a href="#"><span class="fa fa-paper-plane mr-1"></span> <?php echo get_field('email', 'options'); ?></a>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-md-end">
                                <div class="social-media">
                                    <p class="mb-0 d-flex">
                                        <?php if (have_rows('header_socials', 'options')) : ?>

                                            <?php while (have_rows('header_socials', 'options')) : the_row(); ?>

                                                <a href="<?php the_sub_field('link'); ?>" class="d-flex align-items-center justify-content-center"><?php the_sub_field('icon'); ?></a>

                                            <?php endwhile; ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <!-- site logo  -->
            <a class="navbar-brand" href="<?php site_url() ?>">
                <?php if ($logo = get_field('site_logo', 'options')) : ?>
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" srcset="">
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">

                <?php if (has_nav_menu('main-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'menu_class'    => 'navbar-nav ml-aut',
                        'container' => 'false'
                    ));
                }   ?>

            </div>

        </div>
    </nav>
    <!-- END nav -->