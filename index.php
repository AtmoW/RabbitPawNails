<?php
require_once __DIR__ . '/vendor/autoload.php';

include_once 'header.php';

use Admin\DataBase;

$port = DataBase::select('portfolio');

?>

    <main>
        <section class="top">
            <div class="container">
                <div class="top__inner">
                    <div class="top__text">
                        <h1 class="top__title">
                            Rabbit paw nails
                        </h1>
                        <div class="top__desc">
                            Я не продаю услуги - я помогаю вашим мечтам сбыться!
                        </div>
                    </div>
                    <div class="top__img">
                        <img src="img/top-img.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio">
            <div class="container">
                <div class="portfolio__inner">
                    <h3 class="portfolio__title block-title">Мои работы</h3>
                    <div class="portfolio__content">
                        <div class="portfolio__border">
                            <div class="portfolio__slider slider">
                                <?php foreach ($port as $p): ?>
                                    <div class="portfolio__item">
                                        <img src="admin/<?php echo $p['photo_url'] ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="slider__dotted"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about">
            <div class="container">
                <div class="about__inner">
                    <div class="about__title block-title">Как записаться?</div>
                    <div class="about__content">
                        <ul class="about__list">
                            <li>1. Выбери день</li>
                            <li>2. Выбери время</li>
                            <li>3. Внеси предоплату</li>
                            <li>4. Приходи в гости</li>
                        </ul>

                        <div class="about__map">
                            <div id="map">

                            </div>
                            <div class="about__adress">
                                ул.Хасанская дом 22 корпус 1 кв 89
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="booking">
            <div class="container">
                <div class="booking__title block-title">
                    Запись
                </div>
                <div class="calendar__title">
                    <div class="calendar__arrow-left prev"><img src="img/arrow-left.svg" alt=""></div>
                    <div class="month__slider-title">
                        <div class="calendar__title-text">Февраль</div>
                        <div class="calendar__title-text">Март</div>
                    </div>
                    <div class="calendar__arrow-right next"><img src="img/arrow-right.svg" alt=""></div>
                </div>

                <div class="booking_calendar calendar">
                    <div class="calendar__month month">
                        <a href="booking.php" class="calendar__day non__active another-month">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">27</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active another-month">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">28</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active another-month">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">29</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active another-month">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">30</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active another-month">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">31</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">1</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">2</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">3</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">4</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">5</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">6</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">7</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">8</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">9</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">10</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">11</div>
                        </a>
                        <a href="booking.php" class="calendar__day ">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">12</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">13</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">14</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">15</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">16</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">17</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">18</div>
                        </a>
                        <a href="booking.php" class="calendar__day ">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">19</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">20</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">21</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">22</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">23</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">24</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">25</div>
                        </a>
                        <a href="booking.php" class="calendar__day ">
                            <div class="calendar__day-week">cр</div>
                            <div class="calendar__day-month">26</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">27</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">28</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">29</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active another-month">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">1</div>
                        </a>
                    </div>

                    <div class="calendar__month month">
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">24</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">25</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">26</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">27</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">28</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">29</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">1</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">2</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">3</div>
                        </a>
                        <a href="booking.php" class="calendar__day ">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">4</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">5</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">6</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">7</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">8</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">9</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">10</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">11</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">12</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">13</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">14</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">15</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">16</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">17</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">ср</div>
                            <div class="calendar__day-month">18</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">19</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">20</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">21</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">22</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">23</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">24</div>
                        </a>
                        <a href="booking.php" class="calendar__day ">
                            <div class="calendar__day-week">cр</div>
                            <div class="calendar__day-month">25</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">26</div>
                        </a>
                        <a href="booking.php" class="calendar__day non__active">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">27</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">28</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">29</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">пн</div>
                            <div class="calendar__day-month">30</div>
                        </a>
                        <a href="booking.php" class="calendar__day">
                            <div class="calendar__day-week">вт</div>
                            <div class="calendar__day-month">31</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">cр</div>
                            <div class="calendar__day-month">1</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">чт</div>
                            <div class="calendar__day-month">2</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">пт</div>
                            <div class="calendar__day-month">3</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">сб</div>
                            <div class="calendar__day-month">4</div>
                        </a>
                        <a href="booking.php" class="calendar__day   another-month">
                            <div class="calendar__day-week">вс</div>
                            <div class="calendar__day-month">5</div>
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </main>

<?php include_once 'footer.php' ?>