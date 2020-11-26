$(document).on('change', '.div-toggle', function() {
    var target = $(this).data('target');
    var show = $("option:selected", this).data('show');
    $(target).children().addClass('hide');
    $(show).removeClass('hide');
});
$(document).ready(function(){
    $('.div-toggle').trigger('change');
});

// $(document).ready(function(){
//     $('#selectAllBoxes').click(function(event){
//         if(this.checked){
//             $('.checkBoxes').each(function(){
//                 this.checked = true;
//             });
//         } else {
//             $('.checkBoxes').each(function(){
//                 this.checked = false;
//             });
//         }
//     });
// });