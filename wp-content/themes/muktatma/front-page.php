<?php
get_header();
?>
<main>
    <?php
    $title = "Facilitación Humanística para Organizaciones";
    $subtitle = "Miguel Wils";
    $button = "Discover my journey";
    $bg_url = "https://images.unsplash.com/photo-1431540015161-0bf868a2d407?q=80&w=2370&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
    set_query_var('title', $title);
    set_query_var('subtitle', $subtitle);
    set_query_var('button', $button);
    set_query_var('bg_url', $bg_url);
    get_template_part('template-parts/hero', 'banner');
    ?>
</main>
<section class="section-contact section">
    <div class="container">
        <?php get_template_part('template-parts/components/contact-form'); ?>
    </div>
</section>
<?php
get_footer();
?>