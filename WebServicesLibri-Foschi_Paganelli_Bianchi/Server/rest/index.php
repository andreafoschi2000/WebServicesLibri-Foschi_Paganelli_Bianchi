<?php
// process client request (via URL)
	header ("Content-Type_application/json");
	include ("function.php");
	//if(!empty($_GET['index'])){
	
			//$index=$_GET['index'];
			$index = 1;
			//$price=get_price($name);
			switch($index)
			{
				case 0:
				$id = get_fumetti();
				//echo $ids;
				$count = get_libro($id);
				deliver_response(200,"Request Successfully", $count);
				//echo $count;
				break;
				
				case 1:
				$sconti = get_sconti();
				var_dump($sconti);
				break;
				
				case 2:
				break;
				
				case 3:
				break;
			}
			
			/*
			if(empty($price))
		//book not found
			deliver_response(200,"book not found", NULL);
			else
			//respond book price
			deliver_response(200,"book found", $price); */
	//	}
	/*
	else
	{
		//throw invalid request
		deliver_response(400,"Invalid request", NULL);
	}
	*/
	
	function deliver_response($status, $status_message, $data)
	{
		header("HTTP/1.1 $status $status_message");
		
		$response ['status']=$status;
		$response['status_message']=$status_message;
		$response['data']=$data;
		
		$json_response=json_encode($response);
		echo $json_response;
	}

?>