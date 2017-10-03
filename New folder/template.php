<?php
include_once 'includes/config.php';
 
$config = new dbConfig();
$db = $config->getConnection();
  
if($_POST){
  
 include_once 'includes/login.inc.php';
 $login = new Login($db);
 
 $login->userid = $_POST['username'];
 $login->passid = md5($_POST['password']);
  
 if($login->login()){
	
		 echo "<script>location.href='index.php'</script>";
 }
  
 else{
  echo "<script>alert('Access Denied')</script>";
 }
}
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
              <h4 class="modal-title" id="myModalLabel">Emtpy <b>Empty<font color="#59E817">Empty</font> &trade;</b></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">Empty
                      </div>
                  </div>
                  <div class="col-xs-6">Empty
                  </div>
              </div>
          </div>
      </div>

  </div>
	<div class="container" style="padding-top:30px">
    <h1 class="text-center">Empty<br><br>

    Empty?
    </h1><br><br>
	<div class="row">
		<div class="col-sm-6">
            <div id="tb-testimonial" class="testimonial testimonial-default">
                <div class="testimonial-section">
                    Signup
            	</div>
                <div class="testimonial-desc">
                    <img src="img/number1.png" alt="" />
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name">Register an account in your name</div>
                    	<div class="testimonial-writer-designation">Free registration gives you access to the portal and your account.</div>
                    	<a href="#" class="testimonial-writer-company">Limited membership</a>
                    </div>
                </div>
            </div>   
		</div>
        
        <div class="col-sm-6">
            <div id="tb-testimonial" class="testimonial testimonial-primary">
                <div class="testimonial-section">
                    Fund your account
                </div>
                <div class="testimonial-desc">
                    <img src="img/number2.png" alt="" />
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name">You must have money to fund your account</div>
                    	<div class="testimonial-writer-designation">Funds are withdrawable any moment you choose.</div>
                    	<a href="#" class="testimonial-writer-company">Set your limits as you choose</a>
                    </div>
                </div>
            </div>   
		</div>
        <br><br>
        <div class="col-sm-6">
            <div id="tb-testimonial" class="testimonial testimonial-info">
                <div class="testimonial-section">
                    Choose a plan
                </div>
                <div class="testimonial-desc">
                    <img src="img/number3.png" alt="" />
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name">Choose a plan that suits you</div>
                    	<div class="testimonial-writer-designation">A plan will dictate what profits you wish to have daily, minimum at $10 per day.</div>
                    	<a href="#" class="testimonial-writer-company">A plan is your subscription to automation</a>
                    </div>
                </div>
            </div>   
		</div>
        
        <div class="col-sm-6">
            <div id="tb-testimonial" class="testimonial testimonial-success">
                <div class="testimonial-section">
                    Collect $10, daily.
                </div>
                <div class="testimonial-desc">
                    <img src="img/number4.png" alt="" />
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name">Minimum limit of $10 withdrawable daily</div>
                    	<div class="testimonial-writer-designation">The system uses algorithmic analysis to generate profit from the markets.</div>
                    	<a href="#" class="testimonial-writer-company">All funds are protected and refunded in full. </a>
                    </div>
                </div>
            </div>   
		</div>
		</div><br><br><br><center>
        <footer class="footer">
      <div class="container">
        <span class="text-muted">
            <p> <span class="glyphicon glyphicon-copyright-mark"></span> Copyright, 2017, BinaryHaven  
        <span class="glyphicon glyphicon-envelope"></span> </p></span>
      </div>
    </footer></center>
  </body>
</html>