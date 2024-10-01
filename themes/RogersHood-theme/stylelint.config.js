// stylelint.config.js
const config = {
	extends: ['@10up/stylelint-config'],
	rules: {
		/* add or modify rules here */
		'at-rule-empty-line-before': ['always'],
		'rule-empty-line-before': [
			'always',
			{
				except: ['first-nested'],
			},
		],
	},
};

module.exports = config;
