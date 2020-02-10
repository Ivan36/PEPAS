<?php
/**
 *helper Class
 **/
class helper{

    //method for image upload
    public static function imageUpload($file)
    {
        
        $permission = array("jpg", "jpeg", "png", "zip", "rar");
        $imageName = $file['image']['name'];
        //$imageSize = $file['image']['size'];
        $imagePath = $file['image']['tmp_name'];
        $div_name = explode('.', "$imageName");
        $ext = strtolower(end($div_name));

        $unique_name = substr(md5(time()), 0, 30) . '.' . $ext;
        if (in_array($ext, $permission) === false) {
            $msg = "<p class='alert alert-danger'><strong>Error! </strong>Only :-" . implode(', ', $permission) . " file uploaded.</p>";
            return $msg;
        } else {

            $upload = 'upload/' . $unique_name;
            move_uploaded_file($imagePath, $upload);

            return $unique_name;
        }

    }

    public static function delete($table,$id)
    {
        $query="DELETE  FROM  $table WHERE  id='$id'";
        $restlt=database::connect()->query($query);
        if($restlt){

            if($table=='class_six_students' ||$table=='class_seven_students' ||$table=='class_eight_students' ||$table=='class_nine_students' ||$table=='class_ten_students' ||$table=='admission_students'){

                //delete image when update data
                $img_query="SELECT image FROM $table WHERE id='$id'";
                $img_result=database::connect()->query($img_query);
                if($img_result->num_rows>0){
                    $img_result=$img_result->fetch_assoc();
                    unlink($img_result['image']);
                }
            }


            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your data delete successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your data not delete.</p>";
            return $msg;
        }

    }

    public function shiftstudents($table1,$table2)
    {
        $roll_query="SELECT * FROM $table1";
        $roll_result= database::connect()->query($roll_query);
        if($roll_result->num_rows<=0){
            $p_query = "INSERT INTO $table1 SELECT * FROM $table2";
            $result = database::connect()->query($p_query);
            $class_query="SELECT class FROM $table2 ";
            $class_result=database::connect()->query($class_query);
            $year = date("Y");
            if ($class_result->num_rows>0){
                foreach ($class_result as $value){
                    $class_name = $value['class'];
                }
            }
            if ($class_name=='P7') {
                $class='finished';
            }elseif ($class_name=='P6') {
                $class='P7';
            }
            elseif ($class_name=='P5') {
                $class='P6';
            }else{
              $class='P5'; 
          }
          $update_query = "UPDATE $table1 SET class = '$class', year = '$year' WHERE class!='$class'";
          $update_result = database::connect()->query($update_query);
          $del_query = "TRUNCATE TABLE $table2";
          $del_result = database::connect()->query($del_query);
          if ($result && $del_result && $update_result) {
            $msg = "<p class='alert alert-success'><strong>Success ! </strong>Student Shifted successfully.</p>";
            return $msg;
        } else {
            $msg = "<p class='alert alert-danger'><strong>Error ! </strong>Students Shifting failed.</p>";
            return $msg;
        }
    }else{
        $msg = "<p class='alert alert-danger'><strong>Error ! </strong>Sorry the Table still has students of former class please make sure all students are sifted first</p>";
        return $msg; 
    }
}

public function shiftp7students($table1,$table2)
    {
            $p_query = "INSERT INTO $table1 SELECT * FROM $table2";
            $result = database::connect()->query($p_query);
            $class_query="SELECT class FROM $table2 ";
            $class_result=database::connect()->query($class_query);
            $year = date("Y");
            if ($class_result->num_rows>0){
                foreach ($class_result as $value){
                    $class_name = $value['class'];
                }
            }
            if ($class_name=='P7') {
                $class='finished';
            }elseif ($class_name=='P6') {
                $class='P7';
            }
            elseif ($class_name=='P5') {
                $class='P6';
            }else{
              $class='P5'; 
          }
          $update_query = "UPDATE $table1 SET class = '$class', year = '$year' WHERE class!='$class'";
          $update_result = database::connect()->query($update_query);
          $del_query = "TRUNCATE TABLE $table2";
          $del_result = database::connect()->query($del_query);
          if ($result && $del_result && $update_result) {
            $msg = "<p class='alert alert-success'><strong>Success ! </strong>Student Shifted as Finished successfully.</p>";
            return $msg;
        } else {
            $msg = "<p class='alert alert-danger'><strong>Error ! </strong>Students Shifting failed.</p>";
            return $msg;
        }
}

}