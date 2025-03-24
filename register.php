<?php  
session_start();
$errors = $_SESSION['errors'] ?? [];
$old_values = $_SESSION['old_values'] ?? [];
session_unset();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .form-container {
            width: 100%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="form-container">
        <h2 class="text-center mb-4">Register</h2>
        <form  action="process.php"  method="POST">

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control <?php echo isset($errors['first_name']) ? 'is-invalid' : ''; ?>" 
                name="first_name" value="<?php echo htmlspecialchars($old_values['first_name'] ?? ''); ?>" required>
                <div class="invalid-feedback"><?php echo $errors['first_name'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control <?php echo isset($errors['last_name']) ? 'is-invalid' : ''; ?>" 
                name="last_name" value="<?php echo htmlspecialchars($old_values['last_name'] ?? ''); ?>" required>
                <div class="invalid-feedback"><?php echo $errors['last_name'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : ''; ?>" 
                name="address" value="<?php echo htmlspecialchars($old_values['address'] ?? ''); ?>">
                <div class="invalid-feedback"><?php echo $errors['address'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Country</label>
                <select class="form-select <?php echo isset($errors['country']) ? 'is-invalid' : ''; ?>" name="country">
                    <option value="">Choice Country</option>
                    <option value="EGY" <?php echo ($old_values['country'] ?? '') == "EGY" ? "selected" : ""; ?>>Egypt</option>
                    <option value="USA" <?php echo ($old_values['country'] ?? '') == "USA" ? "selected" : ""; ?>>USA</option>
                    <option value="QAT" <?php echo ($old_values['country'] ?? '') == "QAT" ? "selected" : ""; ?>>Qatar</option>
                </select>
                <div class="invalid-feedback"><?php echo $errors['country'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select <?php echo isset($errors['department']) ? 'is-invalid' : ''; ?>" name="department">
                    <option value="">Choice Depart</option>
                    <option value="EGY" <?php echo ($old_values['department'] ?? '') == "IT" ? "selected" : ""; ?>>Egypt</option>
                    <option value="USA" <?php echo ($old_values['department'] ?? '') == "HR" ? "selected" : ""; ?>>USA</option>
                    <option value="QAT" <?php echo ($old_values['department'] ?? '') == "MAR" ? "selected" : ""; ?>>Qatar</option>
                </select>
                <div class="invalid-feedback"><?php echo $errors['department'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Male" <?php echo ($old_values['gender'] ?? '') == "Male" ? "checked" : ""; ?>>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Female" <?php echo ($old_values['gender'] ?? '') == "Female" ? "checked" : ""; ?>>
                    <label class="form-check-label">Female</label>
                </div>
                <div class="invalid-feedback d-block"><?php echo $errors['gender'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>" 
                name="username" value="<?php echo htmlspecialchars($old_values['username'] ?? ''); ?>" required>
                <div class="invalid-feedback"><?php echo $errors['username'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Skills</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="skills[]" value="HTML" <?php echo in_array("HTML", $old_values['skills'] ?? []) ? "checked" : ""; ?>>
                    <label class="form-check-label">HTML</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="skills[]" value="PHP" <?php echo in_array("PHP", $old_values['skills'] ?? []) ? "checked" : ""; ?>> 
                    <label class="form-check-label">PHP</label>
                </div>
                <div class="invalid-feedback d-block"><?php echo $errors['skills'] ?? ''; ?></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
