// jqueryの読み込み
$(function() {
    $('.dish_name').on('click', function() {    
        if ($(this).prop('checked')) {
            $('.selected_dishes').append(
                '<span>' + 
                '<input checked type="checkbox"' + 
                'value= "' + $(this).val() +
                '" name="selected_dishes['+ $(this).attr('id') +'][name]">'+ $(this).val() +
                '<br>' +
                '<input checked type="number" name="selected_dishes['+ $(this).attr('id') +'][amount]">' + 
                '</span>' + 
                '<br>'
            );
        } else {
            $(".selected_dishes input[type='checkbox']").each(function(item) {
                if ($(".selected_dishes input[type='checkbox']")[item].value == $(this).val()) {
                    $(".selected_dishes input[type='checkbox']")[item].parentNode.remove();
                }
            });
        }
    });
});