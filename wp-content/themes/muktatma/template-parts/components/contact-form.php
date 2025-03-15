<!-- Contact Form Component -->
<?php
$contact_phone = get_theme_mod('contact_phone', '+1235235598');
$contact_email = get_theme_mod('contact_email', 'info@yoursite.com');
?>
<div class="contact-form-wrapper">
    <div class="contact-info">
        <h2>Let's get in touch</h2>
        <p class="contact-description">We're open for any suggestion or just to have a chat</p>

        <div class="contact-logo">
            <?php if (get_theme_mod('custom_logo')): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <a class="logo" href="<?php echo get_site_url(); ?>">Miguel Wils</a>

            <?php endif; ?>
        </div>

        <div class="contact-details">


            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                </svg>
                <div>
                    <a href="tel:<?php echo get_theme_mod('contact_phone', '+1235235598'); ?>">
                        <?php echo get_theme_mod('contact_phone', '+1235235598'); ?>
                    </a>
                </div>
            </div>

            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                    <path d="M3 7l9 6l9 -6"></path>
                </svg>
                <div>
                    <a href="mailto:<?php echo get_theme_mod('contact_email', 'info@yoursite.com'); ?>">
                        <?php echo get_theme_mod('contact_email', 'info@yoursite.com'); ?>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="contact-form">
        <h2>Get in touch</h2>
        <form id="contact-form" action="" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</div>