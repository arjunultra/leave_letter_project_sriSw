<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Letter Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="/submit-leave-request" method="POST">
        <label for="name">Name:</label><br>
        <input class="form-control" type="text" id="name" name="name" required><br>
        <label for="mobile">Mobile Number:</label><br>
        <input class="form-control" type="tel" id="mobile" name="mobile" required><br>
        <label for="startDate">Start Date:</label><br>
        <input class="form-control" type="date" id="startDate" name="startDate" required><br>
        <label for="endDate">End Date:</label><br>
        <input class="form-control" type="date" id="endDate" name="endDate" required><br>
        <label for="totalDays">Number of Total Days:</label><br>
        <input class="form-control" type="number" id="totalDays" name="totalDays" required><br>
        <label for="reason">Reason for Leave:</label><br>
        <textarea class="form-control" id="reason" name="reason" cols="80" rows="10"></textarea><br>
        <button class="submit-button">Submit</button>
    </form>
</body>

</html>