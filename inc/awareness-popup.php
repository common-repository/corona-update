<?php
namespace CoronaUpdate;
/**
 *
 * @package     Corona Update
 * @author      ThemeLooks <support@themelooks.com>
 * @copyright   2020 ThemeLooks
 * @license     GPL-2.0-or-later
 * Websites: http://www.themelooks.com
 *
 *
 */


class Awareness_Popup{

    private $options;


	function __construct() {

        $this->options = get_option('coronaupdate_options');

        if( !empty( $this->options['popupswitcher'] ) ) {

            add_action( 'wp_footer', [$this,'popup'] );
            
        }

	}


    public function popup() {

        $opt = $this->options;

        if( $opt['page'] == 'all' ) {
            $page = 'all';
        } else {
            $page =  is_home() ? is_home() : is_page( $opt['page'] );
        }

        if( $page ): 

        $position  = !empty( $opt['popupposition'] ) ? $opt['popupposition'] : 'top';
        $contentcolor  = !empty( $opt['contentcolor'] ) ? $opt['contentcolor'] : '#fff';
        $titlecolor  = !empty( $opt['titlecolor'] ) ? $opt['titlecolor'] : '#fff';
        $bgcolor  = !empty( $opt['bgcolor'] ) ? $opt['bgcolor'] : '#ff0000';

        $leftimg  = !empty( $opt['leftimg'] ) ? $opt['leftimg'] : '';
        $rightimg = !empty( $opt['rightimg'] ) ? $opt['rightimg'] : '';

        $rightimglink = !empty( $opt['rightimglink'] ) ? $opt['rightimglink'] : '#';
        $leftimglink  = !empty( $opt['leftimglink'] ) ? $opt['leftimglink'] : '#';

        ?>
        <div class="awareness-popup-wrapper <?php echo esc_attr( $position ); ?>" style="background-color:<?php echo esc_attr( $bgcolor ); ?>;">
            <span class="closebtn">X</span>
            <?php
            //
            if( $opt['popuptitle'] ) {
                echo '<h2 style="color:'.esc_attr( $titlecolor ).';">'.esc_html( $opt['popuptitle'] ).'</h2>';
            }
            //
            if( !empty( $opt['popupcontent'] ) ) {
                echo '<p style="color:'.esc_attr( $contentcolor ).';">'.wp_kses_post( $opt['popupcontent'] ).'</p>';
            }
            // leftimg
            if( !empty( $rightimg ) || !empty( $leftimg ) ):
            ?>
            <div class="awareness-image">
                <?php 
                if( !empty( $leftimg ) ) {
                    echo '<div class="awareness-single-image"><a href="'.esc_url( $leftimglink ).'" target="_blank"><img src="'.esc_url( $leftimg ).'" /></a></div>';
                }
                //
                if( !empty( $rightimg ) ) {
                    echo '<div class="awareness-single-image"><a href="'.esc_url( $rightimglink ).'" target="_blank"><img src="'.esc_url( $rightimg ).'" /></a></div>';
                }
                ?>
            </div>
            <?php 
            endif;
            ?>
        </div>
        <?php

        endif;
    }
	


}

new Awareness_Popup();
