<?php

class bank{
    public function login($post){
	    if(strlen($post) < 6){
		    
		    return "false";
	    }
	    
        $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE ICC_number = ?");
		$res = $stmt->execute(array($post));
		$res = $stmt->fetch();

        if($res == null){
            $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE card_id = ?");
            $res = $stmt->execute(array($post));
    		$res = $stmt->fetch();
        }
		
		
        if($res == null){
            $sHex = dechex($post);
            $aDec = str_split($sHex, 2);
            if(!isset($aDec[1])){
	            return "false";
            }
            $sDec = "%".$aDec[3].$aDec[2].$aDec[1].$aDec[0]."%";
			if($sDec == "%0%"){
				return "false";
			}
			
            $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE card_id LIKE ?");
            $res = $stmt->execute(array($sDec));
    		$res = $stmt->fetch();
        }
        

        if($res == null){
            return "false";
        }

        return $res;
    }

    public function getSonurenById($id){
        $stmt = db::$conn->prepare("SELECT * FROM ecc_characters WHERE characterID = ?");
		$res = $stmt->execute(array($id));
		$res = $stmt->fetch();

        $sonuren = intval($res["sonuren_offset"]);

        $stmt = db::$conn->prepare("SELECT * FROM bank_logging WHERE character_id = ?");
		$res = $stmt->execute(array($id));
		$aEntries = $stmt->fetchAll();

        foreach($aEntries as $aEntry){
            $sonuren = $sonuren + intval($aEntry["amount"]);

        }
        return $sonuren;
    }

    public function getMutationsById($id){
        $stmt = db::$conn->prepare("SELECT * FROM bank_logging WHERE character_id = ?");
		$res = $stmt->execute(array($id));
		$aEntries = $stmt->fetchAll();

        return $aEntries;
    }

    public function getNameById($id){
        $stmt = db::$conn->prepare("SELECT character_name FROM ecc_characters WHERE characterID = ?");
		$res = $stmt->execute(array($id));
		$name = $stmt->fetch();

        return $name;
    }

    public function getRecepients(){
        $stmt = db::$conn->prepare("SELECT character_name, bank, characterID, company FROM ecc_characters WHERE bank = 1 ORDER BY character_name");
		$res = $stmt->execute();
		$res = $stmt->fetchAll();

        return $res;
    }

    public function transfer($post){
        $amount         = $post["amount"];
        $negamount      = "-".$post["amount"];
        $from           = $post["from"];
        $to             = $post["recepient"];
        $description    = $post["description"];

        $sql = "INSERT INTO bank_logging (character_id, id_to, amount, description) values (?, ?, ?, ?)";
        $stmt = db::$conn->prepare($sql);
        $result = $stmt->execute([$from, $to, $negamount, $description]);

        $sql = "INSERT INTO bank_logging (character_id, id_to, amount, description) values (?, ?, ?, ?)";
        $stmt = db::$conn->prepare($sql);
        $result = $stmt->execute([$to, $from, $amount, $description]);

        return str_replace(PHP_EOL, '', "success");
    }

}

?>
