<?php

if(!defined('ABSPATH')) die();

class GymFitness_Clases_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'gymfitness_widget',
			esc_html__( 'GymFitness Clases', 'gymfitness' ), 
			array( 'description' => esc_html__( 'Agrega las Clases como Widget', 'gymfitness' ), )
		);
	}

	public function widget( $args, $instance ) {
        ?>
			<ul class="lessons-sidebar">
				<?php 
					$args = array(
						'post_type' => 'gymfitness_clases',
						'posts_per_page' => $instance['quantity']
					);
					$lessons = new WP_Query($args);
					while($lessons->have_posts()) {
						$lessons->the_post();
						?>
							<li>
								<div class="image">
									<?php the_post_thumbnail('thumbnail'); ?>
								</div>
								<div class="content-lesson">
									<a href="<?php the_permalink(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
									<?php 
										$start_time = get_field('start_time');
										$finish_time = get_field('finish_time');
									?>
									<p>
										<?php the_field('lessons_days'); ?> - 
										<?php echo $start_time . " to " . $finish_time; ?>
									</p>
								</div>
							</li>
						<?php
					}
					wp_reset_postdata();
				?>
			</ul>
		<?php
	}

	public function form( $instance ) {
		$quantity = !empty($instance['quantity']) ? $instance['quantity'] : esc_html('How many classes do you want to show?');
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('quantity')); ?>">
				<?php esc_attr_e('How many classes do you want to show?'); ?>
			</label>
			<input
				class="widefat"
				id="<?php echo esc_attr($this->get_field_id('quantity')); ?>"
				name="<?php echo esc_attr($this->get_field_name('quantity')); ?>"
				type="number"
				value="<?php echo esc_attr($quantity); ?>"
			/>
		</p>

		<?php
   	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['quantity'] = (!empty($new_instance['quantity'])) ? sanitize_text_field($new_instance['quantity']) : '';
		return $instance;
	}
} 

function gymfitness_registrar_widget() {
    register_widget( 'GymFitness_Clases_Widget' );
}

add_action( 'widgets_init', 'gymfitness_registrar_widget' );