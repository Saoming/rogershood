import '../../css/admin/admin-style.css';

// Import necessary dependencies
const { registerBlockType } = wp.blocks;
const { ToggleControl, SelectControl, InspectorControls } = wp.blockEditor;
const { PanelBody } = wp.components;
const { Fragment } = wp.element;

// Extend the core/heading block
wp.domReady(() => {
	wp.blocks.registerBlockVariation('core/heading', {
		name: 'meal-heading',
		title: 'Meal Plan Heading',
		category: 'text',
		attributes: {
			part_of_meal_plan: {
				type: 'boolean',
				default: false,
			},
			meal: {
				type: 'string',
				default: '',
			},
		},
		edit: EditMealHeading,
	});
});

// Custom edit function for the block
function EditMealHeading(props) {
	const { attributes, setAttributes, isSelected } = props;
	const { part_of_meal_plan, meal } = attributes;

	// FAB colors based on the meal selection
	const mealColors = {
		breakfast: 'purple',
		lunch: 'green',
		dinner: 'orange',
		snack: 'yellow',
	};

	// Define meal options
	const mealOptions = [
		{ label: 'Breakfast', value: 'breakfast' },
		{ label: 'Lunch', value: 'lunch' },
		{ label: 'Dinner', value: 'dinner' },
		{ label: 'Snack', value: 'snack' },
	];

	// Conditional FAB rendering based on meal
	const renderFAB = () => {
		if (meal) {
			return (
				<div className={`meal-fab meal-${meal}`} style={{
					backgroundColor: mealColors[meal],
					borderRadius: '50%',
					padding: '10px',
					color: 'white',
					position: 'absolute',
					top: '10px',
					right: '10px',
				}}>
					{meal}
				</div>
			);
		}
		return null;
	};

	return (
		<Fragment>
			{isSelected && (
				<InspectorControls>
					<PanelBody title="Meal Plan Settings">
						<ToggleControl
							label="Part of Meal Plan"
							checked={part_of_meal_plan}
							onChange={() => setAttributes({ part_of_meal_plan: !part_of_meal_plan })}
						/>
						{part_of_meal_plan && (
							<SelectControl
								label="Meal"
								value={meal}
								options={mealOptions}
								onChange={(newMeal) => setAttributes({ meal: newMeal })}
							/>
						)}
					</PanelBody>
				</InspectorControls>
			)}

			{/* Original Heading Block Content */}
			<wp.blockEditor.BlockEdit {...props} />

			{/* Conditionally render the FAB */}
			{renderFAB()}
		</Fragment>
	);
}
