<?php 



//$doc = new DOMDocument();
//$city_urls="http://open.lashou.com/opendeals/lashou/city.xml?union_pid=863589556&union_sign=56;4819";
//$db = $doc->load($city_urls); 
//if ($db){ 
//	$dictArray = $doc->getElementsByTagName("url");
//	foreach ($dictArray as $dict) {
//		$city = $dict->getElementsByTagName("city_name");
//		$cityv = $city->item(0)->nodeValue;   
//        $city_deals_url= $dict->getElementsByTagName("city_deals_url");
//		$urlv = $city_deals_url->item(0)->nodeValue;  
//		$doc2 = new DOMDocument();
//		$db2 = $doc2->load($urlv); 
//		if($db2){
//		    $dictArray = $doc2->getElementsByTagName("data");
//			foreach ($dictArray as $dict) {
//			    $city = $dict->getElementsByTagName("city");
//			     $cityv = $city->item(0)->nodeValue;
//			     $title = $dict->getElementsByTagName("title");
//			     $titlev = $title->item(0)->nodeValue;    
//			     var_dump($titlev);
//			}			
//		}
//
//	}
//}

$doc = new DOMDocument();
$XML_URL="http://open.lashou.com/opendeals/lashou/2259.xml?union_pid=863589556&union_sign=56;4819"; 
  
 $db = $doc->load($XML_URL); 
if ($db){ 


$dictArray = $doc->getElementsByTagName("data");
foreach ($dictArray as $dict) {
    $city = $dict->getElementsByTagName("city");
     $cityv = $city->item(0)->nodeValue;
     
     $title = $dict->getElementsByTagName("title");
     $titlev = $title->item(0)->nodeValue;    
     
    
    var_dump($titlev);
}


} 
 
?>