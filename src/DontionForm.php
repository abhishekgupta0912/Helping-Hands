<?php
require_once("include\connection.php");
$NameError="";
$AddressError="";
$CityError="";
$StateError="";
$ZipError="";
$categoryerror="";
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
    if(!empty($_POST["category"])){
        $category=strtolower($_POST["category"]);
        if($category!="book" || $category!="food" || $category!="clothes"){
            $categoryerror="   * Only Books Food Clothes can be donated...";
        }

    }
}
 if(!empty($_POST["firstname"])
 &&!empty($_POST["address"])
 &&!empty($_POST["city"])
 &&!empty($_POST["state"])
 &&!empty($_POST["email"])
 &&!empty($_POST["zip"])
 &&!empty($_POST["category"])){
    $category=strtolower($_POST["category"]);
    if((preg_match("/^[A-Za-z\. ]*$/",$_POST["firstname"])==true)
    &&(preg_match("/^[A-Za-z0-9\, ]*$/",$_POST["address"])==true)
    &&(preg_match("/^[A-Za-z\ ]*$/",$_POST["city"])==true)
    &&(preg_match("/^[0-9 ]{6}$/",$_POST["zip"])==true)
    &&(preg_match("/^[A-Za-z\ ]*$/",$_POST["state"]))
    &&($category!="book" || $category!="food" || $category!="clothes" || $category!="clothe" || $category!="books"))
    {
        $emailto="abgupta0912@gmail.com";
        $subject="Donation item received";
        $message="Person Name : ".$_POST["firstname"].
                  " \r\nPerson Address ".$_POST["address"]." ,".$_POST["city"]." ,".$_POST["state"]." (".$_POST["zip"].")".
                  " \r\nPerson Email :".$_POST["email"].
                  "\r\nDonated item ".$category;
        $header="From: abgupta0912@gmail.com";
       if(mail($emailto,$subject,$message,$header)){
            $name=$_POST["firstname"];
            $address=$_POST["address"];
            $email=$_POST["email"];
            $city=$_POST["city"];
            $state=$_POST["state"];
            $zip=$_POST["zip"];
            $connction;
            $sql="insert into donationform(name,category,email,address,state,city,zip)
            values(:namE,:categorY,:emaiL,:addresS,:statE,:citY,:ziP)";
            $stmt=$connction->prepare($sql);
            $stmt->bindValue(':namE',$name);
            $stmt->bindValue(':addresS',$address);
            $stmt->bindValue(':emaiL',$email);
            $stmt->bindValue(':statE',$state);
            $stmt->bindValue(':ziP',$zip);
            $stmt->bindValue(':citY',$city);
            $stmt->bindValue(':categorY',$category);
            $Execute= $stmt->execute();
            
          
         }
       
      
    }
 }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/userform.css">
<title>Donation Form</title>
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
                
                <li><a href="charity.php" data-after="About">Do Charity</a></li>
                <li><a href="contactus.php" data-after="About">contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>

<h2>Don't turn away, <span style="color: crimson; font-size: 3.5rem;">G</span>ive today! <br> <span style="color: crimson; font-size: 3.5rem;">B</span>e the change.</h2>
<div class="row">
  <div class="col-50">
    <div class="container1">
      <form action="DontionForm.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Donar Info</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="abhi gupta <?php echo $NameError;?>" required>
            <label for="fname"><i class="fa fa-check-circle"></i> Category</label>
            <input type="text" id="fname" name="category" placeholder="Books Clothes Food <?php echo $categoryerror;?>" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="xyz@example.com " required> 
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="132, shanti niwas  <?php echo $AddressError;?>" required >
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Mathura <?php echo $CityError;?>" required >

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="UP.. <?php echo $StateError;?>"required> 
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="1234567 <?php echo $ZipError;?>" required>
              </div>
            </div>
          </div>          
        </div>
        <input type="submit" value="Submit Details" name="submit" class="btn">
      </form>
    </div>
  </div>

</div>
<script src="../js/nav.js"></script>
</body>
</html>