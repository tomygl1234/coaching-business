    <!-- Este código permite insertar las páginas, su titulo y contenido, generadas en el cpanel de wp dentro de nuestro tema -->
    <?php
    while (have_posts()) : the_post();
        the_title('<h1 class="text-center text-primary">', '</h1>');
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', array('class' => 'featured-image'));
        }
        the_content();
    endwhile;
    ?>