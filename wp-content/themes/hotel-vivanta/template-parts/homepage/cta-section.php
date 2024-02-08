<?php
$hotel_vivanta_options = hotel_vivanta_theme_options();

$explore_show = $hotel_vivanta_options['explore_show'];
$explore_title = $hotel_vivanta_options['explore_title'];
$explore_desc = $hotel_vivanta_options['explore_desc'];
$explore_category = $hotel_vivanta_options['explore_category'];

if($explore_show) {

    if (1 == $explore_show):
        if ($explore_category == 'none') {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 2,
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',

            );
        } else {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 2,
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => array( $explore_category ),
                    ),
                ),
            );
        } ?>
        <div class="explore-section section">
            <div class="container">
                <div class="row">
                    <?php if ($explore_title || $explore_desc): ?>
                        <div class="section-title">
                            <?php
                            if ($explore_title)
                                echo '<h2>' . esc_html($explore_title) . '</h2>';
                            if ($explore_desc)
                                echo '<p>' . esc_html($explore_desc) . '</p>';
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
             </div>

             <div class="container">
                <div class="row"> 
                <?php $recent_query = new WP_Query($args);
                    if ($recent_query->have_posts()) :
                    ?>
                    <main class="intro-section">
                      <div class="container">
                        <div class="grid">
                          <div class="column-xs-12">
                            <ul class="slider">

                        <?php
                        while ($recent_query->have_posts()) : $recent_query->the_post();
                        global $post;
                            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                            $image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
                            $content = get_the_content();
                            

                            if (!empty($image)) {
                                $image_style = "style='background-image:url(" . esc_url($image[0]) . ")'";
                            } else {
                                $image_style = '';
                            }
                            ?>
                              <li class="slider-item">
                                <div class="grid vertical">
                                  <div class="column-xs-12 column-md-3 hide-mobile">
                                    <div class="intro">
                                     
                                        <h2 class="title"> <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                                      
                                    </div>
                                  </div>
                                  <div class="column-xs-12 column-md-9">
                                    <div class="image-holder">
                                      <img src="<?php echo esc_url($image[0]); ?>">
                                    </div>
                                    <div class="grid">
                                      <div class="column-xs-12 column-md-9">
                                        <div class="intro show-mobile">
                                          <a href="#">
                                            <h2 class="title"><?php the_title(); ?></h2>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                            </ul>
                          <div class="grid">
                            <div class="column-xs-12">
                              <div class="controls">
                                  <button class="previous">
                                    <i class="ion-ios7-arrow-thin-left"></i>
                                  </a>
                                  <button class="next">
                                    <i class="ion-ios7-arrow-thin-right"></i>
                                  </a>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </main>
                    <?php
                    endif; ?>
                </div>
             </div>
        </div>
        <?php
        
    endif;
}





$cta_show            = $hotel_vivanta_options['cta_show'];
$cta_title		 	 = $hotel_vivanta_options['cta_title'];
$cta_button_txt	 = $hotel_vivanta_options['cta_button_txt'];
$cta_button_url		 = $hotel_vivanta_options['cta_button_url'];
$cta_bg_image		 = $hotel_vivanta_options['cta_bg_image'];


if(!empty($cta_bg_image)){
    $background_style = "style='background-image:url(".esc_url($cta_bg_image).")'";
}
else{
    $background_style = '';
}



if($cta_show) { 
    if (1 == $cta_show):?>
    <div class="section cta-sec" <?php echo wp_kses_post($background_style); ?>>
        <div class="container">
            <div class="row">
                <div class="cta-content">
                    <h2 class="cta-title"><?php echo esc_html($cta_title); ?></h2>
                    
                    <!--                    <button class="button"><span>Book Now</span></button>-->
                    <?php  if( $cta_button_txt && $cta_button_url):?>
                        <a href="<?php echo esc_url($cta_button_url); ?>" class="btn btn-default"><?php echo esc_html($cta_button_txt); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

        <?php
        
    endif;
}