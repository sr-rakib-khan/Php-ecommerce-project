<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");


class Cart
{

    public $db;

    function __construct()
    {
        $this->db = new Database();
    }


    //insert cart item in database
    function insertcartitem($id, $ip)
    {
        $query = "SELECT * FROM cart WHERE product_id='$id' AND 	ip_address='$ip'";
        $result = $this->db->select($query);

        if (mysqli_num_rows($result) > 0) {
            return "<script>alert('this item already is exist')</script>";
            header("location:index.php");
        } else {
            $query = "INSERT INTO cart (product_id, ip_address, quantity) VALUES('$id', '$ip', '0')";
            $result = $this->db->insert($query);
            if ($result) {
                return "<script>alert('your cart is added')</script>";
                header("location:index.php");
            }
        }
    }


    //show cart item
    function cart_item($ip)
    {
        $query = "SELECT * FROM cart WHERE ip_address='$ip'";
        $result = $this->db->select($query);
        $count_cart_item = mysqli_num_rows($result);
        return $count_cart_item;
    }

    //show cart item price

    function cart_item_price($ip)
    {
        $totalprice = 0;

        $query = "SELECT * FROM cart WHERE ip_address='$ip'";
        $result = $this->db->select($query);

        while ($row = mysqli_fetch_array($result)) {
            $product_id = $row['product_id'];
            $query = "SELECT * FROM products WHERE product_id='$product_id'";
            $result_product = $this->db->select($query);

            while ($price_row = mysqli_fetch_array($result_product)) {
                $product_price = array($price_row['price']);
                $product_value = array_sum($product_price);
                $totalprice = $totalprice + $product_value;
            }
        }
        return $totalprice;
    }

    //data show in the cart page
    function show_item_cartpage($ip)
    {
        $query = "SELECT * FROM cart INNER JOIN products ON cart.product_id=products.product_id WHERE cart.ip_address='$ip'";

        $result = $this->db->select($query);

        return $result;
    }

    //update cart item quantity

    function update_item_quantity($quantity, $ip)
    {
        $query = "UPDATE cart SET quantity ='$quantity' WHERE ip_address='$ip'";
        $result = $this->db->update($query);
        return $result;
    }
}
