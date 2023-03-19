<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Manager</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php 
       include("connection.php");
       $sql1="select * from domain";
       $result=mysqli_query($conn,$sql1);
    ?>
    <div class="bg-wrapper">
        <div class="main-wrapper">
            <div class="heading"><h1>Register</h1></div>
        <form action="manager-register.php" method="POST">
            <div class="form-body">
                <input type="text" name="name" placeholder="Fullname" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="primary_contact" placeholder="Primary contact no." required>
                <input type="tel" name="sec_contact" placeholder="Secondary contact no." >
                <div class="option">
                    <label for="">Domain</label>
                    <select name="domain_id" id="">
                    <option value="">Choose domain</option>
                    <?php while($row=mysqli_fetch_array($result)){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                    <?php }?>
                    </select>
                </div> 
                <div class="option">
                    <label for="">Status</label>
                    <select name="status" id="">
                    <option value="">Choose status</option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                    </select>
                </div>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="footer">
                <button name="register" class="btn">Register</button>
            </div>   
        </form>
        </div>
    </div>
</body>
</html>



<?php 
   include("connection.php");
   if(isset($_POST['register'])){
    $name=$_POST['name'];
    $primary_contact=$_POST['primary_contact'];
    $sec_contact=$_POST['sec_contact'];
    $email=$_POST['email'];
    $domain_id=$_POST['domain_id'];
    $password=$_POST['password'];
    $status=$_POST['status'];
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $sql="insert into manager (name,primary_contact,sec_contact,email,domain_id,password,status)
          values ('$name','$primary_contact','$sec_contact', '$email','$domain_id','$hash','$status')";
    $run=mysqli_query($conn,$sql);
    header("location:manager-login.php");
   }

?>