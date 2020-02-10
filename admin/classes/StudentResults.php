<?php
class StudentResults
{

	public function addP4Results($post)
	{

		$required = [
			$post['school_name'],
			$post['std_no'],
			$post['year'],
			$post['math_g'],
			$post['eng_g'],
			$post['sci_g'],
			$post['sst_g'],
		];
		if (validation::required($required)) {
			return validation::required($required);
		}

		$school_name = $post['school_name'];
		$std_no = $post['std_no'];
		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];
		$year = $post['year'];

		$std_query = "SELECT DISTINCT student_name FROM primary_four WHERE std_no='$std_no' LIMIT 1";
		$std_result = database::connect()->query($std_query);
		if ($std_result->num_rows > 0) {
			foreach ($std_result as $value) {
				$student_name = $value['student_name'];
			}
		}

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$query = "SELECT school_name,student_name,std_no FROM primary_four_results WHERE student_name='$student_name' AND school_name='$school_name' AND std_no='$std_no'";
		$result = database::connect()->query($query);
		if ($result->num_rows > 0) {
			$message = "<p class='alert alert-danger'><strong>Error!</strong> This Students results are already added try again.</p>";
			return $message;
		}

		$add_query = "INSERT INTO primary_four_results(student_name,school_name,std_no,year,english_g,math_g,science_g,sst_g,aggregates,grade,remarks)VALUES('$student_name','$school_name','$std_no','$year','$eng_g','$math_g','$sci_g','$sst_g','$agg','$division','$remarks')";

