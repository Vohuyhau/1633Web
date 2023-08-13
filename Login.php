<?php
require_once('Header.php');
//http://localhost:1000/1633/connect.php/
require_once('Connect.php');

//kiểm tra biến hoặc giá trị có tồn tại hay ko ( khi mà ngta bấm vào nút đăng kí)
if (isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Câu lệnh truy vấn (qua PHP MyAdmin Shop_GCC200224->USER->SQL->Insert

    $sql = "SELECT `username` FROM `users` WHERE `username` =? and `password`=?";
    $c = new Connect();
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql);
    $valueArray = ["$username","$password"];
    $stmt = $re->execute($valueArray);

    $numrow = $re->rowCount(); //dòng này thể hiện khi chạy select thì nó chạy bao nhiêu dòng


    $row =$re->fetch(PDO::FETCH_BOTH);
    if($numrow==1){
        setcookie("cc_usr",$row['username'],time()+3600);
        header("Location:index.php");
        //echo "Login successfully";

        // //Chuyển trang 
        // header("location: index.php");
    }else{
        echo "Something wrong!!!!!!!!!!!!!";
    }
}

?>
        <div class="container">
            <h2> Member Registeration</h2>
            <form action="" name="formReg" method="POST">
                <div class="row mb-3">
                    <label for="" class="col-lg-4">Username</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="username">
                        <br>
                    </div>

                    <label for="" class="col-lg-4">Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control"name="password">
                        <br>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="d-grid mx-auto col-3">
                        <input type="submit"value="Login" class="btn-btn-primary" name="btnLogin">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>