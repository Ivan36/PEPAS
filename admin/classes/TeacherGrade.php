<?php

class TeacherGrade{
	
	public function addGrade($post){

		$required=[
			$post['teacher_name'],
			$post['year'],
		];
		if(validation::required($required)){
			return validation::required($required);
		}
		$dec = 2;
		$teacher_name=$post['teacher_name'];
		$year=$post['year'];
		$g_one=$post['g_one'];
		$g_two=$post['g_two'];
		$g_three=$post['g_three'];
		$g_four=$post['g_four'];
		$g_u=$post['g_u'];
		$g_x=$post['g_x'];
		$date=$post['date'];
		$g_total= $g_one + $g_two + $g_three + $g_four + $g_u + $g_x;
		$p_one = round(( $g_one / $g_total ) * 100, $dec);
		$p_two = round(( $g_two / $g_total ) * 100, $dec);
		$p_three = round(( $g_three / $g_total ) * 100, $dec);
		$p_four = round(( $g_four / $g_total ) * 100, $dec);
		$p_u = round(( $g_u / $g_total ) * 100, $dec);
		$p_x = round(( $g_x / $g_total ) * 100, $dec);
		$p_total = ($p_one + $p_two + $p_three + $p_four + $p_u + $p_x);
		$p_act = (($p_one*100) + ($p_two*75) + ($p_three*50) + ($p_four*25)) / 100;
		if ($p_act==100) {
			$p_actual=99.990000;
		}else{
			$p_actual=$p_act;
		}
		$actual= round($p_actual, $dec);
		if ($p_u < 1) {

			if ($actual > 99) {
				$remarks ="Excellent";
				$div = "Grade one";
			}
			else if ($actual >=75 && $actual <=99) {
				$remarks ="Good";
				$div = "Grade two";
			}
			else if ($actual >=50 && $actual <=74) {
				$remarks ="Fair";
				$div = "Grade three";
			}
			else if ($actual >=25 && $actual <=49) {
				$remarks ="Poor";
				$div = "Grade four";
			}
			else{
				$remarks ="Failed";
				$div = "Ungraded";
			}
		}
		else{

			if ($actual > 99) {
				$remarks ="Excellent with Ungraded";
				$div = "Grade Two";
			}
			else if ($actual >=75 && $actual <=99) {
				$remarks ="Good with Ungraded";
				$div = "Grade three";
			}
			else if ($actual >=50 && $actual <=74) {
				$remarks ="Fair with Ungraded";
				$div = "Grade four";
			}
			else if ($actual >=25 && $actual <=49) {
				$remarks ="Poor with Ungraded";
				$div = "Ungraded";
			}
			else{
				$remarks ="Failed with Ungraded";
				$div = "Ungraded";
			}
		}
		// echo "nothing is wrong";        //check subject code
		$query="SELECT DISTINCT school_name,year,class,subject FROM schools_teacher WHERE teacher_name='$teacher_name' AND graded='no' LIMIT 1";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			foreach ($result as $value){
				// $year = $value['year'];
				$school_name = $value['school_name'];
				$class = $value['class'];
				$subject = $value['subject'];

			}
		}
		
