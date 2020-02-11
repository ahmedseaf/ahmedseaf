//====================================================
//=                                                  =
//=                                                  =
//=                                                  =
//=                     Test                         =
//=                                                  =
//=                                                  =
//====================================================

// For Category Search
$(document).ready(function(){
   $('#search').keyup(function () {
       let query = $(this).val();
       if (query != '') {
           $.ajax({
               url: "http://mvc.com/test/search",
               method: "POST",
               data:{query:query},
               success:function (data) {
                   $('#categoryList').fadeIn();
                   $('#categoryList').html(data);
               }
           }); //End Ajax
       }// End if
       else {
           $('#categoryList').html('');
       }
   }); // End Search Function
    $(document).on('click', 'a', function () {
        $('#search').val($(this).text());
        $('#categoryList').html('');
    })
});















// For Upload Image
// Example tow
$(document).ready(function () {
    loadFile();
    function loadFile() {
        var action = "loadFiles";
        $.ajax({
            url: "http://mvc.com/test/getdata",
            method: "POST",
            data:{action:action},
            success:function (data) {
                $("#allImageView").html(data);
            },

        });
    }//end function loadFile


    $(document).on('submit' , '#formImage', function (e) {
        e.preventDefault();
        var files = $('#uploadFile').val();
        var fileExt = files.split('.').pop().toLowerCase();
        
        if (fileExt != '') {
            if (jQuery.inArray(fileExt,['png', 'jpg', 'mp4' , 'jfif', 'jpeg', 'gif']) == -1){
                    Toast.fire({
                        type: 'warning',
                        title: "Invalid Image Extensions File",
                    });
                $('#uploadFile').val('');
                return false;
            } else {
                $.ajax({
                    url: "http://mvc.com/test/getdata",
                    method: "POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    xhr:function () {
                    var xhrObj = new window.XMLHttpRequest();
                    xhrObj.upload.addEventListener("progress", function (ev) {
                        ev.preventDefault();
                        if (ev.lengthComputable) {
                            var completeProgress = (ev.loaded / ev.total) * 100;
                            completeProgress = Math.round(completeProgress);
                            $('#fillProgress').text(completeProgress + '%');
                            $('#fillProgress').css('width', completeProgress + '%');
                        }
                    }); // end function xhrObj
                        return xhrObj;
                    }// end xhr function
                    ,success:function (data) {
                        loadFile();
                        $('#uploadFile').val('') ;
                        $('#fillProgress').css('width','0%');

                        swal.fire({
                            type: 'success',
                            title: "File Upload ok Successfully",
                            confirmButtonColor: '#3085d6',
                        });
                    }
                });//end ajax for upload after extension
            } // end else for file array
        } // end if fileExt
    }); //End document Submit Form
    // For Delete Image
    $(document).on('click', '#deleteFile', function (e) {
        e.preventDefault();
        btn = this;
        deleteId = $(this).attr('data-deleteFile');
            $.ajax({
                url: deleteId,
                method: "POST",
                dataType: 'json',
                beforeSend:function(){
                    swal.fire({
                        type: 'success',
                        title: "File Deleted Successfully",
                        confirmButtonColor: '#3085d6',
                    });
                }
            });// end Ajax Delete
    });// End On Click Delete Button
    $(document).on("click", '#deleteFile', function () {
        btn = this;
        $(this).parent().fadeOut();
    });

    $(document).on('click', '.imageActive' , function (e) {
        let btn = this;
        let imageName =  $(this).attr('data-radioId');
       // e.preventDefault();

        $.ajax({
            url: "http://mvc.com/test/radio",
            method: "GET",
            data:imageName,
            dataType: 'json',
            contentType:false,
            processData:false

            ,success:function () {
                //loadFile();

            }
        });//end ajax for upload after extension



    })

});










//====================================================
//=                                                  =
//=                                                  =
//=                                                  =
//=                     Work                         =
//=                                                  =
//=                                                  =
//====================================================

