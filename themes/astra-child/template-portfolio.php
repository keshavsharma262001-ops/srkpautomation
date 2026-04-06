<?php
/**
 * Template Name: SRKP Portfolio
 *
 * @package Astra_Child
 */

$srkp_page_data = array(
    'eyebrow'     => 'Selected Projects',
    'title'       => 'Recent Work & Case Studies',
    'description' => 'A few examples of the websites and digital experiences we have built for brands, education and conversion-focused campaigns.',
    'hero_image'  => astra_child_get_upload_asset_url( 'Banner-Image.webp' ),
    'sections'    => array(
        array(
            'title'       => 'Music Rx Official',
            'description' => 'A polished music brand website built to showcase studio services and creative identity.',
            'image'       => astra_child_get_upload_asset_url( 'Music-Rx-Official.png' ),
        ),
        array(
            'title'       => 'Gurukul Society Of Education',
            'description' => 'An education-focused platform with structured information and a clear user journey.',
            'image'       => astra_child_get_upload_asset_url( 'Gurukul-Society-Of-Education.png' ),
        ),
        array(
            'title'       => 'QR Code Landing Experience',
            'description' => 'A simple and focused promotional page designed to highlight a quick utility product.',
            'image'       => astra_child_get_upload_asset_url( 'qr.png' ),
        ),
    ),
);

$srkp_extra_template = 'template-parts/srkp-page-extra-portfolio';

require locate_template( 'template-parts/srkp-page-layout.php' );
