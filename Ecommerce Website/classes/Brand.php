<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");

class Brand
{
    public $db;

    function __construct()
    {
        $this->db = new Database();
    }



    function addbarand($data)
    {

        $brandname = $data['brandname'];

        //exist data query
        $selectquery = "SELECT * FROM brands WHERE brandname='$brandname'";
        $selectresult = $this->db->select($selectquery);
        $numdata = mysqli_num_rows($selectresult);

        if (empty($brandname)) {
            $msg = "filed must not be empty!";
            return $msg;
        } elseif ($numdata > 0) {
            $msg = "This brand already is exist!";
            return $msg;
        } else {
            $query = "INSERT INTO `brands`(`brandname`) VALUES ('$brandname')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "insert brandname successfully";
                return $msg;
            }
        }
    }

    //show brands in sidebar page
    function getbranddata()
    {
        $query = "SELECT * FROM brands";
        $result = $this->db->select($query);
        return $result;
    }

    //show brand wise product

    function brandwiseproduct($id)
    {
        $query = "SELECT * FROM products WHERE brand_id='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
