<?php
require_once("include\connection.php");
$NameError="";
$PhoneError="";
$MsgError="";
if(isset($_POST["submit"])){
    if(!empty($_POST["name"]))
    {
        if(!preg_match("/^[A-Za-z\. ]*$/",$_POST["name"])){
            $NameError="  * Only Letters and white sapace are allowed";
            }
    }
    if(!empty($_POST["phone"]))
    {
        if(!preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$_POST["phone"])){
            $PhoneError="  * Enter a valid phonr no.";
            }
    }
    if(!empty($_POST["msg"]))
    {
        if(!preg_match("/^[A-Za-z\. ]*$/",$_POST["msg"])){
            $MsgError="  * Only Letters and white sapace are allowed";
            }
    }
}if(!empty($_POST["name"])&&!empty($_POST["phone"])&&!empty($_POST["msg"])){
    if((preg_match("/^[A-Za-z\. ]*$/",$_POST["name"])==true)&&
    (preg_match("/^[A-Za-z\. ]*$/",$_POST["msg"])==true)&&
    (preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$_POST["phone"])))
    {
        $emailto=$_POST["email"];
        $subject="Feedback";
        $message="Person Name : ".$_POST["name"].
                  " with the phone no. : ".$_POST["phone"].
                  " having email :".$_POST["email"].
                  " have given the msg : ".$_POST["feedback"];
        $header="From: abgupta0912@gmail.com";
       if(mail($emailto,$subject,$message,$header)){
            $name=$_POST["name"];
            $phone=$_POST["phone"];
            $email=$_POST["email"];
            $sub=$_POST["msg"];
            $msg=$_POST["feedback"];
            $connction;
            $sql="insert into contactus(name,phoneno,email,subject,msg)
            values(:namE,:phonenO,:emaiL,:subjecT,:msG)";
            $stmt=$connction->prepare($sql);
            $stmt->bindValue(':namE',$name);
            $stmt->bindValue(':phonenO',$phone);
            $stmt->bindValue(':emaiL',$email);
            $stmt->bindValue(':subjecT',$sub);
            $stmt->bindValue(':msG',$msg);
            $Execute= $stmt->execute();
            
         
        }
     
    }
}


?>




<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" type="text/css" href="../css/get_in_touch.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Contact</title>
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
              <ul>
                <li><a href="../index.html" data-after="Home">Home</a></li>
                <li><a href="donate_us.html" data-after="Service">Donate Us</a></li>
                <li><a href="charity.php" data-after="Projects">Do Charity</a></li>
              
            </div>
          </div>
        </div>
      </section class="mainarea">

         <section id="contact-section">
           <div class="container1">
           	 <h2>Contact <span id="head">U</span>s</h2>
              <p>Email us and keep upto date with our latest news</p>
             <div class="contact-form">

                 
               <div>
                 <i class="fa fa-map-marker"></i><span class="form-info">  123 XYZ Road , Mathura  </span><br>
                 <i class="fa fa-phone" > </i><span class="form-info">  +92 00034567890</span><br>
                 <i class="fa fa-envelope"></i><span class="form-info">  helpinghands@Gmail.com</span>
               </div>
               
           <div>        
             <form method="POST" action="contactus.php">
               <input type="text" placeholder="Your Name <?php echo $NameError;?>" Name="name" required>
               <input type="text" placeholder="Phone No. <?php echo $PhoneError;?>" Name="phone" required><br>
               <input type="Email" placeholder="Email" Name="email" required><br>
               <input type="text" placeholder="Subject of this message <?php echo $MsgError;?>" Name="msg"><br>
               <textarea  placeholder="Message" rows="4" Name="feedback" required></textarea><br>
               <input type="submit" value="Submit Form" class="submit" Name="submit"> 
             </form>   
               </div>
             </div>
           </div>
           
         </section>

         <section id="footer">
          <div class="footer container">
            <div class="brand"><h1><span>H</span>elp <span>W</span>orld</h1></div>
            <h2>Alone we can do so little but together we can do so much</h2>
            <div class="social-icon">
              <div class="social-item">
                <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png"/></a>
              </div>
              <div class="social-item">
                <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png"/></a>
              </div>
              <div class="social-item">
                <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png"/></a>
              </div>
              <div class="social-item">
                <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png"/></a>
              </div>
            </div>
          </div>
        </section>
        <script src="../js/nav.js"></script>
     </body>

     </html>