<?php
include 'dbinfo.php';

$movies_query = "SELECT * FROM movies";
$movies_result = mysqli_query($con, $movies_query);

$background_image_url = "image1.jpg"; 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>movies</title>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('image1.jpg'); 
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
    }
    h1 {
        text-align: center;
    }
    .movie {
        display: flex;
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .movie img {
        width: 150px;
        height: auto;
        border-radius: 5px;
        margin-right: 20px;
    }
    .movie-content {
        flex: 1;
    }
    .movie-title {
        font-size: 20px;
        margin-bottom: 10px;
        color: #333;
    }
    .movie-superpower {
        font-size: 16px;
        color: #666;
    }
    .add-form {
        margin-top: 20px;
    }
    .add-form h3 {
        text-align: center;
    }
    .add-form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .add-form input[type="text"],
    .add-form textarea {
        width: calc(100% - 18px);
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .add-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #000000;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .add-form input[type="submit"]:hover {
        background-color: #000000;
    }


    footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
}
</style>
</head>
<body>

<div class="container">
    <h1>movies Informations</h1>

    <?php
    if ($movies_result->num_rows > 0) {
        while($row = $movies_result->fetch_assoc()) {
            echo "<div class='movie'>";
            echo "<img src='" . $row["image_url"] . "' alt='movie Image'>";
            echo "<div class='movie-content'>";
            echo "<div class='movie-title'>" . $row["title"] . "</div>";
            echo "<div class='movie-superpower'>" . substr($row["content"], 0, 100) . "...</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No movies found</p>";
    }
    ?>

    <div class="add-form">
        <h2>which movie info do you want to add?</h2>
        <form method="post" action="add-movie.php">
            <label for="movie_title">movie Name</label><br>
            <input type="text" id="movie_title" name="movie_title" required><br>
            <label for="movie_content">Details</label><br>
            <textarea id="movie_content" name="movie_content" required></textarea><br>
            <label for="movie_image_url">Image URL:</label><br>
            <input type="text" id="movie_image_url" name="movie_image_url"><br><br> 
            <input type="submit" name="add_movie" value="Add your movie">
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>

</body>
</html>
