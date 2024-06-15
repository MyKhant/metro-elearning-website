<?php  
  require_once('./functions/Signup.php');
  if (isset($_POST) && count($_POST) > 0) {
        $Response = Signup($_POST);
  }

  include ('conn.php');
  $sql1 = $conn->prepare('SELECT email FROM `tbl_teacher`');
  $sql1->execute();
  $result1 = $sql1->fetchAll(); 
  
  $sql2 = $conn->prepare('SELECT email FROM `tbl_student`');
  $sql2->execute();
  $result2 = $sql2->fetchAll();

    static $user_role;
      ob_start();
      //session_start(); 
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
    <html lang="en-us">
    <head>
    <?php
            include ('header.php');
            include ('conn.php');
        ?>
    </head>
    <body>
        <?php
            include ('spinner.php');
            include ('navbar.php');                       
            
            $sql = $conn->prepare("SELECT * FROM `user` WHERE user_id = '$user_id'");
            $sql->execute();
            $result = $sql->fetchAll(); 
            foreach ($result as $row) {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $first_create = $row['created_at'];
                $last_update = $row['updated_at'];
                $password = $row['password'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $phone_no = $row['phone_no'];
                $address = $row['address'];
            }
        ?>
        <div class="container">
         <div class="row justify-content-center my-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">                        
                        <h3 class="card-title text-center mb-3"><?php echo $first_name ." ". $last_name ;?> Profile</h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                <h6 class="text-start mb-3 text-primary">Created: <?php echo $first_create ;?></h6>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                <h6 class="text-end mb-3 text-primary"> Updated: <?php echo $last_update ;?></h6>
                            </div>
                        </div>
                            <?php if (isset($Response['error'])): ?>
                            <!-- Bootstrap Alert -->
                            <div class="alert alert-danger alert-dismissable mb-3"><b>Oops</b>, <?php echo $Response['error']; ?></div>
                            <!-- Bootstrap Alert -->
                        <?php endif; ?>
                        <!-- User Profile Form !-->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $first_name;?>" required>
                                    </div>
                                    <?php if (isset($Response['first_name']) && !empty($Response['first_name'])): ?>
                                        <small class="alert alert-danger alert-dismissable"><?php echo $Response['first_name'];?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last_name;?>" required>
                                    </div>
                                    <?php if (isset($Response['last_name']) && !empty($Response['last_name'])): ?>
                                        <small class="alert alert-danger alert-dismissable"><?php echo $Response['last_name'];?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value=<?php echo $email;?> required>
                                    </div>
                                    <?php if (isset($Response['email']) && !empty($Response['email'])): ?>
                                        <small class="alert alert-danger alert-dismissable"><?php echo $Response['email'];?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" value=<?php echo $password;?> required>
                                    </div>
                                    <?php if (isset($Response['password']) && !empty($Response['password'])): ?>
                                        <small class="alert alert-danger alert-dismissable"><?php echo $Response['password'];?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value=<?php echo $dob;?> required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="gender">Gender</label><br>
                                            <!-- Display Selected value based on the Database value !-->
                                        <?php                                        
                                            if($gender == "Male")
                                                $status = 1;
                                            else if($gender == "Female")
                                                $status = 2; 
                                            else
                                                $status = 0; 
                                            
                                            echo "
                                                <select class='px-5 py-1' id='gender' name='gender' onchange='javascript:adminstatus()'>
                                                    <option value=''" . ($status == '0'?'selected':'') . ">Select Gender</option>
                                                    <option value='Male' " . ($status == '1'?'selected':'') . ">Male</option>
                                                    <option value='Female' " . ($status == '2'?'selected':'') . ">Female</option>
                                                </select>                                            
                                            ";
                                        ?>
                                    </div>                                    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="phone_no">Phone No.</label>
                                        <input type="text" name="phone_no" id="phone_no" class="form-control" value="<?php echo $phone_no;?>" required>
                                    </div>                                  
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12 col-xl-6">
                                    <div class="form-group pb-3">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $address;?>" required>
                                    </div>
                                </div>                                                                
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group pb-2">
                                        <button type="reset" class="btn btn-danger btn-block float-start">Clear Info</button>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group pb-2">
                                        <button type="submit" class="btn btn-success btn-block float-end">Edit Profile</button>
                                    </div>
                                </div>
                            </div>                            
                        </form>  
                            <!-- User Profile Form !-->                      
                    </div>
                </div>
            </div>
         </div>
        </div>  
        <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['dob'], $_POST['gender'], $_POST['phone_no'], $_POST['address'])) {
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $full_name = $first_name. " ". $last_name;
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $dob = $_POST['dob'];
                        $gender = $_POST['gender'];
                        $phone_no = $_POST['phone_no'];
                        $address = $_POST['address']; 
                        date_default_timezone_set("Asia/Bangkok");       
                        $dateTaken = date("Y-m-d H:i:s");                       
                        try {                                                       
                                // update the user information in user table
                                $stmt = $conn->prepare("UPDATE user SET              
                                first_name = :first_name,
                                last_name = :last_name,
                                email = :email,
                                updated_at = :updated_at,
                                password = :password,
                                dob = :dob,
                                gender = :gender,
                                phone_no = :phone_no,
                                address = :address
                                WHERE user_id = :user_id");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->bindParam(':first_name', $first_name);
                                $stmt->bindParam(':last_name', $last_name);                                 
                                $stmt->bindParam(':email', $email);
                                $stmt->bindParam(':updated_at', $dateTaken);  
                                $stmt->bindParam(':password', $password); 
                                $stmt->bindParam(':dob', $dob); 
                                $stmt->bindParam(':gender', $gender); 
                                $stmt->bindParam(':phone_no', $phone_no); 
                                $stmt->bindParam(':address', $address);                        
                                $stmt->execute();

                                // update the user information in result table 
                                $stmt1 = $conn->prepare("UPDATE tbl_result SET              
                                student_name = :full_name
                                WHERE student_id = :user_id");
                                $stmt1->bindParam(':user_id', $user_id);
                                $stmt1->bindParam(':full_name', $full_name);
                                $stmt1->execute();
                                
                                echo "
                                <script>
                                        alert('Your Profile Update is Successfully!');
                                        window.location.href = 'http://localhost/metro-elearning/logout.php';
                                </script>
                                ";
                                exit();
                            } catch (PDOException $e) {
                                echo 'Database Error: ' . $e->getMessage();
                            }
                    } else {
                        echo "
                        <script>
                                alert('Please fill in all the fields.');
                                window.location.href = 'http://localhost/metro-elearning/profile.php';
                        </script>
                        ";
                    }
                } 
        ?>

    </body>
    <footer>
        <?php
            include ('footer.php');
        ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
