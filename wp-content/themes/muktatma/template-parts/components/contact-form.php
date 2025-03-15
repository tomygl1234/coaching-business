<!-- Contact Form Component -->
<div class="contact-form-wrapper">
    <div class="contact-info">
        <h2><?php echo get_theme_mod('contact_form_main_title', 'Let\'s get in touch'); ?></h2>
        <p class="contact-description"><?php echo get_theme_mod('contact_form_description', 'We\'re open for any suggestion or just to have a chat'); ?></p>

        <?php if (get_theme_mod('contact_show_logo', true)): ?>
            <?php if (has_custom_logo()): ?>
                <div class="contact-logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php elseif (get_bloginfo('name')): ?>
                <div class="contact-logo">
                    <a class="logo" href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="contact-details">
            <?php 
            $address = get_theme_mod('contact_address', '188 West 21th Street, Suite 721 New York NY 10016');
            if($address): 
            ?>
            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                </svg>
                <div>
                    <?php echo $address; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php 
            $phone = get_theme_mod('contact_phone', '+1235235598');
            if($phone): 
            ?>
            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                </svg>
                <div>
                    <a href="tel:<?php echo $phone; ?>">
                        <?php echo $phone; ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>

            <?php 
            $email = get_theme_mod('contact_email', 'info@yoursite.com');
            if($email): 
            ?>
            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                    <path d="M3 7l9 6l9 -6"></path>
                </svg>
                <div>
                    <a href="mailto:<?php echo $email; ?>">
                        <?php echo $email; ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>

            <?php 
            $website = get_theme_mod('contact_website', 'yoursite.com');
            if($website): 
            ?>
            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                    <path d="M3.6 9h16.8"></path>
                    <path d="M3.6 15h16.8"></path>
                    <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                    <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                </svg>
                <div>
                    <a href="<?php echo esc_url($website); ?>" target="_blank">
                        <?php echo $website; ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="contact-form">
        <h2><?php echo get_theme_mod('contact_form_form_title', 'Get in touch'); ?></h2>
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