//For Login Or Register Or Send Password
$(document).ready(function () {
    $('#login-forget-btn').click(function () {
        $('#user_login-form').hide();
        $('#forget_password-form').show();
    });
    $('#forget-new-acount-btn').click(function () {
        $('#forget_password-form').hide();
        $('#user_register-form').show();
    });
    $('#login-register-btn').click(function () {
        $('#user_login-form').hide();
        $('#user_register-form').show();
    });
    $('#login-btn').click(function () {
        $('#user_register-form').hide();
        $('#user_login-form').show();
    });
    $('#user_login-form').validate();
    $('#user_register-form').validate({
        rules:{
            c_password:{
                equalTo:"#password",
            }
        }
    });
    $('#forget_password-form').validate();


    $('#register').on('click',  function (e) {
        btn = $(this);
        e.preventDefault();
        let registerMessage = $('#result');
        let form            = $('#user_register-form');
        let requestUrl      = form.attr('action');
        let requestMethod   = form.attr('method');
        let requestData     = form.serialize();
        if(document.getElementById('user_register-form').checkValidity()){
            $.ajax({
                url: requestUrl,
                method:requestMethod,
                data: requestData+"&action=register",
                dataType: 'json',
                beforeSend: function () {
                    registerMessage.removeClass().addClass('alert alert-info').html('Sending ...');

                            $('#register').attr('disabled', 'disabled');
                },success: function (result) {
                    $('#register').attr('disabled', false);
                    if ( result.agree) {
                        registerMessage.removeClass().addClass('alert alert-info').html(result.agree);
                    }
                    if ( result.errors) {
                        registerMessage.removeClass().addClass('alert alert-danger').html(result.errors);
                    }else if (result.success) {
                        registerMessage.removeClass().addClass('alert alert-success').html(result.success);

                        setTimeout(function () {
                            if(result.redirectTo){
                                window.location.href = result.redirectTo;
                            }
                        }, 1000);
                    }
                },
            });
        }
        return true;




    }); // End Form Register


    $('#forget').on('click',  function (e) {
        btn = $(this);
        e.preventDefault();
        let forgetMessage = $('#result-forget');
        let form            = $('#forget_password-form');
        let requestUrl      = form.attr('action');
        let requestMethod   = form.attr('method');
        let requestData     = form.serialize();

        if(document.getElementById('forget_password-form').checkValidity()){

            $.ajax({
                url: requestUrl,
                method:requestMethod,
                data: requestData+"&action=forget",
                dataType: 'json',
                beforeSend: function () {
                    forgetMessage.removeClass().addClass('alert alert-info').html('Sending ...');
                },success: function (result) {
                    if ( result.errorEmail) {
                        forgetMessage.removeClass().addClass('alert alert-danger').html(result.errorEmail);
                    }
                    else if ( result.notEmail) {
                        forgetMessage.removeClass().addClass('alert alert-danger').html(result.notEmail);
                    }
                    else if ( result.foundEmail) {
                        forgetMessage.removeClass().addClass('alert alert-danger').html(result.foundEmail);
                    }
                    else if ( result.tokenWait) {
                        forgetMessage.removeClass().addClass('alert alert-danger').html(result.tokenWait);
                    }
                    else if ( result.tokenSend) {
                        forgetMessage.removeClass().addClass('alert alert-danger').html(result.tokenSend);
                    }else if (result.successEmail) {
                        forgetMessage.removeClass().addClass('alert alert-success').html(result.successEmail);
                        setTimeout(function () {
                            if(result.redirect){
                                window.location.href = result.redirect;
                            }
                        }, 9000);
                    }
                },
            });
        }
        return true;
    }); // End Form Forget


        // start Form Login
    $('#login').on('click',  function (e) {
        btn = $(this);
        e.preventDefault();
        let loginMessage = $('#result-login');
        let form            = $('#user_login-form');
        let requestUrl      = form.attr('action');
        let requestMethod   = form.attr('method');
        let requestData     = form.serialize();

        if(document.getElementById('user_login-form').checkValidity()){

            $.ajax({
                url: requestUrl,
                method:requestMethod,
                data: requestData+"&action=login",
                dataType: 'json',
                beforeSend: function () {
                    loginMessage.removeClass().addClass('alert alert-info').html('Sending ...');
            },success: function (result) {
                    if ( result.errors) {
                        loginMessage.removeClass().addClass('alert alert-danger').html(result.errors);
                    } else if (result.success) {
                        loginMessage.removeClass().addClass('alert alert-success').html(result.success);
                        setTimeout(function () {
                            if(result.redirect){
                                window.location.href = result.redirect;
                            }
                        }, 1000);
                    }
                },
            });
        }
        return true;
    }); // End Form Login

});// End Document Login Page


