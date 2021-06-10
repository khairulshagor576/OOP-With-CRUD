<?php

class Database 
{
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectionDB();
    }

    private function connectionDB()
    {
        $this->link= new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!$this->link)
        {
            $this->error="Connection Failed!".$this->link->connect_error;
            return false;
        }
    }

    //Select or Read database Function

    public function select ($data)
    {
      $result=$this->link->query($data) or die($this->link->error.__LINE__);

      if( $result->num_rows>0)
      {
          return $result;
      }else{
          return false;
      }
    }

    //Insert Database Function

    public function insert($data) 
    {
      $result=$this->link->query($data) or die($this->link->error.__LINE__);
      if($result)
      {
          header("Location: index.php?msg=".urlencode('Data Inserted Successfully.'));
      }else{
          die("Error: (".$this->link->errno.")").$this->link->error;
      }
    }

}




?>