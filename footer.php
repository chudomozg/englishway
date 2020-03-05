        <footer>
            <div class="footer">
                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?> 
                <div class="footer__contact footer_contact">
                    <div class="footer_contact__faddress faddress">
                        <div class="faddress__fico fico"></div>
                        <div class="faddress__ftext ftext">
                            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">
                                ул. Фрунзе 40/7  2 этаж
                            </a> 
                        </div>
                    </div>
                    <div class="footer_contact__femail femail">
                        <div class="femail__fico fico"></div>
                        <div class="femail__ftext ftext">
                            <a href="mailto:englishwayomsk@gmail.com">englishwayomsk@gmail.com</a>
                        </div>
                    </div>
                    <div class="footer_contact__ftel ftel">
                        <div class="ftel__fico fico"></div>
                        <div class="ftel__ftext ftext">
                            <a href="tel:+7 (3812) 505-543">+7 (3812) 505-543</a>
                        </div>
                    </div>
                </div>
                <div class="footer__fsocial fsocial">
                    <div class="fsocial__text">Следите за нами там, где вам удобно:</div>
                    <div class="fsocial__fsocial_icons fsocial_icons">
                        <a class="fsocial_icons__vk"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer_vk.svg" alt="vk"></a>
                        <a class="fsocial_icons__in"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer_insta.svg" alt="vk"></a>
                        <a class="fsocial_icons__fb"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer_fb.svg" alt="vk"></a>
                    </div>
                </div>
                <div class="copyright">
                    2013 - 2020. &copy EnglishWay | Разработка imake.site
                </div>
                
                <?php wp_footer(); ?>
            </div>
        </footer>
    </body>
</html>