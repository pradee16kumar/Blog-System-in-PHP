<?php
$conn = new mysqli("localhost", "root", "", "blog_system");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$title = $_POST['title'];
$content = $_POST['content'];


$query = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

if ($conn->query($query) === TRUE) {
    header("Location: view_posts.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Post</title>
</head>
<body>
    <h1>Add a New Blog Post</h1>
    <form action="add_post.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="content">Content:</label><br>
        <textarea name="content" rows="5" cols="40" required></textarea><br>
        <button type="submit">Add Post</button>
    </form>
</body>
</html>
