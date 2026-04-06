<?php
/**
 * Extra content for plugins template.
 *
 * @package Astra_Child
 */

$plugins = array(
    array(
        'title'       => 'SRKP Live Support',
        'version'     => '1.0.3',
        'status'      => 'Published on WordPress.org',
        'description' => 'A lightweight real-time chat plugin for WordPress with admin inbox support and fast visitor messaging.',
        'url'         => 'https://wordpress.org/plugins/srkp-live-support/',
        'chips'       => array( 'WordPress.org', 'Live Chat', 'Pusher' ),
    ),
);
?>

<div class="srkp-plugin-grid">
    <?php foreach ( $plugins as $plugin ) : ?>
        <article class="srkp-plugin-card">
            <div class="srkp-plugin-card__content">
                <span class="srkp-eyebrow">Published WordPress Plugin</span>
                <h2><?php echo esc_html( $plugin['title'] ); ?></h2>
                <p><?php echo esc_html( $plugin['description'] ); ?></p>
                <ul class="srkp-plugin-card__list">
                    <li>Plugin name: <?php echo esc_html( $plugin['title'] ); ?></li>
                    <li>Version: <?php echo esc_html( $plugin['version'] ); ?></li>
                    <li>Status: <?php echo esc_html( $plugin['status'] ); ?></li>
                </ul>
                <div class="srkp-hero__actions">
                    <a class="srkp-cta" href="<?php echo esc_url( $plugin['url'] ); ?>" target="_blank" rel="noopener noreferrer">Open Plugin Page</a>
                    <a class="srkp-secondary-cta srkp-quote-trigger" href="#srkp-quote-modal">Need a Plugin?</a>
                </div>
            </div>
            <div class="srkp-plugin-card__visual" aria-hidden="true">
                <div class="srkp-plugin-badge">WP.org</div>
                <div class="srkp-plugin-window">
                    <div class="srkp-plugin-window__top">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="srkp-plugin-window__body">
                        <strong><?php echo esc_html( $plugin['title'] ); ?></strong>
                        <p><?php echo esc_html( $plugin['description'] ); ?></p>
                        <div class="srkp-plugin-window__chips">
                            <?php foreach ( $plugin['chips'] as $chip ) : ?>
                                <span><?php echo esc_html( $chip ); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</div>
