<?php

session_start();

if (!isset($_SESSION['form_data'])) {
          echo "<h2 class='text-danger'>No data available</h2>";
          exit();
      }

$form_data = $_SESSION['form_data'];


$first_name = $form_data["first_name"];
$last_name = $form_data["last_name"];
$address = $form_data["address"];
$country = $form_data["country"];
$gender = $form_data["gender"];
$department = $form_data["department"];
$username = $form_data["username"];
$skills = isset($form_data["skills"]) ? implode(",", $form_data["skills"]) : "No skills selected";

      
          
          $id = 1;
          if (file_exists("data.txt")) { 
              $lines = file("data.txt", FILE_IGNORE_NEW_LINES);
              if (!empty($lines)) { 
                  $lastline = explode("|", end($lines));
                  $id = (int)$lastline[0] + 1;
              }
          }
      
         
          $file = fopen("data.txt", "a");
          if ($file) {
              $data = "$id|$first_name|$last_name|$address|$country|$gender|$skills|$username|$department\n";
              if (fwrite($file, $data) === false) {
                    echo "<h2 class='text-danger'>Error: Failed to write data to file.</h2>";
                }
              fclose($file);
          }
      
          
          unset($_SESSION['form_data']);
      ?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Created</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <div class="alert alert-success text-center">
        <h4>✅ Data Created Successfully!</h4>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $id; ?></td>
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
          <div class="text-center mt-4">
             <a href="contact.php" class="btn btn-primary">Go to Contact Page</a>
          </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
