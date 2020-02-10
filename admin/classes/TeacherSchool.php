<?php

class TeacherSchool{

    //add new result for a single subject

 public function addSchTeacher($post){
    $required=[
        $post['school_name'],
        $post['teacher_name'],
        $post['subject_name'],
        // $post['class_name'],
    ];
    if(validation::required($required)){
        return validation::required($required);
    }
    $school_name=$post['school_name'];
    $teacher_name=$post['teacher_name'];
    $class_name=$post['class_name'];
    $subject_name=$post['subject_name'];
    // $year=$post['year'];
            $multselectyr = !empty($_POST['year']) ? $_POST['year'] : array();
            $year = implode(',', $multselectyr);
        //check subject code

    $query="SELECT school_name,subject,teacher_name FROM schools_teacher WHERE school_name='$school_name' AND teacher_name='$teacher_name' AND class='$class_name' AND subject='$subject_name'";
    $result=database::connect()->query($query);
    if ($result->num_rows>0){
        $message="<p class='alert alert-danger'><strong>Error!</strong> This School's Teacher class and subject information is already added try again.</p>";
        return $message;
    }
        //check subject name
    // $query="SELECT teacher_name,subject FROM schools_teacher WHERE subject='$subject_name' AND teacher_name='$teacher_name'";
    // $result=database::connect()->query($query);
    // if ($result->num_rows>0){
    //     $message="<p class='alert alert-danger'><strong>Error!</strong> This Teacher is already added under another School try again.</p>";
    //     return $message;
    // }

    $roll_query="SELECT id,teacher_name FROM total_teachers WHERE teacher_name='$teacher_name'";
    $roll_result= database::connect()->query($roll_query);
    if($roll_result->num_rows>0) {
        foreach ($roll_result as $value){
           $tname = $value['teacher_name'];
           $tid = $value['id'];

       }
   }
   $query="SELECT Sub_Name,Sub_code FROM subjects WHERE Sub_Name='$subject_name'";
   $result=database::connect()->query($query);
   if ($result->num_rows>0){
     foreach ($result as $value){
       $subname = $value['Sub_Name'];
       $subid = $value['Sub_code'];

   }
}
$query="SELECT sch_name,sch_no FROM schools_tb WHERE sch_name='$school_name'";
$result=database::connect()->query($query);
if ($result->num_rows>0){
 foreach ($result as $value){
   $sname = $value['sch_name'];
   $sid = $value['sch_no'];

}
}


$add_query = "INSERT INTO schools_teacher(school_name,teacher_name,sch_no,teacher_roll,year,class,subject,subject_code)
VALUES('$school_name','$teacher_name','$sid','$tid','$year','$class_name','$subject_name','$subid')";
$add_result=database::connect()->query($add_query);
if($add_result){
    $message="<p class='alert alert-success'><strong>Success!</strong> The Teacher has been assigned school successfully.</p>";
    return $message;
}

}

  //select student for manage student
public function selectTotalSchTeacher(){

    $query="SELECT * FROM  schools_teacher where status='active' ";
    $restlt=database::connect()->query($query);
    if($restlt->num_rows>0){

        return $restlt;

    }else{
        return false;
    }
}
public function selectTotalTeacherForm(){

    $query="SELECT * FROM  schools_teacher where graded='no' ";
    $restlt=database::connect()->query($query);
    if($restlt->num_rows>0){

        return $restlt;

    }else{
        return false;
    }
}

    //select single  student By id with group
public function singleSchTeacher($id){

    $query="SELECT * FROM  schools_teacher WHERE id='$id'";
    $restlt=database::connect()->query($query);
    if($restlt->num_rows>0){

        return $restlt;

    }else{
        return false;
    }
}

public function updateSchoolInfo($post,$sch_id)
{
    $required=[
        $post['school_name'],
        $post['teacher_name']
    ];
    if (validation::required($required)){
        return validation::required($required);
    }

            // $school_id=$post['school_id'];
    $school_name=$post['school_name'];
    $teacher_name=$post['teacher_name'];
    $year=$post['year'];
    $hid=$post['hid'];
    $sch_no=$post['sch_no'];

    $update_query="UPDATE schools_head SET sch_name='$school_name', sch_no='$sch_no', hteacher_name='$teacher_name', year='$year', h_id='$hid' WHERE id='$sch_id'";
    $result=database::connect()->query($update_query);
    if($result){
        $msg="<p class='alert alert-success'><strong>Success ! </strong>Your School's iformation update successful.</p>";
        return $msg;
    }else{
        $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School's iformation update failed.</p>";
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