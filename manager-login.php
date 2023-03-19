<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="bg-wrapper">
        <div class="main-wrapper">
        <form action="manager-login.php" method="POST">
            <div class="container">
                <div class="heading">
                   <h1>Login</h1>
                </div>
                <div class="container-inner form-body">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <div class="footer">
                  <button name="login" class="btn">Login</button>
                </div>
           
            </div>  
        </form>
        </div>

    </div>
</body>
</html>

<?php 
   include("connection.php");
   session_start();
   if($_SESSION['manager']){
    header("location:loggedin.php");
    exit();
   }
   if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from manager where email='$email' ";
    $run=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run)>0){
        while($row=mysqli_fetch_array($run)){
            $hash=$row['password'];
            $id=$row['id'];
            $status=$row['status'];
        }
        if($status === 0){
            echo "<script> alert('Manager is inactive')</script>";
            exit();
        }
        if(password_verify($password,$hash)){
            $_SESSION['manager']=1;
            $_SESSION['id']=$id;
            header("location:loggedin.php");
        }
        else{
            echo "<script>alert('Invalid password. Please try again')</script>";
            exit();
        }
    }

    else{
        echo "<script>alert('Invalid email address. Please try again. If not registered, please register.')</script>";
    }
    
   }
?>