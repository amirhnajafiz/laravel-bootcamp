<?php

interface Bank {
	public function pay(int $amount);
}

class Pasargard implements Bank
{
	private int $amount;
    public function pay(int $amount) {
        $this->amount += $amount;
    }
}

class Mellat implements Bank
{
	private int $amount;
    public function pay(int $amount) {
        $this->amount += $amount;
    }
}

class Pay 
{
    private $total;

    public function __construct() {
        $this->total = 0;
    }

    public function payment(int $amount, Bank $bank) {
        $bank->pay($amount);
		$this->total++;
    }

    public function getTotal() {

        return $this->total;
    }
}

$pasargard = new Pasargard(1000, 100000);
$mellat = new Mellat(10000, 150000);

$pay = new Pay();

$pay->payment(1000, $pasargard);
$pay->payment(2000, $pasargard);
$pay->payment(3000, $pasargard);

$pay->payment(5000, $mellat);

echo $pay->countOfPayment($pasargard) . PHP_EOL; // 3
echo $pay->totalPayment(); // 11000