<?php
$hotel_vivanta_options = hotel_vivanta_theme_options();
$about_show = $hotel_vivanta_options['about_show'];
$choose_about_page = $hotel_vivanta_options['choose_about_page'];
$about_title = $hotel_vivanta_options['about_title'];
$about_additional_image = $hotel_vivanta_options['about_additional_image'];

$content_length = '400';

if (!empty($choose_about_page)):
    $intro_pages_arg = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'page_id' => $choose_about_page);


    $about_page = new WP_Query($intro_pages_arg);

    if ($about_page->have_posts()): ?>

        <section id="primary" class="about-sec section">
            <div class="container">
                <div class="row">
                    <?php
                    while ($about_page->have_posts()):
                        $about_page->the_post();
                        $image_style = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        ?>
                        <div class="col-md-7">
                            <div class="about-section-wrap">
                                <div class="section-title">
                                    <h2><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
                                    <?php echo ($about_title) ? '<p>' . esc_html($about_title) . '</p>' : ''; ?>
                                </div>

                            </div>

                        <?php if ($image_style[0]): ?>
                                <div class="about-section-img">

                                    <img src="<?php echo esc_url($image_style[0]) ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-5">
                            <div class="about-second-wrap">
                            <p><?php echo wp_kses_post(hotel_vivanta_get_excerpt($about_page->post->ID, $content_length)); ?></p>
                             <div class="about-second-wrap"><img src="<?php echo esc_url($about_additional_image) ?>"><a class="about-second-wrap-link" href="<?php echo esc_url(get_the_permalink()); ?>"><i class="ion-ios7-arrow-thin-right"></i></a></div>
                         </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
        </section>

    <?php endif;
endif;
