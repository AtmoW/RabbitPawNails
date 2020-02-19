<?php include_once 'header.php' ?>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <nav class="header__menu">
                    <div class="header__burger burger">
                        <span></span>
                    </div>
                    <ul class="header__menu-list menu">
                        <li><a href="index.php">Главная</a></li>
                        <div class="header__menu-list-sep"></div>
                        <li><a href="#">Как записаться</a></li>
                        <div class="header__menu-list-sep"></div>
                        <li><a href="#">Мои работы</a></li>
                        <div class="header__menu-list-sep"></div>
                        <li><a href="#">Запись</a></li>
                        <div class="header__menu-list-sep last"></div>
                        <li>
                            <div class="menu__phone"><a href="tel:+79219859566">+7(921)985-95-66</a></div>
                        </li>
                    </ul>
                </nav>
                <div class="header__phone"><a href="tel:+79219859566">+7(921)985-95-66</a></div>
                <div class="header__soсio">
                    <a href=""><img src="img/header-social-1.svg" alt=""></a>
                    <a href=""><img src="img/header-social-2.svg" alt=""></a>
                    <a href=""><img src="img/header-social-3.svg" alt=""></a>
                </div>
            </div>
        </div>
    </header>
    <main class=form__main>
        <div class="form__title block-title">
            Ваши данные
        </div>
        <form action="" class="form">
            <div class=form__text-box>
                <label class="form__text-label" for="name">Как вас зовут</label>
                <input class="form__text" name="name" type="text" id="name" placeholder="Введите ваше имя">
            </div>
            <div class=form__text-box>
                <label class="form__text-label" for="phone">Ваш номер телефона</label>
                <input class="form__text phone" type="text" name="phone" id="phone" placeholder="Введите ваш номер">
            </div>

            <div class="services__result">
                <div class="form__services services">
                    <div class="services__title">Услуги</div>
                    <div class="services__box">
                        <div class="services__col">
                            <div class="services__service">
                                <input data-price="100" id='ser-1' type="checkbox" class="services__input">
                                <label for="ser-1" class="services__label">Снятие покрытия</label>
                            </div>

                            <div class="services__service">
                                <input data-price="100" id='ser-2' data-all-price = "0" data-serv="ремонт" type="checkbox" class="services__input">
                                <label for="ser-2" class="services__label">Ремонт</label>
                            </div>

                            <div class="services__service">
                                <input data-price="100" id='ser-3' data-serv="дизайн" type="checkbox" class="services__input">
                                <label for="ser-3" class="services__label">Дизайн</label>
                            </div>
                        </div>

                        <div class="services__col">
                            <div class="services__service">
                                <input data-price="300" id='ser-4' type="checkbox" class="services__input">
                                <label for="ser-4" class="services__label">Покрытие</label>
                            </div>
                            <div class="services__service">

                                <input data-price="50" data-all-price = "300" data-serv="укрепление акриловой пудрой" id='ser-6' type="checkbox" class="services__input">
                                <label for="ser-6" class="services__label">Укрепление акриловой пудрой</label>
                            </div>
                            <div class="services__service">
                                <input data-price="100" data-all-price = "350" data-serv="укрепление гелем" id='ser-7' type="checkbox" class="services__input">
                                <label for="ser-7" class="services__label">Укрепление гелем</label>
                            </div>

                        </div>

                        <div class=services__col>
                            <div class="services__service">
                                <input data-price="150" data-all-price = "1300" data-serv="наращивание" id='ser-8' type="checkbox" class="services__input">
                                <label for="ser-8" class="services__label">Наращивание</label>
                            </div>

                            <div class="services__service">
                                <input data-price="500" id='ser-9' type="checkbox" class="services__input">
                                <label for="ser-9" class="services__label">Маникюр</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="services__props props">
                </div>
                <div class="services__prices-all">
                    <div class="services__prices">
                        <div class="services__price">
                            Стоимость за услуги: <span>0</span> руб.
                        </div>
                        <div class="services__sale">
                            Предоплата: <span>0</span> руб.
                        </div>
                    </div>

                    <input type="submit" class="services__btn" value="сделать предоплату">
                </div>
            </div>
        </form>
    </main>


<?php include_once 'footer.php'?>