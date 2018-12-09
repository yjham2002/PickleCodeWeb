<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subHeader.php"; ?>
<?
    if(AuthUtil::isLoggedIn()){
        echo "<script>alert('비정상적인 접근입니다.'); history.back();</script>";
    }
?>
<script>
    $(document).ready(function(){
        $(".jJoin").click(function(){
            if($(".jEmailTxt").val() == ""
                || $(".jPhoneTxt").val() == ""
                || $(".jNameTxt").val() == ""
                || $(".jPasswordTxt").val() == ""
                || $(".jCompanyTxt").val() == ""
                || $(".jRoleTxt").val() == ""
                ){
                alert("회원 정보를 모두 입력하세요.");
                return;
            }

            if(!$(".jAgree").prop("checked")){
                alert("개인정보 처리방침에 동의하시기 바랍니다.");
                return;
            }

            if($(".jPasswordTxt").val() != $(".jPasswordCTxt").val()){
                alert("패스워드 확인이 일치하지 않습니다.");
                return;
            }

            callJson(
                "/main/shared/public/route.php?F=UserAuthRoute.joinUser",
                {
                    email : $(".jEmailTxt").val(),
                    pwd : $(".jPasswordTxt").val(),
                    phone : $(".jPhoneTxt").val(),
                    name : $(".jNameTxt").val(),
                    role : $(".jRoleTxt").val(),
                    company : $(".jCompanyTxt").val()
                }
                , function(data){
                    if(data.returnCode > 0){
                        alert(data.returnMessage);
                        if(data.returnCode > 1){
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
    <section id="styles" class="s-about" >
        <div class="row">
            <div class="col-twelve tab-full">
                <h3>간편 회원가입</h3>
                <form>
                    <div>
                        <label for="jName">성명</label>
                        <input class="full-width jNameTxt" type="text" placeholder="성명" id="jName">
                    </div>
                    <div>
                        <label for="jEmail">이메일</label>
                        <input class="full-width jEmailTxt" type="email" placeholder="이메일" id="jEmail">
                    </div>
                    <div>
                        <label for="jPhoneTxt">전화번호</label>
                        <input class="full-width jPhoneTxt" type="text" placeholder="전화번호" id="jPhoneTxt">
                    </div>
                    <div>
                        <label for="jCompanyTxt">회사명</label>
                        <input class="full-width jCompanyTxt" type="text" placeholder="회사명" id="jCompanyTxt">
                    </div>
                    <div>
                        <label for="jRoleTxt">직책/직급</label>
                        <input class="full-width jRoleTxt" type="text" placeholder="직책/직급" id="jRoleTxt">
                    </div>
                    <div>
                        <label for="jPass">패스워드</label>
                        <input class="full-width jPasswordTxt" type="password" placeholder="패스워드" id="jPass">
                    </div>
                    <div>
                        <label for="jPassC">패스워드 확인</label>
                        <input class="full-width jPasswordCTxt" type="password" placeholder="패스워드 확인" id="jPassC">
                    </div>
                    <div>
                        <label class="add-bottom">
                            <input type="checkbox" class="jAgree">
                            <span class="label-text">
                                <a href="privacy.php" class="jPrivacy" target="_blank">개인정보 처리방침</a>에 동의합니다.
                            </span>
                        </label>
                    </div>
                    <div class="text-center">
                    <a class="jJoin btn btn--primary">회원가입</a>
                    </div>
                </form>

            </div>

        </div> <!-- end row -->
    </section>
<? include_once $_SERVER["DOCUMENT_ROOT"]."/main/inc/subFooter.php"; ?>