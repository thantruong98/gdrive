<?php
$id = $_GET['id'];
$location = '';
$url = 'https://drive.google.com/uc?export=download&id='.$id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
if (preg_match('~Location: (.*)~i', $result, $match)) {
  $location = trim($match[1]);
}
if($location!=''){
header('Location: '.$location);
}else{
echo '0';
}