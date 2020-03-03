<?php
require_once __DIR__ . '/vendor/autoload.php';

include_once 'header.php';

use Admin\DataBase;
use User\Calendar;

$calendar = Calendar::createMonths();
$week = array(0 => "вс", "пн", "вт", "ср", "чт", "пт", "сб");
$weekNum = ["пн" => 7, "вт" => 6, "ср" => 5, "чт" => 4, "пт" => 3, "сб" => 2, "вс" => 1];

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
                        <div class="calendar__title-text"><?php echo $calendar['ThisMonth']; ?></div>
                        <div class="calendar__title-text"><?php echo $calendar['NextMonth']; ?></div>
                    </div>
                    <div class="calendar__arrow-right next"><img src="img/arrow-right.svg" alt=""></div>
                </div>

                <div class="booking_calendar calendar">
                    <div class="calendar__month month">

                        <?php
                        $firstDay = $weekNum[$week[date("w", mktime(0, 0, 0, $calendar['ThisMonthNumber'], 1, $calendar['ThisYear']))]];
                        $prevMonthDays = 7 - $firstDay;
                        if(isset($calendar['weekends'][(int)$calendar['ThisYear']][(int)$calendar['ThisMonthNumber']])){
                            $weekends = $calendar['weekends'][(int)$calendar['ThisYear']][(int)$calendar['ThisMonthNumber']];
                        }

                        for ($i = $calendar['PrevMonthDays'] - $prevMonthDays + 1; $i <= $calendar['PrevMonthDays']; $i++): ?>
                            <?php $day = $week[date("w", mktime(0, 0, 0, $calendar['PrevMonthNumber'], $i, $calendar['PrevYear']))]; ?>
                            <a href="booking.php" class="calendar__day another-month">
                                <div class="calendar__day-week"><?php echo $day ?></div>
                                <div class="calendar__day-month"><?php echo $i ?></div>
                            </a>
                        <?php endfor; ?>



                        <?php for ($i = 1; $i <= $calendar['ThisMonthDays']; $i++): ?>
                            <?php $day = $week[date("w", mktime(0, 0, 0, $calendar['ThisMonthNumber'], $i, $calendar['ThisYear']))]; ?>
                            <a href="booking.php?date=<?php echo $calendar['ThisYear']?>-<?php echo $calendar['ThisMonthNumber']?>-<?php if($i>=10){echo $i;}else{echo '0'.$i;}?>" class="calendar__day <?php if(in_array($i,$weekends)){echo "non__active";} ?>">
                                <div class="calendar__day-week"><?php echo $day ?></div>
                                <div class="calendar__day-month"><?php echo $i ?></div>
                            </a>
                        <?php endfor; ?>


                        <?php
                        $lastDay = $weekNum[$week[date("w", mktime(0, 0, 0, $calendar['ThisMonthNumber'], $calendar['ThisMonthDays'], $calendar['ThisYear']))]];
                        $nextMonthDays = $lastDay - 1;
                        for ($i = 1; $i <= $nextMonthDays; $i++): ?>
                            <?php $day = $week[date("w", mktime(0, 0, 0, $calendar['NextMonthNumber'], $i, $calendar['NextYear']))]; ?>
                            <a href="booking.php" class="calendar__day another-month">
                                <div class="calendar__day-week"><?php echo $day ?></div>
                                <div class="calendar__day-month"><?php echo $i ?></div>
                            </a>
                        <?php endfor; ?>

                    </div>


                    <div class="calendar__month month">
                        <?php
                        $firstDay = $weekNum[$week[date("w", mktime(0, 0, 0, $calendar['NextMonthNumber'], 1, $calendar['NextYear']))]];
                        $prevMonthDays = 7 - $firstDay;
                        $weekends = [];
                        if( isset($calendar['weekends'][(int)$calendar['NextYear']][(int)$calendar['NextMonthNumber']])){
                            $weekends = $calendar['weekends'][(int)$calendar['NextYear']][(int)$calendar['NextMonthNumber']];
                        }

                        for($i = $calendar['ThisMonthDays'] - $prevMonthDays + 1; $i <= $calendar['ThisMonthDays']; $i++): ?>
                            <?php $day = $week[date("w", mktime(0, 0, 0, $calendar['NextMonthNumber']-1, $i, $calendar['NextYear']))];?>
                            <a href="booking.php" class="calendar__day another-month">
                                <div class="calendar__day-week"><?php echo $day?></div>
                                <div class="calendar__day-month"><?php echo $i ?></div>
                            </a>
                        <?php endfor; ?>



                        <?php for ($i = 1; $i <= $calendar['NextMonthDays']; $i++): ?>
                            <?php $day = $week[date("w", mktime(0, 0, 0, $calendar['NextMonthNumber'], $i, $calendar['NextYear']))]; ?>
                            <a href="booking.php?date=<?php echo $calendar['NextYear']?>-<?php echo $calendar['NextMonthNumber']?>-<?php if($i>=10){echo $i;}else{echo '0'.$i;}?>" class="calendar__day <?php if(in_array($i,$weekends)){echo "non__active";} ?>">
                                <div class="calendar__day-week"><?php echo $day?></div>
                                <div class="calendar__day-month"><?php echo $i ?></div>
                            </a>
                        <?php endfor; ?>


                        <?php
                        $lastDay = $weekNum[$week[date("w", mktime(0, 0, 0, $calendar['NextMonthNumber'], $calendar['NextMonthDays'], $calendar['NextYear']))]];
                        $nextMonthDays = $lastDay - 1;
                        if($calendar['NextMonthNumber'] != 1 || $calendar['NextMonthNumber'] != 12) {
                            $thirdMonthNumber = 0;
                            $thirdYear = $calendar['NextYear'];
                        }
                        else{
                            $thirdMonthNumber = 1;
                            $thirdYear = $calendar['NextYear'] + 1;
                        }
                        for($i = 1; $i <= $nextMonthDays; $i++): ?>
                            <?php $day = $week[date("w", mktime(0, 0, 0, $thirdMonthNumber + 1, $i, $thirdYear))];?>
                            <a href="booking.php" class="calendar__day another-month">
                                <div class="calendar__day-week"><?php echo $day?></div>
                                <div class="calendar__day-month"><?php echo $i ?></div>
                            </a>
                        <?php endfor; ?>
                    </div>
                </div>

            </div>
        </section>
    </main>

<?php include_once 'footer.php' ?>