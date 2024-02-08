<?php
/**
 *
 * Template Name: Frontpage

 *
 * @package hotel vivanta
 */

$hotel_vivanta_options = hotel_vivanta_theme_options();
$about_show = $hotel_vivanta_options['about_show'];
$room_show = $hotel_vivanta_options['room_show'];
$blog_show = $hotel_vivanta_options['blog_show'];

get_header();


get_template_part('template-parts/homepage/banner', 'section');
if($about_show == 1)
get_template_part('template-parts/homepage/about', 'section');

get_template_part('template-parts/homepage/cta', 'section');
if($room_show == 1)
get_template_part('template-parts/homepage/room', 'section');

if($blog_show == 1)
get_template_part('template-parts/homepage/blog', 'section');

get_footer();
