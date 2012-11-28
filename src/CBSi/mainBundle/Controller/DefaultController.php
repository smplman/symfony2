<?php

namespace CBSi\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
	public function indexAction(){
		//return new Response('<html><body>Hello world!</body></html>');
		$vals = array('name'=>'Stephen', 'vals'=>array(1=>'test1',2=>'test2',3=>'test3',4=>'test4'));
		return $this->render('MainBundle::index.html.twig', $vals);	
	}
}
