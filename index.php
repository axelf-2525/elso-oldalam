<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valós idejű óra és dátum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f4f4f4;
            color: #333;
        }
        #clock {
            font-size: 2rem;
            margin-top: 20px;
        }
    </style>
</head>
    <h1>Üdvözöllek a weboldalon!</h1>
    <p>Ma a dátum: <strong><?php echo date("Y-m-d"); ?></strong></p>
    <p>Az aktuális idő:</p>
    <div id="clock">Betöltés...</div>
    <script>
        // Időformázó függvény, hogy mindig két számjegyű legyen
        function formatTime(unit) {
            return unit < 10 ? '0' + unit : unit; // Ha kisebb, mint 10, előtte egy 0
        }
        // Az óra frissítése
        function updateClock() {
            const now = new Date(); // Aktuális idő
            const hours = formatTime(now.getHours());
            const minutes = formatTime(now.getMinutes());
            const seconds = formatTime(now.getSeconds());
            const timeString = `${hours}:${minutes}:${seconds}`; // Az idő formázása
            // Az idő beállítása az oldalra
            document.getElementById('clock').innerText = timeString;
        }
        // Az óra azonnali frissítése és másodpercenkénti frissítés
        setInterval(updateClock, 1000); // 1 másodpercenként frissít
        updateClock(); // Azonnal meghívjuk, hogy ne kelljen várni
    </script>
    <?php
     require_once '..config/db.php';  // Az adatbázis kapcsolat betöltése és a db.php fájl hivatkozása
     //SQL lekérdezés, hogy megkapjuk a szövegeket az adatbázisból
     $sql = "SELECT text_content FROM texts WHERE id = 1";  // Feltétel hogy legyen
     $result = $conn->query($sql)
     if ($result->num_rows > 0) {
        // Amennyiben van találat megjelenítjük a szöveget
        while ($row = $result->fetch_assoc()) {
                echo "<h2>" . $row˙["text_content"] . "</h2>"; A lekért szöveg megjeleníté
        }
    }else {
        echo "Nem található szöveg.";
    }            
    // Kapcsolat lezárása
            $conn->close();
            ?>




</body>
</html>
