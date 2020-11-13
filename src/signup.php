<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signupcss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  <title>SignUp  Helping Hands</title>
</head>
<body>
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="../index.html"><h1><span>H</span>elping <span>H</span>ands</h1></a>
        </div>

      </div>
    </div>
  </section>
 
    <form action="register.php" class="form" method="POST">
      
        <div class="header">
            <h1>Sign Up</h1>
        </div>
        <br>
        <div class="username">
           
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" id="name" placeholder="Username" name="name" required>
        </div>
        <br><br>
        
        <div class="email">
            
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="email" id="email" placeholder="Email" name="email" required>
        </div>
        <br><br>
        <div class="password">
            <i class="fa fa-unlock" aria-hidden="true"></i>
            <input type="password" id="password" placeholder="Password" name="password">
        </div>
        <br><br>
        <div class="phone">
                  <i class="fa fa-phone" aria-hidden="true"></i>
            <input type="tel" id="number" placeholder="Phone Number        <?php
            session_start();
if(isset($_SESSION['phone'])){
  echo "*enter a valid number";
  unset($_SESSION['phone']);
}
?>" name="phone">
    
        </div>
        <br>
        <?php 
if(isset($_SESSION['email'])){
  echo "      user already exists!         ";
  unset($_SESSION['email']);
}
?>
      <br>
        <input type="submit" name="submit" value="Sign up">
    </form>
   
</body>
</html>