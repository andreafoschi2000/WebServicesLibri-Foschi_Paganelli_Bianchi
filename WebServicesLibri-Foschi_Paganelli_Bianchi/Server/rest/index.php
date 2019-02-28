<?php
// process client request (via URL)
	header ("Content-Type_application/json");
	include ("function.php");
	//if(!empty($_GET['index'])){
	
			$index=$_GET['index'];
			//$index = 3;
			//$price=get_price($name);
			switch($index)
			{
				case 0:
				$id = get_fumetti();
				//echo $ids;
				$count = get_libro($id);
				echo $count;
				break;
				
				case 1:
				$sconti = get_sconti();
				//var_dump($sconti);
				$libri = aggiungi_id($sconti);

				$libri_sort = ordina($libri);
				/*
				foreach($libri_sort as $libro)
				{
					echo($libro["sconto"]."<br>");
				}
				*/
				$output = stampa_libri($libri_sort);
				echo $output;
				break;
				
				case 2:
				$start=$_GET['start_data'];
				$end=$_GET['end_data'];
				
				
				//$start = "15/03/2008";
				//$end = "14/07/2009";
				$output = control_data($start, $end);
				foreach($output as $name)
				{
					echo $name."\n";
				}
				break;
				
				case 3:
				//$indice = 6;
				$indice=$_GET['codice'];
				$codici = get_books_copies($indice);
				$libri = ottieni_libri($codici);
				$username = get_username($indice);
				echo $username."\n";
				foreach($libri as $libro)
				{
					echo $libro["titolo"]."\tCopie: ".$libro["ncopie"]."\n";
				}
				break;
			//}
			
			/*
			if(empty($price))
		//book not found
			deliver_response(200,"book not found", NULL);
			else
			//respond book price
			deliver_response(200,"book found", $price); */
		}
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