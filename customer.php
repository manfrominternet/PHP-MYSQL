<?php
session_start();
if(empty($_SESSION['cart1'])){
  $_SESSION['cart1'] = array();
}

if(empty($_SESSION['cart2'])){
  $_SESSION['cart2'] = array();
}

if(empty($_SESSION['cart3'])){
  $_SESSION['cart3'] = array();
}





if($_GET['id'] == "Basketball"){
    array_push($_SESSION['cart1'], $_GET['id']);
}
if($_GET['id'] == "Volleyball"){
    array_push($_SESSION['cart2'], $_GET['id']);
}
if($_GET['id'] == "Football"){
    array_push($_SESSION['cart3'], $_GET['id']);
}


if($_GET['id'] == "-Basketball"){
    array_pop($_SESSION['cart1']);
}
if($_GET['id'] == "-Volleyball"){
    array_pop($_SESSION['cart2']);
}
if($_GET['id'] == "-Football"){
    array_pop($_SESSION['cart3']);
}

if($_GET['id'] == "Koniec"){
    session_destroy();
}




  // Database connection
  $conn = new mysqli('localhost','root','','sklep');

  if($conn->connect_error){
      echo "$conn->connect_error";
      die("Connection Failed : ". $conn->connect_error);
  } else {
      //echo "Connected Succesfully!";
      $sql = "SELECT id, Produkt1, Cena1, Opis1, Produkt2, Cena2, Opis2, Produkt3, Cena3, Opis3 FROM produkty;";
      $result =  $conn->query($sql);
      if ($result) {
          // output data of each row
          
             
          while($row = $result->fetch_assoc()) {
              //echo "Wystartowałem";
              $p1 = $row["Produkt1"];
              $p2 = $row["Produkt2"];
              $p3 = $row["Produkt3"];
              $c1 = $row["Cena1"];
              $c2 = $row["Cena2"];
              $c3 = $row["Cena3"];
              $o1 = $row["Opis1"];
              $o2 = $row["Opis2"];
              $o3 = $row["Opis3"];
          }
      } else {
          echo "Brak produktów";
      }
      $conn->close();
  }
$cenaP1 = (count($_SESSION['cart1'])*$c1);
$cenaP2= (count($_SESSION['cart2'])*$c2);
$cenaP3 = (count($_SESSION['cart3'])*$c3);

echo "<h1>Koszyk</h1> <br>";
echo "<h3> Produkty: </h3>";
echo $p1;
echo "  cena za sztukę ";
echo $c1;
echo "zł ";
echo "Opis: ";
echo $o1;
echo " ilość ";
echo count($_SESSION['cart1']);
echo " cena razem ";
echo $cenaP1;
echo "zł <br>";
echo $p2;
echo "  cena za sztukę ";
echo $c2;
echo "zł ";
echo "Opis: ";
echo $o2;
echo " ilość ";
echo count($_SESSION['cart2']);
echo " cena razem ";
echo $cenaP2;
echo "zł <br>";
echo $p3;
echo "  cena za sztukę ";
echo $c3;
echo "zł ";
echo "Opis: ";
echo $o3;
echo " ilość ";
echo count($_SESSION['cart3']);
echo " cena razem ";
echo $cenaP3;
echo "zł <br>";
echo " Razem ";
echo $cenaP1 + $cenaP2 + $cenaP3;
echo "zł ";
?>

<div class="product">
           <h3>Basketball</h3>
           <a href="addToCard.php?id=Basketball">Add to Card</a>
            <a href="addToCard.php?id=-Basketball">Delete from Card</a>
       </div>
<div class="product">
    <h3>Volleyball</h3>
    <a href="addToCard.php?id=Volleyball">Add to Card</a>
    <a href="addToCard.php?id=-Volleyball">Delete from Card</a>
</div>
       <div class="product">
           <h3>Football</h3>
           <a href="addToCard.php?id=Football">Add to Card</a>
            <a href="addToCard.php?id=-Football">Delete from Card</a>
       </div>
    
<?php

if(isset($_POST['submit'])){
    $to = "symulacjasklepu@example.com"; // email sklepu
    $from = $_POST['email']; //email nadawcy
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Zamowienie";
    $subject2 = "Kopia";
    $message = $first_name . " " . $last_name . " chce zamówić:" . "\n\n" . $_POST['message'];
    $message2 = "Tak nam napisałeś" . $first_name . "\n\n" . $_POST['message'];

    $headers = "Od:" . $from;
    $headers2 = "Od:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Wyslane dzięki " . $first_name . ", zamowienia do odbioru w paczkomacie.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post">
First Name: <input type="text" name="first_name" required><br>
Last Name: <input type="text" name="last_name" required><br>
Email: <input type="text" name="email" required><br>
Message:<br><textarea value="wiadomość" rows="15" name="message" cols="50">Chciałbym zamówić: <?php echo $p1," sztuk ", count($_SESSION['cart1']), " ", $p2, " sztuk ",count($_SESSION['cart2']), " ", $p3, " sztuk ", count($_SESSION['cart3']), " "; ?></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

<a href="addToCard.php?id=Koniec">Koncze zakupy</a>
</body>
</html>