// For Reset Password
$(document).on('click', '#resetPassword', function (e) {
    e.preventDefault();
    let btn = $(this);
    let form = $('#active-password-form');
    let urlRequest = "http://mvc.com/newpassword";
    let data = form.serialize();
    let message = $('#resultPassword');

    $.ajax({
        url: urlRequest,
        method: "POST",
        data: data,
        dataType: "json",
        success:function (data) {
            if(data.errors) {
                message.removeClass().addClass('alert alert-danger').html(data.errors);
            }else if (data.success) {
                message.removeClass().addClass('alert alert-success').html(data.success);
            }if(data.redirect){
                window.location.href = data.redirect;
            }


        }

    });

});

//// For Login Ajax
// $(function () {
//     var flag = false;
//     var loginResult = $('#login-result');
//
//     $('#login-form').on('submit', function (e) {
//         e.preventDefault();
//
//         if( flag === true) {
//             return false;
//         }
//
//         form            = $(this);
//         requestUrl      = form.attr('action');
//         requestMethod   = form.attr('method');
//         requestData     = form.serialize();
//
//         $.ajax({
//             url: requestUrl,
//             type: requestMethod,
//             data: requestData,
//             dataType: 'json',
//             beforeSend: function () {
//                 flag = true;
//                 $('button').attr('disabled', true);
//                 loginResult.removeClass().addClass('alert alert-info').html('Sending ...');
//
//             },
//             success: function (result) {
//                 if ( result.errors) {
//                     loginResult.removeClass().addClass('alert alert-danger').html(result.errors);
//                     $('button').removeAttr('disabled');
//                     flag = false;
//                 } else if (result.success) {
//                     loginResult.removeClass().addClass('alert alert-success').html(result.success);
//
//                     setTimeout(function () {
//                         if(result.redirect){
//                             window.location.href = result.redirect;
//                         }
//                     }, 1000);
//                 }
//             },
//         });
//     });
//
//
// });

// For Data Table

$('#table').DataTable(
    {
        "aaSorting": [],
        "stateSave": true,
        "autoWidth": false,
    }
);




// For Category Modal

$('.categoryModal').on('click', function () {
   btn = $(this);
   url = btn.data('target');
   modalTarget = btn.data('modal-target');

   if($(modalTarget).length > 0) {
       $(modalTarget).modal('show');
   } else {
       $.ajax({
           url: url,
           type: 'POST',
           success: function (html) {
               $('body').append(html);
               $(modalTarget).modal('show');
           },
       });
   }
});



// For Add New Categories
$(document).on('click','.addCategory' , function (e) {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });


    btn = $(this);
    e.preventDefault();
    form = btn.parents('.form-category');
    urlRequest = form.attr('action');
    console.log(form.attr('action'));
    data = new FormData(form[0]);
    message = $('#catMessage');

   $.ajax({
       url: urlRequest,
       data: data,
       type: 'POST',
       dataType: 'json',


       beforeSend: function () {
           message.removeClass().addClass('alert alert-info').html('Loading....');


       },

       success: function (result) {
            if(result.errors) {
                message.removeClass().addClass('alert alert-danger').html(result.errors);
                Toast.fire({
                    type: 'error',
                    title: result.errors,
                });
            }
            if(result.success) {
                message.removeClass().addClass('alert alert-success').html(result.success);




                    Toast.fire({
                        type: 'success',
                        title: result.success,
                });

            }
            setTimeout(function () {
                if(result.redirectTo) {
                    window.location.href = result.redirectTo;
                }
            }, 1000)

       },

       cache:false,
       processData:false,
       contentType:false,
   });
});

//
// $('.toast').toast({
//         autohide: false,
//         show: true,
//         delay:2000,
// });
$('.toast').toast('show' );






