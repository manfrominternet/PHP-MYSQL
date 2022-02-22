<?php
session_start();


$Produkty = $_POST['Produkty'];
$Cena = $_POST['Cena'];
$Loger = $_POST['Login'];

$conn = new mysqli('localhost','root','','formularz');

if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    echo "Zamówienie zostało zlozone!";
    $stmt = $conn->prepare("insert into zamowienia(Produkty, Cena, Loger) values(?, ?, ?)");
    $stmt->bind_param('sis',  $Produkty, $Cena, $Loger);
    $execval = $stmt->execute();
    echo $execval;
    echo "Wpisane!...";
    
    $stmt->close();
    $conn->close();
}
echo "Dziękujemy za zakupy, wylogowano! ";
session_destroy();

?>
<form action="wyslanezamowienie.php" method="post">
    <label for="Produkty">Produkty:</label><br>
    <input readonly required type="text" size="70" name="Produkty" value= <?php if($counter1>0){echo $P1;} if($counter2>0){echo $P2;} if($counter3>0){echo $P3;} if($counter4>0){echo $P4;} ?> /><br>
    <label for="Login">Login</label><br>
    <input  readonly type="text" name="Login" value=<?php echo $_SESSION['Login']; ?>><br>
    <label for="Cena">Cena:</label><br>
    <input type="number"  name="Cena" value=<?php echo $C1*$counter1+$C2*$counter2+$C3*$counter3+$C4*$counter4; ?> readonly><br>
    <?php if($counter1 >0 || $counter2 >0 || $counter3 >0 || $counter4 >0){echo "<button type='submit' id='wyslij'>Przeslij Dane</button>"; }?>
  </form>