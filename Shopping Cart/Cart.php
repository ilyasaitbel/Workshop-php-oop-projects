<?php

include 'Product.php';

class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];
    private array $products = [];

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
        
        foreach($this->items as $item){
            if($product->getId() === $item->getProduct()->getId()){
                $item->getProduct()->getAvailableQuantity() = $item->getProduct()->getAvailableQuantity() - $quantity;
                return $item;
            }
            
        }
        $item = new CartItem($item , $quantity); 
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
    public function getTotalQuantity($items)
    {
        $totalQuantity = 0;
        foreach($items as $item){
            $totalQuantity = $totalQuantity + $this->$item->getquantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum($products): float 
    {
        $totalSum = 0;
        foreach($products as $product){
            $totalSum = $totalSum + $this->$product->getprice();
        }
        return $totalSum;
    }
}
