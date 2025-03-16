<?php
get_header();
?>
<main>
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
            <h2 class="about-section-title">¿Why humanistic facilitation?</h2>
            <p class="about-section-description text-justify">Ut consectetur semper risus sodales sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum odio sit amet varius commodo. Aliquam arcu est, efficitur at elementum suscipit, molestie a risus. Ut fermentum lectus quis tellus porta, sed volutpat augue maximus. Donec quis cursus quam. Duis facilisis massa nec neque consequat, eget vulputate orci suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum rutrum felis augue, quis lobortis risus fringilla id. Morbi sagittis et mi sed rutrum. Sed risus ex, gravida fringilla interdum mollis, malesuada in erat. Ut ac turpis eu neque tristique fermentum. Quisque varius, eros nec varius ultricies, lorem sem aliquam turpis, sed efficitur augue sapien non arcu. Quisque ac risus et mi porttitor iaculis id ac felis.
            </p>
            <a href="" class="btn btn-primary">Discover my journey</a>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Approach Section -->
    <section class="section">
        <div class="container">
            <h2 class="approach-section-title">My Approach</h2>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <h3>People-Centered</h3>
                        <h4>Results-Oriented</h4>
                        <p class="text-justify">As an experienced facilitator, I leverage my expertise in Adaptive Intelligence to help organizations achieve meaningful and sustainable results. My approach is centered on people, recognizing that organizations are made up of individuals.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Approach Section -->

</main>
<section class="section-contact section">
    <div class="container">
        <?php get_template_part('template-parts/components/contact-form'); ?>
    </div>
</section>
<?php
get_footer();
?>