<?php
/**
 * @package under-construction-lite
 */
?>
<?php get_header(); ?>

<div id="content" class="container">
    <div class="page_content">
        <div class="sitefull">
            <div class="pagelayout_area">
                <section class="site-maincontentarea">            
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', 'single'); ?>
                        <?php the_post_navigation(); ?>
                        <?php
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
<?php endwhile; // end of the loop.  ?>                  
                </section>  
            </div><!--pagelayout_area-->
        </div><!--site-main-->

        <div class="clear"></div>
    </div><!-- row -->
</div><!-- container -->	
<?php get_footer();