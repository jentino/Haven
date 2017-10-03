<?php
    include_once 'includes/config.php';
    
    $config = new dbConfig();
    $db = $config->getConnection();

    include_once 'includes/data.inc.php';
    $user = new userData($db);
    
    if($_POST['vcode']){

        $user->vcode = $_POST['vcode'];

        if($user->verifyvcode()){

                echo "<script>alert('Verification code has been checked. You can now log in with your details.');</script>";
                echo "<script>location.href='http://127.0.0.1/login.php'</script>";
                   
                               
        }else{
    ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>Error!</strong> <?php echo $user->vcode ?> is an invalid verification code. Check your email and try again. 
          </div><?php
        }
    }

$temp_username = $_GET['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
		img.ribbon {
        position: absolute;
        top: 0;
        right: 0;
    }
	</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>Welcome</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link href="//cdn.rawgit.com/cornflourblue/angular-registration-login-example/master/app-content/app.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
    <!-- Bootstrap core CSS 
    <link href="css/bootstrap.min.css" rel="stylesheet">-->
 
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/testimonial.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
 
  <body>
	
<p><br>

<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <img class="ribbon" src="img/ribbon.png">
              <h4 class="modal-title" id="myModalLabel">Welcome to <b>Binary<font color="#59E817">Haven</font>&trade;</b></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div >

                      <img src="/img/thumbsup1.jpg">
                          
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead"><span class="text-success"> Activate your account</span></p>
                      </b>
                          <p>You have successfully registered an account at <b>Binary<font color="#59E817">Haven</font>&trade;</b> and are now a member.
                          <br><p>
                          Please check your email and enter the <b>verification code</b> you have been sent to proceed. </p><br>
                          
                          



		<center>
						  <form id="vcodeForm" class="form-inline" method="post">
                          <fieldset>
                              <div class="form-group">
                                  <label for="vcode" >Verification code</label>
                                  <input type="text" class="form-control" id="vcode" name="vcode" required>
                              </div>
                              <br><br>
                              <button type="submit" class="btn btn-success">Verify</button>
                          </fieldset>

                          
                      </ul></center>
                      <p></p>
                  </div>
              </div>
          </div>
      </div>

  </div>
	<div class="container" style="padding-top:30px">
    <h1 class="text-center">An online automated system that generates $10 a day.<br><br>

    Thank you for registering.
    </h1><br><br>
	 <center>
            <div><br><br><br>
                
                <br><br><br>
            </div> 
        
            <footer class="footer">
                <div class="container">
                    <span class="text-muted">
                        <p> 
                            <span class="glyphicon glyphicon-copyright-mark"></span> 
                            Copyright, 2017, BinaryHaven  
                            <span class="glyphicon glyphicon-envelope"></span> 
                        </p>
                    </span>
                </div>
            </footer>
        </center>
    </div>
  </body>
</html>