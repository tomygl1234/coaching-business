    <!-- Este código permite insertar las páginas, su titulo y contenido, generadas en el cpanel de wp dentro de nuestro tema -->
    <?php
    while (have_posts()) : the_post();
        the_title('<h1 class="text-center text-primary">', '</h1>');
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', array('class' => 'featured-image'));
        }

        $starts_at = get_field('starts_at');
        $ends_at = get_field('ends_at');
    ?>
        <p class="lesson-info">
            <?php the_field('lesson_days'); ?> - <?php echo $starts_at . " to "  .  $ends_at  ?>
        </p>
    <?php

        the_content();
    endwhile;
    ?>