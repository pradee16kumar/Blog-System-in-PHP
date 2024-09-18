
<?php
$conn = new mysqli("localhost", "root", "", "blog_system");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];
    $author = ($_POST['author']);
    $comment =($_POST['comment']);

   
    $query = "INSERT INTO comments (post_id, author, comment) VALUES ('$post_id', '$author', '$comment')";

    if ($conn->query($query)) {
        
        header("Location: view_post.php?id=$post_id");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
