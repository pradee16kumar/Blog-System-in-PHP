<?php
$conn = new mysqli("localhost", "root", "", "blog_system");

$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Blog Posts</title>
</head>
<body>
    <h1>All Blog Posts</h1> 
    <a href="add_post.php">Add New Post</a>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <a href="view_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                <p><?php echo date('F j, Y', strtotime($row['created_at'])); ?></p>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
