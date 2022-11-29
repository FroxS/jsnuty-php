<!doctype html>
<html lang="pl">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <title>Nuty</title>
    </head>
    <body>
        {{content}}
        
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