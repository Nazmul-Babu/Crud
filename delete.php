<?php session_start() ?>

<?php 
 include 'core/user.php';
 include 'core/question.php';
 ?>
 <?php   
 
 $user =new user();
$question=new question();
$singlequestion= $question->getsinglequestion($_GET['qid']);   
 if(isset($_GET['qid'])){
    if($singlequestion['User_id']==$_SESSION['user_id']){

        $question->deletequestion($_GET['qid']);




    }else{
        echo "<script>alert('unauthorized')</script>";
        die();

    }
    


 }
    
 
 ?>