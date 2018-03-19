<?php
	function sendMessage($Content, $Sender, $Receiver) {
		$data = array(
                    "sender" => $Sender,
                    "receivers" => $Receiver,
					"content" => $Content
				);

		$url = "https://api.bluehouselab.com/smscenter/v1.0/sendsms";
        $APPID = "HanIp";
        $APIKEY = "**************";

		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_USERPWD, "$APPID:$APIKEY");
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json; charset=utf-8"));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		
        $result = curl_exec($ch);
        		
        curl_close($ch);
	}
	
	$Content = $_POST["Content"];
	$Sender = $_POST["Sender"];
	$Receiver = $_POST["Receiver"];

	sendMessage($Content, $Sender, $Receiver);

	$response = array();
    $response["success"] = true;

	echo json_encode($response);
?>
