var Script = function () {
    maskAttributes();
//bandera para saltar la proÃ§imera accion al validar los formularios
    var primero = false;
    /**
     * validacion de formularios para bloquear botones de accion
     */
    $("form").submit(function (e) {
//        alert($('form button.btn-success').attr('class'));
        if (verificarValidacionModal("form"))
        {
            if (primero)
            {
                var botonSubmit = $('form button.btn-success');
                $(botonSubmit).attr("disabled", true);
                $(botonSubmit).html('<i class="icon-loading"></i> Espere...');
                $(botonSubmit).attr("disabled", true);
                $('form a').attr("disabled", true);
                $('form a').attr("onclick", "true");
            }
            else
            {
                primero = true;
            }

        }

        return;
    });

//    sidebar dropdown menu

    jQuery('#sidebar .sub-menu > a').click(function () {
        var last = jQuery('.sub-menu.open', $('#sidebar'));
        last.removeClass("open");
        jQuery('.arrow', last).removeClass("open");
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.arrow', jQuery(this)).removeClass("open");
            jQuery(this).parent().removeClass("open");
            sub.slideUp(200);
        } else {
            jQuery('.arrow', jQuery(this)).addClass("open");
            jQuery(this).parent().addClass("open");
            sub.slideDown(200);
        }
    });

//    sidebar toggle

    $('.icon-reorder').click(function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-180px'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '180px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

    // custom scrollbar
    $(".sidebar-scroll").niceScroll({styler: "fb", cursorcolor: "#0076A5", cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});
    $("html").niceScroll({styler: "fb", cursorcolor: "#0076A5", cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});


// widget tools

    jQuery('.widget .tools .icon-chevron-down, .widget .tools .icon-chevron-up').click(function () {
        var el = jQuery(this).parents(".widget").children(".widget-body");
        if (jQuery(this).hasClass("icon-chevron-down")) {
            jQuery(this).removeClass("icon-chevron-down").addClass("icon-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("icon-chevron-up").addClass("icon-chevron-down");
            el.slideDown(200);
        }
    });

    jQuery('.widget .tools .icon-remove').click(function () {
        jQuery(this).parents(".widget").remove();
    });

    // tool tips
    $('.element').tooltip();
    $('.tooltips').tooltip();

    // popovers
    $('.popovers').popover();

    // scroller
    $('.scroller').slimscroll({
        height: 'auto'
    });

    // selects
    $('select.fix').selectBox();

    var buttons = $('.form-actions-float');
    floatButtons();
    $(window).scroll(function () {
        floatButtons();
    });

    function floatButtons() {
        if ($(window).scrollTop() + $(window).height() < $(document).height() - 30) { // To far, the navigation needs to be set in place
            buttons.addClass('flotante');
        } else {
            buttons.removeClass('flotante');
        }
    }



}();

function showModalLoading(tipo) {
    var html = "";
    html += "<div class='modal-header'><a class='close' data-dismiss='modal'>&times;</a><h4><i class='icon-refresh'></i> Cargando</h4></div>";
    html += "<div class='modal-body'><div class='loading'><img src='" + themeUrl + "images/truulo-loading.gif' /></div></div>";
    if (tipo)
    {
        $("#mainBigModal").html(html);
        $("#mainBigModal").modal("show");
    }
    else {
        $("#mainModal").html(html);
        $("#mainModal").modal("show");
    }

}

function showModalData(html, tipo) {
    if (tipo) {

        $("#mainBigModal").html(html);

    }
    else {

        $("#mainModal").html(html);

    }
    $('select.fix').selectBox();
}
/**
 * 
 * @param {cadena} url
 * @returns {undefined}
 */
function viewModal(url, CallBack, tipo)
{
    $.ajax({
        type: "POST",
        url: baseUrl + url,
        beforeSend: function () {
            showModalLoading(tipo);
        },
        success: function (data) {
            showModalData(data, tipo);
            CallBack();
        }
    });
}
/**
 * @param {cadena} $form
 * @argument name descriptionpermite evaluar el formulario de un modal, para su posterior actualizaciÃ³n 
 * o registro por medio de ajax.
 */
function AjaxGestionModal($form, CallBack) {
    var form = $($form);
    var settings = form.data('settings');
    settings.submitting = true;
    $.fn.yiiactiveform.validate(form, function (messages) {

        $.each(messages, function () {
//            console.log(this);
        });
        if ($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {
                $.fn.yiiactiveform.updateInput(this, messages, form);
            });
            AjaxGuardarModal(true, $form, CallBack);
        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function () {
                        $.fn.yiiactiveform.updateInput(this, messages, form);
                    });
            DesBloquearBotonesModal($form, 'Guardar', 'AjaxAtualizacionInformacion');
        }
    });
}
/**
 * @param {cadena} $form
 * @param {arreglo} listas
 * @argument  permite validar y guardar el formulario de un modal
 * al momento de ejecutar una accion.
 */
