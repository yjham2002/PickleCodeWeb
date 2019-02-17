<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/shared/public/classes/WebRoute.php"; ?>
<?
    if(!AuthUtil::isLoggedIn()){
        echo "<script>alert('로그인 후 이용 가능한 서비스입니다.'); location.href='login.php';</script>";
    }

    $router = new WebRoute();
    $classList = $router->getClassList();
    $row = $router->getQuery();

    if(!AuthUtil::isLoggedIn() || $row["userId"] != AuthUtil::getLoggedInfo()->id || AuthUtil::getLoggedInfo()->isAdmin == 0){
        echo "<script>alert('비정상적인 접근입니다.'); history.back();</script>";
    }

?>
<script>
    $(document).ready(function(){

    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub" >
        <div class="row">
            <div class="col-twelve tab-full">
                <h3>문의상세</h3>
                <form>
                    <div>
                        <label for="jTitle">제목</label>
                        <input disabled class="full-width jTitle" type="text" placeholder="제목" id="jTitle" value="<?=$row["title"]?>" />
                    </div>
                    <div>
                        <label for="jMoney">예산(단위:원)</label>
                        <input disabled class="full-width jMoney" type="number" placeholder="예산(선택입력)" id="jMoney" value="<?=$row["budget"]?>" />
                    </div>
                    <div>
                        <label for="jClass">분류</label>
                        <div class="cl-custom-select">
                            <select class="full-width jClass" id="jClass" disabled>
                                <option value="0">미분류</option>
                                <?foreach ($classList as $item){?>
                                    <option value="<?=$item["id"]?>" <?=$item["id"]==$row["classId"] ? "SELECTED" : ""?>><?=$item["className"]?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="jContent">문의 내용</label>
                        <textarea disabled class="full-width jContent" placeholder="문의 내용" id="jContent"><?=$row["content"]?></textarea>
                    </div>
                </form>

            </div>

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>