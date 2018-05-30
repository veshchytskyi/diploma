<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Абонент</title>
    <link rel="stylesheet" href="/views/css/main.css">

    <script src="/Views/js/jquery-3.1.1.min.js"></script>
</head>
<body>
    <header style="
    height: 200px;
    background-size: cover;
    background:#343434 url('/Views/css/language_map.png') no-repeat center center;;
    ">

    </header>
    <main>
        <?php
        foreach ($this->content as $key){
            include $key;
        }
        ?>
    </main>
</body>
</html>