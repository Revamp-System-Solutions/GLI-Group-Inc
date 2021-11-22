<?php
if (!isset($content_width))
    $content_width = 900;

add_action('admin_menu', 'under_construction_lite_pros');

function under_construction_lite_pros() {
    add_theme_page(esc_html__('Under Construction Lite Details', 'under-construction-lite'), esc_html__('Under Construction Lite Details', 'under-construction-lite'), 'edit_theme_options', 'under_construction_lite_pro', 'under_construction_lite_pro_details');
}

function under_construction_lite_pro_details() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Under Construction Lite', 'under-construction-lite'); ?></h1>

        <div>
            <img style="width:50%;" src="<?php echo esc_url(get_template_directory_uri()); ?>/view/images/under-construction.jpg" alt="<?php bloginfo('name'); ?>" style=" width: 100%;"> 
        </div>

        <p><strong> <?php esc_html_e('Description: ', 'under-construction-lite'); ?></strong><?php esc_html_e('Under Construction WordPress Template theme is used for all type of Multipurpose business coming soon landing page before website development or before start your multipurpose business. That Multipurpose Theme covers many Business includes various market areas like corporate business, Marketing, Finance, Stock Market, Investment business, IT infrastructure, Consultant, Manufacture plant, Services, Retailer, Wholesaler, Online business, Insurance, SIP, Mutual Fund, Services, Marketing, Finance, Stock Market, Nifty, Store business, IT Firm, Retailers, Education, Shopping, E-commerce, Gift Service market, Beauty, Fashion, Blogger, News, Portfolio, and all types of business.', 'under-construction-lite'); ?></p>
        <a class="button button-primary button-large" href="<?php echo esc_url(UNDER_CONSTRUCTION_LITE_THEMEURL); ?>" target="_blank"><?php esc_html_e('Theme Url', 'under-construction-lite'); ?></a>	
        <a class="button button-primary button-large" href="<?php echo esc_url(UNDER_CONSTRUCTION_LITE_PROURL); ?>" target="_blank"><?php esc_html_e('Pro Theme Url', 'under-construction-lite'); ?></a>
        <a class="button button-primary button-large" href="<?php echo esc_url(UNDER_CONSTRUCTION_LITE_PURCHASEURL); ?>" target="_blank"><?php esc_html_e('Click To Purchase', 'under-construction-lite'); ?></a>
        <a class="button button-primary button-large" href="<?php echo esc_url(UNDER_CONSTRUCTION_LITE_PURCHASEURL); ?>" target="_blank"><?php esc_html_e('Price: $9.99 Only', 'under-construction-lite'); ?></a>
        <a class="button button-primary button-large" href="<?php echo esc_url(UNDER_CONSTRUCTION_LITE_DOCURL); ?>" target="_blank"><?php esc_html_e('Documentation', 'under-construction-lite'); ?></a>
        <a class="button button-primary button-large" href="<?php echo esc_url(UNDER_CONSTRUCTION_LITE_DEMOURL); ?>" target="_blank"><?php esc_html_e('View Demo', 'under-construction-lite'); ?></a>
        <a class="button button-primary button-large" href="<?php echo esc_url(UNDER_CONSTRUCTION_LITE_SUPPORTURL); ?>" target="_blank"><?php esc_html_e('Support', 'under-construction-lite'); ?></a>
    </div> 
    </div>
<?php } ?>
<?php
add_action('customize_register', 'under_construction_lite_customize_register');
define('UNDER_CONSTRUCTION_LITE_PROURL', 'https://www.themescave.com/themes/wordpress-theme-under-construction/');
define('UNDER_CONSTRUCTION_LITE_THEMEURL', 'https://www.themescave.com/themes/wordpress-template-under-construction-lite/');
define('UNDER_CONSTRUCTION_LITE_DOCURL', 'https://www.themescave.com/documentation/under-construction-pro');
define('UNDER_CONSTRUCTION_LITE_DEMOURL', 'https://www.themescave.com/demo/under-construction-pro');
define('UNDER_CONSTRUCTION_LITE_SUPPORTURL', 'https://www.themescave.com/forums/forum/under-construction-pro/');
define('UNDER_CONSTRUCTION_LITE_PURCHASEURL', 'https://www.themescave.com/themes/?add-to-cart=1049');
