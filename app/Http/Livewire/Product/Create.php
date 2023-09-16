<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title,$description,$price,$image;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|integer',
        'image' => 'required|image',
    ];
    public function store()
    {
        $this->validate();

       try {

            $imageName = Carbon::now()->microsecond . '.' . $this->image->extension();
            $this->image->storeAs('images/products',$imageName,'public');

            Product::create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $imageName,
            ]);

            $this->dispatchBrowserEvent('swal', [
                'icon' => 'success',
                'title' => 'The Product Created!',
                'timer' => 3000,
                'showConfirmButton' => false
            ]);

       } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal', [
                'icon' => 'error',
                'title' => $ex->getMessage(),
            ]);
       }
    }
    public function render()
    {
        return view('livewire.product.create')->extends('layouts.app')->section('content');
    }
}
