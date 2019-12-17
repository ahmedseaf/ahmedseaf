
// Start Category
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
        direction: 'left',
        hoverEnabled: false
    });
});


$(".dropdown-trigger").dropdown();

//start Sidebar
$(document).ready(function(){
    $('.sidenav').sidenav();
});

//Toltape
$(document).ready(function(){
    $('.tooltipped').tooltip();
});


$('.chips').chips();
$('.chips-initial').chips({
    data: [{
        tag: 'Apple',
    }, {
        tag: 'Microsoft',
    }, {
        tag: 'Google',
    }],
});

// For Keyword
$('.chips-placeholder').chips({
    placeholder: 'Enter a tag',
    secondaryPlaceholder: '+Tag',
});
$('.chips-autocomplete').chips({
    autocompleteOptions: {
        data: {
            'Apple': null,
            'Microsoft': null,
            'Google': null
        },
        limit: Infinity,
        minLength: 1
    }
});

// Date
$(document).ready(function(){
    $('.datepicker').datepicker();
});



// For Data Table
$('table.data').DataTable(
    {
        "aaSorting": [],
        "stateSave": true
    }
);


// For Select
$(document).ready(function(){
    $('select').formSelect();
});



// $(document).ready(function(){
//     $('.modal').modal();
// });
