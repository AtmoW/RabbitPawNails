$(document).ready(function () {

    let total_price = 0;
        sale = 0;
    $('.burger').click(function(event){
        $('.burger, .menu').toggleClass('active');
        $('body').toggleClass('lock')
    });


var s_items = $('.portfolio__item').length;
for (let i = 0; i < s_items; i++) {
    if(i==0){
        $('.slider__dotted').append('<div data-slide = '+i+' class="slider__dot active"></div>');
    }
    else{
        $('.slider__dotted').append('<div data-slide = '+i+' class="slider__dot"></div>');
    }
}
    $(".slider").slick({
        autoplay: false,
        arrows:false
    });

    $('.slider__dot').on('click',function(){
        $('.active').removeClass('active');
        slide = $(this).attr('data-slide');
        $('.slider').slick('slickGoTo', slide);
        $(this).toggleClass('active');
    });

    $(".slider").on('afterChange', function(event, slick, currentSlide){
        $('.active').removeClass('active');
        $('.slider__dot[data-slide='+currentSlide+']').toggleClass('active')
    });

    $('.footer__up').click(function (){
            $('body,html').scrollTop(0);
    });
    
    
    $(window).bind('scroll', function(){
        var windowTop = $(this).scrollTop();
        if(windowTop>800){
            $('#map').html('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4114.646433257099!2d30.491575885253482!3d59.936203628705904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46962de0a5ea55bb%3A0x6a49be2873ffec0a!2z0KXQsNGB0LDQvdGB0LrQsNGPINGD0LsuLCAyMiDQutC-0YDQv9GD0YEgMSwg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5NTI5OA!5e0!3m2!1sru!2sru!4v1581614472475!5m2!1sru!2sru"height="374" width="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>');

            $(window).unbind('scroll');
        }
    });

    $('.phone').mask('+7(000)-000-00-00');


    
    $('.calendar').slick({
        infinite: false,
        autoplay: false,
        arrows:false,
        draggable:false,
        slidesToShow: 1,
        adaptiveHeight: true,
    });
    $('.next').on('click', function() {
        $('.month__slider-title').slick('slickNext');
        $('.calendar').slick('slickNext');
      });
    $('.prev').on('click', function() {
      $('.calendar').slick('slickPrev');
      $('.month__slider-title').slick('slickPrev');
    });

    $('.month__slider-title').slick({
        infinite: false,
        autoplay: false,
        arrows:false,
        draggable:false,
    });
    $(".services__service .services__input[data-serv]").on('click',function () {
            serv = $(this).attr('data-serv');
            price = $(this).attr('data-price');
            all_price = $(this).attr('data-all-price');

            prop_count = $('.props__prop').length;
            if(parseInt(prop_count) == 0){
                $('.props').append('<div class="props__title">Выберите количество ногтей:</div>');
            }
            
            if($('.props__prop[data-serv="'+serv+'"]').length > 0){
                $('.props__prop[data-serv="'+serv+'"]').remove();
            }
            else
            {
                $('.props').append('<div data-serv="'+serv+'" data-price = "'+price+'"  data-all-price = "'+all_price+'" class = "props__prop prop">'+
                '<label for="nails" class="props__label">Для услуги '+serv+'</label>'+
                '<select  data-serv="'+serv+'" name = "prop-'+serv+'" id = "nails" class = "nails">' +
                    '<option value="0">0</option>'+
                    '<option value="1">1</option>'+
                    '<option value="2">2</option>'+
                    '<option value="3">3</option>'+
                    '<option value="4">4</option>'+
                    '<option value="5">5</option>'+
                    '<option value="6">6</option>'+
                    '<option value="7">7</option>'+
                    '<option value="8">8</option>'+
                    '<option value="9">9</option>'+
                    '<option value="10">10</option>'+
                '</select>'+
                '</div>'
                );
            }

            prop_count = $('.props__prop').length;
            if(parseInt(prop_count) == 0){
                $('.props__title').remove();
            }
    });

    $('.services__service .services__input').on('change', function(){

        if(!$(this).attr('data-serv')){
            if($(this).prop('checked')){
                total_price+=parseInt($(this).attr('data-price'));
            }
            else{
                total_price-=parseInt($(this).attr('data-price'));
            }
        }
        

        sum = 0;
        selected = [];
        $('select').each(function(index){
            if($(this).parent().attr('data-all-price')!='0'){
                if(parseInt($(this,'option:selected').val())==10){
                    selected[index] = parseInt($(this).parent().attr('data-all-price'));
                }
                else{
                    selected[index] =parseInt($(this,'option:selected').val()) * parseInt($(this).parent().attr('data-price'));
                }
            }
            else{
                alert(123123);
                selected[index] =parseInt($(this,'option:selected').val()) * parseInt($(this).parent().attr('data-price'));
            }
        });
        selected.forEach(function(item){
            sum+=item;
        });

        $('.services__price span').html(parseInt(total_price) + parseInt(sum));
        sale = Math.round((parseInt(total_price) + parseInt(sum)) * 0.25);
        $('.services__sale span').html(sale);
        console.log(selected);

    });

    $('.props').on('change','.props, .prop', function()
    {
        sum = 0;
        selected = [];

        $('select').each(function(index){
            if($(this).parent().attr('data-all-price')!='0'){
                if(parseInt($(this,'option:selected').val())==10){
                    selected[index] = parseInt($(this).parent().attr('data-all-price'));
                }
                else{
                    selected[index] =parseInt($(this,'option:selected').val()) * parseInt($(this).parent().attr('data-price'));
                }
            }
            else{
                selected[index] =parseInt($(this,'option:selected').val()) * parseInt($(this).parent().attr('data-price'));
            }
        });

        selected.forEach(function(item){
            sum+=item;
        });
        
        $('.services__price span').html(parseInt(total_price) + parseInt(sum));
        sale = Math.round((parseInt(total_price) + parseInt(sum)) * 0.25);
        $('.services__sale span').html(sale);
    });
});


