<?php
/**
 * Template Name: SRKP About Us
 *
 * @package Astra_Child
 */

$srkp_page_data = array(
    'eyebrow'     => 'Trusted Digital Partner',
    'title'       => 'About SRKP Automations',
    'description' => 'We build websites, automation systems and AI-powered workflows that help businesses save time, generate leads and grow with confidence.',
    'hero_image'  => astra_child_get_upload_asset_url( 'Expert-Automation-Team.webp' ),
    'sections'    => array(
        array(
            'title'       => 'What We Do',
            'description' => 'From business websites to end-to-end automation funnels, we create practical systems that reduce manual work and improve customer experience.',
            'image'       => astra_child_get_upload_asset_url( 'web-development.webp' ),
        ),
        array(
            'title'       => 'How We Work',
            'description' => 'We keep the process simple: understand the business, plan the flow, build fast, test carefully and support after launch.',
            'image'       => astra_child_get_upload_asset_url( 'Fast-Delivery-Support.webp' ),
        ),
    ),
);

$srkp_extra_template = '';

require locate_template( 'template-parts/srkp-page-layout.php' );
