<?php
namespace CoronaUpdate\Admin;
/**
 *
 * @package     Corona Update
 * @author      ThemeLooks
 * @copyright   2020 ThemeLooks
 * @license     GPL-2.0-or-later
 *
 *
 */

if( !defined( 'WPINC' ) ) {
    die;
}

class Admin_Menu {

	function __construct() {
		add_action( 'admin_menu', [$this, 'add_menu_page'] );
		add_action( 'admin_init', [$this, 'register_setting'] );
	}


    public function add_menu_page() {

		add_menu_page(
            esc_html__( 'Corona Update', 'corona-update' ),
            esc_html__( 'Corona Update', 'corona-update' ),
            'manage_options',
            'corona_page',
            [$this, 'admin_corona_view_callback'],
            'dashicons-admin-site-alt3',
            6
        );

    }

    public function admin_corona_view_callback() {
    	?>
        <div class="tl_qv_settings_page">
        	<form method="post" action="options.php">
                <?php 
                settings_fields( 'coronaupdate-options-group' );
                do_settings_sections( 'coronaupdate-options-group' );

                echo '<div class="admin-promo-notice"><h3>Thank you for using Corona Update plugin. Would you like to visit our Premium <a href="https://themeforest.net/user/themelooks/portfolio" target="_blank">Themes </a> & <a href="https://codecanyon.net/user/themelooks/portfolio" target="_blank">Plugins</a> ?</h3></div>';
                echo '<div class="admin-promo-notice"><h3>Corona update pro version are available. Would you like to  <a href="https://codecanyon.net/item/corona-updatepro-covid19-live-update-widgets-for-wordpress-elementor/26140216" target="_blank">Buy Now </a> ?</h3></div>';

                echo '<div class="shortcode-info" style="background-color: #fff;padding: 20px 28px;">';
                        echo '<h3>Use the following shortcode to show corona live statistic.</h3>';
                        echo '<h4>## Worldwide Single Statistic Shortcode:</h4>';
                        echo '<h5> Cases Statistic Shortcode: </h5><code>[corona_statistic data="cases" title="Coronavirus Cases" title_font_size="28px"  title_color="#555" number_color="#aaa"  number_font_size="26px"  ]</code>';
                        echo '<h5> Deaths Statistic Shortcode: </h5><code>[corona_statistic data="deaths"  title="Deaths:" title_font_size="28px"  title_color="#555" number_color="#696969"  number_font_size="26px"]</code>';
                        echo '<h5> Recovered Statistic Shortcode: </h5><code>[corona_statistic data="recovered"  title="Recovered:" title_font_size="28px"  title_color="#555" number_color="#8ACA2B"  number_font_size="26px"]</code>';
                        echo '<h4>## Worldwide Together Statistic Shortcode:</h4>';
                        echo '<strong>Default:</strong> <br><br><code>[corona_statistic_together]</code> <br><br>';
                        echo '<strong>With Options:</strong><br><br><code>[corona_statistic_together width="550px" title="Worldwide Statistic" section_bg="http://example.com/bg-image.png" title_color="#fff" text_color="#fff" cases_bg="#ffc825" deaths_bg="#ff0000" recovered_bg="#19c858" ]</code>';
                echo '</div>';

                require_once CORONAUPDATE_DIR_ADMIN . 'inc/template-settings.php';

                submit_button(); 

                ?>
        	</form>
        </div>
    	<?php
    }

 	public function register_setting() {
 		register_setting( 'coronaupdate-options-group', 'coronaupdate_options', 'corona_page' ); 
 	}

}

new Admin_Menu;