// // Delete Category Record
$(document).ready(function () {
    let deleteCategory = $('.categoryDelete');
    deleteCategory.on('click', function () {
        let urldc = $(this).data('catid');
        let deleteAction = "deleteAction";
        console.log(urldc);
        let categoryName =  $(this).data('catname');

        Swal.fire({
            title: 'Are you sure?',
            text: "Are You sure to Delete this Category",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            let urlRequest = urldc;
            let requestData  = {deleteAction:deleteAction};
            if (result.value) {
                $.ajax({
                    url: urlRequest,
                    type: 'POST',
                    data: requestData,
                    dataType: 'JSON',
                    beforeSend: function (re) {


                    }, success: function (data) {
                        if (data.errors) {
                            Swal.fire(
                                'Oops...!',
                                'Category '+categoryName +' '+ data.errors,
                                'error'
                            );
                        }
                        else if (data.success){
                            Swal.fire(
                                'Deleted!',
                                categoryName +' '+ data.success,
                                'success'
                            );
                        }
                        setTimeout(function () {
                            if (data.redirectTo) {
                                window.location.href = data.redirectTo;
                            }
                        },1000)
                    }
                });
            }
        }); //Swal.fire
    }); // On Click

}); // Document





// OPen Modal Add Or Update For Users Groups Form
$('.usersGroupsModal').on('click', function (e) {
    e.preventDefault();


    btn = $(this);
    url = btn.data('target');
    modalTarget = btn.data('modal-target');


        $(modalTarget).modal('show');

        $.ajax({
            url: url,
            type: 'POST',
            success: function (html) {
                $('body').append(html);
                $(modalTarget).modal('show');
            },
        });

});// end On Click Button


//Start Ajax Update Or Edit For Users Groups Form
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
});




$(document).on('click', '.addUsersGroups', function (e) {
    e.preventDefault();
    btn = $(this);
    form = btn.parents('.form-users-groups');
    urlrequest = form.attr('action');
    formMessage = $('.resultMessage');
    data = new FormData(form[0]);
    $.ajax({
        url: urlrequest,
        type:'POST',
        data : data,
        dataType: 'json',
        beforeSend:function () {
            formMessage.removeClass().addClass('alert alert-info').html('Loading.....');
        },success:function (result) {
            if(result.errors) {
                formMessage.removeClass().addClass('alert alert-danger').html(result.errors);
            } else if (result.success) {
                formMessage.removeClass().addClass('alert alert-success').html(result.success);
                Toast.fire({
                    type: 'success',
                    title: result.success,
                });
            }
                setTimeout(function () {

                    if (result.redirectTo) {
                    window.location.href = result.redirectTo;

                    }
                },1000)



        },
        cache:false,
        processData:false,
        contentType:false,
    }); // End Ajax
}); // End Document


// Delete Users Groups Record

