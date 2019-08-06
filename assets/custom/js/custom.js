$(document).ready(function () {
    var tokent = $('meta[name="csrf_token"]').attr('content');
    var curren_url = window.location.href.split('?')[0] + "?";
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
            '                                        <td><input type="text" class="form-control" value="0" name="height"></td>\n' +
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
       var c = getBase64(file,'.review-image',this,'image');
       if(c!="error"){
           obj.find('.select-image').hide();
           obj.find('.review-image').show();
           obj.find('.loading').show();
       }


    });
    doc.on('change','input[name="gallery-image"]',function () {
        var file =  $(this).prop('files');
        var check = false;
        var obj = $(this).closest('.row');
        var c =  getBase64(file,'.review-image',this,'gallery');
        if(c!="error"){
        obj.find('.select-image').hide();
        obj.find('.review-image').show();
        obj.find('.loading').show();}
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
            '                                            <input type="text" class="form-control tower-item">\n' +
            '                                            <div class="input-group-prepend">\n' +
            '                                                <span class="input-group-text" id="basic-addon2">Remove</span>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                              </div>\n' +
            '                                    </div>\n' +
            '                                             </div>');
    });

    function getBase64(file,element,THIS,type) {
        var name;

        if(file.length>1){
            for(var i=0;i<file.length;i++) {
                var type1  = file[i].type.substr('6',file[i].length);
                if(type1 =="jpg"||type1=="jpeg" || type1=="png"){
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
                }else{
                    notification('Invalid Type Support Only (JPG|PNG|JPEG)','error');
                    return "error";
                }
            };
        }else{
            var type2  = file[0].type.substr('6',file[0].length);
            if(type2 =="jpg"||type2=="jpeg" || type2=="png") {
                var reader1 = new FileReader();
                reader1.readAsDataURL(file[0]);
                reader1.onload = function (e) {
                    var obj = $(THIS).closest('.row');
                    obj.find('.loading').hide();
                    if (type == "gallery") {
                        obj.find(element).append('<span class="image-plus" style="position: relative;display: inline-block"><img src="' + e.target.result + '" style="width: 100px;">' +
                            '<span class="close-f close-f1"><i class="fas fa-close"></i></span></span>');
                    } else {
                        obj.find('.remove-button').addClass('showon').removeClass('showoff');
                        obj.find(element).append('<img src="' + reader1.result + '" style="100%">');
                    }

                };
                reader1.onerror = function (error) {
                    console.log('Error: ', error);
                };
            }else{
                notification('Invalid Type Support Only (JPG PNG JPEG)','error');
                return "error";
            }
        }




    }
    function base64(file,element){
        var reader1 = new FileReader();
        reader1.readAsDataURL(file[0]);
        reader1.element = element;
        $(element).addClass('loading-background');
        reader1.onload = function (e) {
            $(element).removeClass('loading-background');
           $(element).css('background-image','url('+ e.target.result +')');

        }
        /*(function (e) {
            console.log(element+','+e   .target.result);
        });*/
    };
    doc.on('change','select[name="projectType"]',function () {
        var type = $(this).val();
        switch (type){
            case "condo":      defa(); $('.tower').show();   break;
            case "apartment":  defa(); $('.sale-rent').hide(); $('.apartment-option').show();   break;
            default :          defa();
        }
        function defa() {
            $('.tower').hide();
            $('.sale-rent').show();
            $('.apartment-option').hide();
        }

    });
    doc.on('click','.add-more-borhood',function () {
        $(this).closest('.card-body').find('.add-more-item-list').append('<tr><th><input type="text" class="form-control address-property" placeholder="Address" name="address"></th><th><input type="number" class="form-control distance-property" value="0"></th></tr>');
    });
    doc.on('change','#property-type-select',function () {
     var data  = $(this).val();

     if(data!="Land"){
         $('.more-property').show();
     }else{
         $('.more-property').hide();
     }
    });

    /* Fillter Function */
    doc.on('click','.filter-action',function () {
       $('.filter-blog').slideToggle(300);
    });

    /* End Filter Function */

    /* Add Image new Event Page*/

    doc.on('change','.new-event-image',function () {
        var file = $(this).prop('files');
        base64(file,".receive-background");
    });


    /* End Add Image new Event Page*/


    /* Update Profile */
   /* doc.on('click','.click-change-main',function () {
        var obj = $(this);
        obj.find('.old-name').hide();
        obj.find('.input-change').show();
        obj.find('.click-change').hide();
    });*/
    doc.on('click','.click-change',function () {
        var obj = $(this).closest('.row');
        obj.find('.old-name').hide();
        obj.find('.input-change').show();
        $(this).hide();
    });
    doc.on('click','.cancel-change',function () {
        var obj = $(this).closest('.row');
        obj.find('.old-name').show();
        obj.find('.input-change').hide();
        obj.find('.click-change').show();
    });
    doc.on('click','.action-change',function () {
        var type  =$(this).attr('type');
        var url   =$('.change-profile').attr('datasrc');
        var tokent = $('meta[name="csrf_token"]').attr('content');
        var THIS = $(this);
        var data = {};
        switch (type) {
            case 'name':
                var first = $('input[name="first"]').val();
                var last  = $('input[name="last"]').val();
                    data = {_token:tokent,first:first,last:last,type:type};
                break;
            case 'phone_number' :
                var phone_number = $('input[name="phone_number"]').val();
                data = {_token:tokent,phone_number:phone_number,type:type};
                break;
        }


        loadingmode('on');
        $.ajax({
            url:url,
            type:"PUT",
            data:data,
            success:function (data) {
                if(data.status=="ok"){
                    notification(data.message,'ok');
                    switch (type) {
                        case  "name" :
                            THIS.closest('.row').find('.old-name').html(first+" "+last).show();
                        break;
                        case  "phone_number" :
                            THIS.closest('.row').find('.old-name').html(phone_number).show();
                            break;
                    }
                    THIS.closest('.row').find('.click-change').show();
                    THIS.closest('.row').find('.input-change').hide();



                }else{
                    notification('Upload Unsuccess','false');
                }
                loadingmode('off');

            },
            error:function (error) {
                loadingmode('off');
                console.error(error);
                notification("Something Error",'false');

                
            }

        });
    });
    var l=0;
    function sw(num) {
        l=l+num;
       if(l==1){
           loop();

       }

    }
