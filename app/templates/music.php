<?php
    use jsnuty\app\library\Application;
?>
<section class="songs">
    <div class="song"> 
        <button class="add"><a href="/jsnuty/music/add">Dodaj</a></button>
    </div>

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
                <button class="add"><a href="/jsnuty/music/edit?id=<?php echo $song['id']?>">...</a></button>
                <button class="add"><a href="/jsnuty/music/delete?id=<?php echo $song['id']?>">Usuń</a></button>
            </div>
        </div>

    <?php endforeach; ?> 

</section>






