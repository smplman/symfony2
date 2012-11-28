<?php

require "vendor/autoload.php";
use Guzzle\Http\Client;

//$hostName = 'http://bit.ly/V5Rbz4';
$hostName = 'http://ec2-184-169-221-118.us-west-1.compute.amazonaws.com/';


// Create a client and provide a base URL
$client = new Client($hostName);
// Create a request with basic Auth
$request = $client->get('products.json');
// Send the request and get the response
$response = $request->send();
echo $response->getBody();
// >>> {"type":"User", ...
echo $response->getHeader('Content-Length');
// >>> 792
