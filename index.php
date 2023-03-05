<?php 
//We initialize the Facebook API 
$fb = new Facebook\Facebook([
  'app_id' => '{tu-APP-ID}',
  'app_secret' => '{tu-APP-SECRET}',
  'default_graph_version' => 'v2.8',
]);

// We obtain the access token to publish in the Facebook account 
$accessToken = "your-access-token";

// Establecemos la información a compartir en el post 
$data = [
  'message' => 'This is a test post',
  'link' => 'http://www.site.com',
  'picture' => 'http://www.site.com/image.jpg',
  'name' => 'Title',
  'description' => 'Description',
];

try {
  // We publish the post on the Facebook account 
  $response = $fb->post('/me/feed', $data, $accessToken);

} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Post published successfully! ID: ' . $graphNode['id'];

?>
