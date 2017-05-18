
$(document).ready(function() {
    $('#action-button').click(function(){
       $('html, body').animate({scrollTop:$('#user-data-section').position().top - 40}, 1500);
    });
});

$(document).ready(function() {
    $('#action-button-bs').click(function(){
       $('html, body').animate({scrollTop:$('#user-data-section').position().top - 40}, 1500);
    });
});

$('.example-5 .send').click(function(){
  $(this).parents('.email').addClass('is-sent');
  setTimeout(function(){
    $('.email').removeClass('is-sent');
  }, 1800);
  var name = $('#name_call').val();
  var telephone = $('#telephone_call').val();
    $.ajax({
        method: 'POST',
        url: urlCall,
        data: {
            name: name,
            telephone: telephone,
            _token: token
        }
    })
        .done(function () {
            console.log('hi');
        })
});
