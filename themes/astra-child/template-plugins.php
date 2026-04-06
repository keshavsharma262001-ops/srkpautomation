<?php
/**
 * Template Name: SRKP Plugins
 *
 * @package Astra_Child
 */

$srkp_page_data = array(
    'eyebrow'     => 'Plugin Showcase',
    'title'       => 'Published WordPress Plugins',
    'description' => 'A dedicated page for all current and upcoming WordPress plugins, so everything stays organized in one place.',
    'hero_image'  => astra_child_get_upload_asset_url( 'Banner-Image.webp' ),
    'sections'    => array(
        array(
            'title'       => 'All Plugins In One Place',
            'description' => 'This page is made to showcase every plugin you publish now and later, with clean cards, version details and direct links.',
            'image'       => astra_child_get_upload_asset_url( 'Custom-solution.webp' ),
        ),
        array(
            'title'       => 'Easy To Expand',
            'description' => 'Whenever you publish another plugin, we can simply add one more item and it will appear neatly on this page.',
            'image'       => astra_child_get_upload_asset_url( 'Proven-Results-1.webp' ),
        ),
    ),
);

$srkp_extra_template = 'template-parts/srkp-page-extra-plugins';

require locate_template( 'template-parts/srkp-page-layout.php' );
