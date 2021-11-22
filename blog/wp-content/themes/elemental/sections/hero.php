<?php
/**
 * Hero Section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<section id="welcome" class="hero">
<?php if($integral['hero-overlay-toggle']==1) { ?><div class="blacklayer"></div><?php } ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if ($integral['hero-title']) { ?><h1><?php echo esc_html($integral['hero-title']); ?></h1><?php } ?>
			<?php if ($integral['hero-subtitle']) { ?><h2><?php echo wp_kses_post($integral['hero-subtitle']); ?></h2><?php } ?>
			<?php if ($integral['hero-tagline']) { ?>
            <div class="lead text-left">
                <p><?php echo wp_kses_post(str_replace("\n", "<br>", $integral['hero-tagline'])); ?></p>
            </div>
            <?php } ?>
			<?php if($integral['hero-btn1-toggle']==true){ ?>
                <a href="<?php echo esc_url($integral['hero-btn1-url']); ?>" class="btn btn-lg btn-secondary btn-rounded"><?php echo esc_html($integral['hero-btn1-text']); ?></a>
			<?php } ?>
			<?php if($integral['hero-btn2-toggle']==true) { ?>
                <a href="<?php echo esc_url($integral['hero-btn2-url']); ?>" class="btn btn-lg btn-primary"><?php echo esc_html($integral['hero-btn2-text']); ?></a>
			<?php } ?>
		</div>
	</div>
</div>
</section><!--hero-->