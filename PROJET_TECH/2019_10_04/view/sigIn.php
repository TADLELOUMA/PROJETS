<?php
    // include_once('../model/Model_login.php');
    $m = message();
?>  
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>
        <title>Page Title</title>
        </head>
        <body>

        <div class = "row"> 
        <div class = "col-md-4">  </div>
        <div class = "col-md-4"> 

        <h1> ENTER YOUR LOGIN </h1>
        <div class="form-group">
                
            <form action = "../controller/Controller_login.php"   method = "POST">
                

            <div class="form-group">
                <label for="login">username</label>
                <input type="text" class="form-control" name ="login" id="login" placeholder="username" required>

                <label for="Password">Password</label>
                <input type="password" class="form-control" name = "password" id="Password" placeholder="Password" required></br>
           
                <input  type = "submit" class="btn btn-primary" value ="submit" />
                <a  class="btn btn-success" href="inscription.php" style="float:right;">Inscription</a>
                <input  type = "hidden"  name = "attr"   value ="val" />
            </div>
            </form>

        </div>

        <div class = "col-md-4">  </div>
        </div>
        
    </body>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
