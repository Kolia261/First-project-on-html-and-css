<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Подключение к базе данных
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "dbname";

    $conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Проверка наличия всех необходимых полей
        if (isset($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstName'], $_POST['lastName'])) {
            $login = $_POST['login'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];

            // Добавление пользователя в базу данных
            $sql = "INSERT INTO users (login, password, email, first_name, last_name) VALUES ('$login', '$password', '$email', '$firstName', '$lastName')";

            if ($conn->query($sql) === TRUE) {
                // Редирект на страницу vbior.php
                header("Location: vbior.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "All fields are required";
        }
    }
    $conn->close();
    header("Location: vbior.php");
    exit();
}
?>