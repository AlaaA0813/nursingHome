
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>New Roster</title>
    </head>
    <body>
        <h1>New Roster</h1>
        <nav class="nav">
            <ul>
                <li><a href="roster.php">Home</a></li>
                <li><a href="newroster.php">New Roster</a></li>
            </ul>
        </nav>
        <form action="" method="POST">
            <br><label>Date: </label><input type="text" name="date" /><br>
            <br><label>Supervisor</label>  
            <select name="SUPERVISORDROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Doctor</label>  
            <select name="DOCTORDROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver1</label>  
            <select name="CAREGIVER1DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER1DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver2</label>  
            <select name="CAREGIVER2DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER2DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver3</label>  
            <select name="CAREGIVER3DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER3DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select><br>
            <label>Caregiver4</label>  
            <select name="CAREGIVER4DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <select name="CAREGIVER4DROPDOWN"><br>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
            <br><br>
            <input type="submit" name="add" value="Add">
            <input type="submit" name="cancel" value="Cancel">
            <a href="logout.php">Logout</a>
        </form>
    </body>
</html>