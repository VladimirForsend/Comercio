jQuery(function($) {


    $(document).ready(function() {
        //region comuna
        $('#billing_city_field, #billing_state_field').wrapAll('<div class="modulo-regiones-titan"></div>');


    });

    $('.carusel-productos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 375,
            settings: {
                slidesToShow: 1
            }
        }]
    });


    $(".menu-item-has-children").addClass("nav-item dropdown");
    $(".menu-item-has-children a").addClass("nav-link dropdown-toggle");
    $("ul.nav-item.dropdown").addClass("dropdown-menu");
    $("ul.nav-item.dropdown").removeClass("nav-item dropdown");
    $('ul.dropdown-menu').attr('aria-labelledby', 'navbarDropdown');
    $(".menu-item-has-children a:nth-child(0)").addClass("nav-link dropdown-toggle");
    $('.menu-item-has-children a:nth-child(0)').attr('role', 'button');
    $('.menu-item-has-children a:nth-child(0)').attr('data-toggle', 'dropdown');
    $('.menu-item-has-children a:nth-child(0)').attr('aria-haspopup', 'true');
    $("li.nav-item a").addClass('nav-link');
    $(".navbar .menu-item a").addClass('nav-link');

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })



    $(function() {

        $('[data-toggle="tooltip"]').tooltip()
    })



    $(".pop-menu .menu-item-has-children").hover(function() {
        $(".pop-menu .menu-item-has-children ul").toggleClass("mostrar");
    });


    var titulos_productos = $(".product-template-default .entry-header");
    $(titulos_productos).prependTo(".product-template-default .single-product .summary.entry-summary");

    var carro_productos = $(".xoo-wsc-basket");
    $(carro_productos).prependTo(".mini-carrito");

    var titulo_productos = $(".home .page header.entry-header");
    $(titulo_productos).prependTo(".home .woocommerce.columns-4");

    var titulo_productos = $(".banner_area-home.col-12.col-md-12.mb-3:nth-child(2)");
    $(titulo_productos).prependTo(".home .woocommerce.columns-4");

    var titulo_checkout = $("#order_review_heading");
    $(titulo_checkout).prependTo("#order_review");

    var clasesBuscador = $('.aws-container');
    var idBuscador = $('.aws-container');
    $(idBuscador).attr('id', 'buscador-comercio');
    $(clasesBuscador).addClass('buscador-comercio col-12 col-md-4');

    var tabla_peso = $(".woocommerce-product-attributes-item.woocommerce-product-attributes-item--weight");
    $(tabla_peso).appendTo(".has-subtle-light-gray-background-color.has-background");

    var tabla_dime = $(".woocommerce-product-attributes-item.woocommerce-product-attributes-item--dimensions");
    $(tabla_dime).appendTo(".has-subtle-light-gray-background-color.has-background");

    /* para ocultar los hijos en el menu mobile (opcional) */
    if ($('#navbarmobile').hasClass('remove-children')) {
        $('#navbarmobile .dropdown-menu').addClass('d-none').removeClass('dropdown-menu');
    };

    /* para cerrar el popover de categorias al hacer click en cualquier parte */
    $('body').on('click', function(e) {
        /*did not click a popover toggle, or icon in popover toggle, or popover*/
        if ($(e.target).data('toggle') !== 'popover' &&
            $(e.target).parents('[data-toggle="popover"]').length === 0 &&
            $(e.target).parents('.popover.in').length === 0) {
            $('[data-toggle="popover"]').popover('hide');
        }
    });

    /* para desplegar el menu hijo en links padre del menu categorias 
    $('.pop-menu .menu-item-has-children').mouseover */

    /* para eliminar todas las imagenes en la parte de descripción del producto (opcional) 
    $('.comercio--description-inner').find('img').addClass('d-none');
    */
    /* para ocultar la seccion de descripción si esta vacia */
    if (!$('.description-inner-content').children().length > 0) {
        $('.comercio--description-inner').hide();
    };

    /* para ocultar la seccion de informacion adicional en caso que este vacia y agrandar descripcion */
    if (!$('.additional-information-content').children().length > 0) {
        $('.comercio--additional-information').hide();
        $('.comercio--description-inner').removeClass('col-lg-6');
    };

    /* mover productos relacionados al final y quitar los margenes del footer en caso que exista */
    $('.upsells').addClass('container pt-4').appendTo($('.woocommerce-extra-section'));
    if ($('.upsells').length > 0) {
        $('#colophon').css({ 'margin-top': '0' });
    };

    /* limitar productos relacionados a 4 */
    $('.upsells .lista-productos').find("li").slice(4).remove();

    /* testing logged in
    $('#menu-item-95').click(function(){
        if(!$('body').hasClass('logged-in')){
            alert('hola, no estas logeado');
        } else {
            alert('hola, estas logeado');
        };
    });
    */

});