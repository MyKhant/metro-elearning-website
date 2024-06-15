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
          
          foreach ($result2 as $row) {
              $email = $row['email'];
              if($user_email == $email) { 
                  $user_role = "student"; 
                  header('Location: logout.php'); 
              } 
          } 
          foreach ($result1 as $row) {
            $email = $row['email'];
              if($user_email == $email){ 
                  $user_role = "teacher"; 
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
        <!-- Style CSS -->
        <link rel="stylesheet" href="./assets/style.css">

        <!-- Bootstrap 4.6 CSS 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        -->
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
            
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
                    <h1 class="display-3 text-white animated slideInDown">Question Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Course</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Question</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Exam Dashboard Start -->
    <div class="container mt-4"> 
            <h3 class="text-primary">Question Dashboard</h3>  
           
        <div class="card mb-4 shadow-sm quiz-container">
        <div class="card-body">                
        <nav class="mt-4">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Graph</button>
                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Detail</button>
            </div>
        </nav>                
        <div class="tab-content" id="nav-tabContent">            
        <!-- Exam Question Dashboard Graph Start -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <!-- Dashboard Start -->
                <div class="container mt-3 mb-2">
		            <div class="row g-0">	<!-- Wrapper -->
			        <nav class="col-2 bg-light pr-3 border-end"> <!-- Left Side Nav -->
				            <h1 class="h5 py-3 text-center text-success">
					            <i class="fas fa-ghost me-2"></i>
					            <span class="d-none d-lg-inline"><?php echo $user_name; ?></span>
				            </h1>
				
				        <div class="list-group text-center text-lg-start">					        
                            <a href="#" class="list-group-item list-group-item-action active">
                            <i class="fas fa-home"></i> <span class="d-none d-lg-inline"> Dashboard </span>
                            </a> 
                            <span class="list-group-item disabled d-none d-lg-block text-primary">
                                CONTROLS 
                            </span>
					        <a href="it_course.php" class="list-group-item list-group-item-action">
						        <i class="fas fa-edit"></i><span class="d-none d-lg-inline"> Course </span>
                                <span class="d-none d-lg-inline badge bg-danger rounded-pill float-right">20</span>
					        </a>
                            <a href="examination_section.php" class="list-group-item list-group-item-action">
						        <i class="fas fa-users"></i><span class="d-none d-lg-inline"> Questions </span>
						        <span class="d-none d-lg-inline badge bg-danger rounded-pill float-right">10</span>
					        </a>                            
					        <a href="#" class="list-group-item list-group-item-action">
						        <i class="fas fa-chart-line"></i><span class="d-none d-lg-inline"> Statistics </span>
					        </a>
					        <a href="#" class="list-group-item list-group-item-action">
						        <i class="fas fa-flag"></i><span class="d-none d-lg-inline"> Reports </span>
					        </a>
					        <a href="#" class="list-group-item list-group-item-action">
						        <i class="far fa-calendar-alt"></i><span class="d-none d-lg-inline"> Add Events </span>
					        </a>
				        </div>

				        <div class="list-group mt-5 text-center text-lg-start">
					        <span class="list-group-item disabled d-none d-lg-block text-primary">
						        UPDATE INFO
					        </span>
					        <a href="team.php" class="list-group-item list-group-item-action">
						        <i class="fas fa-user"></i><span class="d-none d-lg-inline"> New Teachers </span>
					        </a>
					        <a href="programming_course.php" class="list-group-item list-group-item-action">
						        <i class="fas fa-edit"></i><span class="d-none d-lg-inline"> New Subjects </span>
					        </a>
                            <a href="examination_section.php" class="list-group-item list-group-item-action">
						        <i class="far fa-calendar-alt"></i><span class="d-none d-lg-inline"> New Questions </span>
					        </a>
					        <a href="examination_section.php" class="list-group-item list-group-item-action">
						        <i class="fas fa-users"></i><span class="d-none d-lg-inline"> New Exams </span>
					        </a>
				        </div>
			        </nav> <!-- Left Side Nav -->
			
                <main class="col-10 bg-secondary"> <!-- Right Side Nav Start -->				
				    <nav class="navbar navbar-expand-lg navbar-light bg-light">
					    <div class="flex-fill"></div>
					        <div class="navbar nav pb-0 mb-0">
						        <li class="nav-item dropdown">
							        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
								        <i class="fas fa-user-circle"></i>
							        </a>
							        <ul class="dropdown-menu dropdown-menu-right">
								        <li><a href="profile.php" class="dropdown-item">User Profile</a></li>
								        <li><a href="logout.php" class="dropdown-item">Logout</a></li>
							        </ul>
						        </li>
						        <li class="nav-item">
							        <a href="#" class="nav-link">
								        <i class="fas fa-cog"></i>
							        </a>
						        </li>
					        </div>
				    </nav> <!-- Right Side Nav End --> 
                               
				        <div class="container-fluid p-3"> <!-- Right Side Content Start-->	
					        <div class="row flex-column flex-lg-row"> <!-- Content Row 1 -->
						        <h2 class="h6 text-white">QUICK STATES</h2>
						        <div class="col">
							        <div class="card mb-3">
								        <div class="card-body">
									        <h3 class="card-title h2">1,00</h3>
									        <span class="text-success">
                                                <i class="fas fa-chart-pie"></i>
										        Total Courses
									        </span>
								        </div>
							        </div>
						        </div>
						        <div class="col">
							        <div class="card mb-3">
								        <div class="card-body">
									        <h3 class="card-title h2">50</h3>
									        <span class="text-primary">
										        <i class="fas fa-chart-line"></i>
										        Learning Courses
									        </span>
								        </div>
							        </div>
						        </div>
						        <div class="col">
							        <div class="card mb-3">
								        <div class="card-body">
									        <h3 class="card-title h2">2,00</h3>
									        <span class="text-warning">
										        <i class="fas fa-chart-pie"></i>
										        Total Questions
									        </span>
								        </div>
							        </div>
						        </div>
						        <div class="col">
							        <div class="card mb-3">
								        <div class="card-body">
									        <h3 class="card-title h2">70</h3>
									            <span class="text-danger">
										            <i class="fas fa-chart-bar"></i>
										            Answer Questions
									            </span>
								        </div>
							        </div>
						        </div>
					        </div> <!-- Content Row 1 -->

					        <div class="row mt-4 flex-column flex-lg-row"> <!-- Content Row 2 -->
						        <div class="col">
							        <h2 class="h6 text-white">STUDENT PROGRESS</h2>
							        <div class="card mb-3" style="height: 280px">
								        <div class="card-body">
									        <small class="text-muted">Courses</small>
									        <div class="progress mb-4 mt-2" style="height: 5px">
										        <div class="progress-bar bg-success w-25"></div>
									        </div>

									        <small class="text-muted">Questions</small>
									        <div class="progress mb-4 mt-2" style="height: 5px">
										        <div class="progress-bar bg-primary w-75"></div>
									        </div>

									        <small class="text-muted">Exams</small>
									        <div class="progress mb-4 mt-2" style="height: 5px">
										        <div class="progress-bar bg-warning w-50"></div>
									        </div>

									        <small class="text-muted">Results (Pass)</small>
									            <div class="progress mb-4 mt-2" style="height: 5px">
										            <div class="progress-bar bg-danger w-25"></div>
									            </div>
								        </div>
							        </div>
						        </div>
						            <div class="col">
							            <h2 class="h6 text-white">STUDENT COURSE AND EXAM DATA</h2>
							            <div class="card mb-3" style="height: 280px">
								            <div class="card-body">
									            <div class="text-right">
										            <button class="btn btn-sm btn-outline-primary">
											            <i class="fas fa-search"></i>
										            </button>
										            <button class="btn btn-sm btn-outline-success">
											            <i class="fas fa-sort-amount-up"></i>
										            </button>
										            <button class="btn btn-sm btn-outline-danger">
											            <i class="fas fa-filter"></i>
										            </button>
									            </div>
									            <table class="table">
										            <tr>
											            <th>ID</th>
											            <th>Item Group</th>
											            <th>Data</th>
											            <th>Progress</th>
										            </tr>
										            <tr>
											            <td>1</td>
											            <td>Course</td>
											            <td>100</td>
											            <td>50%</td>
										            </tr>
										            <tr>
											            <td>2</td>
											            <td>Question</td>
											            <td>150</td>
											            <td>19%</td>
										            </tr>
										            <tr>
											            <td>3</td>
											            <td>Exam</td>
											            <td>200</td>
											            <td>28%</td>
										            </tr>
										            <tr>
											            <td>4</td>
											            <td>Result</td>
											            <td>2</td>
											            <td>11%</i></td>
										            </tr>
									            </table>
								            </div>
							            </div>
						            </div>
					        </div> <!-- Content Row 2 -->

				        </div> <!-- Right Side Content End-->

			    </main> <!-- Main (Nav & Content) -->
			
		    </div> <!-- Wrapper -->		
	    </div>
        <!-- Dashboard End -->            
    </div>                
</div>                 
            <!-- Exam Question Dashboard Detail Start -->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row mt-3">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 col-xl-12">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="choose-question-type-form" class="mt-3">                   
                        <!-- Question's Type Search Start --> 
                        <label for="subject_type" class="form-label px-3 py-1 float-start">Subject</label>
                        <select id="subject_type" name="subject_type" class="px-1 py-1 float-start">                            
                            <option value="All">All</option>
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
                        <button type="submit" class="btn btn-secondary mx-3" name="search-question-button" id="search-question-button">Search Question</button>                                                            
                        <button type="button" class="btn btn-primary float-end mx-5" id="add-question-button" data-toggle="modal" data-target="#addQuestionModal">Add Question</button> 
                    </form>                                   
                </div>
            </div>

            <div class="table-area bg-light mt-3">
                <table class="table" style="color: black;">
                    <thead>
                        <tr>
                            <th scope="col" class="col-lg-1 text-center" >No.</th>
                            <th scope="col" class="col-lg-1 text-center" >Subject</th>
                            <th scope="col" class="col-lg-6 text-center">Question</th>
                            <th scope="col" class="col-lg-1 text-center">Answered Number</th>
                            <th scope="col" class="col-lg-1 text-center">Corrected Number</th>
                            <th scope="col" class="col-lg-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                if (isset($_POST['subject_type']) && ($_POST['subject_type'] != "All")) {
                                    $subject_type = $_POST['subject_type']; 
                                    $stmt = $conn->prepare("SELECT * FROM `tbl_question` WHERE subject = '$subject_type'");
                                } 
                                else if (isset($_POST['subject_type']) && ($_POST['subject_type'] == "All"))
                                    $stmt = $conn->prepare('SELECT * FROM `tbl_question`');
                            }
                                else $stmt = $conn->prepare('SELECT * FROM `tbl_question`');
                                
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                static $question_no = 0;
                                foreach ($result as $row) {
                                    $questionID = $row['question_id'];
                                    $subject = $row['subject'];
                                    $question = $row['question'];
                                    $answerA = $row['answer_a'];
                                    $answerB = $row['answer_b'];
                                    $answerC = $row['answer_c'];
                                    $answerD = $row['answer_d'];
                                    $correctAnswer = $row['correct_answer'];
                                    $answer_student = $row['answer_student']; 
                                    $correct_student = $row['correct_student']; 
                                    $question_no = $question_no + 1;
                        ?>
                            <tr>
                                <td class="text-center"><?= $question_no ?></td>
                                <td id="quizID-<?= $questionID ?>" hidden><?= $questionID ?></td>
                                <td id="subject-<?= $questionID ?>" class="text-center"><?= $subject ?></td>
                                <td id="quizQuestion-<?= $questionID ?>"><?= $question ?></td>
                                <td id="optionA-<?= $questionID ?>" hidden><?= $answerA ?></td>
                                <td id="optionB-<?= $questionID ?>" hidden><?= $answerB ?></td>
                                <td id="optionC-<?= $questionID ?>" hidden><?= $answerC ?></td>
                                <td id="optionD-<?= $questionID ?>" hidden><?= $answerD ?></td>
                                <td id="correctAnswer-<?= $questionID ?>" hidden><?= $correctAnswer ?></td>
                                <td id="answer_student-<?= $questionID ?>" class="text-center"><?= $answer_student ?></td>
                                <td id="correct_student-<?= $questionID ?>" class="text-center"><?= $correct_student ?></td>
                                <td class="text-center">
                                <button type="button" class="btn btn-secondary" onclick="updateQuestion(<?= $questionID ?>)"><i class="fa-solid fa-pencil"></i></button>
                                <button type="button" class="btn btn-danger" onclick="deleteQuestion(<?= $questionID ?>)"><i class="fa-solid fa-trash"></i></button>
                                </td>
                                </tr>
                        <?php
                            }                                 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </div>
    </div>   
          
    </div> 
    <!-- Exam Dashboard End -->
    
</body>
<footer>
    <!-- Script JS -->
    <script src="./assets/script.js"></script>
    
    <!-- Bootstrap 4.6 JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <?php
        include ('footer.php');
    ?>
</footer>

</html>