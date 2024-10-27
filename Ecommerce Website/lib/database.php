<?php

class Database
{

    //database connection properties
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $dbname = "ecommerce";


    //connection property
    protected $con = '';


    //connect to the database
    function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
        if ($this->con->connect_error) {
            echo "Connection Fail" . $this->con->connect_error;
        }
    }


    function __destruct()
    {
        $this->closeconnection();
    }


    //db connection close
    protected function closeconnection()
    {
        if ($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
    }


    //insert data
    function insert($query)
    {
        $result = mysqli_query($this->con, $query) or die($this->con->error . __LINE__);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }




    //select data
    function select($query)
    {
        $result = mysqli_query($this->con, $query) or die($this->con->error . __LINE__);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }


    //delete data
    function delete($query)
    {
        $result = mysqli_query($this->con, $query) or die($this->con->error . __LINE__);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }


    //update data
    function update($query)
    {
        $result = mysqli_query($this->con, $query) or die($this->con->error . __LINE__);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
