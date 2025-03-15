<footer class="footer container">
    <hr>
    <div class="footer-content">
        <?php
        $args = array(
            // theme location recibe qué menú dentro de functions quieres renderizar
            'theme_location' => 'main-menu',
            // container indica que queremos crear un div que contendra el menu
            'container' => 'nav',
            // container_class indica que queremos darle una clase al div que contiene el menu en este caso main-menu
            'container_class' => 'main-menu',
        );
        //wp_nav_menu renderiza el menú dentro de args
        wp_nav_menu($args)
        ?>
        <!-- Get blog info nos da el nombre del sitio que está guardado dentro de la configuración del cp de wp -->
        <p class="copyright">All rights reserved. <?php echo get_bloginfo('name') . " " . date('Y'); ?></p>
    </div>
</footer>
<!-- Declara que este es el footer a wordpress y hace que la barra negra de edición de wp aparezca-->
        <?php wp_footer();?>
</body>

</html>