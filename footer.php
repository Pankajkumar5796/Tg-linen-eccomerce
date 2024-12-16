 <!-- Footer-section-Start -->

 <section class="footer_wrapper">
     <div class="container">
         <div class="row justify-content-center gy-4">
             <div class="col-lg-4 col-xl-4">
                 <div class="logo_bx">
                     <div class="logo py-2">
                         <?php
                            $header_image = get_header_image();
                            ?>
                         <a href="<?php echo home_url(); ?>">
                             <img src="<?php echo $header_image ?>" alt="" />
                         </a>
                     </div>
                     <div class="content_bx">
                         <p>
                             At TG Linen, we are dedicated to providing exceptional linen
                             hire services on the Gold Coast.
                         </p>
                     </div>
                     <div class="icon_bx">
                         <div class="social_icon">
                             <a href="<?php echo get_option('xx_fb'); ?>"><i class="fab fa-facebook-f"></i></a>
                             <a href="<?php echo get_option('xx_inst'); ?>"><i class="fab fa-instagram"></i></a>
                             <a href="<?php echo get_option('xx_lk'); ?>"><i class="fab fa-linkedin-in"></i></a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-3 col-xl-3">
                 <div class="top_title scond">
                     <h3>Quick Links</h3>
                 </div>
                 <div class="list">
                     <?php wp_nav_menu(array(
                            'container_class' =>  '',
                            'container' => '',
                            'menu' => 'Footer Menu',
                            'walker' => new My_Custom_Nav_Walker

                        )); ?>
                 </div>
             </div>
             <div class="col-lg-5 col-xl-5">
                 <div class="top_title">
                     <h3>Contact Us</h3>
                 </div>
                 <div class="footer-contact-info">
                     <div class="main-contact mb-4">
                         <span><i class="fas fa-phone-alt"></i></span>
                         <a href="tel:  <?php echo get_option('xx_ph1'); ?>"> <?php echo get_option('xx_ph1'); ?></a>
                     </div>
                     <div class="main-contact mb-4">
                         <span><i class="fas fa-envelope"></i></span>
                         <a href="mailto:<?php echo get_option('xx_eml'); ?>"><?php echo get_option('xx_eml'); ?></a>
                     </div>
                     <div class="main-contact mb-4">
                         <span><i class="fas fa-envelope"></i></span>
                         <a href="#"><?php echo get_option('xx_ad1'); ?></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="bottom_footer text-center">
         <div class="container">
             <div class="row">
                 <p>Copyright © 2024 ,Designed by <a href="https://webpristine.com/" target="_blank">Webpristine Technologies</a></p>
             </div>
         </div>
     </div>
 </section>
 <!-- Footer-section-end -->

 <!-- Option 1: Bootstrap Bundle with Popper -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
     crossorigin="anonymous"></script>

 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

 <!-- Jquery js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

 <!-- Owl js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- FancyBox JS -->
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
 <!-- Animate js -->
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <?php wp_footer(); ?>
 </body>

 </html>