function abre_modal(id){
    route.urlName = "getEditOption";
    Seq.get.html(route.get.url().replace("{id}", id), fnShowModalEditOption);
}

function fnShowModalEditOption(html){
    var $modal = $('#modal');
    Seq.modal.render(html, $modal);
    Seq.buttons.reset();
}

$(document).ready(function() {
    CKEDITOR.replace('content');
    CKEDITOR.replace('complement');
});
