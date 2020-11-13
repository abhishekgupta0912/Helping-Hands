<?php require_once('include/connection.php');
if(isset($_GET['delete'])){
    $did=$_GET['delete'];
    $execute=$connction->query("DELETE FROM signin WHERE id='$did'");
    if($execute){
        header("Location:admin.php");
    }
    else{
        header("Location:admin.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <section id="header">
        <div class="header container">
          <div class="nav-bar">
            <div class="brand">
              <a href="accounthome.php"><h1><span>H</span>elping <span>H</span>ands</h1></a>
            </div>
            <div class="nav-list">
              <div class="hamburger"><div class="bar"></div></div>
              <ul>
                <li><a href="../index.html" data-after="Home">Home</a></li>
                <li><a href="logout.php" data-after="logout">LogOut</a></li>
              </ul>
            </div>
          </div>
        </div>
    </section>
    <div class="buttons" style="margin-top: 80px;">
        <div class="head"> 
            <span class="top right"></span>
            <span class="top left"></span>
            <h1>Admin Pannel</h1>
            <span class="bottom right"></span>
            <span class="bottom left"></span>
        </div>
        <div class="button">
        <button class="btn btns" onclick="window.location.href='admin.php'">User</button>
            <button class="btn btns " onclick="window.location.href='admin1.php'">Donation Info</button>
            <Button class="btn btns" onclick="window.location.href='admin2.php'">Charity Info</Button>  
         </div>
    </div>

    <div class="table-wrapper" style="margin-top: 30px;">
        <table class="fl-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            
           <?php
            $connction;
            $sql="SELECT * FROM signin";
            $stmt=$connction->query($sql);
            while($datarow=$stmt->fetch()){
                $id=$datarow['id'];
                $user=$datarow['username'];
                $email=$datarow['email'];
                $phone=$datarow['phone'];
              
              
           ?>
            <tr>
               <td><?php echo $id;?></td>
               <td><?php echo $user;?></td>
               <td><?php echo $email;?></td>
               <td><?php echo $phone;?></td>
               <!-- <td>
                   <input type="submit" value="email" name="delete" class="btn btns"
                style=" color: black; font-size: 1rem;">
            </td> -->
               <!-- <td><button class="btn btns" onclick="window.location.href='admin.php'" 
               style=" color: black; font-size: 1rem;" name="delete">Delete User</button></td> -->
            <td><a href="admin.php?delete=<?php echo $id;?> " class="delete">Delete User</a></td>
           </tr>
            <?php }?>
            <tbody>
        </table>
    </div>
<script src="../js/nav.js"></script>
</body>
</html>