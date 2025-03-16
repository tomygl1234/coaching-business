<?php get_header(); ?>
<div class="section">
    <div class="single-post container">
        <div class="post-content-wrapper">
            <div class="single-post-content">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <h1 class="post-title"><?php the_title(); ?></h1>

                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <div class="post-meta">
                            <span class="date"><?php the_date(); ?></span>
                            <p>By: <span class="author capitalize"><?php the_author(); ?></span></p>
                        </div>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="post-meta">
                            <div class="post-categories">
                                <?php the_category(', '); // Muestra las categorías ?>
                            </div>
                            <div class="post-tags">
                                <?php the_tags('<span>Tags: ', ', ', '</span>'); // Muestra las etiquetas ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php esc_html_e('No hay publicaciones disponibles.', 'muktatma'); ?></p>
                <?php endif; ?>
            </div>
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>