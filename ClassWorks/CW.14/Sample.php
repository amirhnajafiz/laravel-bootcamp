<?php

interface DiscountInterface 
{
    function calcDiscount(Clothes $clothes);
}

interface ClothesInterface 
{
    function getBasePrice();
    function getPrice();
    function toString();
    function getType();
}

class YaldaDiscount implements DiscountInterface
{
	public function calcDiscount(Clothes $clothes)
	{
		if ($clothes->getType() == 'Pants')
		{
			return (int) $clothes->getBasePrice() * 0.8;
		} 
		if ($clothes->getType() == 'Shirts')
		{
			return (int) $clothes->getBasePrice();
		}
	}
}

class EydeDiscount implements DiscountInterface
{
	public function calcDiscount(Clothes $clothes)
	{
		return (int) $clothes->getBasePrice() * 0.7;
	}
}

abstract class Clothes implements ClothesInterface 
{
    protected string $name;
    protected ?int $basePrice = 0;
    protected $discount;
	
	public function getBasePrice()
	{
		return $this->basePrice;
	}
	
	public function getPrice()
	{
		if ($this->discount == NULL)
			return $this->getBasePrice();
		else {
			return $this->discount->calcDiscount($this);
		}
	}
	
	public function getType()
	{
		return get_class($this);
	}
	
	public function toString()
	{
		if ($this->discount == NULL)
		{
			return "price of " . $this->name . " is " . $this->getPrice() . " in " . $this->getType() . " category.";
		} else {
			return "the base price of " . $this->name . " is " . $this->getBasePrice() . " and now with discount is " . $this->getPrice() . " in " . $this->getType() . " category.";
		}
	}
}

class Shirts extends Clothes
{
	public function __construct($name, $price, $discount = NULL)
	{
		$this->name = $name;
		$this->basePrice = $price;
		$this->discount = $discount;
	}
}

class Pants extends Clothes
{
	public function __construct($name, $price, $discount = NULL)
	{
		$this->name = $name;
		$this->basePrice = $price;
		$this->discount = $discount;
	}
}

/*

    you should difine 4 more classes.
    Pants class, Shirts class, YaldaDiscount class, EydeDiscount class.
    YaldaDiscount and EydeDiscount classes should implemnt DiscountInterface.
    Pants and Shirts classes should extend Clothes.
    in yalda discount pants get 20% discount and shirts get none.
    in Eyde discount both get 30% discount.
    if the discount property was null the base price will be returned.

*/


// making some instances of discount classes
$yalda = new YaldaDiscount();
$eyde = new EydeDiscount();


$jeen = new Pants("jeen", 200, $yalda);
$katan = new Pants("katan", 250);

$t_shirts = new Shirts("t_shirts", 100, $eyde);
$rekabi = new Shirts("rekabi", 80);



echo $jeen->toString() . PHP_EOL; // the base price of jeen is 200 and now with discount is 160 in pants category.
echo $katan->toString() . PHP_EOL; // price of katan is 250 in pants category.
echo $t_shirts->toString() . PHP_EOL; // the base price of t_shirts is 100 and now with discount is 70 in shirts category.
echo $rekabi->toString() . PHP_EOL; // price of rekabi is 80 in shirts category.