<?php
require_once("include\connection.php");
 
session_start();

$pmail=$_SESSION['pmail'];
$sql="SELECT phone ,username FROM signin WHERE email = '".$pmail."' ";
$phone="";
$user="";
$stmt=$connction->query($sql);
while($datarow=$stmt->fetch()){
  $phone=$datarow['phone'];
  $user=$datarow['username'];
}
$sql="SELECT category FROM donationform WHERE email = '".$pmail."' && name = '".$user."' ";
$stmt1=$connction->query($sql);
$b=0;
$f=0;
$c=0;
while($datarow1=$stmt1->fetch()){
  $category=$datarow1['category'];
  if($category=='food'){
    $f++;
  }
  elseif($category=='clothes' || $category=='clothe'){$c++;}
  elseif($category=='book' || $category=='books'){$b++;}
}
$sql= "SELECT amount FROM charitys WHERE email = '".$pmail."' && name = '".$user."' && phone ='".$phone."' ";
$stmt2=$connction->query($sql); 
$charity=0;
while($datarow2=$stmt2->fetch()){
$charity +=$datarow2['amount'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info </title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <section id="header">
      <div class="header container">
        <div class="nav-bar">
          <div class="brand">
            <a href="#hero"><h1><span>H</span>elping <span>H</span>ands</h1></a>
          </div>
          <div class="nav-list">
            <div class="hamburger"><div class="bar"></div></div>
            <ul>
              <li><a href="accounthome.php" data-after="Home">Home</a></li>
              <li><a href="donate_us.html" data-after="Service">Donate</a></li>
              <li><a href="charity.php" data-after="Projects">Do Charity</a></li>
              <li><a href="contactus.php" data-after="About">Contact Us</a></li>
              <li><a href="logout.php" data-after="About">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
<div class="wrapper">
    <div class="left">
      <div class="lef1">
      
        <img src="../images/pro.jpg" alt="user" width="100">

      </div>
      <div class="lef2">
        <h4><?php echo strtoupper($user);?></h4>
        <p>Member</p>
       </div>
    </div>
    <div class="right">
    
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email:</h4>
                    <p><?php echo $pmail;?></p>
                 </div>
                 <div class="data">
                   <h4>Phone:</h4>
                    <p><?php echo $phone;?></p>
              </div>
            </div>
        </div>
      
      <div class="projects">
            <h3>Doantions</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Item Donated</h4>
                    
                    <p>Books Donated=<?php echo $b;?><br> <br>
                    Clothes Donated=<?php echo $c;?><br><br>
                    No of times Food Donated=<?php echo $f;?></p>
                 </div>
                 <div class="data">
                   <h4>Charity Done</h4>
                    <p>Amount Donated = <?php echo $charity?></p>
              </div>
            </div>
        </div>
      
        <div class="social_media">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
      </div>
    </div>
    <script src="../js/nav.js"></script>
</div>
</body>
</html>