
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/logincss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <title>Login Helping Hands</title>
</head>
<body>
    <section id="header">
        <div class="header container">
          <div class="nav-bar">
            <div class="brand">
              <a href="../index.html"><h1><span>H</span>elping <span>H</span>ands</h1></a>
            </div>
            <div class="nav-list">
              <div class="hamburger"><div class="bar"></div></div>
<<<<<<< HEAD:src/login.php
=======
              <ul>
                <li><a href="../index.html" data-after="Home">Log Out</a></li>
>>>>>>> 64b276faa5a12aa90de42ece2a700772933355ef:src/loginpage.html
            </div>
          </div>
        </div>
      </section>
<<<<<<< HEAD:src/login.php
   
    <div class="forms-main">
    
    <form action="validation.php" class="form" method="POST" >
      
=======
    <!-- main container that contains form -->
    <div class="forms-main">
        <!-- form container-->
    <form action="" class="form" >
        <!-- heading of form-->
>>>>>>> 64b276faa5a12aa90de42ece2a700772933355ef:src/loginpage.html
        <div class="headers">
        <h1>Member Login</h1>
    </div>
        <br>
    
        <div class="email">
            
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <input type="email" id="email" placeholder="Email" name="email" >
        </div>
        <br><br>
        <div class="password">
            <i class="fa fa-unlock" aria-hidden="true"></i>
            <input type="password" id="password" placeholder="Password" name="password">
        </div>
        <br><br>
        <?php 
session_start();
if(isset($_SESSION['mail'])){
  echo " invalid email or password! ";
  unset($_SESSION['mail']);
}
?>
        
        <input type="submit" value="Login">
        <br><br>
        <p>Forgot Password? <a href="signup.php">Sign Up</a> <br>
    <a href="adminl.php">Admin Login</a></p>
    </form>
</div>

<div class="cards">
   
    <div class="slider">
      
        <div ID="img1">
            <img src="../images/photo-1488521787991-ed7bbaae773c.jpg" alt="">
            <p>"YOU HAVE TWO HANDS, ONE TO HELP OTHERS"</p>
        </div>
        <div id="img2">
            <img src="../images/How-Donating-to-Charity-can-Positively-Impact-Your-Life-and-the-Lives-of-Other-People.jpg" alt="">
            <p>"LITTLE, BY LITTLE BECOMES ALOT"</p>
        </div>
    <div id="img3">
        <img src="../images/download (1).jpg" alt="">
        <p>"YOUR KINDNESS TODAY CAN SAVE THE LIVES TOMORROW"</p>
    </div>
   <div id="img4">
    <img src="../images/5d35baafa2676.jpeg" alt="">
    <p>"GIVING IS THE GREATEST ACT OF GRACE"</p>
   </div> 
    </div>
</div>
</body>
</html>
