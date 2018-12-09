<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/Routable.php";

class WebRoute extends Routable {

    function getPortfolioList(){
        $sql = "SELECT * FROM tblPortfolio ORDER BY `title` DESC;";
        return $this->getArray($sql);
    }

    function getCustomerComment(){
        $sql = "SELECT *
                FROM tblCustomerComment C JOIN tblCustomer CU ON C.customerId=CU.id 
                ORDER BY C.`regDate` DESC;";
        return $this->getArray($sql);
    }

}
