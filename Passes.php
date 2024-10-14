<!DOCTYPE html>
<html>
<head>
    <title>Monthly Bus Pass</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <style>
        .pass-box {
            border-spacing: 10px;
            font-family: Montserrat, sans-serif;
            font-size: 18px !important;
            border: 2px solid grey;
            margin-top: 50px;
            margin-bottom: 10px;
            padding-top: 250px;
            padding-right: 120px;
            padding-bottom: 50px;
            padding-left: 150px;
            align-content: center;
            background: linear-gradient(to bottom, #FFC107 45%, #FFC107 32%, #d9d9d9 19%, #d9d9d9 100%);
            border: 4px solid #000;
            padding: 80px;
            width: 500px;
            margin: 0 auto;
            font-size: 18px !important;
            font-family: Montserrat, sans-serif;
            object-position: center;
        }
    </style>
</head>
<body>
    <div class="pass-box">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $age = $_POST["age"];
            $gender = $_POST["gender"];
            $renewalDate = date("Y-m-d", strtotime("+1 month"));
            $amountToPay = 700; // Change this based on your pricing logic

            // Generate a random QR code
            $randomQRCode = bin2hex(random_bytes(16));
            echo "<h1>Monthly Bus Pass</h1>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Age:   </strong> $age</p>";
            echo "<p><strong>Gender:</strong> $gender</p>";
            echo "<p><strong>Renewal Date:</strong> $renewalDate</p>";
            echo "<p><strong>Amount to Pay:</strong> $amountToPay</p><br><br>";
            echo "<img src='https://api.qrserver.com/v1/create-qr-code/?data=$randomQRCode' alt='QR Code'>";
        } else {
            echo "<h2>Monthly Bus Pass</h2>";
            echo "<form method='post' action=''>
                <label for='name'>Name:</label>
                <input type='text' id='name' name='name' required><br><br>
                <label for='age'>Age:</label>
                <input type='number' id='age' name='age' required><br><br>
                <label for='gender'>Gender:</label>
                <select id='gender' name='gender' required>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                    <option value='Other'>Other</option>
                </select><br><br>
                <input type='submit' value='Generate Pass'>
            </form>";
        }
        include 'footer.php'
        ?>
    </div>
</body>
</html>