<?php

namespace TenUpTheme\Blocks;

class CoreHeading {

	public function init_hooks() {
		add_filter('render_block', array($this, 'filter_core_heading_block_output'), 10, 2);

	}
	public function filter_core_heading_block_output($block_content, $block) {
		// Only modify the 'core/heading' block
		if ($block['blockName'] !== 'core/heading') {
			return $block_content;
		}

		// Get block attributes
		$attributes = $block['attrs'] ?? [];
		$partOfMealPlan = $attributes['partOfMealPlan'] ?? false;
		$meal = $attributes['meal'] ?? 'breakfast';

		// If the heading is part of the meal plan, modify the output
		if ($partOfMealPlan) {
			// Define meal colors
			$meal_colors = array(
				'breakfast' => '#D1DBFD',
				'lunch' => '#C5E7CE',
				'dinner' => '#ECE8E2',
				'snack' => '#E7CDA7',
			);

			// Add FAB button with meal type
			$meal_color = $meal_colors[$meal] ?? 'gray';
			$fab_button = sprintf(
				'<div class="meal-fab meal-%s" style="background-color: %s; border-radius: 60px; color: black; display: inline-block; text-transform: uppercase;">%s</div>',
				esc_attr($meal),
				esc_attr($meal_color),
				esc_html($meal)
			);

			// Append the FAB to the original block content
			$block_content = $fab_button . $block_content;
		}

		return $block_content;
	}
}
