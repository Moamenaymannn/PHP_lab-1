<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $file_path = "data.txt";
    $id_to_delete = $_POST["id"];
    $updated_data = [];

    if (file_exists($file_path)) {
        $file = fopen($file_path, "r");

        while (($line = fgets($file)) !== false) {
            $data = explode("|", trim($line));
            if ($data[0] !== $id_to_delete) { 
                $updated_data[] = $line;
            }
        }

        fclose($file);

    
        file_put_contents($file_path, implode("", $updated_data));

       
        header("Location: contact.php");
        exit();
    }
}


header("Location: contact.php");
exit();
?>
