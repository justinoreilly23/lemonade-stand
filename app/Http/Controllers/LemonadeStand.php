<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LemonadeStand extends Controller {

    public $money;
    public $customers;
    public $weather;
    public $day;
    public $mix;
    public $cups;
    public $pricePerMix;
    public $pricePerCup;
    public $buyCounter;
    public $lemonadePrice;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        else
        {
            session_unset();
        }

        $this->money         = 10;
        $this->customers     = 0;
        $this->weather       = null;
        $this->day           = 1;
        $this->mix           = 0;
        $this->cups          = 0;
        $this->pricePerMix   = 0;
        $this->pricePerCup   = 0;
        $this->buyCounter    = 1;
        $this->lemonadePrice = 0;

        $this->generatePrices();
        $money         = $this->money;
        $customers     = $this->customers;
        $weather       = $this->weather;
        $day           = $this->day;
        $mix           = $this->mix;
        $cups          = $this->cups;
        $pricePerMix   = $this->pricePerMix;
        $pricePerCup   = $this->pricePerCup;
        $buyCounter    = $this->buyCounter;
        $lemonadePrice = $this->lemonadePrice;

        $this->updateSession();

        return $this->intro();
    }

    public function intro()
    {
        $message
            = "<h2>Welcome to lemonade stand!</h2>
               <p>Your goal is to make as much money as possible in one week by selling cups lemonade.</p>
               <a href='/buy'><button class='btn btn-primary'>Start</button></a>";

        return $message;
    }

    public function setup()
    {

        // Purchasing vars
        $money         = session('money');
        $mix           = session('mix');
        $cups          = session('cups');
        $potentialMix  = \request()->get('requestedMix');
        $potentialCups = \request()->get('requestedCups');
        $mixPrice      = $this->pricePerMix;
        $cupPrice      = $this->pricePerCup;
        $canAfford     = false;
        $message       = "";

        // Price set vars
        $lemonadePrice       = \request()->get('lemonadePrice');
        $lemonadePrice       /= 100;
        $this->lemonadePrice = $lemonadePrice;

        // Purchasing logic
        if ($this->buyCounter == 1)
        {
            $this->buyCounter = 0;

            if ($potentialMix * $mixPrice < $money && $potentialCups * $cupPrice < $money)
            {
                $canAfford = true;
            }

            if ($canAfford == true)
            {
                $this->mix   += $potentialMix;
                $this->cups  += $potentialCups;
                $this->money -= $potentialMix * $mixPrice;
                $this->money -= $potentialCups * $cupPrice;
            }
            else
            {
                $message = "Insufficient funds";
            }

        }
        elseif ($this->buyCounter == 0)
        {
            $message = "<h3 class='bg-warning'>You have already purchased supplies.</h3>";
        }

        session(['money' => $this->money, 'mix' => $this->mix, 'cups' => $this->mix, 'lemonadePrice' => $this->lemonadePrice]);

        return redirect('/continue')->with($message);
    }

    public function sales()
    {
        $price             = session('lemonadePrice');
        $money             = session('money');
        $baseTemp          = 40;
        $weather           = $baseTemp + rand(1, 60);
        $chances           = 0;
        $customers         = session('customers');
        $possibleCustomers = null;

        switch (true)
        {
            case $price < .25 :
                $chances += rand(25, 75);
            break;
            case $price < .50 :
                $chances += rand(0, 50);
            break;
            case $price < .75 :
                $chances += rand(0, 15);
            break;
            case $price < 1 :
                $chances -= 10;
            break;
        }

        switch (true)
        {
            case $weather < 75 :
                $chances           += 0;
                $possibleCustomers += rand(1, 5);
            break;
            case $weather < 100 :
                $chances           += rand(15, 40);
                $possibleCustomers += rand(4, 12);
            break;
        }

        $customers = range(1, $possibleCustomers);

        // Add to money
        foreach ($customers as $customer)
        {
            $money += $customer * $price;
        }

        $this->customers = $customers;
        $this->money     = $money;


        session(['money' => $this->money, 'customers' => $this->customers]);

        return redirect('/results');
    }

    public function nextDay()
    {
        while ($this->day < 7)
        {
            $this->generatePrices();
            $this->buyCounter = 1;
            $this->day ++;

            session(['buyCounter' => $this->buyCounter, 'day' => $this->day, 'money' => $this->money]);
        }

        return redirect('/buy');
    }

    public function updateSession()
    {
        session([
                    'money'         => $this->money,
                    'customers'     => $this->customers,
                    'weather'       => $this->weather,
                    'day'           => $this->day,
                    'mix'           => $this->mix,
                    'cups'          => $this->cups,
                    'mixPrice'      => $this->pricePerMix,
                    'cupPrice'      => $this->pricePerCup,
                    'buyCounter'    => $this->buyCounter,
                    'lemonadePrice' => $this->lemonadePrice,
                ]);
    }

    public function generatePrices()
    {
        $this->pricePerMix = 2 * (rand(25, 100) / 100);
        $this->pricePerCup = rand(2, 15) / 100;
    }
}
