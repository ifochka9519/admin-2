<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HOW WE WORK</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/pages.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500&subset=cyrillic' rel='stylesheet' type='text/css'>

    <!-- Owl Carousel -->
    <link href="css/owl_slide.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/prettify.css" rel="stylesheet">

    <link href="css/media.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <section id="header-section-small-screen-menu" class="hidden-small-screen-menu">

        <article>
            <div id="mySidenav" class="sidenav sidenav-yellow-color">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="{{route('visa_page')}}">Визы</a>
                <a href="{{route('work_page')}}">Работа в Польше</a>
                <a href="{{route('scheme_page')}}">Как мы работаем</a>
                <a href="{{route('contacts')}}">Контакты</a>
            </div>
        </article>

        <div class="row">

            <article id="small-screen-menu-icon" class="col-xs-3">
            <span onclick="openNav()">
              <img src="img/2.png" alt="">
            </span>
            </article>

            <article class="col-xs-6">
                <a class="call-button" href="">
                    Заказать звонок
                </a>
                <a id="action-button" class="call-button" href="#user-data-section">
                    Акция
                </a>
            </article>

            <article class="col-xs-3">
                <a href="{{route('index')}}">
                    <img src="img/logo.jpg" class="img-responsive" alt="">
                </a>
            </article>
        </div>
    </section>

    <section id="header-section-menu" class="row">
        <article class="col-lg-2 col-md-2 col-sm-2">
            <a href="{{route('index')}}">
                <img src="img/logo.jpg" class="img-responsive" alt="">
            </a>
        </article>

        <article class="col-lg-10 col-md-10 col-sm-10">
            <ul>
                <li><a href="{{route('visa_page')}}">Визы</a></li>
                <li><a href="{{route('work_page')}}">Работа в Польше</a></li>
                <li><a href="{{route('scheme_page')}}">Как мы работаем</a></li>
                <li><a href="{{route('contacts')}}">Контакты</a></li>
                <li >
                    <a class="call-button" href="">
                        Заказать звонок
                    </a>
                </li>
                <li >
                    <a id="action-button-bs" class="call-button" href="#user-data-section">
                        Акция
                    </a>
                </li>
            </ul>
        </article>
    </section>
</div>

<header id="carousel-section">

    <div id="owl-1">
        <div class="item">
            <article class="carousel-section-img-wrapper">
                <span href="" class="carousel-image-title">Визы в Словакию</span>
                <img src="img/visa_page/4.jpg" class="img-responsive" alt="">
            </article>
            <div class="description">
                <p>
                    Спортивная виза в Словакию
                </p>
                <p>
                    (для детей)
                </p>
                <a href="" class="carousel-image-button">
                    Узнать больше
                </a>
            </div>
        </div>

        <div class="item">
            <article class="carousel-section-img-wrapper">
                <span href="" class="carousel-image-title">Рабочие приглашения</span>
                <img src="img/visa_page/5.jpg" class="img-responsive" alt="">
            </article>
            <div class="description">
                <p>
                    Срочное рабочее приглашение (до 5 дней / до 10 дней)
                </p>
                <p>
                    Рабочее приглашение в порядке очереди
                </p>
                <a href="" class="carousel-image-button">
                    Узнать больше
                </a>
            </div>
        </div>

        <div class="item">
            <article class="carousel-section-img-wrapper">
                <span href="" class="carousel-image-title">Национальные (рабочие) визы в Польшу</span>
                <img src="img/visa_page/1.1.jpg" class="img-responsive" alt="">
            </article>
            <div class="description">
                <p>
                    Рабочая виза в Польшу на 6 месяцев (360/180)
                </p>
                <p>
                    Рабочая виза в Польшу на 1 год (от воеводы) (360/180)
                </p>
                <a href="" class="carousel-image-button">
                    Узнать больше
                </a>
            </div>
        </div>

    </div>

</header>

<h2>
    КАК МЫ РАБОТАЕМ
</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque nisi
    eum laudantium non. Veniam facilis magnam cum consectetur. Suscipit
    maxime ullam consequatur ipsa animi facilis quam quibusdam fugiat,
    et laborum.
