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
            include ('conn.php');
            include ('modal.php');
        ?>
    </head>
    <body>    
        <?php
            include ('spinner.php'); 
            include ('navbar.php');
            include ('carousel.php');
            include ('service.php');
            include ('about_sector.php');
            include ('categories.php');
            include ('course.php');
            include ('lecturer.php');
            include ('testimonial.php');           
        ?>  
    </body>
    <footer>
        <?php
            include ('footer.php');
        ?>
    </footer>    
</html>       
 

    