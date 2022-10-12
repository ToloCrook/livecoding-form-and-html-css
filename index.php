<?php require '_includes/header.php'; 
require 'config.php'; 

$pdo = new \PDO(DSN, USER, PASS);
$query = "SELECT * FROM articles";
$statement = $pdo->query($query);
$articles = $statement->fetchAll(PDO::FETCH_OBJ);


?>


    <div class="container">

       
            <article>
                <?php foreach($articles as $key=>$article):?>
                <h2 class="article-title"><?php echo $article->title;?> </h2>
                <section class="article-content">
                    <?php echo $article->content;?>
                </section>
            </article>
            <p>By <span class="author-name"><?php echo $article->author;?></span></p> 
            <?php endforeach;?>
       

    </div>

    <?php require '_includes/footer.php'; ?>
</body>

</html>