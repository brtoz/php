<!DOCTYPE html>
<html>

<head>
    <title>Sekil Hesaplama</title>
</head>

<body>
    <form method="get" action="">
        <label for="shape">Şekil Seçin:</label>
        <select id="shape" name="shape" onchange="clearResults()">
            <option value="kare">Kare</option>
            <option value="dikdortgen">Dikdörtgen</option>
            <option value="ucgen">Üçgen</option>
        </select>
        <br /><br />
        <label for="edge1">Kenar 1:</label>
        <input type="text" id="edge1" name="edge1" required placeholder="Kenar uzunluğu girin"> 
        <br /><br />
        <label for="edge2">Kenar 2:</label>
        <input type="text" id="edge2" name="edge2" placeholder="Kenar uzunluğu girin">
        <br /><br />
        <label for="edge3">Kenar 3:</label>
        <input type="text" id="edge3" name="edge3" placeholder="Kenar uzunluğu girin">
        <br /><br />
        <input type="submit" value="Hesapla">
    </form>
    <?php

    class Sekil
    {
        public $x, $y, $z;

        public function __construct($x, $y = null, $z = null)
        {
            $this->x = $x;  
            $this->y = $y;  
            $this->z = $z;  
        }
    }

    class Kare extends Sekil
    {
        public function cevre()
        {
            return $this->x * 4;
        }
        public function alan()
        {
            return pow($this->x, 2);
        }
    }

    class Dikdortgen extends Sekil
    {
        public function cevre()
        {
            return 2 * ($this->x + $this->y);
        }
        public function alan()
        {
            return $this->x * $this->y;
        }
    }

    class Ucgen extends Sekil
    {
        public function cevre()
        {
            return $this->x + $this->y + $this->z;
        }
        public function alan()
        {
            $u = $this->cevre() / 2;
            return sqrt($u * ($u - $this->x) * ($u - $this->y) * ($u - $this->z));
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["shape"]) && isset($_GET["edge1"])) {
            $shape = $_GET["shape"];
            $edge1 = $_GET["edge1"];
            $edge2 = $_GET["edge2"] ?? null;
            $edge3 = $_GET["edge3"] ?? null;

            if ($shape == "kare") {
                $shapeObj = new Kare($edge1);
                echo "<br/><br/>";
                echo "Çevre: " . $shapeObj->cevre() . "<br/>";
                echo "Alan: " . $shapeObj->alan();
            } elseif ($shape == "dikdortgen") {
                $shapeObj = new Dikdortgen($edge1, $edge2);
                echo "<br/><br/>";
                echo "Çevre: " . $shapeObj->cevre() . "<br/>";
                echo "Alan: " . $shapeObj->alan();
            } elseif ($shape == "ucgen") {
                $shapeObj = new Ucgen($edge1, $edge2, $edge3);
                echo "<br/><br/>";
                echo "Çevre: " . $shapeObj->cevre() . "<br/>";
                echo "Alan: " . $shapeObj->alan();
            }
        }
    }
    ?>

</body>

</html>