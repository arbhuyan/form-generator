<?php
// include form generator script
require 'form-generator-updated.php';

// new form fields
$new_form_field = [
	[
		'name' 	=> 'username',
		'type' 	=> 'text',
		'label' => 'User Name'
	],

	[
		'name' 	=> 'password',
		'type' 	=> 'password',
		'label' => 'Password'
	],
	
	[
		'name' 	=> 'gender',
		'type' 	=> 'radio',
		'label' => 'Gender',
		'value' => ['Male', 'Female']
	],

	[
		'name' 	=> 'country',
		'type' 	=> 'select',
		'label' => 'Select Country',
		'value' => ['Bangladesh', 'United States', 'United Kingdom']
	],

	[
		'name' 	=> 'game',
		'type' 	=> 'checkbox',
		'label' => 'Your favourite sport',
		'value' => ['Cricket', 'Football', 'kabadi']
	],

	[
		'name' 	=> 'phone',
		'type' 	=> 'number',
		'label' => 'Mobile Number'
	],

	[
		'name' 	=> 'message',
		'type' 	=> 'textarea',
		'label' => 'Your Message'
	]
];

// create the form
echo create_form($new_form_field); ?>

<!-- stylesheet -->
<style type="text/css">
	.arb-form {
		width: 500px;
		margin: 0 auto;
		background: #ddd;
		overflow: hidden;
	}

	.form-title {
		display: block;
		padding: 10px 18px;
		font-weight: bold;
		text-transform: capitalize;
		margin-bottom: 10px;
		background: #bcbcbc;
	}

	.form-group {
		margin: 10px 0;
		padding: 10px;
	}

	.form-group label {
		display: inline-block;
		padding: 5px 7px;
		min-width: 120px;
		text-transform: capitalize;
	}

	.type-text, .type-textarea, .type-select {
		display: inline-block;
		padding: 5px 7px;
		border: 1px solid #bcbcbc;
	}

	.type-radio, .type-checkbox {
		display: inline-block;
	}

	#type-submit {
		display: block;
		border: 1px solid #333;
		padding: 7px 25px;
		background: #444;
		margin: 16px;
		color: #eee;
	}
</style>