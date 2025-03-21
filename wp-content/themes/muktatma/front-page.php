<?php
get_header();
?>
<main>

    <!--All the sections are in the template-parts/components folder for keeping the code clean and modular-->

    <!-- Hero Banner -->
    <?php get_template_part('template-parts/components/hero', 'banner'); ?>
    <!-- End Hero Banner -->

    <!-- About Section -->
    <?php get_template_part('template-parts/components/about-section'); ?>
    <!-- End About Section -->

    <!-- My services section -->
    <?php get_template_part('template-parts/components/my-services-section'); ?>
    <!-- End My services section -->

    <?php get_template_part('/template-parts/components/section-banner') ?>
    <!-- My method-section -->
    <?php get_template_part('template-parts/components/my-method-section'); ?>
    <!-- End My method section -->

    <!-- Approach Section -->
    <?php get_template_part('template-parts/components/approach-section'); ?>
    <!-- End Approach Section -->

    <?php get_template_part('template-parts/components/section2-banner') ?>
    <!-- FAQs section -->
    <?php get_template_part('template-parts/components/faqs'); ?>
    <!-- End FAQs section -->

    <!-- Payment Section -->
    <?php get_template_part('template-parts/components/payment-section'); ?>
    <!-- End Payment Section -->
</main>

<!-- I didnt put the contact section in the main tag because it's the last section and it's not a section of the page and also in the component i didnt put section label and div container there -->
<!-- Contact Section -->
<section class="section-contact section">
    <div class="container">
        <?php get_template_part('template-parts/components/contact-form'); ?>
    </div>
</section>
<?php
get_footer();
?>