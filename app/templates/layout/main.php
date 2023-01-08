<?php
    use jsnuty\app\library\Application;
?>
<!doctype html>
<html lang="pl">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="/jsnuty/css/style.css">
    <title>Nuty</title>
    </head>
    <body>
        <div class="circle"></div>
            {{navigation}}
            {{content}}
        <?php if(Application::$app->session->getFlash('success')): ?>
            <div class="message">
                <p class="green">
                    <?php echo Application::$app->session->getFlash('success'); ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if(Application::$app->session->getFlash('error')): ?>
            <div class="message">
                <p class="red">
                    <?php echo Application::$app->session->getFlash('error'); ?>
                </p>
            </div>
        <?php endif; ?>

        <script>
            function showpass(){
                const show = document.querySelector(".formPass");
                if (show.type === 'text'){
                    show.type = 'password';
                }else{
                    show.type = 'text';
                }
            }
            function toggleMenu() {
                const menuToogle = document.querySelector('.toggle');
                const navigation = document.querySelector('.navigation');
                menuToogle.classList.toggle('active');
                navigation.classList.toggle('active');
            }
        </script>
         
    </body>
</html>