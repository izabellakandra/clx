<div>
    <h2>My articles list</h2>
    <?php foreach($articles as $article): ?>
    <div>
        <h4>
            <a href="/article.php?id=<?php echo $article['id'];?>">
                <?php echo $article['title'];?>
            </a>
        </h4>
    </div>
    <?php endforeach;?>
</div>
