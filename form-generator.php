<?php
/**
*	Registration Form Class
*	Create and validate user registration form
*
*	Author: MD. Anisur Rahman Bhuyan
*	Date: 26/09/2017
*	URI: http://anisbd.com
*/
class Form_Genarator {
	// supported field type
	public $form_title;
	public $form_method;
	public $form_action;
	public $form_id;
	public $form_class;

	// form default value
	public function __construct() {
		if( ! $this->form_title ) 	$this->form_title 	= "My Form Title";
		if( ! $this->form_method ) 	$this->form_method 	= "post";
		if( ! $this->form_action ) 	$this->form_action 	= "";
		if( ! $this->form_id ) 		$this->form_id 		= "arb-form";
		if( ! $this->form_class ) 	$this->form_class 	= "arb-form";
	}

	// default field types
	public function supported_field_type() {
		// collection of field type
		$field_type = [
			'text',
			'number',
			'email',
			'hidden',
			'password',
			'select',
			'textarea',
			'radio',
			'checbox',
			'file'
		];

		// return field type
		return $field_type;
	}

	// add form field
	public function add_field($fieldname, $fieldtype, $fieldlabel = NULL, $fieldvalue = NULL, $fieldplaceholder = NULL) {
		// switch by fieldtype
		switch ($fieldtype) {
			case 'text':
			case 'email':
			case 'password':
			case 'hidden':
			case 'number':
				$field = "\n\t\t\t<input class='type-text' type='$fieldtype' id='$fieldname' name='$fieldname' placeholder='$fieldplaceholder' value='$fieldvalue'>";
				break;

			case 'textarea':
				$field = "\n\t\t\t<textarea class='type-textarea' id='$fieldname' name='$fieldname' cols='30' rows='3' placeholder='$fieldplaceholder'>$fieldvalue</textarea>";
				break;

			case 'radio':
				if(is_array($fieldvalue)):
					$field = '';
					foreach ($fieldvalue as $value) {
						$field .= "\n\t\t\t<div class='type-radio'>\n\t\t\t\t<input type='$fieldtype' id='$fieldname' name='$fieldname' value='$value'> $value\n\t\t\t</div>";
					}
				endif;
				break;

			case 'checkbox':
				if(is_array($fieldvalue)):
					$field = '';
					foreach ($fieldvalue as $value) {
						$field .= "\n\t\t\t<div class=\"type-checkbox\">\n\t\t\t\t<input type='$fieldtype' id='$fieldname' name='{$fieldname}[]' value='$value'> $value\n\t\t\t</div>";
					}
				endif;
				break;

			case 'select':
				if(is_array($fieldvalue)):
					$field = "\n\t\t\t<select class='type-select' id='$fieldname' name='$fieldname'>\n";
						foreach ($fieldvalue as $value) {
							$field .= "\t\t\t\t<option value='$value'>$value</option>\n";
						}
					$field .= "\t\t\t</select>";
				endif;
				break;

			default:
				$field = "<div class=\"info\">Invalid field type <strong>$fieldtype</strong></div>";
				break;
		}

		//return $field.PHP_EOL;

		$field_group = "\t<div class=\"form-group\">\n\t\t\t<label for=\"$fieldname\">$fieldname</label>\t\t\t{$field}\n\t\t</div>\n\n";

		// return fields
		return $field_group;
	}

	// form generator
	public function generate_form($form_fields) {
		if( is_array($form_fields) ):
			// form
			$form = "<form method=\"$this->form_method\" action=\"$this->form_action\" id=\"$this->form_id\" class=\"$this->form_id\">\n\n";

				$form .= "\t<div class=\"form\">\n\n";
				$form .= "\t\t<div class=\"form-title\">$this->form_title</div>\n\n";

					foreach ($form_fields as $field) {
						// make an object
						$field = (object) $field;

						if(!isset($field->name)) continue;

						$fieldname 			= (isset($field->name))			? $field->name 			: FALSE;
						$fieldlabel 		= (isset($field->label))		? $field->label 		: $fieldname;
						$fieldtype 			= (isset($field->type))			? $field->type 			: 'text';
						$field_placeholder 	= (isset($field->placeholder))	? $field->placeholder 	: FALSE;
						$fieldvalue 		= (isset($field->value))		? $field->value 		: FALSE;

						// add new fields
						$form.= "\t".$this->add_field($fieldname, $fieldtype, $fieldlabel, $fieldvalue, $field_placeholder);
					}

					$form .= "\t\t<input id='type-submit' type='submit' name='submit' value='Submit'>\n";

				$form .= "\n\t</div>\n\n";

			$form.= "</form>";

		else:

			$form = "<div class=\"warning\">Sorry, You must have to pass an array for fields.</div>";

		endif;

		// return form
		return $form;
	}

	// initialize form
	public function init() {
		
	}

}

// use this function to make your form
function create_form($form_fields = []) {
	// create form instance
	$make_form = new Form_Genarator;

	// generate form
	return $make_form->generate_form($form_fields);
}