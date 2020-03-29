// ------  Fix CKEditor
<!--<script>-->  // العمل عن طريق الكلاس وليس الاى دى
<!--    for(name in CKEDITOR.instances) {-->
<!--        CKEDITOR.instances[name].destroy();-->
<!--    }-->
<!--    CKEDITOR.replaceAll('myCKEditor');-->
<!--</script>-->



//----------------------------------------------



//-----------Steps To set the active Sidebar Link  -------------
// 1 - Get the current url
// 2 - Get the last segment of the url
// 3 - Add the "active" class to the id of the current url
// - ملاحظة - يضاف مع كل id  كلمة مشتركة مثل (customer-link, ads-link , users-link, category-link)
<!--<script>-->
<!--    let currentUrl = window.location.href;-->
<!--    let segment    = currentUrl.split('/').pop();-->
<!--    $('#' + segment + '-link').addClass('active');-->
<!--</script>-->




//----------------------------------------------------


//-----------breadcrumb---------------
// لينكات تعرف بيها انت موجود بداخل اى صفحة واى قسم





