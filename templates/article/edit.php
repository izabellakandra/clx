<form method="post">
    <div>
        Title: <input type="text" name="title" value="<?php echo $title;?>">
    </div>
    <div>
        <textarea name="content"><?php echo $content;?></textarea>
    </div>
    <button type="submit">
        Save
    </button>
</form>