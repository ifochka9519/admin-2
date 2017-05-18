<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @foreach($metas as $meta)
        @if($meta->type_tag == 'title')
            <title>{{$meta->text_tag}}</title>
            @elseif($meta->type_tag == 'description')
            <meta name="description" content='{{$meta->text_tag}}'>
            @elseif($meta->type_tag == 'keywords')
            <meta name="Keywords" content='{{$meta->text_tag}}'>
            @endif
        @endforeach



    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- Fuul Page Parallax -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts.css">

    <!-- Owl Carousel -->
    <link href="css/owl_slide.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/prettify.css" rel="stylesheet">


    <link href="css/media.css" rel="stylesheet">

</head>
<body>

<nav class="menu">
    <ul>
        <li><a href="{{route('visa_page')}}">Визы</a></li>
        <li><a href="{{route('work_page')}}">Работа в Польше</a></li>
        <li><a href="{{route('scheme_page')}}">Как мы работаем</a></li>
        <li><a href="{{route('contacts')}}">Контакты</a></li>
    </ul>
</nav>

<section id="header-section">
    <section id="one" class="background">
        <div class="content-wrapper">
            <p id="" class="title-slide content-title">Визы в Европу</p>
            <p class="title-slide content-subtitle">страховки, анкеты,регистрация в визовый центр</p>
            <a href="{{route('visa_page')}}" class="about-us-button">
                Посмотреть перечень
            </a>
            <section id="section10" class="demo">
                <a href="#thanks"><span></span></a>
            </section>
        </div>
    </section>
    <section id="two" class="background">
        <div class="content-wrapper">
            <p class="content-title">Работа в Польше</p>
            <p class="content-subtitle">перечень вакансий по работе в польше</p>
            <a href="{{route('work_page')}}" class="about-us-button"> Посмотреть ВАКАНСИИ</a>
        </div>
    </section>
    <section id="three" class="background">
        <div class="content-wrapper">
            <p class="content-title">Как мы работаем</p>
            <p class="content-subtitle">НАШИ ПРЕИМУЩЕСТВА И СХЕМА РАБОТЫ</p>
            <a href="{{route('scheme_page')}}" class="about-us-button">Ознакомиться</a>
        </div>
    </section>
    <section id="four" class="background">
        <div class="content-wrapper">
            <p class="content-title">Контакты</p>
            <p class="content-subtitle">НАШИ КОНТАКТЫ</p>
            <a href="{{route('contacts')}}" class="about-us-button">Связаться с нами</a>
        </div>
    </section>
</section>



<script src="js/bootstrap.min.js"></script>

<!-- Arrow -->
<script src="js/arrow.js"></script>

<!-- Fuul Page Parallax -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js'></script>
<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.js'></script>
<script src="js/index.js"></script>

<!-- Menu -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js'></script>
<script src="js/menu.js"></script>

<!-- Owl Carousel -->
<script src="js/owl.carousel.js"></script>
<script src="js/owl.js"></script>
<script>{{$script[0]->yandex}}</script>
<script>{{$script[0]->google}}</script>
<script></script>
</body>
</html>