<?php class Attendance {
    


    /*****************************************************************************
    *****************************ADD GYM SERVICE**********************************
    *****************************************************************************/

    function viewBranch(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_branch");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <tr>
                <td><?php echo $row['Branch_Id']; ?></td>
                <td><?php echo $row['Branch_Name']; ?></td>
                <td><?php echo $row['Branch_Address']; ?></td>
                <td><?php echo $row['Branch_Contact']; ?></td>
                <th></th>
                <th class="hidden-sm hidden-md hidden-lg"></th>
                <th class="hidden-sm hidden-md hidden-lg"></th>
            </tr>
            
        <?php   
        }
    }    

    


    function studentAttendance(){
        include('config/dbcon.php');
    	$attendance = $_POST['attendance']; 
        $studentid = $_POST['studentid']; 
        $manualtime = $_POST['time'];
        if ($manualtime>0) {
            $todaydates = $manualtime;
            $todaydate = date("Y-m-d H:m:s", strtotime($todaydates));
        }
        else{
            $todaydate = Date('Y-m-d H:m:s');
        }
        $datetodays = Date('Y-m-d'); 
        
        $outtime = Date('Y-m-d H:m:s');  
        $RecTimeStamp = Date("Y/m/d  H:m:s");
        $size = sizeof($studentid);
        $values="";
        try{
            for($i=0; $i<$size; $i++ )
            {
                if($size-1 == $i)
                {
                    $values .= "('$studentid[$i]', '1','$datetodays','$todaydate', '$outtime','$RecTimeStamp')" ;
                    $fatehermobileno = "SELECT * FROM `asitfa_student` WHERE Student_Id = $studentid[$i]";
            $ru = mysqli_query($GLOBALS["___mysqli_ston"], $fatehermobileno) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
            $data = mysqli_fetch_row($ru); 

            $message = "Dear Parents Please be informed that your ward '".$data[6]."' has reached coaching today, as per our Coaching record.  Regards TEAM SANKALP";
            $fathermob = $data[12];
            if(strlen($fathermob)== '13')
            {
                $a = explode("+91", $fathermob);
                $mob = $a[1];
            }
            else if (strlen($fathermob)== '11')
            {
                $mob = preg_replace('/^0+/', $fathermob);
            }
            else 
            {
                $mob =   $fathermob;
            }
            if(strlen($mob) == '10')
            {
                $this->sms($message, $mob);
            }
            echo "<script>alert('Student Absent Mark Successfully')</script>";
                }
                else
                {
                    $values .= "('$studentid[$i]', '1','$datetodays','$todaydate', '$outtime','$RecTimeStamp'),";
                    $fatehermobileno = "SELECT * FROM `asitfa_student` WHERE Student_Id = $studentid[$i]";
            $ru = mysqli_query($GLOBALS["___mysqli_ston"], $fatehermobileno) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
            $data = mysqli_fetch_row($ru); 

            $message = "Dear Parents Please be informed that your ward '".$data[6]."' has reached coaching today, as per our Coaching record.  Regards TEAM SANKALP";
            $fathermob = $data[12];
            if(strlen($fathermob)== '13')
            {
                $a = explode("+91", $fathermob);
                $mob = $a[1];
            }
            else if (strlen($fathermob)== '11')
            {
                $mob = preg_replace('/^0+/', $fathermob);
            }
            else 
            {
                $mob =   $fathermob;
            }
            if(strlen($mob) == '10')
            {
                $this->sms($message, $mob);
            }
            echo "<script>alert('Student Absent Mark Successfully')</script>";
                }
            }
            $sql = "INSERT INTO asitfa_attendance ( Student_Id, Attendance_Status, Attendance_Date, Attendance_Date_Intime, Attendance_Date_Outtime, Rec_Time_Stamp) VALUES {$values}";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
            echo "<script>alert('Student Present Mark Successfully')</script>";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        //$ids = join("','",$studentid);   

            
    }
   


    function studentAttendanceOut(){
        include('config/dbcon.php');
        $studentid = $_POST['studentid']; 
        $outtime = Date('Y-m-d H:m:s');  
        $size = sizeof($studentid);
        $values = "";
        try{
            for($i=0; $i<$size; $i++ )
            {
                if($size-1 == $i)
                {
                    $values .= "'$outtime'" ;
                }
                else
                {
                    $values .= "'$outtime',";
                    
                }
                $sql = "UPDATE asitfa_attendance SET Attendance_Date_Outtime = NOW() WHERE Student_Id = $studentid[$i]";
                $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
                echo "<script>alert('Student Present Mark Successfully')</script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    function BookIssueTime(){
        include('config/dbcon.php');
        $issue = $_POST['issue']; 
        $bookid = $_POST['bookid'];
        $studentid = $_POST['studentid'];  
        $issuetime = Date('Y-m-d H:m:s');
        $RecTimeStamp = Date("Y/m/d  H:m:s");
        $size = sizeof($bookid);
        $values="";
        try{
            for($i=0; $i<$size; $i++ )
            {
                if($size-1 == $i)
                {
                    $values .= "('$bookid[$i]', '$studentid', '1','$issuetime','$RecTimeStamp')" ;
                }
                else
                {
                    $values .= "('$bookid[$i]', '$studentid', '1','$issuetime','$RecTimeStamp'),";
                }
            }
            $sql = "INSERT INTO asitfa_issuebook ( Book_Id, Student_Id, Book_Status, Book_Issue_Time, Rec_Time_Stamp) VALUES {$values}";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
            echo "<script>alert('Book Issue Successfully')</script>";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    function bookRecive(){
        include('config/dbcon.php');
        $bookid = $_POST['bookid']; 
        $recivetime = Date('Y-m-d H:m:s');  
        $size = sizeof($bookid);
        $values = "";
        try{
            for($i=0; $i<$size; $i++ )
            {
                if($size-1 == $i)
                {
                    $values .= "'$recivetime'" ;
                }
                else
                {
                    $values .= "'$recivetime',";
                    
                }
                $sql = "UPDATE asitfa_issuebook SET Book_Recive_Time = NOW() WHERE Book_Id = $bookid[$i]";
                $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
                echo "<script>alert('Book Recive Successfully')</script>";
            }
            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }



    function BackAttendance(){
        include('config/dbcon.php');
        $attendance = $_POST['attendance']; 
        $studentid = $_POST['studentid']; 
        $manualtime = $_POST['time'];
        if ($manualtime>0) {
            $todaydates = $manualtime;
            $backdates = date("Y-m-d H:m:s", strtotime($todaydates));
        }
        else{
            $backdates = Date('Y-m-d H:m:s');
        }
        $todaydate = Date('Y-m-d H:m:s');
        $outtime = Date('Y-m-d H:m:s');  
        $RecTimeStamp = Date("Y/m/d  H:m:s");
        $size = sizeof($studentid);
        $values="";
        try{
            for($i=0; $i<$size; $i++ )
            {
                if($size-1 == $i)
                {
                    $values .= "('$studentid[$i]','1','$backdates','$todaydate', '$outtime','$RecTimeStamp')" ;
                }
                else
                {
                    $values .= "('$studentid[$i]','1','$backdates','$todaydate', '$outtime','$RecTimeStamp'),";
                }
            }
           $sql = "INSERT INTO asitfa_attendance ( Student_Id, Attendance_Status, Attendance_Date, Attendance_Date_Intime, Attendance_Date_Outtime, Rec_Time_Stamp) VALUES {$values}";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
            echo "<script>alert('Student Present Mark Successfully')</script>";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function MarkStudent(){
        include('config/dbcon.php');
         include('config/dbconnection.php');
        $subjectid = $_POST['subjectid']; 
        $studentid = $_POST['studentid']; 
        $classid = $_POST['classid']; 
        $examid = $_POST['examname']; 
        $totalmark = $_POST['totalmark']; 
        $passmark = $_POST['passmark']; 
        $obtainmark = $_POST['obtainmark']; 
                                                                                                                                                                                                                                                                        
        $RecTimeStamp = Date("Y-m-d  H:i:s");
        $size = sizeof($subjectid);

        $values="";
        try{
            $dbservice = $db->query("SELECT * FROM asitfa_result WHERE Student_Id = '$studentid' AND Exam_Id = '$examid' ");
                $getservice = $dbservice->fetch(PDO::FETCH_ASSOC);
                if($getservice>0)
                {
                    echo "<script>alert('Sorry, Student Mark is already exist')</script>";
                }
                else{
            for($i=0; $i<$size; $i++ )
            {
                if($size-1 == $i)
                {
                    $values .= "('$examid','$studentid','$subjectid[$i]','$classid','$totalmark[$i]', '$passmark[$i]', '$obtainmark[$i]', '$RecTimeStamp')" ;
                }
                else
                {
                    $values .= "('$examid','$studentid','$subjectid[$i]','$classid','$totalmark[$i]', '$passmark[$i]', '$obtainmark[$i]', '$RecTimeStamp'),";
                }
            }
        $sql = "INSERT INTO asitfa_result ( Exam_Id, Student_Id, Subject_Id, Class_Id, Total_Mark, Pass_Mark, Obtain_Mark, Rec_Time_Stamp) VALUES {$values}";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));
                    echo "<script>alert('Student Add Mark Successfully')</script>";
                        $resultmsg = $db->prepare("SELECT * FROM asitfa_result WHERE Student_Id = '$studentid' AND Exam_Id = '$examid'");
                         $resultmsg->execute();
                         for($i=0; $rowmsg = $resultmsg->fetch(); $i++){ 
                         $studentid = $rowmsg['Student_Id'];
                         $studentdetail = $db->prepare("SELECT * FROM asitfa_student WHERE Student_Id = $studentid");
                $studentdetail->execute();
                 for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
                    $messagetotal = $rowmsg['Obtain_Mark'];
                    $messageforapi = "Dear Parents Your Ward Got '".$messagetotal."' in Sunday Exam ";
                    $fathermob = $rowstudent['Mobile_No'];
                    $RecTimeStamp = Date("Y-m-d H:m:s");

                    $messagesent = $db->prepare("SELECT * FROM asitfa_message WHERE Student_Id = $studentid");
                    $messagesent->execute();
                    $rowmessagesent = $messagesent->fetch();
            
        if ($studentid == $rowmessagesent['Student_Id'] AND $examid == $rowmessagesent['Exam_Id']) {
                    echo "<script type= 'text/javascript'>alert('no msg sent');</script>";
            }
        else{
                $sql = "INSERT INTO asitfa_message(Student_Id, Contact_No, Message, Exam_Id, Rec_Time_Stamp) VALUES (:a,:b,:c,:d,:e)";
                $q = $db->prepare($sql);
                $insertservice = $q->execute(array(':a'=>$studentid,':b'=>$fathermob,':c'=>$messagetotal,':d'=>$examid,':e'=>$RecTimeStamp));
                    if ($insertservice) {
                        if(strlen($fathermob)== '13')
                        {
                            $a = explode("+91", $fathermob);
                            $mob = $a[1];
                        }
                        else if (strlen($fathermob)== '11')
                        {
                            $mob = preg_replace('/^0+/', $fathermob);
                        }
                        else 
                        {
                            $mob =   $fathermob;
                        }
                        if(strlen($mob) == '10')
                        {
                            $this->sms($messageforapi, $mob);
                        }
                        echo "<script type= 'text/javascript'>alert('Student Present Message Sent Successfully');</script>";
                    }
                    else{
                        echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                    }
            }

        }
    }
        }
    }


        catch(PDOException $e)
        {
            echo $e->getMessage();
        }  
        
      
    }



    function absentStudentAendance(){
        include('config/dbcon.php');
        include('config/dbconnection.php');
        $attendance = $_POST['attendance']; 
        $studentid = $_POST['studentid']; 
        $datetodays = Date('Y-m-d'); 
        $todaydate = Date('Y-m-d');  
        $outtime = Date('Y-m-d H:m:s');  
        $RecTimeStamp = Date("Y/m/d H:m:s");
        $size = sizeof($studentid);
        $values="";
        try{
            for($i=0; $i<$size; $i++ )
            {
                if($size-1 == $i)
                {
                    $values .= "('$studentid[$i]','0','$datetodays','$todaydate', '$outtime','$RecTimeStamp')" ;
                }
                else
                {
                    $values .= "('$studentid[$i]','0','$todaydate', '$outtime','$RecTimeStamp'),";
                }
            }
            $sql = "INSERT INTO asitfa_attendance ( Student_Id, Attendance_Status, Attendance_Date, Attendance_Date_Intime, Attendance_Date_Outtime, Rec_Time_Stamp) VALUES {$values}";
            $result = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die (mysqli_error($GLOBALS["___mysqli_ston"]));

            $ids = join("','",$studentid);   

            $fatehermobileno = "SELECT * FROM `asitfa_student` WHERE Student_Id IN ('$ids')";
            $ru = mysqli_query($GLOBALS["___mysqli_ston"], $fatehermobileno) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
            $data = mysqli_fetch_row($ru); 

            $message = "Dear Parent Your Son Absent Today";
            $fathermob = $data[7];
            if(strlen($fathermob)== '13')
            {
                $a = explode("+91", $fathermob);
                $mob = $a[1];
            }
            else if (strlen($fathermob)== '11')
            {
                $mob = preg_replace('/^0+/', $fathermob);
            }
            else 
            {
                $mob =   $fathermob;
            }
            if(strlen($mob) == '10')
            {
                $this->sms($message, $mob);
            }
            echo "<script>alert('Student Absent Mark Successfully')</script>";
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    function presentToday(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT Attendance_Date, Student_Id, Attendance_Status FROM asitfa_attendance WHERE Attendance_Status ='1'");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $dateattend = $row['Attendance_Date'];
            $todaydate = date("Y-m-d");
            $studentid = $row['Student_Id'];
            if($todaydate==$dateattend){
                $sqlattendance = $db->prepare("SELECT Redg_No, Student_Name, Class_Id  FROM asitfa_student WHERE Student_Id = $studentid");
                $sqlattendance->execute();
                for($i=0; $rowstudent = $sqlattendance->fetch(); $i++){
                    $classid = $rowstudent['Class_Id'];
                    $sqlclass = $db->prepare("SELECT * FROM `asitfa_class` WHERE Class_Id = $classid");
                    $sqlclass->execute();
                    for($i=0; $rowclass = $sqlclass->fetch(); $i++){    
                            ?>
                            <tr class="record">   
                                <td><?php echo $row['Student_Id']; ?></td>
                                <td><?php echo $rowstudent['Redg_No']; ?></td>
                                <td><?php echo $rowstudent['Student_Name']; ?></td>
                                <td><?php echo $rowclass['Class_Name']; ?></td>
                                <td class="hidden-lg"></td>
                                <td class="hidden-lg"></td>
                                <td>Present</td>
                            </tr>    
                            <?php
                        }
                } 
            }
        }
    }

    function absentToday(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT Attendance_Date, Student_Id, Attendance_Status FROM asitfa_attendance WHERE Attendance_Status ='0'");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $dateattend = $row['Attendance_Date'];
            $todaydate = date("Y-m-d");
            $studentid = $row['Student_Id'];
            if($todaydate==$dateattend){
                $sqlattendance = $db->prepare("SELECT Redg_No, Student_Name, Class_Id FROM asitfa_student WHERE Student_Id = $studentid");
                $sqlattendance->execute();
                for($i=0; $rowstudent = $sqlattendance->fetch(); $i++){

                    $classid = $rowstudent['Class_Id'];
                    $sqlclass = $db->prepare("SELECT * FROM `asitfa_class` WHERE Class_Id = $classid");
                    $sqlclass->execute();
                    for($i=0; $rowclass = $sqlclass->fetch(); $i++){  

                       
                            ?>
                            <tr class="record">   
                                <td><?php echo $row['Student_Id']; ?></td>
                                <td><?php echo $rowstudent['Redg_No']; ?></td>
                                <td><?php echo $rowstudent['Student_Name']; ?></td>
                                <td><?php echo $rowclass['Class_Name']; ?></td>
                                <td class="hidden-lg"></td>
                                <td class="hidden-lg"></td>
                                <td>Absent</td>
                            </tr>    
                            <?php
                    } 
                } 
            }
        }
    }


    function sms($message,$mob)
    {
        $api_key = '45B7BE5EBB8037';    
        $from = 'ALTEST';
        $contacts = $mob;
        $sms_text = urlencode($message);

        $api_url = "http://sms.ashrishait.com/app/smsapi/index.php?key=".$api_key."&campaign=4074&routeid=100233&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;

        //Submit to server

        $response = file_get_contents( $api_url);
        echo $response;
    }
    
function StudentName($studentid){

 include('config/dbconnection.php');
        $result = $db->prepare("SELECT Student_Name FROM asitfa_student WHERE Student_Id =$studentid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
          echo $row['Student_Name'];
      }
  }
    

}







