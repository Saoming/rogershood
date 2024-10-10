/**
 * Entry point for block filters.
 */

const {createHigherOrderComponent} = wp.compose;
const {InspectorControls} = wp.blockEditor;
const {PanelBody, ToggleControl, SelectControl} = wp.components;

// Check if you are in the block editor
if (wp) {

	const withMyPluginControls = createHigherOrderComponent((BlockEdit) => {
		return (props) => {

			if (props.name !== 'core/heading') {
				return   <BlockEdit key="edit" { ...props } />
			}

			const { attributes, setAttributes } = props;
			const { partOfMealPlan, meal } = attributes;

			const mealColors = {
				breakfast: '#D1DBFD',
				lunch: '#C5E7CE',
				dinner: '#ECE8E2',
				snack: '#E7CDA7',
			};

			// Define meal options
			const mealOptions = [
				{label: 'Breakfast', value: 'breakfast'},
				{label: 'Lunch', value: 'lunch'},
				{label: 'Dinner', value: 'dinner'},
				{label: 'Snack', value: 'snack'},
			];

			const renderFAB = () => {
				if (partOfMealPlan) {
					return (
						<div className={`meal-fab meal-${meal}`} style={{
							backgroundColor: mealColors[meal],
							borderRadius: '60px',
							color: 'white',
							display: 'inline-block',
							padding: '10px 20px 8px',
							textTransform: "uppercase",
						}}>
							{meal}
						</div>
					);
				}
				return null;
			};



			return (
				<>
					<div style={{display: "flex", alignItems: "center", gap: "15px"}}>
						{renderFAB()}
						<BlockEdit key="edit" {...props} />
					</div>
					<InspectorControls>
						<PanelBody title="Meal Plan Settings">
							<ToggleControl
								label="Part of Meal Plan"
								checked={partOfMealPlan}
								onChange={() => setAttributes({partOfMealPlan: !partOfMealPlan})}
							/>
							{partOfMealPlan && (
								<SelectControl
									label="Meal"
									value={meal}
									options={mealOptions}
									onChange={(newMeal) => setAttributes({meal: newMeal})}
								/>
							)}
						</PanelBody>
					</InspectorControls>
				</>
			);
		};
	}, 'withMyPluginControls');




	function addCustomAttributes( settings, name ) {

		if( name !== 'core/heading' ) {
			return settings;
		}

		if ( settings.attributes ) {

			settings.attributes.partOfMealPlan = {
				type: 'boolean',
				default: false
			};

			settings.attributes.meal = {
				type: 'string',
				default: 'breakfast'
			};
		}
		return settings;
	}



	wp.hooks.addFilter(
		'editor.BlockEdit',
		'my-plugin/with-inspector-controls',
		withMyPluginControls
	);


	wp.hooks.addFilter(
		'blocks.registerBlockType',
		'namespace/filterBlockAttributes',
		addCustomAttributes
	);

}

