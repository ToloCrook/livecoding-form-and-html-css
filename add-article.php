<?php require '_includes/header.php';
require 'config.php' ?>

<?php 

$pdo = new \PDO(DSN, USER, PASS);





$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $author = htmlspecialchars($_POST['author']);

    if (empty($title) || trim($title) === " ") {
        $errors[] = "Enter a title";

    } if (empty($content) || trim($content) === " ") {
        $errors[] = "Enter a content";

    } if (empty($author) || trim($author) === " ") {
        $errors[] = "Enter a author";
    } if (empty($errors)) {

        $query = "INSERT INTO articles (title, content, author) VALUES (:title, :content, :author)";
        $statement = $pdo->prepare($query);

        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':content', $content, PDO::PARAM_STR);
        $statement->bindValue(':author', $author, PDO::PARAM_STR);

        $statement->execute();

    }

}


?>






<div class="container">

    <form action="" method="post">
        <div>
            <label for="title">Title</label>
            <input type="title" name="title" id="title">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <div>
            <label for="author">Author</label>
            <input type="author" name="author" id="author">
        </div>
        <div>
            <input type="submit" value="Add article">
        </div>
    </form>

    <ul> <?php foreach($errors as $error):?>
        <li><?php echo $error;?></li>
        <?php endforeach ?>

</div>


</body>

</html>

<?php require '_includes/footer.php'; ?>