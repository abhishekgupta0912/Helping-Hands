<?php
require_once("include\connection.php");
$NameError="";
$AddressError="";
$CityError="";
$StateError="";
$ZipError="";
$PhoneError="";
$AmountError="";
if(isset($_POST["submit"])){
    if(!empty($_POST["firstname"]))
    {
        if(!preg_match("/^[A-Za-z\. ]*$/",$_POST["firstname"])){
            $NameError="  * Only Letters and white sapace are allowed";
            }
    }
    if(!empty($_POST["address"]))
    {
        if(!preg_match("/^[A-Za-z0-9\, ]*$/",$_POST["address"])){
            $AddressError="  * Only Letters and white sapace are allowed ";
            }
    }
    if(!empty($_POST["city"]))
    {
        if(!preg_match("/^[A-Za-z\ ]*$/",$_POST["city"])){
            $CityError="  * Only Letters and white sapace are allowed";
            }
    }

    if(!empty($_POST["state"]))
    {
        if(!preg_match("/^[A-Za-z\ ]*$/",$_POST["state"])){
            $StateError="  * Only Letters and white sapace are allowed";
            }
    }
    if(!empty($_POST["zip"]))
    {
        if(!preg_match("/^[0-9 ]{6}$/",$_POST["zip"])){
            $ZipError="  * Enter 6 Digit Code";
            }
    }
    if(!empty($_POST["amount"]))
    {
        if(!preg_match("/[0-9]$/",$_POST["amount"])){
            $AmountError="  * Enter Digit Only";
            }
    }
    if(!empty($_POST["phone"]))
    {
        if(!preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$_POST["phone"])){
            $PhoneError="  * Enter a valid phonr no.";
            }
    }
 }if(!empty($_POST["firstname"])
 &&!empty($_POST["address"])
 &&!empty($_POST["phone"])
 &&!empty($_POST["amount"])
 &&!empty($_POST["city"])
 &&!empty($_POST["state"])
 &&!empty($_POST["email"])
 &&!empty($_POST["zip"])){
    if((preg_match("/^[A-Za-z\. ]*$/",$_POST["firstname"])==true)
    &&(preg_match("/^[A-Za-z0-9\, ]*$/",$_POST["address"])==true)
    &&(preg_match("/^[A-Za-z\ ]*$/",$_POST["city"])==true)
    &&(preg_match("/^[0-9 ]{6}$/",$_POST["zip"])==true)
    &&(preg_match("/[0-9 ]$/",$_POST["amount"])==true)
    &&(preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$_POST["phone"])==true)
    &&(preg_match("/^[A-Za-z\ ]*$/",$_POST["state"])))
    {
        $emailto="abgupta0912@gmail.com";
        $subject="Donation received";
        $message="Person Name : ".$_POST["firstname"].
                  " \r\nPerson Phone No. ".$_POST["phone"].
                  " \r\nPerson Address ".$_POST["address"]." ,".$_POST["city"]." ,".$_POST["state"]." (".$_POST["zip"].")".
                  " \r\nPerson Email :".$_POST["email"].
                  " \r\nAmount Donated ".$_POST["amount"];
        $header="From: abgupta0912@gmail.com";
       if(mail($emailto,$subject,$message,$header)){
          
            $name=$_POST["firstname"];
            $address=$_POST["address"];
            $email=$_POST["email"];
            $city=$_POST["city"];
            $state=$_POST["state"];
            $zip=$_POST["zip"];
            $phone=$_POST["phone"];
            $amount=$_POST["amount"];
            $connction;
            $sql="insert into charitys(name,email,amount,phone,address,city,state,zip)
            values(:namE,:emaiL,:amounT,:phonE,:addresS,:citY,:statE,:ziP)";
            $stmt=$connction->prepare($sql);
            $stmt->bindValue(':namE',$name);
            $stmt->bindValue(':addresS',$address);
            $stmt->bindValue(':emaiL',$email);
            $stmt->bindValue(':statE',$state);
            $stmt->bindValue(':ziP',$zip);
            $stmt->bindValue(':citY',$city);
            $stmt->bindValue(':amounT',$amount);
            $stmt->bindValue(':phonE',$phone);
            $Execute= $stmt->execute();
            
            if($Execute){
                echo " data insert hua hai tuma data base me :)";
            }
            else echo "data insert nai hua .... ):";
         }
        else {
            echo "not sent";
        }
      
    }else{
      echo "kuch to hua hai ";
    }
 }
?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/charity.css">
<title>Charity</title>
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
                <li><a href="donate_us.html" data-after="Service">Donation US</a></li>
                <li><a href="contactus.php" data-after="About">contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>

<h2>Don't turn away, <span style="color: crimson; font-size: 3.5rem;">G</span>ive today! <br> <span style="color: crimson; font-size: 3.5rem;">B</span>e the change.</h2>
<div class="row">
  <div class="col-75">
    <div class="container1">
      <form action="charity.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Donar Info</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="abhi gupta   <?php echo $NameError;?>" required>
            
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="xyz@example.com" required> 
            
            <label for="phone"><i class="fa fa-phone"></i> Enter Phone N0.</label>
            <input type="text" id="phone" name="phone" placeholder="1234567890  <?php echo $PhoneError;?>" required >

            <label for="amount"><i class="fa fa-institution"></i> Enter Amount</label>
            <input type="text" id="amount" name="amount" placeholder="$100  <?php echo $AmountError;?>" required >

            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="132, shanti niwas <?php echo $AddressError;?> " required >
           
            <div class="row">
            <div class="col-33">
                <label for="city">City</label>
                <input type="text" id="city" name="city" placeholder="Mathura  <?php echo $CityError;?>"required> 
              </div>
              <div class="col-33">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="UP..  <?php echo $StateError;?>"required> 
              </div>
              <div class="col-33">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="1234567  <?php echo $ZipError;?>" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" >
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" >
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" >
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" >
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" >
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr" required> I agree with the terms and condition*.
        </label>
        <input type="submit" value="Continue TO Pay!!" class="btn" name="submit" >
      </form>
    </div>
  </div>

</div>
<script src="../js/nav.js"></script>
</body>
</html>
