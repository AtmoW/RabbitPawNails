<footer class="footer">
        <div class="footer__up">
            <img src="img/footer-up.svg" alt="">
        </div>
        <div class="container">
            <div class="footer__inner">
                <div class="footer__socio">
                    <a href="https://instagram.com/<?php echo $social['instagram']?>"><img src="img/footer-social-1.svg" alt=""></a>
                    <a href="<?php echo $social['vk']?>"><img src="img/footer-social-2.svg" alt=""></a>
                    <a href="https://api.whatsapp.com/send?phone=<?php $social['phone']?>&text=<?php urlencode($social['whats_msg'])?>"><img src="img/footer-social-3.svg" alt=""></a>
                </div>
                <div class="footer__author">
                    сайт разработал - <a href="https://vk.com/skylght">Илья Евдокимов</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/jquery.mask.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
