<?php
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


/**************************************
*Creating Corona Statistic Widget
***************************************/

class corona_update_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'corona_update_widget',
			// Widget name will appear in UI
			esc_html__( 'Corona Update :: Statistic', 'corona-update' ),
			// Widget description
			array(
				'description'	 => esc_html__( 'Add Corona Statistic Widget', 'corona-update' ),
				'classname'		 => 'corona_update_widget',
			)
		);
	}

// This is where the action happens
public function widget( $args, $instance ) {
	$title 			= apply_filters( 'widget_title', $instance['title'] );


	//before and after widget arguments are defined by themes
	echo $args['before_widget'];

    if ( ! empty( $title ) ){
        echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
    }

    	global $coronaData;

    	$cases = !empty( $coronaData['cases'] ) ? $coronaData['cases'] : '';
    	$deaths = !empty( $coronaData['deaths'] ) ? $coronaData['deaths'] : '';
    	$recovered = !empty( $coronaData['recovered'] ) ? $coronaData['recovered'] : '';


    	echo '<ul class="corona-widget">';
    		echo '<li><h3>Coronavirus Cases:</h3><span class="cases">'.esc_html( $cases ).'</span></li>';
    		echo '<li><h3>Deaths:</h3><span class="deaths">'.esc_html( $deaths ).'</span></li>';
    		echo '<li><h3>Recovered:</h3><span class="recovered">'.esc_html( $recovered ).'</span></li>';
    	echo '</ul>';


	echo $args['after_widget'];

}

// Widget Backend
public function form( $instance ) {
	//Title
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}else {
		$title = esc_html__( 'Corona Update', 'corona-update' );
	}



?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
			<?php
				_e( 'Title:' ,'corona-update');
			?>
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>


<?php
}
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();

	$instance['title'] 	= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';


	return $instance;
}

}

// Register and load the widget
function corona_update_load_widget() {
	register_widget( 'corona_update_widget' );
}
add_action( 'widgets_init', 'corona_update_load_widget' );