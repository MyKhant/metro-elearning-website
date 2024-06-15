<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['result'])) {
        $resultID = $_GET['result'];

        try {
            $sql = "DELETE FROM tbl_result WHERE result_id = $resultID";
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
