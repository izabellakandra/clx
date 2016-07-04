<div>
    <?php echo html_h('My articles list', 2); ?>
    <?php foreach($articles as $article): ?>
    <div>
        <h4>
            <?php echo html_a($article['title'], '/article.php?id=' . $article['id']); ?>
        </h4>
    </div>
    <?php endforeach;?>
</div>
