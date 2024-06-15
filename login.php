 <?php
  require_once('./functions/Login.php');
  if (isset($_POST) && count($_POST) > 0) {
    $Response = Login($_POST);
  }  
?>
<!DOCTYPE html>
    <html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Metro-E-Learning-System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        -->
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    </head>
    <body>
        <?php
            include ('spinner.php');
            include ('navbar_login_register.php');                       
        ?>  
        <div class="container">
         <div class="row justify-content-center my-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">Login</h3>
                        <?php if (isset($Response['error'])): ?>
                            <!-- Bootstrap Alert -->
                            <div class="alert alert-danger alert-dismissable mb-3"><b>Oops</b>, <?php echo $Response['error']; ?></div>
                            <!-- Bootstrap Alert -->
                        <?php endif; ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12 col-xl-12">
                                    <div class="form-group pb-3">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" id="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group pb-2">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3 mt-3">                                              
                                    <span>Please<a href="register.php"> Register </a>unless our member.</span>                        
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group pb-2">
                                        <button type="submit" class="btn btn-success btn-block">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
         </div>
        </div>  
    </body>
    <footer>
        <?php
            include ('footer.php');
        ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
