<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Metro E-Learning: Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <div class="clearfix">
            <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
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
                        <a href="courses.php" class="dropdown-item">IT Technology<i class="ps-5 fa fa-angle-right float-right"></i></a>
                        <a href="#" class="dropdown-item">Programming<i class="ps-5 fa fa-angle-right float-right"></i></a>
                  
                        <a href="courses.php" class="dropdown-item">Strategy & Management</a>
                        <a href="courses.php" class="dropdown-item">Artificial Intelligence</a>
                        <a href="404.php" class="dropdown-item">Japanese<i class="ps-5 fa fa-angle-right float-right"></i></a>
                        <a href="exam-assessment.php" class="dropdown-item">Examination<i class="ps-5 fa fa-angle-right float-right"></i></a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#login">Join Now<i class="fa fa-arrow-right ms-3"></i></a>            
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Dashboard Start -->
    <div class="container mt-5 mb-5">
		<div class="row g-0">	<!-- Wrapper -->

			<nav class="col-2 bg-light pr-3 border-end"> <!-- Left Side Nav -->

				<h1 class="h5 py-3 text-center text-primary">
					<i class="fas fa-ghost me-2"></i>
					<span class="d-none d-lg-inline">Metro Admin</span>
				</h1>
				
				<div class="list-group text-center text-lg-start">
					<span class="list-group-item disabled d-none d-lg-block">
						<small>CONTROLS</small>
					</span>
					<a href="#" class="list-group-item list-group-item-action active">
						<i class="fas fa-home"></i><span class="d-none d-lg-inline"> Dashboard </span>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="fas fa-users"></i><span class="d-none d-lg-inline"> Users </span>
						<span class="d-none d-lg-inline badge bg-danger rounded-pill float-right">20</span>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="fas fa-chart-line"></i><span class="d-none d-lg-inline"> Statistics </span>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="fas fa-flag"></i><span class="d-none d-lg-inline"> Reports </span>
					</a>
				</div>

				<div class="list-group mt-4 text-center text-lg-start">
					<span class="list-group-item disabled d-none d-lg-block">
						<small>ACTIONS</small>
					</span>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="fas fa-user"></i><span class="d-none d-lg-inline"> New User </span>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="fas fa-edit"></i><span class="d-none d-lg-inline"> Update Data </span>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="far fa-calendar-alt"></i><span class="d-none d-lg-inline"> Add Events </span>
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
								<li><a href="#" class="dropdown-item">User Profile</a></li>
								<li><a href="#" class="dropdown-item">Logout</a></li>
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
						<h2 class="h6 text-white-50">QUICK STATS</h2>
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h3 class="card-title h2">1,250</h3>
									<span class="text-success">
										<i class="fas fa-chart-line"></i>
										Total Members
									</span>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h3 class="card-title h2">8,210</h3>
									<span class="text-success">
										<i class="fas fa-chart-line"></i>
										Exams. Members
									</span>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h3 class="card-title h2">12,560</h3>
									<span class="text-success">
										<i class="fas fa-chart-line"></i>
										Certificate Members
									</span>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h3 class="card-title h2">102,250</h3>
									<span class="text-success">
										<i class="fas fa-chart-line"></i>
										Excellent Members
									</span>
								</div>
							</div>
						</div>
					</div> <!-- Content Row 1 -->

					<div class="row mt-4 flex-column flex-lg-row"> <!-- Content Row 2 -->
						<div class="col">
							<h2 class="h6 text-white-50">LOCATION</h2>
							<div class="card mb-3" style="height: 280px">
								<div class="card-body">
									<small class="text-muted">Regional</small>
									<div class="progress mb-4 mt-2" style="height: 5px">
										<div class="progress-bar bg-success w-25"></div>
									</div>

									<small class="text-muted">Global</small>
									<div class="progress mb-4 mt-2" style="height: 5px">
										<div class="progress-bar bg-primary w-75"></div>
									</div>

									<small class="text-muted">Local</small>
									<div class="progress mb-4 mt-2" style="height: 5px">
										<div class="progress-bar bg-warning w-50"></div>
									</div>

									<small class="text-muted">Internal</small>
									<div class="progress mb-4 mt-2" style="height: 5px">
										<div class="progress-bar bg-danger w-25"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<h2 class="h6 text-white-50">DATA</h2>
							<div class="card mb-3" style="height: 280px">
								<div class="card-body">
									<div class="text-right">
										<button class="btn btn-sm btn-outline-secondary">
											<i class="fas fa-search"></i>
										</button>
										<button class="btn btn-sm btn-outline-secondary">
											<i class="fas fa-sort-amount-up"></i>
										</button>
										<button class="btn btn-sm btn-outline-secondary">
											<i class="fas fa-filter"></i>
										</button>
									</div>
									<table class="table">
										<tr>
											<th>ID</th>
											<th>Age Group</th>
											<th>Data</th>
											<th>Progress</th>
										</tr>
										<tr>
											<td>1</td>
											<td>20-30</td>
											<td>19%</td>
											<td><i class="fas fa-chart-pie"></i></td>
										</tr>
										<tr>
											<td>2</td>
											<td>30-40</td>
											<td>40%</td>
											<td><i class="fas fa-chart-bar"></i></td>
										</tr>
										<tr>
											<td>3</td>
											<td>40-50</td>
											<td>20%</td>
											<td><i class="fas fa-chart-line"></i></td>
										</tr>
										<tr>
											<td>4</td>
											<td>>50</td>
											<td>11%</td>
											<td><i class="fas fa-chart-pie"></i></td>
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

    <!-- Registration Start -->
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
                        <input type="type" class="form-control" id="name" placeholder="Enter name" name="name">
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

    <!-- Login Start -->
    <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal">  </button>
                </div>

                <!-- Modal body -->
                <form action="/action_page.php" class="mx-4">
                    <div class="mb-2 mt-2">
                      <label for="email" class="form-label text-primary">Email:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div> 
    
                    <div class="mb-2">
                      <label for="pwd" class="form-label text-primary">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                        
                    <div class="mb-3 mt-3">                                              
                        <span>Please<a href="#" data-bs-toggle="modal" data-bs-target="#registration"> Register </a>unless our member.</span>                        
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

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-1 mt-1 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>No. 53/62, L.L.Town Building A3F, Myanmar Gon Yi Street, Tharkayta, Yangon, Myanmar</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+095 09 262 007 800</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>mminfo@metro-myanmar.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>                
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Join Now</h4>
                    <p>Please sign up for joining to our metro e-learning</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="modal" data-bs-target="#registration">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-9 text-center text-md-center mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#" style="color: yellow;">Metro IT & Japanese Language Centre</a>, All Right Reserved.
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#" style="color: chartreuse;">9th Batch Student</a><br>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <!--
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    !-->
    <a href="#" class="btn btn-primary border-2 border-white rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>