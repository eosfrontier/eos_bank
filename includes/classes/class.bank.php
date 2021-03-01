<?php

class bank{
	
	public $token = "am9zaHNwbGF5Z3JvdW5k";
	public $apilocation = "//api.eosfrontier.space/orthanc/";

	/**
	 * api_bank_request
	 *
	 * @param  mixed $headers
	 * @return void
	 */
	public function api_bank_request($headers) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->apilocation . "v2/bank/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => $headers,
		));

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
	}
	
	/**
	 * api_character_request
	 *
	 * @param  mixed $headers
	 * @return void
	 */
	public function api_character_request($headers) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->apilocation . "v2/character/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => $headers,
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		return $response;
	}

    public function login($post){
	    if(strlen($post) < 6){
		    
		    return "false";
	    }
	    
		$headers = array(
			"token: $this->token",
			"card_id: $post"
		);

		$res = $this->api_character_request($headers);
        
        if($res === null){
            return "false";
        }

		if($res === "None found."){
            return "false";
        }

        return json_decode($res);
    }
    
    /**
     * getSonurenById
     *
     * @param  mixed $id
     * @return void
     */
    public function getSonurenById($id){
        $headers = array(
			"amount: 1",
			"token: $this->token",
			"id: $id"
		);

		$amount = $this->api_bank_request($headers);

		if ($amount === '"None found."') {
			$amount = 0;
		}

		return $amount;
    }

    public function getMutationsById($id){
        $headers = array(
			"token: $this->token",
			"id: $id"
		);

		return json_decode($this->api_bank_request($headers));
    }

    public function getNameById($id){
        $headers = array(
			"token: $this->token",
			"char_id: $id"
		);

		$user = json_decode( $this->api_character_request( $headers ) );

        return $user->character_name;
    }

    public function getRecepients(){
        $headers = array(
			"recepients: 1",
			"token: $this->token",
		);

		return json_decode($this->api_bank_request($headers));
    }

    public function transfer($post){


        $amount         = $post["amount"];
        $from           = $post["from"];
        $recepient      = $post["recepient"];
        $description    = $post["description"];

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $this->apilocation . "v2/bank/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_HTTPHEADER => array(
			"amount: $amount",
			"from: $from",
			"recepient: $recepient",
			"description: $description",
			"token: $this->token",
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
    }

}

?>
