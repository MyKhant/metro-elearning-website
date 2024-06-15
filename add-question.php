<?php
include ('conn.php');

// define variables and set to empty values
//$QuestionErr = $answer_A_Err = $answer_B_Err = $answer_C_Err = $answer_D_Err = $correct_answer_Err = "";
//$quizQuestion = $answer_A = $answer_B = $answer_C = $answer_D = $correct_answer = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['quiz_subject'], $_POST['quiz_question'], $_POST['answer_A'], $_POST['answer_B'], $_POST['answer_C'], $_POST['answer_D'], $_POST['correct_Answer'])) {
        $quizSubject = $_POST['quiz_subject'];
        $quizQuestion = $_POST['quiz_question'];
        $answer_A = $_POST['answer_A'];
        $answer_B = $_POST['answer_B'];
        $answer_C = $_POST['answer_C'];
        $answer_D = $_POST['answer_D'];
        $correct_answer = $_POST['correct_Answer'];

        try {
            $sql = "INSERT INTO tbl_question (subject, question, answer_a, answer_b, answer_c, answer_d, correct_answer) VALUES ('$quizSubject', '$quizQuestion', '$answer_A', '$answer_B', '$answer_C', '$answer_D', '$correct_answer')";

            $conn->exec($sql);

            echo "<script>
            alert('Added Successfully!');
            window.location.href = 'http://localhost/metro-elearning/examination_teacher.php';
            </script>";
            exit();            

        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    } else {
        echo "<script>  
        alert('Please fill data in all content fields.');
        window.location.href = 'http://localhost/metro-elearning/examination_teacher.php';
        </script>";
    }
}
$conn->close();
?>
