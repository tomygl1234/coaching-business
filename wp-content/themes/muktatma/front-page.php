<?php
get_header();
?>
<main>
    <?php
    $default_dummy_text = "Ut consectetur semper risus sodales sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum odio sit amet varius commodo. Aliquam arcu est, efficitur at elementum suscipit, molestie a risus. Ut fermentum lectus quis tellus porta, sed volutpat augue maximus. Donec quis cursus quam. Duis facilisis massa nec neque consequat, eget vulputate orci suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum rutrum felis augue, quis lobortis risus fringilla id. Morbi sagittis et mi sed rutrum. Sed risus ex, gravida fringilla interdum mollis, malesuada in erat. Ut ac turpis eu neque tristique fermentum. Quisque varius, eros nec varius ultricies, lorem sem aliquam turpis, sed efficitur augue sapien non arcu. Quisque ac risus et mi porttitor iaculis id ac felis. ";
    ?>
    <!-- Hero Banner -->
    <?php
    $title = get_field('hero_banner_title') ?: 'Facilitación Humanística para Organizaciones';
    $subtitle = get_field('hero_banner_subtitle') ?: 'Miguel Wils';
    $button = get_field('hero_banner_button') ?: 'Discover my journey';
    $bg_url = get_field('hero_banner_image') ? get_field('hero_banner_image')['url'] : 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2370&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D';

    set_query_var('title', $title);
    set_query_var('subtitle', $subtitle);
    set_query_var('button', $button);
    set_query_var('bg_url', $bg_url);
    get_template_part('template-parts/hero', 'banner');
    ?>
    <!-- End Hero Banner -->

    <!-- About Section -->
    <section class="section">
        <div class="container">
            <h2 class="about-section-title"><?php echo get_field('home_about_title') ?: 'About us' ?></h2>
            <p class="about-section-description text-justify"><?php echo get_field('home_about_description') ?: $default_dummy_text ?></p>
            <a href="<?php echo get_field('home_about_btn_url') ?>" class="btn btn-primary"><?php echo get_field('home_about_btn_text') ?: "Read more" ?></a>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Approach Section -->
    <section class="section">
        <div class="container">
            <h2 class="approach-section-title">My Approach</h2>
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'approach',
                    'posts_per_page' => -1, // Muestra todos los posts
                );
                $approach_query = new WP_Query($args);

                if ($approach_query->have_posts()) :
                    while ($approach_query->have_posts()) : $approach_query->the_post(); ?>
                        <div class="col">
                            <div class="card">
                                <h3><?php the_field('approach_card_title'); ?></h3> <!-- Campo personalizado para el título -->
                                <h4><?php the_field('approach_card_subtitle'); ?></h4> <!-- Campo personalizado para el subtítulo -->
                                <p class="text-justify"><?php the_field('approach_card_description'); ?></p> <!-- Campo personalizado para la descripción -->
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No approaches found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- End Approach Section -->

    <!-- Cocreation adaptative intelligence Section -->
    <section class="section">
        <div class="container">
            <div class="">
                <h2 class="">My Method</h2>
                <p class="method-section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum odio sit amet varius commodo. Aliquam arcu est, efficitur at elementum suscipit, molestie a risus. Ut fermentum lectus quis tellus porta, sed volutpat augue maximus. Donec quis cursus quam. Duis facilisis massa nec neque consequat, eget vulputate orci suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum rutrum felis augue, quis lobortis risus fringilla id. Morbi sagittis et mi sed rutrum. Sed risus ex, gravida fringilla interdum mollis, malesuada in erat. Ut ac turpis eu neque tristique fermentum. Quisque varius, eros nec varius ultricies, lorem sem aliquam turpis, sed efficitur augue sapien non arcu. Quisque ac risus et mi porttitor iaculis id ac felis. </p>
            </div>
            <div class="method-section-card-list">
                <div class="method-section">
                    <h3 class="method-section-title">Initial Assessment</h3>
                    <p class="method-section-description">Deep conversations to explore vision and areas for improvement.</p>
                    <p>Our approach begins with thorough discussions that help identify challenges and define growth opportunities, ensuring we understand your needs from within.</p>
                    <h4>Enhancements</h4>
                    <ul>
                        <li>Customization</li>
                        <li>Depth</li>
                        <li>Growth</li>
                    </ul>
                </div>

                <div class="method-section">
                    <h3 class="method-section-title">Adaptive Intelligence Training</h3>
                    <p class="method-section-description">Equipping individuals with skills for calmness and ingenuity.</p>
                    <p>We equip individuals with the necessary tools to remain calm under pressure, adapt to changes, and innovate in challenging situations.</p>
                    <h4>Enhancements</h4>
                    <ul>
                        <li>Resilience</li>
                        <li>Leadership</li>
                        <li>Adaptability</li>
                    </ul>
                </div>

                <div class="method-section">
                    <h3 class="method-section-title">Collaborative Exploration</h3>
                    <p class="method-section-description">Dialogues to explore solutions together.</p>
                    <p>Through collaborative brainstorming and idea exchange, we work together to uncover the best solutions, fostering creativity and innovation from all perspectives.</p>
                    <h4>Enhancements</h4>
                    <ul>
                        <li>Collaboration</li>
                        <li>Creativity</li>
                        <li>Innovation</li>
                    </ul>
                </div>

                <div class="method-section">
                    <h3 class="method-section-title">Prototyping</h3>
                    <p class="method-section-description">Iterative testing and refinement of customized approaches.</p>
                    <p>We rapidly prototype ideas, testing them in real scenarios, gathering feedback, and refining the approach to ensure effectiveness and adaptability.</p>
                    <h4>Enhancements</h4>
                    <ul>
                        <li>Innovation</li>
                        <li>Efficiency</li>
                        <li>Refinement</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cocreation adaptative intelligence Section -->
</main>
<section class="section-contact section">
    <div class="container">
        <?php get_template_part('template-parts/components/contact-form'); ?>
    </div>
</section>
<?php
get_footer();
?>