</p>

<div class="container">
    <ul class="timeline">
        <li>
            <div class="timeline-badge primary">
                <i class="glyphicon glyphicon-pencil"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/3.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        Вы оставляете заявку на нашем сайте
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge warning">
                <i class="glyphicon glyphicon-comment"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/4.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        Мы с Вами договариваемся о консультации в нашем офисе
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge danger">
                <i class="glyphicon glyphicon-folder-open"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/5.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        После консультации, мы готовим документы для изготовления
                        приглашения
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge fourth-color">
                <i class="glyphicon glyphicon-phone"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/6.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        Мы уведомляем Вас по телефону, когда приглашение будет готово
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge info">
                <i class="glyphicon glyphicon-briefcase"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/7.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        Мы записываем Вас в визовый центр
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                    <hr>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge second-color ">
                <i class="glyphicon glyphicon-earphone"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/8.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        Мы уведомляем Вас по телефону, на какое число Вы записаны
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                </div>
            </div>
        </li>
        <li>
            <div class="timeline-badge third-color">
                <i class="glyphicon glyphicon-check"></i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/9.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        Мы заполняем визовую анкету и оформляем страховой полис
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                    <hr>
                </div>
            </div>
        </li>
        <li class="timeline-inverted">
            <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <img src="img/scheme_page/10.png" class="img-responsive" alt="">
                    <h4 class="timeline-title">
                        Вы подаете пакет документов в визовый центр и получаете визу
                    </h4>
                </div>
                <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        In error earum, quas nobis sapiente sit voluptas, impedit
                        veniam rerum suscipit corrupti ut pariatur maxime.
                    </p>
                </div>
            </div>
        </li>
    </ul>
</div>

<section id="reviews-section" class="container">

    <h2>
        ОТЗЫВЫ НАШИХ КЛИЕНТОВ
    </h2>

    <div id="owl-2">
        <div class="item">
            <article class="reviews_article">
                <img src="img/scheme_page/12.png" class="img-responsive" alt="">
                <p>
                    "Понадобилась рабочая виза в Польшу, поэтому решил обратиться за помощью. Остался доволен. Рад, что выбрал компанию «Просперис». Получил визу без проблем. Ответственный и приятный коллектив. Благодаря их рекомендациям и помощи, процесс получения рабочей визы оказался намного проще, чем ожидал. Сотрудники выполнили работу быстро и качественно. Не возникло проблем с заполнением анкеты. Документы предоставили точно в срок. Это помогло приехать в Польшу в указанное время. Желаю успехов и плодотворного труда! Продолжайте и дальше радовать клиентов! Рекомендую надежную компанию"
                </p>
                <h3>
                    John Dou
                </h3>
            </article>
        </div>

        <div class="item">
            <article class="reviews_article">
                <img src="img/scheme_page/13.png" class="img-responsive" alt="">
                <p>
                    "Уже длительное время занимаюсь бизнесом. Процесс давно налажен и идет удачно. Решил попробовать расширить сферу деятельности за пределами страны. После длительных раздумий выбрал Испанию. Недавно получил бизнес визу. Удалось это сделать в результате обращения в компанию «Просперис». Благодарен тем, кто консультировал в решении сложных вопросов и поддерживал. Понравился индивидуальный подход. Легко нашел взаимопонимание с сотрудниками. Огромное спасибо тем, кто работал с документами и помог оформить долгожданную визу. Убежден, что сотрудники настоящие профессионалы."
                </p>
                <h3>
                    John Dou
                </h3>
            </article>
        </div>

        <div class="item">
            <article class="reviews_article">
                <img src="img/scheme_page/12.png" class="img-responsive" alt="">
                <p>
                    "Мне удалось сделать это! Благодаря компании «Просперис», открыл рабочую визу в Литву. Мне неожиданно сделали хорошее предложение по работе. Это важный шаг в жизни. Готовился длительное время, тщательно выбирал компанию, которая предлагает услуги посредника в данном вопросе. Моя ситуация не из простых: «чистый паспорт», разведен, нет детей. Усложняло ситуацию то, что пришлось перенести дату поездки. Сотрудники с пониманием отнеслись к изменению обстоятельств. Пошли на встречу, сопровождали и поддерживали на всех этапах. Благодаря их помощи, удалось достигнуть нужного результата.				 "
                </p>
                <h3>
                    John Dou
                </h3>
            </article>
        </div>

        <div class="item">
            <article class="reviews_article">
                <img src="img/scheme_page/13.png" class="img-responsive" alt="">
                <p>
                    "Длительное время не получалось найти работу с достойной оплатой. Решил съездить за границу, чтобы заработать. Долго выбирал между странами и остановился на Польше. Нужно было оформить рабочую визу. По непонятной причине в других агентствах отказали. Знакомые посоветовали обратиться в компанию «Просперис». Менеджер заверил, что сложностей не должно быть. Четко объяснил, какие необходимо предоставить документы для оформления данного вида визы. Сделал вывод, что люди действительно находятся на своем месте. Сработали быстро. Остался довольным действиями настоящих профессионалов. Буду советовать обращаться только к ним."
                </p>
                <h3>
                    John Dou
                </h3>
            </article>
        </div>

    </div>
