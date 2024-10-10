<?php
/**
 * Example block markup
 *
 * @package TenUpTheme\Blocks\Example
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */

$title = isset($attributes['tabTitle'])  ? $attributes['tabTitle'] : 'Tab';

?>
<div class="custom-tab">
	<h4 class="tab-title">
		<?php echo esc_attr($title); ?>
	</h4>
	<div class="tab-content">
		<?php echo $content; ?>
	</div>
</div>
