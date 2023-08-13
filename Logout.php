<?php
    require_once('Connect.php');
//   $numrow = $re->rowCount(); //dòng này thể hiện khi chạy select thì nó chạy bao nhiêu dòng
//   if($numrow==1){
    
//       setcookie("cc_usr",$row['username'],time()-3600,);
  //}
  if (isset($_COOKIE['cc_usr'])){
    setcookie("cc_usr", "",time()-(3600));
    echo "Logout successfully";

   
    header("location: index.php");
}else{
    echo "Something wrong!!!!!!!!!!!!!";
}
      ?>
