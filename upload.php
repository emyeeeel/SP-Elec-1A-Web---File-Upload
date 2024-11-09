<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>", print_r($_FILES, true), "</pre>"; 

    handle();
} else {
    echo 'POST method is required.';
}

function handle(){
    if (isset($_FILES['uploads']) && is_array($_FILES['uploads']['name'])) {
        $formattedFiles = [];
        
        foreach ($_FILES['uploads']['name'] as $index => $name) {
            if ($_FILES['uploads']['error'][$index] > 0) {
                echo "<span>File was not uploaded. Error is encountered. CODE: {$_FILES['uploads']['error'][$index]}</span><br>";
            }
            else {
                $originalFileName = $_FILES['uploads']['name'][$index];
                $uploadFileName = $_FILES['uploads']['tmp_name'][$index];
                $targetDirectory = 'uploads';
                if (move_uploaded_file($uploadFileName, $targetDirectory . "/" . $originalFileName)) {
                    echo "<span>{$_FILES['uploads']['name'][$index]} has been successfully uploaded.</span><br>";
                } 
                $formattedFiles[$index] = [
                    'name' => $_FILES['uploads']['name'][$index],
                    'full_path' => $_FILES['uploads']['tmp_name'][$index] ?? '', 
                    'type' => $_FILES['uploads']['type'][$index],
                    'tmp_name' => $_FILES['uploads']['tmp_name'][$index],
                    'error' => $_FILES['uploads']['error'][$index],
                    'size' => $_FILES['uploads']['size'][$index],
                ];
            }
        }

        echo "<pre>", print_r($formattedFiles), "</pre>"; 
    }
}

echo "<a href=" . $_SERVER["HTTP_REFERER"] . ">Back to Uploads</a>";