var i=0;
    function loop() {
        var len = $('.notification').find('.noti-item').length;
        if (len >= 1) {
            setTimeout(function () {
                $('.notification').find('.noti-item:eq(0)').fadeOut();
                setTimeout(function () {
                    $('.notification').find('.noti-item:eq(0)').remove();
                }, 300);
                loop();
            },10000);

        }else{
            l=0;
        }

    };
    function notification(message,status) {
      if(status=="ok"){
            $('.notification').append(' <div class="noti-item success slider-down-in">\n' +
                '        <div class="row m-0">\n' +
                '            <div class="col-11 p-0 m-0">'+ message +'</div>\n' +
                '            <div class="col-1 p-0 m-0" style="text-align: center;cursor: pointer;padding: 5px;"><span class="close-noti-item">x</span></div>\n' +
                '        </div>\n' +
                '    </div>');
      }else{
          $('.notification').append(' <div class="noti-item unsuccess slider-down-in">\n' +
              '        <div class="row m-0">\n' +
              '            <div class="col-11 p-0 m-0">'+ message +'</div>\n' +
              '            <div class="col-1 p-0 m-0" style="text-align: center;cursor: pointer;padding: 5px;"><span class="close-noti-item">x</span></div>\n' +
              '        </div>\n' +
              '    </div>');
      }
        sw(1);

    }
    function loadingmode(sw) {
        if(sw=="on"){
            $('#loading').fadeIn();
        }else{
            $('#loading').fadeOut();
        }
    }
    doc.on('click','.close-noti-item',function () {
       var obj =  $(this).closest('.noti-item');
       obj.addClass('slider-down');
        setTimeout(function () {
            obj.remove();
        },800);
    });
    doc.on('change','#profile-image',function () {
        var url = $(this).attr('datasrc');
        var file = $(this).prop('files');
        if(file.length==1){
            var formData = new FormData();
            formData.append('userImage',file[0]);
            formData.append('_token',tokent);
            loadingmode('on');
            $.ajax({
                url:url,
                type:'POST',
                data:formData,
                processData:false,
                contentType:false,
                enctype: 'multipart/form-data',
                success:function (e) {
                    var json  = JSON.parse(e);
                  if(json.status_code==200){
                      $('.profile-image').css('background-image','url('+ json.result.image +')');
                      notification('Success to Change Image','ok');
                      loadingmode('off');
                  }else{
                      notification('can`t Change Profile Image','false');
                  }
                },
                error:function (eror) {
                    console.log(eror);
                    loadingmode('off');
                    notification('can`t Change Profile Image','false');
                }
            })

        }


    })
    /* End Update Profile*/


    /* User Page */
    doc.on('click','.page-active-click',function (e) {
        e.preventDefault();
        var url  = $(this).attr('href');
        loadingmode('on');
        var paramat = window.location.href.split('?');
        if(paramat.length>=2){
            window.history.pushState({},'',url+"?"+paramat[1]);
            $.get(url+"?"+paramat[1],{},function (data) {
                loadingmode('off');
                $('.change-row').html($(data).find('.change-row').html());

            });
        }else{
            window.history.pushState({},'',url);
            $.get(url,{},function (data) {
                loadingmode('off');
                $('.change-row').html($(data).find('.change-row').html());

            });
        }




    });
    function get_link(limit=null,type=null,search=null){
        var link =[];
        if(limit!=null){
            link.push("limit="+limit);
        }else if($.urlParam('limit')!=null){
            link.push("limit=" + $.urlParam('limit')[1]);
        }

        if(type!=null && type!==0){
            link.push("type="+type);
        }else if($.urlParam('type')!=null && type==null){
            link.push("type=" + $.urlParam('type')[1]);
        }

        if(search!=null){
            link.push("search="+search);
        }else if($.urlParam('search')!=null){
            link.push("search="+ $.urlParam('search')[1]);
        }
            return link.join('&');

    }
    doc.on('change','select[name="show-select"]',function () {
        var option = $(this).val();
        var url = window.location.href.split('?')[0];
        var link = get_link(option);
        loadingmode('on');
        window.history.pushState({},'',"?"+link);
        $.get(url+"?"+link,{},function (data) {
            $('.change-row').html($(data).find('.change-row').html());
            loadingmode('off');

        });


    });
    doc.on('change','select[name="type"]',function () {
        var option = $(this).val();
        var url = window.location.href.split('?')[0];
        if(option==''){
            option = 0;
        }
        var link = get_link(null,option);

        loadingmode('on');
        window.history.pushState({},'',"?"+link);


        $.get(url+"?"+link,{},function (data) {
            $('.change-row').html($(data).find('.change-row').html());
            loadingmode('off');
        });

    });

    /* End User Page */
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return results;
    }
    doc.on('click','.list-search .item',function (e) {
      var text =   $(this).text();
        search_mode(text);

    });
    doc.on('keydown','.search-user-option',function (e) {
        var search = $(this).val();
        var url = $(this).attr('datasrc');
        $('.search-load').fadeIn(300);
        if(search!=""){


       $.post(url,{_token:tokent,search:search},function (data) {
           if(data!="false"){
               $('.list-search').html('');
               data.forEach(function (data,i) {
                   $('.list-search').append('<li class="item" itemtype="'+ i +'">'+ data +'</li>');
               });
               $('.search-load').fadeOut(300);
               var len = $('.list-search').find('.item').length;
               if(len>0){
                   $('.list-box').fadeIn(200);
               }else{
                   $('.list-box').fadeOut(200);
               }
           }else{
               $('.list-box').fadeOut(200);
           }

       }).fail(function (errro) {
           console.log(errro);

       })
        }else{
            $('.list-search').html('');
            $('.list-box').fadeOut(200);
            $('.search-load').fadeOut(300);
        }
        
    });
    doc.on('click','.search-button-click',function () {
        var search = $('.search-user-option').val();
        search_mode(search);
    });
    doc.on('keydown','.search-user-option',function (e) {
        if(e.key=="ArrowDown"){
            change_type(1);
        }
        if(e.key=="ArrowUp"){
            change_type(-1);
        }
        if(e.key=="Enter"){
            search_mode($(this).val());
        }
    });
