<!-- Registration Modal -->
<div class="modal fade" id="registration">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Registration</h4>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal">  </button>
                </div>

                <!-- Modal body -->
                <form action="/action_page.php" class="mx-4">
                    <div class="mb-2 mt-2">
                        <label for="name" class="form-label text-primary">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>

                    <div class="mb-2">
                        <label for="phone" class="form-label text-primary">Phone:</label>
                        <input type="phone" class="form-control" id="phone" placeholder="Enter phone no." name="phone">
                    </div>
                    
                    <div class="mb-2">
                      <label for="email" class="form-label text-primary">Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div> 
    
                    <div class="mb-2">
                      <label for="pwd" class="form-label text-primary">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>

                    <div class="mb-3 mt-3">                                              
                        <span>Please<a href="#" data-bs-toggle="modal" data-bs-target="#login"> Login </a>after registration.</span>                        
                    </div>
                    
                    <div class="mb-2 mt-3">
                        <button type="reset" class="btn btn-danger me-3">Clear</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
    <!-- Registration End -->

    <!-- Login Modal -->
    <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal">  </button>
                </div>

                <!-- Modal body -->
                <form action="login.php" class="mx-4" method="POST">
                    <div class="mb-2 mt-2">
                      <label for="email" class="form-label text-primary">Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div> 
    
                    <div class="mb-2">
                      <label for="password" class="form-label text-primary">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                    </div>
                        
                    <div class="mb-3 mt-3">                                              
                        <span>Please<a href="#" data-bs-toggle="modal" data-bs-target="#registration"> Registraion </a>unless our member.</span>                        
                    </div>
                    
                    <div class="mb-2 mt-3">
                        <button type="reset" class="btn btn-danger me-3">Clear</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
<!-- Login End -->

<!-- Add Question Modal -->
<div class="modal fade mt-5" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuiz" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addQuestion">Add Question</h4>
                <button type="button" class="btn-close bg-primary" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mx-4" action="add-question.php" method="POST">
                    <div class="my-2">
                        <label for="quiz_subject" class="form-label text-primary">Subject</label>
                        <select id="subject" name="quiz_subject" class="mx-4 px-2 py-2" required>                            
                            <option selected></option>
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
                    <div class="my-2">
                        <label for="quiz_question" class="form-label text-primary">Question</label>
                        <input type="text" class="form-control" id="quizQuestion" name="quiz_question" placeholder="Enter Question" required>
                    </div>
                    <div class="my-2">
                    <label for="answer_A" class="form-label text-primary">Answer A</label>
                        <input type="text" class="form-control" id="answer_A" name="answer_A" placeholder="Answer (a)" required>
                    </div>
                    <div class="my-2">
                    <label for="answer_B" class="form-label text-primary">Answer B</label>
                        <input type="text" class="form-control" id="answer_B" name="answer_B" placeholder="Answer (b)" required>
                    </div>
                    <div class="my-2">
                    <label for="answer_C" class="form-label text-primary">Answer C</label>
                        <input type="text" class="form-control" id="answer_C" name="answer_C" placeholder="Answer (c)" required>
                    </div>
                    <div class="my-2">
                    <label for="answer_D" class="form-label text-primary">Answer D</label>
                        <input type="text" class="form-control" id="answer_D" name="answer_D" placeholder="Answer (d)" required>
                    </div>
                    <div class="my-2">
                        <label for="correct_Answer" class="form-label text-success">Correct Answer</label>
                        <select id="correct_Answer" name="correct_Answer" class="my-2 mx-4 px-5 py-2" required>                            
                            <option selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="mb-2 mt-3">
                        <button type="reset" class="btn btn-danger me-3">Clear</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Question End -->

<!-- Update Question Modal -->
<div class="modal fade mt-5" id="updateQuestionModal" tabindex="-1" aria-labelledby="updateQuiz" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editQuestion">Edit Question</h4>
                <button type="button" class="btn-close bg-primary" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mx-4" action="update-question.php" method="POST">
                    <input type="text" class="form-control" id="updateQuizID" name="updateQuizID" hidden>
                    
                    <div class="my-2">
                        <label for="update_Subject" class="form-label text-success">Subject</label>
                        <select id="updateSubject" name="update_Subject" class="mx-4 px-2 py-2" required>                            
                            <!-- <option selected></option> -->
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
                    <div class="my-2">
                        <label for="update_question" class="form-label text-primary">Question</label>
                        <input type="text" class="form-control" id="updateQuestion" name="update_question" required>
                    </div>
                    <div class="my-2">
                        <label for="answer_A" class="form-label text-primary">Answer A</label>
                        <input type="text" class="form-control" id="updateOptionA" name="answer_A" required>
                    </div>
                    <div class="my-2">
                        <label for="answer_B" class="form-label text-primary">Answer B</label>
                        <input type="text" class="form-control" id="updateOptionB" name="answer_B" required>
                    </div><div class="my-2">
                        <label for="answer_C" class="form-label text-primary">Answer C</label>
                        <input type="text" class="form-control" id="updateOptionC" name="answer_C" required>
                    </div>
                    <div class="my-2">
                        <label for="answer_D" class="form-label text-primary">Answer D</label>
                        <input type="text" class="form-control" id="updateOptionD" name="answer_D" required>
                    </div>
                    <div class="my-2">
                        <label for="correct_Answer" class="form-label text-success">Correct Answer</label>
                        <select id="updateCorrectAnswer" name="correct_Answer" class="my-2 mx-4 px-5 py-2" required>                            
                            <option selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                    <div class="mb-2 mt-3">
                        <button type="reset" class="btn btn-danger me-3">Clear</button>
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Question End -->

<!-- Add Result Modal -->
<div class="modal fade mt-5" id="resultModal" tabindex="-1" aria-labelledby="addQuiz" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="result">Check Your Exam Result Information</h5>
            </div>
            <div class="modal-body">
                <form action="add-result.php" method="POST">                    
                    <div class="form-group">
                        <label for="exam_id">Exam ID</label>
                        <input type="text" class="form-control" id="exam_id" name="exam_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exam_id">Exam Type</label>
                        <input type="text" class="form-control" id="exam_type" name="exam_type" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exam_subject">Subject</label>
                        <input type="text" class="form-control" id="exam_subject" name="exam_subject" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exam_result">Result</label>
                        <input type="text" class="form-control" id="exam_result" name="exam_result" readonly>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quizTaker">Student Full Name</label>
                        <input type="text" class="form-control" id="quizTaker" name="quizTaker" readonly>
                    </div>
                    <div class="form-group">
                        <label for="yearSection">Batch and Section</label>
                        <input type="text" class="form-control" id="yearSection" name="year_section" readonly>                        
                    </div>
                    <div class="form-group">
                        <label for="given_mark">Given Mark</label>
                        <input type="text" class="form-control" id="given_mark" name="given_mark" readonly>
                    </div>
                    <div class="form-group">
                        <label for="totalScore">Total Score</label>
                        <input type="text" class="form-control" id="totalScore" name="totalScore" readonly>
                    </div>                     
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Result End -->