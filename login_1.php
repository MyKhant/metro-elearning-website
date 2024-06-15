<?php
  ob_start();
  session_start();
  include 'conn.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];  
  
        try {  
            $sql = "SELECT * FROM `tbl_student` WHERE student_name = $email and password = $password";
            $row = mysql_num_rows($sql);
            if($row == 1)
            {
	            session_start();
                $_SESSION['user'] = $_POST['student_name'];
	            $_SESSION['batch'] = $_POST['batch_id'];
	
	            header('Location: examination_student.php'); 
            }
            else
            {
	            echo '<script type="text/javascript">';
	            echo 'alert("Wrong login. Try again!!")';
	            echo '</script>';  
            }
        }
        catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    }else {
            echo "<script>  
            alert('Please fill data in all content fields.');
            window.location.href = 'http://localhost/metro-elearning/index.php';
            </script>";
        }
}
    $conn->close();
?>