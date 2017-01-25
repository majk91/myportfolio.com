<?php 
	function required($data){
		return true;
	}
	function email($data){
		return true;
	}
	function password($data){
		return true;
	}
	function login($data){
		return true;
	}
	function phone($data){
		return true;
	}
	function descript($data){
		return true;
	}
	function validateForm($dataWithRules, $data){
		$errorForms = [];
		$fields = array_keys($dataWithRules);

		foreach($fields as $fieldName) {
			$fieldData = $data[$fieldName];
			$rules = $dataWithRules[$fieldName];
			foreach($rules as $ruleName){
				if(!$ruleName($fieldData)){
					$errorForms[$fieldName][] = $ruleName;
				}
			}
		}

		return $errorForms;
	}
?>