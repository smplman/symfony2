<?php

namespace CBSi\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CBSi\ProductBundle\Model\Product;
use Guzzle\Http\Client;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBSiProductBundle:Default:index.html.twig', array('name' => $name));
    }

    public function showProductsAction(){

    	$products = $this->getProducts();

    	return $this->render('CBSiProductBundle:Default:productListing.html.twig', array('products' => $products));
    }

    public function showSingleAction($id){

    	$products = $this->getProducts($id);
    	if(is_null($products)){
    		throw $this->createNotFoundException('The product ID ' . $id .'does not exist'); 
    	}   

    	return $this->render('CBSiProductBundle:Default:productListing.html.twig', array('products' => $products));
    }

    private function getProducts($id=null){
		$hostName = 'http://ec2-184-169-221-118.us-west-1.compute.amazonaws.com/';
		// Create a client and provide a base URL
		$client = new Client($hostName);
		// Create a request with basic Auth
		$endPoint = !is_null($id) ? ('/products/'. $id .'.json') : ('products.json');
		$request = $client->get($endPoint);
		// Send the request and get the response
		try{
			$response = $request->send();
		}catch(Exception $e){
			return null;
		}

		$jsonProducts =  json_decode($response->getBody(), true);
		
		if($id){
			$jsonProducts = array($jsonProducts);
		}
		$products = array();

		foreach ($jsonProducts as $product) {
			array_push($products, new Product($product['id'], $product['name'], $product['description'], $product['price']));
		}    

		return $products;	
    }
}
