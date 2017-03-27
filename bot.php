//$proxy = 'http://fixie:Hr2JXteynC46Il0@velodrome.usefixie.com:80';
//$proxyauth = 'http://fixie:Hr2JXteynC46Il0@velodrome.usefixie.com:80';
<?php
$access_token = 'SD1b0qRCgjATTTQlAr4kN5MJyozdhVYSYH0BhoDlkDHtH1bEJLRlApJcPIfUXfUyaa+x3wTi+o0kIzEtY5ZV7pSuKpgCg0ZbSfAXNCt984ej9B/eKo18qDKbVRvLUxav43nupUce4FM6b2Eta1L9rwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'pele' && $event['pele']['type'] == 'Hi there!') {
			// Get text sent
			$text = $event['pele']['Hi there'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			
			{
  "type": "ເມນູ",
  "altText": "ລາຍການ",
  "template": {
      "type": "buttons",
      "thumbnailImageUrl": "http://i68.tinypic.com/358ui5g.png",
      "title": "ລາຍການທີ 1",
      "text": "ກະລຸນາເລືອກລາຍການ",
      "actions": [
          {
            "type": "postback",
            "label": "ຖ້ຽວບິນພາຍໃນ",
            "data": "action=buy&itemid=123"
          },
          {
            "type": "postback",
            "label": "ຖ້ຽວບິນຕ່າງປະເທດ",
            "data": "action=add&itemid=123"
          },
          {
            "type": "uri",
            "label": "View detail",
            "uri": "http://example.com/page/123"
          }
      ]
  }
}

			curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
