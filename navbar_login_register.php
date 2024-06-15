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
                <a href="index.php" class="nav-item nav-link active">Home</a>
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
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Exam</a>
                    <div class="dropdown-menu fade-down m-0">                                              
                        <a href="#" class="dropdown-item">Exam Room</a>
                        <a href="#" class="dropdown-item">Exam Dashboard</a>
                    </div>                   
                </div>                
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <?php if(isset($_SESSION['current_session'])) { ?>
            <a href="profile.php" class="btn btn-primary py-4 px-lg-3 d-none d-lg-block"><i class="fa-solid fa-user pe-3"></i><?php echo $user_name;?></a>
            <a href="logout.php" class="px-3"><i class="fa-solid fa-sign-out pe-2"></i> Logout </a>           
            <?php  } else {
	        ?>
            <a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a> 
            <?php } ?>
        </div>
    </nav>
    <!-- Navbar End -->