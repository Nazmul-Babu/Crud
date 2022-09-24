<?php include 'doc_start.php'; ?>
<?php include 'header.php';?>
 <?php 
 include 'core/user.php';
 ?>


 <?php

$user =new user();
 
 ?> 





<br>
<br>
<br>
<br>
<br>



<div class="container">
    <div class="row">
        <div class="col-12 text-center">
           
            
        <h3>LogIn</h3>

<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['username'])  && !empty($_POST['password'])){
        $response= $user->logincheck($_POST['username'],$_POST['password']);
        if(count($response)==1){
            // print_r($response);
            session_start();

          $_SESSION['user_id']=$response[0]['Id'];
          $_SESSION['username']=$response[0]['UserName'];
          header('location:dashboard.php');
            



        }else{
            echo "<li class='alet alert-danger'> All Fields Are Required! </li>";

        }
     

    }else{
            echo "<li class='alet alert-danger'> All Fields Are Required! </li>";
        }
 
}


?>
<form class="form-group" action="" method="POST">
    <input class="form-control" type="text" name="username" placeholder="user name"><br>
    <input class="form-control" type="password" name="password" placeholder="password"><br>
    <input class="btn btn-success btn-block" type="submit" name="submit">
</form>


        </div>
    </div>
</div>



<?php include 'footer.php';?>
<?php include 'doc_end.php';?>
