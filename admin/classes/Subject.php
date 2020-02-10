<?php
class Subject{

   public function create($post){
        $required=[
            $post['subject_name'],
            $post['subject_no'],
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        $subject_name=$post['subject_name'];
        $subject_no=$post['subject_no'];
        //check subject code
        $query="SELECT Sub_Name FROM subjects WHERE Sub_Name='$subject_name'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This Subject is already added try again.</p>";
            return $message;
        }
        //check subject name
        $query="SELECT Sub_code FROM subjects WHERE Sub_code='$subject_no'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This Subject Code is already added under another Subject try again.</p>";
            return $message;
        }

         $add_query = "INSERT INTO subjects(Sub_Name,Sub_code)
      VALUES('$subject_name','$subject_no')";
        $add_result=database::connect()->query($add_query);
        if($add_result){
            $message="<p class='alert alert-success'><strong>Success!</strong> Your Subject add successful.</p>";
            return $message;
        }

    }

  //select student for manage student
    public function selectTotalSubject(){

        $query="SELECT * FROM  subjects where status='core' ";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    //select single  student By id with group
    public function singleSubject($id){

        $query="SELECT * FROM  subjects WHERE id='$id'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    public function updateSubject($post,$subject_id)
        {
            $required=[
                $post['subject_name'],
                $post['subject_no']
            ];
            if (validation::required($required)){
                return validation::required($required);
            }

            // $school_id=$post['school_id'];
            $subject_name=$post['subject_name'];
            $subject_no=$post['subject_no'];

            $update_query="UPDATE subjects SET Sub_Name='$subject_name', Sub_code='$subject_no' WHERE id='$subject_id'";
           $result=database::connect()->query($update_query);
        if($result){
            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your Subject update successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your Subject update failed.</p>";
            return $msg;
        }

        }

    public function select($class,$group)
    {
        if ($class=='Nine' || $class=='Ten'){
            $query="SELECT * FROM books WHERE class_name='$class' AND class_group='$group' ORDER BY id DESC";
        }else{
            $query="SELECT * FROM books WHERE class_name='$class' ORDER BY id DESC";
        }
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            return $result;
        }else{
            return false;
        }
    }
    public function selectBooksOption($post)
    {
        $class=$post['class'];

        if($class=='Nine' || $class=='Ten'){
            $group=$post['group'];
            $required=[
                $post['class'],
                $post['group']
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
            $value=$class.'_'.$group;
        }else{
            $required=[
                $post['class'],
            ];
            if(validation::required($required)){
                return validation::required($required);
            }
            $value=$class;
        }

        echo "<script> window.location='manage_books.php?value=$value';</script>";


    }


}
?>