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

 function get_category($ids)
 {
	 $url = file_get_contents('http://localhost/Server/libricateg.json');
	 $books = json_decode($url, true);
	 
	 foreach($ids as $index)
	 {
		 $tipo = get_categoria($index);
	 }
	 
 }
 function get_categoria($index)
 {
	 $url = file_get_contents('http://localhost/Server/libricateg.json');
	 $books = json_decode($url, true);
	 foreach($books as $book)
	 {
		 if($book["tipo"] == "Ultimi
	 }
 }
 function get_fumetti()
 {	
	$url = file_get_contents('http://localhost/Server/reparti.json');
	$categs = json_decode($url, true);
	foreach($categs as $categ=>$category)
	{
		if($categ['tipo'] == 'fumetto')
			$array = $categ["ID"];
	}
	return $array;
 }
?>