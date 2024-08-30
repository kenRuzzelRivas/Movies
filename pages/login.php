<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../styles/log_in.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              <h5 class="card-title text-center mb-5 fw-light fs-5">Log In</h5>
              <form method= "post" action= "login.php" >
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                  <label for="floatingPassword">Password</label>
                </div>
  
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name= "login">Log
                    in</button>
                </div>
                
              </form>

              <?php
                if(isset($_POST['login'])) { 
                  $host = "127.0.0.1"; //IP of your database
                  $userName = "root"; //Username for database login
                  $userPass = ""; //Password associated with the username
                  $database = "movies"; //Your database name
                  
                  $connectQuery = mysqli_connect($host,$userName,$userPass,$database);
                  $name = ''; 
                  $email = ''; 
                  
                  // Check if the form is submitted 
                  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                      // Collect and sanitize form data 
                      $email = htmlspecialchars($_POST['email']); 
                      $password = htmlspecialchars($_POST['password']); 
                  } 
                  
                  if(mysqli_connect_errno()){
                      echo mysqli_connect_error();
                      exit();
                  }else{
                      $selectQuery = "SELECT * FROM users WHERE Email = '$email' AND `Password` = '$password' ORDER BY Id ASC";
                      $result = mysqli_query($connectQuery,$selectQuery);
                      if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_row($result);
                        $userid = $row[0];
                        header("Location: index.php?userid=".$userid, TRUE, 301);
                        exit();
                      }else{
                         echo "Wrong username or password";
                      }
                  } 
                } 
              ?> 

            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>