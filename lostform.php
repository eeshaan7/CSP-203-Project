<?php

$name = $_POST['name'];
$e_no = $_POST['entnum'];
$email = $_POST['email'];
$date = $_POST['date'];
$loc = $_POST['loc'];
$loc_descp = $_POST['loc_descp'];
$cat = $_POST['cat'];
$sub_cat = $_POST['sub_cat'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$color = $_POST['color'];
$item_descp = $_POST['item_descp'];

$username = "user0";
$password = "password";
$database = "csp203_database";

//$mysqli = new mysqli('localhost', $username, $password, $database) or die ("Unable to connect to database");

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die ("Unable to select database");

if(isset($_POST['submit']))
{
  echo "Good Job";
}
else 
{
  echo "Bad Job";
}

$query = "INSERT INTO lost_items VALUES ('','$name', '$cat', '$sub_cat', '$brand', '$model', '$color', '$item_descp', '$date', '$loc', '$loc_descp', '$email')";
mysql_query($query);

//mysql_close();

?>

<html>
<head>
   <title> Lost Item Form </title>
   <link rel="stylesheet" type="text/css" href="/Lost_Found/css/style_lost.css" />

   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <script>
      $(document).ready(function() {
        $("#datepicker").datepicker();
      });

      function populate1(s1,s2) {
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        if(s1.value == "Electronics") {
          var optionArray = ["|", "Camera|Camera", "Cellular Phone|Cellular Phone","Laptop Adapters|Laptop Adapters","Computers/Tablets|Computers/Tablets","Video Game Systems|Video Game Systems","Pendrive|Pendrive","External Hard Drive|External Hard Drive","Mobile Adapters|Mobile Adapters","Data Cables|Data Cables","Calculator|Calculator","Wrist Watch|Wrist Watch","Powerbank|Powerbank","Earphones/Headphones|Earphones/Headphones","Extension Board|Extension Board"];
        }
        else if(s1.value == "Clothing") {
          var optionArray = ["|", "Shirt/T-shirt|Shirt/T-shirt", "Undergarment|Undergarment","Jeans/Pants|Jeans/Pants","Belt|Belt","Hat|Hat","Shoes|Shoes","Assorted Cloth|Assorted Cloth","Laundry Bag|Laundry Bag","Sock|Sock","Sweater/Sweatshirt|Sweater/Sweatshirt","Blazzer/Suit|Blazzer/Suit"]; 
        }
        for(var option in optionArray) {
          var pair = optionArray[option].split("|");
          var newOption = document.createElement("option");
          newOption.value = pair[0];
          newOption.innerHTML = pair[1];
          s2.options.add(newOption);
        }
      }

      function populate2(s1,s2,s3) {
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        var s3 = document.getElementById(s3);
        s3.innerHTML = "";
        if(s1.value == "Electronics") {
          if(s2.value == "Camera") {
            var optionArray = ["|", "Nikon|Nikon","Canon|Canon","Sony|Sony","Samsung|Samsung","Panasonic|Panasonic","Kodak|Kodak","JVC|JVC","Hitachi|Hitachi","Olympus|Olympus"];
          }
        }
        for(var option in optionArray) {
          var pair = optionArray[option].split("|");
          var newOption = document.createElement("option");
          newOption.value = pair[0];
          newOption.innerHTML = pair[1];
          s3.options.add(newOption);
        }
      }

    </script>

</head>

<body>  
  <form action="/Lost_Found/inc/lostform.php" method="post">
  <h1 id="lost">Report a Lost Item
        <span id="lost_span">Please fill all the texts in the fields.</span>
  </h1>
  <label>
     <span>Name :</span>
     <input type="text" name="name"><br>
  </label>
  <label>
     <span>Entry Number :</span>
     <input type="text" name="entnum"><br>
  </label>
  <label>
     <span>E-mail :</span>
     <input type="email" name="email"><br>
  </label>
  <label>
     <span>Date Item was Lost : &nbsp; </span>
     <br>
     <input id="datepicker" name="date"><br>
  </label>

  <label>
     <span>Last Seen Location : &nbsp; </span>
     <br>
     <select id="loc" name="loc">
      <option value=""> </option>
      <option value="Main Cafeteria">Main Cafeteria </option>
      <option value="Mercury Hostel Cafeteria">Mercury Hostel Cafeteria </option>
      <option value="Neptune Hostel">Neptune Hostel </option>
      <option value="Jupiter Hostel">Jupiter Hostel </option>
      <option value="Venus Hostel">Venus Hostel</option>
      <option value="Mecury Hostel">Mercury Hostel </option>
      <option value="Research and Computer Labs">Research and Computer Labs </option>
      <option value="Lecture or Conference Halls">Lecture or Conference Halls </option>
      <option value="Playground or SAC Area">Playground or SAC Area </option>
      <option value="Administrative Block">Administrative Block </option>
      <option value="Library">Library </option>
    </select>
  </label>
  <label> 
  <label>
     <span>Specific Location Description :</span>
     <textarea class="input" rows="10" cols="10" name="loc_descp"></textarea>
  </label>
  <label>
     <span>Category : &nbsp; </span>
     <br>
     <select id="cat" name="cat" onchange="populate1(this.id,'sub_cat')">
      <option value=""> </option>
      <option value="Clothing">Clothing </option>
      <option value="Currency/Money">Currency/Money </option>
      <option value="Electronics">Electronics </option>
    </select>
  </label>
  <label> 
     <span>Sub-Cateogry : &nbsp; </span>
     <br>
     <select id="sub_cat" name="sub_cat" onchange="populate2('cat',this.id,'brand')">
     </select>
  </label>
  <label> 
     <span>Brand : &nbsp; </span>
     <br>
     <select id="brand" name="brand">
     </select>
  </label>
  <label>
     <span>Model :</span>
     <input type="text" name="model"><br>
  </label>
  <label>
     <span>Brief Description :</span>
     <textarea class="input" rows="10" cols="10" name="item_descp"></textarea>
  </label>
  <label>
     <span>Color : &nbsp; </span>
     <br>
     <select id="color" name="color">
      <option value=""> </option>
      <option value="Red">Red </option>
      <option value="Yellow">Yellow </option>
      <option value="Green">Green </option>
    </select>
  </label>
    
  <br>
  <input type="submit" name = "submit" value="SUBMIT">
  </form> 

</body>
</html>