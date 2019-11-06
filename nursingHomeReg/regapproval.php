
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Registration Approval</title>
    </head>
    <body>
        <h1>Registration Approval</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Approved</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><label>Yes</label><input type="checkbox" name="yes" /><label>No</label><input type="checkbox" name="no" /></td>
                </tr>
            </table>
            <input type="submit" name="approveCancellation" value="Approve Cancellation">
            <input type="submit" name="cancel" value="Cancel">
        </form>
    </body>
</html>