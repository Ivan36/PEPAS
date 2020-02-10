<?php
class School{

    public function create($post){
        $required=[
            $post['school_name'],
            $post['school_no'],
            $post['category'],
            $post['boys'],
            $post['girls'],
            $post['parish'],
            $post['subcounty'],
            $post['district'],
            $post['county'],
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        $school_name=$post['school_name'];
        $school_no=$post['school_no'];
        $category=$post['category'];
        $boys=$post['boys'];
        $girls=$post['girls'];
        $parish=$post['parish'];
        $school_name=$post['school_name'];
        $county=$post['county'];
        $subcounty=$post['subcounty'];
        $district =$post['district'];
        //check subject code
        $query="SELECT sch_name FROM schools_tb WHERE sch_name='$school_name'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This school is already added try again.</p>";
            return $message;
        }
        //check subject name
        $query="SELECT sch_no FROM schools_tb WHERE sch_no='$school_no'";
        $result=database::connect()->query($query);
        if ($result->num_rows>0){
            $message="<p class='alert alert-danger'><strong>Error!</strong> This school number is already added under another school try again.</p>";
            return $message;
        }
        $total = intval($girls + $boys);
        $add_query = "INSERT INTO schools_tb(sch_name,sch_no,category,district,county,sub_county,parish,girls,boys,total)
        VALUES('$school_name','$school_no','$category','$district','$county','$subcounty','$parish','$girls','$boys','$total')";
        $add_result=database::connect()->query($add_query);
        if($add_result){
            $message="<p class='alert alert-success'><strong>Success!</strong> Your School add successful.</p>";
            return $message;
        }

    }

  //select student for manage student
    public function selectTotalSchool(){

        $query="SELECT * FROM  schools_tb where status='open' ";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }
    public function selectTotalSchoolForm(){

        $query="SELECT * FROM  schools_tb where managed='no' ";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    //select single  student By id with group
    public function singleSchool($id){

        $query="SELECT * FROM  schools_tb WHERE id='$id'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    public function singleSchoolName($school_name){

        $query="SELECT * FROM  schools_tb WHERE sch_name='$school_name'";
        $restlt=database::connect()->query($query);
        if($restlt->num_rows>0){

            return $restlt;

        }else{
            return false;
        }
    }

    public function updateSchool($post,$school_id)
    {
        $required=[
            $post['school_name'],
            $post['school_no'],
            $post['category'],
            $post['boys'],
            $post['girls'],
            $post['parish'],
            $post['subcounty'],
            $post['district'],
            $post['county'],
        ];
        if(validation::required($required)){
            return validation::required($required);
        }
        $school_name=$post['school_name'];
        $school_no=$post['school_no'];
        $category=$post['category'];
        $boys=$post['boys'];
        $girls=$post['girls'];
        $parish=$post['parish'];
        $school_name=$post['school_name'];
        $county=$post['county'];
        $subcounty=$post['subcounty'];
        $district =$post['district'];
        $total=intval($boys + $girls);
        $update_query="UPDATE schools_tb SET 
        sch_name='$school_name',
        sch_no='$school_no', 
        category='$category', 
        district='$district',
        county='$county' ,
        sub_county='$subcounty',
        parish='$parish',
        girls='$girls',
        boys='$boys',
        total='$total'
        WHERE id='$school_id'";
        $result=database::connect()->query($update_query);
        if($result){
            $msg="<p class='alert alert-success'><strong>Success ! </strong>Your School update successful.</p>";
            return $msg;
        }else{
            $msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School update failed.</p>";
            return $msg;
        }

    }

}
?>