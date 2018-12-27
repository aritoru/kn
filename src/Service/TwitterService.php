<?php
namespace App\Service;

use App\Helper\TwitterOAuth;

class TwitterService
{

    protected $twitterConsumerApiKey;
    protected $twitterConsumerApiSecret;
    protected $twitterConsumerAccessToken;
    protected $twitterConsumerAccessSecret;

    public function __construct($twitterConsumerApiKey,$twitterConsumerApiSecret,$twitterConsumerAccessToken,$twitterConsumerAccessSecret) {
        $this->twitterConsumerApiKey = $twitterConsumerApiKey;
        $this->twitterConsumerApiSecret = $twitterConsumerApiSecret;
        $this->twitterConsumerAccessToken = $twitterConsumerAccessToken;
        $this->twitterConsumerAccessSecret = $twitterConsumerAccessSecret;
    }

    public function run($url, $count = 20, $include_rts = '', $exclude_replies = '') {
        switch($url)
        {
            case 'timeline':
                $rest = 'statuses/user_timeline' ;
                $params = Array('count' => $count, 'include_rts' => $include_rts, 'exclude_replies' => $exclude_replies, 'screen_name' => $_GET['screen_name'], 'tweet_mode' => 'extended');
                break;
            case 'search':
                $rest = "search/tweets";
                $params = Array('q' => $_GET['q'], 'count' => $count, 'include_rts' => $include_rts, 'tweet_mode' => 'extended');
                break;
            case 'list':
                $rest = "lists/statuses";
                $params = Array('list_id' => $_GET['list_id'], 'count' => $count, 'include_rts' => $include_rts, 'tweet_mode' => 'extended');
                break;
            default:
                $rest = 'statuses/user_timeline' ;
                $params = Array('count' => '20');
                break;
        }

        $auth = new TwitterOAuth($this->twitterConsumerApiKey,$this->twitterConsumerApiSecret,$this->twitterConsumerAccessToken,$this->twitterConsumerAccessSecret);
        $get = $auth->get( $rest, $params );

        if( ! $get ) {
            return 'An error occurs while reading the feed, please check your connection or settings';
        }

        if( isset( $get->errors ) ) {
            $return = "";
            foreach( $get->errors as $key => $val )  $return .= $val;
            return $return;
        } else {
            return $get;
        }
    }
}