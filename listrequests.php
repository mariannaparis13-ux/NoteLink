<!DOCTYPE html>
<html>

<head>
    <title>Requests</title>
    <style>
        #button {
            background-color: rgb(10, 255, 45);
            padding: 10px 10px;
            color: black;
            text-align: center;
            border: 0cm;
        }

        #button:hover {
            background-color: rgb(10, 225, 45);
        }

        div {
            position: sticky;
            background-color: antiquewhite;
            height: 65px;
        }

        a {
            background-color: rgb(160, 255, 170);
            text-decoration: none;

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
    <div>
        <form action="addrequest.php" method="POST">
            <label for="lesson">Can't find your request below? Request it now: </label>
            <input name="lesson" id="lesson" type="text" pattern="[^/\\]+"
                title="Slashes (/) and backslashes (\) are not allowed." required />
            <input type="hidden" name="grade" value=<?php
            $grade = $_GET['grade'];
            //$grade = 6;
            //echo the grade
            echo "\"$grade\""; ?> />
            <input type="hidden" name="subject" value=<?php
            $subject = $_GET['subject'];
            //$subject = 'E Science';
            echo "\"$subject\""; ?> />
            <input type="submit" value="Add Request" id="#button">
        </form>
    </div>
    <?php
    $dir = "./Notes/Grade $grade/$subject/Requests/";
    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }

    $allFiles = array_slice(scandir($dir), 2);

    function printLink($lessonName)
    {
        global $grade;
        global $subject;
        $subLink = str_replace(" ", "+", $subject);
        $lessonLink = str_replace(" ", "+", $lessonName);
        echo "$lessonName ";
        echo "<a href='addNotes.php?grade=$grade&subject=$subLink&lesson=$lessonLink'>Upload Note</a><br>\r\n";
    }
    array_map("printLink", $allFiles);
    ?>
</body>

</html>