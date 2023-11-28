<?php

namespace Bank;

interface Handler
{
    public function setNext(Handler $handler): Handler;

    public function handle(string $request): ?string;
}

abstract class AbstractHandler implements Handler
{
    /**
     * @var Handler
     */
    private $nextHandler;

    public function setNext(Handler $handler): Handler
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(string $request): ?string
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }
        return null;
    }
}

class MainAccountHandler extends AbstractHandler
{
    private $money = 1000;

    public function handle(string $request): ?string
    {
        if ($request <= $this->money) {
            $this->money -= $request;
            return "You pay from main account " . $request .  "<br>";
        } else {
            return parent::handle($request);
        }
    }
}

class CreditHandler extends AbstractHandler
{
    private $money = 10000;

    public function handle(string $request): ?string
    {
        if ($request <= $this->money) {
            $this->money -= $request;
            return "You pay from CREDIT account  " . $request .  "<br>";
        } else {
            return parent::handle($request);
        }
    }
}


function client(Handler $handler)
{
    foreach ([500, 20, 1200, 2000000] as $m) {
        echo "Client: pay " . $m . "\n";
        $result = $handler->handle($m);
        if ($result) {
            echo "  " . $result;
        } else {
            echo "Not enough money for make transaction. Transaction is rejected " . $m . " !\n";
        }
    }
}

$mainAccount = new MainAccountHandler();
$creditAccount = new CreditHandler();

$mainAccount->setNext($creditAccount);

client($mainAccount);
