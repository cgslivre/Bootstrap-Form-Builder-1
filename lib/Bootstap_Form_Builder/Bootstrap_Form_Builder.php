<?php
/**
 * Boostrap Form Builder
 *
 * @author H2LSOFT
 * @website https://github.com/h2lsoft/Bootstrap-Form-Builder
 * @license MIT
 * @version 1.0
 */
class BoostrapForm
{
	protected $stack = array();

	private $formName;
	private $formType;
	private $formAction;
	private $formMethod;
	private $formOnSubmit;
	private $formHasFiles = false;

	public function __construct($name, $type='form-horizontal', $action='', $onsubmit='', $method='post')
	{
		$this->formName = $name;
		$this->formType = $type;
		$this->formAction = $action;
		$this->formMethod = $method;
		$this->formOnSubmit = $onsubmit;
	}

	public function fieldsetStart($id, $legend)
	{
		if(empty($id))$id = 'fielset_'.count($this->stack);
		$this->stack[] = array('type' => 'fieldset_start', 'id' => $id, 'legend' => $legend);
	}

	public function fieldsetEnd()
	{
		$this->stack[] = array('type' => 'fieldset_end');
	}

	public function text($name, $label='', $required=false, $input_size='col-sm-8 col-md-8 col-xs-12', $glyphicon='')
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'text', 'name' => $name, 'label' => $label, 'required' => $required, 'size' => $input_size, 'icon' => $glyphicon);

		$this->attr('placeholder', $label);

		return $this;
	}

	public function file($name, $label='', $required=false, $input_size='col-sm-8 col-md-8 col-xs-12')
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'file', 'name' => $name, 'label' => $label, 'required' => $required, 'size' => $input_size);
		return $this;
	}

	public function password($name, $label='', $required=false)
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'password', 'name' => $name, 'label' => $label, 'required' => $required, 'icon' => 'lock', 'size' => 'col-xs-12 col-sm-4 col-md-4');

		$this->attr('placeholder', $label);

		return $this;
	}

	public function textarea($name, $label='', $required=false, $size='col-xs-12 col-sm-8 col-md-8')
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'textarea', 'name' => $name, 'label' => $label, 'required' => $required, 'size' => $size);

		$this->attr('placeholder', $label);
		$this->attr('rows', 5);

		return $this;
	}


	public function color($name, $label='', $required=false)
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'color', 'name' => $name, 'label' => $label, 'required' => $required, 'size' => "col-xs-3 col-sm-2 col-md-1");

		$this->attr('placeholder', $label);

		return $this;
	}


	public function email($name, $label='', $required=false)
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'email', 'name' => $name, 'label' => $label, 'required' => $required, 'icon' => 'envelope', 'size' => 'col-xs-12 col-sm-7 col-md-7');

		$this->attr('placeholder', $label);

		return $this;
	}

	public function tel($name, $label='', $required=false, $glyphicon='earphone')
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'tel', 'name' => $name, 'label' => $label, 'required' => $required, 'icon' => $glyphicon, 'size' => 'col-xs-12 col-sm-5 col-md-5');

		$this->attr('placeholder', $label);

		return $this;
	}

	public function submit($value, $class='')
	{
		$this->stack[] = array('type' => 'submit', 'name' => 'Submit', 'value' => $value, 'required' => false);

		if(empty($class))$class = 'btn-primary';
		$class = "btn $class";
		$this->attr('class', $class);

		return $this;
	}

	public function reset($value, $class='')
	{
		$this->stack[] = array('type' => 'reset', 'name' => 'Cancel', 'value' => $value, 'required' => false);

		$class = "btn $class";
		$this->attr('class', $class);

		return $this;
	}



	public function number($name, $label='', $required=false, $min='', $max='', $step='', $glyphicon='', $size='col-xs-6 col-sm-3 col-md-2')
	{
		if(empty($label))$label = $name;
		elseif(!$label)$label = '';
		$this->stack[] = array('type' => 'number', 'name' => $name, 'label' => $label, 'required' => $required, 'size' => $size);

		if(!empty($min))$this->attr('min', $min);
		if(!empty($max))$this->attr('max', $max);
		if(!empty($step))$this->attr('step', $step);

		$this->attr('placeholder', $label);

		return $this;
	}


	public function groupStart($id='', $required=false, $class='')
	{
		if(empty($id))$id = 'form-group-'.count($this->stack);

		$this->stack[] = array('type' => 'group_start', 'id' => $id, 'required' => $required, 'class' => $class);
		return $this;
	}

	public function groupEnd()
	{
		$this->stack[] = array('type' => 'group_end');
		return $this;
	}

	public function label($value, $for_id="")
	{
		$this->stack[] = array('type' => 'label', 'value' => $value, 'for' => $for_id);
		return $this;
	}

	public function wrapperStart($class='col-xs-9')
	{
		$this->stack[] = array('type' => 'wrapper_start', 'class' => $class);
		return $this;
	}

	public function wrapperEnd()
	{
		$this->stack[] = array('type' => 'wrapper_end');
		return $this;
	}


	public function attr($name, $value=false)
	{
		$this->stack[count($this->stack)-1]['attributes'][] = array('name' => $name, 'value' => $value);
		return $this;
	}

	public function attrs($attrs)
	{
		foreach($attrs as $attribute => $value)
			$this->attr($attribute, $value);

		return $this;
	}

	public function val($value)
	{
		$this->stack[count($this->stack)-1]['value'] = $value;
		return $this;
	}

	public function help($message)
	{
		$this->stack[count($this->stack)-1]['help'] = $message;
		return $this;
	}

	public function pattern($pattern, $message="")
	{
		$this->attr('pattern', $pattern);
		if(!empty($message))$this->attr('title', $message);
		return $this;
	}


	public function render()
	{
		// form
		$str = "<form";
		$str .= " name=\"{$this->formName}\"";
		$str .= " id=\"{$this->formName}\"";
		$str .= " action=\"{$this->formAction}\"";
		$str .= " class=\"{$this->formType}\"";
		$str .= " method=\"{$this->formMethod}\"";
		$str .= " role=\"form\"";

		if(!empty($this->formOnSubmit))$str .= " onsubmit=\"{$this->formOnSubmit}\"";
		if($this->formHasFiles)$str .= " enctype=\"multipart/form-data\"";

		$str .= ">\n\n";

		foreach($this->stack as $o)
		{
			$input = '';

			// fieldset_start
			if($o['type'] == 'fieldset_start')
			{
				$str .= "<!-- {$o['id']} -->\n";
				$str .= "<fieldset id=\"{$o['id']}\">\n";
				if(!empty($o['legend']))$str .= "\t\t<legend>{$o['legend']}</legend>\n\n";
			}
			// fieldset_end
			elseif($o['type'] == 'fieldset_end')
			{
				$str .= "</fieldset>\n";
				$str .= "<!-- /fieldset -->\n\n";
			}
			// form-group_start
			elseif($o['type'] == 'group_start')
			{
				$last_group_name = $o['id'];
				$required = ($o['required']) ? ' required' : '';
				$class = $o['class'];

				$str .= "<!-- {$o['id']} -->\n";
				$str .= "<div class=\"form-group $required\">\n";
			}
			// form-group_end
			elseif($o['type'] == 'group_end')
			{
				$str .= "</div>\n";
				$str .= "<!-- /{$last_group_name} -->\n\n";
			}
			// wrapper_start
			elseif($o['type'] == 'wrapper_start')
			{
				$class = $o['class'];
				$str .= "<div class=\"$class\">\n";
			}
			// wrapper_end
			elseif($o['type'] == 'wrapper_end')
			{
				$str .= "</div>\n";
			}
			// label
			elseif($o['type'] == 'label')
			{
				$for = (empty($o['for'])) ? '' : "for=\"{$o['for']}\"";
				$str .= "<label $for class=\"col-xs-4 hidden-xs\">{$o['value']}</label>\n";
			}

			// text, email, tel, number
			else
			{
				$o['id'] = $o['name'];

				$attributes = '';
				if(isset($o['attributes']))
				{
					foreach($o['attributes'] as $attr)
					{
						$attributes .= $attr['name'];
						if($attr['value'])$attributes .= "=\"{$attr['value']}\"";
						$attributes .= " ";
					}


					$attributes = trim($attributes);
				}

				$required = ($o['required']) ? ' required' : '';
				$value = (isset($o['value'])) ? $o['value'] : '';

				$help = '';
				if(isset($o['help']) && !empty($o['help']))
					$help = "<span class=\"col-xs-12 col-sm-offset-4 col-sm-12 col-md-12 help-block\">{$o['help']}</span>";


				if(in_array($o['type'], array('text', 'email', 'tel',  'number', 'password', 'color', 'textarea', 'file')))
				{
					$input .= "<!-- {$o['id']} -->\n";
					$input .= "<div class=\"form-group $required\">\n";
					$input .= "	<label class=\"control-label hidden-xs col-xs-4\" for=\"{$o['id']}\">{$o['label']}</label>\n";

					$input_class = 'col-xs-12';
					if(isset($o['size']) && !empty($o['size']))
						$input_class = $o['size'];


					$input .= "	<div class=\"$input_class\">\n";

					$has_icon = false;
					if(isset($o['icon']) && !empty($o['icon']))
					{
						$has_icon = true;
						$input .=  "	    <div class=\"input-group\">
                                            <span class=\"input-group-addon\"><i class=\"glyphicon glyphicon-{$o['icon']}\"></i></span>\n";
					}

					$class_added = '';
					if($o['type'] == 'number')
						$class_added = 'text-center';

					if($o['type'] == 'textarea')
					{
						$obj =  "	    <textarea name=\"{$o['name']}\" id=\"{$o['id']}\" class=\"form-control\" $required $attributes>{$value}</textarea>\n";
					}
					else
					{
						$obj =  "	    <input type=\"{$o['type']}\" name=\"{$o['name']}\" id=\"{$o['id']}\" class=\"form-control $class_added\" value=\"{$value}\" $required $attributes>\n";
					}


					$input .= "		$obj\n";

					if($has_icon)
					{
						$input .=  "	    </div>\n";
					}



					$input .= "	</div>\n";

					if(!empty($help))$input .= "		{$help}\n";


					$input .= "</div>\n";
					$input .= "<!-- /{$o['id']} -->\n\n";
				}
				elseif(in_array($o['type'], array('reset', 'submit', 'button')))
				{
					$value = (isset($o['value'])) ? $o['value'] : '';

					$attributes = '';
					if(isset($o['attributes']))
					{
						foreach($o['attributes'] as $attr)
						{
							$attributes .= $attr['name'];
							if($attr['value'])$attributes .= "=\"{$attr['value']}\"";
							$attributes .= " ";
						}

						$attributes = trim($attributes);
					}

					$input .=  "	    <input type=\"{$o['type']}\" id=\"{$o['id']}\" value=\"{$value}\" $attributes>\n";
				}


				$str .= $input;
			}


		}

		$str .= "</form>\n\n";

		return $str;

	}


}


