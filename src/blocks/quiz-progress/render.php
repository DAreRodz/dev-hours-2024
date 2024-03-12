<?php
$state = wp_interactivity_state( 'dev-hours/quiz', array(
	'answered' => 0
) );
?>

<div 
	<?php echo get_block_wrapper_attributes(); ?>
	data-wp-interactive="dev-hours/quiz"
>
	<div>
		<strong>
			<?php echo __( 'Exercises' ); ?>:
		</strong>
		<span
			data-wp-text="state.answered"
		></span>/<?php echo count( $state['quizzes'] ); ?>
	</div>
	<hr>
	<div>
		<?php echo $content; ?>
	</div>
</div>