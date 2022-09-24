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
if(!isset($_GET['id'])){
    echo "<p class='alert alert-danger'>INVALID REQUEST</p>";
    die();
}
$singlequestion= $question->getsinglequestion($_GET['id']);


 
 ?> 





<br>
<br>
<br>
<br>
<br>



<div class="container">
    <div class="row">
        <div class="col-12">
            <h3> Title:<?= $singlequestion['title']  ?>  </h3>
            <?php 
            if($singlequestion['User_id'] == $_SESSION['user_id']){
                $qid=$singlequestion['Id'];
                echo "<a href='question_update.php?qid=$qid'>Edit</a> ";
                echo "<a onClick=' return confirm()' href='delete.php?qid=$qid'>Delete</a>";
            }
            ?>
            <hr>
           
        <div>
            <?= $singlequestion['details'] ?>

        </div>
        </div>
      
        <div class="col-12">
        <hr>
        <?php
        if(isset($_POST['submit'])){
            $question->createanswer($_GET['id'],$_POST['answer'],$_SESSION['user_id']);
        }
         
        ?>
            <form method="POST" action="" class="form-group">
                <textarea class="form-control" name="answer" id="" cols="30" rows="10"></textarea><br>
                <input type="submit" name="submit" value="Post Answer" >
            </form>
            <hr>
            <pre>
                <?php  
                $answers= $question->getquestionanswer($_GET['id']) 
                ?>
                <?php foreach($answers as $answeer): ?>

            </pre>
            <div class="col-12">
              <p><?= $answeer['username']?></p>  
              <div>
                <?= $answeer['details']?>

                </div>
                
                <hr>
            </div>
            <?php endforeach; ?>
           
        </div>

    </div>
</div>



<?php include 'footer.php';?>
<?php include 'doc_end.php';?>
