<?php
$hotel_vivanta_options = hotel_vivanta_theme_options();
$room_show = $hotel_vivanta_options['room_show'];
$room_title = $hotel_vivanta_options['room_title'];
$room_desc = $hotel_vivanta_options['room_desc'];
$room_category = $hotel_vivanta_options['room_category'];
if ($room_show) {
        if ($room_category == 'none') {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',

            );
        } else {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => array( $room_category ),
                    ),
                ),
            );
        } 

    $query = new WP_Query($args);
    ?>

    <section class="section room-section">
        <div class="container-fluid">
            <?php if ($room_title || $room_desc):
                echo '<div class="row">';
                echo '<div class="section-title">';
                if ($room_title)
                    echo '<h2>' . esc_html($room_title) . '</h2>';
                if ($room_desc)
                    echo '<p>' . esc_html($room_desc) . '</p>';
                echo '</div>';
                echo '</div>';
            endif;
            ?>



        <div class="custom-slideshow">
                <?php while ($query->have_posts()):$query->the_post();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    if (!empty($image)) {
                        $image_style = "style='background-image:url(" . esc_url($image[0]) . ")'";
                    } else {
                        $image_style = '';
                    }
                    ?>

            <div class="custom-slide" <?php echo wp_kses_post($image_style); ?>>
                
                <div class="slide__title-wrap">
                    <h3 class="slide-title"><div class="slide__box"></div><span class="slide__title-inner"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h3>
                   


                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="slide-explore"><span class="slide__explore-inner button"><?php esc_html_e("Read More", "hotel-vivanta") ?></span></a>
                </div>
            </div>
             <?php endwhile;
             wp_reset_postdata(); ?>
        </div>
        </div>
    </section>
    <?php
}
