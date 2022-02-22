<?php

echo $_GET['id'];

?>


   <!-->
        <a href="admin.html?id=Dodaj">Dodaj</a>
        
        <h2>Dodaj</h2>
        <form action="admin.php?id=Dodaj" method="post">
            <label for="fname">Produkt:</label><br>
            <input type="text"  name="Produkt" ><br>
            <label for="lname">Cena:</label><br>
            <input type="number"  name="Cena" ><br>
            <label for="ulogin">Opis:</label><br>
            <input type="text"  name="Opis" ><br>
            <label for="1">1</label>
            <input type="radio"  name="id" value="1"><br>
            <label for="2">2</label>
            <input type="radio"  name="id" value="2"><br>
            <label for="3">3</label>
            <input type="radio"  name="id" value="3"><br>
            <label for="4">4</label>
            <input type="radio"  name="id" value="4"><br>
            <button type="submit" id="wyslij" >Dodaj</button>
        <form/>
        
        
        <h2>Update</h2>
        <form action="admin.php?id=Update" method="post">
            <label for="fname">Produkt:</label><br>
            <input type="text"  name="Produkt" ><br>
            <label for="lname">Cena:</label><br>
            <input type="number"  name="Cena" ><br>
            <label for="ulogin">Opis:</label><br>
            <input type="text"  name="Opis" ><br>
            <label for="1">1</label>
            <input type="radio"  name="id" value="1"><br>
            <label for="2">2</label>
            <input type="radio"  name="id" value="2"><br>
            <label for="3">3</label>
            <input type="radio"  name="id" value="3"><br>
            <label for="4">4</label>
            <input type="radio"  name="id" value="4"><br>
            <button type="submit" id="wyslij" >Zmien</button>
        <form/>