<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8">
        <title>Employees</title>
    </head>
    <body>
        <h1>Employee Chart</h1>
        <h2>Show current employee list with all atrributes.  Add a search option for each attribute.</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Salary</th>
                <th>Group</th>
            </tr>
            <form action="" method="POST">
                <input type="submit" name="search" value="Search">
                <tr>
                    <td><input type="text" name="ID" /></td>
                    <td><input type="text" name="name" /></td>
                    <td><input type="text" name="role" /></td>
                    <td><input type="text" name="salary" /></td>
                    <td><input type="text" name="group" /></td>
                </tr>
            </form>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <form action="" method="POST">
            <label>Employee ID: </label><input type="text" name="employee-id" />
            <label>New Salary: </label><input type="text" name="salary" />
            <input type="submit" name="updatesalary" value="Update Salary" />
            <input type="submit" name="cancel" value="Cancel Login" />
        </form>
    </body>
</html>