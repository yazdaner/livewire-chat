<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Index extends Component
{
    public function increment($productId)
    {
        \Cart::update($productId,[
            'quantity' => 1,
        ]);
    }
    public function decrement($productId)
    {
        \Cart::update($productId,[
            'quantity' => -1,
        ]);
    }
    public function clearCart()
    {
        \Cart::clear();
        $this->emitTo('cart.header','refresh');

    }
    public function remove($productId)
    {
        \Cart::remove($productId);
        $this->emitTo('cart.header','refresh');

    }
    public function render()
    {
        return view('livewire.cart.index')->extends('layouts.app')->section('content');
    }
}
