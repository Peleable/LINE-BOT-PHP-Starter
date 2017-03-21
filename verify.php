<?php
$access_token = 'SD1b0qRCgjATTTQlAr4kN5MJyozdhVYSYH0BhoDlkDHtH1bEJLRlApJcPIfUXfUyaa+x3wTi+o0kIzEtY5ZV7pSuKpgCg0ZbSfAXNCt984ej9B/eKo18qDKbVRvLUxav43nupUce4FM6b2Eta1L9rwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
