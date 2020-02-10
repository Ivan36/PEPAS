<?php

class SchoolInfo{

    //add new result for a single subject

 public function addSchInfo($post){
  $required=[
    $post['school_name'],
    $post['teacher_name'],
        // $post['year'],
  ];
  if(validation::required($required)){
    return validation::required($required);
  }
  $school_name=$post['school_name'];
  $teacher_name=$post['teacher_name'];
  $multselectyr = !empty($_POST['year']) ? $_POST['year'] : array();
  $year = implode(',', $multselectyr);
        //check subject code
  $query="SELECT sch_name FROM schools_head WHERE sch_name='$school_name'";
  $result=database::connect()->query($query);
  if ($result->num_rows>0){
    $message="<p class='alert alert-danger'><strong>Error!</strong> This Schools information is already added try again.</p>";
    return $message;
  }
        //check subject name
  $query="SELECT hteacher_name FROM schools_head WHERE hteacher_name='$teacher_name'";
  $result=database::connect()->query($query);
  if ($result->num_rows>0){
    $message="<p class='alert alert-danger'><strong>Error!</strong> This Head Teacher is already added under another School try again.</p>";
    return $message;
  }

  $roll_query="SELECT DISTINCT id,teacher_name FROM total_hteachers WHERE teacher_name='$teacher_name' AND has_sch='no' AND type='hteacher' LIMIT 1";
  $roll_result= database::connect()->query($roll_query);
  if($roll_result->num_rows>0) {
    foreach ($roll_result as $value){
     $tname = $value['teacher_name'];
     $tid = $value['id'];

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
 
  $managed="yes";
$add_query = "INSERT INTO schools_head(sch_name,sch_no,hteacher_name,year,h_id)
VALUES('$school_name','$sid','$teacher_name','$year','$tid')";
$add_result=database::connect()->query($add_query);
if($add_result){
  $update_schtb = "UPDATE schools_tb set managed='$managed' where sch_name='$school_name' AND managed='no'";
  $updatesch_result=database::connect()->query($update_schtb);
  $update_hteachertb = "UPDATE total_hteachers set has_sch='$managed' where teacher_name='$tname' AND has_sch='no'";
  $updateht_result=database::connect()->query($update_hteachertb);
  if ($updatesch_result && $updateht_result) {
    $message="<p class='alert alert-success'><strong>Success!</strong> Your School's information added successful.</p>";
    return $message;
  }

  else{
   $message="<p class='alert alert-danger'><strong>Error!</strong> This Schools information is was not added try again.</p>";
   return $message; 
 }

}

}

  //select student for manage student
public function selectTotalSchoolInfo(){

  $query="SELECT * FROM  schools_head where status='open' ";
  $restlt=database::connect()->query($query);
  if($restlt->num_rows>0){

    return $restlt;

  }else{
    return false;
  }
}
public function selectTotalSchoolForm(){

  $query="SELECT * FROM  schools_head where graded='no' ";
  $restlt=database::connect()->query($query);
  if($restlt->num_rows>0){

    return $restlt;

  }else{
    return false;
  }
}
public function hTeacherTransfer(){

  $query="SELECT * FROM  schools_head WHERE status='open' ";
  $restlt=database::connect()->query($query);
  if($restlt->num_rows>0){

    return $restlt;

  }else{
    return false;
  }
}

    //select single  student By id with group
public function singleSchoolInfo($id){

  $query="SELECT * FROM  schools_head WHERE id='$id'";
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
    $post['teacher_name'],
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
public function transferHTeacher($post){
  $required=[
    $post['school_name'],
    $post['new_teacher_name'],
    $post['year'],
  ];
  if (validation::required($required)){
    return validation::required($required);
  }

  $school_name=$post['school_name'];
  $new_teacher_name=$post['new_teacher_name'];
  $year=$post['year'];

  $rolls_query="SELECT sch_name,sch_no,h_id,year FROM schools_head WHERE hteacher_name='$new_teacher_name' LIMIT 1";
  $rolls_result= database::connect()->query($rolls_query);
  if($rolls_result->num_rows>0) {
    foreach ($rolls_result as $value){
     $n_school_name = $value['sch_name'];
     $n_sch_no = $value['sch_no'];
     $n_h_id = $value['h_id'];
     $n_year = $value['year'];

   }
 }
 $roll_query="SELECT hteacher_name,sch_no,h_id,year FROM schools_head WHERE sch_name='$school_name' LIMIT 1";
 $roll_result= database::connect()->query($roll_query);
 if($roll_result->num_rows>0) {
  foreach ($roll_result as $value){
   $old_techer_name = $value['hteacher_name'];
   $old_sch_no = $value['sch_no'];
   $old_h_id = $value['h_id'];
   $old_year = $value['year'];

 }
}
$rol_query="SELECT DISTINCT id FROM total_hteachers WHERE teacher_name='$new_teacher_name' LIMIT 1";
$rol_result= database::connect()->query($rol_query);
if($rol_result->num_rows>0) {
  foreach ($rol_result as $value){
   $new_h_id = $value['id'];

 }
}
$query="SELECT DISTINCT school_name,old_teacher_name FROM hteacher_sch_transfers WHERE old_teacher_name='$old_techer_name' AND school_name='$school_name'";
$result=database::connect()->query($query);
if ($result->num_rows>0){
  $message="<p class='alert alert-danger'><strong>Error!</strong> This Head Teacher is already transfered to another School try again.</p>";
  return $message;
}
$managed='yes';
$add_query="INSERT INTO hteacher_sch_transfers(school_name,old_teacher_name,new_teacher_name,years_served,sch_no,old_h_id,new_h_id)
VALUES('$school_name','$old_techer_name','$new_teacher_name','$old_year','$old_sch_no','$old_h_id','$new_h_id')";
$add_result=database::connect()->query($add_query);
$add_newquery="INSERT INTO left_sch_records(school_name,teacher_name,sch_no,h_id,years_served)
VALUES('$n_school_name','$new_teacher_name','$n_sch_no','$new_h_id','$n_year')";
$add_newresult=database::connect()->query($add_newquery);
if($add_result && $add_newresult){
  $update_sch = "UPDATE schools_tb set managed='no' where sch_name='$n_school_name' AND sch_no='$n_sch_no'";
  $updatesch_result=database::connect()->query($update_sch);
  $delete_query="DELETE FROM schools_head WHERE sch_name='$n_school_name' AND hteacher_name='$new_teacher_name'";
  $delete_result=database::connect()->query($delete_query);
  $update_sch_hd = "UPDATE schools_head set hteacher_name='$new_teacher_name',year='$year',h_id='$new_h_id',graded='no' where sch_name='$school_name' AND hteacher_name='$old_techer_name'";
  $updatesch_result=database::connect()->query($update_sch_hd);
  $update_hteachertb = "UPDATE total_hteachers set has_sch='$managed' where teacher_name='$new_teacher_name' AND id='$new_h_id'";
  $updateht_result=database::connect()->query($update_hteachertb);
  $update_hteacher = "UPDATE total_hteachers set has_sch='no' where teacher_name='$old_techer_name' AND id='$old_h_id'";
  $updateht_result=database::connect()->query($update_hteacher);
  if ($updatesch_result && $updateht_result && $update_hteacher) {
    $message="<p class='alert alert-success'><strong>Success!</strong> Head Teacher Transfer successful.</p>";
    return $message;
  }

  else{
   $message="<p class='alert alert-danger'><strong>Error!</strong> Head Teacher Transfer failed try again.</p>";
   return $message; 
 }

}
else{
 $message="<p class='alert alert-danger'><strong>Error!</strong>Transfer failed try again.</p>";
 return $message; 
}

}

public function selectTotalReplaced(){

  $query="SELECT * FROM  hteacher_sch_transfers WHERE status='active' ";
  $restlt=database::connect()->query($query);
  if($restlt->num_rows>0){

    return $restlt;

  }else{
    return false;
  }
}
public function selectTransferHistory(){

  $query="SELECT * FROM  left_sch_records WHERE status='active' ";
  $restlt=database::connect()->query($query);
  if($restlt->num_rows>0){

    return $restlt;

  }else{
    return false;
  }
}


}
?>