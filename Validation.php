


<?php


/**
 * Validation class
 */
class Validation
{
	
	public $values = array();
	public $errors = array();
	public $currentValue;

	function __construct()
	{
		
	}



	  public function post($key){
		$this->values[$key] = trim($_POST[$key]);
		$this->currentValue = $key;
		return $this;
	}


	public function isEmpty(){
		if(empty($this->values[$this->currentValue])){
			$this->errors[$this->currentValue]["empty"] = "Field must not be Empty";
		}
		return $this;
	}




	public function length($min,$max){
		if(strlen($this->values[$this->currentValue]) < $min || strlen($this->values[$this->currentValue]) > $max){
			$this->errors[$this->currentValue]["length"] = " Min Value ".$min." Max Value ".$max;
		}
		return $this;
	}

	public function character()
		{
			if(!preg_match('%^[A-Za-z]+$%', $this->values[$this->currentValue])){
				$this->errors[$this->currentValue]['character'] = " Input must be Characters";
			}
			return $this;	
		}




		public function submit(){
			if(!isset($this->errors[$this->currentValue])){
				return true;
			}
			else{
				return false;
			}
		}







}

?>






