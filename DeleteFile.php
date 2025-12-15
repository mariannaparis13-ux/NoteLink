<!DOCTYPE html>
<html>

<head>
    <title></title>
 <meta http-equiv="refresh" content="2; url=listnotes.php?grade=<?php
$grade = $_GET['grade'];
//$grade = 6;
$subject = $_GET['subject'];
//$subject = 'E Science';
$subLink = str_replace(" ", "+", $subject);
echo "$grade&subject=$subLink";
?>" />
    <style>
        body {
            background-color: lightpink;
        }
    </style>
</head>
<?php
$fileName = $_GET['fileName'];
unlink("Notes/Grade $grade/$subject/$fileName");
echo 'The note you selected will be delete.';
?>
<body>

</body>

</html>