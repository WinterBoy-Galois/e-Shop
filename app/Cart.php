<?php

namespace App;

class Cart
{
    public $items = null; //store all selected products
    public $totalQty = 0; // total stored products
    public $totalPrice = 0; // total price of all products

    /**
     * pass the old cart 
     * products => prevent 
     * losing old cart data
    */
    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    //store new product to existing or empty cart
    public function add($item,$id){
        $storedItem = ['qty'=>0,
                       'price'=>$item->price,
                       'item'=>$item
                    ];
         /**
          * check if the
          * new product already
          * exist if it exists
          * increment quantity
          * the price and the sub total 
          *price of that product we only need 
          *the product information once
         */
        if ($this->items) {
         if (array_key_exists($id,$this->items)) {
            $storedItem = $this->items[$id];
         }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function reduceByOne($id){
     $this->items[$id]['qty']--;
     $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
     $this->totalQty--;
     $this->totalPrice -= $this->items[$id]['item']['price'];
     if ($this->items[$id]['qty']<=0) {
         unset($this->items[$id]);
     }
    } 

    public function removeItem($id){
        $this->totalQty -=$this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}