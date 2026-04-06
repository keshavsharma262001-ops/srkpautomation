<?php
/**
 * Custom home footer template.
 *
 * @package Astra_Child
 */

$upload_dir = wp_upload_dir();
$logo_url   = trailingslashit( $upload_dir['baseurl'] ) . '2026/04/Srkp-footer-logo.png';
?>
<footer class="srkp-footer">
    <div class="container srkp-footer__grid">
        <div class="srkp-footer__about anim-scroll anim-fade-left">
            <img class="srkp-footer__logo" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
            <h3>About</h3>
            <p>We offer smart automation, custom website development, bug fixing, and performance optimization to help businesses run smoothly and grow faster.</p>
        </div>

        <div class="anim-scroll fade-up">
            <h3>Services</h3>
            <ul class="srkp-footer__links">
                <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Web Development</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Automation</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">E-Commerce Solutions</a></li>
            </ul>
        </div>

        <div class="anim-scroll fade-up anim-delay-1">
            <h3>Quick Links</h3>
            <ul class="srkp-footer__links">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li>
                <li><a href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">Portfolio</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>">About Us</a></li>
                <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Services</a></li>
            </ul>
        </div>

        <div class="anim-scroll anim-fade-right anim-delay-2">
            <h3>Contact</h3>
            <ul class="srkp-footer__contact">
                <li><i class="fa-solid fa-envelope" aria-hidden="true"></i><a href="mailto:sharmawpdeveloper@gmail.com">sharmawpdeveloper@gmail.com</a></li>
                <li><i class="fa-solid fa-phone" aria-hidden="true"></i><a href="tel:9459320646">9459320646</a></li>
                <li><i class="fa-solid fa-location-dot" aria-hidden="true"></i><span>India</span></li>
            </ul>
        </div>
    </div>

    <div class="srkp-footer__bottom">
        Web Development Automation Solutions AI Chatbots E-Commerce Solutions
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
