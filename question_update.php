<?php session_start(); ?>
<?php include 'doc_start.php'; ?>
<?php include 'header.php';?>
 <?php 
 include 'core/user.php';
 include 'core/question.php';
 ?>


 <?php
 if(!isset($_SESSION['user_id'])){
    header('location:login.php');
 }

$user =new user();
$question=new question();
 
 ?> 

<br>
<br>
<br>
<br>
<br>



<div class="container">
    <div class="row">
        <div class="col-12 text-center">
           
            
        <h3>updatequestion</h3>
        <?php
        if(isset($_GET['qid'])){
            $questiondata= $question->getsinglequestion($_GET['qid']);
            if($questiondata['User_id'] != $_SESSION['user_id']){
              echo "<script>alert('unauthorized')</script>";
              die();

            }

            

        }
        if(isset($_POST['submit'])){
            $question->updatequestion($_GET['qid'],$_POST['title'],$_POST['details'],$questiondata['User_id']);
            header('location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
        }
        
        ?>
        <form class="form-group" action="" method="POST">
        <input class="form-control" type="text" name="title" placeholder="title" value="<?= $questiondata['title'] ?>"><br>
         <textarea name="details" id="Qdetails" class="form-control" placeholder="post Your question">
         <?= $questiondata['details'] ?>
         </textarea><br>
         <input class="btn btn-success btn-block" type="submit" name="submit" value="Update Question">
          </form>
          



        </div>
        

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    
tinymce.init({
  selector: '#Qdetails'
});


</script>


<?php include 'footer.php';?>
<?php include 'doc_end.php';?>
