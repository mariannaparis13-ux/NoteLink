<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-image: url(https://storage.pixteller.com/designs/designs-images/2019-03-27/05/simple-background-backgrounds-passion-simple-1-5c9b95bd34713.png);
      background-repeat: no-repeat;
    }

    a.delete {
      text-decoration: none;
      color: black;
      text-align: center;
      display: inline-block;
      border: 1px;
    }

    a.filename {
      text-decoration: none;
      background-color: rgb(180, 210, 250);
      color: rgb(0, 0, 0);
      padding: 1% 7%;
      text-align: center;
      margin: 1px;
      display: inline-block;
    }

    .menudiv {
      position: sticky;
    }

    /*Menu button*/
    .a {
      background-color: rgb(0, 255, 255);
      color: black;
      text-align: center;
      text-decoration: none;
      margin: 0.5px;
      width: 24%;
      display: inline-block;
      padding: 0 0 0 0;
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
  <?php
  $grade = $_GET['grade'];
  //$grade = 6;
  $subject = $_GET['subject'];
  //$subject = 'E Science';
  
  $dir = "./Notes/Grade $grade/$subject/";
  $allFiles = array_slice(scandir($dir), 2);
  $slicedFile = preg_grep('/\./', $allFiles);

  //$slicedFile = array_diff($allFiles, array("."));
  
  function printLink($fileName)
  {
    global $grade;
    global $subject;
    echo "<a class='filename' href='Notes/Grade $grade/$subject/$fileName'>$fileName</a> 
    <a  class='delete' href='DeleteFile.php?grade=$grade&subject=$subject&fileName=$fileName'>Delete file</a>
    <br>\r\n";
  }
  array_map("printLink", $slicedFile);
  ?>
</body>

</html>