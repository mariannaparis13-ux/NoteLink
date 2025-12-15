<!DOCTYPE html>
<html>

<head>
  <title>Add Request</title>
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
      background-color: rgb(235, 200, 200);
    }

    div {
      background-color: aliceblue;
      padding: 10% 5%;
      position: absolute;
      top: 25%;
      left: 20%;
    }

    h1,
    p {
      text-align: center;
    }
  </style>
</head>

<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <br>
  <br>
  <h1>Request Added</h1>
  <p>Thanks for your request!
    <br>
    It is on its way to the community,where someone will be happy to help.
  </p>

  <form action="dashboard.html" method="post">
    <br><br>
    <?php
    //takes the grade, subject and lesson from the POST request submitted from the previous page
    $lesson = $_POST['lesson'];
    //$lesson = 'lesson3';
    
    //path to the Requests folder for the selected grade and subject
    $dir = "./Notes/Grade $grade/$subject/Requests/";
    //creates the above request folder if it doesn't exist
    if (!file_exists($dir)) {
      mkdir($dir, 0777, true);
    }
    //saves the note request sent from the previous page as a dummy file 
    $requestFile = fopen("$dir$lesson", 'w');
    fclose($requestFile);
    ?>

</body>

</html>