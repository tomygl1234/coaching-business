<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="entry-header">
                                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <i class="fas fa-user"></i>
                                        <?php the_author(); ?>
                                    </span>
                                </div>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="read-more btn-primary">
                                    <?php esc_html_e('Leer más', 'muktatma'); ?>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            the_posts_pagination(array(
                'prev_text' => '<i class="fas fa-arrow-left"></i> ' . __('Anterior', 'muktatma'),
                'next_text' => __('Siguiente', 'muktatma') . ' <i class="fas fa-arrow-right"></i>',
            ));

        else :
            ?>
            <p><?php esc_html_e('No se encontraron publicaciones.', 'muktatma'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer(); 