doc.on('click','.test',function () {
   /* var str = '{"result":{"id":86,"status":false,"title":"123","country":"Cambodia","city":"Phnom Penh","price":123.0,"description":"<p>123</p>","thumbnail":null,"grr":123.0,"favorite":false,"user":{"id":12,"gender":null,"email":"vira.pha@zillennium.com","role":null,"first_name":"vira","last_name":"pha","phone_number":"086483336","photo":"https://app.c21apex.com/api/user/image/84f8b78b-2c97-40b2-94f2-dfa57ea935f4pexels-photo-556416.jpeg","account_type":"origin"},"rent_or_buy":"sale","address_1":"123","address_2":"123","sqm_price":123.0,"avg_annual_rent_from":0.0,"avg_annual_rent_to":0.0,"down_payment":"12","project_type":null,"introductions":[{"id":98,"name":"123","description":"<p>123</p>"}],"galleries":[],"property_types":[],"tower_type":[],"built_date":"2019-06-26T00:00:00.000+0000","completed_date":"2019-06-26T00:00:00.000+0000"},"status_code":200,"status":"OK"}';
    var url = "http://localhost/project/admin/add-image";
    var id = prompt('Please Enter ID');
   upload_image(str,url,id);*/
   var type  = $('.main-item.active').attr('type');
});
function upload_image(result,url,id) {
    var img_lan = $('.review-image').find('img').length;
    $.ajaxSetup({
        processData:false,
        contentType:false,
        enctype: 'multipart/form-data',
    });

    var file     = $('input[name="thumbnail"]').prop('files');
    var formdata = new FormData();
    var len_thumbnail = $('.review-image').find('img').length;
    if(len_thumbnail>0){
        var base64thum = $('.review-image').find('img').attr('src');
        formdata.append('thumbnail',dataURLtoFile(base64thum,randomstr(20)));
        var thumbnail = dataURLtoFile(base64thum,randomstr(20));
        var type = thumbnail.type.substr(6,thumbnail.type.length);

        var thumbnail1 = dataURLtoFile(base64thum,randomstr(20)+"."+type);
        formdata.append('thumbnail',thumbnail1);


    }
    formdata.append('_token',tokent);
    formdata.append('length_thum',file.length);
    formdata.append('id',id);
    if(img_lan){
        /* Image Gallery */
        var gallery_len =  $('.image-plus').length;
        if(gallery_len>0){
            for(var i=0;i<gallery_len;i++){
                var base64 =  $('.image-plus:eq('+ i +')').find('img').attr('src');
                var type_image = dataURLtoFile(base64,randomstr(20));
                var type1 = type_image.type.substr(6,type_image.type.length);

                var gallery1 = dataURLtoFile(base64,randomstr(20)+"."+type1);
                formdata.append('gallery[]', gallery1);

            }
            formdata.append('length_gallery',gallery_len);
            /* End Image Gallery*/
        }else{
            console.log('Gallery Not Found');
        }

    }
        loadingmode('on');
     $.post(url,formdata,function (data) {
         var json = JSON.parse(data);
         if(json.status=="OK"){
            notification('Insert Success !!!','ok');
         }
         loadingmode('off');

     }).fail(function (error) {
         loadingmode('off');
         console.log(error);
         var message =  error.responseJSON;
         if(typeof message.errors.gallery!="undefined"){
             notification(message.errors.gallery,'error');
         }
         if(typeof message.errors.thumbnail!="undefined"){
             notification(message.errors.thumbnail,'error');
         }
         if(typeof message.gallery !="undefined"){
            console.error(message.gallery);
         }
         if(typeof message.thumbnail !="undefined"){
             console.error(message.thumbnail);
         }

     })

}
function validation(json=[]){
    var message = [];

    if(typeof json.pro_title!="undefined"){
        $('.project-title').addClass('has-error');
        $('.project-title').closest('.row').find('.has-error-text').text(json.pro_title).show();
        message.push("* "+json.pro_title);
    }else{
        $('.project-title').removeClass('has-error');
        $('.project-title').closest('.row').find('.has-error-text').hide();

    }
    if(typeof  json.buil_date !="undefined"){
        $('.buil-date').addClass('has-error');
        $('.buil-date').closest('.row').find('.has-error-text').text(json.buil_date).show();
        message.push("* "+json.buil_date);
    }else{
        $('.buil-date').removeClass('has-error');
        $('.buil-date').closest('.row').find('.has-error-text').hide();
    }
    if(typeof  json.grr !="undefined"){
        $('.grr').addClass('has-error');
        $('.grr').closest('.row').find('.has-error-text').text(json.grr).show();
        message.push("* "+json.grr);
    }else{
        $('.grr').removeClass('has-error');
        $('.grr').closest('.row').find('.has-error-text').hide();
    }
    if(typeof  json.country !="undefined"){
        $('.country-select').addClass('has-error');
        $('.country-select').closest('.col-12').find('.has-error-text').text(json.country).show();
        message.push("* "+json.country);
    }else{
        $('.country-select').removeClass('has-error');
        $('.country-select').closest('.col-12').find('.has-error-text').hide();
    }
    if(typeof  json.city !="undefined"){
        $('.city-select').addClass('has-error');
        $('.city-select').closest('.col-12').find('.has-error-text').text(json.city).show();
        message.push("* "+json.city);
    }else{
        $('.city-select').removeClass('has-error');
        $('.city-select').closest('.col-12').find('.has-error-text').hide();
    }
    if(typeof  json.address1 !="undefined"){
        $('.address1').addClass('has-error');
        $('.address1').closest('.col-12').find('.has-error-text').text(json.address1).show();
        message.push("* "+json.address1);
    }else{
        $('.address1').removeClass('has-error');
        $('.address1').closest('.col-12').find('.has-error-text').hide();
    }
    if(typeof  json.total_price !="undefined"){
        $('.total-price').addClass('has-error');
        $('.total-price').closest('.col-12').find('.has-error-text').text(json.total_price).show();
        message.push("* "+json.total_price);
    }else{
        $('.total-price').removeClass('has-error');
        $('.total-price').closest('.col-12').find('.has-error-text').hide();
    }
    if(typeof  json.featuretitle !="undefined"){
        $('.feature-title').addClass('has-error');
        $('.feature-title').closest('.col-12').find('.has-error-text').text(json.featuretitle).show();
        message.push("* "+json.featuretitle);
    }else{
        $('.feature-title').removeClass('has-error');
        $('.feature-title').closest('.col-12').find('.has-error-text').hide();
    }
    if(typeof  json.baseinfo !="undefined"){
        $('#editor').closest('#standalone-container').find('.has-error-text').text(json.baseinfo).show();
        message.push("* "+json.baseinfo);
    }else{
        $('#editor').closest('#standalone-container').find('.has-error-text').hide();
    }
    if(typeof  json.featureinfo !="undefined"){
        $('#editor1').closest('#standalone-container').find('.has-error-text').text(json.featureinfo).show();
        message.push("* "+json.featureinfo);
    }else{
        $('#editor1').closest('#standalone-container').find('.has-error-text').hide();
    }
    return message.join('<br>');

}
function store_prototype(){
    loadingmode('on');
    var url             = $(this).attr('datasrc');
    var tokenb          = $('meta[name="csrf_token"]').attr('content');
    var image_url       = $(this).attr('data-image');
    var property_title  = $('.property-title').val();
    var property_select = $('.property-type-select').val();
    var sale_or_rent    = $('#sale_rent').val();
    var unitprice       = $('.unit-price').val();
    var price_p_s       = $('.pri-per-s').val();
    var lan_width       = $('.land-width').val();
    var lan_length      = $('.land-length').val();
    var total_land      = $('.total-area').val();
    var st_no           = $('.st-no').val();
    var house_no        = $('.ho-no').val();
    var city            = $('.city').val();
    var khan            = $('.khan').val();
    var sangkat         = $('.sangkat').val();
    var phum            = $('.phum').val();
    var len_location    = $('.address-property').length;
    var buildingwidth;
    var bed_room;
    var buildingheight;
    var bathroom;
    var commentarea;
    var living_room;
    var dinning_room;
    var mazzaninefloor;
    var kitchen;
    var total_build_area;
    var aircon;
    var parking;
    var balcony;
    var descriptionproperty;




    var location   = [];
    if(len_location>0){
        for(var i=0;i<len_location;i++){
            var address  = $('.address-property:eq('+ i +')').val();
            var property = $('.distance-property:eq('+ i +')').val();
            if (address!="" && property!=0){
                location.push({address:address,property:property});
            }
        }
    }
    if(property_select!="land"){
         buildingwidth   = $('.building-width').val();
         bed_room        = $('.bed-room').val();
         buildingheight  = $('.buillding-height').val();
         bathroom        = $('.bathroom').val();
         commentarea     = $('.common-area').val();
         living_room     = $('.living-room').val();
         dinning_room    = $('.dinning-room').val();
         mazzaninefloor  = $('.mazzanine-floor').val();
         kitchen         = $('.kitchen').val();
         total_build_area= $('.total-building').val();
         aircon          = $('.air-con').val();
         parking         = $('.parking').val();
         balcony         = $('.balcony').val();
         descriptionproperty = $('.description-property').val();

    }
    $.post(url,{
        _token:tokent,
        property_title:property_title,
        property_select:property_select,
        sale_or_rent:sale_or_rent,
        unitprice:unitprice,
        price_p_s:price_p_s,
        lan_width:lan_width,
        lan_length:lan_length,
        total_land:total_land,
        st_no:st_no,
        house_no:house_no,
        city:city,
        khan:khan,
        sangkat:sangkat,
        phum:phum,
        buildingwidth:buildingwidth,
        bed_room:bed_room,
        buildingheight:buildingheight,
        bathroom:bathroom,
        commentarea:commentarea,
        living_room:living_room,
        dinning_room:dinning_room,
        mazzaninefloor:mazzaninefloor,
        kitchen:kitchen,
        total_build_area:total_build_area,
        aircon:aircon,
        parking:parking,
        balcony:balcony,
        descriptionproperty:descriptionproperty,
    },function (data) {
        console.log(data);

        
    });


}
    doc.on('click','.save-project',function () {
        var item = $('.item.active').attr('type');

        switch (item) {
            case "project": store_project(); break;
            case "property": store_prototype(); break;

        }

    });
