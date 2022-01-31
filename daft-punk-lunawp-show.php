<?php

/**
 * Obteniendo datos
 */

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.spotify.com/v1/artists/4tZwfgrHOc3mvqYlEYSvVi/albums',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer BQDEygsqLGmqPWrHPDs10V9o1kvODQDFn6-ok1QY6MwopNszHxyQ5p10vZNEeQqFxq8C0bKRZzAIeGJOh6TSSlNXB4RowZ7E-dkacNWxPdmf1oGdYh9IpVJASGha6lfqu7p3IGbC82vGTu2y0ZIidll8uSUE6pe7zU4'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$data = json_decode( $response, true );

if( !isset( $data['items'] ) || !is_array( $data['items'] ) )
  return;
/**
 * Mostrando Datos
 */
echo "<h3>Albumes Daft Punk</h3><br>";
  foreach($data as $valor){
    for($i=0; $i<count($data['items']); $i++){
        echo "<strong>".$data['items'][$i]['name']."</strong>, Fecha de Publicación: ".date( "d/m/Y", strtotime( $data['items'][$i]['release_date'] ) )."<br>";
    }
  }  
    