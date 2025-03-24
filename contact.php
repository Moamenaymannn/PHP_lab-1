<?php

$file_path = "data.txt";
$contacts = [];

if (file_exists($file_path)) {
    $file = fopen($file_path, "r");
    while (($line = fgets($file)) !== false) {
        $data = explode("|", trim($line));
        if (!empty($data)) { 
            $contacts[] = [
                "id" => $data[0] ?? "N/A",
                "first_name" => $data[1] ?? "N/A",
                "last_name" => $data[2] ?? "N/A",
                "address" => $data[3] ?? "N/A",
                "country" => $data[4] ?? "N/A",
                "gender" => $data[5] ?? "N/A",
                "skills" => $data[6] ?? "N/A",
                "username" => $data[7] ?? "N/A",
                "department" => $data[8] ?? "N/A"
            ];
        }
    }
    fclose($file);
} else {
    echo "<h2 class='text-center text-danger mt-5'>No registered user data found.</h2>";
    exit();
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
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Skills</th>
                    <th>Username</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($contacts)) : ?>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contact["id"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["first_name"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["last_name"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["address"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["country"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["gender"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["skills"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["username"]); ?></td>
                            <td><?php echo htmlspecialchars($contact["department"]); ?></td>
                            <td>
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $contact["id"]; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="9" class="text-center text-danger">No registered users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        
        <div class="text-center mt-4">
            <a href="register.php" class="btn btn-primary"> Back to Register</a>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