function store_project() {
    loadingmode('on');
    var tokenb = $('meta[name="csrf_token"]').attr('content');
    var image_url =  $(this).attr('data-image');
    var pro_type        = $('select[name="projectType"]').val();
    var pro_title       = $('.project-title').val();
    var buil_date       = $('.buil-date').val();
    var complete_date   = $('.complete-date').val();
    var grr             = $('.grr').val();
    var downpay         = $('.down-payment').val();
    var sale_rent       = $('.sale-rent').val();
    var total_price     = $('.total-price').val();
    var pri_s           = $('.pri-s').val();
    var country         = $('.country-select').val();
    var city            = $('.city-select').val();
    var address1        = $('.address1').val();
    var address2        = $('.address2').val();
    var baseinfo        = $('#editor').find('.ql-editor').html();
    var featuretitle    = $('.feature-title').val();
    var featureinfo     = $('#editor1').find('.ql-editor').html();
    var lenpropertytype = $('.property-type').find('.item-list').length;
    var url             = $(this).attr('datasrc');
    var tower  = [];
    var propertytype = [];
    if(pro_type=="borey"){
        for(var i=0;i<lenpropertytype;i++){
            var check =   $('.property-type').find('.item-list:eq('+ i +')').find('input[name="type"]').val();
            if(check!=""){
                var type      = $('.property-type').find('.item-list:eq('+ i +')').find('input[name="type"]').val();
                var bedroom   = $('.property-type').find('.item-list:eq('+ i +')').find('input[name="bedroom"]').val();
                var bathroom  = $('.property-type').find('.item-list:eq('+ i +')').find('input[name="bathroom"]').val();
                var floor     = $('.property-type').find('.item-list:eq('+ i +')').find('input[name="floor"]').val();
                var packing   = $('.property-type').find('.item-list:eq('+ i +')').find('input[name="packing"]').val();
                var width     = $('.property-type').find('.item-list:eq('+ i +')').find('input[name="width"]').val();
                var height     = $('.property-type').find('.item-list:eq('+ i +')').find('input[name="height"]').val();
                propertytype.push({type:type,bedroom:bedroom,bathroom:bathroom,floor:floor,height:height,packing:packing,width:width})

            }
        }
    }else if(pro_type=="condo"){
        var len = $('.tower-item').length;
        if(len>0){
            for(var i=0;i<len;i++){
                var result = $('.tower-item:eq('+ i +')').val();
                if(result!=""){
                    tower.push({id:0,type:result});
                }
            }

        }


    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': tokenb
        },
    });
    loadingmode('off');

    $.post(url,{
        _token:tokenb,
        pro_type:pro_type,
        pro_title:pro_title,
        buil_date:buil_date,
        grr:grr,
        downpay:downpay,
        sale_rent:sale_rent,
        total_price:total_price,
        pri_s:pri_s,
        country:country,
        city:city,
        address1:address1,
        address2:address2,
        baseinfo:baseinfo,
        complete_date:complete_date,
        featuretitle:featuretitle,
        featureinfo:featureinfo,
        propertytype:propertytype,
        tower:tower
    },function (data) {
        console.log(data);
        var result = JSON.parse(data);
        if(result.status=="OK") {
            upload_image(result,image_url,result.result.id);
        }
        validation();


    }).fail(function (error) {
        console.log(error);
        loadingmode('off');
        var json = JSON.parse(error.responseText).errors;
        var message  =  validation(json);
        notification(message,'false');

    });
    
}
    function search_mode(search) {
        if(search!=""){
            loadingmode('on');
            var link  = get_link(null,null,search);
            var url = window.location.href.split('?')[0];
            window.history.pushState({},'',"?"+link);
            $.get(url+"?"+link,{},function (data) {
                $('.change-row').html($(data).find('.change-row').html());
                loadingmode('off');
            });
        }
    }
    function change_type(type){
        var len = $('.list-search').find('.item').length;
        var activelen = $('.list-search').find('.active').length;


        if(type>0){
           if(activelen>0){

               var index = parseInt($('.list-search').find('.active').attr('itemtype')) + 1;
               if(index>len-1){
                   index = 0;
               }
               $('.list-search .item').removeClass('active');
           var obj  =     $('.list-search .item:eq('+ index +')');
              obj.addClass('active');
               $('.search-user-option').val(obj.text());

           }else{
               var obj = $('.list-search .item:eq(0)');
               obj.addClass('active');
               $('.search-user-option').val(obj.text());
           }



        }else{


            if(activelen>0){
                var index = parseInt($('.list-search').find('.active').attr('itemtype')) - 1;
                if(index<0){
                    index = len-1;
                }
                $('.list-search .item').removeClass('active');
                $('.list-search .item:eq('+ index +')').addClass('active');
                var obj  =     $('.list-search .item:eq('+ index +')');
                obj.addClass('active');
                $('.search-user-option').val(obj.text());

            }else{
                var obj = $('.list-search .item:eq(0)');
                obj.addClass('active');
                $('.search-user-option').val(obj.text());
            }

        }
        
    }

    function dataURLtoFile(dataurl, filename) {
        var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, {type:mime});
    }
    function randomstr(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result + "-" + $.now();
    }

