<?php
include 'dbinfo.php';


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_movie'])) {

    $title = sanitize_input($_POST['movie_title']);
    $content = sanitize_input($_POST['movie_content']);
    $image_url = isset($_POST['movie_image_url']) ? sanitize_input($_POST['movie_image_url']) : ''; // Image URL is optional


    $sql = "INSERT INTO movies (title, content, image_url) VALUES ('$title', '$content', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "movie added successfully";
    
        header("Location: movie-index.php");
        exit();
    } else {
        echo "Error adding movie: " . $conn->error;
    }
}

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$conn->close();
?>