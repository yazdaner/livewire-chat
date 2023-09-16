<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function addToCart(Product $product)
    {
        if(\Cart::get($product->id) == null){
            \Cart::add([
                'id' => $product->id,
                'name' => $product->title,
                'price' => $product->price,
                'quantity' => 1,
                'associatedModel' => $product
            ]);
            $this->emitTo('cart.header','refresh');
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'success',
                'title' => 'The Product Added!',
                'timer' => 3000,
                'showConfirmButton' => false
            ]);
        }else{
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'error',
                'title' => 'This product has exists at your cart'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.product.index',[
            'products' => Product::all()
        ])->extends('layouts.app')->section('content');
    }
}
