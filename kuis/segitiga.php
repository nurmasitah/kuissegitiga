<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Segitiga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center; /* Membuat semua teks di dalam container rata tengah */
        }
        form {
            display: inline-block;
            text-align: left; /* Biar form label & input tetap rapi */
        }
        input[type="number"] {
            width: 100px;
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 8px 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: #dc3545;
            font-weight: bold;
            margin-top: 15px;
        }
        .hasil {
            margin-top: 20px;
            padding: 15px;
            background-color: #222;
            color: #00ff88;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            line-height: 1.2;
            display: inline-block; /* Membuat kotak menyesuaikan isi dan bisa di-center */
            text-align: left;     /* Agar bentuk bintang tetap rapi sejajar */
        }
        .sub-hasil {
            margin-top: 15px;
            padding: 15px;
            background-color: #222;
            color: #00ff88;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            line-height: 1.2;
            white-space: pre;
            display: inline-block; /* Membuat kotak menyesuaikan isi dan bisa di-center */
            text-align: left;     /* Agar bentuk bintang tetap rapi sejajar */
        }
        h3 {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Generator Segitiga</h2>
    
    <!-- Form untuk memasukkan tinggi segitiga -->
    <form method="POST" action="">
        <label for="tinggi">Masukkan Tinggi (1 - 20):</label><br><br>
        <input type="number" id="tinggi" name="tinggi" value="<?= isset($_POST['tinggi']) ? htmlspecialchars($_POST['tinggi']) : '' ?>" required>
        <button type="submit">Buat Segitiga</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['tinggi'];

        // Validasi: pastikan input adalah bilangan bulat (integer) dan berada di rentang 1-20
        $tinggi = filter_var($input, FILTER_VALIDATE_INT);

        if ($tinggi === false || $tinggi < 1 || $tinggi > 20) {
            echo "<p class='error'>Input tidak valid! Harap masukkan bilangan bulat antara 1 hingga 20.</p>";
        } else {
            // 1. PIRAMIDA UTAMA (Sesuai kode awal Anda)
            echo "<div><div class='hasil'>";
            
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                    echo "&nbsp;";
                }
                for ($bintang = 1; $bintang <= (2 * $i - 1); $bintang++) {
                    echo "*";
                }
                echo "<br>";
            }

            echo "</div></div>";

            // 2. 4 JENIS PIRAMIDA TAMBAHAN DI BAWAHNYA
            // A. Siku-siku Rata Kiri
            $sikuKiri = "";
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    $sikuKiri .= "*";
                }
                $sikuKiri .= "\n";
            }

            // B. Siku-siku Rata Kanan
            $sikuKanan = "";
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($s = 1; $s <= ($tinggi - $i); $s++) {
                    $sikuKanan .= " ";
                }
                for ($j = 1; $j <= $i; $j++) {
                    $sikuKanan .= "*";
                }
                $sikuKanan .= "\n";
            }

            // C. Normal / Simetris
            $simetris = "";
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($s = 1; $s <= ($tinggi - $i); $s++) {
                    $simetris .= " ";
                }
                for ($b = 1; $b <= (2 * $i - 1); $b++) {
                    $simetris .= "*";
                }
                $simetris .= "\n";
            }

            // D. Terbalik
            $terbalik = "";
            for ($i = $tinggi; $i >= 1; $i--) {
                for ($s = 1; $s <= ($tinggi - $i); $s++) {
                    $terbalik .= " ";
                }
                for ($b = 1; $b <= (2 * $i - 1); $b++) {
                    $terbalik .= "*";
                }
                $terbalik .= "\n";
            }

            echo "<hr style='margin: 30px 0;'>";

            echo "<h3>1. Siku-siku Rata Kiri</h3>";
            echo "<div><div class='sub-hasil'>" . htmlspecialchars($sikuKiri) . "</div></div>";

            echo "<h3>2. Siku-siku Rata Kanan</h3>";
            echo "<div><div class='sub-hasil'>" . htmlspecialchars($sikuKanan) . "</div></div>";

            echo "<h3>3. Normal / Simetris</h3>";
            echo "<div><div class='sub-hasil'>" . htmlspecialchars($simetris) . "</div></div>";

            echo "<h3>4. Piramida Terbalik</h3>";
            echo "<div><div class='sub-hasil'>" . htmlspecialchars($terbalik) . "</div></div>";
        }
    }
    ?>
</div>

</body>
</html>