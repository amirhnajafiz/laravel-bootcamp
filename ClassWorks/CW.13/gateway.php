<?php

interface gatewayInterface 
{
    public function payment($amount, Bank $bank);
}

abstract class Bank
{
    protected int $amount;

    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function pay($amount)
    {
        $this->amount += $amount;
    }

    public abstract function info();
}

class Pasargad extends Bank
{
    public function info()
    {
        echo "This is Pasargad bank.";
    }
}

class Mellat extends Bank
{
    public function info()
    {
        echo "This is Mellat bank.";
    }
}

class Pay implements gatewayInterface
{
    private int $total;
    private $transactions;

    public function __construct()
    {
        $this->total = 0;
        $this->transactions = [];
    }

    public function payment($amount, Bank $bank)
    {
        $bank->pay($amount);
        $this->total += $amount;
        $this->transactions[] = ['bank' => get_class($bank), 'amount' => $amount];
    }

    public function countOfPayment(Bank $bank)
    {
        $amount = 0;
        foreach($this->transactions as $trs)
        {
            if ($trs['bank'] == get_class($bank))
                $amount++;
        }
        return $amount;
    }

    public function totalPayment()
    {
        return $this->total;
    }
}

$pasargad = new Pasargad();
$mellat = new Mellat();

$pay = new Pay();
$pay->payment(1000, $pasargad);
$pay->payment(2000, $pasargad);
$pay->payment(3000, $pasargad);

$pay->payment(5000, $mellat);

echo $pay->countOfPayment($pasargad); // 3
echo $pay->totalPayment(); // 11000