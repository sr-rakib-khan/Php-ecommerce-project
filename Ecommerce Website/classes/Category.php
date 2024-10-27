<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");


class Category
{
    public $db;

    function __construct()
    {
        $this->db = new Database();
    }



    function addcategory($data)
    {

        $catname = $data['catname'];

        //exist data query
        $selectquery = "SELECT * FROM categories WHERE catname='$catname'";
        $selectresult = $this->db->select($selectquery);
        $numdata = mysqli_num_rows($selectresult);

        if (empty($catname)) {
            $msg = "filed must not be empty!";
            return $msg;
        } elseif ($numdata > 0) {
            $msg = "This category already is exist!";
            return $msg;
        } else {
            $query = "INSERT INTO `categories`(`catname`) VALUES ('$catname')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "insert category successfully";
                return $msg;
            }
        }
    }

    //show category in sidebar page
    function getcategory()
    {
        $query = "SELECT * FROM categories";
        $result = $this->db->select($query);
        return $result;
    }

    // show cat wise product
    function getcatwiseproduct($id)
    {
        $query = "SELECT * FROM products WHERE cat_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
