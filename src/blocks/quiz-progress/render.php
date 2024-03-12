<?php
$state = wp_interactivity_state( 'dev-hours/quiz', array(
	'answered'    => 0,
	'allAnswered' => false,
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
	<div>
		<button data-wp-bind--disabled="!state.allAnswered">
			<?php echo __( 'Check your answers' ); ?>
		</button>
	</div>
	<hr>
	<div>
		<?php echo $content; ?>
	</div>
</div>