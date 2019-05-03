<?php

class Customer {
    protected $customerid;
    protected $database;
    public $name;
    
    function __construct($customerID, $database) {
        
        
        $sql = file_get_contents('sql/getCustomer.sql');
        $params = array(
            'customerid' => $_SESSION['customerID']
        );
        $statement = $database->prepare($sql);
        $statement->execute($params);
        $customers = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $customer = $customers[0];
        
        $this->customerid = $customerID;
        $this->database = $database;
        $this->name = $customer['name'];
    }

}

?>