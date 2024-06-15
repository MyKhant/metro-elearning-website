<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['question'])) {
        $questionID = $_GET['question'];

        try {
            $sql = "DELETE FROM tbl_question WHERE question_id = $questionID";
            $conn->exec($sql);

            // Redirect back to the examination dashboard page
            header("Location: http://localhost/metro-elearning/examination_teacher.php");
            exit();
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    } else {
        echo "Invalid request. Missing question ID.";
    }
} else {
    echo "Invalid request method. Use GET to delete a question.";
}
    //$conn->close();
?>
