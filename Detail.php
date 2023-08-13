<?php
    include_once("Header.php");
    include_once("Connect.php");
    $c = new connect();
    $dblink = $c->connectToPDO();
    if (isset($_GET['id'])){
    
        $pid = $_GET['id'];
        
        $findSql="SELECT `pid`,`pname`,`pprice`,`pinfo`,`pimage`, `Cat_Name` FROM `product` p , `category` c WHERE p.pcatid=c.Cat_ID AND `pid` = ?";
        $re = $dblink->prepare($findSql);
        $valueArray = [ $pid];
        $re->execute($valueArray);
        
        $rows = $re->fetchAll(PDO::FETCH_BOTH);
    
?>
    <div class="container">
        <div class="row  justify-content-center">
<?php
    foreach($rows as $row){
?>          
        <div class="row gx-5"> 
             <aside class="col-lg-6">
                <div class="col-md-5">
                    <div class="main-img">           
                        <img src="./images/<?=$row['pimage']?>" class="card-img-top" alt="product.title" />
                    <div>
                </div>
             </aside>
             <main class="col-lg-6">
            <div class="row gx-7">
                <div class="main-description px-2">
                    <div class="category text-bold">
                        Category: <?=$row['Cat_Name']?>
                    </div>
                    <div class="product-title text-bold my-3">
                    <?=$row['pname']?>
                    </div>


                    <div class="price-area my-4">
                        <p class="new-price text-bold mb-1">$<?=$row['pprice']?></p>
                        <p class="text-secondary mb-1">(Additional tax may apply on checkout)</p>

                    </div>

                    <a href="./Cart.php?id=<?=$row['pid']?>"> Add to cart </a>     

                        <div class="block quantity">
                            <input type="number" class="form-control" id="cart_quantity" value="1" min="0" max="5" placeholder="Enter email" name="cart_quantity">
                        </div>
             </div>
                </div>

                <div class="product-details my-4">
                    <p class="details-title text-color mb-1">Product Details</p>
                    <p class="description"><?=$row['pinfo']?>"</p>
                </div>
            </div>
            </main>
        </div>
        </div>
    </div>

<?php
    }
?>
<?php
    }
?>


    </div>
