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
    <div class="bg-wrapper">
        <div class="main-wrapper">
            <div class="heading">
                <h1>Add a Project</h1>
            </div>
        <form action="add-project.php" method="POST">
            <div class="form-body">
                <div class="input-left">
                <input type="text" name="title" placeholder="Project Title" required>
                <div class="option">
                    <label for="">Deadline</label>
                    <input type="date" name="deadline" placeholder="Deadline" required>
                </div>
                <div class="option">
                <label for="">Status</label>
                <select name="status" id="">
                    <option value="">Choose status</option>
                    <option value="0">Pending</option>
                    <option value="1">Completed</option>
                    <option value="2">Processing</option>
                    <option value="3">Hold</option>
                    <option value="4">Terminate</option>
                </select>
                </div>
                </div>
                <div class="input-right">
                    <label for="">Requirements</label>
                    <textarea name="requirements" id="" cols="18" rows="7" placeholder="Start here"></textarea>
                </div>
                </div>
            <div class="footer">
                <button class="btn" name="add">Add Project</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>



<?php 
   include("connection.php");
   session_start();
   $manager_id=$_SESSION['id'];
   if(isset($_POST['add'])){
    $title=$_POST['title'];
    $requirements=$_POST['requirements'];
    $deadline=$_POST['deadline'];
    $status=$_POST['status'];
    
    $sql="insert into project (title,requirements,deadline,manager_id,status)
          values ('$title','$requirements','$deadline','$manager_id','$status')";
    $run=mysqli_query($conn,$sql);
    header("location:loggedin.php");
   }

?>