<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- Owl CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Owl CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

      <!-- FancyBox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
       
    <!-- Animate CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <!-- Top-bar-start -->
    <div class="top_bar_sec py-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9">
                    <div class="info-sec">
                        <div class="mail">
                            <span><i class="far fa-envelope"></i></span>
                            <a href="mailto:<?php echo get_option('xx_eml');?>" ><?php echo get_option('xx_eml');?></a>
                        </div>
                        <div class="mail">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <a href="#"><?php echo get_option('xx_ad1');?></a>
                        </div>

                        <div class="mail">
                            <span><i class="far fa-clock"></i></span>
                            <a href="#"><?php echo get_option('xx_tm');?></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                    <div class="social_icon">
                        <a href="<?php echo get_option('xx_fb');?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo get_option('xx_inst');?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <!-- <a href="<?php echo get_option('xx_yt');?>" target="_blank"><i class="fab fa-youtube"></i></a> -->
                        <a href="<?php echo get_option('xx_lk');?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top-bar-end -->

    <!-- Navbar-Section-start -->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <?php
                $header_image = get_header_image();
                ?>
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <img src="<?php echo $header_image ?>" alt="logo" class="img-fluid" />
                </a>

                <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"
                    class="d-lg-none">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="40" height="40" x="0" y="0" viewBox="0 0 512 512"
                        style="enable-background: new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path
                                d="M128 102.4c0-14.138 11.462-25.6 25.6-25.6h332.8c14.138 0 25.6 11.462 25.6 25.6S500.538 128 486.4 128H153.6c-14.138 0-25.6-11.463-25.6-25.6zm358.4 128H25.6C11.462 230.4 0 241.863 0 256c0 14.138 11.462 25.6 25.6 25.6h460.8c14.138 0 25.6-11.462 25.6-25.6 0-14.137-11.462-25.6-25.6-25.6zm0 153.6H256c-14.137 0-25.6 11.462-25.6 25.6 0 14.137 11.463 25.6 25.6 25.6h230.4c14.138 0 25.6-11.463 25.6-25.6 0-14.138-11.462-25.6-25.6-25.6z"
                                fill="#000000" opacity="1" data-original="#000000" class=""></path>
                        </g>
                    </svg>
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                    <?php wp_nav_menu(array(
                        'container_class' =>  '',
                        'container' => '',
                        'menu' => 'Header Menu',
                        'menu_class' => 'navbar-nav align-items-center',
                        'walker' => new My_Custom_Nav_Walker

                    )); ?>
                    <div class="infosec">
                        <div class="phone_wrap">
                            <div class="linne"></div>
                            <a href="tel:<?php echo get_option('xx_ph1');?>">
                                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/icon/solar_call-medicine-rounded-outline.png"
                                        alt="call" /></span>
                                     <?php echo get_option('xx_ph1');?>
                            </a>
                            <div class="linne"></div>
                        </div>
                        <div class="login_btn">
                            <a href="https://tglinen-portal.intracode.com.au" target="_blank">Login <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="overlap_vector"></div>
            </div>
        </nav>
    </header>
    <!-- Navbar-Section-end -->

    <!-- Mobile Nav -->
    <div class="offcanvas offcanvas-end mobil_menu_wrapper d-lg-none d-block" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                <?
                $header_image = get_header_image();
                ?>
                <a href="<?php echo home_url();?>">
                <img src="<?php echo $header_image ?>" alt="logo" class="img-fluid" />
                </a>
                
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php wp_nav_menu(array(
                'container_class' =>  '',
                'container' => '',
                'menu' => 'Header Menu',
                'menu_class' => 'navbar-nav ms-auto mb-lg-0',
                'walker' => new My_Custom_Nav_Walker

            )); ?>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button accordion-button-2" type="button">
                        <a class="main-btn d-flex justify-content-center align-items-center" href="https://tglinen-portal.intracode.com.au" target="_blank">Login
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </button>
                </h2>
            </div>
        </div>
    </div>
    <!-- Mobile Nav -->