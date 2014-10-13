
function ajaxValidarFormulario(options)
{
    $.ajax({
        type: 'POST',
        url: $(options.formId).attr('action'),
        data: $(options.formId).serialize() + '&' + 'ajax=' + options.formId,
        dataType: 'json',
        beforeSend: function (xhr) {
            //Acciones a reaqlizar antes del envio
            if (options.beforeCall)
            {
                options.beforeCall();
            }
        },
        success: function (data) {
            //acciones a realizar cuando la respuesta es positiva 
            if (data.success) {
                //reiniciar elementos
                reloadControlGroup(options.formId);
                //agragar clase success a los elemento si error
                addClassSuccess(options.formId);
                if (options.successCall)
                {
                    options.successCall(data);
                }
            } else {
                //acciones a realizar cuando existen errores
                if (options.errorCall)
                {
                    options.errorCall(data);
                }
                //reiniciar elementos
                reloadControlGroup(options.formId);
//                console.log(options.formId);
                //inicielaizar span help-inline
                formIdpar = options.formId.split('-');
                //capturar el identificador
//                console.log(formIdpar.lenght);
                $count = 0;
                $.each(formIdpar, function (index, element) {
                    ++$count;
                });
                formIdpar[$count - 1] = '';
                formIdent = getLomoCamello(formIdpar);
                console.log(formIdent);
                //mostrar errores

                $.each(data.errors, function (parametro, mensaje) {
                    //elemento con error
                    selectElementoFormError = "form" + options.formId + ' ' + formIdent + "_" + parametro;
                    //agregar la clase error
                    $(selectElementoFormError).parent().parent('div.control-group').addClass('error');
                    //mostrar mensaje de error
                    $(selectElementoFormError + '_em_').html(mensaje[0]);
                    $(selectElementoFormError + '_em_').attr('style', '');
                });
                //agragar clase success a los elemento si error
                addClassSuccess(options.formId);
            }
        }
    });
}
/*
 * fucnion para poner la primera letra de un string en mayúscula
 */
String.prototype.capitalize = function ()
{
    return this.replace(/\w+/g, function (a)
    {
        return a.charAt(0).toUpperCase() + a.slice(1).toLowerCase();
    });
};
function getLomoCamello(arrayElement)
{
    unitElement = '';
    $.each(arrayElement, function (index, elemento) {
        unitElement = unitElement + elemento.capitalize();
    });
    return unitElement;
}
function reloadControlGroup(formId)
{
    //remover clases de validacion de los div.control-group
    $('form' + formId + ' div.control-group').removeClass('success').removeClass('error');
    //remover mensajes de error style
    $('form' + formId + ' span.help-inline').html('');
    $('form' + formId + ' span.help-inline').attr('style', 'display: none');
}
function addClassSuccess(formId) {
    $('form' + formId + ' div.control-group').each(function () {
        if (!$(this).hasClass('error')) {
            $(this).addClass('success');
        }
    });
}
