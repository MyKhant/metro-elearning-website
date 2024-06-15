       
<?php
include ("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateQuizID'], $_POST['update_Subject'], $_POST['update_question'], $_POST['answer_A'], $_POST['answer_B'], $_POST['answer_C'], $_POST['answer_D'], $_POST['correct_Answer'])) {
        
        $QuestionID = $_POST['updateQuizID'];
        $update_subject = $_POST['update_Subject'];
        $update_question = $_POST['update_question'];
        $answer_A = $_POST['answer_A'];
        $answer_B = $_POST['answer_B'];
        $answer_C = $_POST['answer_C'];
        $answer_D = $_POST['answer_D'];
        $correct_answer = $_POST['correct_Answer'];  
        /*
        echo $QuestionID; echo $update_subject; echo $update_question; 
        echo $answer_A; echo $answer_B; echo $answer_C; echo $answer_D;
        echo $correct_answer;
        */
        try {
           //$sql = "UPDATE tbl_question SET question = $update_question, answer_a = $answer_A, answer_b = $answer_B, answer_c = $answer_C, answer_d = $answer_D, correct_answer = $correct_answer WHERE question_id == $QuestionID";          
           $stmt = $conn->prepare("UPDATE tbl_question SET 
                subject = :subject,
                question = :question,
                answer_a = :answer_a,
                answer_b = :answer_b,
                answer_c = :answer_c,
                answer_d = :answer_d,
                correct_answer = :correct_answer
                WHERE question_id = :question_id");

            $stmt->bindParam(':question_id', $QuestionID);
            $stmt->bindParam(':subject', $update_subject);
            $stmt->bindParam(':question', $update_question);
            $stmt->bindParam(':answer_a', $answer_A);
            $stmt->bindParam(':answer_b', $answer_B);
            $stmt->bindParam(':answer_c', $answer_C);
            $stmt->bindParam(':answer_d', $answer_D);
            $stmt->bindParam(':correct_answer', $correct_answer);

            $stmt->execute();

            echo "
            <script>
                alert('Updated Successfully!');
                window.location.href = 'http://localhost/metro-elearning/examination_teacher.php';
            </script>
            ";
            exit();
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    } else {
        echo "
        <script>
            alert('Please fill in all the required fields.');
            window.location.href = 'http://localhost/metro-elearning/examination_teacher.php';
        </script>
        ";    
    }
}
    $conn = null; 
?>

