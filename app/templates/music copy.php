<?php
    use jsnuty\app\library\Application;
?>
<section class="songs">
    <!-- Odtwarzacz -->
    <div class="song">
    <!-- data song -->
        <div class="song-data">
            <!-- title and name -->
            <div class="song-name">
                <p><?php echo file_get_contents("img/buttons/heart.svg"); ?> </p>
                <p id="artist" class="song-artist"></p>
                <p> - </p>
                <p id="title" class="song-title"></p>
            </div>
            <!-- time -->
            <div class="song-time">
                
            </div>
        </div>

        <!-- main  -->
        <div class="song-main">
            <div class="left">
                <img id="track_image" class="track-image" src="img/songs/song1.jpg">
            </div>

            <div class="right">
                <div class="song-actions">
                    <div class="time">
                        <!-- <p id="remaining-time">03:02</p>
                        <p> - </p>
                        <p id="all-time">04:50</p>    -->
                    </div>
                    <!-- buttons to open music -->
                    <div class="middle">
                        <button class="previous" id="pre">
                            <i class="fa fa-step-backward" aria-hidden="true"></i>
                        </button>
                        <button class="start-pause" id="play">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </button>
                        <button class="next" id="next">
                            <i class="fa fa-step-forward" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <div class="volume">
                    <p class="volume-show" id="volume_show"></p>
                    <input type="range" min="0" max="100" id="volume">
                    <i class="fa fa-volume-up" aria-hidden="true" id="volume_icon"></i>
                </div>
            </div>
        </div>

        <div class="duraction">
            <p id="remaining-time"></p>
            <input type="range" min="0" max="100" step="0.000000000001" value="0" id="duraction_silder">
            <p id="all-time"></p>  
        </div>
    </div>
    <!-- Lista -->

    <div class="listMusic">
        <ul>
            <?php 
            $i = 0;
            foreach($songs as $key => $song): ?>
            <li class="music" data-index="<?php echo $i;//echo $song['id'] ?>">
                <div class="play" data-index-number="<?php echo $i++;//echo $song['id'] ?>">
                    <h2> <i class="fa fa-play" aria-hidden="true"></i> </h2>
                </div>
                <div class="title">
                    <h> <?php echo $song['name'] ?> </h>
                </div>
                <div class="like">
                    <?php echo file_get_contents("img/buttons/heart.svg"); ?>
                </div>
                <div class="time">
                    <time>03:23</time>
                </div>
            </li>
            <?php endforeach; ?> 
        </ul>
    </div>
</section>


<script>

    // $(document).ready(function(){
    //     $.ajax({
    //         url: "nuty/music",
    //         success: "",
    //         method: "post"
    //     })
    // });
    let all_songs = <?php echo Application::$app->controller->getSongs() ?>;

</script>
<script src="js/songs.js"></script>





