<?php
  include ('conn.php');
  $sql1 = $conn->prepare('SELECT email FROM `tbl_teacher`');
  $sql1->execute();
  $result1 = $sql1->fetchAll(); 
  
  $sql2 = $conn->prepare('SELECT email FROM `tbl_student`');
  $sql2->execute();
  $result2 = $sql2->fetchAll();

    static $user_role;
      ob_start();
      session_start(); 
      if(isset($_SESSION['current_session'])){
          $user_name = $_SESSION["first_name"]. " ".$_SESSION["last_name"];
          $user_id = $_SESSION["user_id"];  
          $user_email = $_SESSION["user_email"]; 
          
          foreach ($result1 as $row) {
              $email = $row['email'];
              if($user_email == $email){ $user_role = "teacher"; break; } 
          } 
          foreach ($result2 as $row) {
            $email = $row['email'];
            if($user_email == $email){ $user_role = "student"; break; } 
        } 
      }
      else  header('Location: login.php'); 
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php
            include ('header.php');
            include ('modal.php');
        ?>
    </head>

    <body>
        <?php
            include ('spinner.php');  
            include ('navbar_course.php');                   
        ?>    
    
    
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-3 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">IP & FE Course</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Course</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Technology</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <?php
            
            include ('categories.php');
            include ('course.php');
            include ('testimonial.php');           
        ?>  
    
</body>
<footer>
        <?php
            include ('footer.php');
        ?>
</footer>

</html>