# Simple form generator

Simple form generator using php oop.

# How to use it

1. At first you need to add form-generator.php to your project file like:

<?php require 'form-generator.php'; ?>

2. Then make an array with your field information, sample array given below:

$new_form_field = [
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

3. After making your array call create_form(); function and pass newly created array as argument to generate your form fields. like:

create_form($new_form_field);

# Thank You