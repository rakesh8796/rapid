<?php class Dashboard {
    
    //Total Member
    function totalStudentinNo()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT count(*) as student FROM asitfa_student");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            echo $row['student'];
        }
    }


    //Total Member
    function totalActiveStudent()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT count(*) as student FROM asitfa_student WHERE Active = 1");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            echo $row['student'];
        }
    }

    //Total Member
    function totalDeactiveStudent()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT count(*) as student FROM asitfa_student WHERE Active = 0");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            echo $row['student'];
        }
    }


    function absentTodayinNo(){
        include('config/dbconnection.php');
        $todaydate = Date("Y-m-d");
        $result = $db->prepare("SELECT Attendance_Date, count(*) as student FROM asitfa_attendance WHERE Attendance_Status ='0'");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $attendncedate = $row['Attendance_Date'];
            if($attendncedate == $todaydate){
                echo $row['student'];
            }
            else{
                echo "";
            }
        }
    }

    function presentTodayinNo(){
        include('config/dbconnection.php');
        $todaydate = Date("Y-m-d");
        $result = $db->prepare("SELECT Attendance_Date, count(*) as student FROM asitfa_attendance WHERE Attendance_Status ='1'");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $attendncedate = $row['Attendance_Date'];
            if($attendncedate == $todaydate){
                echo $row['student'];
            }
            else{
                echo "";
            }
        }
    }

    function recentOnetimefeePaymentsdashboard(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Fee_Option = 1 ORDER BY Fee_Id DESC LIMIT 5");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $studentid = $row['Student_Id'];
            $studentdetail = $db->prepare("SELECT Redg_No, Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
            ?>
            <tr class="record">
                <td>CBCI-<?php echo $row['Fee_Id']; ?></td>
                <td><?php echo $rowstudent['Redg_No']; ?></td>
                <td><?php echo $rowstudent['Student_Name']; ?></td>
                
            </tr>
            
            <?php  
            } 
        }
    }

    function monthrecentfeePaymentsdashboard(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Fee_Option = 2 ORDER BY Fee_Id DESC LIMIT 5");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $studentid = $row['Student_Id'];
            $studentdetail = $db->prepare("SELECT Redg_No, Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
            ?>
            <tr class="record">
                <td>CBCI-<?php echo $row['Fee_Id']; ?></td>
                <td><?php echo $rowstudent['Redg_No']; ?></td>
                <td><?php echo $rowstudent['Student_Name']; ?></td>
            </tr>
            
            <?php  
            } 
        }
    }

    function installmentrecentfeePaymentsdashboard(){
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Fee_Option = 3 ORDER BY Fee_Id DESC LIMIT 5");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $studentid = $row['Student_Id'];
            $studentdetail = $db->prepare("SELECT Redg_No, Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
            ?>
            <tr class="record">
                <td>CBCI-<?php echo $row['Fee_Id']; ?></td>
                <td><?php echo $rowstudent['Redg_No']; ?></td>
                <td><?php echo $rowstudent['Student_Name']; ?></td>
            </tr>
            
            <?php  
            } 
        }
    }


    function monthDueFeedashboard(){
        include('config/dbconnection.php');
        /* Get expired date. */
        $expire_date = date("Y-m-d",strtotime("+30 days"));

        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Fee_Option = 2 AND Next_Month_Date <= '".$expire_date."' LIMIT 5");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $studentid = $row['Student_Id'];
            $studentdetail = $db->prepare("SELECT Redg_No, Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
            ?>
            <tr class="record">
                <td><?php echo $rowstudent['Redg_No']; ?></td>
                <td><?php echo $rowstudent['Student_Name']; ?></td>
                <td><?php echo $row['Next_Month_Date']; ?></td>
            </tr>
            
            <?php
            }  
        }
    }

    function installmentDueFeedashboard(){
        include('config/dbconnection.php');
        /* Get expired date. */
        $expire_date = date("Y-m-d",strtotime("+30 days"));

        $result = $db->prepare("SELECT * FROM asitfa_fee WHERE Fee_Option = 3 AND Next_Install_Date <= '".$expire_date."' LIMIT 5");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            $studentid = $row['Student_Id'];
            $studentdetail = $db->prepare("SELECT Redg_No, Student_Name FROM asitfa_student WHERE Student_Id = $studentid");
            $studentdetail->execute();
            for($i=0; $rowstudent = $studentdetail->fetch(); $i++){ 
            ?>
            <tr class="record">
                <td><?php echo $rowstudent['Redg_No']; ?></td>
                <td><?php echo $rowstudent['Student_Name']; ?></td>
                <td><?php echo $row['Next_Install_Date']; ?></td>
            </tr>
            
            <?php
            }  
        }
    }
  
    function monthDueFeedashboardCount(){
        include('config/dbconnection.php');
        /* Get expired date. */
        $expire_date = date("Y-m-d",strtotime("+30 days"));

        $result = $db->prepare("SELECT Count(*) as Fee_Due_Student FROM asitfa_fee WHERE Fee_Option = 2 AND Next_Month_Date <= '".$expire_date."' LIMIT 5");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
          echo $row['Fee_Due_Student'];  
        }
    }

    function installmentDueFeedashboardCount(){
        include('config/dbconnection.php');
        /* Get expired date. */
        $expire_date = date("Y-m-d",strtotime("+30 days"));

        $result = $db->prepare("SELECT Count(*) as Installment_Due_Fee FROM asitfa_fee WHERE Fee_Option = 3 AND Next_Install_Date <= '".$expire_date."' LIMIT 5");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ 
            echo $row['Installment_Due_Fee'];
        }
    }
    
}

        