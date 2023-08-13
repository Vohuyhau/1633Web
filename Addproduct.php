<?php
require_once('Header.php');
//http://localhost:1000/1633/connect.php/
require_once('Connect.php');

//kiểm tra biến hoặc giá trị có tồn tại hay ko ( khi mà ngta bấm vào nút đăng kí)
if (isset($_POST['btnAdd'])){
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pinfo = $_POST['pinfo'];
    $pdate = $_POST['pdate'];
    $pquan = $_POST['pquan'];
    //$pimage = $_POST['pimage'];
    $pcatid = $_POST['pcatid'];

    $pimgname=str_replace(' ', '-',$_FILES['pimage']['name']);

    //hàm coppy có 2 tham số
    //tham số 1 là hình đang chọn
    //tham số 2 là đường dẫn coppy 
    $flag = move_uploaded_file($_FILES['pimage']['tmp_name'],'./images/'.$pimgname);
    
   
    //Câu lệnh truy vấn (qua PHP MyAdmin Shop_GCC200224->USER->SQL->Insert

    $c = new Connect();
     if($flag){
      $sql= "INSERT INTO `product`(`pname`, `pprice`, `pinfo`, `pimage`, `pquan`, `pcatid`, `pdate`) VALUES (?,?,?,?,?,?,?)";
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql);
    $valueArray = [ $pname, $pprice, $pinfo, $pimgname, $pquan, $pcatid, $pdate ];
    $stmt = $re->execute($valueArray);
    
    if($stmt) echo "Congrats";
    }else{
        echo "Image is copied failed";
    }
}
?>
        <div class="container">
            <h2> Add Product</h2>
            <form action="" name="formReg" method="POST"
                enctype="multipart/form-data"
                >
                <div class="row mb-3">
                    <label for="" class="col-lg-4">Product Name </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="pname">
                        <br>
                    </div>

                    <div class="row mb-3">
                    <label for="" class="col-lg-4">Price</label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" name="pprice">
                        <br>
                    </div>

                    <div class="row mb-3">
                    <label for="" class="col-lg-4">Discription</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="pinfo">
                        <br>
                    </div>

                    <div class="row mb-3">
                    <label for="" class="col-lg-4">Date</label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control" name="pdate">
                        <br>
                    </div>

                    <div class="row mb-3">
                    <label for="" class="col-lg-4">Quantity</label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" name="pquan">
                        <br>
                    </div>

                    <div class="row mb-3">
                    <label for="" class="col-lg-4">Image</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" name="pimage">
                        <br>
                    </div>

                    <div class="row mb-3">
                    <label for="" class="col-lg-4">Cat Id:</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="pcatid">
                        <br>
                    </div>

                    <div class="row mb-3">
                        <div class="d-grid mx-auto col-3">
                        <input type="submit" value="Add" class="btn-btn-primary" name="btnAdd">
                        <br>
                    </div>

                    </div>
                </div>
            </form>
        </div>
    </body>
</html>