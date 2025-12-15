<!DOCTYPE html>
<html>

<head>
    <title>Upload you notes</title>
    <meta http-equiv="refresh" content="2; url=listrequests.php?grade=<?php
    $grade = $_POST['grade'];
    //$grade = 6;
    $subject = $_POST['subject'];
    //$subject = 'E Science';
    $subLink = str_replace(" ", "+", $subject);
    echo "$grade&subject=$subLink";
    ?>" />
   <style>
        body {
            background-color: rgb(240, 150, 210);
        }

        .a {
            background-color: rgb(0, 255, 255);
            color: black;
            text-align: center;
            text-decoration: none;
            margin: 0.5px;
            width: 24%;
            display: inline-block;
        }


        /*Menu*/
        div a:hover {
            background-color: rgb(0, 220, 255);
        }
    </style>
</head>

<body>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="menudiv">
        <a href="dashboard.html" class="a">Home</a>
        <a href="Addrequest.html" class="a">Add a request</a>
        <a href="GetNotes.html" class="a">Notes</a>
        <a href="Addrequest.html" class="a">Requests</a>
    </div>
    <br>
    <br>
    <?php
    $lesson = $_POST['lesson'];
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $dir = "./Notes/Grade $grade/$subject/";
    $target_file = $dir . $lesson . "." . pathinfo($filename, PATHINFO_EXTENSION);
    $uploadOk = 1;
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            unlink("./Notes/Grade $grade/$subject/Requests/$lesson");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>
</body>

</html>