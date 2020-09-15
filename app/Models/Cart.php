<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id, $quantity)
    {
        $storedItem = ['item'=>$item, 'qty'=>$quantity, 'price'=>$item->price];
        
        $this->totalQty += $storedItem['qty'];
        $this->totalPrice += $item->price * $storedItem['qty'];
        
        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem['qty'] += $this->items[$id]['qty'];
            }
        }
        $this->items[$id] = $storedItem;                  
    }

    public function delete($item, $id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $item->price * $this->items[$id]['qty'];

        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                unset($this->items[$id]);
            }
        }
        return redirect()->back();
    }
}