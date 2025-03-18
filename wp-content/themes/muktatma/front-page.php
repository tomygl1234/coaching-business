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
            <h2 class="method-section-h2">My Method</h2>
            <p class="method-section-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum odio sit amet varius commodo.</p>
            <div class="method-section-card-list">
                <?php
                $args = array(
                    'post_type' => 'method_card',
                    'posts_per_page' => -1, // Muestra todos los posts
                );
                $method_query = new WP_Query($args);

                if ($method_query->have_posts()) :
                    while ($method_query->have_posts()) : $method_query->the_post(); ?>
                        <div class="method-section">
                            <h3 class="method-section-title"><?php the_title(); ?></h3>
                            <p class="method-section-description"><?php the_field('method_card_subtitle'); ?></p> <!-- Campo personalizado para el subtítulo -->
                            <p><?php the_field('method_card_description'); ?></p>
                            <h4>Enhancements</h4>
                            <ul>
                                <li><?php the_field('method_card_enhancement'); ?></li>
                                <li><?php the_field('method_card_enhancement_2'); ?></li>
                                <li><?php the_field('method_card_enhancement_3'); ?></li>
                            </ul>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No methods found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="section commitment-section">
        <div class="container">
            <h2>Mis Servicios</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum odio sit amet varius commodo.</p>

            <div class="coaching-cards-container">
                <div class="coaching-card card">
                    <h3>Coaching de Vida</h3>
                    <ul class="feature-list">
                        <li>Obtén claridad sobre el propósito de tu vida</li>
                        <li>Desarrolla confianza y autoconciencia</li>
                        <li>Supera barreras mentales y emocionales</li>
                        <li>Mejora relaciones y crecimiento personal</li>
                    </ul>
                    <p>Desbloquea tu verdadero potencial y alcanza la realización personal. Nuestro programa de Coaching de Vida te ayuda a superar obstáculos, establecer metas significativas y crear una vida equilibrada y con propósito.</p>
                    <a href="#contact" class="btn btn-secondary">Contáctame</a>
                </div>

                <div class="coaching-card card">
                    <h3>Coaching Ejecutivo</h3>
                    <ul class="feature-list">
                        <li>Fortalece habilidades de liderazgo y comunicación</li>
                        <li>Mejora la toma de decisiones bajo presión</li>
                        <li>Aumenta la productividad y gestión del tiempo</li>
                        <li>Domina la negociación y resolución de conflictos</li>
                    </ul>
                    <p>Mejora tus habilidades de liderazgo e impulsa el éxito empresarial. Nuestro programa de Coaching Ejecutivo está diseñado para profesionales que desean refinar su pensamiento estratégico, toma de decisiones y liderazgo de equipo.</p>
                    <a href="#contact" class="btn btn-secondary">Contáctame</a>
                </div>

                <div class="coaching-card card">
                    <h3>Coaching para Organizaciones Sin Fines de Lucro</h3>
                    <ul class="feature-list">
                        <li>Desarrolla estrategias efectivas para el impacto social</li>
                        <li>Fortalece la colaboración y el trabajo en equipo</li>
                        <li>Mejora la sostenibilidad y la gestión de recursos</li>
                        <li>Impulsa la misión y visión de tu organización</li>
                    </ul>
                    <p>Ayudamos a las organizaciones sin fines de lucro a maximizar su impacto social a través de un coaching adaptado a sus necesidades específicas.</p>
                    <a href="#contact" class="btn btn-secondary">Contáctame</a>
                </div>
            </div>

            <div class="payment-section">
                <h4>Opciones de Pago</h4>
                <p>El pago se realiza de la siguiente manera:</p>
                <ul>
                    <li>25% al inicio del programa</li>
                    <li>25% a la mitad del tramo</li>
                    <li>50% al final del programa</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Cocreation adaptative intelligence Section -->
    <?php get_template_part('template-parts/components/faqs'); ?>
</main>
<section class="section-contact section">
    <div class="container">
        <?php get_template_part('template-parts/components/contact-form'); ?>
    </div>
</section>
<?php
get_footer();
?>