<?php
class ShiftSrudents
{
    public function shiftp7Students()
    {
        $p7_query = "INSERT INTO primary_seven_temp SELECT * FROM primary_seven";
        $result = database::connect()->query($p7_query);

        $del_query = "TRUNCATE TABLE primary_seven";
        $del_result = database::connect()->query($del_query);
        if ($result && $del_result) {
            $msg = "<p class='alert alert-success'><strong>Success ! </strong>Student Shifted successfully.</p>";
            return $msg;
        } else {
            $msg = "<p class='alert alert-danger'><strong>Error ! </strong>Students Shifting failed.</p>";
            return $msg;
        }
    }

    public function shiftp6Students()
    {
        $p7_query = "INSERT INTO primary_seven SELECT * FROM primary_six";
        $result = database::connect()->query($p7_query);

        $del_query = "TRUNCATE TABLE primary_six";
        $del_result = database::connect()->query($del_query);
        if ($result && $del_result) {
            $msg = "<p class='alert alert-success'><strong>Success ! </strong>Student Shifted successfully.</p>";
            return $msg;
        } else {
            $msg = "<p class='alert alert-danger'><strong>Error ! </strong>Students Shifting failed.</p>";
            return $msg;
        }
    }
}
