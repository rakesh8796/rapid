





<?php
$att = $_POST['att'];
$rollno = $_POST['rollno'];
            foreach($att as $key => $attendance) {
                          $at = $attendance ? '1' : '0';
                $query = "INSERT INTO `attendance`(`rollno`,`att`) VALUES ('".$rollno[$key]."','".$at."') ";
                $result = mysqli_query($GLOBALS["___mysqli_ston"], $query);
            }           
?>
