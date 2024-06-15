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
                if($user_email == $email) { 
                    $user_role = "teacher"; 
                    header('Location: logout.php'); 
                } 
            } 
            foreach ($result2 as $row) {
              $email = $row['email'];
                if($user_email == $email){ 
                    $user_role = "student"; 
                    break; 
                } 
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
            include ('navbar_exam.php');                     
        ?>
    
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Examination Question</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Course</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Examination Question</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Main Content -->
    <div class="container mt-3">
        <h1>Choose the Exam</h1>
        <h5 class="text-primary">Please choice the following Exam and Questions type:</h5>            
        <!-- Exam and Question Type Choice Start -->
        <form action="examination_student_take_question.php" method="GET" id="choose-question-type-form" class="my-5">                            
            <div class="row mt-3">
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3">                                       
                    <label for="exam_type" class="form-label">Exam</label>                    
                </div>
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3 float-start">       
                    <select id="exam_type" name="exam_type" class="px-4 py-2"> 
                        <?php
                            $sql3 = $conn->prepare('SELECT * FROM `tbl_exam`');
                            $sql3->execute();
                            $exam = $sql3->fetchAll();                                   
                            foreach ($exam as $row){
                        ?>
                            <option value = "<?php echo $row['exam_type']; ?>"> <?php echo $row['exam_type']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>                 
            </div>
                
            <div class="row mt-3">  
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3">                      
                    <label for="quiz_subject" class="form-label">Subject</label>
                </div>
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3 float-start"> 
                    <select id="subject" name="quiz_subject" class="px-3 py-2">
                        <?php
                            $sql4 = $conn->prepare('SELECT * FROM `tbl_subject`');
                            $sql4->execute();
                            $subject = $sql4->fetchAll();                                   
                            foreach ($subject as $row){
                        ?>
                            <option value = "<?php echo $row['subject_name']; ?>"> <?php echo $row['subject_name']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div> 
            </div>
            
            <div class="row mt-3">  
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3">                      
                    <label for="no_question" class="form-label">No. of Question</label>
                </div>
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3 float-start"> 
                    <input type="text" name="no_question" id="no_question" class="px-4 py-2" required>
                </div> 
            </div>
                <!-- Exam and Question Type Choice End --> 
                
                <!-- Submit and Clear Buttons -->
            <div class="row mt-3">
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3 float-end mb-3 mt-3">                    
                    <button type="reset" class="btn btn-danger me-3">Clear Choice</button>
                </div>
                <div class="col-xs-3 col-sm-3 col-lg-3 col-md-3 col-xl-3 float-end mb-3 mt-3">                 
                    <button type="submit" class="btn btn-primary" name="submitAnswer" id="submitAnswer"> Submit Question Type </button>                
                </div>
            </div>
        </form>        
    </div>  
    
<footer>
    <?php
        include ('footer.php');
    ?>
</footer>
</html>