$(document).on('click' , '.UserGroupDelete' , function () {
    btn = $(this);

    var usersGroupId = $(this).data('usergroupid');
    var categoryName =  $(this).data('usergroupname');

    Swal.fire({
        title: 'Are you sure?',
        text: "Are You sure to Delete this Group Name",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((resultt) => {
        urlRequest = usersGroupId;

        if (resultt.value) {
            $.ajax({
                url: urlRequest,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function (re) {
                    Swal.fire(
                        'Deleted!',
                        categoryName + ' has been Deleted Successfully',
                        'success'
                    );
                    setTimeout(function () {
                        location.href = 'http://mvc.com/admin/users-groups';

                    }, 1000);
                }, success: function (r) {
                }
            });
        }
    }); //Swal.fire

});






//------------ For Users---------------------



// OPen Modal Add Or Update For Users Form
$('.usersModal').on('click', function (e) {
    e.preventDefault();


    btn = $(this);
    url = btn.data('target');
    modalTarget = btn.data('modal-target');


    $(modalTarget).modal('show');

    $.ajax({
        url: url,
        type: 'POST',
        success: function (html) {
            $('body').append(html);
            $(modalTarget).modal('show');
        },
    });

});// end On Click Button


// Start Ajax Update Or Edit For Users Groups Form


//  For Model Form Add Or Edit In Users
$(document).on('click', '.addUsers', function (e) {
    e.preventDefault();
    btn = $(this);
    form = btn.parents('.form-users');
    urlrequest = form.attr('action');
    formMessage = $('.resultMessage');
    data = new FormData(form[0]);
    $.ajax({
        url: urlrequest,
        type:'POST',
        data : data,
        dataType: 'json',
        beforeSend:function () {
            formMessage.removeClass().addClass('alert alert-info').html('Loading.....');
        },success:function (result) {
            if(result.errors) {
                formMessage.removeClass().addClass('alert alert-danger').html(result.errors);
            } else if (result.success) {
                formMessage.removeClass().addClass('alert alert-success').html(result.success);
                Toast.fire({
                    type: 'success',
                    title: result.success,
                });
            }
            setTimeout(function () {

                if (result.redirectTo) {
                    window.location.href = result.redirectTo;

                }
            },1000)



        },
        cache:false,
        processData:false,
        contentType:false,
    }); // End Ajax
}); // End Document


// Delete Users Groups Record

$(document).on('click' , '.UserDelete' , function () {
    btn = $(this);

    var usersId = $(this).data('userid');
    var userName =  $(this).data('username');

    Swal.fire({
        title: 'Are you sure?',
        text: "Are You sure to Delete this User Name",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((resultt) => {
        urlRequest = usersId;

        if (resultt.value) {
            $.ajax({
                url: urlRequest,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function (re) {
                    Swal.fire(
                        'Deleted!',
                        userName + ' has been Deleted Successfully',
                        'success'
                    );
                    setTimeout(function () {
                        // location.href = 'http://mvc.com/admin/users';
                        history.go();
                    }, 1000);
                }, success: function (r) {
                }
            });
        }
    }); //Swal.fire

});





// Get Data For Select Box Min Sub Category
 $(document).on('change', '#a_category', function () {
        let category_id = $(this).val();
        $.ajax({
            url: "http://mvc.com/admin/min-category/select",
            method:"POST",
            data:{categoryID:category_id},

            success:function (data) {
                $('#sub_category').html(data);
            }
        });

 });



//====================================================
//=                                                  =
//=                  Product Page                    =
//=                                                  =
//====================================================


// ِ Add Options For Product
$(document).ready(function () {
    let count = 0;
    $(document).on('click', '.add', function (e) {
        e.preventDefault();
        count++;
        let html = '' ;
        html += '<tr> <td> <button class="btn btn-outline-danger remove-options"' +
            ' name="remove" id="remove" ><i class="fas fa-trash"></i></button> </td> ' +
            '<td> <select class="form-control" name="option[]" > ' +
            '<option value="color">color</option> <option value="size">size</option> ' +
            '<option value="brand">brand</option> <option value="delivery">delivery</option> ' +
            '</select> ' +
            '</td> ' +
            '<td> <input class="form-control" name="option_description[]" type="text"> ' +
            '</td>' +
            ' </tr>';
        $('tbody').append(html);

        $(document).on('click', '.remove-options', function (r) {
            r.preventDefault();
            $(this).closest('tr').remove();
        })

    });
});

// Remove Options From Database
$(document).on('click', '#remove_options',function (e) {
    e.preventDefault();
    let btn = $(this);
    let optionId = btn.attr('data-optionid');
    let optionName = btn.attr('data-optionname');
    $.ajax({
        url: optionId,
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            Swal.fire(
                'Deleted!',
                optionName + ' has been Deleted Successfully',
                'success'
            );

        }
    });
    $(this).closest('tr').remove();
});

// Sub Categories Select Box
$(document).on('change', '#product_categories', function () {
    let product_category_id = $(this).val();
    $.ajax({
        url: "http://mvc.com/admin/product/getsubcategoy",
        method:"POST",
        data:{categoryID:product_category_id},

        success:function (data) {
            $('#sub_category').html(data);
        }
    });
});


// Min Sub Categories Select Box
$('#sub_category,#product_categories').change('change', function () {
    let category_sub_id = $(this).val();
    $.ajax({
        url: "http://mvc.com/admin/product/getmincategoy",
        method:"POST",
        data:{categorySubID:category_sub_id},

        success:function (data) {
            $('#min_sub_category').html(data);
        }
    });
});


// Product Fave
$('.fave').on('click', function () {
    let productId = $(this).attr('data-product-id');
    let productValue = $(this).is(':checked');

    $.ajax({
        url: "http://mvc.com/admin/product/faveproduct",
        method: "POST",
        data:{product_value:productValue,productID:productId},

    })
});






// For Image Product Edit
$(document).ready(function () {
    urlRequestImage = $('#formImagePro').attr('data-image');
    loadImage();
    function loadImage() {
        $.ajax({
            url:urlRequestImage,
            type:"POST",
            success:function (data) {
                $('#allImageViewPro').html(data);
            }
        });
    }


    $(document).on('submit' , '#formImagePro', function (e) {
        e.preventDefault();
        var files = $('#uploadFilePro').val();
        var fileExt = files.split('.').pop().toLowerCase();
        form = $(this);
        urlRequest = form.attr('action');
        if (fileExt != '') {
            if (jQuery.inArray(fileExt,['png', 'jpg', 'mp4' , 'jfif', 'jpeg', 'gif']) == -1){
                Toast.fire({
                    type: 'warning',
                    title: "Invalid Image Extensions File",
                });
                $('#uploadFilePro').val('');
                return false;
            } else {
                $.ajax({
                    url: urlRequest,
                    method: "POST",
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    xhr:function () {
                        var xhrObj = new window.XMLHttpRequest();
                        xhrObj.upload.addEventListener("progress", function (ev) {
                            ev.preventDefault();
                            if (ev.lengthComputable) {
                                var completeProgress = (ev.loaded / ev.total) * 100;
                                completeProgress = Math.round(completeProgress);
                                $('#fillProgressPro').text(completeProgress + '%');
                                $('#fillProgressPro').css('width', completeProgress + '%');
                            }
                        }); // end function xhrObj
                        return xhrObj;
                    }// end xhr function
                    ,success:function (data) {

                        $('#uploadFilePro').val('') ;
                        $('#fillProgressPro').css('width','0%');
                       // $('#allImageViewPro').html(data);
                        loadImage();


                        swal.fire({
                            type: 'success',
                            title: "File Upload ok Successfully",
                            confirmButtonColor: '#3085d6',
                        });
                    }
                });//end ajax for upload after extension
            } // end else for file array
        } // end if fileExt
    }); //End document Submit Form

    // For Delete Image
    $(document).on('click', '#deleteFilePro', function (e) {
        e.preventDefault();
        btn = this;
        deleteId = $(this).attr('data-deleteFile');
        $.ajax({
            url: deleteId,
            method: "POST",
            dataType: 'json',
            beforeSend:function(){
                swal.fire({
                    type: 'success',
                    title: "File Deleted Successfully",
                    confirmButtonColor: '#3085d6',
                });
            }
        });// end Ajax Delete
    });// End On Click Delete Button
    $(document).on("click", '#deleteFilePro', function () {
        btn = this;
        $(this).parent().fadeOut();
    });

    $(document).on('click', '.imageActivePro' , function (e) {
        let btn = this;
        let imageName = $(this).attr('data-radioId');
        // e.preventDefault();

        $.ajax({
            url: "http://mvc.com/admin/product/radio",
            method: "GET",
            data: imageName,
            dataType: 'json',
            contentType: false,
            processData: false

            , success: function () {
                //loadFile();

            }
        });//end ajax for upload after extension
    });
});






//For Update Or Save Product
$(document).on('click', '#saveProduct', function (e) {
    e.preventDefault();
    let productMessage = $('#messageProduct');
    let btn = $(this);
    let form = btn.parents('.form-product');
    let urlRequest = form.attr('action');
    let requestData  = form.serialize();
    $.ajax({
        url: urlRequest,
        type: 'POST',
        data: requestData,
        dataType: 'json',
        beforeSend:function (data) {
            productMessage.removeClass().addClass('alert alert-info').html('Sending Data....');

        },success:function (data) {

             if (data.errors) {
                productMessage.removeClass().addClass('alert alert-danger').html(data.errors);
            }
             else if (data.success) {
                productMessage.removeClass().addClass('alert alert-success').html(data.success);
                Toast.fire({
                    type: 'success',
                    title: data.success,
                });
             }
            setTimeout(function () {

                if (data.redirectTo) {
                    window.location.href = data.redirectTo;

                }
            },1000)
        }

    })
});





//  Delete Product Record
$(document).ready(function () {
    let deleteCategory = $('.productDelete');
    deleteCategory.on('click', function () {
        let urlRequestProduct = $(this).data('productid');
        let deleteAction = "deleteAction";
        let productName =  $(this).data('productname');

        Swal.fire({
            title: 'Are you sure?',
            text: "Are You sure to Delete this Product",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            let urlRequest = urlRequestProduct;
            let requestData  = {deleteAction:deleteAction};
            if (result.value) {
                $.ajax({
                    url: urlRequest,
                    type: 'POST',
                    data: requestData,
                    dataType: 'JSON',
                    beforeSend: function (re) {


                    }, success: function (data) {
                        if (data.success){
                            Swal.fire(
                                'Deleted!',
                                productName +' '+ data.success,
                                'success'
                            );
                        }
                        setTimeout(function () {
                            if (data.redirectTo) {
                                window.location.href = data.redirectTo;
                            }
                        },1000)
                    }
                });
            }
        }); //Swal.fire
    }); // On Click

}); // Document


$(document).ready(function () {
    $('.MainBtnAdd').on('click', function () {
        let btn = $(this);
        let url = btn.data('target');
        let modalTarget = btn.data('modal-target');

        if($(modalTarget).length > 0) {
            $(modalTarget).modal('show');
        } else {
            $.ajax({
                url: url,
                type: 'POST',
                success: function (html) {
                    $('body').append(html);
                    $(modalTarget).modal('show');
                },
            });
        }
    });
});

$(document).on('click', '#addSlide', function (e) {
    e.preventDefault();
    let btn = $(this);
    let form = btn.parents('.form-slide');
    let urlRequest   = form.attr('action');
    let requestData  = new FormData(form[0]);
    let slideMessage = $('.resultMessage');



    $.ajax({
        url: urlRequest,
        type: 'POST',
        data: requestData,
        dataType: 'json',
        beforeSend:function () {
            slideMessage.removeClass().addClass('alert alert-info').html('Sending Data....');
            console.log(form);
        },success:function (data) {

            if (data.errors) {
                slideMessage.removeClass().addClass('alert alert-danger').html(data.errors);
            }
            else if (data.success) {
                slideMessage.removeClass().addClass('alert alert-success').html(data.success);
                Toast.fire({
                    type: 'success',
                    title: data.success,
                });
            }
            setTimeout(function () {

                if (data.redirectTo) {
                    window.location.href = data.redirectTo;

                }
            },1000)
        },
        cache:false,
        processData:false,
        contentType:false,

    })

});

$(document).ready(function () {

    $('.deleteSlide').on('click', function () {
        let btn = $(this);
        let urlRequestProduct = btn.attr('data-slideId');
        let deleteAction = "deleteAction";


        Swal.fire({
            title: 'Are you sure?',
            text: "Are You sure to Delete this Slide",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            let urlRequest = urlRequestProduct;
            let requestData  = {deleteAction:deleteAction};
            if (result.value) {
                $.ajax({
                    url: urlRequest,
                    type: 'POST',
                    data: requestData,
                    dataType: 'JSON',
                    beforeSend: function (re) {


                    }, success: function (data) {
                        if (data.success){
                            Swal.fire(
                                'Deleted!',
                                 data.success,
                                'success'
                            );
                        }
                        setTimeout(function () {
                            if (data.redirectTo) {
                                window.location.href = data.redirectTo;
                            }
                        },1000)
                    }
                });
            }
        }); //Swal.fire
    }); // On Click

}); // Document


// Start For Contact Page Delete
$(document).on('click', '.contactDelete', function (e) {
    e.preventDefault();
    let btn = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "Are You sure to Delete this Contact",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

        if (result.value) {
            $.ajax({
                url: btn.attr('data-contactid'),
                type: 'POST',
                dataType: 'JSON',
                 success: function (data) {
                    if (data.success){
                        Swal.fire(
                            'Deleted!',
                            data.success,
                            'success'
                        );
                    }
                    setTimeout(function () {

                            window.location.href = btn.attr('data-redirect');

                    },1000)
                }
            });
        }
    }); //Swal.fire

});


// Start Company Delete Page
$(document).on('click', '.CompanyDelete', function (e) {
    e.preventDefault();
    let btn = $(this);
    Swal.fire({
        title: 'Are you sure?',
        text: "Are You sure to Delete this Company",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

        if (result.value) {
            $.ajax({
                url: btn.attr('data-companyid'),
                type: 'POST',
                dataType: 'JSON',
                success: function (data) {
                    if (data.success){
                        Swal.fire(
                            'Deleted!',
                            data.success,
                            'success'
                        );
                    }
                    setTimeout(function () {

                        window.location.href = btn.attr('data-redirect');

                    },1000)
                }
            });
        }
    }); //Swal.fire

});