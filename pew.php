

<?php
$api_key = "AIzaSyCoaP_I7c5EL_1BzOmRjxB8utxFoI63tgY";
$bot = "853440390:AAGlZlrkeo7Ejn02wnJYV06q4MoxbEXcIgk";
$Telegram = "https://api.telegram.org/bot".$bot;
$update = file_get_contents("php://input");
$update = json_decode($update, TRUE);
$id = $update['message']['from']['id'];
$nome = $update['message']['from']['first_name'];
$testo = $update['message']['text'];
$last = substr($testo, -1);
$agg = json_encode($update,JSON_PRETTY_PRINT);
$spada = json_decode('"\u2694"');
$sub = json_decode('"\u1451"');

$pew = "UC-lHJZR3Gqxm24_Vd_AJ5Yw";
$api_response = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$pew.'&fields=items/statistics/subscriberCount&key='.$api_key);
$api_response_decoded = json_decode($api_response, true);
$pewdiepie = $api_response_decoded['items'][0]['statistics']['subscriberCount'];
$p = number_format($pewdiepie, 0, ',', ' ');

$tgay = "UCq-Fj5jknLsUf-MWSy4_brA";
$api_response2 = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$tgay.'&fields=items/statistics/subscriberCount&key='.$api_key);
$api_response_decoded2 = json_decode($api_response2, true);
$tseries = $api_response_decoded2['items'][0]['statistics']['subscriberCount'];
$t = number_format($tseries, 0, ',', ' ');
$gab = $tseries - $pewdiepie ;
$g = number_format($gab, 0, ',', ' ');
$TastieraBase = '["/gap"]';




if($testo == "/start"){send($id,"write /gap to see te live sub gap",$TastieraBase);}

if($testo == "/gap"){
if($pewdipie > $tseries){

send($id,"$spada PewDiePie VS T-series  $spada \n 👑 PewDiePie:   $p 👥\n  T-series:  $t 👥\n Sub gab: $g 👥",$TastieraBase);
}else{send($id,"$spada PewDiePie VS T-series  $spada \n  PewDiePie:   $p 👥\n  👑 T-series:  $t 👥\n     Sub gap: $g 👥",$TastieraBase);}}


function send($id, $t,$tastiera){

if(isset($tastiera)){
$t1 = '&reply_markup={"keyboard":['.$tastiera.'],"resize_keyboard":true}';

}
    $Url= $GLOBALS[Telegram]."/sendMessage?chat_id=$id&parse_mode=HTML&text=".urlencode($t).$t1;
    file_get_contents($Url);
}
?>