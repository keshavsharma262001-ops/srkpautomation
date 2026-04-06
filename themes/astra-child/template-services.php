<?php
/**
 * Template Name: SRKP Services
 *
 * @package Astra_Child
 */

$srkp_page_data = array(
    'eyebrow'     => 'Web, Automation & AI',
    'title'       => 'Services That Help You Scale',
    'description' => 'Choose from custom website development, automation workflows, AI chatbots and ecommerce solutions designed around your business goals.',
    'hero_image'  => astra_child_get_upload_asset_url( 'Automation-Solutions.webp' ),
    'sections'    => array(
        array(
            'title'       => 'Website Development',
            'description' => 'Responsive websites, landing pages, redesigns and speed-focused builds for service businesses and brands.',
            'image'       => astra_child_get_upload_asset_url( 'web-development.webp' ),
        ),
        array(
            'title'       => 'Automation Solutions',
            'description' => 'Lead capture, follow-up, CRM syncing and repetitive task automation that keeps your team focused on growth.',
            'image'       => astra_child_get_upload_asset_url( 'Automation-Solutions.webp' ),
        ),
        array(
            'title'       => 'AI Chatbots',
            'description' => 'Smart support and lead qualification chatbots that stay available 24/7 for your visitors.',
            'image'       => astra_child_get_upload_asset_url( 'AI-Chatbots.webp' ),
        ),
        array(
            'title'       => 'E-Commerce',
            'description' => 'Online store design, catalog setup and conversion-driven checkout experiences.',
            'image'       => astra_child_get_upload_asset_url( 'E-Commerce-Solutions.webp' ),
        ),
    ),
);

$srkp_extra_template = '';

require locate_template( 'template-parts/srkp-page-layout.php' );
