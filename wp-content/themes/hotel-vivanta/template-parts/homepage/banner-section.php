<?php
$hotel_vivanta_options = hotel_vivanta_theme_options();

$banner_title = $hotel_vivanta_options['banner_title'];
$banner_button_txt = $hotel_vivanta_options['banner_button_txt'];
$banner_button_url = $hotel_vivanta_options['banner_button_url'];
$banner_bg_image = $hotel_vivanta_options['banner_bg_image'];
if(!empty($banner_bg_image)){
    $background_style = "style='background-image:url(".esc_url($banner_bg_image).")'";
}
else{
    $background_style = '';
}

?>


<div class="hero-section">
     <div class="image" data-type="background" data-speed="2"  <?php echo wp_kses_post($background_style); ?>></div>
    <div class="stuff" data-type="content">
        <h1><?php echo esc_html($banner_title); ?></h1>

        <?php  if( $banner_button_txt && $banner_button_url):?>
        <a href="<?php echo esc_url($banner_button_url); ?>" class="btn btn-default"><?php echo esc_html($banner_button_txt); ?></a>
        <?php endif; ?>
    </div>
</div>
</div>




