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

//
coronaupdate_switcher_field(
    array(

        'label' => esc_html__( 'Popup Switcher', 'corona-update' ),
        'inline' => false,
        'name'  => 'popupswitcher',
    )
);
// Page select option
coronaupdate_select_field(
    array(

        'label' => esc_html__( 'Select Page', 'corona-update' ),
        'inline' => false,
        'name'  => 'page',
        'options' => coronaupdate_get_page_lists()
    )
);
// Popup title field
coronaupdate_text_field(
    array(

        'label' => esc_html__( 'Popup Title', 'corona-update' ),
        'inline' => false,
        'name'  => 'popuptitle',
    )
);
// Popup Content field
coronaupdate_textarea_field(
    array(

        'label' => esc_html__( 'Popup Content', 'corona-update' ),
        'inline' => false,
        'name'  => 'popupcontent',
    )
);
// Popup Position field
coronaupdate_select_field(
    array(

        'label' => esc_html__( 'Popup Position', 'corona-update' ),
        'inline' => false,
        'name'  => 'popupposition',
        'options' => [
            'top' => 'Top', 
            'bottom' => 'Bottom', 
        ]
    )
);
// Popup title color field
coronaupdate_colorpicker_field(
    array(

        'label' => esc_html__( 'Popup Title Color', 'corona-update' ),
        'inline' => false,
        'name'  => 'titlecolor'
    )
);
// Popup Content color field
coronaupdate_colorpicker_field(
    array(

        'label' => esc_html__( 'Popup Content Color', 'corona-update' ),
        'inline' => false,
        'name'  => 'contentcolor'
    )
);
// Popup bg color field
coronaupdate_colorpicker_field(
    array(

        'label' => esc_html__( 'Popup Background Color', 'corona-update' ),
        'inline' => false,
        'name'  => 'bgcolor'
    )
);
// Popup left image field
coronaupdate_imageupload_field(
    array(

        'label' => esc_html__( 'Popup Left Awareness Image ( size 1008X100 )', 'corona-update' ),
        'inline' => false,
        'name'  => 'leftimg'
    )
);
// Popup left image link field
coronaupdate_text_field(
    array(

        'label' => esc_html__( 'Left Awareness Image Link', 'corona-update' ),
        'inline' => false,
        'name'  => 'leftimglink',
    )
);
// Popup left image field
coronaupdate_imageupload_field(
    array(

        'label' => esc_html__( 'Popup Right Awareness Image ( size 1008X100 )', 'corona-update' ),
        'inline' => false,
        'name'  => 'rightimg'
    )
);
// Popup right image link field
coronaupdate_text_field(
    array(

        'label' => esc_html__( 'Right Awareness Image Link', 'corona-update' ),
        'inline' => false,
        'name'  => 'rightimglink',
    )
);
