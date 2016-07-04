<form method="post" action="/create.php">
    <div>
        Title: <input type="text" name="title" value="<?php echo $title;?>">
    </div>
    <div>
        <textarea name="content"><?php echo $content;?></textarea>
    </div>
    <button type="submit">
        Create
    </button>
</form>