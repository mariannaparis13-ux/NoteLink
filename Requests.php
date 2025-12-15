<!DOCTYPE html>
<html>

<head>
    <title>Requests</title>
    <style>
        #subject {
            text-decoration: none;
            background-color: rgb(215, 180, 250);
            color: rgb(0, 0, 0);
            text-align: center;
            margin: 1px;
            padding: 0.5% 5%;
            margin: 0% 0%;
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
        $medium = $_GET['medium'];
        //$medium = 'E';
        
        $dir = "./Notes/Grade $grade/";

        $allSub = scandir($dir);
        //adds a backslash to any special REGEX characters in $medium and saves in $input
        $input = preg_quote($medium, delimiter: '/');
        //Uses REGEX to search for the folder/s starting with $input or A
        $result = preg_grep(pattern: '/^[' . $input . 'A] /', array: $allSub);

        //Function that takes a folder name and prints the subject name and links to view and add requests 
        function printLink($fullSubName)
        {
            global $grade;
            global $result;
            $subName = substr($fullSubName, 2);
            $subFolder = str_replace(' ', '+', $fullSubName);
            echo "<a id='subject' href='listrequests.php?grade=$grade&subject=$subFolder'>$subName</a><br>\r\n ";
        }

        //Runs the printLink function for the folders in $result 
        array_map("printLink", $result);
        ?>

    </body>

</html>