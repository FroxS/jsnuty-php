<?php
    use jsnuty\app\library\Application;
?>
<section class="songs">
    <!-- Odtwarzacz -->
    <?php 
    foreach($songs as $key => $song): ?>
        <div class="song">

        <div class="frame">
            <iframe 
                src="<?php echo $song['link'] ?>" 
                title="<?php echo $song['name'] ?>"
                frameborder="0"
                allow=" autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>

        <div class="data">
            <h1><?php echo $song['name'] ?></h1>
            <p><?php echo $song['opis'] ?></p>
        </div>
        </div>

    <?php endforeach; ?> 

</section>






