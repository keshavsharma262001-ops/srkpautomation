<?php
/**
 * Front page template.
 *
 * @package Astra_Child
 */

get_header( 'home' );

$services = array(
    array(
        'title'       => 'Web Development',
        'description' => 'Professional and responsive websites designed for your business growth.',
        // 'icon'        => 'laptop',
        'image'       => astra_child_get_upload_asset_url( 'web-development.webp' ),
    ),
    array(
        'title'       => 'Automation Solutions',
        'description' => 'Smart automation systems to save time and increase efficiency.',
        // 'icon'        => 'workflow',
        'image'       => astra_child_get_upload_asset_url( 'Automation-Solutions.webp' ),
    ),
    array(
        'title'       => 'AI Chatbots',
        'description' => 'Intelligent chatbot solutions for customer support and lead generation.',
        // 'icon'        => 'chatbot',
        'image'       => astra_child_get_upload_asset_url( 'AI-Chatbots.webp' ),
    ),
    array(
        'title'       => 'E-Commerce Solutions',
        'description' => 'Scalable online store development with secure payment integration.',
        // 'icon'        => 'cart',
        'image'       => astra_child_get_upload_asset_url( 'E-Commerce-Solutions.webp' ),
    ),
);

$features = array(
    array(
        'title'    => 'Expert Automation Team',
        'subtitle' => '10+ Years Experience',
        // 'icon'     => 'shield',
        'image'    => astra_child_get_upload_asset_url( 'Expert-Automation-Team.webp' ),
    ),
    array(
        'title'    => 'Custom Solutions',
        'subtitle' => 'Scalable & Cost-Effective',
        // 'icon'     => 'tools',
        'image'    => astra_child_get_upload_asset_url( 'Custom-solution.webp' ),
    ),
    array(
        'title'    => 'Proven Results',
        'subtitle' => '100+ Happy Clients',
        // 'icon'     => 'badge',
        'image'    => astra_child_get_upload_asset_url( 'Proven-Results.webp' ),
    ),
    array(
        'title'    => 'Fast Delivery & Support',
        'subtitle' => 'Reliable execution from idea to launch',
        // 'icon'     => 'clock',
        'image'    => astra_child_get_upload_asset_url( 'Fast-Delivery-Support.webp' ),
    ),
    array(
        'title'    => 'Growth-Driven Systems',
        'subtitle' => 'Automation that identifies prospects and opportunities',
        // 'icon'     => 'rocket',
        'image'    => astra_child_get_upload_asset_url( 'Banner-Image.webp' ),
    ),
);

$projects = array(
    array(
        'title'    => 'Music Rx Official',
        'subtitle' => 'Professional Recording & Music Production Studio',
        'image'    => astra_child_get_upload_asset_url( 'Music-Rx-Official.png' ),
    ),
    array(
        'title'    => 'Gurukul Society',
        'subtitle' => 'Education portal with a clean course-focused experience',
        'image'    => astra_child_get_upload_asset_url( 'Gurukul-Society-Of-Education.png' ),
    ),
    array(
        'title'    => 'QR Code Generator',
        'subtitle' => 'Conversion-focused landing page for custom QR solutions',
        'image'    => astra_child_get_upload_asset_url( 'qr.png' ),
    ),
);
?>

