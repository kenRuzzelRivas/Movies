<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../styles/index.css" rel="stylesheet">
</head>
<body class="vh-100">
    <?php 
     $userid = $_REQUEST['userid'];
     $host = "127.0.0.1"; //IP of your database
                  $userName = "root"; //Username for database login
                  $userPass = ""; //Password associated with the username
                  $database = "movies"; //Your database name
                  
                  $connectQuery = mysqli_connect($host,$userName,$userPass,$database);
                  if(mysqli_connect_errno()){
                      echo mysqli_connect_error();
                      exit();
                  }else{
                    $selectQuery = "SELECT * FROM users WHERE Id = '$userid' ";
                    $result = mysqli_query($connectQuery,$selectQuery);
                    if(mysqli_num_rows($result) > 0){
                      $row = mysqli_fetch_row($result);
                      $name = $row[3][1];
                      echo $name;
                     
                    }else{
                       echo "No Results Found";
                    }
                  }
    
    ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">Movies</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </div>
            </div>
        </div>
    </nav>
        
      <div class="container-fluid text-center h-100"> 
        
            <div class="row h-100">

                <div class="col-sm-2 sidenav">
                </div>

                <div class="col-sm-8 text-left"> 
                        <div class="breadcrumbs d-flex p-2">
                        
                        </div>
                        <div class="d-flex p-2 align-items-stretch">
                            <div class="h1 flex-fill">Movies</div>
                            <div class="flex-fill"></div>
                        </div>
                        <div class="main-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        
                </div>

                <div class="col-sm-2 sidenav">
                </div>

            </div>
      </div>
      <footer class="container-fluid text-center">
            <p>Footer</p>
      </footer> 
      
      
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>