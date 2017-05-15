$(function () {
    'use strict';
    var i = 0;


    $('.regions').on('click', function () {
        var id = $(this).val();
        console.log(id)
        $.ajax({
            method: 'POST',
            url: urlD,
            data: {
                region: id,
                _token: token
            }
        })
            .done(function (data) {
                var result = jQuery.parseJSON(data);  //Get districts
                var result2 = [];
                $.each(result, function (index, value) {
                    result2.push(value['name']);
                })
                $("#tagsD").autocomplete({
                    source: result2,
                    change: function (event, ui) {
                        var val = $('#tagsD').val();
                        if ($.inArray(val, result2) !== -1) {  //districts in array?
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
                                            var val3 = $('#tagsC').val();
                                            if ($.inArray(val3, result4) !== -1) {

                                            }
                                            else {
                                                $.ajax({
                                                    method: 'POST',
                                                    url: urlCN,
                                                    data: {
                                                        city: val3,
                                                        district: val,
                                                        _token: token
                                                    }
                                                })
                                            }
                                        }
                                    })

                                })
                        }
                        else {
                            $.ajax({
                                method: 'POST',
                                url: urlDN,
                                data: {
                                    district: val,
                                    region: id,
                                    _token: token
                                }
                            })
                                .done(function () {
                                    var arr = [];
                                    $("#tagsC").autocomplete({
                                        source: arr,
                                        change: function () {
                                            var val2 = $('#tagsC').val();
                                            $.ajax({
                                                method: 'POST',
                                                url: urlCN,
                                                data: {
                                                    city: val2,
                                                    district: val,
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
    })

    $('#tagsA').autocomplete({
        source: [],
        change: function () {
            var vall = $('#tagsA').val();
            console.log(vall);

            $.ajax({
                method: 'POST',
                url: urlNA,
                data: {
                    address: vall,
                    city_name: $('#tagsC').val(),
                    _token: token
                }
            })
                .done(function (data) {
                    console.log(data);
                    $('#address_id').val(data);
                })
        }
    })

    $('.edit-icon').on('click', function () {
        //var address = '';
        $('.address-area').show();
        $('#old-address').remove();
    })

     $('#tagsD').on('keyup',function () {
         var regexp = /^[A-Z]{5,}-{0,1}[A-Z]{1,} R-N.$/;
         var input = this.value;
         if (input.search(regexp) === -1) {
             console.log(input.search(regexp));
             $(this).addClass('input-error');
             $(this).parent().find(".input-error-msg").show().html('Введите данные в виде KOSIVSKUY R-N.');
         }
         else{
             $(this).removeClass('input-error');
             $(this).parent().find(".input-error-msg").hide().html();
         }
         console.log(input)
     })

    $('#tagsC').on('keyup',function () {
        var regexp = /^(S.|M.|SMT.) [A-Z]{2,}-{0,1}\s{0,1}[A-Z]{1,}\s{0,1}[A-Z]{0,}$/;
        var input = this.value;
        if (input.search(regexp) === -1) {

            $(this).addClass('input-error');
            $(this).parent().find(".input-error-msg").show().html('Введите данные в виде S. HERMAKIVKA');
        }
        else{
            $(this).removeClass('input-error');
            $(this).parent().find(".input-error-msg").hide().html();
        }
        console.log(input);
        console.log(input.search(regexp));
    })

    $('#tagsA').on('keyup',function () {
        var regexp = /^(VYL.|PROS.|PROV.|PL.|BL.) [A-Z]{2,}-{0,1}\s{0,1}[A-Z]{1,}\s{0,1}[0-9]{1,}\/{0,1}[1-9]{0,}$/;
        var input = this.value;
        if (input.search(regexp) === -1) {

            $(this).addClass('input-error');
            $(this).parent().find(".input-error-msg").show().html('Введите данные в виде VYL. HOLOVNA 98/21');
        }
        else{
            $(this).removeClass('input-error');
            $(this).parent().find(".input-error-msg").hide().html();
        }
        console.log(input);
        console.log(input.search(regexp));
    })

    $('#name').on('keyup',function () {
        var regexp = /^[A-Z]{2,}-{0,1}\s{0,1}[A-Z]{1,}-{0,1}\s{0,1}[A-Z]{0,}$/;
        var input = this.value;
        if (input.search(regexp) === -1) {

            $(this).addClass('input-error');
            $(this).parent().find(".input-error-msg").show().html('Введите данные в виде IVANOV IVAN');
        }
        else{
            $(this).removeClass('input-error');
            $(this).parent().find(".input-error-msg").hide().html();
        }
        console.log(input);
        console.log(input.search(regexp));
    })

    $('#phone').on('keyup',function () {
        var regexp = /^\+(?:\d(?:\(\d{3}\)|-\d{3})-\d{3}-(?:\d{2}-\d{2}|\d{4})|\d{12})$/;
        var input = this.value;
        if (input.search(regexp) === -1) {

            $(this).addClass('input-error');
            $(this).parent().find(".input-error-msg").show().html('Введите данные в виде +380123456789');
        }
        else{
            $(this).removeClass('input-error');
            $(this).parent().find(".input-error-msg").hide().html();
        }
        console.log(input);
        console.log(input.search(regexp));
    })

    $('.visas').on('click', function () {
        var id = $(this).val();
        if((id == 1)||(id==2)){
            $('#status').css('display','block');
            $('#pole').css('display','block');
            $('#client').css('display','block');
            $('#payment').css('display','block');
            $('#prepayment').css('display','block');
            $('#parent1').css('display','block');
            $('#parent2').css('display','block');
            $('#data_start').css('display','block');
            $('#data_finish').css('display','block');

            $('#lenght').css('display','none');
            $('#data_output').css('display','none');
            $('#home').css('display','none');
            $('#plus').css('display','none');
            $('#data_start1').css('display','none');
            $('#data_finish1').css('display','none');
            $('#data_start2').css('display','none');
            $('#data_finish2').css('display','none');
            $('#data_start3').css('display','none');
            $('#data_finish3').css('display','none');
            $('#data_start4').css('display','none');
            $('#data_finish4').css('display','none');
            $('#plus-btn').css('display','none');
            i = 0;
        }
        if(id==3){
            $('#status').css('display','block');
            $('#pole').css('display','block');
            $('#client').css('display','block');
            $('#payment').css('display','block');
            $('#prepayment').css('display','block');
            $('#data_start').css('display','block');
            $('#data_finish').css('display','block');
            $('#lenght').css('display','block');
            $('#data_output').css('display','block');
            $('#plus').css('display','block');

            $('#parent1').css('display','none');
            $('#parent2').css('display','none');
            $('#home').css('display','none');
        }
        if(id == 4){
            $('#status').css('display','block');
            $('#pole').css('display','block');
            $('#client').css('display','block');
            $('#payment').css('display','block');
            $('#prepayment').css('display','block');
            $('#parent1').css('display','block');
            $('#parent2').css('display','block');
            $('#home').css('display','block');

            $('#lenght').css('display','none');
            $('#plus').css('display','none');
            $('#data_output').css('display','none');
            $('#data_start').css('display','none');
            $('#data_finish').css('display','none');
            $('#data_start1').css('display','none');
            $('#data_finish1').css('display','none');
            $('#data_start2').css('display','none');
            $('#data_finish2').css('display','none');
            $('#data_start3').css('display','none');
            $('#data_finish3').css('display','none');
            $('#data_start4').css('display','none');
            $('#data_finish4').css('display','none');
            $('#plus-btn').css('display','none');
            i=0;
        }
    })
$('#plus-fa').on('click',function () {
    i++;
    $('#date_'+i).css('display','block');
    $('#plus-btn').css('display','block');
    $('#w'+i).css('display','block');
})

    $('#text_day').on('click',function () {
        var date11 = document.getElementById('datastart1').value;
        var date12 = document.getElementById('datafinish1').value;
        var date21 = document.getElementById('datastart2').value;
        var date22 = document.getElementById('datafinish2').value;
        var date31 = document.getElementById('datastart3').value;
        var date32 = document.getElementById('datafinish3').value;
        var date41 = document.getElementById('datastart4').value;
        var date42 = document.getElementById('datafinish4').value;
        var date = 0;
        var dn = 0;
        if((Date.parse(date12)-Date.parse(date11))>0){
            date += Date.parse(date12)-Date.parse(date11);
            dn++;
        }
        if((Date.parse(date22)-Date.parse(date21))>0){
            date += Date.parse(date22)-Date.parse(date21);
            dn++;
        }
        if((Date.parse(date32)-Date.parse(date31))>0){
            date += Date.parse(date32)-Date.parse(date31);
            dn++;
        }
        if((Date.parse(date42)-Date.parse(date41))>0){
            date += Date.parse(date42)-Date.parse(date41);
            dn++;
        }

        $(this).html(date/86400/1000+dn + ' дн.');

    })
    $('#ch1').on('click',function () {
        if($('#ch2').is(":checked")){
            $('#ch2').prop("checked", false);
        }
    })

    $('#ch2').on('click',function () {
        if($('#ch1').is(":checked")){
            $('#ch1').prop("checked", false);
        }
    })

    $('#parent_m').on('keyup',function () {
        var regexp = /^[A-Z]{2,}$/;
        var input = this.value;
        if (input.search(regexp) === -1) {

            $(this).addClass('input-error');
            $(this).parent().find(".input-error-msg").show().html('Введите данные в виде OLGA');
        }
        else{
            $(this).removeClass('input-error');
            $(this).parent().find(".input-error-msg").hide().html();
        }
        console.log(input);
        console.log(input.search(regexp));
    })
    $('#parent_f').on('keyup',function () {
        var regexp = /^[A-Z]{2,}$/;
        var input = this.value;
        if (input.search(regexp) === -1) {

            $(this).addClass('input-error');
            $(this).parent().find(".input-error-msg").show().html('Введите данные в виде IVAN');
        }
        else{
            $(this).removeClass('input-error');
            $(this).parent().find(".input-error-msg").hide().html();
        }
        console.log(input);
        console.log(input.search(regexp));
    })

})
