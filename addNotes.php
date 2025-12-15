<!DOCTYPE html>
<html>

<head>
    <title>Upload your Note</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/free-vector/blue-abstract-gradient-wave-vector-background_53876-111548.jpg?semt=ais_hybrid&w=740&q=80');
            background-position: center;
        }

        div {
            position: absolute;
            top: 25%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            left: 50%;
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            background-color: rgb(255, 255, 230);
            text-align: center;
            padding: 10% 10%;
            border: 5px;
        }

        .button {
            background-color: rgb(100, 255, 0);
            padding: 8px 15px;
            position: absolute;
            left: 40%;
            text-align: center;
        }

        .button:hover {
            background-color: rgb(150, 255, 0);
        }

        #fileToUpload {
            position: relative;
            left: 40px;
        }
    </style>
</head>

<body>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <form action="Uploadfile.php" method="POST" enctype="multipart/form-data">
        <br>
        You are uploading for grade:
        <input readonly name="grade" value=<?php
        $grade = $_GET['grade'];
        //$grade = 6;
        //echo the grade
        echo "\"$grade\""; ?> /> <br>
        <br>
        You are uploading for subject:
        <?php
        $subject = $_GET['subject'];
        //$subject = 'E Science';
        $subname = substr($subject, 2);
        echo $subname; ?>
        <input type="hidden" name="subject" value=<?php echo "\"$subject\""; ?> /> <br>
        <br>
        You are uploading for lesson:
        <input readonly name="lesson" value=<?php
        $lesson = $_GET['lesson'];
        //$lesson = 'lesson 3';
        echo "\"$lesson\""; ?> /> <br>
        <br>
        Select note to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" class="button">
        <br>
        <br>
        <input type="submit" value="Upload Note" name="submit" class="button">
    </form>
</body>

</html>