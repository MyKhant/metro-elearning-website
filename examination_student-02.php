<?php
    include ('conn.php');
        $sql = $conn->prepare('SELECT email FROM `tbl_student`');
        $sql->execute();
        $result = $sql->fetchAll();        

            ob_start();
            session_start(); 
            if(isset($_SESSION['current_session'])){
                $user_name = $_SESSION["first_name"]. " ".$_SESSION["last_name"];
                $user_id = $_SESSION["user_id"];  
                $user_email = $_SESSION["user_email"]; 
                
                foreach ($result as $row) {
                    $email = $row['email'];
                    if($user_email == $email) break; 
                } 
                if($user_email != $email) header('Location: logout.php');  
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
    <?php  
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['exam_type'], $_GET['quiz_subject'], $_GET['no_question'])) {
                $exam_type = $_GET['exam_type'];
                $subject_type = $_GET['quiz_subject'];
                $num_question = $_GET['no_question'];
            }
            echo $exam_type; $subject_type; $num_question;
        }
                  
    ?>
    <!-- Main Content -->
    <div class="container mt-3">
        <h1>Take the Exam</h1>
        <h5 class="text-primary">Answer the following questions:</h5>            
        <!-- Questions Start -->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="question-form">
            <div class="question">
                <!-- Retrieve questions from question database-->
                <?php                     
                    $student_id = $user_id;
                    $student_name = $user_name;
                    static $question_no = 0;
                    static $correctAnswer;
                    $sql = $conn->prepare("SELECT * FROM `tbl_question` WHERE subject = '$exam_type'");
                    $sql->execute();
                    $result = $sql->fetchAll();
                    static $i = 0;
                    foreach ($result as $row) {
                        $questionID = $row['question_id'];
                        $subject = $row['subject'];
                        $question = $row['question'];
                        $answerA = $row['answer_a'];
                        $answerB = $row['answer_b'];
                        $answerC = $row['answer_c'];
                        $answerD = $row['answer_d'];
                        $correctAnswer  = $row['correct_answer']; 
                        $question_no = $question_no + 1;
                        //echo $subject;                            
                ?>
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Question <?= $question_no ?> ( <?= $subject ?> )</h5>
                        <p class="card-text" name="question-<?= $i ?>" id="question-<?= $i ?>"><?= $question ?></p>
                        <div class="form-check mb-2">    
                            <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-A" value="A" />
                            <label for="question-<?= $i ?>-answers-A">a. <?= $answerA ?> </label>
                        </div>
                    
                        <div class="form-check mb-2">
                            <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-B" value="B" />
                            <label for="question-<?= $i ?>-answers-B">b. <?= $answerB ?> </label>
                        </div>
                    
                        <div class="form-check mb-2">
                            <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-C" value="C" />
                            <label for="question-<?= $i ?>-answers-C">c. <?= $answerC ?> </label>
                        </div>
                    
                        <div class="form-check mb-2">
                            <input type="radio" name="question-<?= $i ?>-answer" id="question-<?= $i ?>-answers-D" value="D" />
                            <label for="question-<?= $i ?>-answers-D">d. <?= $answerD ?> </label>
                        </div>                            
                    </div>
                </div>
                            <input type="hidden" name="question_id-<?= $i ?>" id="question-<?= $i ?>" value="<?php echo $questionID; ?>"/>
                            <input type="hidden" name="subject-<?= $i ?>" value="<?php echo $subject; ?>"/>
                            <input type="hidden" name="question-<?= $i ?>" value="<?php echo $question; ?>"/>
                            <input type="hidden" name="answerA-<?= $i ?>" value="<?php echo $answerA; ?>"/>
                            <input type="hidden" name="answerB-<?= $i ?>" value="<?php echo $answerB; ?>"/>
                            <input type="hidden" name="answerC-<?= $i ?>" value="<?php echo $answerC; ?>"/>
                            <input type="hidden" name="answerD-<?= $i ?>" value="<?php echo $answerD; ?>"/>
                            <input type="hidden" name="correctAnswer-<?= $i ?>" value="<?php echo $correctAnswer; ?>"/>        
                <?php
                    $i++;
                    }
                ?>
                            <input type="hidden" name="count" value="<?php echo $i; ?>"/>
                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>"/>   
                            <input type="hidden" name="student_name" value="<?php echo $student_name; ?>"/>                          
            </div>          
                <!-- Question End --> 
                
                <!-- Submit Button -->
                <div class="mb-3 mt-3">                    
                    <button type="reset"  class="btn btn-danger me-3">Clear Answers</button>
                    <!--<button type="submit" class="btn btn-primary">Submit Answers</button>  !-->                
                    <button type="submit" class="btn btn-primary" name="submitAnswer" id="submitAnswer"> Submit Answers </button>                
                </div>
        </form>        
    </div>   

    <?php    
        //insert all input form data into the database
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submitAnswer'])) {
                $count = $_POST['count']; 
                $user_id = $_POST['student_id']; // record user id 
                $user_name = $_POST['student_name']; // record user name 
                $exam_id = uniqid(); //random generate exam-id             
                for ($i = 0; $i < $count; $i++) {                    
                    $user_check_answer = $_POST['question-'.$i.'-answer']; // record user check answer
                    $user_question_id = $_POST['question_id-'.$i]; // record user question id
                    $user_subject = $_POST['subject-'.$i]; // record user subject
                    $user_question = $_POST['question-'.$i]; // record user question
                    $user_answerA = $_POST['answerA-'.$i]; // record user answer_a
                    $user_answerC = $_POST['answerB-'.$i]; // record user answer_b
                    $user_answerB = $_POST['answerC-'.$i]; // record user answer_c
                    $user_answerD = $_POST['answerD-'.$i]; // record user answer_d
                    $user_correctAnswer = $_POST['correctAnswer-'.$i]; // record user correct answer
                                    
                    try {
                        $sql = "INSERT INTO tbl_temp_question_result (exam_id, question_id, subject, student_id, student_name, question, answer_a, answer_b, answer_c, answer_d, correct_answer, check_answer) VALUES ('$exam_id', '$user_question_id','$user_subject', '$user_id', '$user_name', '$user_question', '$user_answerA', '$user_answerB', '$user_answerC', '$user_answerD', '$user_correctAnswer', '$user_check_answer')";
                        $conn->exec($sql);  
            
                    } catch (PDOException $e) {
                        echo 'Database Error: ' . $e->getMessage();
                    }                
                } 
                    echo "<script>
                        alert('Successfully checked answer for all questions');
                        window.location.href = 'http://localhost/metro-elearning/examination_result.php';
                        </script>";
                        exit();
            }                                 
        }
        //$conn->close();                
    ?>
<footer>
    <?php
        include ('footer.php');
    ?>
</footer>
</html>