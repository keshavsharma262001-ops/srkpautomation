<?php
/*
 * This is the child theme for Astra theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */

add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles' );
function astra_child_enqueue_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        array(),
        '5.3.3'
    );
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',
        array(),
        '6.7.2'
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-style', 'bootstrap', 'font-awesome' ),
        $theme_version
    );

    wp_enqueue_script(
        'astra-child-animations',
        get_stylesheet_directory_uri() . '/assets/js/elementor-animations.js',
        array(),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'astra-child-quote-modal',
        get_stylesheet_directory_uri() . '/assets/js/quote-modal.js',
        array(),
        $theme_version,
        true
    );

    wp_localize_script(
        'astra-child-quote-modal',
        'srkpQuoteModal',
        array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'mrx_form_action' ),
        )
    );

    if ( is_front_page() ) {
        wp_enqueue_script(
            'astra-child-homepage',
            get_stylesheet_directory_uri() . '/assets/js/homepage-effects.js',
            array(),
            $theme_version,
            true
        );
    }
}

add_action( 'after_setup_theme', 'astra_child_theme_setup' );
function astra_child_theme_setup() {
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 80,
            'width'       => 220,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    register_nav_menus(
        array(
            'primary'             => __( 'Primary Menu', 'astra-child' ),
            'primary_menu_header' => __( 'Primary Menu Header', 'astra-child' ),
        )
    );
}

function astra_child_get_upload_asset_url( $filename ) {
    $upload_dir = wp_upload_dir();

    return trailingslashit( $upload_dir['baseurl'] ) . '2026/04/' . ltrim( $filename, '/' );
}

function mrx_create_post_type() {
    register_post_type(
        'mrx_inquiry',
        array(
            'labels' => array(
                'name'          => 'Inquiries',
                'singular_name' => 'Inquiry',
            ),
            'public'      => false,
            'show_ui'     => true,
            'menu_icon'   => 'dashicons-email',
            'supports'    => array( 'title' ),
            'show_in_menu'=> true,
        )
    );
}
add_action( 'init', 'mrx_create_post_type' );

function mrx_custom_form() {
    ob_start();
    ?>
    <div class="mrx-form-shell">
        <form class="mrx-form" data-mrx-form>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="tel" name="phone" placeholder="Your Phone" required>
            <input type="text" name="service" placeholder="Service Needed">
            <textarea name="message" placeholder="Your Message" required></textarea>
            <input type="hidden" name="source_page" value="<?php echo esc_attr( wp_unslash( $_SERVER['REQUEST_URI'] ?? '' ) ); ?>">
            <button type="submit" name="mrx_submit" value="Send Inquiry">Send Inquiry</button>
        </form>
        <div class="mrx-response" data-mrx-response></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'mrx_form', 'mrx_custom_form' );

function astra_child_render_quote_modal() {
    ?>
    <div class="srkp-quote-modal" id="srkp-quote-modal" hidden>
        <div class="srkp-quote-modal__backdrop" data-modal-close></div>
        <div class="srkp-quote-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="srkp-quote-title">
            <button class="srkp-quote-modal__close" type="button" aria-label="Close quote form" data-modal-close>&times;</button>
            <div class="srkp-quote-modal__content">
                <div class="srkp-quote-modal__intro">
                    <span class="srkp-eyebrow">Get a Free Quote</span>
                    <h2 id="srkp-quote-title">Tell us about your project</h2>
                    <p>Website, automation ya AI solution jo bhi chahiye, details bhejiye. Inquiry <strong>mrx_inquiry</strong> me save hogi aur admin ko mail bhi chali jayegi.</p>
                </div>
                <?php echo do_shortcode( '[mrx_form]' ); ?>
            </div>
        </div>
    </div>
    <?php
}
add_action( 'wp_footer', 'astra_child_render_quote_modal', 20 );

function mrx_handle_form_submission() {
    if ( ! isset( $_POST['mrx_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mrx_nonce'] ) ), 'mrx_form_action' ) ) {
        wp_send_json_error( 'Security check failed' );
    }

    $name        = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email       = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $phone       = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
    $service     = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
    $message     = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
    $source_page = isset( $_POST['source_page'] ) ? esc_url_raw( home_url( sanitize_text_field( wp_unslash( $_POST['source_page'] ) ) ) ) : home_url( '/' );

    if ( empty( $name ) || empty( $email ) || empty( $phone ) || empty( $message ) ) {
        wp_send_json_error( 'Please fill all required fields.' );
    }

    $post_id = wp_insert_post(
        array(
            'post_title'  => $name . ' - ' . current_time( 'd M Y H:i' ),
            'post_type'   => 'mrx_inquiry',
            'post_status' => 'publish',
        )
    );

    if ( ! $post_id || is_wp_error( $post_id ) ) {
        wp_send_json_error( 'Error saving your message. Please try again.' );
    }

    update_post_meta( $post_id, 'name', $name );
    update_post_meta( $post_id, 'email', $email );
    update_post_meta( $post_id, 'phone', $phone );
    update_post_meta( $post_id, 'service', $service );
    update_post_meta( $post_id, 'message', $message );
    update_post_meta( $post_id, 'source_page', $source_page );
    update_post_meta( $post_id, 'date', current_time( 'mysql' ) );

    $admin_email = get_option( 'admin_email' );
    $subject     = 'New Inquiry Received';
    $body        = "A new inquiry has been submitted.\n\n";
    $body       .= "Name: {$name}\n";
    $body       .= "Email: {$email}\n";
    $body       .= "Phone: {$phone}\n";
    $body       .= "Service: {$service}\n";
    $body       .= "Message: {$message}\n";
    $body       .= "Source Page: {$source_page}\n";
    $body       .= 'Date: ' . current_time( 'mysql' ) . "\n";
    $body       .= "Inquiry ID: {$post_id}\n";

    wp_mail( $admin_email, $subject, $body );

    wp_send_json_success( 'Message sent successfully!' );
}
add_action( 'wp_ajax_mrx_handle_form', 'mrx_handle_form_submission' );
add_action( 'wp_ajax_nopriv_mrx_handle_form', 'mrx_handle_form_submission' );

function mrx_add_meta_box() {
    add_meta_box(
        'mrx_details',
        'User Details',
        'mrx_meta_callback',
        'mrx_inquiry'
    );
}
add_action( 'add_meta_boxes', 'mrx_add_meta_box' );

function mrx_meta_callback( $post ) {
    $name        = get_post_meta( $post->ID, 'name', true );
    $email       = get_post_meta( $post->ID, 'email', true );
    $phone       = get_post_meta( $post->ID, 'phone', true );
    $service     = get_post_meta( $post->ID, 'service', true );
    $message     = get_post_meta( $post->ID, 'message', true );
    $source_page = get_post_meta( $post->ID, 'source_page', true );
    $date        = get_post_meta( $post->ID, 'date', true );

    echo '<p><strong>Name:</strong> ' . esc_html( $name ) . '</p>';
    echo '<p><strong>Email:</strong> ' . esc_html( $email ) . '</p>';
    echo '<p><strong>Phone:</strong> ' . esc_html( $phone ) . '</p>';
    echo '<p><strong>Service:</strong> ' . esc_html( $service ) . '</p>';
    echo '<p><strong>Message:</strong><br>' . esc_html( $message ) . '</p>';
    echo '<p><strong>Source Page:</strong> ' . esc_html( $source_page ) . '</p>';
    echo '<p><strong>Date:</strong> ' . esc_html( $date ) . '</p>';
}
