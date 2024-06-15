<?php
    include ('conn.php');
    $sql1 = $conn->prepare('SELECT email FROM `tbl_teacher`');
    $sql1->execute();
    $result1 = $sql1->fetchAll(); 
    
    $sql2 = $conn->prepare('SELECT email, batch_id FROM `tbl_student`');
    $sql2->execute();
    $result2 = $sql2->fetchAll();
  
      static $user_role, $student_batch_id, $batch_name, $batch_id;
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
              $batch_id = $row['batch_id'];
                if($user_email == $email){ 
                    $user_role = "student";
                    $student_batch_id = $batch_id;                    
                    break; 
                } 
            } 
        }
        else  header('Location: login.php');
    
    $sql3 = $conn->prepare("SELECT batch_name FROM `tbl_batch`WHERE (batch_id = '$student_batch_id')");
    $sql3->execute();
    $result3 = $sql3->fetchAll();
    foreach ($result3 as $row) {
        $batch_name = $row['batch_name'];
    }
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
                    <h1 class="display-3 text-white animated slideInDown">Examination Result</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Course</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Examination Result</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Get Exam ID, Exam Type and Student ID !--> 
    <?php  
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['exam_id'], $_GET['exam_type'], $_GET['student_id'], $_GET['subject_type'])) {
                $exam_id = $_GET['exam_id'];
                $exam_type = $_GET['exam_type'];
                $student_id = $_GET['student_id'];
                $subject = $_GET['subject_type'];
                //echo $exam_id; echo $exam_type; echo $student_id;
            }
        }                  
    ?>

    <!-- Main Content -->
    <div class="container mt-3">
        <h1>Your <span class="text-success"> <?php echo $exam_type  . " (" . $subject . ")";?></span> Exam Result</h1>
        <h5 class="text-primary">The following are your answered Questions and Results:</h5>            
               
        <!-- Questions and Result Show Start -->
        <form action="add-result.php" method="post" id="question-result">
            <div class="question">
                <!-- Retrieve questions and answer from result database-->
                <?php                     
                    static $question_no = 0;
                    static $total_question = 0;
                    static $given_mark = 0;
                    static $total_score = 0;
                    static $exam_result = "Fail";
                    static $subject;
                    $sql = $conn->prepare("SELECT * FROM `tbl_temp_question_result` WHERE exam_id = '$exam_id' && student_id = '$student_id'");
                    $sql->execute();
                    $result = $sql->fetchAll();
                    static $i = 0;
                    foreach ($result as $row) {
                        $exam_id = $row['exam_id'];
                        $exam_type = $row['exam_type'];                         
                        $question_id = $row['question_id'];
                        $subject = $row['subject'];
                        $student_id = $row['student_id'];
                        $student_name = $row['student_name'];
                        $question = $row['question'];                        
                        $answerA = $row['answer_a'];
                        $answerB = $row['answer_b'];
                        $answerC = $row['answer_c'];
                        $answerD = $row['answer_d'];
                        $correct_Answer  = $row['correct_answer']; 
                        $check_Answer  = $row['check_answer']; 
                        $question_no = $question_no + 1;                        
                        $total_question = $total_question + 1;
                        $given_mark = $given_mark + 1;
                        // If the user's answer is correct
                        if($check_Answer == $correct_Answer){
                            $total_score ++; 
                            // update the number of correct_answered
                            $stmt = $conn->prepare("SELECT * FROM `tbl_question` WHERE question_id = '$question_id'");
                            $stmt->execute();
                            $result_1 = $stmt->fetchAll();
                            foreach ($result_1 as $row) {
                                $answer_student = $row['answer_student'];
                                $correct_student = $row['correct_student'];
                                $correct_student = $correct_student + 1;                                
                                $answer_student = $answer_student + 1;
                            }
                                $stmt_1 = $conn->prepare("UPDATE tbl_question SET              
                                    answer_student = :answer_student,
                                    correct_student = :correct_student
                                    WHERE question_id = :question_id");
                                    $stmt_1->bindParam(':question_id', $question_id);
                                    $stmt_1->bindParam(':answer_student', $answer_student); 
                                    $stmt_1->bindParam(':correct_student', $correct_student);                        
                                    $stmt_1->execute();                            
                        } 
                        // If the user's answer is not correct
                        else if($check_Answer != $correct_Answer) {                            
                            // update the number of answered question
                            $stmt = $conn->prepare("SELECT * FROM `tbl_question` WHERE question_id = '$question_id'");
                            $stmt->execute();
                            $result_1 = $stmt->fetchAll();
                            foreach ($result_1 as $row) {
                                $answer_student = $row['answer_student'];
                                $answer_student = $answer_student + 1;
                            }
                                $stmt_1 = $conn->prepare("UPDATE tbl_question SET              
                                    answer_student = :answer_student
                                    WHERE question_id = :question_id");
                                    $stmt_1->bindParam(':question_id', $question_id);
                                    $stmt_1->bindParam(':answer_student', $answer_student);                        
                                    $stmt_1->execute();                            
                        }                                                                              
                ?>
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Question <?= $question_no ?> ( <?= $subject ?> ) </h5>
                        <p class="card-text" name="question-<?= $i ?>" id="question-<?= $i ?>"><?= $question ?></p>
                        
                        <!-- Answer-A Start -->
                        <div class="form-check mb-2"> 
                        <?php
                                if($check_Answer == "A" && $check_Answer == $correct_Answer) {
                            ?>   
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-A" value="A" checked/>
                                    <label for="question-<?= $i ?>-answers-A" class="text-success fw-bold">a. <?= $answerA ?> </label><i class="ps-3 fa fa-check" style="font-size:20px; color:green"></i>
                            <?php
                                }else if ($check_Answer == "A" && $check_Answer != $correct_Answer) {
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-A" value="A" checked/>
                                    <label for="question-<?= $i ?>-answers-D">a. <?= $answerA ?> </label><i class="ps-3 fa fa-times" style="font-size:20px; color:red"></i> 
                            <?php
                                }else if ($check_Answer != "A" && $correct_Answer == "A") {                            
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-A" value="A"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-A").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-A" class="text-success fw-bold">a. <?= $answerA ?> </label> 
                            <?php
                            } else {               
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-A" value="A"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-A").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-A">a. <?= $answerA ?> </label>                      
                            <?php
                                }
                            ?>
                        </div>
                        
                        <!-- Answer-B Start -->
                        <div class="form-check mb-2">
                        <?php
                                if($check_Answer == "B" && $check_Answer == $correct_Answer) {
                            ?>   
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-B" value="B" checked/>
                                    <label for="question-<?= $i ?>-answers-B" class="text-success fw-bold">b. <?= $answerB ?> </label><i class="ps-3 fa fa-check" style="font-size:20px; color:green"></i>
                            <?php
                                }else if ($check_Answer == "B" && $check_Answer != $correct_Answer) {
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-B" value="B" checked/>
                                    <label for="question-<?= $i ?>-answers-B">b. <?= $answerB ?> </label><i class="ps-3 fa fa-times" style="font-size:20px; color:red"></i> 
                            <?php
                                }else if ($check_Answer != "B" && $correct_Answer == "B") {                            
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-B" value="B"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-B").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-B" class="text-success fw-bold">b. <?= $answerB ?> </label> 
                            <?php
                            } else {               
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-B" value="B"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-B").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-B">b. <?= $answerB ?> </label>                      
                            <?php
                                }
                            ?>
                        </div>
                        
                        <!-- Answer-C Start -->
                        <div class="form-check mb-2">
                        <?php
                                if($check_Answer == "C" && $check_Answer == $correct_Answer) {
                            ?>   
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-C" value="C" checked/>
                                    <label for="question-<?= $i ?>-answers-C" class="text-success fw-bold">c. <?= $answerC ?> </label><i class="ps-3 fa fa-check" style="font-size:20px; color:green"></i>
                            <?php
                                }else if ($check_Answer == "C" && $check_Answer != $correct_Answer) {
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-C" value="C" checked/>
                                    <label for="question-<?= $i ?>-answers-C">c. <?= $answerC ?> </label><i class="ps-3 fa fa-times" style="font-size:20px; color:red"></i> 
                            <?php
                                }else if ($check_Answer != "C" && $correct_Answer == "C") {                            
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-C" value="C"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-C").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-C" class="text-success fw-bold">c. <?= $answerC ?> </label> 
                            <?php
                            } else {               
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-C" value="C"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-C").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-C">c. <?= $answerC ?> </label>                      
                            <?php
                                }
                            ?>
                        </div>
                        
                        <!-- Answer-D Start -->
                        <div class="form-check mb-2">
                            <?php
                                if($check_Answer == "D" && $check_Answer == $correct_Answer) {
                            ?>   
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-D" value="D" checked/>
                                    <label for="question-<?= $i ?>-answers-D" class="text-success fw-bold">d. <?= $answerD ?> </label><i class="ps-3 fa fa-check" style="font-size:20px; color:green"></i>
                            <?php
                                }else if ($check_Answer == "D" && $check_Answer != $correct_Answer) {
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-D" value="D" checked/>
                                    <label for="question-<?= $i ?>-answers-D">d. <?= $answerD ?> </label><i class="ps-3 fa fa-times" style="font-size:20px; color:red"></i> 
                            <?php
                                }else if ($check_Answer != "D" && $correct_Answer == "D") {                            
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-D" value="D"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-D").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-D" class="text-success fw-bold">d. <?= $answerD ?> </label> 
                            <?php
                            } else {               
                            ?>
                                    <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-D" value="D"/>
                                    <script>
                                        document.getElementById("question-<?= $i ?>-answers-D").disabled = true;                        
                                    </script> 
                                    <label for="question-<?= $i ?>-answers-D">d. <?= $answerD ?> </label>                      
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>                                   
                <?php
                    $i++;
                    }
                    if (($total_score/$total_question) >= 0.6) $exam_result = "Pass";
                ?>
                                                     
            </div>          
                <!-- Questions and Result Show End -->

                <!-- Exam Result's Summary Show Start -->
            <div class="row mt-3">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <h5 class="py-3 text-center text-dark border border-3 border-primary rounded-3 bg-light">
                        Total Question :
					    <span class="pb-3 px-3"><?php echo $total_question; ?></span>
				    </h5> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">  
                    <h5 class="py-3 text-center text-primary border border-3 border-primary rounded-3 bg-light">
                        Given Mark :
					    <span class="pb-3 px-3"><?php echo $given_mark; ?></span>
				    </h5> 
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">  
                    <h5 class="py-3 text-center text-success border border-3 border-primary rounded-3 bg-light">
                        Your Score :
					    <span class="pb-3 px-3"><?php echo $total_score; ?></span>
				    </h5> 
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">  
                    <h5 class="py-3 text-center text-danger border border-3 border-primary rounded-3 bg-light">
                        Your Result :
					    <span class="pb-3 px-3"><?php echo $exam_result; ?></span>
				    </h5> 
                </div>              
            </div>                
                
                <!-- Submit Button -->
                <div class="mb-3 mt-3">              
                    <button type="button" class="btn btn-primary" name="submitResult" id="submitResult" onclick="myFunction()"> Submit Result </button>                
                </div>
        </form>                  
    </div> 
    
<footer>
    <?php
        include ('footer.php');
    ?>
</footer>
       <!-- Submit Exam Result Score Form -->
<script>    
    function myFunction() {
        var exam_result = '<?php echo $exam_result; ?>';
        var given_mark = '<?php echo $given_mark; ?>';
        var total_score = '<?php echo $total_score; ?>';
        var exam_id = '<?php echo $exam_id; ?>';
        var exam_type = '<?php echo $exam_type; ?>';
        var exam_subject = '<?php echo $subject; ?>';
        var batch = '<?php echo $batch_name; ?>';
        var student_id = '<?php echo $student_id; ?>';
        var student_name = '<?php echo $student_name; ?>';
        
        $("#resultModal").modal("show"); //Call Result Score Form Modal
        $("#exam_subject").val(exam_subject);  
        $("#exam_result").val(exam_result);
        $("#exam_id").val(exam_id);
        $("#exam_type").val(exam_type);
        $("#student_id").val(student_id); 
        $("#quizTaker").val(student_name); 
        $("#yearSection").val(batch);
        $("#given_mark").val(given_mark); 
        $("#totalScore").val(total_score);        
    }
</script>

</html>