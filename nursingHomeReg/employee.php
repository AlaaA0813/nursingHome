<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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