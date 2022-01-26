<?php

/**
 * Obteniendo datos
 */

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.spotify.com/v1/artists/4tZwfgrHOc3mvqYlEYSvVi/albums?limit=50",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
"Authorization: Bearer BQB34Yh_dn_TY6vgUW-aL1yDFt1anuw3i0JYM9Qei90SZLx5xkObpHtbgr8XFixD05vwxCtHNZxK3Jtm2bP2KM1aDuunh0xCthBc-qbbwO3rwRFr7Ss-RiRRxUfmx9GSrjvHjPiR8p9DnFT3x_yBrx2nLdWgwjb_mF4"
  ),
 ));

$response = curl_exec($curl);
$data = json_decode($response, true); 

/**
 * Mostrando Datos
 */
echo "<h3>Albumes Daft Punk</h3><br>";
  foreach($data as $valor){
    for($i=0; $i<count($data['items']); $i++){
        echo "<strong>".$data['items'][$i]['name']."</strong>, Fecha de Publicación: ".$data['items'][$i]['release_date']."<br>";}
   exit;
    }
            
    