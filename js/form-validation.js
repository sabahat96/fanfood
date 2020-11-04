$(document).ready(function () {
    $(".accordion-title").click(function () {
        $(".accordion-title").not($(this)).removeClass('active');
        $(this).toggleClass('active');

        $(".accordion-content").not($(this).next(".accordion-content")).slideUp(200);
        $(this).next('.accordion-content').slideToggle(200);
    });
    $(".marketing-next-btn").click(function () {
        $(".three-title").click();
    });
    $(".hardware-next-btn").click(function () {
        $(".fourth-title").click();
    });
    $(".confirm-signup-btn").click(function () {
        $(".six-title").click();
    });

    // --------confirm signup terms & condition sroll function
    $('.myLinkToTop').click(function(e){
        e.preventDefault();
          $('.scrolled-area').animate({
              scrollTop: 10000
          }, 2000);
          if ($(window).width() < 768) {
            $('.scrolled-area').animate({
                scrollTop: 50000
            }, 2000);
          }
      });

    $('ul.tabs li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    })

    //input masking
    $("#card_number").mask("9999 9999 9999 9999", {placeholder: "1234 1234 1234 1234"});
    $("#cvc").mask("999", {placeholder: "CVC"});
    $("#expiry_date").mask("99 / 99", {placeholder: "MM / YY"});


    $('#location-form').validate({
        rules: {
            loc_firstname: {
               required: false
            }
        },
        messages:{
            loc_firstname: {
                required: 'fafaafa'

            }
        },
        invalidHandler: function (event, validator) {
            // 'this' refers to the form
            const errors = validator.numberOfInvalids();
            if (errors) {
                const message = errors == 1
                    ? 'You missed 1 field. It has been highlighted'
                    : 'You missed ' + errors + ' fields. They have been highlighted';
                alert(message)
            } else {
                $("#marketing-accordion").click();
            }
        },
        submitHandler: function(form) {
            $("#marketing-accordion").click();
            return false;
        }
    });
    $('#marketing-form').validate({
        submitHandler: function(form) {
            $("#hardware-accordion").click();
            return false;
        }
    });
    $('#hardware-form').validate({
        submitHandler: function(form) {
            $("#shipping-accordion").click();
            return false;
        }
    });

    $('#shipping-form').validate({
        invalidHandler: function (event, validator) {
            // 'this' refers to the form
            const errors = validator.numberOfInvalids();
            if (errors) {
                const message = errors == 1
                    ? 'You missed 1 field. It has been highlighted'
                    : 'You missed ' + errors + ' fields. They have been highlighted';
                alert(message)
            } else {
                $("#payment-accordion").click();
            }
        },
        submitHandler: function(form) {
            return false;
        }
    });

    $('#payment-form').validate({
        invalidHandler: function (event, validator) {
            // 'this' refers to the form
            const errors = validator.numberOfInvalids();
            if (errors) {
                const message = errors == 1
                    ? 'You missed 1 field. It has been highlighted'
                    : 'You missed ' + errors + ' fields. They have been highlighted';
                alert(message)
            } else {

            }
        },
        submitHandler: function(form) {
            submitPaymentForm(form);
            return false;
        }
    });

    function submitPaymentForm(form){
        const actionUrl=$(form).data('action');
        $.ajax({
            type: 'post',
            url: actionUrl,
            dataType: 'json',
            data: $(form).serialize(),
            cache: false,
            success: function(response){
               const data = JSON.parse(response);
               console.log(data)
            }
        });
    }
})
