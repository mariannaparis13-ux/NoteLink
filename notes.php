<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-image: url(https://images.template.net/358412/Simple-Abstract-Background-edit-online-1.jpg);
      background-repeat: no-repeat;
    }

    a {
      text-decoration: none;
      background-color: rgb(180, 250, 185);
      color: rgb(0, 0, 0);
      text-align: center;
      margin: 1px;
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
  <?php
  $grade = $_GET['grade'];
  //$grade = 6;
  
  $dir = "./Notes/Grade $grade/";

  $allSub = scandir($dir);

  $input = preg_quote($_GET['medium'], delimiter: '/');
  //$input = preg_quote('E', delimiter: '/');
  $result = preg_grep('/^[' . $input . 'A] /', $allSub);

  function printLink($fullSubName)
  {
    global $grade;
    $subName = substr($fullSubName, 2);
    $subFolder = str_replace(' ', '+', $fullSubName);

    echo "<a href='listnotes.php?grade=$grade&subject=$subFolder'>$subName</a><br>\r\n";
  }

  array_map("printLink", $result);
  echo "<br>";
  ?>

</body>

</html>