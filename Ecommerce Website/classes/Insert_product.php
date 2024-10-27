<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");

// product insert class 
class Insertproduct
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function insertproduct($data, $file)
    {
        $title = $data['title'];
        $description = $data['description'];
        $keyword = $data['keyword'];
        $catid = $data['catid'];
        $brandid = $data['brandid'];
        $price = $data['price'];

        //accessing imgae
        $img_one = $file['img_one']['name'];
        $img_two = $file['img_two']['name'];
        $img_three = $file['img_three']['name'];


        $img_one_tmp = $file['img_one']['tmp_name'];
        $img_two_tmp = $file['img_two']['tmp_name'];
        $img_three_tmp = $file['img_three']['tmp_name'];

        if (empty($title) || empty($description) || empty($keyword) || empty($catid) || empty($brandid) || empty($price) || empty($img_one) || empty($img_two) || empty($img_three)) {
            $msg = "Filed must not empty";
            return $msg;
        } else {
            move_uploaded_file($img_one_tmp, "./images/$img_one");
            move_uploaded_file($img_two_tmp, "./images/$img_two");
            move_uploaded_file($img_three_tmp, "./images/$img_three");

            // insert query
            $query = "INSERT INTO `products`(`product_title`, `product_des`, `product_key`, `cat_id`, `brand_id`, `image_one`, `image_two`, `imge_three`, `price`) VALUES ('$title','$description','$keyword','$catid','$brandid','$img_one','$img_two','$img_three','$price')";

            $result = $this->db->insert($query);

            if ($result) {
                $msg = "Insert data successfully";
                return $msg;
            }
        }
    }

    //show product in the index page

    function showproduct()
    {
        $query = "SELECT * FROM products ORDER BY rand() LIMIT 0,9";
        $result = $this->db->select($query);
        return $result;
    }

    //show product in the index page

    function showallproduct()
    {
        $query = "SELECT * FROM products ORDER BY rand()";
        $result = $this->db->select($query);
        return $result;
    }

    // show search post
    function searchproduct($data)
    {
        $search = $data['search'];
        $query = "SELECT * FROM products WHERE product_key LIKE '%$search%'";
        $result = $this->db->select($query);
        return $result;
    }
    //show product in the product details page
    function  showproduct_details($id)
    {
        $query = "SELECT * FROM products WHERE product_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
