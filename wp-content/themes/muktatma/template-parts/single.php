<?php
get_header();
?>
<main class="container section">
    <!-- Este código permite insertar las páginas, su titulo y contenido, generadas en el cpanel de wp dentro de nuestro tema -->
    <?php
    get_template_part('template-parts/page');
    ?>
</main>
<?php
get_footer();
?>