<?php
 function get_price($find){
	/* $books=array(
	 "java"=>299,
	 "c"=>348,
	 "php"=>267
	 );*/
	$str = file_get_contents('http://localhost/json/book.json');
	$books = json_decode($str, true); 
	// echo '<pre>' . print_r($books, true) . '</pre>';
	/* foreach($books as $book=>$price)
	 {
		 if($book==$find)
		 {
			 return $price;
			 break;
		 }
	 }*/
	 
	 foreach($books['book'] as $book)
	 {
		 if($book['name']==$find)
		 {
			 return $book['price'];
			 break;
		 }
	 }
 }
 function get_libro($index)
 {
	 $url = file_get_contents('http://localhost/json/libri.json');
	 $libri = json_decode($url, true);
	 $count = 0;
	 foreach($libri as $k=>$v)
	 {
		 foreach($v as $key=>$value)
		 {
			 if($value["reparto"] == $index)
			 {
				 //echo $value["ID"];
				 $status = get_categoria($value["ID"]);
				 if($status)
					 $count++;
			 }
		 }
	 }
	 return $count;
 }
 
 function get_categoria($valore)
 {
	 $url = file_get_contents('http://localhost/json/libricateg.json');
	 $libricateg = json_decode($url, true);

	 foreach($libricateg as $k=>$v)
	 {
		 foreach($v as $key=>$value)
		 {
			 //echo $value["libro"];
			 if($value["libro"] == $valore)
			 {
				 if($value["categoria"] == "Ultimi arrivi")
					 return true;
				 else return false;
			 }
		 }
	 }
}
 
 function get_fumetti()
 {	
	$url = file_get_contents('http://localhost/json/reparti.json');
	$categs = json_decode($url, true);
	$array = array();
	
	foreach($categs as $k=>$v)
	{
		foreach ($v as $key=>$value)
		{
			//echo $value["tipo"];
			if($value["tipo"] == "fumetto")
			{
				//$array = $categ["ID"];
				//echo $value["ID"];
				return $value["ID"];
			}
		}
	}
 }
 
 function get_sconti()
 {
	$url = file_get_contents('http://localhost/json/categorie.json');
	$categories = json_decode($url, true);
	$catg = array();
	$i = 0;
	
	foreach($categories as $k=>$v)
	{
		 foreach($v as $key=>$value)
		 {
			 if($value["sconto"] > 0)
			 {
				$catg[$i]["tipo"] = $value["tipo"];
				$catg[$i]["sconto"] = $value["sconto"];
				$i++;
			 }
		 }
	}
	return $catg;
 }
 
 function aggiungi_id($sconti)
 {
	 $url = file_get_contents('http://localhost/json/libricateg.json');
	 $libricateg = json_decode($url, true);
	 $indice = 0;
	 $libri = array();
	 foreach ($libricateg as $k=>$v)
	 {
		foreach($v as $key=>$value)
		{
			 foreach ($sconti as $sconto)
			 {
				if($value["categoria"] == $sconto["tipo"])
				{
					$libri[$indice]["id"] = $value["libro"];
					$libri[$indice]["sconto"] = $sconto["sconto"];
					$indice++;
				}
			 }
		}
	 }
	 
	 return $libri;
 }
 
 function ordina($libri)
 {
	 $toSort = array();
	 
	 foreach($libri as $key => $value)
	 {
		 $toSort[$key] = $value['sconto'];
	 }
	 
	 array_multisort($toSort, SORT_ASC, $libri);
	 
	 return $libri;
 }
 
 function stampa_libri($libriSort)
 {
	 $url = file_get_contents('http://localhost/json/libri.json');
	 $books = json_decode($url, true);
	 $output = "";
	foreach($libriSort as $key=>$value)
	{
		 foreach($books as $k=>$v)
		 {
			 foreach($v as $chiave=>$valore)
			 
				 if($value["id"] == $valore["ID"])
				 {
					$output.= $valore["titolo"]. " " . $value["sconto"]. "% ";
				 }
		 }
	}
	return $output;
 }
 
 
 function check_in_range($start_date, $end_date, $given_date)
{
	$str = strtotime($start_date);
	$end = strtotime($end_date);
	$curr = strtotime($given_date);
	echo $str."<br>".$end."<br>".$curr."<br>";
    return (($curr >= $str) && ($curr <= $end));
}


 function control_data($start, $end)
 {
	$url = file_get_contents('http://localhost/json/libri.json');
	$books = json_decode($url, true);
	
    $start = str_replace('/', '-', $start);
    $end = str_replace('/', '-', $end);
	echo $start."<br>";
	echo $end."<br>";
	$names = array();
	$index = 0;
	
	foreach($books as $key=>$value)
	{
		foreach($value as $k=>$v)
		{
			$given_date = str_replace('/', '-', $v["dataarch"]);
			if(check_in_range($start, $end, $given_date))
			{
				$names[$index] = $v["titolo"];
			}
		}
	}
	return $names;
 }
?>