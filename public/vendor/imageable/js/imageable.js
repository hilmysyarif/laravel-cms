/**
 * Удаление фотографии
 *
 * @param element HTML Элемент (Кнопка или ссылка удаления)
 */
function deleteImage(element)
{
    var $preloader = $(element).next('.preloader');

    if ($preloader.length){
        $preloader.show();
    }

    var data = {
        '_method':     'DELETE',
        'model_class': $(element).data('modelClass'),
        'model_id':    $(element).data('modelId')
    };
    $.post($(element).data('requestUrl'), data, function(data){
        $(element).parent().remove();
        console.log(data);
    }, 'json')
    .fail(function(){
        sweetAlert("", "Ошибка при запросе к серсеру", 'error');
    })
    .always(function(){
        if ($preloader.length){
            $preloader.hide();
        }
    });
}