<?php

namespace CBSi\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CBSi\ProductBundle\Model\Product;
use CBSi\ProductBundle\ApiClient;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBSiProductBundle:Default:index.html.twig', array('name' => $name));
    }

    public function showProductsAction(){


    	$apiClient = $this->container->get('Product.ApiClient');
    	$products = $apiClient->getAction('products.json');
    	$objProducts = array();

		foreach ($products as $product) {
			array_push($objProducts, new Product($product['id'], $product['name'], $product['description'], $product['price']));
		}        	

    	return $this->render('CBSiProductBundle:Default:productListing.html.twig', array('products' => $objProducts));
    }

    public function showSingleAction($id){

    	$apiClient = $this->container->get('Product.ApiClient');
    	$products = $apiClient->getAction('products/' . $id .'.json');

    	if(is_null($products)){
    		throw $this->createNotFoundException('The product ID ' . $id .' does not exist'); 
    	}  
    	
    	$product = new Product($products['id'], $products['name'], $products['description'], $products['price']);
    	$products = array($product); 

    	return $this->render('CBSiProductBundle:Default:productListing.html.twig', array('products' => $products));
    }

}