</section>

<section id="insurance-section" class="container">
    <h2>
        Другие услуги
    </h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
        voluptatum sit voluptates itaque rerum unde. Laborum iusto animi quod
        et impedit sed inventore ratione sapiente maxime, magni illum dolore
        maiores.
    </p>

    <div class="row">
        <article class="col-lg-6 col-md-6 col-sm-6">
            <div class="insurance-block">
                <img src="img/visa_page/6.jpg" class="img-responsive" alt="">
                <h3>
                    Страховка PZU 365/365
                </h3>
                <h3>
                    Страховка PZU 365/180
                </h3>
                <a href="" class="visa-country-botton">
                    Узнать больше
                </a>
            </div>
        </article>

        <article class="col-lg-6 col-md-6 col-sm-6">
            <div class="insurance-block">
                <img src="img/visa_page/7.jpg" class="img-responsive" alt="">
                <h3>
                    Страховка "Княжа" 360/180
                </h3>
                <h3>
                    Страховка "Княжа" 180/90
                </h3>
                <a href="" class="visa-country-botton">
                    Узнать больше
                </a>
            </div>
        </article>
    </div>
</section>


<section id="user-data-section" class="container">
    <h2>
        Скидка 300 ГРИВЕН!
    </h2>
    <p>
        При оформлении любой визы до 30.01.2017
    </p>
    <div class="slide slide5"><a name="visual-feedback"></a>
        <div class="example example-5">
            <div class="email">
                <h3>
                    Оставьте Вашу заявку для участия в акции
                </h3>
                <form action="">
                    <input id="telephone_name" name="name" type="text" placeholder="Имя  ">
                    <input id="telephone_call" name="telephone" type="text" placeholder="Номер телефона">
                </form>
                <div class="lang send">
                    Подать <br> заявку
                </div>
            </div>
        </div>
    </div>
</section>


<section id="footer-section">
    <h2 class="lang" key="footer_title">Мы работаем для Вас</h2>
    <h4>prosperis.visa@gmail.com</h4>
    <h4>+38 (097) 856-39-97</h4>
    <h4>+38 (066) 523-68-91</h4>
    <ul id="footer-section-menu" class="container">
        <li><a href="{{route('visa_page')}}">Визы</a></li>
        <li><a href="{{route('work_page')}}">Работа в Польше</a></li>
        <li><a href="{{route('scheme_page')}}">Как мы работаем</a></li>
        <li><a href="{{route('contacts')}}">Контакты</a></li>
    </ul>
    <p class="lang" key="copyright">&copy; Prosperis Chernivtsi, Ukraine</p>
</section>

</section>

<script src="public/js/bootstrap.min.js"></script>

<!-- Fuul Page Parallax -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js'></script>
<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.js'></script>

<!-- Owl Carousel -->
<script src="js/owl.carousel.js"></script>
<script src="js/owl.js"></script>

<script src="js/sidebar.js"></script>
<script src="js/contact.js"></script>

</body>
</html>