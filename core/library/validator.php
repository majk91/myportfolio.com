<?php 
	function required($data){
		return empty($data);
	}
	function email($data){
		return false;
	}
	function password($data){
		return false;
	}
	function login($data){
		return false;
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