$(function () {

// =================================================================
//
//                  Login Form  AJAX
//
// =================================================================

    var flag = false;
    loginResult = $('#login-result');

    $('#login-form').on('submit', function (e) {
        e.preventDefault();
        if (flag === true) {
            return false;
        }
        form = $(this);
        requestUrl      = form.attr('action');
        requestMethod   = form.attr('method');
        requestData     = form.serialize();

        $.ajax({
           url:requestUrl,
           type:requestMethod,
           data: requestData,
           dataType: 'json',
           beforeSend: function () {
             flag = true;
             $('button').attr('disabled', true);
             loginResult.removeClass().addClass('card-panel  light-blue accent-3').html('Logging......');
           } ,
            success: function (result) {

                if(result.errors) {
                    loginResult.removeClass().addClass('card-panel red darken-4').html(result.errors);
                    $('button').removeAttr('disabled')
                    flag = false;
                }
                else if(result.success) {
                    loginResult.removeClass().addClass('card-panel teal lighten-1').html(result.success);

                    setTimeout(function () {
                        if(result.redirect) {
                            window.location.href = result.redirect;
                        }
                    }, 2000)
                }
            }
        });
    });






// =================================================================
//
//                  Start Modal Categories AJAX
// =================================================================

    // Open Modal Category Form
    $('.open-modal').on('click', function (e) {
        btn = $(this);
        e.preventDefault();
        url = btn.data('target'); // for url lik - admin/category/id/12
        modalTarget = btn.data('modal-target'); // for link between the button and modal form

        $.ajax({
            url: url,
            type: 'POST',
            success: function (html) {
                $('body').append(html);
                $(modalTarget).modal();
                $(modalTarget).modal('open');
                // for Select Box
                $(document).ready(function(){
                    $('select').not('.disabled').formSelect();
                });

            },


        });

        return false;
    }); // end open-model


    // For Category Form Insert  Or Update Datat To Database
    $(document).on('click', '#submit-btn', function (e) {
        btn = $(this);
        e.preventDefault();
        form = btn.parents('.form-modal');
        url = form.attr('action');
        data = new FormData(form[0]);
        formResults = form.find('#form-results');

        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function () {
                formResults.removeClass().addClass('card-panel  light-blue accent-3').html('Waiting....');
            },
            success: function (results) {
                if(results.errors) {
                    formResults.removeClass().addClass('card-panel red darken-4').html(results.errors);
                } else if(results.success) {
                    formResults.removeClass().addClass('card-panel teal lighten-1').html(results.success);

                    if(results.redirectTo) {
                        window.location.href = results.redirectTo;
                    }
                }
            },
            cache: false,
            processData: false,
            contentType: false,
        }); //End Ajax
    }); //End Document


    // Delete Category Record
    $('.delete-cat').on('click', function (e) {
        e.preventDefault();
        btn = $(this);
        let c = confirm('هل انت متأكد من حذف هذا القسم .!');
        if(c === true) {
            $.ajax({
                url: btn.data('target'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                     $('#results').removeClass().addClass('card-panel  light-blue accent-3').html('جارى حذف القسم ...');
                },success:function (results) {
                    if (results.success) {
                            $('#results').removeClass().addClass('card-panel teal lighten-1').html(results.success);
                        }
                    setTimeout(function () {
                        if(results.redirectTo) {
                            window.location.href = results.redirectTo;

                        }
                    }, 1000);
                },
            });
        } else {
            return false;
        }
    });


});// End All Function

