<?php

require_once "Product.php";
require_once "CartItem.php";

class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];
   

    // TODO Generate getters and setters of properties

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */



    public function addProduct(Product $product, int $quantity) {
        
        // foreach($this->items as $item){
        //     if($product->getId() === $item->getProduct()->getId()){
        //         $item->getProduct()->setAvailableQuantity($item->getProduct()->getAvailableQuantity() - $quantity);
        //         return $item;
        //     }
            
        // }
        $item = new CartItem($product , $quantity); 
        $this->items[] = $item; 
        return $item;
    }

    public function getItems()
    {
        return $this->items;
    }
   


    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        foreach($this->items as $key => $item){
            if($product->getId() === $item->getProduct()->getId()){
                unset($this->items[$key]);
                return $item;
            }
        }
        
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity()
    {
        $totalQuantity = 0;
        foreach($this->items as $item){
            $totalQuantity = $totalQuantity + $item->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float 
    {
        $totalSum = 0;
        foreach($this->items as $product){
            $totalSum = $totalSum + ($product->getProduct()->getPrice() * $product->getQuantity()) ;
        }
        return $totalSum;
    }
}
