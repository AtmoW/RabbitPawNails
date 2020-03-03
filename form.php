<?php include_once 'header.php';

require_once __DIR__ . '/vendor/autoload.php';

use Admin\DataBase;

$services = DataBase::select('services');
?>
    <main class=form__main>
        <div class="form__title block-title">
            Ваши данные
        </div>
        <form action="end-page.php" class="form" method="post">
            <input type="hidden" name="date" value="<?php echo $_POST['date'] ?>">
            <input type="hidden" name="start" value="<?php echo $_POST['time'] ?>">

            <div class=form__text-box>
                <label class="form__text-label" for="name">Как вас зовут</label>
                <input class="form__text" name="name" required type="text" id="name" placeholder="Введите ваше имя">
            </div>
            <div class=form__text-box>
                <label class="form__text-label" for="phone">Ваш номер телефона</label>
                <input class="form__text phone" required type="text" name="phone" id="phone"
                       placeholder="Введите ваш номер">
            </div>

            <div class="services__result">
                <div class="form__services services">
                    <div class="services__title">Услуги</div>
                    <div class="services__box">
                        <?php
                        $i = 0;
                        $block = false;
                        foreach ($services as $s):
                            if ($i == 0):$block = true; ?>
                                <div class="services__col">
                            <?php endif;
                            $price = $s['price_one'];
                            $all_price = $s['price_all'];
                            ?>
                            <div class="services__service">
                                <input data-price="<?php echo $price ?>" data-all-price="<?php echo $all_price ?>"
                                       data-serv="<?php echo mb_strtolower($s['name']) ?>"
                                       id='ser-<?php echo $s['id'] ?>' type="checkbox"
                                       name="<?php echo mb_strtolower($s['name']) ?>-service"
                                       value="<?php echo mb_strtolower($s['name']) ?>" class="services__input">
                                <label for="ser-<?php echo $s['id'] ?>"
                                       class="services__label"><?php echo $s['name'] ?></label>
                            </div>
                            <?php if ($i == 3): $block = false; ?>
                            </div>
                            <?php $i = 0; endif;
                            $i++ ?>
                        <?php endforeach;
                        if ($block) {
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="connect">
                    <label for="connect" class="form__text-label">Способ связи</label>
                    <select name="social" id="connect">
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="instagram">instagram</option>
                        <option value="vk">vk</option>
                        <option value="ph">По телефону</option>
                    </select>
                    <div class="connect__input">
                    </div>
                </div>
                <div class="services__props props">
                </div>
                <div class="services__prices-all">
                    <div class="services__prices">
                        <div class="services__sale-pers">
                            Персональная скидка: <span>0</span>%.
                            <input class="services__sale-pers-input" type="hidden" name="sale" value="0">
                        </div>
                        <div class="services__price">
                            Стоимость за услуги: <span>0</span> руб.
                            <input class="services__price-input" type="hidden" name="price" value="0">
                            <div class="services__desc">* цена без учёта персональной скидки</div>
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


<?php include_once 'footer.php' ?>