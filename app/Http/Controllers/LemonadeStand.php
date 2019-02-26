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

        session([
                    'money'         => $money,
                    'customers'     => $customers,
                    'weather'       => $weather,
                    'day'           => $day,
                    'mix'           => $mix,
                    'mixPrice'      => $pricePerMix,
                    'cups'          => $cups,
                    'cupPrice'      => $pricePerCup,
                    'lemonadePrice' => $lemonadePrice,
                ]);

        return $this->intro();
    }

    public function intro()
    {
        $message
            = "<h2>Welcome to lemonade stand!</h2>
               <p>Your goal is to make as much money as possible in 21 days by selling cups lemonade.</p>
               <a href='/buy'><button class='btn btn-primary'>Start</button></a>";

        return $message;
    }

    public function setup()
    {
        // Purchasing vars
        $money         = session()->get('money');
        $mix           = session('mix');
        $cups          = session('cups');
        $potentialMix  = \request()->get('requestedMix');
        $potentialCups = \request()->get('requestedCups');
        $mixPrice      = $this->pricePerMix;
        $cupPrice      = $this->pricePerCup;
        $canAffordMix  = false;
        $canAffordCups = false;
        $message       = "";

        // Price set vars

        // Price per lemonade logic

        // Purchasing logic
        if ($this->buyCounter == 1)
        {
            $this->buyCounter = 0;

            if ($potentialMix * $mixPrice <= $money)
            {
                $canAffordMix = true;
            }

            if ($potentialCups * $cupPrice < $money)
            {
                $canAffordCups = true;
            }

            if ($canAffordMix && $canAffordCups)
            {
                $mix   += $potentialMix;
                $cups  += $potentialCups;
                $money -= $potentialMix * $mixPrice;
                $money -= $potentialMix * $mixPrice;

                session([
                            'mix'   => $mix,
                            'cups'  => $cups,
                            'money' => $money,
                        ]);
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

        return redirect('/continue')->with($message);
    }

    public function result()
    {
        return view('result');
    }

    public function nextDay()
    {
        $this->generatePrices();

        $this->buyCounter = 1;
    }

    public function generatePrices()
    {
        $this->pricePerMix = 2 * (rand(25, 75) / 100);
        $this->pricePerCup = rand(25, 75) / 100;
    }
}
