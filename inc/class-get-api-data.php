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

if( !defined( 'WPINC' ) ) {
    die;
}

class Get_API_Data {

	private $api_url = 'https://corona.lmao.ninja/v2/all';

	public function call_api() {

		$url = $this->api_url;

		$data =  @file_get_contents( $url );
		$getData = json_decode( $data, true );

		return $getData;

	}

	public function get_data() {

		return $this->call_api();

	}


}
