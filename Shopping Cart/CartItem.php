<?php

require_once "Product.php";
require_once "Cart.php";


class CartItem
{
    private Product $product;
    private int $quantity;

    // TODO Generate constructor with all properties of the class
    // TODO Generate getters and setters of properties
    public function __construct( $product , $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function increaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
        if($this->quantity < $this->product->getAvailableQuantity()){
            $this->quantity += 1;
        }else{
            echo 'you can not make quantity more then available quantity';
        }
        
    }
    public function getProduct(){
        return $this->product;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($value){
         $this->quantity = $value;
    }

    public function decreaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: Quantity must not become less than 1
         if($this->quantity > 1){
            $this->quantity -= 1;
        }else{
            echo 'you mast to do at list one';
        }
    }
}