<?php


trait TraitDynamic {
	protected $method = array();
	protected $maxIndex = 255;
	public function addMethod($name, $func, $index=10){
		if(!isset($this->method[$name]))$this->method[$name] = array();
		if(isset($this->method[$name][$index])){
			$_index = $index;
			for($i=$_index;$i<$this->maxIndex + $_index;$i++){
				if(!isset($this->method[$name][$index])){
					$this->method[$name][$index] = $func;
				}
			}
			return false;
		}else{
			$this->method[$name][$index] = $func;
		}
	}
	public function removeMethod($name, $index){
		unset($this->method[$name][$index]);
	}
	protected function _execMethod($name, $arguments = array()){
		if(!isset($this->method[$name]))return false;
		
		$class = get_class();
		$funcs = $this->method[$name];
		foreach($funcs as $func){
			call_user_func_array($func->bindTo($this, $class), $arguments);
		}
	}
	public function __call($name, $arguments) {
		$this->_execMethod($name, $arguments);
	}
	public function __set($name, $func) {
		if($name === 'F'){
			if(!is_array($func) || count($func) === 1){
				call_user_func($func);
			}else{
				call_user_func_array($func[0], $func[1]);
			}
		}else{
			$this->addMethod($name, $func);
		}
	}
}

