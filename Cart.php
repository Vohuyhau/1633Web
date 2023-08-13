<?php
    include_once("Header.php");
    include_once("Connect.php");

    $c = new connect();
    $dblink = $c->connectToPDO();
// <!-- //tra tra có biến ID truyền qua hay ko -->
if(isset($_GET['id'])){
    $pid = $_GET['id'];
    $findSql = "SELECT `cproid` FROM `cart` WHERE `cproid` = ? AND `cuserid`=?";

    $re = $dblink->prepare($findSql);
    $valueArray = [ $pid, 1 ];
    $stmt = $re->execute($valueArray);
    if($re->rowCount() == 0){
        $sql="INSERT INTO `cart`(`cuserid`, `cproid`, `cquantity`, `cdate`) VALUES (?,?,1,CURDATE())";
    }else{
        $sql = "UPDATE `cart` SET `cquantity`=`cquantity`+1,`cdate`= CURDATE() WHERE `cuserid`= ? and `cproid` = ?";
    }
    $re1 = $dblink->prepare($sql);
    $valueArray1 = [ 
        1, $pid
     ];
    $stmt = $re1->execute($valueArray1);
}
    $showCartSQL = "SELECT	`pimage`,`pname`,`cquantity`,`pprice` FROM `cart` c, `product`p
    WHERE c.cproid = p.pid and `cuserid`= ?";
    $re1 = $dblink->prepare($showCartSQL);
    $valueArray1 = [ 
        1
     ];
    $stmt = $re1->execute($valueArray1);
    // FETCH BOTH lấy thứ tự trên cột
    $rows = $re1->fetchAll(PDO::FETCH_BOTH);

?>

<!--Template for shopping cart-->

<section class="vh-100" style="background-color: #C6E2FF;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Shopping Cart </span><span class="h4">(<?=$re1->rowCount()?>item in your cart)</span></p>

        <div class="card mb-4">
          <div class="card-body p-4">
            <?php
                foreach($rows as $row){
            ?>
            <div class="row align-items-center">
              <div class="col-md-2">
                <img src="./images/<?=$row['pimage']?>"
                  class="img-fluid" alt="Generic placeholder image">
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Name</p>
                  <p class="lead fw-normal mb-0"><?=$row['pname']?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Quantity</p>
                  <p class="lead fw-normal mb-0"><?=$row['cquantity']?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Price</p>
                  <p class="lead fw-normal mb-0"><?=$row['pprice']?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Total</p>
                  <p class="lead fw-normal mb-0"><?=$row['pprice']*$row['cquantity']?></p>
                </div>
              </div>
            </div>
<?php
                }
?>
          </div>

<?php
          $c = new connect();
          $dblink = $c->connectToPDO();
          $SUM="SELECT SUM(p.pprice*c.cquantity) as `Sum` FROM `cart` c , `product` p WHERE c.cproid = p.pid and `cuserid` = ?";
          $re3 = $dblink->prepare($SUM);
          $valueArray3 = [1];
          $re3->execute($valueArray3);
          $rows1 = $re3->fetchAll(PDO::FETCH_BOTH);
?>
        </div>

        <div class="card mb-5">
          <div class="card-body p-4">
            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2">Order total:</span> 
 <?php
                foreach($rows1 as $row){
?>               
                  <span class="lead fw-normal">&dollar;<?=$row['Sum']?></span>
              </p>
<?php
}
?>          </div>
 
          </div>
        </div>

        <div class="d-flex justify-content-end">
        <a href="allproduct.php" class="nav-link">
          <button type="button" class="btn btn-light btn-lg me-2">Continue shopping</button>
        </a>
          <button type="button" class="btn btn-primary btn-lg">Purchase</button>
        </div>

      </div>
    </div>
  </div>
</section>