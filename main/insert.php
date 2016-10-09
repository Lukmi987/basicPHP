<!-- this file shows how a simple db 'insert' operation can be done in php -->
<html>
    <head>
        <title>Simple Insert</title>
    </head>

    <body>
        <!--
            It is recommended that each form should have value for 'action' attribute.
            But for the purpose of this tutorial, it will be emptied.
            The 'action' attribute indicates that where the data of this form will be transfered after submit.
            If value for 'action' are not specified, the data will be sent to it's own page.

            For the purpose of this tutorial, we will make this page send the data to itself and then the php part will compute the data.
        -->
        <form action="" method="post">
            <!-- attribute 'name' in each input are used as the passing variable from user to server which runs php code -->
            <input type="text" name="studName" placeholder="Student name" /><br />
            <input type="text" name="studIc" placeholder="Student IC" /><br />
            <input type="number" name="studAge" placeholder="Student age" /><br />

            <!--
                For submit button, it is recommended that you set value for 'name' attribute as submit to avoid confusion.
                The 'value' attribute indicates what should be displayed on the submit button.
            -->
            <input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>

<?php
/*
 * We will receive the data from the html part after the user has submit the form here.
 * This part(php) will be computed in the server, user cannot view this code even though it is in the same file.
 * (try run this file and press f12 to inspect the code)
 */

include "../config/dbconn.php"; // we will include the dbconn.php file because we want to use the $conn variable to connect to db.

if(isset($_POST["submit"])) { // isset($var); ---> determines whether a variables has been set(not null) or not(null). Returns boolean.
    /*
     * $_POST["name"];
     * This command will retrieve the data that has been sent from the html part.
     * Note that the "name" should be exactly the same as attribute 'name' inside the html's form. (case sensitive)
     */
    $studName = $_POST["studName"]; // we retrieve the data named "studName" from html and store the data inside $studName
    $studIc = $_POST["studIc"];
    $studAge = $_POST["studAge"];

    /*
     * Now that we have the data from the html part, we can do anything with the data.
     * For this part of tutorial, we will cover how to do simple data insertion into mysql db.
     *
     * It is recommended that you put every sql command inside it's own variables to differentiate between them.
     * It is also recommended for you to use below's approach for every sql query.
     * Of course you can also use your own approach.
     *
     * $insertSQL --> stores you sql command in string.
     * $insertQuery --> mysqli_query($conn, "your_query") will run your query & returns boolean.
     *                   $insertQuery runs you sql command in $insertSQL and returns boolean values for successful or not.
     *                   true = successful.
     *                   false = unsuccessful.
     */
    $insertSQL = "INSERT INTO student(studName, studIc, studAge) VALUES('$studName', '$studIc', '$studAge')";
    $insertQuery = mysqli_query($conn, $insertSQL) or die(mysqli_error($conn));

    if($insertQuery) { // check if insertion is successful or not
        // insertion successful
        echo "<h2>Insert successfull</h2>";
    } else {
        // insertion unsuccessful
        echo "<h2>There are error in the insertion.</h2>";
    }
}
?>