<?php

namespace CBSi\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CBSi\ProductBundle\Model\Product;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CBSiProductBundle:Default:index.html.twig', array('name' => $name));
    }

    public function showProductsAction(){

    	$product1 = new Product(1, 'Product 1', 'This is the first product', 2.00);
    	$product2 = new Product(2, 'Product 2', 'This is the second product', 6.60);
    	$product3 = new Product(3, 'Product 3', 'This is the third product', 1.50);
    	$product4 = new Product(4, 'Product 4', 'This is the fourth product', 8.20);
    	$product5 = new Product(5, 'Product 5', 'This is the fifth product', 4.01);

    	$products = array($product1,$product2,$product3,$product4,$product5);

    	return $this->render('CBSiProductBundle:Default:productListing.html.twig', array('products' => $products));
    }

    public function showSingleAction($id){

    	$product1 = new Product(1, 'Product 1', 'This is the first product', 2.00);
    	$product2 = new Product(2, 'Product 2', 'This is the second product', 6.60);
    	$product3 = new Product(3, 'Product 3', 'This is the third product', 1.50);
    	$product4 = new Product(4, 'Product 4', 'This is the fourth product', 8.20);
    	$product5 = new Product(5, 'Product 5', 'This is the fifth product', 4.01);

    	$products = array($product1,$product2,$product3,$product4,$product5);
    	
    	$hasProduct = false;

    	foreach ($products as $product){
    		if($product->getId()==intval($id)){
    			$hasProduct = true;
    		}
    	}

    	if($hasProduct){
    		$products = array($products[$id-1]);
    	}else{
    		throw $this->createNotFoundException('The product ID ' . $id .'does not exist');
    	}

    	return $this->render('CBSiProductBundle:Default:productListing.html.twig', array('products' => $products));
    }
}
