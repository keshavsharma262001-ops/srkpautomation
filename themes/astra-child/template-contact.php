<?php
/**
 * Template Name: SRKP Contact
 *
 * @package Astra_Child
 */

$srkp_page_data = array(
    'eyebrow'     => 'Quick Contact',
    'title'       => 'Let’s Talk About Your Project',
    'description' => 'Tell us what you need and we will recommend the right website, automation or AI solution for your business.',
    'hero_image'  => astra_child_get_upload_asset_url( 'Banner-Image.webp' ),
    'sections'    => array(
        array(
            'title'       => 'Get a Free Quote',
            'description' => 'Share your requirement, timeline and goal. We will review it and reach out with the best next step.',
            'image'       => astra_child_get_upload_asset_url( 'Fast-Delivery-Support.webp' ),
        ),
    ),
);

$srkp_extra_template = 'template-parts/srkp-page-extra-contact';

require locate_template( 'template-parts/srkp-page-layout.php' );
