<a class="skip-link screen-reader-text" href="#content">
<?php esc_attr_e( 'Skip to content', 'under-construction-lite' ); ?></a>
<div class="header_right  headersocial">
        <ul>
          <?php if(get_theme_mod('under_construction_lite_fb')){?>
            <li><a title="<?php esc_attr_e('Facebook','under-construction-lite'); ?>" class="fa fa-facebook" target="_blank" href="<?php echo esc_url(get_theme_mod('under_construction_lite_fb','')); ?>"></a> </li>
          <?php }?>
          <?php if(get_theme_mod('under_construction_lite_twitter')){?>
            <li><a title="<?php esc_attr_e('twitter','under-construction-lite'); ?>" class="fa fa-twitter" target="_blank" href="<?php echo esc_url(get_theme_mod('under_construction_lite_twitter','')); ?>"></a></li>
          <?php }?>
          <?php if(get_theme_mod('under_construction_lite_youtube')){?>
            <li><a title="<?php esc_attr_e('youtube','under-construction-lite'); ?>" class="fa fa-youtube" target="_blank" href="<?php echo esc_url(get_theme_mod('under_construction_lite_youtube','')); ?>"></a></li>
          <?php }?>
          <?php if(get_theme_mod('under_construction_lite_in')){?>
            <li><a title="<?php esc_attr_e('linkedin','under-construction-lite'); ?>" class="fa fa-linkedin" target="_blank" href="<?php echo esc_url(get_theme_mod('under_construction_lite_in','')); ?>"></a></li>
          <?php }?>

          <?php if(get_theme_mod('under_construction_lite_pin')){?>
            <li><a title="<?php esc_attr_e('linkedin','under-construction-lite'); ?>" class="fa fa-pinterest" target="_blank" href="<?php echo esc_url(get_theme_mod('under_construction_lite_pin','')); ?>"></a></li>
          <?php }?>
        </ul>                
        <div class="clear"></div> 
      </div>
      <!-- header section end --> 
<section id="header">
  <header class="container">
    <div class="header_top row">      
      <!--header section start -->
      <div class="header_left headercommon">  
      <div class="logo">
          <?php if (has_custom_logo()) {?>
           <a href="<?php echo esc_url( home_url( '/') ); ?>"><?php under_construction_lite_the_custom_logo(); ?></a>
          <?php }if(display_header_text()==true) {?>
            <h1><a href="<?php echo esc_url( home_url( '/') ); ?>"><?php bloginfo('name'); ?></a></h1>
          <p><?php bloginfo('description'); ?></p>
          <?php }?>
        </div><!-- logo -->
      </div>
        <div class="header_right headercommon">
        <div class="contact-info">
          
            <?php $under_construction_lite_phone = get_theme_mod('under_construction_lite_phone'); ?>
            <?php if(get_theme_mod('under_construction_lite_phone')){?>
              <span class="info headerphone"><span class="fa fa-phone"></span>&nbsp;&nbsp;<?php echo esc_html(under_construction_lite_sanitize_phone_number($under_construction_lite_phone));?></span>
            <?php }?>           
            
            <?php $under_construction_lite_email = get_theme_mod('under_construction_lite_email'); ?>
            <?php if(get_theme_mod('under_construction_lite_email')){?>
               <span class="info headeremail"><span class="fa fa-envelope"></span>&nbsp;&nbsp;<?php echo esc_html(sanitize_email($under_construction_lite_email));?></span>
            <?php }?>
          
        </div><!--contact-info-->
 </div><!--header_middle--> 

      
          
      <div class="clear"></div>
    </div><!--header_top-->
    <div class="clear"></div>
    </div>
  </header>
</section><!--header-->