		$add_result = database::connect()->query($add_query);
		if ($add_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results add successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results add failed.</p>";
			return $msg;
		}
	}

	public function addP5Results($post)
	{

		$required = [
			$post['school_name'],
			$post['std_no'],
			$post['year'],
			$post['math_g'],
			$post['eng_g'],
			$post['sci_g'],
			$post['sst_g'],
		];
		if (validation::required($required)) {
			return validation::required($required);
		}

		$school_name = $post['school_name'];
		$std_no = $post['std_no'];
		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];
		$year = $post['year'];

		$std_query = "SELECT DISTINCT student_name FROM primary_five WHERE std_no='$std_no' LIMIT 1";
		$std_result = database::connect()->query($std_query);
		if ($std_result->num_rows > 0) {
			foreach ($std_result as $value) {
				$student_name = $value['student_name'];
			}
		}

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$query = "SELECT school_name,student_name,std_no FROM primary_five_results WHERE student_name='$student_name' AND school_name='$school_name' AND std_no='$std_no'";
		$result = database::connect()->query($query);
		if ($result->num_rows > 0) {
			$message = "<p class='alert alert-danger'><strong>Error!</strong> This Students results are already added try again.</p>";
			return $message;
		}

		$add_query = "INSERT INTO primary_five_results(student_name,school_name,std_no,year,english_g,math_g,science_g,sst_g,aggregates,grade,remarks)VALUES('$student_name','$school_name','$std_no','$year','$eng_g','$math_g','$sci_g','$sst_g','$agg','$division','$remarks')";

		$add_result = database::connect()->query($add_query);
		if ($add_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results add successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results add failed.</p>";
			return $msg;
		}
	}

	public function addP6Results($post)
	{

		$required = [
			$post['school_name'],
			$post['std_no'],
			$post['year'],
			$post['math_g'],
			$post['eng_g'],
			$post['sci_g'],
			$post['sst_g'],
		];
		if (validation::required($required)) {
			return validation::required($required);
		}

		$school_name = $post['school_name'];
		$std_no = $post['std_no'];
		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];
		$year = $post['year'];

		$std_query = "SELECT DISTINCT student_name FROM primary_six WHERE std_no='$std_no' LIMIT 1";
		$std_result = database::connect()->query($std_query);
		if ($std_result->num_rows > 0) {
			foreach ($std_result as $value) {
				$student_name = $value['student_name'];
			}
		}

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$query = "SELECT school_name,student_name,std_no FROM primary_six_results WHERE student_name='$student_name' AND school_name='$school_name' AND std_no='$std_no'";
		$result = database::connect()->query($query);
		if ($result->num_rows > 0) {
			$message = "<p class='alert alert-danger'><strong>Error!</strong> This Students results are already added try again.</p>";
			return $message;
		}

		$add_query = "INSERT INTO primary_six_results(student_name,school_name,std_no,year,english_g,math_g,science_g,sst_g,aggregates,grade,remarks)VALUES('$student_name','$school_name','$std_no','$year','$eng_g','$math_g','$sci_g','$sst_g','$agg','$division','$remarks')";

		$add_result = database::connect()->query($add_query);
		if ($add_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results add successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results add failed.</p>";
			return $msg;
		}
	}

	public function addMockResults($post)
	{

		$required = [
			$post['school_name'],
			$post['std_no'],
			$post['year'],
			$post['math_g'],
			$post['eng_g'],
			$post['sci_g'],
			$post['sst_g'],
		];
		if (validation::required($required)) {
			return validation::required($required);
		}

		$school_name = $post['school_name'];
		$std_no = $post['std_no'];
		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];
		$year = $post['year'];

		$std_query = "SELECT DISTINCT student_name FROM primary_seven WHERE std_no='$std_no' LIMIT 1";
		$std_result = database::connect()->query($std_query);
		if ($std_result->num_rows > 0) {
			foreach ($std_result as $value) {
				$student_name = $value['student_name'];
			}
		}

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$query = "SELECT school_name,student_name,std_no FROM primary_mock_results WHERE student_name='$student_name' AND school_name='$school_name' AND std_no='$std_no'";
		$result = database::connect()->query($query);
		if ($result->num_rows > 0) {
			$message = "<p class='alert alert-danger'><strong>Error!</strong> This Students Mock results are already added try again.</p>";
			return $message;
		}

		$add_query = "INSERT INTO primary_mock_results(student_name,school_name,std_no,year,english_g,math_g,science_g,sst_g,aggregates,grade,remarks) 
		VALUES('$student_name','$school_name','$std_no','$year','$eng_g','$math_g','$sci_g','$sst_g','$agg','$division','$remarks')";

		$add_result = database::connect()->query($add_query);
		if ($add_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student Mock results add successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student Mock results add failed.</p>";
			return $msg;
		}
	}

	public function addP7Results($post)
	{

		$required = [
			$post['school_name'],
			$post['std_no'],
			$post['year'],
			$post['math_g'],
			$post['eng_g'],
			$post['sci_g'],
			$post['sst_g'],
		];
		if (validation::required($required)) {
			return validation::required($required);
		}

		$school_name = $post['school_name'];
		$std_no = $post['std_no'];
		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];
		$year = $post['year'];

		$std_query = "SELECT DISTINCT student_name FROM primary_seven WHERE std_no='$std_no' LIMIT 1";
		$std_result = database::connect()->query($std_query);
		if ($std_result->num_rows > 0) {
			foreach ($std_result as $value) {
				$student_name = $value['student_name'];
			}
		}

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$query = "SELECT school_name,student_name,std_no FROM primary_seven_results WHERE student_name='$student_name' AND school_name='$school_name' AND std_no='$std_no'";
		$result = database::connect()->query($query);
		if ($result->num_rows > 0) {
			$message = "<p class='alert alert-danger'><strong>Error!</strong> This Students results are already added try again.</p>";
			return $message;
		}

		$add_query = "INSERT INTO primary_seven_results(student_name,school_name,std_no,year,english_g,math_g,science_g,sst_g,aggregates,grade,remarks) 
		VALUES('$student_name','$school_name','$std_no','$year','$eng_g','$math_g','$sci_g','$sst_g','$agg','$division','$remarks')";

		$add_result = database::connect()->query($add_query);
		if ($add_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results add successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results add failed.</p>";
			return $msg;
		}
	}

	public function updatep7Results($post, $student_id)
	{

		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$update_query = "UPDATE primary_seven_results SET
		english_g='$eng_g',
		math_g='$math_g',
		science_g='$sci_g',
		sst_g='$sst_g',
		aggregates='$agg',
		grade='$division',
		remarks='$remarks'
		WHERE std_no='$student_id'";
		$update_result = database::connect()->query($update_query);
		if ($update_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results Update successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results Update failed.</p>";
			return $msg;
		}
	}

	public function updateMockResults($post, $student_id)
	{

		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$update_query = "UPDATE primary_mock_results SET
		english_g='$eng_g',
		math_g='$math_g',
		science_g='$sci_g',
		sst_g='$sst_g',
		aggregates='$agg',
		grade='$division',
		remarks='$remarks'
		WHERE std_no='$student_id'";
		$update_result = database::connect()->query($update_query);
		if ($update_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student Mock results Update successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student Mock results Update failed.</p>";
			return $msg;
		}
	}

	public function updatep4Results($post, $student_id)
	{

		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$update_query = "UPDATE primary_four_results SET
		english_g='$eng_g',
		math_g='$math_g',
		science_g='$sci_g',
		sst_g='$sst_g',
		aggregates='$agg',
		grade='$division',
		remarks='$remarks'
		WHERE std_no='$student_id'";
		$update_result = database::connect()->query($update_query);
		if ($update_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results Update successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results Update failed.</p>";
			return $msg;
		}
	}

	public function updatep5Results($post, $student_id)
	{

		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$update_query = "UPDATE primary_five_results SET
		english_g='$eng_g',
		math_g='$math_g',
		science_g='$sci_g',
		sst_g='$sst_g',
		aggregates='$agg',
		grade='$division',
		remarks='$remarks'
		WHERE std_no='$student_id'";
		$update_result = database::connect()->query($update_query);
		if ($update_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results Update successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results Update failed.</p>";
			return $msg;
		}
	}

	public function updatep6Results($post, $student_id)
	{

		$math_g = $post['math_g'];
		$eng_g = $post['eng_g'];
		$sci_g = $post['sci_g'];
		$sst_g = $post['sst_g'];

		if ($eng_g == 'D1') {
			$english_g = 1;
		} elseif ($eng_g == 'D2') {
			$english_g = 2;
		} elseif ($eng_g == 'C3') {
			$english_g = 3;
		} elseif ($eng_g == 'C4') {
			$english_g = 4;
		} elseif ($eng_g == 'C5') {
			$english_g = 5;
		} elseif ($eng_g == 'C6') {
			$english_g = 6;
		} elseif ($eng_g == 'P7') {
			$english_g = 7;
		} elseif ($eng_g == 'P8') {
			$english_g = 8;
		} else {
			$english_g = 9;
		}
		if ($math_g == 'D1') {
			$mtc_g = 1;
		} elseif ($math_g == 'D2') {
			$mtc_g = 2;
		} elseif ($math_g == 'C3') {
			$mtc_g = 3;
		} elseif ($math_g == 'C4') {
			$mtc_g = 4;
		} elseif ($math_g == 'C5') {
			$mtc_g = 5;
		} elseif ($math_g == 'C6') {
			$mtc_g = 6;
		} elseif ($math_g == 'P7') {
			$mtc_g = 7;
		} elseif ($math_g == 'P8') {
			$mtc_g = 8;
		} else {
			$mtc_g = 9;
		}
		if ($sci_g == 'D1') {
			$science_g = 1;
		} elseif ($sci_g == 'D2') {
			$science_g = 2;
		} elseif ($sci_g == 'C3') {
			$science_g = 3;
		} elseif ($sci_g == 'C4') {
			$science_g = 4;
		} elseif ($sci_g == 'C5') {
			$science_g = 5;
		} elseif ($sci_g == 'C6') {
			$science_g = 6;
		} elseif ($sci_g == 'P7') {
			$science_g = 7;
		} elseif ($sci_g == 'P8') {
			$science_g = 8;
		} else {
			$science_g = 9;
		}
		if ($sst_g == 'D1') {
			$social_g = 1;
		} elseif ($sst_g == 'D2') {
			$social_g = 2;
		} elseif ($sst_g == 'C3') {
			$social_g = 3;
		} elseif ($sst_g == 'C4') {
			$social_g = 4;
		} elseif ($sst_g == 'C5') {
			$social_g = 5;
		} elseif ($sst_g == 'C6') {
			$social_g = 6;
		} elseif ($sst_g == 'P7') {
			$social_g = 7;
		} elseif ($sst_g == 'P8') {
			$social_g = 8;
		} else {
			$social_g = 9;
		}


		$agg = intval($mtc_g + $english_g + $science_g + $social_g);

		if ($math_g != 'F9' && $eng_g != 'F9' && $sci_g != 'F9' && $sst_g != 'F9') {

			if ($agg <= 12) {
				$division = 'one';
				$remarks = 'Excellent';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'two';
				$remarks = 'Good';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'three';
				$remarks = 'Fair';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'four';
				$remarks = 'Poor';
			} else {
				$division = 'Ungraded';
				$remarks = 'Failed';
			}
		} else {
			if ($agg <= 12) {
				$division = 'two';
				$remarks = 'Excellent with F9';
			} elseif ($agg >= 13 && $agg <= 24) {
				$division = 'three';
				$remarks = 'Good with F9';
			} elseif ($agg >= 25 && $agg <= 28) {
				$division = 'four';
				$remarks = 'Fair with F9';
			} elseif ($agg >= 29 && $agg <= 32) {
				$division = 'Ungraded';
				$remarks = 'Poor with F9';
			} else {
				$division = 'Ungraded';
				$remarks = 'Very Poor with F9, Failed ';
			}
		}

		$update_query = "UPDATE primary_six_results SET
		english_g='$eng_g',
		math_g='$math_g',
		science_g='$sci_g',
		sst_g='$sst_g',
		aggregates='$agg',
		grade='$division',
		remarks='$remarks'
		WHERE std_no='$student_id'";
		$update_result = database::connect()->query($update_query);
		if ($update_result) {
			$msg = "<p class='alert alert-success'><strong>Success ! </strong>Student results Update successful.</p>";
			return $msg;
		} else {
			$msg = "<p class='alert alert-danger'><strong>Error ! </strong>Student results Update failed.</p>";
			return $msg;
		}
	}

}
