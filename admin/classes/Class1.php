<?php
class Class1{

 public function create($post){
    $required=[
        $post['class_name'],
        $post['class_no'],
    ];
    if(validation::required($required)){
        return validation::required($required);
    }
    $class_name=$post['class_name'];
    $class_no=$post['class_no'];
        //check subject code
    $query="SELECT Class_Name FROM classes WHERE Class_Name='$class_name'";
    $result=database::connect()->query($query);
    if ($result->num_rows>0){
        $message="<p class='alert alert-danger'><strong>Error!</strong> This Class is already added try again.</p>";
        return $message;
    }
        //check subject name
    $query="SELECT Class_no FROM classes WHERE Class_no='$class_no'";
    $result=database::connect()->query($query);
    if ($result->num_rows>0){
        $message="<p class='alert alert-danger'><strong>Error!</strong> This Class Number is already added under another Class try again.</p>";
        return $message;
    }

    $add_query = "INSERT INTO classes(Class_Name,Class_no)
    VALUES('$class_name','$class_no')";
    $add_result=database::connect()->query($add_query);
    if($add_result){
        $message="<p class='alert alert-success'><strong>Success!</strong> Your Class add successful.</p>";
        return $message;
    }

}

  //select student for manage student
public function selectTotalClasses(){

    $query="SELECT * FROM  classes where status='core' ";
    $restlt=database::connect()->query($query);
    if($restlt->num_rows>0){

        return $restlt;

    }else{
        return false;
    }
}

    //select single  student By id with group
public function singleClass($id){

    $query="SELECT * FROM  classes WHERE id='$id'";
    $restlt=database::connect()->query($query);
    if($restlt->num_rows>0){

        return $restlt;

    }else{
        return false;
    }
}

public function updateClass($post,$class_id)
{
    $required=[
        $post['class_name'],
        $post['class_no']
    ];
    if (validation::required($required)){
        return validation::required($required);
    }

            // $school_id=$post['school_id'];
    $class_name=$post['class_name'];
    $class_no=$post['class_no'];

    $update_query="UPDATE classes SET Class_Name='$class_name', Class_no='$class_no' WHERE id='$class_id'";
    $result=database::connect()->query($update_query);
    if($result){
        $msg="<p class='alert alert-success'><strong>Success ! </strong>Your Class update successful.</p>";
        return $msg;
    }else{
        $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your Class update failed.</p>";
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