$(document).on('change', '.div-toggle', function() {
    let target = $(this).data('target');
    let show = $("option:selected", this).data('show');
    $(target).children().addClass('hide');
    $(show).removeClass('hide');
});
$(document).ready(function(){
    $('.div-toggle').trigger('change');
});
