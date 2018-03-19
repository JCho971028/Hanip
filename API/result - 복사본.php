<?php
	function recieveMessage($delivery) {
		$url = "https://api.bluehouselab.com/smscenter/v1.0/result/".$delivery;
        $APPID = "HanIp";
        $APIKEY = "***************";

		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_USERPWD, "$APPID:$APIKEY");
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$result = curl_exec($ch);
		$result_header = curl_getinfo($ch);
		
		curl_close($ch);

		return $result_header;
	}

	if ($argc != 2) {
		error_log("Usage:\n  ".$argv[0]." delivery-id");
		exit(1);
	}

	$delivery_id = $argv[1];
	
	$response = recieveMessage($delivery_id);

	echo $response["http_code"]."\n";
?>
