<?php include 'doc_start.php';?>



<?php include 'header.php';?>
<?php include 'core/user.php';?>


 <?php
   $user = new user();
 
 ?>
<br>
<br>
<br>
<br>
<br>










<div class="container">
<div class="row">
    <div class="col-12 text-center">

        <h3>Registration</h3>

      <?php
      if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $user->saveuser($_POST['username'],$_POST['email'],md5($_POST['password']));
            echo "<li class='alet alert-success'> successfull </li>";

        }else{
            echo "<li class='alet alert-danger'> All Fields Are Required! </li>";
        }
      }
      
      
      ?>





       
    <form class="form-group" action="" method="POST" >
            <input class="form-control" type="text" name="username" placeholder="User Name"><br>
            <input class="form-control" type="email" name="email" placeholder="Email"><br>
            <input class="form-control" type="password" name="password" placeholder="Password"><br>
            <input class="btn btn-success btn-block" type="submit" name="submit"><br>


        </form>
    </div>
</div>
</div>



<?php include 'footer.php';?>

<?php include 'doc_end.php';?>