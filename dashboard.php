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
           
            
        <h3>DashBorad</h3>
        <?php
        if(isset($_POST['submit'])){
            $title=$_POST['title'];
            $details=$_POST['details'];
            $question->createquestion($title,$details,$_SESSION['user_id']);


            

        }
        
        ?>
        <form class="form-group" action="" method="POST">
        <input class="form-control" type="text" name="title" placeholder="title"><br>
         <textarea name="details" id="Qdetails" class="form-control" placeholder="post Your question"></textarea><br>
         <input class="btn btn-success btn-block" type="submit" name="submit" value="POST QUESTION">
          </form>
          



        </div>
        <div class="col-12">
          <h2>All Questions</h2>
          
            <?php
           
            $allquestions=$question->getallquestions();

            ?>
          
        </div>
        <div class="row">
          <?php  foreach($allquestions as $question ): ?>
          <div class="col-12">
            <a href="Question.php?id=<?=$question['id'] ?>"><?= substr($question['title'],0,10).'....';?></a>
          </div>
          <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    
tinymce.init({
  selector: '#Qdetails'
});


</script>


<?php include 'footer.php';?>
<?php include 'doc_end.php';?>
