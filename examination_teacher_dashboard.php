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
                    <h1 class="display-3 text-white animated slideInDown">Examination Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Course</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Examination</a></li>
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
            <h3 class="text-primary">Examination Dashboard</h3>  
           
        <div class="card mb-4 shadow-sm quiz-container">
        <div class="card-body">                
        <nav class="mt-4">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Graph</button>
            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Detail</button>
            </div>
        </nav>                
    <div class="tab-content" id="nav-tabContent">
            <!-- Exam Result Dashboard Graph Start -->
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
						        <i class="fas fa-users"></i><span class="d-none d-lg-inline"> Exams </span>
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
					    <div class="flex-fill text-center"></div>
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
										        Total Exams
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
										            Answered Exams
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
             <!-- Exam Detail Result Dashboard Start -->
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <!-- Result's Type Search Start -->
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="choose-result-type-form" class="mt-3"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4"> 
                        <div class="form-group pb-3">
                            <label for="type_exam" class="form-label px-2 py-1">Exam</label>
                            <select id="type_exam" name="type_exam" class="px-2 py-1 float-end">
                                <option value="All">All</option>                            
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
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="form-group pb-3">
                            <label for="subject_type" class="form-label px-2 py-1">Subject</label>
                            <select id="subject_type" name="subject_type" class="px-2 py-1 float-end">                            
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
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="form-group pb-3">
                            <label for="result_type" class="form-label px-2 py-1 float-start">Result</label>
                            <select id="result_type" name="result_type" class="px-4 py-1">                            
                            <option value="All">All</option>
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                            </select>
                        </div>
                    </div>               
                </div>
                <div class="row">                        
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="form-group pb-3">                     
                            <label for="start_date" class="form-label px-2 py-1">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="px-2 py-1 float-end" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4"> 
                        <div class="form-group pb-3">                     
                            <label for="end_date" class="form-label px-2 py-1">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="px-2 py-1 float-end" required>
                        </div> 
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        
                    </div>                        
                </div> 
                <div class="row">                        
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="form-group pb-3">  
                            <label for="year_section" class="form-label px-2 py-1 float-start">Year and Section</label>
                            <select id="year_section" name="year_section" class="px-4 py-1 float-end">                            
                                <option value="">All</option>
                                <?php
                                   $sql5 = $conn->prepare('SELECT * FROM `tbl_batch`');
                                   $sql5->execute();
                                   $subject = $sql5->fetchAll();                                   
                                   foreach ($subject as $row){
                                ?>
                                <option value = "<?php echo $row['batch_name']; ?>"> <?php echo $row['batch_name'] ." Batch"; ?></option>
                                <?php
                                   }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4"> 
                        <div class="form-group pb-3">                     
                            <label for="student" class="form-label px-2 py-1">Student</label>
                            <input type="text" name="student" id="student" class="px-2 py-1 float-end">
                        </div> 
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="form-group pb-3">                    
                            <button type="submit" class="btn btn-secondary mx-5 float-start" name="search-result-button" id="search-result-button">Search Result</button>
                        </div>
                    </div>                        
                </div>
            </form>               
                <!-- Result's Detail Show Start -->
                <div class="table-area bg-light mt-3">
                    <table class="table" style="color: black;">
                        <thead>
                        <tr>
                            <th scope="col" class="col-lg-1 text-center">No.</th>
                            <th scope="col" class="col-lg-1 text-left">Exam</th>
                            <th scope="col" class="col-lg-1 text-center">Subject</th>
                            <th scope="col" class="col-lg-2 text-center">Student</th>
                            <th scope="col" class="col-lg-1 text-center">Batch</th>
                            <th scope="col" class="col-lg-2 text-center">Date Taken</th>
                            <th scope="col" class="col-lg-1 text-center">Given Mark</th>
                            <th scope="col" class="col-lg-1 text-center">Your Score</th>                            
                            <th scope="col" class="col-lg-1 text-center">Result</th>
                            <th scope="col" class="col-lg-1 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $student = "";
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                if (isset($_POST['type_exam'], $_POST['subject_type'], $_POST['result_type'], $_POST['start_date'], $_POST['end_date'], $_POST['student'], $_POST['year_section'])) {
                                    $type_exam = $_POST['type_exam'];
                                    $type_subject = $_POST['subject_type'];
                                    $result_type = $_POST['result_type'];
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];
                                    $student = $_POST['student'];
                                    $year_section = $_POST['year_section'];
                                                                        
                                    if( $type_exam != "All" && $type_subject != "All" && $result_type != "All" && $year_section == "" && $student == "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date'))");
                                    else if( $type_exam != "All" && $type_subject != "All" && $result_type != "All" && $year_section != "" && $student == "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam != "All" && $type_subject != "All" && $result_type != "All" && $year_section != "" && $student != "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))");
                                    else if( $type_exam != "All" && $type_subject != "All" && $result_type != "All" && $year_section == "" && $student != "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (student_name = '$student'))");
                                                                        
                                    else if( $type_exam != "All" && $type_subject != "All" && $result_type == "All" && $year_section == "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date'))");
                                    else if( $type_exam != "All" && $type_subject != "All" && $result_type == "All" && $year_section != "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam != "All" && $type_subject != "All" && $result_type == "All" && $year_section != "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))");
                                    else if( $type_exam != "All" && $type_subject != "All" && $result_type == "All" && $year_section == "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date') && (student_name = '$student'))");

                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type != "All" && $year_section == "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date'))");
                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type != "All" && $year_section != "" && $student == "" ) 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type != "All" && $year_section != "" && $student != "" ) 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))");
                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type != "All" && $year_section == "" && $student != "" ) 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (student_name = '$student'))");

                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type == "All" && $year_section == "" && $student == "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (date_taken between '$start_date' AND '$end_date'))");
                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type == "All" && $year_section != "" && $student == "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type == "All" && $year_section != "" && $student != "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))");
                                    else if( $type_exam != "All" && $type_subject == "All" && $result_type == "All" && $year_section == "" && $student != "")
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((exam_type = '$type_exam') && (date_taken between '$start_date' AND '$end_date')&& (student_name = '$student'))");
                                    
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type != "All" && $year_section == "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date'))");
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type != "All" && $year_section != "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type != "All" && $year_section != "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))");
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type != "All" && $year_section == "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (student_name = '$student'))");
                                        
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type == "All" && $year_section == "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date'))");
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type == "All" && $year_section != "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type == "All" && $year_section != "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))");
                                    else if( $type_exam == "All" && $type_subject != "All" && $result_type == "All" && $year_section == "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((subject = '$type_subject') && (date_taken between '$start_date' AND '$end_date') && (student_name = '$student'))");
                                        
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type != "All" && $year_section == "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((result = '$result_type') && (date_taken between '$start_date' AND '$end_date'))");
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type != "All" && $year_section != "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type != "All" && $year_section != "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))");
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type != "All" && $year_section == "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((result = '$result_type') && (date_taken between '$start_date' AND '$end_date') && (student_name = '$student'))");
                                    
                                    
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type == "All" && $year_section == "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE (date_taken between '$start_date' AND '$end_date')");  
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type == "All" && $year_section != "" && $student == "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section'))");
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type == "All" && $year_section != "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((date_taken between '$start_date' AND '$end_date') && (year_section = '$year_section') && (student_name = '$student'))"); 
                                    else if( $type_exam == "All" && $type_subject == "All" && $result_type == "All" && $year_section == "" && $student != "") 
                                        $stmt = $conn->prepare("SELECT * FROM `tbl_result` WHERE ((date_taken between '$start_date' AND '$end_date') && (student_name = '$student'))");                                                                                                                                                  
                                }                                                              
                            }
                            else $stmt = $conn->prepare('SELECT * FROM `tbl_result`');
                            
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                static $result_no = 0;
                                static $result_pass = 0;
                            if (!empty($result)) {
                                foreach ($result as $row) {                                 
                                    $resultID = $row['result_id'];
                                    $examID = $row['exam_id'];
                                    $examType = $row['exam_type'];
                                    $subject = $row['subject'];
                                    $student = $row['student_id'];
                                    $student_name = $row['student_name'];
                                    $batch= $row['year_section'];                                 
                                    $dateTaken = $row['date_taken'];
                                    $dateTaken = date("d F Y",strtotime($dateTaken));
                                    $given_mark = $row['given_mark'];
                                    $totalScore = $row['total_score'];
                                    $result = $row['result'];
                                    $result_no = $result_no + 1;
                                    if ($result == "Pass") $result_pass = $result_pass +1;
                        ?>
                                    <tr>
                                    <td class="text-center"><?= $result_no ?></td>
                                    <td id="resultID-<?= $resultID ?>" hidden><?= $resultID ?></td>
                                    <td id="exam-<?= $examID ?>" class="text-left"><?= $examType ?></td>
                                    <td id="subject-<?= $subject ?>" class="text-center"><?= $subject ?></td>
                                    <td id="student-<?= $student ?>" class="text-center"><?= $student_name ?></td>
                                    <td id="batch-<?= $batch ?>" class="text-center"><?= $batch ?></td>
                                    <td id="dateTaken-<?= $resultID ?>" class="text-center"><?= $dateTaken ?></td>
                                    <td id="given_mark-<?= $resultID ?>" class="text-center"><?= $given_mark ?></td>
                                    <td id="totalScore-<?= $resultID ?>" class="text-center"><?= $totalScore ?></td>                                
                                    <td id="result-<?= $resultID ?>" class="text-center"><?= $result ?></td>
                                    <td class="text-center">
                                    <button type="button" class="btn btn-danger" onclick="deleteResult(<?= $resultID ?>)"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                    </tr>
                        <?php
                                }
                            } else if (empty($result)) { 
                                echo "
                                    <script>
                                        alert('Any Record is Not Exit !');
                                        window.location.href = 'http://localhost/metro-elearning/examination_teacher_dashboard.php';
                                    </script>
                                    ";
                                exit();
                            }                                    
                        ?>
                        </tbody>
                    </table>
                </div>                
                <!-- Result's Summary Show Start -->
            <div class="row mt-3">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <h5 class="py-3 text-center text-dark border border-3 border-primary rounded-3 bg-light">
                        Total Exam:
					    <span class="pb-3 px-3"><?php echo $result_no; ?></span>
				    </h5> 
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">  
                    <h5 class="py-3 text-center text-success border border-3 border-primary rounded-3 bg-light">
                        Pass Exam:
					    <span class="pb-3 px-3"><?php echo $result_pass; ?></span>
				    </h5> 
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">  
                    <h5 class="py-3 text-center text-danger border border-3 border-primary rounded-3 bg-light">
                        Fail Exam:
					    <span class="pb-3 px-3"><?php echo ($result_no - $result_pass); ?></span>
				    </h5> 
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">  
                    <h5 class="py-3 text-center text-dark border border-3 border-primary rounded-3 bg-light">
                        Pass Rate (%):
					    <span class="pb-3 px-3"><?php echo (number_format(($result_pass/$result_no),3) *100); ?></span>
				    </h5> 
                </div>              
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