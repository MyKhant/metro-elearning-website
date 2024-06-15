 <?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['exam_subject'], $_POST['exam_result'], $_POST['exam_id'], $_POST['exam_type'], $_POST['student_id'], $_POST['quizTaker'], $_POST['year_section'], $_POST['given_mark'], $_POST['totalScore'])) {
        $exam_subject = $_POST['exam_subject'];
        $exam_result = $_POST['exam_result'];
        $exam_id = $_POST['exam_id'];
        $exam_type = $_POST['exam_type'];
        $student_id = $_POST['student_id'];
        $quizTaker = $_POST['quizTaker'];
        $batch = $_POST['year_section'];
        $given_mark = $_POST['given_mark'];
        $totalScore = $_POST['totalScore']; 
        date_default_timezone_set("Asia/Bangkok");       
        $dateTaken = date("Y-m-d H:i:s");    

        try {
            $sql = "INSERT INTO tbl_result (exam_id, exam_type, subject, student_id, student_name, year_section, date_taken, given_mark, total_score, result) VALUES ('$exam_id', '$exam_type', '$exam_subject','$student_id', '$quizTaker', '$batch', '$dateTaken', '$given_mark', '$totalScore', '$exam_result')";
            $conn->exec($sql);  

            $sql = "DELETE FROM tbl_temp_question_result WHERE (exam_id = '$exam_id' && student_id = '$student_id')";
            $conn->exec($sql);

            echo "
                <script>
                    alert('Your Submitted Result Successfully !');
                    window.location.href = 'http://localhost/metro-elearning/index.php';
                </script>
            ";
            exit();

        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    } else {
        echo "
            <script>
                alert('Please fill in the all content fields.');
                window.location.href = 'http://localhost/metro-elearning/examination_result.php';
            </script>
        ";
    }
}
?>