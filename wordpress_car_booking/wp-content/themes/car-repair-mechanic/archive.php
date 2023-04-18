<?php
/**
 * The template for displaying Archive pages.
 * @package Car Repair Mechanic
 */
get_header(); ?>

<main id="maincontent" role="main">
    <?php
    $car_repair_mechanic_left_right = get_theme_mod( 'car_repair_mechanic_layout','Right Sidebar');
    if($car_repair_mechanic_left_right == 'Right Sidebar'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">  
                    <div class="row">      
                        <div class="col-lg-9 col-md-9">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'top' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>      
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($car_repair_mechanic_left_right == 'Left Sidebar'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="col-lg-9 col-md-9"> 
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>  
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'top' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>             
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>  
                    </div>                  
                </div>
            </div>
        </div>
    <?php }else if($car_repair_mechanic_left_right == 'One Column'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <?php
                        the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'top' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                        <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                            <div class="navigation">
                                <?php car_repair_mechanic_posts_pagination();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content' , get_post_format() );
                        endwhile;
                          else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                        <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                            <div class="navigation">
                                <?php car_repair_mechanic_posts_pagination();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>                    
                </div>
            </div>
        </div>
    <?php }else if($car_repair_mechanic_left_right == 'Three Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-6 col-md-6">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'top' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div> 
                    </div>              
                </div>
            </div>
        </div>
    <?php }else if($car_repair_mechanic_left_right == 'Four Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-3 col-md-3">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'top' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($car_repair_mechanic_left_right == 'Grid Layout'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container"> 
                    <div class="row">       
                        <div class="col-lg-9 col-md-9">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'top' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <div class="row">
                                <?php if ( have_posts() ) :
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                                        get_template_part( 'template-parts/grid-layout' );
                                    endwhile;
                                      else :
                                        get_template_part( 'no-results' );
                                    endif; 
                                ?>
                            </div>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>      
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else {?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">  
                    <div class="row">      
                        <div class="col-lg-9 col-md-9">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'top' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'car_repair_mechanic_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'car_repair_mechanic_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php car_repair_mechanic_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>      
                        <div class="col-lg-3 col-md-3"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</main>

<?php get_footer(); ?>