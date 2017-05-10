$(function () {
    'use strict';



    var region_name = '';
    $( "#tags" ).autocomplete({
		source: availableTags,  //get regions
        select: function(event, ui) {
		    region_name = ui.item.value;
            $.ajax({
                method: 'POST',
                url: urlD,
                data: {
                    region: ui.item.value,
                    _token: token
                }
            })
                .done(function (data) {
                    var result = jQuery.parseJSON(data);  //Get districts
                    var result2 = [];
                    $.each(result,function (index,value) {
                        result2.push(value['name']);
                    })
                    $( "#tagsD" ).autocomplete({
                        source: result2,
                        change: function (event, ui) {
                            var val  = $('#tagsD').val();
                            if ($.inArray(val, result2) !== -1){  //districts in array?
                                $.ajax({
                                    method: 'POST',
                                    url: urlC,
                                    data: {
                                        district: ui.item.value,
                                        _token: token
                                    }
                                })
                                    .done(function (data) {
                                        var result3 = jQuery.parseJSON(data);
                                        var result4 = [];
                                        $.each(result3, function (index, value) {
                                            result4.push(value['name']);
                                        })
                                        $("#tagsC").autocomplete({
                                            source: result4,
                                            change: function (event, ui) {
                                                var val3  = $('#tagsC').val();
                                                if ($.inArray(val3, result4) !== -1){

                                                }
                                                else {
                                                    $.ajax({
                                                        method: 'POST',
                                                        url: urlCN,
                                                        data: {
                                                            city: val3,
                                                            district : val,
                                                            _token: token
                                                        }
                                                    })
                                                }
                                            }
                                        })

                                    })


                        }
                        else{

                                $.ajax({
                                    method: 'POST',
                                    url: urlDN,
                                    data: {
                                        district: val,
                                        region : region_name,
                                        _token: token
                                    }
                                })
                                    .done(function () {
                                        var arr = [];
                                        $("#tagsC").autocomplete({
                                            source: arr,
                                            change: function () {
                                                var val2  = $('#tagsC').val();
                                                $.ajax({
                                                    method: 'POST',
                                                    url: urlCN,
                                                    data: {
                                                        city: val2,
                                                        district : val,
                                                        _token: token
                                                    }
                                                })
                                            }
                                        })
                                    })
                            }
                    }
                    })
                })
		}
    });
    $('#tagsA').autocomplete({
        source: [],
        change: function () {
            var vall  = $('#tagsA').val();
            $.ajax({
                method: 'POST',
                url: urlNA,
                data: {
                    address: vall,
                    city_name : $('#tagsC').val(),
                    _token: token
                }
            })
            .done(function (data) {
                $('#address_id').val(data);
            })
        }
    });
});