<main class="srkp-homepage">
    <section class="srkp-hero">
        <div class="srkp-hero__backdrop"></div>
        <div class="srkp-hero__grid container">
            <div class="srkp-hero__copy">
                <span class="srkp-eyebrow anim-load anim-delay-1">Automation. Growth. Scale.</span>
                <h1 class="anim-load anim-delay-2">Automate Your <span>Business</span> with Smart Solutions</h1>
                <p class="anim-load anim-delay-3">Web Development, Automation & AI Services for Your Success</p>

                <div class="srkp-hero__actions anim-load anim-delay-4">
                    <a class="srkp-cta srkp-quote-trigger" href="#srkp-quote-modal">Get Started Now</a>
                    <a class="srkp-secondary-cta srkp-quote-trigger" href="#srkp-quote-modal">Book a Free Consultation</a>
                </div>
            </div>

            <div class="srkp-hero__visual anim-load anim-delay-4">
                <div class="srkp-hero__glow"></div>
                <div class="srkp-dashboard-card srkp-dashboard-card--large srkp-dashboard-card--image">
                    <img src="<?php echo esc_url( astra_child_get_upload_asset_url( 'Banner-Image.webp' ) ); ?>" alt="SRKP automation solutions banner">
                    <div class="srkp-dashboard-card__media-copy">
                        <div class="srkp-dashboard-card__label">AI Workflow</div>
                        <h2>Lead capture to delivery, on autopilot.</h2>
                        <div class="srkp-dashboard-card__flow">
                            <span>Website</span>
                            <span>CRM</span>
                            <span>Automation</span>
                            <span>Reports</span>
                        </div>
                    </div>
                </div>
                <div class="srkp-dashboard-card srkp-dashboard-card--small srkp-dashboard-card--chat">
                    <div class="srkp-badge-dot"></div>
                    <p>24/7 Smart Replies</p>
                </div>
                <div class="srkp-dashboard-card srkp-dashboard-card--small srkp-dashboard-card--metric">
                    <strong>+184%</strong>
                    <span>workflow speed</span>
                </div>
            </div>
        </div>
    </section>

    <section class="srkp-section srkp-services">
        <div class="container">
            <div class="srkp-section__heading anim-scroll anim-fade-down">
                <h2>Our Services</h2>
                <p>Automation, Web & AI Solutions Tailored For You</p>
            </div>

            <div class="srkp-service-grid">
                <?php foreach ( $services as $index => $service ) : ?>
                    <article class="srkp-service-card anim-scroll anim-zoom-in anim-delay-<?php echo esc_attr( ( $index % 4 ) + 1 ); ?>">
                        <div class="srkp-card-media">
                            <img src="<?php echo esc_url( $service['image'] ); ?>" alt="<?php echo esc_attr( $service['title'] ); ?>">
                        </div>
                        <!-- <div class="srkp-icon srkp-icon--<?php// echo esc_attr( $service['icon'] ); ?>"></div> -->
                        <h3><?php echo esc_html( $service['title'] ); ?></h3>
                        <p><?php echo esc_html( $service['description'] ); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="srkp-section srkp-why">
        <div class="container">
            <div class="srkp-section__heading anim-scroll anim-fade-down">
                <h2>Why Choose Us?</h2>
            </div>

            <div class="srkp-feature-grid">
                <?php foreach ( $features as $index => $feature ) : ?>
                    <article class="srkp-feature-card anim-scroll <?php echo 0 === $index % 2 ? 'anim-fade-left' : 'anim-fade-right'; ?> anim-delay-<?php echo esc_attr( ( $index % 4 ) + 1 ); ?>">
                        <div class="srkp-feature-card__media">
                            <img src="<?php echo esc_url( $feature['image'] ); ?>" alt="<?php echo esc_attr( $feature['title'] ); ?>">
                        </div>
                        <!-- <div class="srkp-icon srkp-icon--<?php// echo esc_attr( $feature['icon'] ); ?>"></div> -->
                        <div>
                            <h3><?php echo esc_html( $feature['title'] ); ?></h3>
                            <p><?php echo esc_html( $feature['subtitle'] ); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="srkp-section srkp-projects">
        <div class="container">
            <div class="srkp-section__heading anim-scroll anim-fade-down">
                <h2>Recent Projects</h2>
                <p>Our Latest Work</p>
            </div>

            <div class="srkp-project-grid">
                <?php foreach ( $projects as $index => $project ) : ?>
                    <article class="srkp-project-card anim-scroll anim-zoom-in anim-delay-<?php echo esc_attr( ( $index % 3 ) + 1 ); ?>">
                        <div class="srkp-project-card__image" style="background-image: linear-gradient(180deg, rgba(12, 23, 48, 0.12), rgba(12, 23, 48, 0.88)), url('<?php echo esc_url( $project['image'] ); ?>');">
                            <div class="srkp-project-card__overlay">
                                <h3><?php echo esc_html( $project['title'] ); ?></h3>
                                <p><?php echo esc_html( $project['subtitle'] ); ?></p>
                            </div>
                        </div>
                        <h4><?php echo esc_html( $project['title'] ); ?></h4>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="srkp-page-cta anim-scroll anim-fade-down">
                <h3>Ready to build your next project?</h3>
                <p>Share your requirement and we will suggest the right website, automation or AI solution.</p>
                <a class="srkp-cta srkp-quote-trigger" href="#srkp-quote-modal">Get a Free Quote</a>
            </div>
        </div>
    </section>

    <section class="srkp-section srkp-plugin-showcase">
        <div class="container">
            <div class="srkp-plugin-card anim-scroll anim-zoom-in">
                <div class="srkp-plugin-card__content">
                    <span class="srkp-eyebrow">Published WordPress Plugin</span>
                    <h2>SRKP Live Support</h2>
                    <p>A lightweight real-time chat plugin for WordPress with admin inbox support and fast visitor messaging. This plugin is already published on WordPress.org.</p>
                    <ul class="srkp-plugin-card__list">
                        <li>Real-time visitor chat experience</li>
                        <li>Admin inbox for handling conversations</li>
                        <li>Published plugin version: 1.0.3</li>
                    </ul>
                    <div class="srkp-hero__actions">
                        <a class="srkp-cta" href="<?php echo esc_url( home_url( '/plugins/' ) ); ?>">View All Plugins</a>
                        <a class="srkp-secondary-cta srkp-quote-trigger" href="#srkp-quote-modal">Build Something Similar</a>
                    </div>
                </div>
                <div class="srkp-plugin-card__visual" aria-hidden="true">
                    <div class="srkp-plugin-badge">Plugin</div>
                    <div class="srkp-plugin-window">
                        <div class="srkp-plugin-window__top">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="srkp-plugin-window__body">
                            <strong>SRKP Live Support</strong>
                            <p>Easy Live Chat &amp; Support Solution</p>
                            <div class="srkp-plugin-window__chips">
                                <span>WordPress.org</span>
                                <span>Live Chat</span>
                                <span>Pusher</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer( 'home' ); ?>
