<?php

class HTeacherGrade{
	
	public function addGrades($post){

		$required=[
			$post['school_name'],
			$post['year'],
			
		];
		if(validation::required($required)){
			return validation::required($required);
		}
		$dec = 2;
		$school_name=$post['school_name'];
		$year = $post['year'];
		$g_one=$post['g_one'];
		$g_two=$post['g_two'];
		$g_three=$post['g_three'];
		$g_four=$post['g_four'];
		$g_u=$post['g_u'];
		$g_x=$post['g_x'];
		if ($g_one=='0' && $g_two=='0' && $g_three=='0' && $g_four=='0' && $g_u=='0' && $g_x=='0') {
			$message="<p class='alert alert-danger'><strong>Error!</strong> All values cannot be Zero (0) try again.</p>";
			return $message;
		}
		$date=$post['date'];
		$g_total= $g_one + $g_two + $g_three + $g_four + $g_u;
		$grand_total= $g_one + $g_two + $g_three + $g_four + $g_u + $g_x;
		$p_one = round(( $g_one / $g_total ) * 100, $dec);
		$p_two = round(( $g_two / $g_total ) * 100, $dec);
		$p_three = round(( $g_three / $g_total ) * 100, $dec);
		$p_four = round(( $g_four / $g_total ) * 100, $dec);
		$p_u = round(( $g_u / $g_total ) * 100, $dec);
		$p_x = round(( $g_x / $g_total ) * 100, $dec);
		$p_total = ($p_one + $p_two + $p_three + $p_four + $p_u);
		$percent_total = ($p_one + $p_two + $p_three + $p_four + $p_u + $p_x);
		$p_actual = (($p_one*100) + ($p_two*75) + ($p_three*50) + ($p_four*25)) / 100;
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair";
				$div = "Grade three";
			}
			else if ($actual >=34 && $actual <=49.99) {
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair with Ungraded";
				$div = "Grade four";
			}
			else if ($actual >=34 && $actual <=49.99) {
				$remarks ="Poor with Ungraded";
				$div = "Ungraded";
			}
			else{
				$remarks ="Failed with Ungraded";
				$div = "Ungraded";
			}
		}
        //check subject code
		$query="SELECT hteacher_name,year FROM schools_head WHERE sch_name='$school_name'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			foreach ($result as $value){
				$teacher_name = $value['hteacher_name'];

			}
		}
		$query="SELECT category,sub_county FROM schools_tb WHERE sch_name='$school_name'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			foreach ($result as $value){
				$subcounty = $value['sub_county'];
				$sch_category = $value['category'];

			}
		}

		$query="SELECT school_name FROM hteacher_grades WHERE school_name='$school_name' AND year='$year'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			$message="<p class='alert alert-danger'><strong>Error!</strong> This school's grades are already added try again.</p>";
			return $message;
		}
        //check subject name
		$query="SELECT teacher_name FROM hteacher_grades WHERE teacher_name='$teacher_name' AND year='$year'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			$message="<p class='alert alert-danger'><strong>Error!</strong> This Head Teacher Grades are already added under another school try again.</p>";
			return $message;
		}
		$cur_year=date('Y');
		if ($year==$cur_year) {
			$graded="yes";
		}else{
			$graded="no";
		}
		
		$add_query = "INSERT INTO hteacher_grades(teacher_name,school_name,sub_county,year,g_1,g_2,g_3,g_4,g_u,g_x,p_1,p_2,p_3,p_4,p_u,p_x,g_total,pat_total,p_total,p_actual,grade,remarks,report_date,sch_category)
		VALUES('$teacher_name','$school_name','$subcounty','$year','$g_one','$g_two','$g_three','$g_four','$g_u','$g_x','$p_one','$p_two','$p_three','$p_four','$p_u','$p_x','$grand_total','$g_total','$percent_total','$actual','$div','$remarks','$date','$sch_category')";
		$add_result=database::connect()->query($add_query);
		$select_subcnty="SELECT * FROM sub_county_results WHERE sub_county='$subcounty' AND year='$year' ";
		$result_subcnty=database::connect()->query($select_subcnty);
		if ($result_subcnty->num_rows>0) {
			foreach ($result_subcnty as $value){
				$sub_id = $value['id'];
				$subcnty = $value['sub_county'];
				$div_1 = $value['div_1'];
				$div_2 = $value['div_2'];
				$div_3 = $value['div_3'];
				$div_4 = $value['div_4'];
				$div_u = $value['div_u'];
				$div_x = $value['div_x'];
				$total = $value['total'];
				$pat_total = $value['pat_total'];	
				$s_total = intval($pat_total + $g_total);
				$s1_total = intval($total + $grand_total);
				$p_div_1 = $value['p_div_1'];
			}
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($pat_total + $g_total);
			$s1_total = intval($total + $grand_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$update_query="UPDATE sub_county_results SET
			div_1='$s_div_1',
			div_2='$s_div_2',
			div_3='$s_div_3',
			div_4='$s_div_4',
			div_u='$s_div_u',
			div_x='$s_div_x',
			total='$s1_total',
			p_div_1='$s_p_div_1',
			pat_total='$s_total'
			WHERE sub_county='$subcnty' AND year='$year' AND id='$sub_id'"; 
			$update_result=database::connect()->query($update_query);
		}
		else{
			$sub_county = $subcounty;
			$div_1 = 0;
			$div_2 = 0;
			$div_3 = 0;
			$div_4 = 0;
			$div_u = 0;
			$div_x = 0;
			$total = 0;
			$pat_total = 0;
			$p_div_1 = 0;
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($pat_total + $g_total);
			$s1_total = intval($total + $grand_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$sub_add_query="INSERT INTO sub_county_results(sub_county,div_1,div_2,div_3,div_4,div_u,div_x,total,p_div_1,year,pat_total) VALUES('$sub_county','$s_div_1','$s_div_2','$s_div_3','$s_div_4','$s_div_u','$s_div_x','$s1_total','$s_p_div_1','$year','$s_total') ";
			$sub_add_result=database::connect()->query($sub_add_query);
		}
		

		if($add_result){
			$update_query="UPDATE schools_head SET graded='$graded' WHERE sch_name='$school_name' AND hteacher_name='$teacher_name'";
			$result=database::connect()->query($update_query);
			if($result){
				$message="<p class='alert alert-success'><strong>Success!</strong> Your School Grades have been calculated successfully.</p>";
				return $message;
			}else{
				$msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School Grades calculation added but the schools table was not updated.</p>";
				return $msg;
			}

		}

		else{
			$msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School Grades calculation added but the schools table was not added to database.</p>";
			return $msg;
		}

	}

	public function selectSchoolGradesRank($post){
		$get_year = date("Y");
		$filteryear = $post['filteryear'];
		if ($filteryear!='') {
			$previous = $filteryear;
		}

		else{
			$previous = $get_year -1;
		}
		$query="SELECT * FROM  hteacher_grades where status='active' AND year='$previous' ORDER By p_actual DESC  ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}

	}
	public function selectMockResultRank($post){
		$get_year = date("Y");
		$filteryear = $post['filteryear'];
		if ($filteryear!='') {
			$previous = $filteryear;
		}

		else{
			$previous = $get_year;
		}
		$query="SELECT * FROM  sch_mock_results WHERE status='active' AND year='$previous' ORDER By p_actual DESC  ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
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
		$query="SELECT * FROM  hteacher_grades where status='active' AND year='$previous' ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

	public function selectMockResultsFilter($post){
		$get_year = date("Y");
		$filteryear = $post['filteryear'];
		if ($filteryear!='') {
			$previous = $filteryear;
		}

		else{
			$previous = $get_year;
		}
		$query="SELECT * FROM  sch_mock_results where  year='$previous' ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

	public function selectSubCountyResultsFilter($post){
		$get_year = date("Y");
		$filteryear = $post['filteryear'];
		if ($filteryear!='') {
			$previous = $filteryear;
		}

		else{
			$previous = $get_year -1;
		}
		$query="SELECT * FROM  sub_county_results WHERE year='$previous' ORDER BY p_div_1 DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

	public function subCountyMockResultsFilter($post){
		$get_year = date("Y");
		$filteryear = $post['filteryear'];
		if ($filteryear!='') {
			$previous = $filteryear;
		}

		else{
			$previous = $get_year;
		}
		$query="SELECT * FROM  sub_county_mock_results WHERE year='$previous' ORDER BY p_div_1 DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

  //select student for manage student
	public function selectTotalSchoolGrades(){
		$get_year = date("Y");
		$previousyear = $get_year - 1;
		$query="SELECT * FROM  hteacher_grades where status='active' AND year='$previousyear' ORDER By p_actual DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalBestGrades(){
		$get_year = date("Y");
		$previousyear = $get_year - 1;
		$query="SELECT * FROM  hteacher_grades where year='$previousyear'";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

	public function selectSchoolMockGrades(){
		$get_year = date("Y");
		$previousyear = $get_year;
		$query="SELECT * FROM  sch_mock_results where status='active' AND year='$previousyear' ORDER By p_actual DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalMockResults(){
		$get_year = date("Y");
		$previousyear = $get_year -1;
		$query="SELECT * FROM  sch_mock_results where status='active' ORDER By p_actual DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}


	public function selectSubCountyResults(){
		$get_year = date("Y");
		$previousyear = $get_year -1;
		$query="SELECT * FROM  sub_county_results WHERE year='$previousyear' ORDER BY p_div_1 DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectSubCountyMockResults(){
		$get_year = date("Y");
		$previousyear = $get_year;
		$query="SELECT * FROM  sub_county_mock_results WHERE year='$previousyear' ORDER BY p_div_1 DESC ";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
    //select single  student By id with group
	public function singleSchoolGrade($id){

		$query="SELECT * FROM  hteacher_grades WHERE id='$id'";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function singleSchoolMockResult($id){

		$query="SELECT * FROM  sch_mock_results WHERE id='$id'";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectSchoolMockResult(){
		$current = date("Y");
		$query="SELECT * FROM  sch_mock_results WHERE year='$current' ORDER BY p_actual DESC";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
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
		if ($g_one=='0' && $g_two=='0' && $g_three=='0' && $g_four=='0' && $g_u=='0' && $g_x=='0') {
			$message="<p class='alert alert-danger'><strong>Error!</strong> All values cannot be Zero (0) try again.</p>";
			return $message;
		}
		$date=$post['date'];
		$g_total= $g_one + $g_two + $g_three + $g_four + $g_u;
		$grand_total= $g_one + $g_two + $g_three + $g_four + $g_u + $g_x;
		$p_one = round(( $g_one / $g_total ) * 100, $dec);
		$p_two = round(( $g_two / $g_total ) * 100, $dec);
		$p_three = round(( $g_three / $g_total ) * 100, $dec);
		$p_four = round(( $g_four / $g_total ) * 100, $dec);
		$p_u = round(( $g_u / $g_total ) * 100, $dec);
		$p_x = round(( $g_x / $g_total ) * 100, $dec);
		$p_total = ($p_one + $p_two + $p_three + $p_four + $p_u);
		$percent_total = ($p_one + $p_two + $p_three + $p_four + $p_u + $p_x);
		$p_actual = (($p_one*100) + ($p_two*75) + ($p_three*50) + ($p_four*25)) / 100;
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair";
				$div = "Grade three";
			}
			else if ($actual >=34 && $actual <=49.99) {
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair with Ungraded";
				$div = "Grade four";
			}
			else if ($actual >=34 && $actual <=49.99) {
				$remarks ="Poor with Ungraded";
				$div = "Ungraded";
			}
			else{
				$remarks ="Failed with Ungraded";
				$div = "Ungraded";
			}
		}

		$query="SELECT sub_county FROM schools_tb WHERE sch_name='$school_name'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			foreach ($result as $value){
				$subcounty = $value['sub_county'];

			}
		}

		$get_result="SELECT * FROM hteacher_grades WHERE id='$grade_id'";
		$result_get=database::connect()->query($get_result);
		if ($result_get->num_rows>0) {
			foreach ($result_get as $value) {
				$dv_1=$value['g_1'];
				$dv_2=$value['g_2'];
				$dv_3=$value['g_3'];
				$dv_4=$value['g_4'];
				$dv_u=$value['g_u'];
				$dv_x=$value['g_x'];
				$dv1_total=$value['g_total'];
				$dv_total=$value['pat_total'];
			}
		}
		$select_subnty="SELECT * FROM sub_county_results WHERE sub_county='$subcounty' AND year='$year' ";
		$result_subcty=database::connect()->query($select_subnty);
		if ($result_subcty->num_rows>0) {
			foreach ($result_subcty as $value){
				$sub_id = $value['id'];
				$sub_county = $value['sub_county'];
				$sdiv_1 = $value['div_1'];
				$sdiv_2 = $value['div_2'];
				$sdiv_3 = $value['div_3'];
				$sdiv_4 = $value['div_4'];
				$sdiv_u = $value['div_u'];
				$sdiv_x = $value['div_x'];
				$stotal = $value['pat_total'];
				$stotal1 = $value['total'];
				$sp_div_1 = $value['p_div_1'];
			}
			$sb_div_1 = intval($sdiv_1 - $dv_1);
			$sb_div_2 = intval($sdiv_2 - $dv_2);
			$sb_div_3 = intval($sdiv_3 - $dv_3);
			$sb_div_4 = intval($sdiv_4 - $dv_4);
			$sb_div_u = intval($sdiv_u - $dv_u);
			$sb_div_x = intval($sdiv_x - $dv_x);
			$sb_total = intval($stotal - $dv_total);
			$sb1_total = intval($stotal1 - $dv1_total);
			$sb_p_div_1 = round(( $sb_div_1 / $sb_total ) * 100, $dec);
			$update_query="UPDATE sub_county_results SET
			div_1='$sb_div_1',
			div_2='$sb_div_2',
			div_3='$sb_div_3',
			div_4='$sb_div_4',
			div_u='$sb_div_u',
			div_x='$sb_div_x',
			total='$sb1_total',
			p_div_1='$sb_p_div_1',
			pat_total='$sb_total'
			WHERE sub_county='$subcounty' AND year='$year' AND id='$sub_id'"; 
			$update_result=database::connect()->query($update_query);
		}

		$query="UPDATE  hteacher_grades SET
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
		g_total='$grand_total',
		pat_total='$g_total',
		p_total='$p_total',
		p_actual='$actual',
		grade='$div',
		remarks='$remarks',
		report_date='$date'
		WHERE id='$grade_id'";
		$result=database::connect()->query($query);
		$select_subcnty="SELECT * FROM sub_county_results WHERE sub_county='$subcounty' AND year='$year' ";
		$result_subcnty=database::connect()->query($select_subcnty);
		if ($result_subcnty->num_rows>0) {
			foreach ($result_subcnty as $value){
				$sub_id = $value['id'];
				$sub_county = $value['sub_county'];
				$div_1 = $value['div_1'];
				$div_2 = $value['div_2'];
				$div_3 = $value['div_3'];
				$div_4 = $value['div_4'];
				$div_u = $value['div_u'];
				$div_x = $value['div_x'];
				$total = $value['total'];
				$pat_total = $value['pat_total'];	
				$s_total = intval($pat_total + $g_total);
				$s1_total = intval($total + $grand_total);
				$p_div_1 = $value['p_div_1'];
			}
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($pat_total + $g_total);
			$s1_total = intval($total + $grand_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$update_query="UPDATE sub_county_results SET
			div_1='$s_div_1',
			div_2='$s_div_2',
			div_3='$s_div_3',
			div_4='$s_div_4',
			div_u='$s_div_u',
			div_x='$s_div_x',
			total='$s1_total',
			p_div_1='$s_p_div_1'
			pat_total='$s_total',
			WHERE sub_county='$subcounty' AND year='$year' AND id='$sub_id'"; 
			$update_result=database::connect()->query($update_query);
		}
		else{
			$sub_county = $subcounty;
			$div_1 = 0;
			$div_2 = 0;
			$div_3 = 0;
			$div_4 = 0;
			$div_u = 0;
			$div_x = 0;
			$total = 0;
			$p_div_1 = 0;
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($pat_total + $g_total);
			$s1_total = intval($total + $grand_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$sub_add_query="INSERT INTO sub_county_results(sub_county,div_1,div_2,div_3,div_4,div_u,div_x,total,p_div_1,year,pat_total) VALUES('$sub_county','$s_div_1','$s_div_2','$s_div_3','$s_div_4','$s_div_u','$s_div_x','$s1_total','$s_p_div_1','$year','$s_total') ";
			$sub_add_result=database::connect()->query($sub_add_query);
		}
		if($result){
			$msg="<p class='alert alert-success'><strong>Success ! </strong>Grades updated successful.</p>";
			return $msg;
		}else{
			$msg="<p class='alert alert-danger'><strong>Error ! </strong>Grades update failed.</p>";
			return $msg;
		}

	}

	public function addMockResults($post){

		$required=[
			$post['school_name'],
			$post['year'],
			
		];
		if(validation::required($required)){
			return validation::required($required);
		}
		$dec = 2;
		$school_name=$post['school_name'];
		$year = $post['year'];
		$g_one=$post['g_one'];
		$g_two=$post['g_two'];
		$g_three=$post['g_three'];
		$g_four=$post['g_four'];
		$g_u=$post['g_u'];
		$g_x=$post['g_x'];
		if ($g_one=='0' && $g_two=='0' && $g_three=='0' && $g_four=='0' && $g_u=='0' && $g_x=='0') {
			$message="<p class='alert alert-danger'><strong>Error!</strong> All values cannot be Zero (0) try again.</p>";
			return $message;
		}
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair";
				$div = "Grade three";
			}
			else if ($actual >=34 && $actual <=49.99) {
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair with Ungraded";
				$div = "Grade four";
			}
			else if ($actual >=34 && $actual <=49.99) {
				$remarks ="Poor with Ungraded";
				$div = "Ungraded";
			}
			else{
				$remarks ="Failed with Ungraded";
				$div = "Ungraded";
			}
		}
		
        //check subject code
		$query="SELECT hteacher_name,year FROM schools_head WHERE sch_name='$school_name'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			foreach ($result as $value){
				$teacher_name = $value['hteacher_name'];

			}
		}
		$query="SELECT sub_county FROM schools_tb WHERE sch_name='$school_name'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			foreach ($result as $value){
				$subcounty = $value['sub_county'];

			}
		}

		$query="SELECT school_name FROM sch_mock_results WHERE school_name='$school_name' AND year='$year'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			$message="<p class='alert alert-danger'><strong>Error!</strong> This school's grades are already added try again.</p>";
			return $message;
		}
        //check subject name
		$query="SELECT teacher_name FROM sch_mock_results WHERE teacher_name='$teacher_name' AND year='$year'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			$message="<p class='alert alert-danger'><strong>Error!</strong> This Head Teacher Grades are already added under another school try again.</p>";
			return $message;
		}
		$cur_year=date('Y');
		if ($year==$cur_year) {
			$graded="no";
		}else{
			$graded="no";
		}
		$add_query = "INSERT INTO sch_mock_results(teacher_name,school_name,sub_county,year,g_1,g_2,g_3,g_4,g_u,g_x,p_1,p_2,p_3,p_4,p_u,p_x,g_total,p_total,p_actual,grade,remarks,report_date)
		VALUES('$teacher_name','$school_name','$subcounty','$year','$g_one','$g_two','$g_three','$g_four','$g_u','$g_x','$p_one','$p_two','$p_three','$p_four','$p_u','$p_x','$g_total','$p_total','$actual','$div','$remarks','$date')";
		$add_result=database::connect()->query($add_query);
		$select_subcnty="SELECT * FROM sub_county_mock_results WHERE sub_county='$subcounty' AND year='$year' ";
		$result_subcnty=database::connect()->query($select_subcnty);
		if ($result_subcnty->num_rows>0) {
			foreach ($result_subcnty as $value){
				$sub_id = $value['id'];
				$sub_county = $value['sub_county'];
				$div_1 = $value['div_1'];
				$div_2 = $value['div_2'];
				$div_3 = $value['div_3'];
				$div_4 = $value['div_4'];
				$div_u = $value['div_u'];
				$div_x = $value['div_x'];
				$total = $value['total'];
				$p_div_1 = $value['p_div_1'];
			}
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($total + $g_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$update_query="UPDATE sub_county_mock_results SET
			div_1='$s_div_1',
			div_2='$s_div_2',
			div_3='$s_div_3',
			div_4='$s_div_4',
			div_u='$s_div_u',
			div_x='$s_div_x',
			total='$s_total',
			p_div_1='$s_p_div_1'
			WHERE sub_county='$subcounty' AND year='$year' AND id='$sub_id'"; 
			$update_result=database::connect()->query($update_query);
		}
		else{
			$sub_county = $subcounty;
			$div_1 = 0;
			$div_2 = 0;
			$div_3 = 0;
			$div_4 = 0;
			$div_u = 0;
			$div_x = 0;
			$total = 0;
			$p_div_1 = 0;
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($total + $g_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$sub_add_query="INSERT INTO sub_county_mock_results(sub_county,div_1,div_2,div_3,div_4,div_u,div_x,total,p_div_1,year) VALUES('$sub_county','$s_div_1','$s_div_2','$s_div_3','$s_div_4','$s_div_u','$s_div_x','$s_total','$s_p_div_1',$year) ";
			$sub_add_result=database::connect()->query($sub_add_query);
		}
		if($add_result){
			$update_query="UPDATE schools_head SET graded='$graded' WHERE sch_name='$school_name' AND hteacher_name='$teacher_name'";
			$result=database::connect()->query($update_query);
			if($result){
				$message="<p class='alert alert-success'><strong>Success!</strong> Your School Grades have been calculated successfully.</p>";
				return $message;
			}else{
				$msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School Grades calculation added but the schools table was not updated.</p>";
				return $msg;
			}

		}

		else{
			$msg="<p class='alert alert-danger'><strong>Error ! </strong>Your School Grades calculation added but the schools table was not added to database.</p>";
			return $msg;
		}

	}

	public function updateMockGrades($post,$grade_id){
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
		if ($g_one=='0' && $g_two=='0' && $g_three=='0' && $g_four=='0' && $g_u=='0' && $g_x=='0') {
			$message="<p class='alert alert-danger'><strong>Error!</strong> All values cannot be Zero (0) try again.</p>";
			return $message;
		}
		$date=$post['date'];
		$g_total= $g_one + $g_two + $g_three + $g_four + $g_u + $g_x;
		$p_one = round(( $g_one / $g_total ) * 100, $dec);
		$p_two = round(( $g_two / $g_total ) * 100, $dec);
		$p_three = round(( $g_three / $g_total ) * 100, $dec);
		$p_four = round(( $g_four / $g_total ) * 100, $dec);
		$p_u = round(( $g_u / $g_total ) * 100, $dec);
		$p_x = round(( $g_x / $g_total ) * 100, $dec);
		$p_total = ($p_one + $p_two + $p_three + $p_four + $p_u + $p_x);
		$p_actual = (($p_one*100) + ($p_two*75) + ($p_three*50) + ($p_four*25)) / 100;
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair";
				$div = "Grade three";
			}
			else if ($actual >=35 && $actual <=49.99) {
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
			else if ($actual >=50 && $actual <=74.99) {
				$remarks ="Fair with Ungraded";
				$div = "Grade four";
			}
			else if ($actual >=34 && $actual <=49.99) {
				$remarks ="Poor with Ungraded";
				$div = "Ungraded";
			}
			else{
				$remarks ="Failed with Ungraded";
				$div = "Ungraded";
			}
		}

		$query="SELECT sub_county FROM schools_tb WHERE sch_name='$school_name'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0){
			foreach ($result as $value){
				$subcounty = $value['sub_county'];

			}
		}

		$get_result="SELECT * FROM sch_mock_results WHERE id='$grade_id'";
		$result_get=database::connect()->query($get_result);
		if ($result_get->num_rows>0) {
			foreach ($result_get as $value) {
				$dv_1=$value['g_1'];
				$dv_2=$value['g_2'];
				$dv_3=$value['g_3'];
				$dv_4=$value['g_4'];
				$dv_u=$value['g_u'];
				$dv_x=$value['g_x'];
				$dv_total=$value['g_total'];
			}
		}
		$select_subnty="SELECT * FROM sub_county_mock_results WHERE sub_county='$subcounty' AND year='$year' ";
		$result_subcty=database::connect()->query($select_subnty);
		if ($result_subcty->num_rows>0) {
			foreach ($result_subcty as $value){
				$sub_id = $value['id'];
				$sub_county = $value['sub_county'];
				$sdiv_1 = $value['div_1'];
				$sdiv_2 = $value['div_2'];
				$sdiv_3 = $value['div_3'];
				$sdiv_4 = $value['div_4'];
				$sdiv_u = $value['div_u'];
				$sdiv_x = $value['div_x'];
				$stotal = $value['total'];
				$sp_div_1 = $value['p_div_1'];
			}
			$sb_div_1 = intval($sdiv_1 - $dv_1);
			$sb_div_2 = intval($sdiv_2 - $dv_2);
			$sb_div_3 = intval($sdiv_3 - $dv_3);
			$sb_div_4 = intval($sdiv_4 - $dv_4);
			$sb_div_u = intval($sdiv_u - $dv_u);
			$sb_div_x = intval($sdiv_x - $dv_x);
			$sb_total = intval($stotal - $dv_total);
			$sb_p_div_1 = round(( $sb_div_1 / $sb_total ) * 100, $dec);
			$update_query="UPDATE sub_county_mock_results SET
			div_1='$sb_div_1',
			div_2='$sb_div_2',
			div_3='$sb_div_3',
			div_4='$sb_div_4',
			div_u='$sb_div_u',
			div_x='$sb_div_x',
			total='$sb_total',
			p_div_1='$sb_p_div_1'
			WHERE sub_county='$subcounty' AND year='$year' AND id='$sub_id'"; 
			$update_result=database::connect()->query($update_query);
		}

		$query="UPDATE  sch_mock_results SET
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
		$select_subcnty="SELECT * FROM sub_county_mock_results WHERE sub_county='$subcounty' AND year='$year' ";
		$result_subcnty=database::connect()->query($select_subcnty);
		if ($result_subcnty->num_rows>0) {
			foreach ($result_subcnty as $value){
				$sub_id = $value['id'];
				$sub_county = $value['sub_county'];
				$div_1 = $value['div_1'];
				$div_2 = $value['div_2'];
				$div_3 = $value['div_3'];
				$div_4 = $value['div_4'];
				$div_u = $value['div_u'];
				$div_x = $value['div_x'];
				$total = $value['total'];
				$p_div_1 = $value['p_div_1'];
			}
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($total + $g_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$update_query="UPDATE sub_county_mock_results SET
			div_1='$s_div_1',
			div_2='$s_div_2',
			div_3='$s_div_3',
			div_4='$s_div_4',
			div_u='$s_div_u',
			div_x='$s_div_x',
			total='$s_total',
			p_div_1='$s_p_div_1'
			WHERE sub_county='$subcounty' AND year='$year' AND id='$sub_id'"; 
			$update_result=database::connect()->query($update_query);
		}
		else{
			$sub_county = $subcounty;
			$div_1 = 0;
			$div_2 = 0;
			$div_3 = 0;
			$div_4 = 0;
			$div_u = 0;
			$div_x = 0;
			$total = 0;
			$p_div_1 = 0;
			$s_div_1 = intval($div_1 + $g_one);
			$s_div_2 = intval($div_2 + $g_two);
			$s_div_3 = intval($div_3 + $g_three);
			$s_div_4 = intval($div_4 + $g_four);
			$s_div_u = intval($div_u + $g_u);
			$s_div_x = intval($div_x + $g_x);
			$s_total = intval($total + $g_total);
			$s_p_div_1 = round(( $s_div_1 / $s_total ) * 100, $dec);
			$sub_add_query="INSERT INTO sub_county_mock_results(sub_county,div_1,div_2,div_3,div_4,div_u,div_x,total,p_div_1,year) VALUES('$sub_county','$s_div_1','$s_div_2','$s_div_3','$s_div_4','$s_div_u','$s_div_x','$s_total','$s_p_div_1',$year) ";
			$sub_add_result=database::connect()->query($sub_add_query);
		}
		if($result){
			$msg="<p class='alert alert-success'><strong>Success ! </strong>Mock Grades updated successful.</p>";
			return $msg;
		}else{
			$msg="<p class='alert alert-danger'><strong>Error ! </strong>Mock Grades update failed.</p>";
			return $msg;
		}

	}

	public function selectTotalGrades1(){
		$get_year = date("Y");
		$previousyear = $get_year - 1;
		$query="SELECT * FROM  hteacher_grades where sch_category='government' AND year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades2(){
		$get_year = date("Y");
		$previousyear = $get_year - 2;
		$query="SELECT * FROM  hteacher_grades where sch_category='gorvenment' AND year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades3(){
		$get_year = date("Y");
		$previousyear = $get_year - 3;
		$query="SELECT * FROM  hteacher_grades where sch_category='gorvenment' AND year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades4(){
		$get_year = date("Y");
		$previousyear = $get_year - 4;
		$query="SELECT * FROM  hteacher_grades where sch_category='gorvenment' AND year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades21(){
		$get_year = date("Y");
		$previousyear = $get_year - 1;
		$query="SELECT * FROM  hteacher_grades where year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades22(){
		$get_year = date("Y");
		$previousyear = $get_year - 2;
		$query="SELECT * FROM  hteacher_grades where year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades23(){
		$get_year = date("Y");
		$previousyear = $get_year - 3;
		$query="SELECT * FROM  hteacher_grades where  year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades24(){
		$get_year = date("Y");
		$previousyear = $get_year - 4;
		$query="SELECT * FROM  hteacher_grades where year='$previousyear' ORDER by p_actual DESC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

	public function getSums1(){
		$year_get=date("Y");
		$prev_year=$year_get - 1;
		$getdiv1="SELECT SUM(div_1) as total_div1, SUM(div_2) as total_div2, SUM(div_3) as total_div3, SUM(div_4) as total_div4, SUM(div_u) as total_divu, SUM(div_x) as total_divx, SUM(total) as grand_total FROM sub_county_results WHERE year='$prev_year'";
		$div1_result=database::connect()->query($getdiv1);
		if ($div1_result->num_rows>0) {
			return $div1_result;
		}
		else{
			return false;
		}
	}
	public function getSums2(){
		$year_get=date("Y");
		$prev_year=$year_get - 2;
		$getdiv1="SELECT SUM(div_1) as total_div1, SUM(div_2) as total_div2, SUM(div_3) as total_div3, SUM(div_4) as total_div4, SUM(div_u) as total_divu, SUM(div_x) as total_divx, SUM(total) as grand_total FROM sub_county_results WHERE year='$prev_year'";
		$div1_result=database::connect()->query($getdiv1);
		if ($div1_result->num_rows>0) {
			return $div1_result;
		}
		else{
			return false;
		}
	}
	public function getSums3(){
		$year_get=date("Y");
		$prev_year=$year_get - 3;
		$getdiv1="SELECT SUM(div_1) as total_div1, SUM(div_2) as total_div2, SUM(div_3) as total_div3, SUM(div_4) as total_div4, SUM(div_u) as total_divu, SUM(div_x) as total_divx, SUM(total) as grand_total FROM sub_county_results WHERE year='$prev_year'";
		$div1_result=database::connect()->query($getdiv1);
		if ($div1_result->num_rows>0) {
			return $div1_result;
		}
		else{
			return false;
		}
	}
	public function getSums4(){
		$year_get=date("Y");
		$prev_year=$year_get - 4;
		$getdiv1="SELECT SUM(div_1) as total_div1, SUM(div_2) as total_div2, SUM(div_3) as total_div3, SUM(div_4) as total_div4, SUM(div_u) as total_divu, SUM(div_x) as total_divx, SUM(total) as grand_total FROM sub_county_results WHERE year='$prev_year'";
		$div1_result=database::connect()->query($getdiv1);
		if ($div1_result->num_rows>0) {
			return $div1_result;
		}
		else{
			return false;
		}
	}

	public function selectTotalGrades11(){
		$get_year = date("Y");
		$previousyear = $get_year - 1;
		$query="SELECT * FROM  hteacher_grades where status='active' AND year='$previousyear' ORDER By p_actual ASC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades12(){
		$get_year = date("Y");
		$previousyear = $get_year - 2;
		$query="SELECT * FROM  hteacher_grades where status='active' AND year='$previousyear' ORDER By p_actual ASC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades13(){
		$get_year = date("Y");
		$previousyear = $get_year - 3;
		$query="SELECT * FROM  hteacher_grades where status='active' AND year='$previousyear' ORDER By p_actual ASC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}
	public function selectTotalGrades14(){
		$get_year = date("Y");
		$previousyear = $get_year - 4;
		$query="SELECT * FROM  hteacher_grades where status='active' AND year='$previousyear' ORDER By p_actual ASC LIMIT 10";
		$restlt=database::connect()->query($query);
		if($restlt->num_rows>0){

			return $restlt;

		}else{
			return false;
		}
	}

	public function overllSchoolPerformance($post){
		$school_name=$post['school_name'];
		$from_date=$post['from_year'];
		$to_date=$post['upto_year'];
		$query="SELECT * FROM hteacher_grades WHERE school_name='$school_name' AND year BETWEEN '" . $from_date . "' AND  '" . $to_date . "' ORDER by year DESC";
		$result=database::connect()->query($query);
		if ($result->num_rows>0) {
			return $result;
		}else{
			return false;
		}

	}

	public function overllSubPerformance($post){
		$sub_county=$post['sub_county'];
		$from_date=$post['from_year'];
		$to_date=$post['upto_year'];
		$query="SELECT * FROM sub_county_results WHERE sub_county='$sub_county' AND year BETWEEN '" . $from_date . "' AND  '" . $to_date . "' ORDER by p_div_1 DESC";
		$result=database::connect()->query($query);
		if ($result->num_rows>0) {
			return $result;
		}else{
			return false;
		}

	}

	public function overllHTeacherPerformance($post){
		$teacher_name=$post['teacher_name'];
		$from_date=$post['from_year'];
		$to_date=$post['upto_year'];
		$query="SELECT * FROM hteacher_grades WHERE teacher_name='$teacher_name' AND year BETWEEN '" . $from_date . "' AND  '" . $to_date . "' ORDER by year DESC";
		$result=database::connect()->query($query);
		if ($result->num_rows>0) {
			return $result;
		}else{
			return false;
		}
	}

	public function overResultSummary($post){
		$prev_year=$post['filteryear'];
		$getdiv1="SELECT SUM(div_1) as total_div1, SUM(div_2) as total_div2, SUM(div_3) as total_div3, SUM(div_4) as total_div4, SUM(div_u) as total_divu, SUM(div_x) as total_divx, SUM(total) as grand_total FROM sub_county_results WHERE year='$prev_year'";
		$div1_result=database::connect()->query($getdiv1);
		if ($div1_result->num_rows>0) {
			return $div1_result;
		}
		else{
			return false;
		}

	}

	public function getSubCounties(){
		$query="SELECT DISTINCT sub_county from schools_tb";
		$result=database::connect()->query($query);
		if ($result->num_rows>0) {
			return $result;
		}
		else{
			return false;
		}

	}

	public function selectBestSchoolSubCounty($post){
		$sub_county=$post['sub_county'];
		$filteryear=$post['filteryear'];
		$query="SELECT * FROM hteacher_grades WHERE sub_county='$sub_county' AND year='$filteryear' ORDER by p_actual DESC LIMIT 10";
		$result=database::connect()->query($query);
		if ($result->num_rows>0) {
			return $result;
		}
		else{
			return false;
		}
	}

	public function selectOverallSchoolSubCounty($post){
		$sub_county=$post['sub_county'];
		$filteryear=$post['filteryear'];
		$query="SELECT * FROM hteacher_grades WHERE sub_county='$sub_county' AND year='$filteryear' ORDER by p_actual DESC LIMIT 50";
		$result=database::connect()->query($query);
		if ($result->num_rows>0) {
			return $result;
		}
		else{
			return false;
		}
	}
	public function selectBestSchoolSubCounty1(){
		$cur = date("Y") - 1;
		$query="SELECT * FROM hteacher_grades where year='$cur'";
		$result=database::connect()->query($query);
		if ($result->num_rows>0) {
			return $result;
		}
		else{
			return false;
		}
	}

}

?>