<div>
    <?php foreach($articles as $article): ?>
    <div>
        <h4>
            <?php echo html_a($article['title'], '/article/view.php?id=' . $article['id']); ?>
        </h4>
    </div>
    <?php endforeach;?>
</div>
