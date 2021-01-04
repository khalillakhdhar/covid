<?php
session_start();
if (isset($_POST["grade"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid19";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `user` SET grade='" . $_POST['grade'] . "' ,date='" . $_POST['date'] . "' WHERE id='" . $_SESSION['id'] . "'";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    header('location:profile.php');
}