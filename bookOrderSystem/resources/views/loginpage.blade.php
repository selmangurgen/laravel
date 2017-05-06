<!DOCTYPE html>
<html lang="en" style="margin:50px 150px 50px 150px">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style> 
 .center{
  background-color: #D4D4D4;
  color: white;
}
</style>
 <body>



<div class="center" >
  <div class="row" >
    <div class="col-sm-4">
      <img src="https://cobbhabitatfamilies.files.wordpress.com/2010/02/books.png" style=" margin:20px 20px 20px 20px;" alt="main image" width="170" height="150"> 
    </div>
    <br>
    <br>
    <br>
    <div class="col-sm-8">
      <i><h1 style="color:blue; margin:0 0 0 0px;" >BOOK ORDERING SYSTEM</h1></i>
    </div>
  </div>

<div class="container" style="color:#0000FF">
 <div class="row">
        <div class="span12">
      <div class="" id="loginModal">
              <div class="modal-header">
                

              </div>
              <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                   
                    
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action='login' method="POST">
                        <fieldset>
                          <div id="legend">
                            <legend class="">Administator Login</legend>
                          </div> 



                             
                          <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="admin_id">Admin ID:</label>
       <p></p>
                            <div class="controls">
                              <input type="text" id="admin_id" name="admin_id" placeholder="" class="input-xlarge" autofocus required>
                            </div>
                          </div>
     
                          <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password">Password:</label>
       <p></p>
                            <div class="controls">
                              <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
         <p></p>
                            </div>
                          </div>
     
     
                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button class="btn btn-success">Login</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>                
                    </div>
     

                </div>
              </div>
            </div>
        </div>
 </div>
</div>
  </body>
</html>