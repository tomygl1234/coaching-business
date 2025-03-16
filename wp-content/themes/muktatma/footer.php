<footer class="footer">
    <div class="footer-content container">
        <?php if (is_active_sidebar('footer-1')) : ?>
            <?php dynamic_sidebar('footer-1'); ?>
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-2')) : ?>
            <?php dynamic_sidebar('footer-2'); ?>
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-3')) : ?>
            <?php dynamic_sidebar('footer-3'); ?>
        <?php endif; ?>

        <?php if (is_active_sidebar('footer-4')) : ?>
            <?php dynamic_sidebar('footer-4'); ?>
        <?php endif; ?>
    </div>

    <hr class="footer-divider">

    <div class="copyright container">
        <p><?php echo "© " . date('Y') . " " . get_bloginfo('name') . ". All rights reserved."; ?></p>
        <p>Developed by <a href="https://www.linkedin.com/in/tomas-francisco-gimenez-lascano/" target="_blank" rel="noopener noreferrer">Tomás Francisco Full Stack Developer</a></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>