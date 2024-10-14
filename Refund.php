<!DOCTYPE html>
<html>
<head>
    <title>City Bus Ticket Refund/Cancellation</title>
    <link rel='stylesheet' href='index.css'>
    <style>
            .container{
            border-spacing: 10px;
            font-family: Montserrat, sans-serif;
            font-size: 18px !important;
            border: 2px solid grey;
            margin-top: 50px;
            margin-bottom: 200px;
            padding-top: 50px;
            padding-right: 120px;
            padding-bottom: 50px;
            padding-left: 150px;
            align-content: center;
            background: linear-gradient(to bottom, #FFC107 0%, #FFC107 26%, #d9d9d9 19%, #d9d9d9 100%);
            border: 4px solid #000;
            padding: 80px;
            width: 500px;
            margin: 0 auto;
            font-family: Montserrat, sans-serif;
            object-position: center;
        }
    </style>
</head>
<body>
<div class="container">
    <center>
    <h2>City Bus Ticket      Refund/Cancellation</h2>
    <form method="post" action="">
        <br>
        <label for="name">Name of Passenger:</label>
        <input type="text" name="name" required><br><br>
        
        <label for="booking_date">Date of Ticket Booking:</label>
        <input type="date" name="booking_date" required><br><br>
        
        <p>Select A Reason for Cancellation or Refund:</p>
        <input type="radio" name="reason" value="Cancellation">Invalid Passenger Details<br><br>
        <input type="radio" name="reason" value="Refund">Wrong Start Location<br><br>
        <input type="radio" name="reason" value="Refund">Wrong Stop Location<br><br>
        <input type="radio" name="reason" value="Refund">Booked Mulitple Tickets By Mistake<br><br>
        <input type="radio" name="reason" value="Refund">Showing Additional Amount<br><br>
        
        <input type="submit" name="submit" value="Process"><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $booking_date = $_POST["booking_date"];
        $reason = $_POST["reason"];
        
        // Generate a ticket number (you can replace this with your own logic)
        $ticket_number = "BUS" . date("YmdHis");
        
        // Validate the scenario for refund or cancellation
        if (($reason == "Cancellation" && strtotime($booking_date) >= strtotime(date("Y-m-d"))) ||
            ($reason == "Refund" && strtotime($booking_date) < strtotime(date("Y-m-d")))) {
            echo "<b>Ticket Number: $ticket_number</b><br>";
            echo "<b>Thank you, $name! Your $reason will be initiated soon.</b><br>";
            echo "<b>Refund will be credited within 48 hours.</b><br>";
        } else {
            echo "Invalid scenario for $reason.<br>";
        }
    }
    include 'footer.php';
    ?>
    </center>
</div>
</body>
</html>