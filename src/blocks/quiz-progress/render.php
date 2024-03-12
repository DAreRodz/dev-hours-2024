<?php
$state = wp_interactivity_state( 'dev-hours/quiz' );
?>

<div <?php echo get_block_wrapper_attributes(); ?>>
	<div>
		<strong>
			<?php echo __( 'Exercises' ); ?>:
		</strong>
		<?php echo count( $state['quizzes'] ); ?>
	</div>
	<hr>
	<div>
		<?php echo $content; ?>
	</div>
</div>