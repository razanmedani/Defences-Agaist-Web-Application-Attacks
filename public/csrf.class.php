<?php

class csrf {
	//This function retrieves the token ID from a user's session, and if one has not already been created generates a random token
	
	public function get_token_id() {
	if(isset($_SESSION['token_id'])) { 
		return $_SESSION['token_id'];
	} else {
		$token_id = $this->random(10);
		$_SESSION['token_id'] = $token_id;
		return $token_id;
	}
    }



  //This function retrieves the token value, or if one has not been generated, generates a token value.
  
   public function get_token() {
	if(isset($_SESSION['token_value'])) {
		return $_SESSION['token_value']; 
	} else {
		$token = hash('sha256', $this->random(500));
		$_SESSION['token_value'] = $token;
		return $token;
	}

    }

    //This function determines whether the token ID and the token value are both valid. This is done by checking the values of the GET 
	//or POST request against the values stored in the user's SESSION variable.
	
	public function check_valid($method) {
	if($method == 'post' || $method == 'get') {
		$post = $_POST;
		$get = $_GET;
		if(isset(${$method}[$this->get_token_id()]) && (${$method}[$this->get_token_id()] == $this->get_token())) {
			return true;
		} else {
			return false;	
		}
	} else {
		return false;	
	}
}

    // This function generates random names for the form fields.
	
	public function form_names($names, $regenerate) {
	
	$values = array();
	foreach ($names as $n) {
		if($regenerate == true) {
			unset($_SESSION[$n]);
		}
		$s = isset($_SESSION[$n]) ? $_SESSION[$n] : $this->random(10);
		$_SESSION[$n] = $s;
		$values[$n] = $s;	
	}
	return $values;
}
 
 //This function generates a random string using the Linux random file to create more entropy.
    private function random($len) {
        if (function_exists('openssl_random_pseudo_bytes')) {
                $byteLen = intval(($len / 2) + 1);
                $return = substr(bin2hex(openssl_random_pseudo_bytes($byteLen)), 0, $len);
        } 

	return $return;
}



}