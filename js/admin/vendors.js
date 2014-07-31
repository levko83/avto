try{
    CKEDITOR.replace(
        'AvtoMarks_description',
        {
            filebrowserBrowseUrl : '/js/elfinder/elfinder.html?type=Images'
        }
    );
}catch(e){}

try{
    CKEDITOR.replace(
        'DisksVendors_description',
        {
            filebrowserBrowseUrl : '/js/elfinder/elfinder.html?type=Images'
        }
    );
}catch(e){}

try{
    CKEDITOR.replace(
        'ShinsVendors_description',
        {
            filebrowserBrowseUrl : '/js/elfinder/elfinder.html?type=Images'
        }
    );
}catch(e){}

$(document).ready(function(){

    $("#delImg").click(function(){
        $("#imgView").removeClass().addClass("hide");
        $("#imgInput").removeClass();
        $("#ytAvtoMarks_image").val("");
        $("#AvtoMarks_delImg").val(1);
        $("#ytShinsVendors_image").val("");
        $("#ShinsVendors_delImg").val(1);
        $("#ytDisksVendors_image").val("");
        $("#DisksVendors_delImg").val(1);
        return false;
    });

});
