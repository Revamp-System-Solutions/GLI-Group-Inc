<?php

// don't load directly
defined( 'ABSPATH' ) || exit;

final class Borderless_Wpbakery {
    
    public function __construct() {
        
        // We safely integrate with WPBakery with this hook
        add_action( 'plugins_loaded', [ $this, 'wpbakery_check' ] );

        add_action('admin_enqueue_scripts',array($this,'wpbakery_icon_fonts_styles'));
        
    }
    
    // Check if WPBakery is installed
    public function wpbakery_check() {
        if ( defined( 'WPB_VC_VERSION' ) ) {
            add_action( 'init', [ $this, 'wpbakery_init' ] );
            return;
        } else {
            add_action('admin_notices', array( $this, 'wpbakery_notice' ));
            return;
        }   
    }
    
    // Show notice if your plugin is activated but WPBakery is not
    public function wpbakery_notice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
        <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="https://wpbakery.com/" target="_blank">WPBakery Page Builder</a></strong> plugin to be installed and activated on your site.', 'borderless'), $plugin_data['Name']).'</p>
        </div>';
    }
    
    public function wpbakery_init() {
        
        require_once( BORDERLESS__WPBAKERY . "/lean-map.php");   
        require_once( BORDERLESS__WPBAKERY . "/paramns/icon-manager-param.php" );
        
    }

    function wpbakery_icon_fonts_styles($hook) {
		
		// enqueue css files on backend
		if($hook == "post.php" || $hook == "post-new.php" || $hook == 'visual-composer_page_vc-roles'){
			if((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || is_ssl()) {
				$scheme = 'https';
			}
			else {
				$scheme = 'http';
			}
			$this->paths = wp_upload_dir();
			$this->paths['fonts']   = 'borderless_icon_fonts';
			$this->paths['fonturl'] = set_url_scheme($this->paths['baseurl'].'/'.$this->paths['fonts'], $scheme);
			$fonts = get_option('borderless_icon_fonts');
			if(is_array($fonts))
			{
				foreach($fonts as $font => $info)
				{
					if(strpos($info['style'], 'http://' ) !== false) {
						wp_enqueue_style('borderless-'.$font,$info['style']);
					} else {
						wp_enqueue_style('borderless-'.$font,trailingslashit($this->paths['fonturl']).$info['style']);
					}
				}
			}
		}
	}
    
}
new Borderless_Wpbakery();