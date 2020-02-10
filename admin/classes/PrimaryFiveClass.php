<?php

class PrimaryFiveClass
{

	public function addStudents($post)
	{

		$required = [
			$post['school_name'],
			$post['school_no'],
			$post['student_name'],
			$post['year'],
			$post['district'],
			$post['home_address'],
			$post['birth_date'],
			$post['gender'],
			$post['school_no'],

		];
		if (validation::required($required)) {
			return validation::required($required);
		}

		$school_name = $post['school_name'];
		$sch_no = $post['school_no'];
		$student_name = $post['student_name'];
		$home_address = $post['home_address'];
		$district = $post['district'];
		$birth_date = $post['birth_date'];
		$gender = $post['gender'];
		$year = $post['year'];

		$select_std = "SELECT id,school_name,student_name,class FROM primary_five WHERE school_name='$school_name' AND student_name='$student_name'";
		$result = database::connect()->query($select_std);
		if ($result->num_rows > 0) {
			$message = "<p class='alert alert-danger'><strong>Error!</strong> This Student is already added.</p>";
			return $message;
		}

		$roll_query = "SELECT * FROM primary_five";
		$roll_result = database::connect()->query($roll_query);
		if ($roll_result->num_rows <= 0) {
			$id = 50201;
			$query = "INSERT INTO primary_five(id,student_name,school_name,std_no,sch_no,date_of_birth,home_address,district,gender,year)
			VALUES('$id','$student_name','$school_name','$id','$sch_no','$birth_date','$home_address','$district','$gender','$year')";
		} else {
			$id_select = "SELECT MAX(id) AS Max_Id from primary_five";
			$result = database::connect()->query($id_select);
			if ($result->num_rows > 0) {
				foreach ($result as $value) {
					$std_id = $value['Max_Id'];
					$std_no = intval($std_id + 1);
				}
			}
			$query = "INSERT INTO primary_five(student_name,school_name,std_no,sch_no,date_of_birth,home_address,district,gender,year)
			VALUES('$student_name','$school_name','$std_no','$sch_no','$birth_date','$home_address','$district','$gender','$year')";
		}
		$result = database::connect()->query($query);
		if ($result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student registration successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student registration failed.</p>";
			return $msg;
		}
	}

	public function selectTotalStudent()
	{

		$std_query = "SELECT * FROM primary_five WHERE status='active' ORDER BY school_name asc";
		$result = database::connect()->query($std_query);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function selectSingleStudent($student_id)
	{

		$std_query = "SELECT * FROM primary_five WHERE id='$student_id'";
		$result = database::connect()->query($std_query);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function updateStudent($post, $student_id)
	{
		$required = [
			$post['school_name'],
			$post['school_no'],
			$post['student_name'],
			$post['year'],
			$post['district'],
			$post['home_address'],
			$post['birth_date'],
			$post['gender'],

		];
		if (validation::required($required)) {
			return validation::required($required);
		}

		$school_name = $post['school_name'];
		$student_name = $post['student_name'];
		$home_address = $post['home_address'];
		$district = $post['district'];
		$birth_date = $post['birth_date'];
		$gender = $post['gender'];
		$year = $post['year'];

		$update_query = "UPDATE primary_five SET 
		student_name='$student_name', 
		date_of_birth='$birth_date', 
		home_address='$home_address',
		district='$district',
		gender='$gender',
		year='$year' 
		WHERE id='$student_id'";
		$result = database::connect()->query($update_query);
		if ($result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student Information update successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student Information update failed.</p>";
			return $msg;
		}
	}

	public function selectStudentForm($school_name)
	{
		$std_query = "SELECT student_name,std_no FROM primary_five WHERE school_name='$school_name'";
		$result = database::connect()->query($std_query);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function selectStudentResult()
	{

		$rslt_query = "SELECT * FROM primary_five_results WHERE status='active'";
		$result = database::connect()->query($rslt_query);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function selectSingleResult($student_no)
	{

		$query = "SELECT * FROM primary_five_results WHERE std_no='$student_no'";
		$result = database::connect()->query($query);
		if ($result->num_rows > 0) {
			return $result;
		} else {
			return false;
		}
	}

	public function filterResults($post)
	{
		$get_year = date("Y");
		$filteryear = $post['filteryear'];
		$school_name = $post['school_name'];
		if ($filteryear != '') {
			$previous = $filteryear;
		} else {
			$previous = $get_year;
		}
		$query = "SELECT * FROM  primary_five_results WHERE school_name='$school_name' AND year='$previous' ORDER By aggregates ASC";
		$restlt = database::connect()->query($query);
		if ($restlt->num_rows > 0) {
			return $restlt;
		} else {
			return false;
		}
	}
	public function filterStudents($post)
	{
		$get_year = date("Y");
		// $filteryear = $post['filteryear'];
		$school_name = $post['school_name'];

		$previous = $get_year - 1;
		$query = "SELECT * FROM  primary_five where school_name='$school_name' ORDER By id ASC";
		$restlt = database::connect()->query($query);
		if ($restlt->num_rows > 0) {
			return $restlt;
		} else {
			return false;
		}
	}
}
