$(function () {
    jQuery('.fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
//            jQuery.each(data.result.files, function (index, file) {
//                jQuery('<p/>').text(file.name).appendTo(document.body);
//            });
            jQuery.each(data.result.Content, function (index, file){
                jQuery('.preview').remove();
                jQuery('<img class="preview" src=' + file.thumbnail_url + '>').appendTo('#progress')
                //console.log(file.thumbnail_url);
            });
            
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            jQuery('#progress .bar').css(
                'width',
                progress + '%'
            );
        }
    });
//    jQuery('#content-form').submit(function(){
//       jQuery(".fileupload").removeAttr("data-url");
//       return false;
//    });
});

function doSubmit() {
    //jQuery(".fileupload").removeAttr("data-url");
    jQuery('#content-form').submit();
}