function AjaxAccionModal($form, CallBack) {
    var form = $($form);
    var settings = form.data('settings');
    settings.submitting = true;
    $.fn.yiiactiveform.validate(form, function (messages) {
        $.each(messages, function () {
            console.log(this);
        });
        if ($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {

                $.fn.yiiactiveform.updateInput(this, messages, form);
            });
            AjaxGuardarAccionModal(true, $form, CallBack);

        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function () {
                        $.fn.yiiactiveform.updateInput(this, messages, form);
                    });
            DesBloquearBotonesModal($form, 'Guardar', 'AjaxCrearAccion');
        }
    });
}
/**
 * 
 * @param {cadena} name description
 * @returns {Boolean}
 * ValidaciÃ³n de los control-group de un elemento contenedor,
 * para determinar si no contiene la clase error 
 */
function BloquearBotonesModal($form)
{
    var elemento = $form + ' a[data-dismiss="modal"]';
    $(elemento).attr("disabled", true);
    $(elemento).attr('data-dismiss', 'long');
    elemento = $form + ' a.btn-success';
    $(elemento).html('<i class="icon-loading"></i> Espere...');
    $(elemento).attr("disabled", true);
    $(elemento).attr("onclick", "true");
}
function DesBloquearBotonesModal($form, Detalle, accion)
{
    var elemento = $form + ' a[data-dismiss="long"]';
    $(elemento).attr("disabled", false);
    $(elemento).attr('data-dismiss', 'modal');
    elemento = $form + ' a.btn-success';
    $(elemento).html('<i class="icon-ok"></i>' + Detalle);
    $(elemento).attr("disabled", false);
    $(elemento).attr("onclick", accion + '("' + $form + '");');
}
function verificarValidacionModal($contenedor)
{
    var verificar = true;
    $contenedor = $contenedor + ' div.control-group';
    $($contenedor).each(function (index, elemento) {
        if ($(elemento).hasClass('error'))
        {
            verificar = false;
        }
    });
    return verificar;
}


/**
 * @param {Cadena} Formulario
 * Guarda el contenido de los modales de entidades
 */

function AjaxGuardarModal(verificador, Formulario, callBack)
{
    if (verificador)
    {
        var listaActualizar = Formulario.split('-');
        listaActualizar = listaActualizar[0] + '-grid';
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: $(Formulario).attr('action'),
            data: $(Formulario).serialize(),
            beforeSend: function (xhr) {
            },
            success: function (data) {
                if (data.success) {
                    console.log(data);
                    $("#mainModal").modal("hide");
                    callBack(listaActualizar, data);

                } else {

//                    DesBloquearBotonesModal(Formulario);
                    DesBloquearBotonesModal(Formulario, 'Guardar', 'AjaxCrearAccion');

                    bootbox.alert(data.message);
                }
            }
        });
    }

}
/**
 * @param {cadena} Formulario
 * Guarda el contenido de los modales de las acciones
 */
function AjaxGuardarAccionModal(verificador, Formulario, CallBack)
{
    if (verificador)
    {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: $(Formulario).attr('action'),
            data: $(Formulario).serialize(),
            beforeSend: function (xhr) {
            },
            success: function (data) {
                if (data.success) {
                    $("#mainModal").modal("hide");
                    $("#maiMessages").removeClass('hidden');
                    $("#maiMessages").html('<div class="alert alert-success">' +
                            '<i data-dismiss="alert" class="icon-remove close"></i>' +
                            data.messages.success.toString() +
                            '</div>');
                    CallBack();
                } else {
                    DesBloquearBotonesModal(Formulario);
                    bootbox.alert(data.messages.error.toString());
                    $("#mainModal").modal("hide");
                }
            }
        });
    }
}

/**
 * Actualizacion de vistas por ajax
 * @param {type} url
 * @param {type} elemento
 * @param {type} callBack
 * @returns {undefined}
 */
function AjaxUpdateElement(url, elemento, callBack)
{
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: url,
        beforeSend: function (xhr) {
            var html = "<div class='loading'><img src='" + themeUrl + "images/truulo-loading.gif' /></div>";
            $(elemento).html(html);
        },
        success: function (data) {
            if (data.success) {
                $(elemento).html(data.html);
                callBack();
            } else {
                bootbox.alert(data.messages.error.toString());
            }
        }
    });
}
/**
 * Carga de formatos a input en formularios
 * @returns {undefined}
 */
function maskAttributes() {
    $('input.telefono').mask('000-000000');
    $('input.celular').mask('0000000000');
    $('input.ID').mask('0000000000');
    $('input.fax').mask('000-000000');
    $('input.numeric').mask('00000000000');
    $('input.money').mask('P999999999999999999999.ZZ', {
        translation: {
            'Z': {pattern: /[0-9]/, optional: true},
            'P': {pattern: /[1-9]/, },
        }});
    //continuar cargando formatos para input
}

function rotateCoin(degree, speed, orientation) {
    $('#moneda').css({WebkitTransform: 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-o-transform': 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-transform': 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-moz-transform': 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-moz-transition': speed + 's'});
    $('#moneda').css({'-moz-transform-style': 'preserve-3d'});
    $('#moneda').css({'-webkit-transition': speed + 's'});
    $('#moneda').css({'-webkit-transform-style': 'preserve-3d'});
    $('#moneda').css({'-o-transition': speed + 's'});
    $('#moneda').css({'-o-transition-style': 'preserve-3d'});
    $('#moneda').css({'-transition': speed + 's'});
    $('#moneda').css({'-transform-style': 'preserve-3d'});
}