// jqueryの読み込み
// $(function() {...});  HTML要素を全て読み込んだ後から$(function() {...});内の処理を実行します。
$(function() {
    // $('どの要素を処理するか').メソッド()
    $('.dish_name').on('click', function() {    
        // prop
        if ($(this).prop('checked')) {
            // append 追加する
            $('.selected_dishes').append(
                '<div class="mb-3" ' + 
                ' id="select_frame_' + $(this).attr('id') +
                '">' + 
                '<input checked type="checkbox" class="checked_dish"' + 
                'value= "' + $(this).val() +
                '" name="selected_dishes['+ $(this).attr('id') +'][name]">'+ $(this).val() +
                '<br>' +
                '<input checked type="number" name="selected_dishes['+ $(this).attr('id') +'][amount]" value="1">' + 
                '</div>'
            );
        } else {
            $(".selected_dishes input[type='checkbox']").each(function(item) {
                if ($(".selected_dishes input[type='checkbox']")[item].value == $(this).val()) {
                    $(".selected_dishes input[type='checkbox']")[item].parentNode.remove();
                }
            });
        }
    });

    $('.selected_dishes').on('click', '.checked_dish', function() {
        let name = $(this).attr('name');
        let id = name.replace(/[^0-9]/g, '');
        $('#select_frame_' + id).remove();
        $('#'+ id).prop('checked', false);
    });

    $(window).on('load resize', function(){
        if (window.matchMedia('(max-width: 425px)').matches){
            $('#slideToggle').click(function(){
                $(this).toggleClass('clicked');
                $('#select').toggleClass('clicked');
                $('.select-content-bg').toggleClass('clicked');
            });
        }
    });
});