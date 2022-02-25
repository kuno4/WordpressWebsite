<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Creating widget for WP Google Map
 */
class srmgmap_widget extends WP_Widget
{

    public $base_id = 'srmgmap_widget'; //widget id
    public $widget_name = 'Google Map SRM'; //widget name
    public $widget_options = array(
        'description' => 'Google Map SRM' //widget description
    );

    public function __construct()
    {
        parent::__construct(
			$this->base_id, 
			$this->widget_name, 
			$this->widget_options
		);
		
		add_action( 'widgets_init', function() { register_widget( 'srmgmap_widget' ); });
    }

    // Map display in front
    public function widget( $args, $instance )
    {
		$title = apply_filters( 'widget_title', $instance['title'] );

        extract( $args );
        extract( $instance );
        echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
        echo do_shortcode( $instance['srmgmap_shortcode'] );
        echo $after_widget;
    }

    /**
     * Google Map Widget
     * @return String $instance
     */
    public function form( $instance )
    {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
	    $map_shortcodes_list  = '';
	    $args     = array(
		    'post_type'      => 'wpgmapembed',
		    'posts_per_page' => - 1
	    );
	    $mapsList = new WP_Query( $args );

	    if ( $mapsList->have_posts() ) {
		    while ( $mapsList->have_posts() ) {
			    $mapsList->the_post();
			    $gmap_title   = get_post_meta( get_the_ID(), 'wpgmap_title', true );
			    if($gmap_title==''){
				    $gmap_title = 'No title';
			    }
			    $option_value = esc_attr( '[gmap-embed id=&quot;' . get_the_ID() . '&quot;]' );
                $selected = '';
			    if(isset($instance['srmgmap_shortcode']) and $instance['srmgmap_shortcode']==html_entity_decode($option_value)){
			        $selected = 'selected';
                }
			    $map_shortcodes_list .= '<option value="' . $option_value . '" '.$selected.'>' . $gmap_title.' '.esc_attr( '[gmap-embed id=&quot;' . get_the_ID() . '&quot;]' ).'</option>';
		    }
	    }
        ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
        </p>
		<p>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
            <label for="<?php echo $this->get_field_id( 'srmgmap_shortcode' ); ?>"> Select Google Map Shortcode:</label><br/>
        </p>
        <p>
            <select id="<?php echo $this->get_field_id( 'srmgmap_shortcode' ); ?>"
                    name="<?php echo $this->get_field_name( 'srmgmap_shortcode' ); ?>" class="widefat">
	            <?php echo $map_shortcodes_list;?>
            </select>
        </p>

        <?php
    }
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['srmgmap_shortcode'] = ( ! empty( $new_instance['srmgmap_shortcode'] ) ) ? $new_instance['srmgmap_shortcode']  : '';
		return $instance;
	}

}

$srmgmap = new srmgmap_widget();
