<?php
include_once 'includes/config.php';
 
$config = new dbConfig();
$db = $config->getConnection();

include_once 'includes/data.inc.php';
$user = new userData($db);

$hash = md5( rand(0,1000) );
  
if($_POST){

 $user->username = $_POST['username'];
 $user->password = md5($_POST['password']);
 $user->email = $_POST['email']; 
 $user->hash = $hash;
 $user->vcode = $user->makevcode(7);
 $user->picfile = "propicblank.png";

 if($user->createUser()){

?>

<?php
    echo "<script>location.href='success.php/?username=$user->username'</script>";
 }else{
?>

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <strong>Fail!</strong> An error has occured. Not registered. 
</div>
<?php
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
    <link rel="stylesheet" href="../dist/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrapValidator.js"></script>
	
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
 
  <body>
 

	
<p><br>

<div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <img class="ribbon" src="img/ribbon.png">
              <h4 class="modal-title" id="myModalLabel">STEP 1: Register a <b>Binary<font color="#59E817">Haven</font>&trade;</b> Account</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                    <div class="col-xs-6">
                        <div class="well">
                            <form id="defaultForm" class="form-inline" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="username" >Choose a username</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" >Choose a password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="confirmPassword" >Retype your password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    </div><!---->

                                    <div class="form-group">
                                        <label for="email" >Enter your valid email address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div> 
                                    <br><br>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </fieldset>
                                                                 
                            </form>                                    
                        </div>   
                    </div>
                  <div class="col-xs-6">
                      <p>
                          <b>Hello!</b><br>
                          <br>
                          So you have decided to register. 
<!--                           
                          <p>Please enter your <b>invitation code</b> below then hit submit to proceed.  
                          <p>Membership is limited to those who have been invited by current members at this time.</p>  
                          -->
                          <p>You will be given more details as a registered member.
                        </p><br><br><br> <p>
                        <div class="g-recaptcha" data-theme="light" data-sitekey="6LfeZy8UAAAAAOQFiYvgxH7ezDVUKbM3qXjvhgR6" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div></p>
                                   
                  </div>
              </div>
          </div>
      </div>

  </div>
	<div class="container" style="padding-top:10px">
   <center>
	<div >
		<div >
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
        
        <!-- <div class="col-sm-6">
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
		</div> -->
        </div><br><br>

        <div>
            
        <!-- <form id="defaultForm" method="post" action="target.php" class="form-horizontal">
                       
        <fieldset>
                            <legend>Identical validator</legend>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Retype password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="confirmPassword" />
                                </div>
                            </div>
                        </fieldset>
                        </form> -->
                        
                        <br><br><br><br><br></div>
                        
<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 25,
                        message: 'The username must be more than 6 and less than 10 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    remote: {
                        message: 'The username is already taken',
                        url: 'checkusername.php',
                        type: 'POST'                        
                    }

                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'The country is required and can\'t be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                    remote: {
                        message: 'The email is already registered',
                        url: 'checkemail.php',
                        type: 'POST'                        
                    }
                }
            },
            
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    stringLength: {
                        min: 6,
                        max: 25,
                        message: 'The password must be more than 6 and less than 10 characters long'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            ages: {
                validators: {
                    lessThan: {
                        value: 100,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: 10,
                        inclusive: false,
                        message: 'The ages has to be greater than or equals to 18'
                    }
                }
            }
        }
    });
});

</script>

<!--GOOGLE CAPTCHA
$(document).ready(function() {
  var defaultForm = $("#defaultForm");

  //We set our own custom submit function
  defaultForm.on("submit", function(e) {
    //Prevent the default behavior of a form
    e.preventDefault();
    //Get the values from the form
    var theusername = $("#username").val();
    var theemail = $("#email").val();
    //Our AJAX POST
    $.ajax({
      type: "POST",
      url: "register.php",
      data: {
        thename: theusername,
        theemail: theemail,
        //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
        captcha: grecaptcha.getResponse()
      },
      success: function() {
        console.log("OUR FORM SUBMITTED CORRECTLY");
      }
    })
  });
});
function yess() {
        console.log("yes");
      }
function noo() {
        console.log("not");
      }*/


    -->


  </body>
</html>
