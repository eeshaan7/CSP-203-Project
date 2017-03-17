<?php

$username = "user0";
$password = "csl203lab";
$table_name = "Lost_Items";

mysql_connect(localhost,$username,$password);
@mysql_select_db("lab") or die ("Unable to select database");

$query = "SELECT * FROM $table_name";
$result = mysql_query($query);
$num = mysql_num_rows($result);
mysql_close();

?>

   <html>
   <head>
       <title>Lost Items Database</title>
       <link rel="stylesheet" type="text/css" href="style.css" />
   </head>

   <h1><center>Lost Item Database </center></h1><br><br>
   <table border="0" cellspacing="2" cellpadding="2">
   <tr>
   <th><font face="Arial, sans-serif">S.No.</font></th>
   <th><font face="Arial, sans-serif">Name</font></th>
   <th><font face="Arial, sans-serif">Item Lost</font></th>
   <th><font face="Arial, sans-serif">Location</font></th>
   <th><font face="Arial, sans-serif">Date</font></th>
   <th><font face="Arial, sans-serif">Contact E-mail</font></th>
   </tr>

<?php
$i=0;
while ($i < $num) {

$name = mysql_result($result, $i, "Name");
$e_no = mysql_result($result, $i, "EntryNumber");
$email =  mysql_result($result, $i, "Email");
$date =  mysql_result($result, $i, "Date");
$loc =  mysql_result($result, $i, "Location");
$loc_descp =  mysql_result($result, $i, "Location_desc");
$cat =  mysql_result($result, $i, "Category");
$sub_cat =  mysql_result($result, $i, "SubCategory");
$brand =  mysql_result($result, $i, "Brand");
$model =  mysql_result($result, $i, "Model");
$item_descp =  mysql_result($result, $i, "Item_desc");
$color =  mysql_result($result, $i, "Color");

echo "<tr>
	<td>$i</td>
	<td>$name</td>
	<td>$pob</td>
	<td>$pin</td>
	<td>$state</td></tr>";
$i++;
}
?>
</table>
<center>
<a href = "index.html"> Go back to homepage </a>
</center>
</html>

