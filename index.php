<?php require 'includes/variables.php'; ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>День в фото</title>
    <meta name="description" content="День в фото">
    <meta name="keywords" content="День в фото">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

    <link rel="icon" href="/favicon.ico?ver=<?php echo time(); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico?ver=<?php echo time(); ?>" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png?ver=<?php echo time(); ?>">

    <link rel="stylesheet" href="/styles/main.css?ver=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Serif|Playfair+Display&amp;subset=cyrillic-ext" rel="stylesheet">

    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="page">
    <div class="page__container">
        <header class="heading">
            <h1 class="heading__title">
                <span class="heading__title-text">
                    День в фото
                </span>
                <i class="heading__title-line"></i>
            </h1>
        </header>

        <section class="main-photo">
            <div class="main-photo__image-inner">
                <img src="/img/main.jpg" class="main-photo__image" alt="21 сентября">
                <a class="photos__date-link _type_main-photo" href="#">
                    <span class="photos__date-num">
                        21
                    </span>
                    <span class="photos__date-month">
                        сентября
                    </span>
                    <i class="photos__date-arr"></i>
                </a>
                <i class="main-photo__corner"></i>
            </div>
            <div class="main-photo__text-inner">
                <div class="main-photo__text">
                    Мельницы маленькой деревушки Brandmill вблизи курортного австрийского города Mayerhoffen.
                </div>
                <div class="main-photo__desc">
                    Фото:
                    <a class="main-photo__desc-link" href="#">
                        Reuters
                    </a>
                </div>
            </div>
        </section>

        <section class="photos clearfix">
            <?php foreach($photos as $item) : ?>
                <?php if ( $item['type'] == 'link' ) : ?>
                    <a class="photos__item photos__link photos__date-link" href="#">
                        <span class="photos__date-num">
                            <?php echo date('d', strtotime($item['date'])); ?>
                        </span>
                        <span class="photos__date-month">
                            <?php echo $monthsByIndex[date('n', strtotime($item['date']))]; ?>
                        </span>
                        <i class="photos__date-arr"></i>
                    </a>
                <?php else : ?>
                    <a class="photos__item photos__link<?php echo isset($item['extraClass']) ? ' ' . $item['extraClass'] : ''; ?>" href="#">
                        <img class="photos__image" src="/img/<?php echo $item['image']; ?>" alt="">
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>

        <div class="pagination">
            <span class="pagination__label">
                Страницы:
            </span>

            <span class="pagination__links">
                <?php foreach($pagination as $item) : ?>
                    <?php if ( isset($item['active']) && $item['active'] ) : ?>
                        <a class="pagination__link _type_page _state_active">
                            <?php echo $item['page']; ?>
                        </a>
                    <?php else : ?>
                        <a class="pagination__link _type_page" href="?page=<?php echo $item['page']; ?>">
                            <?php echo $item['page']; ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>

                <a class="pagination__link _type_next" href="?page=2">
                    Следующая
                </a>
            </span>
        </div>
    </div>
</body>