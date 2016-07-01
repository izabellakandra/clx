<div class="container">
<div class="jumbotron"> <h1>Hello, world!</h1> <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> </div>
    <h1><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <?php echo $text; ?>
        </div>
        <div class="col-md-6">
            <?php if(isset($img)): ?>
            <img src="<?php echo $img;?>" >
            <?php endif; ?>
        </div>
    </div>
</div>
