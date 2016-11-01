<?php 

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';

use Facebook\Facebook;
use Gregwar\Image\Image;

$komplex_events = [];
$headerimage_text = '';
$num_events = 1;

$fb = new Facebook([
  'app_id' => APP_ID,
  'app_secret' => APP_SECRET,
  'default_graph_version' => 'v2.8',
]);

$fb->setDefaultAccessToken(APP_ID.'|'.APP_SECRET);

try {
  $response = $fb->get('/'.PAGE_ID.'/events?fields=name,start_time&since='.time());
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$events = $response->getGraphEdge();

foreach($events as $event) {
  $komplex_events[$event->getField('start_time')->format('U')] = [
  	'name' => $event->getField('name'),
  	'datum' => $event->getField('start_time')->format('d.m.Y'),
  	'uhrzeit' => $event->getField('start_time')->format('H:i'),
  ];
}

ksort($komplex_events);

while ($num_events <= MAX_EVENTS) {
  $e = current($komplex_events);
  $headerimage_text .= $e['datum']. /* ' - '.$e['uhrzeit']. */ ' - '.$e['name']."\n";
  next($komplex_events);
  $num_events++;
}

$headerimage = Image::open('vorlage.png');
/* write($font, $text, $x, $y, $size, $angle, $color, $position) */
$headerimage->write(FONT, $headerimage_text, 130, 45, '15', 0, '#ffffff', 'left');
$headerimage->save('komplex_headerimage.png', 'png');
