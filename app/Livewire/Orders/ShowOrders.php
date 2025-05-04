<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowOrders extends Component
{

    public $orders; public function mount() {
        // Alleen bestellingen van de ingelogde gebruiker
        $this->orders = Order::where('user_id', Auth::id())->latest()->get();
    }
    public function render()
    {
        return view('livewire.orders.show-orders');
    }
}
