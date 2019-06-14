$(document).ready(function () {
    var doc = $(document);
    doc.on('click','.remove-item-list',function () {
       $(this).closest('.item-list').remove();
    });
    doc.on('click','.add-more-item',function () {
        $('.add-more-item-list').append('<tr class="item-list">\n' +
            '                                        <th><input type="text" class="form-control" placeholder="Type" name="type"></th>\n' +
            '                                        <td><input type="text" class="form-control" value="0" name="bedroom"></td>\n' +
            '                                        <td><input type="text" class="form-control" value="0" name="bathroom"></td>\n' +
            '                                        <td><input type="text" class="form-control" value="0" name="floor"></td>\n' +
            '                                        <td><input type="text" class="form-control" value="0" name="packing"></td>\n' +
            '                                        <td><input type="text" class="form-control" value="0" name="width"></td>\n' +
            '                                        <td><button class="btn btn-dark remove-item-list">Remove</button></td>\n' +
            '                                    </tr>');
    });
    doc.on('click','.main-item',function () {
        var type = $(this).attr('type');
        $('.main-item').removeClass('active');
        $(this).addClass('active');
        switch (type){
            case "project":
                $('.project').show();
                $('.property').hide();
            break;
            case "property":
                $('.project').hide();
                $('.property').show();
            break;
        }
    });
    doc.on('change','input[name="thumbnail"]',function () {
       var file =  $(this).prop('files');
       var check = false;
        var obj = $(this).closest('.row');
       getBase64(file,'.review-image',this,'image');
        obj.find('.select-image').hide();
        obj.find('.review-image').show();
        obj.find('.loading').show();
    });
    doc.on('change','input[name="gallery-image"]',function () {
        var file =  $(this).prop('files');
        var check = false;
        var obj = $(this).closest('.row');
         getBase64(file,'.review-image',this,'gallery');
        obj.find('.select-image').hide();
        obj.find('.review-image').show();
        obj.find('.loading').show();
    });
    doc.on('click','.remove-button',function () {
       var obj = $(this).closest('.row');
        obj.find('.review-image').html("");
        $(this).addClass('showoff').removeClass('showon');
        obj.find('.select-image').show();

    });
    doc.on('click','.close-f1',function () {
        var len = $(this).closest('.review-image').find('.image-plus').length;
    if(len-1>0){
        $(this).closest('.image-plus').remove();
    }else{
        $(this).closest('.row').find('.select-image').show();
        $(this).closest('.image-plus').remove();

    }

    });
    doc.on('click','.add-more-tower-button',function () {
        $('.tower-result').append('<div class="row">\n' +
            '                                         <div class="col-12 col-sm-4">\n' +
            '                                          <div class="position-relative form-group">\n' +
            '                                        <div class="input-group">\n' +
            '                                            <input type="text" class="form-control">\n' +
            '                                            <div class="input-group-prepend">\n' +
            '                                                <span class="input-group-text" id="basic-addon2">Remove</span>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                              </div>\n' +
            '                                    </div>\n' +
            '                                             </div>');
    });
    function getBase64(file,element,THIS,type) {
        if(file.length>1){

            for(var i=0;i<file.length;i++) {

                var reader = new FileReader();
                reader.readAsDataURL(file[i]);
                reader.onload = function (e) {
                    var obj = $(THIS).closest('.row');
                    obj.find('.loading').hide();
                    obj.find(element).append('<span class="image-plus" style="position: relative;display: inline-block"><img src="'+ e.target.result+'" style="width: 100px;">' +
                        '<span class="close-f close-f1"><i class="fas fa-close"></i></span></span>');

                };
                reader.onerror = function (error) {
                    console.log('Error: ', error);
                };
            };
        }else{
            var reader1 = new FileReader();
            reader1.readAsDataURL(file[0]);
            reader1.onload = function (e){
                var obj = $(THIS).closest('.row');
                obj.find('.loading').hide();
                if(type=="gallery"){
                    obj.find(element).append('<span class="image-plus" style="position: relative;display: inline-block"><img src="'+ e.target.result+'" style="width: 100px;">' +
                        '<span class="close-f close-f1"><i class="fas fa-close"></i></span></span>');
                }else{
                    obj.find('.remove-button').addClass('showon').removeClass('showoff');
                    obj.find(element).append('<img src="'+ reader1.result +'" style="100%">');
                }

            };
            reader1.onerror = function (error) {
                console.log('Error: ', error);
            };
        }




    }
    doc.on('change','select[name="projectType"]',function () {
        var type = $(this).val();
        switch (type){
            case "Condo":      defa(); $('.tower').show();   break;
            case "Apartment":  defa(); $('.sale-rent').hide(); $('.apartment-option').show();   break;
            default :          defa();
        }
        function defa() {
            $('.tower').hide();
            $('.sale-rent').show();
            $('.apartment-option').hide();
        }

    });
    doc.on('click','.add-more-borhood',function () {
        $(this).closest('.card-body').find('.add-more-item-list').append('<tr><th><input type="text" class="form-control" placeholder="Address" name="address"></th><th><input type="number" class="form-control"  name="address" value="0"></th></tr>');
    });
    doc.on('change','#property-type-select',function () {
     var data  = $(this).val();

     if(data!="Land"){
         $('.more-property').show();
     }else{
         $('.more-property').hide();
     }
    });

});