doc.on('click','.delete-project',function (e) {
    var id = $(this).closest('.item-project').find('.id_project').attr('id');
    var status = "false";
    var url = $(this).attr('datasrc');
    $('.popup-model').find('.action-btn-project')
                     .attr('datasrc',url)
                     .attr('id_project',id)
                     .attr('status',status);
   popup_message('Are Want to Delete ? ','Waning','change-status');
});

doc.on('click','.action-btn-project',function () {
    var url  = $(this).attr('datasrc');
    var type = $(this).closest('.popup-model').attr('type');
    var status = $(this).attr('status');
    if(type=="change-status"){
      var id =  $(this).attr('id_project');
       $.post(url,{_token:tokent,id:id,status:status},function (data) {
           if(data.status_code==200){
               notification('change Successfuly','ok');
               $.get(window.location.href,{},function (data) {
                   var data = $(data).find('.card-body').html();
                   $('.card-body').html(data);
               });
           }else{
               notification('can`t change status','false');
           }

       }).fail(function (data) {
           console.log(data);
           notification('can`t change status','false');

       });
    }
});

function popup_message(message,title,type) {
    $('.popup-model').fadeIn(300).attr('type',type);
    var check  = false;
    $('body').css('overflow','hidden');
    var color;

    switch (title) {
        case "Waning": color = "#b30404" ;break;
        default : color ="#03a9f3";

    }
    $('.popup-model').find('.title').text(title).css('background-color',color);
    $('.popup-model').find('.body').text(message);
    $('.btn-custom').css('background-color',color);



    doc.on('click','.action-btn-project',function () {
        $(this).closest('.popup-model').fadeOut(300);
        $('body').css('overflow','auto');

    });
    doc.on('click','.cancel-btn',function () {
        $(this).closest('.popup-model').fadeOut(300);
        $('body').css('overflow','auto');
    });
}
    doc.on('click','.custom-pagination li.page-item-list a',function (e) {
        e.preventDefault();
        var url =  window.location.href.split('?');
        var page = $(this).attr('tabindex');
        var str = get_url('',page);

        history.pushState({},'',"?"+str);
        loadingmode('on');
        $.get(url[0]+"?"+str,{},function (data) {
           var element =  $(data).find('.card-body').html();
           $('.card-body').html(element);
            loadingmode('off');
        });

    });
    function get_url(limit=false,page=false,search=false,other=false){
        var parameter = JSON.parse($('.parameter').attr('content'));
        var str="";

        if(parameter.page!=undefined && page==false){
             str +="&page="+parameter.page;
        }else{
            if(page!=false){
                str +="&page="+page;
            }

        }
        if(parameter.limit!=undefined && limit==false){
                str +="&limit="+parameter.limit;
        }else{
            if(limit!=false){
                str +="&limit="+limit;
            }

        }
        if(parameter.search!=undefined && search==false){
            str += "&search="+parameter.search;
        }else{
            if(search!=false){
                str += "&search="+search;
            }
        }
        if(parameter.country!=undefined && other.country==undefined){
            str += "&country="+parameter.country;
        }else{
            if(other.country!=undefined){
                str  += "&country="+other.country;
            }
        }
        if(parameter.city!=undefined && other.city==undefined){
            str += "&city="+parameter.city;
        }else{
            if(other.city!=undefined){
                str  += "&city="+other.city;
            }
        }
        if(parameter.project_type!=undefined && other.project_type==undefined){
            str += "&project_type="+parameter.project_type;
        }else{
            if(other.project_type!=undefined ){
                str  += "&project_type="+other.project_type;
            }
        }
        if(parameter.sall_or_rent!=undefined && other.sall_or_rent==undefined){
            str += "&sall_or_rent="+parameter.sall_or_rent;
        }else{
            if(other.sall_or_rent!=undefined){
                str  += "&sall_or_rent="+other.sall_or_rent;
            }
        }
        if(parameter.room_select!=undefined && other.room_select==undefined){
            str += "&room_select="+parameter.room_select;
        }else{
            if(other.room_select!=undefined){
                str  += "&room_select="+other.room_select;
            }
        }
        if(parameter.min_price!=undefined && other.min_price==undefined){
            str += "&min_price="+parameter.min_price;
        }else{
            if(other.min_price!=undefined){
                str  += "&min_price="+other.min_price;
            }
        }
        if(parameter.max_price!=undefined && other.max_price==undefined){
            str += "&max_price="+parameter.max_price;
        }else{
            if(other.max_price!=undefined){
                str  += "&max_price="+other.max_price;
            }
        }
        var url = window.location.href.split('?')[0];
        loadingmode('on');
        $.get(url+"?"+str,{},function (data) {
            var element =  $(data).find('.card-body').html();
            $('.card-body').html(element);
            loadingmode('off');
        });

        return str;
    }
    doc.on('change','.limit-page',function () {
        var limit = $(this).val();
        var str = get_url(limit);
       window.history.pushState({},'','?'+str);
        var url = window.location.href.split('?')[0];
        loadingmode('on');
        $.get(url+"?"+str,{},function (data) {
            var element =  $(data).find('.card-body').html();
            $('.card-body').html(element);
            loadingmode('off');
        });
    });
    doc.on('keypress', '.search-project-listing',function (e) {
        if(e.key=="Enter"){
            search_project();
        }
    });
    doc.on('click','.goto-search',function () {
            search_project();
    });
        function  search_project() {
            var data =  $('.search-project-listing').val();
            if(data!=""){
            var url = window.location.href.split('?')[0];
            var str = get_url('','',data);
            loadingmode('on');
            window.history.pushState({},'',"?"+str);
            $.get(url+"?"+ str,{},function (data) {
                var element =  $(data).find('.card-body').html();
                $('.card-body').html(element);
                loadingmode('off');
            });
            }else{
                notification("invalid Search",'false')
            }

        }
        /* Fillter */
        doc.on('change','.country',function () {
            var data = $(this).val();
            var str = get_url('','','',{country:data});
            window.history.pushState({},'',curren_url+str);
        });
        doc.on('change','.city',function () {
            var data = $(this).val();
            console.log(data);
            var str = get_url('','','',{city:data});
            window.history.pushState({},'',curren_url+str);
        });
        doc.on('change','.project_type',function () {
            var data = $(this).val();
            console.log(data);
            var str = get_url('','','',{project_type:data});
            window.history.pushState({},'',curren_url+str);
        });
        doc.on('change','.sall_or_rent',function () {
            var data = $(this).val();
            console.log(data);
            var str = get_url('','','',{sall_or_rent:data});
            window.history.pushState({},'',curren_url+str);
        });
        doc.on('change','.room-select',function () {
            var data = $(this).val();
            console.log(data);
            var str = get_url('','','',{room_select:data});
            window.history.pushState({},'',curren_url+str);
        });
        doc.on('focusout','.min-price',function () {
            var data = $(this).val();
            console.log(data);
            var str = get_url('','','',{min_price:data});
            window.history.pushState({},'',curren_url+str);
        });
        doc.on('focusout','.max-price',function () {
            var data = $(this).val();
            console.log(data);
            var str = get_url('','','',{max_price:data});
            window.history.pushState({},'',curren_url+str);
        });
        /* End Fillter */

});

