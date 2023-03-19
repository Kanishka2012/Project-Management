<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php 
       include("connection.php");
       session_start();
       $id=$_SESSION['id'];
       $sql="select * from project where manager_id='$id'";
       $run=mysqli_query($conn,$sql);
    ?>
    <div class="bg-wrapper">
    <div class="main-wrapper">
        <h1 class="project-heading">Projects</h1>
        <?php while($row=mysqli_fetch_array($run)){?>
            <div class="project-container">
                <div class="box">
                    <div class="inner-box">
                        <h4>Title</h4>
                        <p><?php echo $row['title'];?></p>
                    </div>
                    <div class="inner-box">
                        <h4>Deadline</h4>
                        <p><?php echo $row['deadline'];?></p>
                    </div>
                </div>
                <div class="second-box">
                <h4>Requirements</h4>
                <p><?php echo $row['requirements'];?></p>
                </div>
                <div class="second-box">
                <h4>Status</h4>
                <?php
                   $status=$row['status'];
                //    $status_name="";
                   if($status == 0) $status_name="Pending";
                   else if($status == 1) $status_name="Completed";
                   else if($status == 2) $status_name="Processing";
                   else if($status == 3) $status_name="Hold";
                   else $status_name="Terminate";
                ?>
               <p><?php echo $status_name;?></p>
               </div>
            </div>
            
        <?php }?>
        </div>
    </div>
   
</body>
</html>