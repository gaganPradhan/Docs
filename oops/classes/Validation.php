<?php 

class Validation {

	private $_passed = false,
			$_errors = [],
			$_db = null;


	public function __construct() 
	{
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = [])
	{
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				
				$value = $source[$item];

				//$imageName = $value['name'];
				$item = escape($item);
				// echo '<pre>';
				// var_dump($value);

				

				if( $rule === 'required' && (empty($value)) ) {
					$this->addError("{$item} is required");
					
				} elseif(!empty($value)) {
					switch ($rule) {
						case 'min':
							if(strlen($value) < $rule_value) {
								$this->addError(" {$item} must be a minimum of {$rule_value} characters ");
							}
						break;

						case 'max':
							if(strlen($value) > $rule_value) {
								$this->addError(" {$item} must be a maximum of {$rule_value} characters ");
							}
						break;

						case 'matches':
							if($value != $source[$rule_value]) {
								$this->addError(" {$rule_value} must match {$item} ");
							}
							
						break;

						case 'unique':
							$user = new User(); 
							if(!$user->isLoggedIn()){
								$check = $this->_db->get($rule_value, [$item, '=', $value]);
								
							} else {
								$id    = $user->data()->id;
								$check = $this->_db->query(" SELECT * FROM users WHERE `$item` = '$value' AND `id` != '$id' ");
							}
							if($check->count()) {
									$this->addError(" {$item} already exists ");
								}
						break;

						case 'nameType':
							if(!preg_match($rule_value, $value)) {
								$this->addError(" Only alphabets and whitespaces allowed for {$item}  ");
							}
						break;

						case 'tmpName':
							if(!strcmp($value['tmp_name'], $rule_value)) {
								$this->addError("{$item} is required");
							}							
						break;						

						case 'imageType':
							
							if(!in_array($value['type'], $rule_value)) {
								$this->addError(" Image must be jpg or png or jpeg type");
							}
						break;

						case 'imageSize':
						if($value['size'] > $rule_value) {
								$this->addError("Image size must be less than 1 MB");
							}
						break;
						
						default:
							
							break;
					}
				}
			}
		}

		if(empty($this->_errors)) {
			$this->_passed = true;
		}

		return $this;
	}

	
	private function addError($error) 
	{
		$this->_errors[] = $error;
	} 

	public function errors() 
	{
		return $this->_errors;
	}

	public function passed()
	{
		return $this->_passed;
	}

}

?>