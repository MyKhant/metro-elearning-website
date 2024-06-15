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
          
          foreach ($result1 as $row) {
              $email = $row['email'];
              if($user_email == $email){ $user_role = "teacher"; break; } 
          } 
          foreach ($result2 as $row) {
            $email = $row['email'];
            if($user_email == $email){ $user_role = "student"; break; } 
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
    </head>

    <body>
        <?php
            include ('spinner.php');                    
        ?>  
      
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <div class="clearfix">
            <a href="index.php" class="navbar-brand d-flex align-items-center px-3 px-lg-4">
                <span class="float-start me-3"><img src="image/icon/metro-logo-01.jpg" alt="logo" style="width: 150px;"></span>        
                <span class="navbar-brand mt-5">
                    <p class="text-primary display-6 mb-3" style="line-height: 0;">E-Learning</p>
                    <small class="text-body fw-normal" style="letter-spacing: 14px;">PLATFORM</small>
                </span>
            </a>
        </div>
       
        <button type="button" class="navbar-toggler me-2 px-2 rounded-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-primary"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="team.php" class="nav-item nav-link">Lecturer</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Course</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="it_course.php" class="dropdown-item">IT Technology</a>
                        <a href="programming_course.php" class="dropdown-item">Programming</a>                  
                        <a href="strategy_management_course.php" class="dropdown-item">Strategy & Management</a>
                        <a href="ai_course.php" class="dropdown-item">Artificial Intelligence</a>
                        <a href="japanese_course.php" class="dropdown-item">Japanese</i></a>
                    </div>
                </div>
                <?php if ($user_role == "teacher") { ?> 
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Exam</a>
                    <div class="dropdown-menu fade-down m-0">                                              
                        <a href="question_teacher_dashboard.php" class="dropdown-item">Question Dashboard</a>
                        <a href="examination_teacher_dashboard.php" class="dropdown-item">Exam Dashboard</a>
                    </div>  
                </div>
                <?php } ?>
                <?php if ($user_role == "student") { ?> 
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Exam</a>
                    <div class="dropdown-menu fade-down m-0">                                              
                        <a href="examination_section.php" class="dropdown-item">Exam Room</a>
                        <a href="examination_student_dashboard.php" class="dropdown-item">Exam Dashboard</a>
                    </div>  
                </div>
                <?php } ?>
                <a href="contact.php" class="nav-item nav-link active">Contact</a>
            </div>
            <?php if(isset($_SESSION['current_session'])) { ?>
            <a href="profile.php" class="btn btn-primary py-4 px-lg-3 d-none d-lg-block"><i class="fa-solid fa-user pe-3"></i><?php echo $user_name;?></a>
            <a href="logout.php" class="px-3"><i class="fa-solid fa-sign-out pe-2"></i> Logout </a>           
            <?php  } else {
	        ?>
            <a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#login">Join Now<i class="fa fa-arrow-right ms-3"></i></a> 
            <?php } ?>  
        </div>
    </nav>
    <!-- Navbar End -->
    
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-3 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-3">
        <div class="container bg-light rounded p-3">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-3">Contact For Any Query</h1>
            </div>
            <div class="row g-4 mb-3">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <p class="mb-4">Welcome to Metro E-learning Platform, where knowledge meets innovation! We value your feedback, inquiries, and suggestions. Whether you're a learner seeking assistance, an instructor with a query, or a potential partner interested in collaboration, our dedicated team is here to help.</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 mb-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office</h5>
                            <p class="mb-3">L.L.Town Building, Myanmar Gon Yi Street, Tharkayta, Yangon, Myanmar</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 mb-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-3">+095 09 262 007 800</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 mb-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-3">mminfo@metro-myanmar.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100 shadow"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.421281397875!2d96.19652507389145!3d16.805444019311373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed5491339adb%3A0x995e600e13df7772!2sMetro%20IT%20%26%20Japanese%20Language%20Centre!5e0!3m2!1sen!2smm!4v1705070722623!5m2!1sen!2smm"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End --> 
</body>

<footer>
        <?php
            include ('footer.php');
        ?>
</footer>

</html>