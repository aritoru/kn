<?php

namespace App\Command;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Facebook\Facebook;

class FbAnnouncesCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:announces:fb')

            // the short description shown while running "php bin/console list"
            ->setDescription('Gets Announces from FB')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fb = new Facebook([
            'app_id' => '1392156667673566',
            'app_secret' => '80161a323e5b9ce98af2debcd0bb3112',
            'default_graph_version' => 'v2.10',
        ]);

        $token = "EAATyKLulZB94BACZAQvHzR43rsK3YGxSMlXyQ3GI2jk6bZAg0oyq8ZBcZC85tQpZAJZBNV1He5rhLJmvtfGhBcxuCQaFT4sZAe7We8naiVAGbHkZBLdxo9OcXaZCHJHes7BndAZAAmDxL2dB5d23qopkOST1tqPClzH3TV8c4qj0f4npMJvioBa1v9DCQz4FpiBlAeaU0165fidpI6QslgBwZA2JF0KdSVEnnHotv98gwbkKGAZDZD";

        var_dump($token);

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get(
                '/page-id/feed',
                $token
            );
        } catch(FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $graphNode = $response->getGraphNode();

    }
}