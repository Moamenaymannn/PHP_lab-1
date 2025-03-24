<?php
function validateInput($data) {
    $errors = [];
    
    
    if (empty($data["first_name"])) {
        $errors['first_name'] = "First name is required.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $data["first_name"])) {
        $errors['first_name'] = "First name must contain only letters.";
    }

   
    if (empty($data["last_name"])) {
        $errors['last_name'] = "Last name is required.";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $data["last_name"])) {
        $errors['last_name'] = "Last name must contain only letters.";
    }

  
    if (empty($data["address"])) {
        $errors['address'] = "Address is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9\s,.-]+$/", $data["address"])) {
        $errors['address'] = "Invalid address format.";
    }

   
    if (empty($data["country"])) {
        $errors['country'] = "Please select a country.";
    }

    
    if (empty($data["gender"])) {
        $errors['gender'] = "Please select a gender.";
    }

    
    if (empty($data["department"])) {
        $errors['department'] = "Department is required.";
    }

    
    if (empty($data["username"])) {
        $errors['username'] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $data["username"])) {
        $errors['username'] = "Username must contain only letters and numbers.";
    }

    
    if (!isset($data["skills"]) || !is_array($data["skills"]) || empty($data["skills"])) {
        $errors['skills'] = "Please select at least one skill.";
    }

    return $errors;
}
?>
