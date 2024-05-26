<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Letter Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- PHP code -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "leavedb";
        // create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Sanitize and validate inputs
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        // Sanitize mobile number, remove non-numeric characters except plus sign
        $phone = trim($_POST['mobile']);
        // Match only digits and plus sign in phone number
        if (preg_match("/^[0-9]{10}$/", $phone)) {
            $mobile = $phone;
        } else {
            // Handle invalid input
            $mobile = "";
        }
        $startdate = mysqli_real_escape_string($conn, trim($_POST['startDate']));
        $enddate = mysqli_real_escape_string($conn, trim($_POST['endDate']));
        $nosdays = mysqli_real_escape_string($conn, trim($_POST['totalDays']));
        $reason = mysqli_real_escape_string($conn, trim($_POST['reason']));


        // Insert query
        $sql = "INSERT INTO leaveletter (name, mobile, startdate, enddate, nosdays, reason) VALUES ('$name', '$mobile', '$startdate', '$enddate', '$nosdays', '$reason')";
        // Attempt to execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Leave Form Submition successfull";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>
    <h1 class="main-title text-center">Employee Leave Form</h1>
    <form id="leave-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name">Name:</label><br>
        <input placeholder="Please enter Your full name" class="form-control" type="text" id="name" name="name"
            required>
        <br>
        <label for="mobile">Mobile Number:</label><br>
        <input placeholder="Enter a valid mobile number" class="form-control" type="tel" id="mobile" name="mobile"
            required><br>
        <label for="start-date">Start Date:</label><br>
        <input class="form-control" type="date" id="start-date" name="startDate" required><br>
        <label for="end-date">End Date:</label><br>
        <input class="form-control" type="date" id="end-date" name="endDate" required><br>
        <label for="totalDays">Number of Total Days:</label><br>
        <input placeholder="This field is auto populated based on seleted dates" class="form-control" type="text"
            id="total-days" name="totalDays" required><br>
        <label for="reason">Reason for Leave:</label><br>
        <textarea class="input-textarea" placeholder="Enter Your Reason for Leave!" id="reason" name="reason" cols="80"
            rows="10"></textarea><br>
        <button type="submit" class="submit-button">Submit</button>
    </form>
    <div class="d-block" id="submit-msg ">Leave Form Submission successfull</div>
    <script src="validation.js"></script>
</body>

</html>