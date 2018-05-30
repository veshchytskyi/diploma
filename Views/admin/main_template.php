<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=SITE_NAME?></title>
    <link rel="stylesheet" href="/views/css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <header class="main-header">
        <p class="header-tittle">База  абонентов оператора связи</p>
    </header>
    <?php if(Session::get('admin')){?>
    <div class="sidebar-menu">
        <nav class="main-navbar">
            <ul>
                <li><a href="/subscribers/search">Поиск</a></li>
                <li><a href="/subscribers">Абоненты</a></li>
                <li><a href="/tariffs">Тарифы</a></li>
                <li><a href="/calls">Звонки</a></li>
                <li><a href="/messages">Сообщения</a></li>
                <li><a href="/internet">Интернет</a></li>
                <li><a href="/write_off">Списание</a></li>
                <li><a href="/replenishment">Начисление</a></li>
                <li><a href="/statistics">Статистика</a></li>
            </ul>
            <ul>
                <li><a href="/main/logout">Выход</a></li>
            </ul>
            <p class="some-text">Вы вошли как <strong><?=Session::get('admin')?></strong></p>
        </nav>
    </div>
    <?php }?>
    <main>
        <?php
        foreach ($this->content as $key){
            include $key;
        }
        ?>
    </main>
</body>
</html>
