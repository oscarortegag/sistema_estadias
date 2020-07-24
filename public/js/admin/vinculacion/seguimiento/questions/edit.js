function onEditOption(){
    Seq.buttons.$button = $(this);
    route.urlName = "getEditOption";
    Seq.buttons.loading();
    Seq.get.html(route.get.url().replace("{id}", $(this).data('id')), fnShowModalEditOption);
}

function fnShowModalEditOption(html){
    var $modal = $('#modal');
    Seq.modal.render(html, $modal);
    Seq.buttons.reset();
}

$(document).ready(function() {
    var $btnEditOption = $('#btnEditOption');
    CKEDITOR.replace('content');
    CKEDITOR.replace('complement');
    $btnEditOption.on('click', onEditOption);

});
