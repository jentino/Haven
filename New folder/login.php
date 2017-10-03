<?php
include_once 'includes/config.php';
 
$config = new dbConfig();
$db = $config->getConnection();
  
if($_POST){
  
 include_once 'includes/login.inc.php';
 $login = new Login($db);
 
 $login->username = $_POST['username'];
 $login->password = md5($_POST['password']);
  
 if($login->login()){

    if($login->checkStatus()){

        echo "<script>location.href='index.php'</script>";

    }   
	else {

         echo "<script>location.href='http://127.0.0.1/verifyvcode.php'</script>";
    
    }
		
 }
  
 else{
  echo "<script>alert('Invalid username and/or password. Access Denied')</script>";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
<!--
	<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><center>Welcome to pipszone</center></h3>
			 	</div>
			  	<div class="panel-body"><br><br>
			    	<form accept-charset="UTF-8" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
			    		</div>
			    		<div class="form-group">
			    			<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<button class="btn btn-sm btn-primary btn-block" type="submit">Login</button>
			    	</fieldset>
			      	</form>
                      <hr/>
                    <center><h4>OR</h4></center>
                    <input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook">
			    </div>
			</div>
		</div>
	</div>
</div>
</p>
-->`
<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <img class="ribbon" src="img/ribbon.png">
              <h4 class="modal-title" id="myModalLabel">Welcome to <b>Binary<font color="#59E817">Haven</font>&trade;</b></h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6" >
                      <div class="well">
                          <form id="loginForm" method="POST">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" name="username" value="" required="" title="Please enter your username" placeholder="username">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" name="password" placeholder="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                  <p class="help-block">(if this is a private computer)</p>
                              </div>
                              <button type="submit" value="login" name="submit" class="btn btn-success btn-block">Login</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Membership <span class="text-success"> Open</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span>  Enjoy the benefit of automation</li>
						  <li><span class="fa fa-check text-success"></span>  No intervention required</li>
						  <li><span class="fa fa-check text-success"></span>  Set your daily targets</li>
						  <li><span class="fa fa-check text-success"></span>  Manage your account easily</li>
						  <li><span class="fa fa-check text-success"></span>  Automated account protection</li>
						  <li><span class="fa fa-check text-success"></span>  Moneyback guarantee if not profitable </li>
						  

		
						  <!--<li><span class="fa fa-check text-success"></span> Formulate daily, weekly and monthly plans</li>
						  
						  <li><span class="fa fa-check text-success"></span> Design a trading strategy</li>
						  
						  <li><span class="fa fa-check text-success"></span> Develop entry, exit and take profit signals</li>
						  
						  <li><span class="fa fa-check text-success"></span> Automate your trading</li>-->
                          
                      </ul>
                      <p><a href="register.php" class="btn btn-info btn-block">Yes, Register now!</a></p>
                  </div>
              </div>
          </div>
      </div>

  </div>
	<div class="container padleft" style="padding-top:30px">
    <h1 class="text-center">An online automated system that generates $10 a day.<br><br>

    How does it work?
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
                    	<a href="#" class="testimonial-writer-company">Limited membership per month</a>
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
                    	<div class="testimonial-writer-designation">Funds are withdrawable at any moment you choose.</div>
                    	<a href="#" class="testimonial-writer-company">Set your limits as you wish</a>
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
                    	<div class="testimonial-writer-designation">A plan will indicate your profit targets, minimum at $10 per day.</div>
                    	<a href="#" class="testimonial-writer-company">A plan is your subscription for automation</a>
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
                    	<div class="testimonial-writer-designation">The system uses algorithmic analysis to generate profit from financial markets.</div>
                    	<a href="#" class="testimonial-writer-company">All funds are protected and refunded in full. </a>
                    </div>
                </div>
            </div>   
        </div>
       
            
        </div> <center>
            <div><br><br><br>
                <p><a href="register.php" class="btn btn-primary btn-sm">Get Started</a></p>
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