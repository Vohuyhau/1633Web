<?php
require_once('Header.php');
//http://localhost:1000/1633/connect.php/
require_once('Connect.php');

    //Câu lệnh truy vấn (qua PHP MyAdmin Shop_GCC200224->USER->SQL->Insert
    $sql = "SELECT * FROM `product`";

    $c = new Connect();
    $dblink = $c->connectToMySQL();

   $re = $dblink->query($sql);

   if($re->num_rows > 0){
      // mở hệ thống lưới
      ?>
      <div class="container"> 
         <div class="row justify-content-center">
      <?php
      while($row=$re->fetch_assoc()){
       ?>

       <div class="col-md-4">
      <div class="card h-100 shadow-sm">
        <a href="Detail.php?id=<?=$row['pid']?>">
          <img src="./images/<?=$row['pimage']?>" class="card-img-top" alt="product.title" />
        </a>
 
        <div class="label-top shadow-sm">
        </div>
        <div class="card-body">
          <div class="clearfix mb-3">
            <span class="float-start badge rounded-pill bg-success"> &dollar;<?=$row['pprice']?></span>
 
           
          </div>
          <h5 class="card-title">
            <a target="_blank" href="Detail.php?id=<?=$row['pid']?>">
               <?=$row['pname']?>
            </a>
          </h5>
 
          <div class="d-grid gap-2 my-4">
 
            <a href="Cart.php?id=<?=$row['pid']?>" class="btn btn-warning bold-btn">add to cart</a>
 
          </div>
          <div class="clearfix mb-1">
 
            <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>
 
            <span class="float-end">
              <i class="far fa-heart" style="cursor: pointer"></i>
 
            </span>
          </div>
        </div>
      </div>
    </div>

    <?php
     }
     ?>
         </div>
      </div>
     <?php
   }else{
      echo "Not Found";
   } 

?>