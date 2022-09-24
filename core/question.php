<?php
// include 'database.php';

class question extends database{

//create questions
    public function createquestion($title, $question, $User_id){
        $currentDateTime=date('Y-m-d H:i:s');
        $sql="INSERT INTO questions(title,details,User_id,created_at) values('$title','$question','$User_id','$currentDateTime')";
        $this->datasave($sql);

    }
    //get all questions
    public function getallquestions(){
        $sql="SELECT id,title from questions ORDER By id DESC";
        $result=$this->dataread($sql);
        return $result;
    }

    public function getsinglequestion($id){
        $sql="SELECT * FROM questions WHERE id='$id'";
        $result=$this->datareadsingle($sql);
        return $result;

    }
    //create a comment
    public function createanswer($question_id,$details,$user_id){
        $sql="INSERT INTO  answer(question_id,details,user_id) VALUES('$question_id','$details','$user_id')";
        $this->datasave($sql);

    }
    public function getquestionanswer($question_id){
        $sql="SELECT  answer.details,answer.user_id,users.username from questions join answer  on questions.id=answer.question_id join users on users.id=answer.user_id where questions.id='$question_id'";
        $result=$this->dataread($sql);
        return $result;
    }
    public function updatequestion($question_id,$title,$details,$user_id){
        if($user_id==$_SESSION['user_id']){
            $sql="UPDATE questions set title='$title',details='$details' WHERE id='$question_id'";
        $this->datasave($sql);
        }else{
            echo "<script>alert('unauthorized')</script>";
              die();
        }
        
    }

    public function deletequestion($qid){
        $sql="DELETE FROM questions WHERE id='$qid'";
        $this->datasave($sql);
        header('location:dashboard.php');

    }
}


?>