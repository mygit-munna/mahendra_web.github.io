<?php
/**
 * Template Name: Custom home page
 */
get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action('car_repair_mechanic_above_slider_section'); ?>
  
  <?php if(get_theme_mod('car_repair_mechanic_show_slider') != '' || get_theme_mod('car_repair_mechanic_slider_responsive') != ''){ ?>
    <section id="slider" class="mb-5">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"> 
        <?php $car_repair_mechanic_content_pages = array();
          for ( $car_repair_mechanic_count = 1; $car_repair_mechanic_count <= 4; $car_repair_mechanic_count++ ) {
            $car_repair_mechanic_mod = intval( get_theme_mod( 'car_repair_mechanic_slidersettings_page' . $car_repair_mechanic_count ));
            if ( 'page-none-selected' != $car_repair_mechanic_mod ) {
              $car_repair_mechanic_content_pages[] = $car_repair_mechanic_mod;
            }
          }
          if( !empty($car_repair_mechanic_content_pages) ) :
          $car_repair_mechanic_args = array(
            'post_type' => 'page',
            'post__in' => $car_repair_mechanic_content_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $car_repair_mechanic_args );
          if ( $query->have_posts() ) :
            $car_repair_mechanic_i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($car_repair_mechanic_i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if ( get_theme_mod('car_repair_mechanic_slider_title',true) != '' ) {?>
                    <h1><?php the_title(); ?></h1> 
                  <?php }?>
                  <?php if ( get_theme_mod('car_repair_mechanic_slider_content',true) != '' ) {?>
                    <p><?php $car_repair_mechanic_excerpt = get_the_excerpt(); echo esc_html( car_repair_mechanic_string_limit_words( $car_repair_mechanic_excerpt,esc_attr(get_theme_mod('car_repair_mechanic_slider_excerpt_number','25')))); ?></p>
                  <?php }?>
                  <?php if(get_theme_mod('car_repair_mechanic_slider_button',true) != '' || get_theme_mod('car_repair_mechanic_slider_button_responsive',true) != '') {?>
                    <?php if ( get_theme_mod('car_repair_mechanic_slider_button_label','BOOK LESSON') != '' ) {?>
                      <div class ="read-more mt-md-4 mt-0">
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod('car_repair_mechanic_slider_button_label',__('Read More','car-repair-mechanic')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('car_repair_mechanic_slider_button_label',__('Read More','car-repair-mechanic')) ); ?></span></a>
                      </div>
                    <?php }?>
                  <?php }?>
                </div>
              </div>
              <div class="social-icons">
                <?php if ( get_theme_mod('car_repair_mechanic_facebook_url') != "" ) {?>
                  <a href="<?php echo esc_url(get_theme_mod('car_repair_mechanic_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'car-repair-mechanic'); ?></span></a>
                <?php }?>
                <?php if ( get_theme_mod('car_repair_mechanic_twitter_url') != "" ) {?>
                  <a href="<?php echo esc_url(get_theme_mod('car_repair_mechanic_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'car-repair-mechanic'); ?></span></a>
                <?php }?>
                <?php if ( get_theme_mod('car_repair_mechanic_instagram_url') != "" ) {?>
                  <a href="<?php echo esc_url(get_theme_mod('car_repair_mechanic_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'car-repair-mechanic'); ?></span></a>
                <?php }?>
                <?php if ( get_theme_mod('car_repair_mechanic_linkedin_url') != "" ) {?>
                  <a href="<?php echo esc_url(get_theme_mod('car_repair_mechanic_linkedin_url')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'car-repair-mechanic'); ?></span></a>
                <?php }?>
              </div>
            </div>
          <?php $car_repair_mechanic_i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e('Previous','car-repair-mechanic'); ?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e('Next','car-repair-mechanic'); ?></span>
        </a>
      </div>
      <?php $car_repair_mechanic_postData1 =  get_theme_mod('car_repair_mechanic_video_post');
      if($car_repair_mechanic_postData1){
        $args = array( 'name' => esc_html($car_repair_mechanic_postData1 ,'car-repair-mechanic'));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php
              $content = apply_filters( 'the_content', get_the_content() );
              $video = false;

              // Only get video from the content if a playlist isn't present.
              if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
              }
            ?>
            <div class="video-box">
              <?php
                if ( ! is_single() ) {
                  // If not a single post, highlight the video file.
                  if ( ! empty( $video ) ) {
                    foreach ( $video as $video_html ) {
                      echo '<div class="entry-video">';
                        echo $video_html;
                      echo '</div>';
                    }
                  }
                  elseif(has_post_thumbnail()) { 
                    the_post_thumbnail(); 
                  } 
                }; 
              ?>
              <div class="video-content">
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-3 align-self-center">
                    <a href="<?php the_permalink(); ?>"><i class="fas fa-link"></i><span class="screen-reader-text"><?php echo esc_html('Read More', 'car-repair-mechanic'); ?></span></a>
                  </div>
                  <div class="col-lg-10 col-md-9 col-9 align-self-center ps-0">
                    <span class="video-title"><?php the_title(); ?></span>
                  </div>
                </div>
              </div>
            </div>      
          <?php endwhile; 
          wp_reset_postdata();?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php
      endif; }?>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action('car_repair_mechanic_below_banner_section'); ?>

  <?php if(get_theme_mod('car_repair_mechanic_section_title') != '' || get_theme_mod('car_repair_mechanic_section_text') != '' || get_theme_mod('car_repair_mechanic_services_category') != ''){ ?>
    <section id="service-section" class="py-5">
      <div class="container">
        <div class="service-head mb-5">
          <?php if(get_theme_mod('car_repair_mechanic_section_title') != '') {?>
            <h2><?php echo esc_html(get_theme_mod('car_repair_mechanic_section_title')) ?><i class="fas fa-wrench ms-3"></i></h2>
          <?php }?>
          <?php if(get_theme_mod('car_repair_mechanic_section_text') != '') {?>
            <p><?php echo esc_html(get_theme_mod('car_repair_mechanic_section_text')) ?></p>
          <?php }?>
        </div>
        <div class="owl-carousel">
          <?php 
            $car_repair_mechanic_catData=  get_theme_mod('car_repair_mechanic_services_category');
            if($car_repair_mechanic_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $car_repair_mechanic_catData ,'car-repair-mechanic')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="service-box">
                  <?php the_post_thumbnail(); ?>
                  <div class="service-content">
                    <div class="row">
                      <div class="col-lg-9 col-md-9 col-9 align-self-center">
                        <h3 class="pt-0"><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                      </div>
                      <div class="col-lg-3 col-md-3 col-3 align-self-center service-icon text-end">
                        <i class="fas fa-car"></i>
                      </div>
                    </div>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( car_repair_mechanic_string_limit_words( $excerpt,10) ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="view-btn"><?php echo esc_html('Read More','car-repair-mechanic'); ?><i class="fas fa-arrow-right ms-1"></i><span class="screen-reader-text"><?php echo esc_html('Read More','car-repair-mechanic'); ?></span></a>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();
            } 
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action('car_repair_mechanic_after_service_section'); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>