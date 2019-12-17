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
// For Login Ajax
$(function () {
    var flag = false;
    var loginResult = $('#login-result');

    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        if( flag === true) {
            return false;
        }

        form            = $(this);
        requestUrl      = form.attr('action');
        requestMethod   = form.attr('method');
        requestData     = form.serialize();

        $.ajax({
            url: requestUrl,
            type: requestMethod,
            data: requestData,
            dataType: 'json',
            beforeSend: function () {
                flag = true;
                $('button').attr('disabled', true);
                loginResult.removeClass().addClass('alert alert-info').html('Sending ...');

            },
            success: function (result) {
                if ( result.errors) {
                    loginResult.removeClass().addClass('alert alert-danger').html(result.errors);
                    $('button').removeAttr('disabled');
                    flag = false;
                } else if (result.success) {
                    loginResult.removeClass().addClass('alert alert-success').html(result.success);

                    setTimeout(function () {
                        if(result.redirect){
                            window.location.href = result.redirect;
                        }
                    }, 1000);
                }
            },
        });
    });


});

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






// Delete Category Update Delete All Category Check If Sub Category is Exist
//
// $(document).on('click','.categoryDelete' , function () {
//    let btn =  $(this);
//    let urlRequest = btn.attr('data-catid');
//    let categoryName = btn.attr('data-catname');
//
//     $('#sureDelete').on('click', function (e) {
//         e.preventDefault();
//         alert(categoryName);
//     })
// });




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
