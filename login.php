<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<?
if(AuthUtil::isLoggedIn()){
    echo "<script>alert('비정상적인 접근입니다.'); history.back();</script>";
}
?>
<script>
    $(document).ready(function(){
        $(".jLogin").click(function(){
            if($(".jEmailTxt").val() == "" || $(".jPasswordTxt").val() == ""){
                alert("회원 정보를 입력하세요.");
                return;
            }
            callJson(
                "/main/shared/public/route.php?F=UserAuthRoute.requestLogin",
                {
                    email : $(".jEmailTxt").val(),
                    pwd : $(".jPasswordTxt").val()
                }
                , function(data){
                    if(data.returnCode > 0){
                        if(data.returnCode > 1){
                            alert(data.returnMessage);
                        }else{
                            location.href = "index.php";
                        }
                    }else{
                        alert("오류가 발생하였습니다.\n관리자에게 문의하세요.");
                    }
                }
            )
        });
    });
</script>
    <!-- styles
    ================================================== -->
    <section id="styles" class="s-sub">
        <div class="row">
            <div class="col-twelve tab-full">
                <h3>로그인</h3>
                <form>
                    <div>
                        <label for="jEmail">이메일</label>
                        <input class="full-width jEmailTxt" type="email" placeholder="이메일" id="jEmail">
                    </div>
                    <div>
                        <label for="jPass">패스워드</label>
                        <input class="full-width jPasswordTxt" type="password" placeholder="패스워드" id="jPass">
                    </div>
                    <div class="text-center">
                    <a class="jLogin btn btn--primary">로그인</a>
                    <a href="join.php" class="btn btn--stroke">회원가입</a>
                    </div>
                </form>

            </div>

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>