<?php
/**
*	Registration Form Class
*	Create and validate user registration form
*
*	Author: MD. Anisur Rahman Bhuyan
*	Date: 26/09/2017
*	URI: http://anisbd.com
*/
class RegisterForm
{
	// Default form fields
	public $form_fields = [
		[
			'name' 	=> 'username',
			'type' 	=> 'text',
			'label' => 'User Name'
		],

		[
			'name' 	=> 'password',
			'type' 	=> 'password',
			'label' => 'Password'
		]
	];

	// add form field
	public function add_field($fieldname, $fieldtype, $fieldplaceholder = NULL, $fieldvalue = NULL) {
		// switch by fieldtype
		switch ($fieldtype) {
			case 'textarea':
				$field = "<textarea id='type-textarea' name='$fieldname' cols='30' rows='3' placeholder='$fieldplaceholder'>$fieldvalue</textarea>";
				break;

			case 'radio':
				if(is_array($fieldvalue)):
					$field = '';
					foreach ($fieldvalue as $value) {
						$field .= "<input id='type-checkbox' type='$fieldtype' name='$fieldname' value='$value'> $value";
					}
				endif;
				break;

			case 'checkbox':
				if(is_array($fieldvalue)):
					$field = '';
					foreach ($fieldvalue as $value) {
						$field .= "<input id='type-checkbox' type='$fieldtype' name='{$fieldname}[]' value='$value'> $value";
					}
				endif;
				break;

			case 'select':
				if(is_array($fieldvalue)):
					$field = "<select id='type-select' name='$fieldname'>";
						foreach ($fieldvalue as $value) {
							$field .= "<option value='$value'>$value</option>";
						}
					$field .= "</select>";
				endif;
				break;

			default:
				$field = "<input id='type-text' type='$fieldtype' name='$fieldname' placeholder='$fieldplaceholder' value='$fieldvalue'>";
				break;
		}

		return $field.PHP_EOL;
	}

	// Create register form
	protected function generate_form(array $fields) {
		?>
		<form action="" id="form_generator">
			<?php
			foreach ($fields as $field):
				$field = (object) $field;

				if(!isset($field->name)) continue;

				$fieldname 			= (isset($field->name))			? $field->name 			: FALSE;
				$fieldlabel 		= (isset($field->label))		? $field->label 		: $fieldname;
				$fieldtype 			= (isset($field->type))			? $field->type 			: 'text';
				$field_placeholder 	= (isset($field->placeholder))	? $field->placeholder 	: FALSE;
				$fieldvalue 		= (isset($field->value))		? $field->value 		: FALSE;
				?>
				
				<div style="display: block; margin-bottom: 10px;">
					<label style="display: inline-block; padding: 5px 7px; min-width: 120px;" for="<?php echo $fieldname; ?>">
						<?php echo $fieldlabel; ?>
					</label>
					<?php echo $this->add_field($fieldname, $fieldtype, $field_placeholder, $fieldvalue); ?>
				</div> <!-- group-input -->
			<?php endforeach; ?>
		</form>
		<?php
	}

	// Initialize register form
	public function form_generator(array $field_data = []) {
		// Merge all fields
		$form_fields = array_merge($this->form_fields, $field_data);

		// generate form
		$this->generate_form($form_fields);
	}
}

// use this function to make your form
function create_form($form_fields = []) {
	// generate form
	$make_form = new RegisterForm;
	$make_form->form_generator($form_fields);
}