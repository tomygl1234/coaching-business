<footer class="footer">
    <div class="footer-content container">
        <div class="footer-widget">
            <div class="logo-container">
                <a class="logo" href="<?php echo get_site_url(); ?>">Miguel Wils</a>
                <p>Lorem ipsum dolor sit amet consectetur.</p>
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <h3 class="footer-widget-title">Navegación</h3>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_class' => 'footer-menu',
            ));
            ?>
        </div>

        <div class="footer-widget">
            <h3 class="footer-widget-title">Últimos Posts</h3>
            <div class="footer-posts">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));
                
                foreach ($recent_posts as $post) :
                    $post_date = get_the_date('j M Y', $post['ID']);
                ?>
                    <article class="footer-post">
                        <?php if (has_post_thumbnail($post['ID'])) : ?>
                            <a href="<?php echo get_permalink($post['ID']); ?>" class="footer-post-thumbnail">
                                <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="footer-post-content">
                            <h4>
                                <a href="<?php echo get_permalink($post['ID']); ?>">
                                    <?php echo wp_trim_words($post['post_title'], 6); ?>
                                </a>
                            </h4>
                            <span class="footer-post-date">
                                <?php echo $post_date; ?>
                            </span>
                        </div>
                    </article>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <div class="footer-widget">
            <h3 class="footer-widget-title">Newsletter</h3>
            <div class="footer-newsletter">
                <p class="newsletter-description">Suscríbete para recibir las últimas actualizaciones y noticias.</p>
                <form class="newsletter-form" method="post">
                    <div class="form-group">
                        <input class="footer-input" type="email" id="newsletter" name="newsletter_email" placeholder="Tu email" required>
                        <button class="btn btn-secondary btn-newsletter" type="submit">
                            <span>Suscribirse</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr class="footer-divider">

    <div class="copyright container">
        <p><?php echo "© " . date('Y') . " " . get_bloginfo('name') . ". Todos los derechos reservados."; ?></p>
        <p>Desarrollado por <a href="https://www.linkedin.com/in/tomas-francisco-gimenez-lascano/" target="_blank" rel="noopener noreferrer">Tomás Francisco Full Stack Developer</a></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>