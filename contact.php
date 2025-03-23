<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"] ;
    $country = $_POST["country"] ;
    $gender = $_POST["gender"] ;
    $username = $_POST["username"];
    $department = $_POST["department"];
    
    // skills as an array
    $skills = isset($_POST["skills"]) ? implode(", ", $_POST["skills"]) : "No skills selected";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .table-container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="table-container mx-auto">
        <h3 class="text-center mb-4">Contact Details</h3>
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Skills</th>
                    <th>Username</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $first_name; ?></td>
                    <td><?php echo $last_name; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $gender; ?></td>
                    <td><?php echo $skills; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $department; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
