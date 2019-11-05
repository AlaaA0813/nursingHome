<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Payment</title>
    </head>
    <body>
        <h1>Payment</h1>
        <form action="" method="POST">
            <label>Patient ID: </label><input type="text" name="patientID" /><br>
            <label>Total Due: </label><input type="text" name="totalDue" /><br>
            <label>New Payment: </label><input type="text" name="newPayment" /><br>
            <ul>
                <li>$10 for every day</li>
                <li>$50 for every appointment</li>
                <li>$5 for every medicine/month</li>
            </ul><br>
            <input type="submit" name="makePayment" value="Make Payment">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>

    