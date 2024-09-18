<?php
$conn = new mysqli("localhost", "root", "", "blog_system");

$post_id = $_GET['id'];

$post_result = $conn->query("SELECT * FROM posts WHERE id = $post_id");
$post = $post_result->fetch_assoc();

$comment_result = $conn->query("SELECT * FROM comments WHERE post_id = $post_id ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $post['title']; ?></title>
</head>
<body>
    <h1><?php echo $post['title']; ?></h1>
    <p><?php echo $post['content']; ?></p> 
    <p>Posted on <?php echo date('F j, Y', strtotime($post['created_at'])); ?></p>

    <h2>Comments</h2>
    <ol>
        <?php while ($comment = $comment_result->fetch_assoc()): ?>
            <li>
                <strong><?php echo $comment['author']; ?>:</strong>
                <p><?php echo $comment['comment']; ?></p>
                <p><?php echo date('F j, Y', strtotime($comment['created_at'])); ?></p>
            </li>
        <?php endwhile; ?>
    </ol>

    <h2>Add a Comment</h2>
    <form action="add_comment.php" method="POST">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <label for="author">Your Name:</label>
        <input type="text" name="author" required><br>
        <label for="comment">Your Comment:</label><br>
        <textarea name="comment" rows="4" cols="40" required></textarea><br>
        <button type="submit">Submit Comment</button>
    </form>

    <a href="view_posts.php">Back to All Posts</a>
</body>
</html>
