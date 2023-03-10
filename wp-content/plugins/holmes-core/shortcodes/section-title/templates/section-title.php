<div class="mkdf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo holmes_mkdf_get_inline_style($holder_styles); ?>>
	<div class="mkdf-st-inner">
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="mkdf-st-title" <?php echo holmes_mkdf_get_inline_style($title_styles); ?>>
				<?php echo wp_kses_post($title); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<<?php echo esc_attr($text_tag); ?> class="mkdf-st-text" <?php echo holmes_mkdf_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true)); ?>
			</<?php echo esc_attr($text_tag); ?>>
		<?php } ?>
	</div>
</div>