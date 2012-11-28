<?php

namespace CBSi\ProductBundle;
use Guzzle\Http\Client;
use CBSi\ProductBundle\Model\Product;

class ApiClient
{
	public function getAction($path){

		$hostName = 'http://ec2-184-169-221-118.us-west-1.compute.amazonaws.com/';
		// Create a client and provide a base URL
		$client = new Client($hostName);
		// Create a request with basic Auth
		$request = $client->get($path);
		// Send the request and get the response
		try{
			$response = $request->send();
		}catch(\Exception $e){
			return null;
		}

		$jsonProducts =  json_decode($response->getBody(), true); 

		return $jsonProducts;	
    }
}
