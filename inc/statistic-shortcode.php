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


class Coronaupdate_Statistic_Shortcode{


    function __construct() {

        add_shortcode( 'corona_statistic', [$this, 'worldwide_single_shortcode'] );
        add_shortcode( 'corona_statistic_together', [$this, 'worldwide_together_shortcode'] );

    }

    public function worldwide_single_shortcode( $atts ) {

        $attr = shortcode_atts( array(
            'data' => 'cases',
            'title' => 'Cases',
            'title_color' => '#555',
            'number_color' => '#8ACA2B',
            'title_font_size' => '28px',
            'number_font_size' => '26px'
        ), $atts );
     

        global $coronaData;

        $cases      = !empty( $coronaData['cases'] ) ? $coronaData['cases'] : '';
        $deaths     = !empty( $coronaData['deaths'] ) ? $coronaData['deaths'] : '';
        $recovered  = !empty( $coronaData['recovered'] ) ? $coronaData['recovered'] : '';


        switch( $attr['data'] ) {

            case 'cases' :
                $number = !empty( $coronaData['cases'] ) ? $coronaData['cases'] : '';
            break;
            case 'deaths':
                $number = !empty( $coronaData['deaths'] ) ? $coronaData['deaths'] : '';
            break;
            case 'recovered':
                $number = !empty( $coronaData['recovered'] ) ? $coronaData['recovered'] : '';
            break;
            default: 
                $number = !empty( $coronaData['cases'] ) ? $coronaData['cases'] : '';
            break;

        }

        ob_start();

        echo '<div class="corona-shortcode-statistic"><h3 style="color:'.esc_attr( $attr['title_color'] ).'font-size:'.esc_attr($attr['title_font_size']).';">'.esc_html( $attr['title'] ).'</h3><h5 style="color:'.esc_attr( $attr['number_color'] ).';font-size:'.esc_attr($attr['title_font_size']).';">'.esc_html( $number ).'</h5></div>';


        return ob_get_clean();


    }

    public function worldwide_together_shortcode( $atts ) {

        $bgurl = CORONAUPDATE_DIR_URL.'assets/coronavirus-bg.jpg';

        $attr = shortcode_atts( array(
            'width'         => '550px',
            'title'         => esc_html__( 'Worldwide Statistic', 'corona-update' ),
            'section_bg'    => $bgurl,
            'title_color'   => '#fff',
            'text_color'    => '#fff',
            'cases_bg'      => '#ffc825',
            'deaths_bg'     => '#ff0000',
            'recovered_bg'  => '#19c858',
        ), $atts );
     

        global $coronaData;


        ob_start();

        echo '<div class="coronaupdate-ww-statistic" style="width:'.esc_attr( $attr['width'] ).';background-image:url('.esc_url( $attr['section_bg'] ).');color:'.esc_attr( $attr['title_color'] ).';">';

            if( !empty( $attr['title'] ) ) {
                echo '<h3 style="color:'.esc_attr( $attr['title_color'] ).';">'.esc_html( $attr['title'] ).'</h3>';
            }

            echo '<div class="coronaupdate-ww-statistic-inner">';
            if( !empty( $coronaData['cases'] ) ) {
                echo '<div class="single-statistic" style="background-color:'.esc_attr( $attr['cases_bg'] ).';color:'.esc_attr( $attr['text_color'] ).';"><span class="title">Coronavirus Cases</span><span class="number">'.esc_html( $coronaData['cases'] ).'</span></div>';
            }
            //
            if( !empty( $coronaData['deaths'] ) ) {
                echo '<div class="single-statistic" style="background-color:'.esc_attr( $attr['deaths_bg'] ).';color:'.esc_attr( $attr['text_color'] ).';"><span class="title">Deaths:</span><span class="number">'.esc_html( $coronaData['deaths'] ).'</span></div>';
            }
            //
            if( !empty( $coronaData['recovered'] ) ) {
                echo '<div class="single-statistic" style="background-color:'.esc_attr( $attr['recovered_bg'] ).';color:'.esc_attr( $attr['text_color'] ).';"><span class="title">Recovered:</span><span class="number">'.esc_html( $coronaData['recovered'] ).'</span></div>';
            }
            
        echo '</div>';
        echo '</div>';


        return ob_get_clean();


    }


}


new Coronaupdate_Statistic_Shortcode();