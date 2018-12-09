<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/Routable.php";

class WebRoute extends Routable {

    function saveStatistic(){
        $userId = AuthUtil::getLoggedInfo()->id == "" ? "0" : AuthUtil::getLoggedInfo()->id;
        $accessIp = $_SERVER['REMOTE_ADDR'].":".$_SERVER['SERVER_PORT'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $fbclid = $_REQUEST["fbclid"];

        $ins = "INSERT INTO tblAccessHistory(`userId`, `accessIp`, `fbclid`, `agent`, `regDate`)
                VALUES ('{$userId}', '{$accessIp}', '{$fbclid}', '{$agent}', NOW())";

        $this->update($ins);
    }

    function getPortfolioList(){
        $sql = "SELECT * FROM tblPortfolio ORDER BY `title` DESC;";
        return $this->getArray($sql);
    }

    function getCustomerComment(){
        $sql = "SELECT *
                FROM tblCustomerComment C JOIN tblCustomer CU ON C.customerId=CU.id 
                ORDER BY C.`regDate` DESC LIMIT 5;";
        return $this->getArray($sql);
    }

    function getFaqList(){
        return $this->getArray("SELECT * FROM tblFaq ORDER BY `title` ASC");
    }

    function getNoticeList(){
        $page = $_REQUEST["page"] == "" ? 1 : $_REQUEST["page"];
        $query = $_REQUEST["query"];
        $whereStmt = "1=1 ";
        if($query != ""){
            $whereStmt .= " AND `title` LIKE '%{$query}%'";
        }

        $startLimit = ($page - 1) * 5;
        $slt = "SELECT `id`, `title`, `madeBy`, `filePath`, `uptDate`, `regDate`, `hit`,
                (SELECT `name` FROM tblCustomer WHERE `id`=`madeBy` LIMIT 1) AS madeName 
                FROM tblNotice WHERE {$whereStmt}
                ORDER BY `regDate` DESC LIMIT {$startLimit}, 5";
        return $this->getArray($slt);
    }

    function saveQuery(){
        $userId = $_REQUEST["userId"];
        $budget = $_REQUEST["budget"];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];
        $classId = $_REQUEST["classId"];
        $ins = "INSERT INTO tblQuery(`userId`, `title`, `budget`, `content`, `classId`, `regDate`)
                VALUES ('{$userId}', '{$title}', '{$budget}', '{$content}', '{$classId}', NOW())";
        $this->update($ins);

        return self::response(1, "저장되었습니다.");
    }

    function getClassList(){
        $slt = "SELECT * FROM tblClass ORDER BY className ASC";
        return $this->getArray($slt);
    }

    function getQueryList(){
        $page = $_REQUEST["page"] == "" ? 1 : $_REQUEST["page"];
        $query = $_REQUEST["query"];
        $whereStmt = "1=1 ";
        if($query != ""){
            $whereStmt .= " AND `title` LIKE '%{$query}%'";
        }

        $startLimit = ($page - 1) * 5;
        $slt = "SELECT *,
                (SELECT `className` FROM tblClass WHERE `id`=`classId` LIMIT 1) AS className 
                FROM tblQuery WHERE {$whereStmt}
                ORDER BY `regDate` DESC LIMIT {$startLimit}, 5";
        return $this->getArray($slt);
    }

    function getNotice(){
        $slt = "SELECT *,
                (SELECT `name` FROM tblCustomer WHERE `id`=`madeBy` LIMIT 1) AS madeName
                FROM tblNotice WHERE `id`='{$_REQUEST["id"]}'";
        return $this->getRow($slt);
    }

    function updateNoticeHit(){
        $id = $_REQUEST["id"];
        $slt = "SELECT `hit` FROM tblNotice WHERE `id` = '{$id}'";
        $hitVal = $this->getValue($slt, "hit") + 1;
        $upt = "UPDATE tblNotice SET `hit` = '{$hitVal}' WHERE `id` = '{$id}'";
        $this->update($upt);
    }

}
