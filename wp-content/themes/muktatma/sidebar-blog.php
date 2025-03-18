<aside class="sidebar">
    <h2 class="sidebar-title"><?php esc_html_e('Recent Posts', 'muktatma'); ?></h2>
    <ul>
        <?php
        // Consulta para obtener los últimos posts
        $args = array(
            'posts_per_page' => 5, // Número de posts a mostrar
            'post__not_in' => array(get_the_ID()), // Excluir el post actual
        );
        $recent_posts = new WP_Query($args);

        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <li class="recent-post">
                    <div class="recent-post-thumbnail">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); // Cambia 'thumbnail' por 'medium' o 'large' si lo deseas 
                                ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="recent-post-info">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="side-bar__content-resposive">

                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <div class="post-meta">
                            <p>By: <span class="author capitalize"><?php the_author(); ?></span></p>

                            <span class="date"><?php the_date(); ?></span>
                        </div>
                    </div>
                </li>
            <?php endwhile;
            wp_reset_postdata(); // Restablecer la consulta
        else : ?>
            <li><?php esc_html_e('No hay posts recientes.', 'muktatma'); ?></li>
        <?php endif; ?>
    </ul>
</aside>