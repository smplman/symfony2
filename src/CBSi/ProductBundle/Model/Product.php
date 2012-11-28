<?php

namespace CBSi\ProductBundle\Model;

class Product{

	private $id,$name,$description,$price;

	public function __construct($id = null, $name = null, $description = null, $price = null){
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

	public function getId(){
		if($this->id){
			return $this->id;
		}
		else{
			return null;
		}
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		if($this->name){
			return $this->name;
		}
		else{
			return null;
		}
	}

	public function setName($name){
		$this->name = $name;
	}	

	public function getDescription(){
		if($this->description){
			return $this->description;
		}
		else{
			return null;
		}
	}

	public function setDescription($description){
		$this->description = $description;
	}	

	public function getPrice(){
		if($this->price){
			return $this->price;
		}
		else{
			return null;
		}
	}	

	public function setPrice($price){
		$this->price = $price;
	}
}