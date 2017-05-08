$(function () {
    'use strict';
    $( "#tags" ).autocomplete({
		source: availableTags,
        select: function(event, ui) {
			console.log(ui.item.value);
         //   $('.regions').on('click', function(){
              //  var id = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: urlD,
                    data: {
                        region: ui.item.value,
                        _token: token
                    }
                })
                    .done(function (data) {

                        var result = jQuery.parseJSON(data);
                        var html = '<select class="districts-list">';
                        for(var k in result) {
                            html+= '<option value='+result[k]['id']+'>'+result[k]['name']+'</option>';
                        }
                        html+= '</select>';
                        $('#districts').html(html);
                        $('#districts').parent().show();
                        //console.log('hi');
                    })

           // })
		}
    });
});

$(document).ready(function(){

	/*$('.regions').on('click', function(){
		var id = $(this).val();
		$.ajax({
            method: 'POST',
            url: urlD,
            data: {
                region: id,
                _token: token
            }
        })
			.done(function (data) {

                var result = jQuery.parseJSON(data);
				var html = '<select class="districts-list">';
                for(var k in result) {
                    html+= '<option value='+result[k]['id']+'>'+result[k]['name']+'</option>';
                }
                html+= '</select>';
				$('#districts').html(html);
                $('#districts').parent().show();
				//console.log('hi');
            })
		
	})
*/
    $(document).on('click', '.districts-list', function(){
        var id = $(this).val();
        $.ajax({
            method: 'POST',
            url: urlC,
            data: {
                district: id,
                _token: token
            }
        })
            .done(function (data) {

                var result = jQuery.parseJSON(data);
                var html = '<select class="cities-list">';
                for(var k in result) {
                    html+= '<option value='+result[k]['id']+'>'+result[k]['name']+'</option>';
                }
                html+= '</select>';
                $('#cities').html(html);
                $('#cities').parent().show();

            })

	})
});


