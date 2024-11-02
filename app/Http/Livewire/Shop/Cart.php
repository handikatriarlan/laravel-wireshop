<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart as FacadesCart;
use Livewire\Component;

class Cart extends Component
{
    public $cart;
    public $isCartEmpty;

    public function mount()
    {
        $this->cart = FacadesCart::get();
        $this->checkIfCartIsEmpty();
    }

    public function render()
    {
        return view('livewire.shop.cart');
    }

    public function removeFromCart($id)
    {
        FacadesCart::remove($id);
        $this->cart = FacadesCart::get();
        $this->checkIfCartIsEmpty();
        $this->emit('removeFromCart');
    }

    public function checkIfCartIsEmpty()
    {
        $this->isCartEmpty = empty($this->cart['products']);
    }
}
