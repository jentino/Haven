<?php
session_start();
if(!isset($_SESSION['username'])){
 echo "<script>location.href='login.php'</script>";
}

include_once 'includes/config.php';
 
$config = new dbConfig();
$db = $config->getConnection();

include_once 'includes/data.inc.php';

 $user = new userData($db);

 $user->username = $_SESSION['username'];

 $user->getUserData();
 
if($_POST){



 $user->firstname = $_POST['firstname'];
 $user->lastname = $_POST['lastname'];
 $user->token_id_live = $_POST['token_id_live'];
 $user->token_id_demo = $_POST['token_id_demo'];
 $user->app_id_live = $_POST['app_id_live'];
 $user->app_id_demo = $_POST['app_id_demo'];
 $user->picfile = $_POST['picfile'];

 if($user->updateUser()){

    echo "User updated";

 }else{
     echo "User NOT updated";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="script.js"></script>
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
              <h4 class="modal-title" id="myModalLabel"><b>Binary<font color="#59E817">Haven</font>&trade;</b> User Management</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well"> 
                          <form id="updateForm" class="form-inline" method="post" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="form-group">
                                        <label for="username" >Username</label>
                                        <input type="text" class="form-control" id="username" value = "<?php echo $user->username; ?>"name="username" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="firstname" >First name</label>
                                        <input type="text" class="form-control" id="firstname" value = "<?php echo $user->firstname; ?>" name="firstname">
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname" >Last name</label>
                                        <input type="text" class="form-control" id="lastname" value = "<?php echo $user->lastname; ?>" name="lastname">
                                    </div>

                                    <div class="form-group">
                                        <label for="token_id_live" >Binary.com token id (live)</label>
                                        <input type="text" class="form-control" id="token_id_live" value = "<?php echo $user->token_id_live; ?>" name="token_id_live">
                                    </div><!---->

                                    <div class="form-group">
                                        <label for="app_id_live" >Binary.com app id (live)</label>
                                        <input type="text" class="form-control" id="app_id_live" value = "<?php echo $user->app_id_live; ?>"  name="app_id_live">
                                    </div><!---->
                                    
                                    <div class="form-group">
                                        <label for="token_id_demo" >Binary.com token id (demo)</label>
                                        <input type="text" class="form-control" id="token_id_demo" value = "<?php echo $user->token_id_demo; ?>" name="token_id_demo">
                                    </div> 

                                    <div class="form-group">
                                        <label for="app_id_demo" >Binary.com app id (demo)</label>
                                        <input type="text" class="form-control" id="app_id_demo" value = "<?php echo $user->app_id_demo; ?>" name="app_id_demo">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="picfile" >ProfilePic</label>
                                        <input type="text" class="form-control picfile" id="picfile" value = "<?php echo $user->picfile; ?>"name="picfile" readonly>
                                    </div><!---->

                                    
                                    <div class="form-group">
                                        <label for="file_upload">Choose a photo:</label>
                                        <input type="file" name="file_upload" id="file_upload" multiple>

                                       
                                    </div>
                                    
                                    <br><br>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </fieldset>
                                                                 
                            </form>    
                      </div>
                  </div>
                  <div class="col-xs-6">
                      Below are your records on our database. Update empty sections and fix incorrect details.

                      <br><br><div>
                      
                                <fieldset>

                                    <div class="form-group">
                                        <label for="username" >Username</label><br> <?php echo $user->username; ?>
                                    </div>


                                    <div class="form-group">
                                        <label for="firstname" >First name</label><br> <?php echo $user->firstname; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname" >Last name</label><br> <?php echo $user->lastname; ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="token_id_live" >Binary.com token id (live)</label><br> <?php echo $user->token_id_live; ?>
                                    </div><!---->

                                    <div class="form-group">
                                        <label for="app_id_live" >Binary.com app id (live)</label><br> <?php echo $user->app_id_live; ?>
                                    </div><!---->
                                    
                                    <div class="form-group">
                                        <label for="token_id_demo" >Binary.com token id (demo)</label><br> <?php echo $user->token_id_demo; ?>
                                    </div> 

                                    <div class="form-group">
                                        <label for="app_id_demo" >Binary.com app id (demo)</label><br> <?php echo $user->app_id_demo; ?>
                                    </div>
                                    
                                    <!-- <div class="form-group">
                                        <label for="picfile" >Profile picture</label><br> <?php echo $user->picfile; ?>
                                        
                                    </div>   -->
                                    <!---->
                                     
                                  

                            </fieldset><center><br> <div class="padup"><a href="https://binaryhopper-jentino.c9users.io" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Home</a><br>

</div>

</div>
                       
                  </div>
              </div>
          </div>
      </div>

  </div>
	<div class="container" style="padding-top:30px">
    <h1 class="text-center"><br><br>

    
    </h1><br><br><center>
        <footer class="footer">
      <div class="container">
        <span class="text-muted">
            <p> <span class="glyphicon glyphicon-copyright-mark"></span> Copyright, 2017, BinaryHaven  
        <span class="glyphicon glyphicon-envelope"></span> </p></span>
      </div>
    </footer></center>
  </body>
</html>