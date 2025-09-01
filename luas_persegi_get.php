<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Luas Persegi Panjang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0a0f1c, #0f2027, #1b2a38);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(15, 32, 47, 0.9);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 0px 25px rgba(0, 212, 255, 0.3);
            text-align: center;
            width: 90%;
            max-width: 400px;
            color: #e0f7ff;
        }
        h2 {
            margin-bottom: 20px;
            color: #00e0ff;
            text-shadow: 0 0 12px rgba(0, 224, 255, 0.8);
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #00bfff;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            background: rgba(0,0,0,0.4);
            color: #fff;
            transition: 0.3s;
        }
        input[type="text"]::placeholder {
            color: rgba(200,200,200,0.6);
        }
        input[type="text"]:focus {
            border-color: #00ffff;
            box-shadow: 0 0 12px rgba(0, 224, 255, 0.7);
        }
        input[type="submit"] {
            background: linear-gradient(135deg, #0066ff, #00c6ff);
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.3s;
            box-shadow: 0 0 15px rgba(0, 191, 255, 0.5);
        }
        input[type="submit"]:hover {
            background: linear-gradient(135deg, #0052cc, #00aaff);
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.8);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.7);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: #0a0f1c;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 0 25px rgba(0,212,255,0.7);
            animation: fadeIn 0.3s ease-in-out;
            max-width: 300px;
            width: 80%;
            color: #e0f7ff;
        }
        .modal-content h3 {
            margin: 0;
            color: #00e0ff;
            text-shadow: 0 0 12px rgba(0,212,255,0.7);
        }
        .close {
            margin-top: 15px;
            padding: 8px 16px;
            background: linear-gradient(135deg, #0066ff, #00c6ff);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 0 12px rgba(0,212,255,0.6);
        }
        .close:hover {
            background: linear-gradient(135deg, #0052cc, #00aaff);
            box-shadow: 0 0 18px rgba(0,212,255,0.9);
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: scale(0.9);}
            to {opacity: 1; transform: scale(1);}
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kalkulator Luas Persegi Panjang</h2>
        <form method="GET">
            <input type="text" name="panjang" placeholder="Masukkan Panjang" required><br>
            <input type="text" name="lebar" placeholder="Masukkan Lebar" required><br>
            <input type="submit" value="Hitung">
        </form>
    </div>

    <!-- Modal -->
    <div id="resultModal" class="modal">
        <div class="modal-content">
            <h3 id="hasil"></h3>
            <button class="close" onclick="closeModal()">Tutup</button>
        </div>
    </div>

    <script>
        function showModal(msg) {
            document.getElementById("hasil").innerText = msg;
            document.getElementById("resultModal").style.display = "flex";
        }
        function closeModal() {
            document.getElementById("resultModal").style.display = "none";
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['panjang']) && isset($_GET['lebar'])) {
        $panjang = $_GET['panjang'];
        $lebar = $_GET['lebar'];

        if (is_numeric($panjang) && is_numeric($lebar) && $panjang > 0 && $lebar > 0) {
            $luas = $panjang * $lebar;
            echo "<script>showModal('Luas Persegi Panjang adalah: $luas');</script>";
        } else {
            echo "<script>showModal('Input tidak valid, masukkan angka positif!');</script>";
        }
    }
    ?>
</body>
</html>
