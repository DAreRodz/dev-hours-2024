<?php
$unique_id = substr(uniqid(), -5);
$context   = array( 'id' => $unique_id, 'answer' => null );

wp_interactivity_state( 'dev-hours/quiz', array(
	'selected'   => null,
	'closeText'  => __( 'Close menu' ),
	'openText'   => __( 'Open menu' ),
	'toggleText' => __( 'Open menu' ),
) );
?>

<div
	<?php echo get_block_wrapper_attributes(); ?>
	data-wp-interactive="dev-hours/quiz"
	<?php echo wp_interactivity_data_wp_context( $context ); ?>
	data-wp-on--keydown="actions.closeOnEsc"
>
	<div>
		<strong>
			<?php echo __( 'Question' ) . ": "; ?>
		</strong>

		<?php echo $attributes[ 'question' ]; ?>

		<button
			data-wp-on--click="actions.toggle"
			data-wp-bind--aria-expanded="state.isOpen"
			aria-controls="quiz-<?php echo $unique_id; ?>"
			data-wp-text="state.toggleText"
		></button>
	</div>

	<div
		data-wp-bind--hidden="!state.isOpen"
		id="quiz-<?php echo $unique_id; ?>"
	>
		<?php if ( $attributes['typeOfQuiz'] == 'boolean' ): ?>
			<button
				<?php echo wp_interactivity_data_wp_context( array( 'thisAnswer' => true ) ); ?>
				data-wp-watch="callbacks.focusOnOpen"
				data-wp-on--click="actions.answer"
				data-wp-class--active="state.isActive"
			>
				<?php echo __( 'Yes' ); ?>
			</button>
			<button
				<?php echo wp_interactivity_data_wp_context( array( 'thisAnswer' => false ) ); ?>
				data-wp-on--click="actions.answer"
				data-wp-class--active="state.isActive"
			>
				<?php echo __( 'No' ); ?>
			</button>

		<?php elseif ( $attributes['typeOfQuiz'] === 'input'): ?>
			<input type="text" data-wp-watch="callbacks.focusOnOpen">

		<?php endif; ?>
	</div>
</div>