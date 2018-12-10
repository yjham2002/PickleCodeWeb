<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/Routable.php";

class AdminRoute extends Routable {

    function getInboundList(){

        if(AuthUtil::getLoggedInfo()->isAdmin != 1){
            return self::response(0, "Permission Denied");
        }

        $page = $_REQUEST["page"] == "" ? 1 : $_REQUEST["page"];
        $query = $_REQUEST["query"];
        $whereStmt = "1=1 ";
        if($query != ""){
            $whereStmt .= " AND `title` LIKE '%{$query}%'";
        }

        $startLimit = ($page - 1) * 5;
        $slt = "SELECT *, Q.regDate AS qReg, Q.id AS qID, C.id AS uID
                FROM tblAccessHistory Q LEFT JOIN tblCustomer C ON Q.userId = C.id WHERE {$whereStmt}
                ORDER BY Q.`regDate` DESC LIMIT {$startLimit}, 5";
        return $this->getArray($slt);
    }

    function getStatisticData(){

        if(AuthUtil::getLoggedInfo()->isAdmin != 1){
            return self::response(0, "Permission Denied");
        }

        $retVal = array();
        $slt = "SELECT
                (SELECT COUNT(*) FROM tblAccessHistory) AS cnt_total,
                (SELECT COUNT(*) FROM tblAccessHistory WHERE fbclid != '') AS cnt_facebook,
                (SELECT COUNT(*) FROM tblAccessHistory WHERE userId != 0) AS cnt_login
                FROM DUAL LIMIT 1;";

        $retVal["count"] = $this->getRow($slt);

        $slt = "SELECT accessIp, COUNT(*) AS cnt FROM tblAccessHistory GROUP BY accessIp ORDER BY regDate DESC;";

        $retVal["ip"] = $this->getArray($slt);

        $slt = "SELECT agent, COUNT(*) AS cnt FROM tblAccessHistory GROUP BY agent ORDER BY regDate DESC;";

        $retVal["agent"] = $this->getArray($slt);

        $slt = "SELECT DATE(regDate) AS dt, COUNT(*) AS cnt FROM tblAccessHistory GROUP BY DATE(regDate) ORDER BY regDate DESC;";

        $retVal["date"] = $this->getArray($slt);

        return $retVal;
    }

    function deleteFaq(){
        if(AuthUtil::getLoggedInfo()->isAdmin != 1){
            return self::response(0, "Permission Denied");
        }

        $id = $_REQUEST["id"];
        $dlt = "DELETE FROM tblFaq WHERE `id` = '{$id}'";
        $this->update($dlt);
        
        return self::response(1, "삭제되었습니다.");
    }

    function upsertFaq(){
        if(AuthUtil::getLoggedInfo()->isAdmin != 1){
            return self::response(0, "Permission Denied");
        }

        $id = $_REQUEST["id"];
        $title = $_REQUEST["title"];
        $content = $_REQUEST["content"];
        $ins = "
                INSERT INTO tblFaq(`id`, `title`, `content`, `regDate`)
                VALUES ('{$id}', '{$title}', '{$content}', NOW())
                ON DUPLICATE KEY UPDATE `title` = '{$title}', `content` = '{$content}';
        ";
        $this->update($ins);
        
        return self::response(1, "저장되었습니다.");
    }



}
