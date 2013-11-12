<?php
session_start();
require_once('twitteroauth-master/twitteroauth/twitteroauth.php'); //Path to twitteroauth library
$twitteruser = "sharifmamun";
$search = "#Bangladesh";
$notweets = 50;
$consumerkey = "5yWvCE0fbjJHsb5RL7nGg";
$consumersecret = "mlqKMyDJJssMw7o1dy9MUynXuN00fjXax4KX0B5f05Q";
$accesstoken = "227707236-8JKTA31ZJAvENkGdnwDJRR9fodd7WRBLiFW0AZjK";
$accesstokensecret = "M7FgK0rjNDIl3jEnpPdPTJoKMTomwKnhw9HpUbt5kKeNv";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

header("content-type:application/json");

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$search = str_replace("#", "%23", $search);
$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=".$search."&count=".$notweets);

//$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);


