<?php
get_header();
?>
<main class="container section">
    <!-- Este código permite insertar las páginas, su titulo y contenido, generadas en el cpanel de wp dentro de nuestro tema -->
    <?php
    while (have_posts()) : the_post();
        the_title();

        the_content();
    endwhile;
    ?>
</main>
<?php
get_footer();
?>