		// $query="SELECT teacher_name FROM teacher_grades WHERE class='$class' AND subject='$subject'";
		// $result=database::connect()->query($query);
		// if ($result->num_rows>0){
		// 	$message="<p class='alert alert-danger'><strong>Error!</strong> This school's grades are already added try again.</p>";
		// 	return $message;
		// }
  //       //check subject name
		// $query="SELECT teacher_name FROM teacher_grades WHERE class='$class' AND subject='$subject'";
		// $result=database::connect()->query($query);
		// if ($result->num_rows>0){
		// 	$message="<p class='alert alert-danger'><strong>Error!</strong> This Head Teacher Grades are already added under another school try again.</p>";
		// 	return $message;
		// }
		$graded="yes";
		$add_query = "INSERT INTO teacher_grades(school_name,teacher_name,year,class,subject,g_1,g_2,g_3,g_4,g_u,g_x,p_1,p_2,p_3,p_4,p_u,p_x,g_total,p_total,p_actual,grade,remarks,report_date)
		VALUES('$school_name','$teacher_name','$year','$class','$subject','$g_one','$g_two','$g_three','$g_four','$g_u','$g_x','$p_one','$p_two','$p_three','$p_four','$p_u','$p_x','$g_total','$p_total','$actual','$div','$remarks','$date')";
		$add_result=database::connect()->query($add_query);
		if($add_result){
			$update_query="UPDATE schools_teacher SET graded='$graded' WHERE teacher_name='$teacher_name' AND class='$class' AND subject='$subject'";
			$result=database::connect()->query($update_query);
			if($result){
				$message="<p class='alert alert-success'><strong>Success!</strong> Your School Grades have been calculated successfully.</p>";
				return $message;
			}else{
				$msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School Grades calculation added but the schools table was not updated.</p>";
				return $msg;
			}
		// $message="<p class='alert alert-success'><strong>Success!</strong> Your School Grades have been calculated successfully.</p>";
		// return $message;
		}

	}

  //select student for manage student
	public function selectTotalTeacherGrades(){

		$query="SELECT * FROM  teacher_grades where status='active' ORDER By p_actual DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

    //select single  student By id with group
	public function singleTeacherGrade($id){

		$query="SELECT * FROM  teacher_grades WHERE id='$id'";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

	public function selectTeacherGradesRank($post){
		$get_year = date("Y");
		$previous = $get_year -1;
		$teacher_name = $post['teacher_name'];
		if ($teacher_name!='') {
			$query="SELECT * FROM  teacher_grades where teacher_name='$teacher_name' AND year='$previous' ORDER By p_actual DESC  ";
			$restlt=database::connect()->query($query);
			if($restlt->num_rows>0){

				return $restlt;

			}else{
				return false;
			}
		}

		else{
			$query="SELECT * FROM  teacher_grades year='$previous' ORDER By p_actual DESC  ";
			$restlt=database::connect()->query($query);
			if($restlt->num_rows>0){

				return $restlt;

			}else{
				return false;
			}
		}


	}
	public function selectTotalSchoolGradesFilter($post){
		$get_year = date("Y");
		$filteryear = $post['filteryear'];
		if ($filteryear!='') {
			$previous = $filteryear;
		}

		else{
			$previous = $get_year -1;
		}
		$query="SELECT * FROM  teacher_grades where status='active' AND year='$previous' ";
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
			$post['school_no']
		];
		if (validation::required($required)){
			return validation::required($required);
		}

            // $school_id=$post['school_id'];
		$school_name=$post['school_name'];
		$school_no=$post['school_no'];

		$update_query="UPDATE schools_tb SET sch_name='$school_name', sch_no='$school_no' WHERE id='$school_id'";
		$result=database::connect()->query($update_query);
		if($result){
			$msg="<p class='alert alert-success'><strong>Success ! </strong>Your School update successful.</p>";
			return $msg;
		}else{
			$msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School update failed.</p>";
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

	public function updateGrades($post,$grade_id){
		$required=[
			$post['school_name'],
			$post['year'],
			$post['teacher_name'],
			
		];
		if(validation::required($required)){
			return validation::required($required);
		}
		$dec = 2;
		$school_name=$post['school_name'];
		$teacher_name=$post['teacher_name'];
		$year = $post['year'];
		$g_one=$post['g_one'];
		$g_two=$post['g_two'];
		$g_three=$post['g_three'];
		$g_four=$post['g_four'];
		$g_u=$post['g_u'];
		$g_x=$post['g_x'];
		$date=$post['date'];
		$g_total= $g_one + $g_two + $g_three + $g_four + $g_u + $g_x;
		$p_one = round(( $g_one / $g_total ) * 100, $dec);
		$p_two = round(( $g_two / $g_total ) * 100, $dec);
		$p_three = round(( $g_three / $g_total ) * 100, $dec);
		$p_four = round(( $g_four / $g_total ) * 100, $dec);
		$p_u = round(( $g_u / $g_total ) * 100, $dec);
		$p_x = round(( $g_x / $g_total ) * 100, $dec);
		$p_total = ($p_one + $p_two + $p_three + $p_four + $p_u + $p_x);
		$p_act = (($p_one*100) + ($p_two*75) + ($p_three*50) + ($p_four*25)) / 100;
		if ($p_act==100) {
			$p_actual=99.990000;
		}else{
			$p_actual=$p_act;
		}

		$actual= round($p_actual, $dec);
		if ($p_u < 1) {
			
			if ($actual > 99) {
				$remarks ="Excellent";
				$div = "Grade one";
			}
			else if ($actual >=75 && $actual <=99) {
				$remarks ="Good";
				$div = "Grade two";
			}
			else if ($actual >=50 && $actual <=74) {
				$remarks ="Fair";
				$div = "Grade three";
			}
			else if ($actual >=25 && $actual <=49) {
				$remarks ="Poor";
				$div = "Grade four";
			}
			else{
				$remarks ="Failed";
				$div = "Ungraded";
			}
		}
		else{

			if ($actual > 99) {
				$remarks ="Excellent with Ungraded";
				$div = "Grade Two";
			}
			else if ($actual >=75 && $actual <=99) {
				$remarks ="Good with Ungraded";
				$div = "Grade three";
			}
			else if ($actual >=50 && $actual <=74) {
				$remarks ="Fair with Ungraded";
				$div = "Grade four";
			}
			else if ($actual >=25 && $actual <=49) {
				$remarks ="Poor with Ungraded";
				$div = "Ungraded";
			}
			else{
				$remarks ="Failed with Ungraded";
				$div = "Ungraded";
			}
		}

		$query="UPDATE teacher_grades SET
		teacher_name='$teacher_name',
		school_name='$school_name',
		year='$year',
		g_1='$g_one',
		g_2='$g_two',
		g_3='$g_three',
		g_4='$g_four',
		g_u='$g_u',
		g_x='$g_x',
		p_1='$p_one',
		p_2='$p_two',
		p_3='$p_three',
		p_4='$p_four',
		p_u='$p_u',
		p_x='$p_x',
		g_total='$g_total',
		p_total='$p_total',
		p_actual='$actual',
		grade='$div',
		remarks='$remarks',
		report_date='$date'
		WHERE id='$grade_id'";
		$result=database::connect()->query($query);
		if($result){
			$msg="<p class='alert alert-success'><strong>Success ! </strong>Grades updated successful.</p>";
			return $msg;
		}else{
			$msg="<p class='alert alert-danger'><strong>Error ! </strong>Grades update failed.</p>";
			return $msg;
		}

	}


}

?>