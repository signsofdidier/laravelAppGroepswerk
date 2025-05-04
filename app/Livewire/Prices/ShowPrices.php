<?php

namespace App\Livewire\Prices;

use App\Models\Plan;
use Livewire\Component;

class ShowPrices extends Component
{
    public $plans;

    public function mount()
    {
        $this->plans = Plan::all();
    }

    public function render()
    {
        return view('livewire.prices.show-prices ');
    }
}
