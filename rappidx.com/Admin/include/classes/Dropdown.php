<?php class Dropdown {
    
    function GenderDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_gender ORDER BY Gender_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Gender_Id']);?>"><?php echo trim($row['Gender_Name']);?></option>'
            <?php
        }
    }
    
    function courseDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_course ORDER BY Course_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Course_Id']);?>"><?php echo trim($row['Course_Name']);?></option>'
            <?php
        }
    }
    function CategoryDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_category ORDER BY Category_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Category_Id']);?>"><?php echo trim($row['Category_Name']);?></option>'
            <?php
        }
    }
    function classDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_class WHERE Active = 1 ORDER BY Class_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Class_Id']);?>"><?php echo trim($row['Class_Name']);?></option>'
            <?php
        }
    }

        function examDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_exam WHERE Active = 1 ORDER BY Exam_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Exam_Id']);?>"><?php echo trim($row['Exam_Name']);?></option>'
            <?php
        }
    }


        function subjectDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_subject WHERE Active = 1 ORDER BY Subject_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Subject_Id']);?>"><?php echo trim($row['Subject_Name']);?></option>'
            <?php
        }
    }
       
           function branchDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_branch ORDER BY Branch_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Branch_Id']);?>"><?php echo trim($row['Branch_Name']);?></option>'
            <?php
        }
    }     
               

    function feeOption()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_fee_method");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Fee_Method_Id']);?>"><?php echo trim($row['Fee_Method_Name']);?></option>'
            <?php
        }
    }

    function depositOption()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_deposit_method");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Deposit_Method_Id']);?>"><?php echo trim($row['Deposit_Method_Name']);?></option>'
            <?php
        }
    }

    function studentDropdown($classid)
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_student WHERE Class_Id = $classid");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Student_Id']);?>"><?php echo trim($row['Student_Name']);?>-<?php echo trim($row['Redg_No']);?></option>'
            <?php
        }
    }

    function yearDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_academicyear WHERE Active = 1 ORDER BY Academic_StartYear ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Academic_Id']);?>"><?php echo trim($row['Academic_StartYear']);?></option>'
            <?php
        }
    }

    function RouteDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_transport");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Transport_Id']);?>"><?php echo trim($row['Route']);?></option>'
            <?php
        }
    }
    function departmentDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_department");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Department_Id']);?>"><?php echo trim($row['Department_Name']);?></option>'
            <?php
        }
    }

        function staffDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_staff WHERE Active = 1 ORDER BY Staff_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Staff_Id']);?>"><?php echo trim($row['Staff_Name']);?></option>'
            <?php
        }
    }


    function certificateDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_certificates WHERE Active = 1 ORDER BY Certificate_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Certificates_Id']);?>"><?php echo trim($row['Certificate_Name']);?></option>'
            <?php
        }
    }

    function studentCertificateDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_studentcert WHERE Active = 1 ORDER BY Student_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Student_Id']);?>"><?php echo trim($row['Student_Name']);?></option>'
            <?php
        }
    }

        function staffCertificateDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_Staffcertificates WHERE Active = 1 ORDER BY Certificate_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Certificates_Id']);?>"><?php echo trim($row['Certificate_Name']);?></option>'
            <?php
        }
    }
    function buildingDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_building WHERE Active = 1 ORDER BY Building_Name ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Building_Id']);?>"><?php echo trim($row['Building_Name']);?></option>'
            <?php
        }
    }


        function RoomDropdown()
    {
        include('config/dbconnection.php');
        $result = $db->prepare("SELECT * FROM asitfa_room WHERE Active = 1 ORDER BY Room_No ASC");
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){ ?>
            <option value="<?php echo trim($row['Room_Id']);?>"><?php echo trim($row['Room_No']);?></option>'
            <?php
        }
    }
    
}