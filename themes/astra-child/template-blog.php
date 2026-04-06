<?php
/**
 * Template Name: SRKP Blog
 *
 * @package Astra_Child
 */

$srkp_page_data = array(
    'eyebrow'     => 'Tips, Updates & Guides',
    'title'       => 'Blog & Insights',
    'description' => 'Useful posts about websites, automation, customer journeys and better digital systems for modern businesses.',
    'hero_image'  => astra_child_get_upload_asset_url( 'Custom-solution.webp' ),
    'sections'    => array(
        array(
            'title'       => 'Website Growth Tips',
            'description' => 'Practical ways to improve conversions, loading speed and trust on business websites.',
            'image'       => astra_child_get_upload_asset_url( 'web-development.webp' ),
        ),
        array(
            'title'       => 'Automation Ideas',
            'description' => 'Examples of how automations can reduce follow-up delays and improve lead handling.',
            'image'       => astra_child_get_upload_asset_url( 'Custom-solution.webp' ),
        ),
    ),
);

$srkp_extra_template = 'template-parts/srkp-page-extra-blog';

require locate_template( 'template-parts/srkp-page-layout.php' );
