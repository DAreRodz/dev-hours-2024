<?php
$state = wp_interactivity_state( 'dev-hours/quiz', array(
	'answered'    => 0,
	'allAnswered' => false,
	'showAnswers' => false,
	'correct'     => '?',
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
		<strong><?php echo __( 'Correct' ); ?></strong>: 
		<span data-wp-text="state.correct"></span>
	</div>
	<div>
		<button
			data-wp-bind--hidden="state.showAnswers"
			data-wp-bind--disabled="!state.allAnswered"
			data-wp-on--click="actions.checkAnswers"
		>
			<?php echo __( 'Check your answers' ); ?>
		</button>
		<button
			data-wp-bind--hidden="!state.showAnswers"
			data-wp-on--click="actions.reset"
		>
			<?php echo __( 'Reset' ); ?>
		</button>
	</div>
	<hr>
	<div>
		<?php echo $content; ?>
	</div>
</div>