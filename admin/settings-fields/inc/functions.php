<?php
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


// Text Field
function coronaupdate_text_field( array $args ) {

	$obj = new CoronaUpdate\Settings\Text( $args );
	$obj->get_field();

}
// Textarea Field
function coronaupdate_textarea_field( array $args ) {

	$obj = new CoronaUpdate\Settings\Textarea( $args );
	$obj->get_field();

}
// Hidden Field
function coronaupdate_hidden_field( array $args ) {

	$obj = new CoronaUpdate\Settings\Hidden( $args );
	$obj->get_field();

}
// Checkbox Field
function coronaupdate_checkbox_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Checkbox( $args );
	$obj->get_field();
}
// Radio Field
function coronaupdate_radio_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Radio( $args );
	$obj->get_field();
}
// Color Picker Field
function coronaupdate_colorpicker_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Color_Picker( $args );
	$obj->get_field();
}
// drug and drop Field
function coronaupdate_drugdrop_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Drug_Drop( $args );
	$obj->get_field();
}
// Group Field
function coronaupdate_group_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Group( $args );
	$obj->get_field();
}
// Text Repeter Field
function coronaupdate_textrepeter_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Text_Repeter( $args );
	$obj->get_field();
}
// Image Upload Field
function coronaupdate_imageupload_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Image_Upload( $args );
	$obj->get_field();

}
// Select Field
function coronaupdate_select_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Select( $args );
	$obj->get_field();

}
// Select range Field
function coronaupdate_range_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Range( $args );
	$obj->get_field();

}
// Select multitext repeter field
function coronaupdate_multitext_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Multitext_Repeter( $args );
	$obj->get_field();

}
// Switcher field
function coronaupdate_switcher_field( array $args ) {
	$obj = new CoronaUpdate\Settings\Switcher( $args );
	$obj->get_field();

}