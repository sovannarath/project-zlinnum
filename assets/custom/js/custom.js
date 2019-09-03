var obj_function = {};
$(document).ready(function () {
    var tokent = $('meta[name="csrf-token"]').attr('content');
    let obj_public = {'token': tokent};
    var curren_url = window.location.href.split('?')[0] + "?";
    var doc = $(document);
    doc.on('click', '.remove-item-list', function () {
        $(this).closest('.item-list').remove();
    });
    doc.on('click', '.add-more-item', function () {
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
    doc.on('click', '.main-item', function () {
        var type = $(this).attr('type');
        $('.main-item').removeClass('active');
        $(this).addClass('active');
        switch (type) {
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
    doc.on('change', 'input[name="thumbnail"]', function () {
        var file = $(this).prop('files');
        var check = false;
        var obj = $(this).closest('.row');
        var c = getBase64(file, '.review-image', this, 'image');
        if (c != "error") {
            obj.find('.select-image').hide();
            obj.find('.review-image').show();
            obj.find('.loading').show();
        }


    });
    doc.on('change', 'input[name="gallery-image"]', function () {
        var file = $(this).prop('files');
        var check = false;
        var obj = $(this).closest('.row');
        var c = getBase64(file, '.review-image', this, 'gallery');
        if (c != "error") {
            /*    obj.find('.select-image').hide();*/
            obj.find('.review-image').show();
            obj.find('.loading').show();
        }
    });
    doc.on('click', '.remove-button', function () {
        var obj = $(this).closest('.row');
        obj.find('.review-image').html("");
        $(this).addClass('showoff').removeClass('showon');
        obj.find('.select-image').show();

    });
    doc.on('click', '.close-f1', function () {
        var len = $(this).closest('.review-image').find('.image-plus').length;
        if (len - 1 > 0) {
            $(this).closest('.image-plus').remove();
        } else {
            $(this).closest('.row').find('.select-image').show();
            $(this).closest('.image-plus').remove();

        }

    });
    doc.on('click', '.add-more-tower-button', function () {
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

    function getBase64(file, element, THIS, type) {
        var name;

        if (file.length > 1) {
            for (var i = 0; i < file.length; i++) {
                var type1 = file[i].type.substr('6', file[i].length);
                if (type1 == "jpg" || type1 == "jpeg" || type1 == "png") {
                    var reader = new FileReader();
                    reader.readAsDataURL(file[i]);
                    reader.onload = function (e) {
                        var obj = $(THIS).closest('.row');
                        obj.find('.loading').hide();
                        obj.find(element).append('<span class="image-plus" style="position: relative;display: inline-block"><img src="' + e.target.result + '" style="width: 100px;">' +
                            '<span class="close-f close-f1"><i class="fas fa-close"></i></span></span>');

                    };
                    reader.onerror = function (error) {
                        console.log('Error: ', error);
                    };
                } else {
                    notification('Invalid Type Support Only (JPG|PNG|JPEG)', 'error');
                    return "error";
                }
            }
            ;
        } else {
            var type2 = file[0].type.substr('6', file[0].length);
            if (type2 == "jpg" || type2 == "jpeg" || type2 == "png") {
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
            } else {
                notification('Invalid Type Support Only (JPG PNG JPEG)', 'error');
                return "error";
            }
        }


    }

    function base64(file, element) {
        var reader1 = new FileReader();
        reader1.readAsDataURL(file[0]);
        reader1.element = element;
        $(element).addClass('loading-background');
        reader1.onload = function (e) {
            $(element).removeClass('loading-background');
            $(element).css('background-image', 'url(' + e.target.result + ')');

        }
        /*(function (e) {
            console.log(element+','+e   .target.result);
        });*/
    };
    ref();

    function ref() {
        var THIS = $('select[name="projectType"]');
        var type = THIS.val();
        switch (type) {
            case "2":
                defa();
                $('.tower').show();
                break;
            case "3":
                defa();
                $('.sale-rent').hide();
                $('.apartment-option').show();
                break;
            default :
                defa();
        }

        function defa() {
            $('.tower').hide();
            $('.sale-rent').show();
            $('.apartment-option').hide();
        }
    }

    doc.on('change', 'select[name="projectType"]', function () {
        ref();
    });
    doc.on('click', '.add-more-borhood', function () {
        $(this).closest('.card-body').find('.add-more-item-list').append('<tr><th><input type="text" class="form-control address-property" placeholder="Address" name="address"></th><th><input type="number" class="form-control distance-property" value="0"></th></tr>');
    });

    function property_type_select(data) {
        if (data != "Land") {
            $('.more-property').show();
        } else {
            $('.more-property').hide();
        }
    }

    var data = $('#property-type-select').val();
    property_type_select(data);
    doc.on('change', '#property-type-select', function () {
        var data = $(this).val();
        property_type_select(data);
    });

    /* Fillter Function */
    doc.on('click', '.filter-action', function () {
        $('.filter-blog').slideToggle(300);
    });

    /* End Filter Function */

    /* Add Image new Event Page*/

    doc.on('change', '.new-event-image', function () {
        var file = $(this).prop('files');
        base64(file, ".receive-background");
        $('.receive-background').attr('check_image', 'true');
    });


    /* End Add Image new Event Page*/


    /* Update Profile */
    /* doc.on('click','.click-change-main',function () {
         var obj = $(this);
         obj.find('.old-name').hide();
         obj.find('.input-change').show();
         obj.find('.click-change').hide();
     });*/
    doc.on('click', '.click-change', function () {
        var obj = $(this).closest('.row');
        obj.find('.old-name').hide();
        obj.find('.input-change').show();
        $(this).hide();
    });
    doc.on('click', '.cancel-change', function () {
        var obj = $(this).closest('.row');
        obj.find('.old-name').show();
        obj.find('.input-change').hide();
        obj.find('.click-change').show();
    });
    doc.on('click', '.action-change', function () {
        var type = $(this).attr('type');
        var url = $('.change-profile').attr('datasrc');
        var tokent = $('meta[name="csrf_token"]').attr('content');
        var THIS = $(this);
        var data = {};
        switch (type) {
            case 'name':
                var first = $('input[name="first"]').val();
                var last = $('input[name="last"]').val();
                data = {_token: tokent, first: first, last: last, type: type};
                break;
            case 'phone_number' :
                var phone_number = $('input[name="phone_number"]').val();
                data = {_token: tokent, phone_number: phone_number, type: type};
                break;
        }


        loadingmode('on');
        $.ajax({
            url: url,
            type: "PUT",
            data: data,
            success: function (data) {
                if (data.status == "ok") {
                    notification(data.message, 'ok');
                    switch (type) {
                        case  "name" :
                            THIS.closest('.row').find('.old-name').html(first + " " + last).show();
                            break;
                        case  "phone_number" :
                            THIS.closest('.row').find('.old-name').html(phone_number).show();
                            break;
                    }
                    THIS.closest('.row').find('.click-change').show();
                    THIS.closest('.row').find('.input-change').hide();


                } else {
                    notification('Upload Unsuccess', 'false');
                }
                loadingmode('off');

            },
            error: function (error) {
                loadingmode('off');
                console.error(error);
                notification("Something Error", 'false');


            }

        });
    });
    var l = 0;

    function sw(num) {
        l = l + num;
        if (l == 1) {
            loop();

        }

    }

    var i = 0;

    function loop() {
        var len = $('.notification').find('.noti-item').length;
        if (len >= 1) {
            setTimeout(function () {
                $('.notification').find('.noti-item:eq(0)').fadeOut();
                setTimeout(function () {
                    $('.notification').find('.noti-item:eq(0)').remove();
                }, 300);
                loop();
            }, 10000);

        } else {
            l = 0;
        }

    };

    function notification(message, status) {
        if (status == "ok") {
            v.notify.message({type: "success", message: message});
        } else {
            v.notify.message({type: "danger", message: message});
        }

    }

    function loadingmode(sw) {
        if (sw == "on") {
            $('#loading').fadeIn();
        } else {
            $('#loading').fadeOut();
        }
    }

    doc.on('click', '.close-noti-item', function () {
        var obj = $(this).closest('.noti-item');
        obj.addClass('slider-down');
        setTimeout(function () {
            obj.remove();
        }, 800);
    });
    doc.on('change', '#profile-image', function () {
        var url = $(this).attr('datasrc');
        var file = $(this).prop('files');
        if (file.length == 1) {
            var formData = new FormData();
            formData.append('userImage', file[0]);
            formData.append('_token', tokent);
            loadingmode('on');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success: function (e) {
                    var json = JSON.parse(e);
                    if (json.status_code == 200) {
                        $('.profile-image').css('background-image', 'url(' + json.result.image + ')');
                        notification('Success to Change Image', 'ok');
                        loadingmode('off');
                    } else {
                        notification('can`t Change Profile Image', 'false');
                    }
                },
                error: function (eror) {
                    console.log(eror);
                    loadingmode('off');
                    notification('can`t Change Profile Image', 'false');
                }
            })

        }


    })
    /* End Update Profile*/


    /* User Page */
    doc.on('click', '.page-active-click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadingmode('on');
        var paramat = window.location.href.split('?');
        if (paramat.length >= 2) {
            window.history.pushState({}, '', url + "?" + paramat[1]);
            $.get(url + "?" + paramat[1], {}, function (data) {
                loadingmode('off');
                $('.change-row').html($(data).find('.change-row').html());

            });
        } else {
            window.history.pushState({}, '', url);
            $.get(url, {}, function (data) {
                loadingmode('off');
                $('.change-row').html($(data).find('.change-row').html());

            });
        }


    });

    function get_link(limit=null, type=null, search=null) {
        var link = [];
        if (limit != null) {
            link.push("limit=" + limit);
        } else if ($.urlParam('limit') != null) {
            link.push("limit=" + $.urlParam('limit')[1]);
        }

        if (type != null && type !== 0) {
            link.push("type=" + type);
        } else if ($.urlParam('type') != null && type == null) {
            link.push("type=" + $.urlParam('type')[1]);
        }

        if (search != null) {
            link.push("search=" + search);
        } else if ($.urlParam('search') != null) {
            link.push("search=" + $.urlParam('search')[1]);
        }
        return link.join('&');

    }

    doc.on('change', 'select[name="show-select"]', function () {
        var option = $(this).val();
        var url = window.location.href.split('?')[0];
        var link = get_link(option);
        loadingmode('on');
        window.history.pushState({}, '', "?" + link);
        $.get(url + "?" + link, {}, function (data) {
            $('.change-row').html($(data).find('.change-row').html());
            loadingmode('off');

        });


    });
    doc.on('change', 'select[name="type"]', function () {
        var option = $(this).val();
        var url = window.location.href.split('?')[0];
        if (option == '') {
            option = 0;
        }
        var link = get_link(null, option);

        loadingmode('on');
        window.history.pushState({}, '', "?" + link);


        $.get(url + "?" + link, {}, function (data) {
            $('.change-row').html($(data).find('.change-row').html());
            loadingmode('off');
        });

    });

    /* End User Page */
    $.urlParam = function (name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return results;
    }
    doc.on('click', '.list-search .item', function (e) {
        var text = $(this).text();
        search_mode(text);

    });
    doc.on('keydown', '.search-user-option', function (e) {
        var search = $(this).val();
        var url = $(this).attr('datasrc');
        $('.search-load').fadeIn(300);
        if (search != "") {


            $.post(url, {_token: tokent, search: search}, function (data) {
                if (data != "false") {
                    $('.list-search').html('');
                    data.forEach(function (data, i) {
                        $('.list-search').append('<li class="item" itemtype="' + i + '">' + data + '</li>');
                    });
                    $('.search-load').fadeOut(300);
                    var len = $('.list-search').find('.item').length;
                    if (len > 0) {
                        $('.list-box').fadeIn(200);
                    } else {
                        $('.list-box').fadeOut(200);
                    }
                } else {
                    $('.list-box').fadeOut(200);
                }

            }).fail(function (errro) {
                console.log(errro);

            })
        } else {
            $('.list-search').html('');
            $('.list-box').fadeOut(200);
            $('.search-load').fadeOut(300);
        }

    });
    doc.on('click', '.search-button-click', function () {
        var search = $('.search-user-option').val();
        search_mode(search);
    });
    doc.on('keydown', '.search-user-option', function (e) {
        if (e.key == "ArrowDown") {
            change_type(1);
        }
        if (e.key == "ArrowUp") {
            change_type(-1);
        }
        if (e.key == "Enter") {
            search_mode($(this).val());
        }
    });
    doc.on('click', '.test', function () {
        /* var str = '{"result":{"id":86,"status":false,"title":"123","country":"Cambodia","city":"Phnom Penh","price":123.0,"description":"<p>123</p>","thumbnail":null,"grr":123.0,"favorite":false,"user":{"id":12,"gender":null,"email":"vira.pha@zillennium.com","role":null,"first_name":"vira","last_name":"pha","phone_number":"086483336","photo":"https://app.c21apex.com/api/user/image/84f8b78b-2c97-40b2-94f2-dfa57ea935f4pexels-photo-556416.jpeg","account_type":"origin"},"rent_or_buy":"sale","address_1":"123","address_2":"123","sqm_price":123.0,"avg_annual_rent_from":0.0,"avg_annual_rent_to":0.0,"down_payment":"12","project_type":null,"introductions":[{"id":98,"name":"123","description":"<p>123</p>"}],"galleries":[],"property_types":[],"tower_type":[],"built_date":"2019-06-26T00:00:00.000+0000","completed_date":"2019-06-26T00:00:00.000+0000"},"status_code":200,"status":"OK"}';
         var url = "http://localhost/project/admin/add-image";
         var id = prompt('Please Enter ID');
        upload_image(str,url,id);*/
        var type = $('.main-item.active').attr('type');
    });

    function create_form_image(obj) {
        /* Image Gallery */
        var gallery_len = obj.img_class.length;
        if (gallery_len > 0) {
            for (var i = 0; i < gallery_len; i++) {
                var base64 = obj.img_class.eq(i).find('img').attr('src');
                var type_image = dataURLtoFile(base64, randomstr(20));
                var type1 = type_image.type.substr(6, type_image.type.length);

                var gallery1 = dataURLtoFile(base64, randomstr(20) + "." + type1);
                obj.formdata.append('gallery[]', gallery1);
            }
            obj.formdata.append('length_gallery', gallery_len);
            obj.status_code = 200;
        } else {
            obj.status_code = 404;
        }


    }

    function upload_image(result, url, id, message) {
        var message_result = message;
        var img_lan = $('.review-image').find('img').length;
        $.ajaxSetup({
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
        });
        var formdata = new FormData();
        var len_thumbnail = $('.thumbnail').find('img').length;
        console.log(len_thumbnail);
        if (len_thumbnail > 0) {
            var base64thum = $('.thumbnail').find('img').attr('src');
            formdata.append('thumbnail', dataURLtoFile(base64thum, randomstr(20)));
            var thumbnail = dataURLtoFile(base64thum, randomstr(20));
            var type = thumbnail.type.substr(6, thumbnail.type.length);

            var thumbnail1 = dataURLtoFile(base64thum, randomstr(20) + "." + type);
            formdata.append('thumbnail', thumbnail1);
        }
        formdata.append('_token', tokent);
        console.log(tokent);
        formdata.append('length_thum', len_thumbnail);
        formdata.append('id', id);
        if (img_lan) {
            /* Image Gallery */
            var gallery_len = $('.image-plus').length;
            if (gallery_len > 0) {
                for (var i = 0; i < gallery_len; i++) {
                    var base64 = $('.image-plus:eq(' + i + ')').find('img').attr('src');
                    var type_image = dataURLtoFile(base64, randomstr(20));
                    var type1 = type_image.type.substr(6, type_image.type.length);

                    var gallery1 = dataURLtoFile(base64, randomstr(20) + "." + type1);
                    formdata.append('gallery[]', gallery1);

                }
                formdata.append('length_gallery', gallery_len);
                /* End Image Gallery*/
            } else {
                console.log('Gallery Not Found');
            }

        }
        loadingmode('on');

        $.post(url, formdata, function (data) {
            console.log(data);
            var json = JSON.parse(data);
            if (json.status == "OK") {
                notification(message_result.message_true, 'ok');
                setTimeout(function () {
                    window.open(message_result.next, '_self');
                }, 1000);
            }
            loadingmode('off');

        }).fail(function (error) {
            loadingmode('off');
            notification(message_result.message_false);
            console.log(error);
            var message = error.responseJSON;
            if (typeof message.errors.gallery != "undefined") {
                notification(message.errors.gallery, 'error');
            }
            if (typeof message.errors.thumbnail != "undefined") {
                notification(message.errors.thumbnail, 'error');
            }
            if (typeof message.gallery != "undefined") {
                console.error(message.gallery);
            }
            if (typeof message.thumbnail != "undefined") {
                console.error(message.thumbnail);
            }

        })

    }

    function validation(json=[]) {
        var message = [];
        if (typeof json.title != "undefined") {
            $('.project-title').addClass('has-error');
            $('.project-title').closest('.row').find('.has-error-text').text(json.title).show();
            message.push("* " + json.title);
        } else {
            $('.project-title').removeClass('has-error');
            $('.project-title').closest('.row').find('.has-error-text').hide();

        }

        if (typeof json.buil_date != "undefined") {
            $('.buil-date').addClass('has-error');
            $('.buil-date').closest('.row').find('.has-error-text').text(json.buil_date).show();
            message.push("* " + json.buil_date);
        } else {
            $('.buil-date').removeClass('has-error');
            $('.buil-date').closest('.row').find('.has-error-text').hide();
        }
        if (typeof json.grr != "undefined") {
            $('.grr').addClass('has-error');
            $('.grr').closest('.row').find('.has-error-text').text(json.grr).show();
            message.push("* " + json.grr);
        } else {
            $('.grr').removeClass('has-error');
            $('.grr').closest('.row').find('.has-error-text').hide();
        }
        if (typeof json.country != "undefined") {
            $('.country-select').addClass('has-error');
            $('.country-select').closest('.col-12').find('.has-error-text').text(json.country).show();
            message.push("* " + json.country);
        } else {
            $('.country-select').removeClass('has-error');
            $('.country-select').closest('.col-12').find('.has-error-text').hide();
        }
        if (typeof json.city != "undefined") {
            $('.city-select').addClass('has-error');
            $('.city-select').closest('.col-12').find('.has-error-text').text(json.city).show();
            message.push("* " + json.city);
        } else {
            $('.city-select').removeClass('has-error');
            $('.city-select').closest('.col-12').find('.has-error-text').hide();
        }
        if (typeof json.address1 != "undefined") {
            $('.address1').addClass('has-error');
            $('.address1').closest('.col-12').find('.has-error-text').text(json.address1).show();
            message.push("* " + json.address1);
        } else {
            $('.address1').removeClass('has-error');
            $('.address1').closest('.col-12').find('.has-error-text').hide();
        }
        if (typeof json.total_price != "undefined") {
            $('.total-price').addClass('has-error');
            $('.total-price').closest('.col-12').find('.has-error-text').text(json.total_price).show();
            message.push("* " + json.total_price);
        } else {
            $('.total-price').removeClass('has-error');
            $('.total-price').closest('.col-12').find('.has-error-text').hide();
        }
        if (typeof json.from_price != "undefined") {
            $('.from-price').addClass('has-error');
            $('.from-price').closest('.col-12').find('.has-error-text').text(json.from_price).show();
            message.push("* " + json.from_price);
        } else {
            $('.from-price').removeClass('has-error');
            $('.from-price').closest('.col-12').find('.has-error-text').hide();
        }
        if (typeof json.to_price != "undefined") {
            $('.to-price').addClass('has-error');
            $('.to-price').closest('.col-12').find('.has-error-text').text(json.to_price).show();
            message.push("* " + json.to_price);
        } else {
            $('.to-price').removeClass('has-error');
            $('.to-price').closest('.col-12').find('.has-error-text').hide();
        }
        if (typeof json.featuretitle != "undefined") {
            $('.feature-title').addClass('has-error');
            $('.feature-title').closest('.col-12').find('.has-error-text').text(json.featuretitle).show();
            message.push("* " + json.featuretitle);
        } else {
            $('.feature-title').removeClass('has-error');
            $('.feature-title').closest('.col-12').find('.has-error-text').hide();
        }
        if (typeof json.baseinfo != "undefined") {
            $('#editor').closest('#standalone-container').find('.has-error-text').text(json.baseinfo).show();
            message.push("* " + json.baseinfo);
        } else {
            $('#editor').closest('#standalone-container').find('.has-error-text').hide();
        }
        if (typeof json.featureinfo != "undefined") {
            $('#editor1').closest('#standalone-container').find('.has-error-text').text(json.featureinfo).show();
            message.push("* " + json.featureinfo);
        } else {
            $('#editor1').closest('#standalone-container').find('.has-error-text').hide();
        }
        return message.join('<br>');

    }

    function store_prototype(THIS, update=false, obj=null) {
        loadingmode('on');
        var url = THIS.attr('datasrc');
        var image_url = THIS.attr('data-image');
        var property_title = $('.property-title').val();// ☑
        var property_select = $('#property-type-select').val();// ☑
        var sale_or_rent = $('#sale_rent').val();// ☑
        var unitprice = $('.unit-price').val();// ☑
        var price_p_s = $('.pri-per-s').val();// ☑
        var lan_width = $('.land-width').val();// ☑
        var lan_length = $('.land-length').val();// ☑
        var total_land = $('.total-area').val();// ☑
        var st_no = $('.st-no').val();// ☑
        var house_no = $('.ho-no').val();// ☑
        var city = $('.city_property').val();// ☑
        var country = $('.country_property').val();// ☑
        var khan = $('.khan').val();// ☑
        var sangkat = $('.sangkat').val();// ☑
        var phum = $('.phum').val();// ☑
        var len_location = $('.address-property').length;
        var enable_project = $('#enable_project_name:checked').val();// ☑
        var no_of_floor = $('.no-of-floor').val();
        var project_id = $('.project-title-in-property').val();
        if (typeof enable_project != "undefined") {
            enable_project = "true";
        } else {
            enable_project = "false";
        }
        var buildingwidth; // ☑
        var bed_room;// ☑
        var buildingheight;// ☑
        var private_area;
        var bathroom;// ☑
        var commentarea;// ☑
        var living_room;// ☑
        var dinning_room;// ☑
        var mazzaninefloor;
        var kitchen;// ☑
        var total_build_area;
        var aircon;// ☑
        var parking;// ☑
        var balcony;// ☑
        var total_building;
        var show_map = $('.show-map-checkbox:checked').val();
        if (typeof show_map != "undefined") {
            show_map = "true";
        } else {
            show_map = "false";
        }

        var descriptionproperty;// ☑
        var location = [];
        var lat = $('.lat-number').val();// ☑
        var lng = $('.lnt-number').val();// ☑
        if (len_location > 0) {
            for (var i = 0; i < len_location; i++) {
                var address = $('.address-property:eq(' + i + ')').val();
                var property = $('.distance-property:eq(' + i + ')').val();
                if (address != "" && property != 0) {
                    location.push({address: address, property: property});
                }
            }
        }
        if (property_select != "land") {
            aircon = $('.air-con').val();
            buildingwidth = $('.building-width').val();
            bed_room = $('.bed-room').val();
            buildingheight = $('.building-height').val();
            bathroom = $('.bathroom').val();
            commentarea = $('.common-area').val();
            living_room = $('.living-room').val();
            dinning_room = $('.dinning-room').val();
            mazzaninefloor = $('.mazzanine-floor').val();
            kitchen = $('.kitchen').val();
            total_build_area = $('.total-building').val();
            aircon = $('.air-con').val();
            parking = $('.parking').val();
            balcony = $('.balcony').val();
            private_area = $('.private_area').val();
            descriptionproperty = $('.description-property').val();
            total_building = $('.total-building').val();

        }
        var data_original = {
            _token: tokent,
            enable_project: enable_project,
            property_title: property_title,
            property_select: property_select,
            sale_or_rent: sale_or_rent,
            unitprice: unitprice,
            show_map: show_map,
            sqm_price: price_p_s,
            project_id: project_id,
            land_width: lan_width,
            land_length: lan_length,
            total_land: total_land,
            st_no: st_no,
            floor_no: no_of_floor,
            house_no: house_no,
            city: city,
            total_building: total_building,
            country: country,
            khan: khan,
            sangkat: sangkat,
            village: phum,
            buildingwidth: buildingwidth,
            bed_room: bed_room,
            buildingheight: buildingheight,
            bathroom: bathroom,
            commentarea: commentarea,
            living_room: living_room,
            dinning_room: dinning_room,
            mazzaninefloor: mazzaninefloor,
            private_area: private_area,
            kitchen: kitchen,


            total_build_area: total_build_area,
            aircon: aircon,
            parking: parking,
            balcony: balcony,
            descriptionproperty: descriptionproperty,
            lat: lat,
            lng: lng,
            location: location
        };
        if (update != false) {
            $.extend(data_original, obj);
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post(url, data_original, function (data) {
            console.log(data);
            validation_property([]);

            if (data.status_code == 200) {
                var formdata = new FormData();
                if (update != false) {
                    notification("Update Property Success", 'ok');
                    formdata.append('id', obj.id);
                } else {
                    notification("Insert Property Success", 'ok');
                    formdata.append('id', data.result.property_id);
                }

                formdata.append('_token', tokent);
                var img_obj = $('.get-image-property').find('.image-plus');
                var obj1 = {formdata: formdata, url: image_url, img_class: img_obj};

                $.ajaxSetup({
                    processData: false,
                    contentType: false,
                    enctype: 'multipart/form-data'
                });
                create_form_image(obj1);
                if (obj1.status_code == 200) {
                    $.post(obj1.url, obj1.formdata, function (data) {
                        var json = JSON.parse(data);
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);

                    }).fail(function (errro) {
                        console.log(errro);
                        if (update != false) {
                            notification("Update Gallery False", 'false');
                        } else {
                            notification("Insert Gallery False", 'false');
                        }
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);

                    });
                }

            } else {
                if (update != false) {
                    notification('Update Property Unsuccess', 'false');
                } else {
                    notification('Insert Property Unsuccess', 'false');
                }
            }
        }).fail(function (error) {
            console.log(error);
            let message = {message: 0};
            validation_property(error.responseJSON.message, message);
            notification(message.message, 'false');
        });

        function validation_property(json, message1=null) {
            loadingmode('off');
            var message = [];
            var obj = $('.property-title');
            if (typeof json.title != "undefined") {
                message.push("* " + json.title);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.title).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.unit-price');
            if (typeof json.unit_price != "undefined") {
                message.push("* " + json.unit_price);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.unit_price).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.pri-per-s');
            if (typeof json.sqm_price != "undefined") {
                message.push("* " + json.sqm_price);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.sqm_price).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.land-width');
            if (typeof json.land_width != "undefined") {
                message.push("* " + json.land_width);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.land_width).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }

            obj = $('.land-length');
            if (typeof json.land_length != "undefined") {
                message.push("* " + json.land_length);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.land_length).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }

            obj = $('.total-area');
            if (typeof json.total_land_area != "undefined") {
                message.push("* " + json.total_land_area);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.total_land_area).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.st-no');
            if (typeof json.street_no != "undefined") {
                message.push("* " + json.street_no);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.street_no).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.phum');
            if (typeof json.village != "undefined") {
                message.push("* " + json.village);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.village).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.lat-number');
            if (typeof json.lat != "undefined") {
                message.push("* " + json.lat);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.lat).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.lnt-number');
            if (typeof json.lng != "undefined") {
                message.push("* " + json.lng);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.lng).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.city_property');
            if (typeof json.city != "undefined") {
                message.push("* " + json.city);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.city).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.country_property');
            if (typeof json.country != "undefined") {
                message.push("* " + json.country);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.country).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.ho-no');
            if (typeof json.house_no != "undefined") {
                message.push("* " + json.house_no);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.house_no).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.khan');
            if (typeof json.district != "undefined") {
                message.push("* " + json.district);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.district).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.sangkat');
            if (typeof json.commune != "undefined") {
                message.push("* " + json.commune);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.commune).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.building-width');
            if (typeof json.building_width != "undefined") {
                message.push("* " + json.building_width);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.building_width).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.building-height');
            if (typeof json.building_height != "undefined") {
                message.push("* " + json.building_height);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.building_height).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }

            obj = $('.air-con');
            if (typeof json.air_conditioner != "undefined") {
                message.push("* " + json.air_conditioner);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.air_conditioner).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.balcony');
            if (typeof json.balcony != "undefined") {
                message.push("* " + json.balcony);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.balcony).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.bathroom');
            if (typeof json.bathroom != "undefined") {
                message.push("* " + json.bathroom);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.bathroom).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.bed-room');
            if (typeof json.bedroom != "undefined") {
                message.push("* " + json.bedroom);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.bedroom).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.common-area');
            if (typeof json.common_area != "undefined") {
                message.push("* " + json.common_area);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.common_area).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.no-of-floor');
            if (typeof json.floor_no != "undefined") {
                message.push("* " + json.floor_no);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.floor_no).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.kitchen');
            if (typeof json.kitchen != "undefined") {
                message.push("* " + json.kitchen);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.kitchen).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.living-room');
            if (typeof json.living_room != "undefined") {
                message.push("* " + json.living_room);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.living_room).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.parking');
            if (typeof json.parking != "undefined") {
                message.push("* " + json.parking);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.parking).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.private_area');
            if (typeof json.private_area != "undefined") {
                message.push("* " + json.private_area);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.private_area).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.dinning-room');
            if (typeof json.dinning_room != "undefined") {
                message.push("* " + json.dinning_room);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.dinning_room).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.total-building');
            if (typeof json.total_building != "undefined") {
                message.push("* " + json.total_building);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.total_building).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            obj = $('.mazzanine-floor');
            if (typeof json.mazzaninefloor != "undefined") {
                message.push("* " + json.mazzaninefloor);
                obj.addClass('is-invalid').removeClass('is-valid');
                obj.closest('.form-group').find('.form-text').text(json.mazzaninefloor).show();
            } else {
                obj.removeClass('is-invalid').addClass('is-valid');
                obj.closest('.form-group').find('.form-text').hide();
            }
            if (message1 != null) {
                message1.message = message.join('<br>');
            }

        }
    }

    doc.on('click', '.update-project', function () {
        var THIS = $(this);

        var id = THIS.attr('data-id');
        var obj = {id: id};

        store_project(THIS, true, obj);

    });
    doc.on('click', '.update-property', function () {
        var THIS = $(this);
        var id = THIS.attr('data-id');
        var obj = {id: id};
        store_prototype(THIS, true, obj);
    });
    doc.on('click', '.save-project', function () {
        var item = $('.item.active').attr('type');
        var THIS = $(this);
        switch (item) {
            case "project":
                store_project(THIS);
                break;
            case "property":
                store_prototype(THIS);
                break;

        }

    });
    project_name_in_property();

    function project_name_in_property() {
        var check = $('#enable_project_name:checked').val();
        if (check == "on") {
            $('.project_use').slideDown();
        } else {
            $('.project_use').slideUp();

        }
    }

    doc.on('click', '#enable_project_name', function () {
        project_name_in_property();
    });

    function store_project(THIS, update=false, obj=null) {
        loadingmode('on');
        var tokenb = $('meta[name="csrf-token"]').attr('content');
        var image_url = THIS.attr('data-image');
        var pro_type = $('select[name="projectType"]').val();
        var pro_title = $('.project-title').val();
        var buil_date = $('.buil-date').val();
        var complete_date = $('.complete-date').val();
        var grr = $('.grr').val();
        var downpay = $('.down-payment').val();
        var sale_rent = $('.sale-rent').val();
        var total_price = $('.total-price').val();
        var from_price = $('.from-price').val();
        var to_price = $('.to-price').val();
        var pri_s = $('.pri-s').val();
        var country = $('.country-select').val();
        var country_name = JSON.parse(country).name;
        var country_id = JSON.parse(country).id;
        var city = $('.city-select').val();
        var address1 = $('.address1').val();
        var address2 = $('.address2').val();
        var baseinfo = $('#editor').find('.ql-editor').html();
        var featuretitle = $('.feature-title').val();
        var featureinfo = $('#editor1').find('.ql-editor').html();
        var lenpropertytype = $('.property-type').find('.item-list').length;
        var url = THIS.attr('datasrc');
        var tower = [];
        var propertytype = [];
        if (pro_type == 1) {
            for (var i = 0; i < lenpropertytype; i++) {
                var check = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="type"]').val();
                if (check != "") {
                    var name = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="type"]').val();
                    var bedroom = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="bedroom"]').val();
                    var bathroom = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="bathroom"]').val();
                    var floor = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="floor"]').val();
                    var packing = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="packing"]').val();
                    var width = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="width"]').val();
                    var height = $('.property-type').find('.item-list:eq(' + i + ')').find('input[name="height"]').val();
                    var prty = {
                        name: name,
                        bedroom: bedroom,
                        bathroom: bathroom,
                        floor: floor,
                        height: height,
                        packing: packing,
                        width: width
                    };
                    if (update != false) {
                        var id = $('.property-type').find('.item-list').eq(i).find('.id_property_type').val();
                        $.extend(prty, {id: id})
                    }
                    propertytype.push(prty);
                }
            }
        } else if (pro_type == 2) {
            var len = $('.tower-item').length;
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var result = $('.tower-item:eq(' + i + ')').val();
                    if (result != "") {
                        var id = 0;
                        if (update != false) {
                            id = $('.tower-item').eq(i).attr('id');
                        }
                        tower.push({id: id, type: result});
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
        var dd = {
            _token: tokenb,
            pro_type: pro_type,
            title: pro_title,
            buil_date: buil_date,
            grr: grr,
            downpay: downpay,
            sale_rent: sale_rent,
            total_price: total_price,
            country_name: country_name,
            country_id: country_id,
            pri_s: pri_s,
            from_price: from_price,
            to_price: to_price,
            country: country,
            city: city,
            address1: address1,
            address2: address2,
            baseinfo: baseinfo,
            complete_date: complete_date,
            featuretitle: featuretitle,
            featureinfo: featureinfo,
            propertytype: propertytype,
            tower: tower
        };
        if (update != false) {
            var id_feature = $('.feature-title').attr('id');
            $.extend(dd, {id: obj.id, feature_id: id_feature});
        }
        ;


        $.post(url, dd, function (data) {
            if (data.status_code == 200) {
                if (update != false) {
                    var message = {
                        message_true: "Update Successfully",
                        message_false: "Update Unsuccessfuly",
                        next: THIS.attr('next-link')
                    };
                    upload_image(data, image_url, data.result.id, message);
                } else {
                    var message = {
                        message_true: "Insert Successfully",
                        message_false: "Insert Unsuccessfuly",
                        next: THIS.attr('next-link')
                    };
                    upload_image(data, image_url, data.result.id, message);
                }
            }
            validation();
        }).fail(function (error) {

            loadingmode('off');
            var json = error.responseJSON;
            var message = validation(json.message);
            notification(message, 'false');
        });

    }

    function search_mode(search) {
        if (search != "") {
            loadingmode('on');
            var link = get_link(null, null, search);
            var url = window.location.href.split('?')[0];
            window.history.pushState({}, '', "?" + link);
            $.get(url + "?" + link, {}, function (data) {
                $('.change-row').html($(data).find('.change-row').html());
                loadingmode('off');
            });
        }
    }

    function change_type(type) {
        var len = $('.list-search').find('.item').length;
        var activelen = $('.list-search').find('.active').length;


        if (type > 0) {
            if (activelen > 0) {

                var index = parseInt($('.list-search').find('.active').attr('itemtype')) + 1;
                if (index > len - 1) {
                    index = 0;
                }
                $('.list-search .item').removeClass('active');
                var obj = $('.list-search .item:eq(' + index + ')');
                obj.addClass('active');
                $('.search-user-option').val(obj.text());

            } else {
                var obj = $('.list-search .item:eq(0)');
                obj.addClass('active');
                $('.search-user-option').val(obj.text());
            }


        } else {


            if (activelen > 0) {
                var index = parseInt($('.list-search').find('.active').attr('itemtype')) - 1;
                if (index < 0) {
                    index = len - 1;
                }
                $('.list-search .item').removeClass('active');
                $('.list-search .item:eq(' + index + ')').addClass('active');
                var obj = $('.list-search .item:eq(' + index + ')');
                obj.addClass('active');
                $('.search-user-option').val(obj.text());

            } else {
                var obj = $('.list-search .item:eq(0)');
                obj.addClass('active');
                $('.search-user-option').val(obj.text());
            }

        }

    }

    function dataURLtoFile(dataurl, filename) {
        var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
        while (n--) {
            u8arr[n] = bstr.charCodeAt(n);
        }
        return new File([u8arr], filename, {type: mime});
    }

    function randomstr(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result + "-" + $.now();
    }
    var delete_project = {};
    doc.on('click', '.delete-project', function (e) {
        var id = $(this).closest('.item-project').find('.id_project').attr('id');
        var status = "false";
        var url = $(this).attr('datasrc');
        delete_project.url = url;
        delete_project.status = "false";
        delete_project.id_project = id;
        delete_project.status = status;
        v.alert.set({
            title:"Waning",
            message:"Are Your Want Delete ?",
            button:"action-btn-project",
            buttontxt:"Delete"
        })
    });

    doc.on('click', '.action-btn-project', function () {
        var url = delete_project.url;
        var status = delete_project.status;
            var id = delete_project.id_project;

            $.post(url, {_token: tokent, id: id, status: status}, function (data) {
                if (data.status_code == 200) {
                    notification('change Successfuly', 'ok');
                    $.get(window.location.href, {}, function (data) {
                        var data = $(data).find('.card-body').html();
                        $('.card-body').html(data);
                    });
                } else {
                    notification('can`t change status', 'false');
                }

            }).fail(function (data) {
                console.log(data);
                notification('can`t change status', 'false');

            });

    });

    function popup_message(message, title, type, cls=null) {
        $('.popup-model').fadeIn(300).attr('type', type);
        var check = false;
        $('body').css('overflow', 'hidden');
        var color;

        switch (title) {
            case "Waning":
                color = "#b30404";
                break;
            default :
                color = "#03a9f3";

        }
        $('.popup-model').find('.title').text(title).css('background-color', color);
        $('.popup-model').find('.body').text(message);
        $('.btn-custom').css('background-color', color);


        doc.on('click', '.action-btn-project', function () {
            $(this).closest('.popup-model').fadeOut(300);
            $('body').css('overflow', 'auto');

        });
        doc.on('click', '.cancel-btn', function () {
            $(this).closest('.popup-model').fadeOut(300);
            $('body').css('overflow', 'auto');

        });
        if (cls != null) {
            $('.action-btn').removeClass().addClass('btn-custom ' + "action-btn-" + cls);
        }
    }

    doc.on('click', '.custom-pagination-property li.page-item-list a', function (e) {
        e.preventDefault();
        var page = $(this).attr('tabindex');
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.page = page;
        check_parameter_property(json);
        refresh_data(json);

    });
    doc.on('click', '.custom-pagination li.page-item-list a', function (e) {
        e.preventDefault();
        var url = window.location.href.split('?');
        var page = $(this).attr('tabindex');
        var str = get_url('', page);
        history.pushState({}, '', "?" + str);
        loadingmode('on');
        $.get(url[0] + "?" + str, {}, function (data) {
            var element = $(data).find('.card-body').html();
            $('.card-body').html(element);
            loadingmode('off');
        });

    });

    function get_url(limit=false, page=false, search=false, other=false) {
        var parameter = JSON.parse($('.parameter').attr('content'));
        var str = "";

        if (parameter.page != undefined && page == false) {
            str += "&page=" + parameter.page;
        } else {
            if (page != false) {
                str += "&page=" + page;
            }

        }
        if (parameter.limit != undefined && limit == false) {
            str += "&limit=" + parameter.limit;
        } else {
            if (limit != false) {
                str += "&limit=" + limit;
            }

        }
        if (parameter.search != undefined && search == false) {
            str += "&search=" + parameter.search;
        } else {
            if (search != false) {
                str += "&search=" + search;
            }
        }
        if (parameter.country != undefined && other.country == undefined) {
            str += "&country=" + parameter.country;
        } else {
            if (other.country != undefined) {
                str += "&country=" + other.country;
            }
        }
        if (parameter.city != undefined && other.city == undefined) {
            str += "&city=" + parameter.city;
        } else {
            if (other.city != undefined) {
                str += "&city=" + other.city;
            }
        }
        if (parameter.project_type != undefined && other.project_type == undefined) {
            str += "&project_type=" + parameter.project_type;
        } else {
            if (other.project_type != undefined) {
                str += "&project_type=" + other.project_type;
            }
        }
        if (parameter.sall_or_rent != undefined && other.sall_or_rent == undefined) {
            str += "&sall_or_rent=" + parameter.sall_or_rent;
        } else {
            if (other.sall_or_rent != undefined) {
                str += "&sall_or_rent=" + other.sall_or_rent;
            }
        }
        if (parameter.room_select != undefined && other.room_select == undefined) {
            str += "&room_select=" + parameter.room_select;
        } else {
            if (other.room_select != undefined) {
                str += "&room_select=" + other.room_select;
            }
        }
        if (parameter.min_price != undefined && other.min_price == undefined) {
            str += "&min_price=" + parameter.min_price;
        } else {
            if (other.min_price != undefined) {
                str += "&min_price=" + other.min_price;
            }
        }
        if (parameter.max_price != undefined && other.max_price == undefined) {
            str += "&max_price=" + parameter.max_price;
        } else {
            if (other.max_price != undefined) {
                str += "&max_price=" + other.max_price;
            }
        }
        var url = window.location.href.split('?')[0];
        loadingmode('on');
        $.get(url + "?" + str, {}, function (data) {
            var element = $(data).find('.card-body').html();
            $('.card-body').html(element);
            loadingmode('off');
        });

        return str;
    }

    doc.on('change', '.limit-page', function () {
        var limit = $(this).val();
        var str = get_url(limit);
        window.history.pushState({}, '', '?' + str);
        var url = window.location.href.split('?')[0];
        loadingmode('on');
        $.get(url + "?" + str, {}, function (data) {
            var element = $(data).find('.card-body').html();
            $('.card-body').html(element);
            loadingmode('off');
        });
    });
    doc.on('keypress', '.search-project-listing', function (e) {
        if (e.key == "Enter") {
            search_project();
        }
    });
    doc.on('click', '.goto-search', function () {
        search_project();
    });

    function search_project() {
        var data = $('.search-project-listing').val();
        if (data != "") {
            var url = window.location.href.split('?')[0];
            var str = get_url('', '', data);
            loadingmode('on');
            window.history.pushState({}, '', "?" + str);
            $.get(url + "?" + str, {}, function (data) {
                var element = $(data).find('.card-body').html();
                $('.card-body').html(element);
                loadingmode('off');
            });
        } else {
            notification("invalid Search", 'false')
        }

    }

    /* Fillter */
    doc.on('change', '.country', function () {
        var data = $(this).val();
        var str = get_url('', '', '', {country: data});
        window.history.pushState({}, '', curren_url + str);
    });
    doc.on('change', '.city', function () {
        var data = $(this).val();
        console.log(data);
        var str = get_url('', '', '', {city: data});
        window.history.pushState({}, '', curren_url + str);
    });
    doc.on('change', '.project_type', function () {
        var data = $(this).val();
        console.log(data);
        var str = get_url('', '', '', {project_type: data});
        window.history.pushState({}, '', curren_url + str);
    });
    doc.on('change', '.sall_or_rent', function () {
        var data = $(this).val();
        console.log(data);
        var str = get_url('', '', '', {sall_or_rent: data});
        window.history.pushState({}, '', curren_url + str);
    });
    doc.on('change', '.room-select', function () {
        var data = $(this).val();
        console.log(data);
        var str = get_url('', '', '', {room_select: data});
        window.history.pushState({}, '', curren_url + str);
    });
    doc.on('focusout', '.min-price', function () {
        var data = $(this).val();
        console.log(data);
        var str = get_url('', '', '', {min_price: data});
        window.history.pushState({}, '', curren_url + str);
    });
    doc.on('focusout', '.max-price', function () {
        var data = $(this).val();
        console.log(data);
        var str = get_url('', '', '', {max_price: data});
        window.history.pushState({}, '', curren_url + str);
    });
    /* End Fillter */
    /* Filter Property Listing */

    doc.on('change', '.limit-property', function () {
        var limit = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.limit = limit;
        check_parameter_property(json);
        refresh_data(json);


    });
    doc.on('change', '.project_id', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.project_id = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.property-country', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.country_id = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.city_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.city_id = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.district_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.district = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.commune_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.commune = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.property_types_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.property_type = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.sale_of_rent_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.sale_or_rent = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('focusout', '.min_price_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.min_price = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('focusout', '.max_price_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.max_price = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.bathroom_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.bathroom = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.bedroom_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.bedroom = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('change', '.sale_of_rent_filter', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.sale_or_rent = data;
        check_parameter_property(json);
        refresh_data(json);
    });
    doc.on('keypress', '.data-search-property', function (e) {
        if (e.key == "Enter") {
            search_property();
        }
    });
    doc.on('click', '.search-property', function () {
        search_property();
    });

    function search_property() {
        var data = $('.data-search-property').val();
        if (data != "") {
            var in_parameter = $('.parameter').attr('content');
            var json = JSON.parse(in_parameter);
            json.search = data;
            check_parameter_property(json);
            refresh_data(json);
        } else {
            notification("invalid Search", 'false');
        }
    }

    function refresh_data(json) {
        loadingmode('on');
        $.get(json.current_url + "?" + json.result, {}, function (data) {
            var newdata = $(data).find('.card-body').html();
            $('.card-body').html(newdata);
            loadingmode('off');
        });
    }

    function check_parameter_property(json=[]) {
        var current_url = window.location.href.split('?')[0];
        var query = [];
        if (typeof json.limit != "undefined" && json.limit != null) {
            query.push("limit=" + json.limit);
        }
        if (typeof json.country_id != "undefined" && json.country_id != null) {
            query.push("country_id=" + json.country_id);
        }
        if (typeof json.city_id != "undefined" && json.city_id != null) {
            query.push("city_id=" + json.city_id);
        }
        if (typeof json.project_id != "undefined" && json.project_id != null) {
            query.push("project_id=" + json.project_id)
        }
        if (typeof json.page != "undefined" && json.page != null) {
            query.push("page=" + json.page);
        }
        if (typeof json.search != "undefined" && json.search != null) {
            query.push("search=" + json.search);
        }
        if (typeof json.district != "undefined" && json.district != null) {
            query.push("district=" + json.district);
        }
        if (typeof json.commune != "undefined" && json.commune != null) {
            query.push('commune=' + json.commune);
        }
        if (typeof json.property_type != "undefined" && json.property_type != null) {
            query.push('property_type=' + json.property_type);
        }
        if (typeof json.sale_or_rent != "undefined" && json.sale_or_rent != null) {
            query.push('sale_or_rent=' + json.sale_or_rent);
        }
        if (typeof json.min_price != "undefined" && json.min_price != null) {
            query.push('min_price=' + json.min_price);
        }
        if (typeof json.max_price != "undefined" && json.max_price != null) {
            query.push('max_price=' + json.max_price);
        }
        if (typeof json.bathroom != "undefined" && json.bathroom != null) {
            query.push('bathroom=' + json.bathroom);
        }
        if (typeof json.bedroom != "undefined" && json.bedroom != null) {
            query.push('bedroom=' + json.bedroom);
        }

        json.current_url = current_url;
        json.result = query.join('&');
        window.history.pushState({}, "", current_url + "?" + json.result);

    }

    /* End Filter Property Listing*/

    /* Add mi */

    obj_function.country_property = function (element) {
        return country_show_property(element);
    };

    function country_show_property(THIS) {
        var country_i = JSON.parse($(THIS).val()).id;
        var url = $(THIS).attr('datasrc');
        var cr = $('.city_property').attr('data-set');
        get_city(country_i, url, '.city_property', cr);
    }


    obj_function.country_show_project = function (element) {
        return country_show(element);
    };

    function country_show(THIS) {
        var country_id = JSON.parse($(THIS).val()).id;
        var url = $(THIS).attr('datasrc');
        var cr = $('.city-select').attr('data-value');
        get_city(country_id, url, '.city-select', cr);

    }

    doc.on('change', '.country_property', function () {
        var country_id = JSON.parse($(this).val()).id;
        var url = $(this).attr('datasrc');
        get_city(country_id, url, '.city_property');
    });
    doc.on('change', '.country-select', function () {
        country_show(this);
    });

    function get_city(country_id, url, output, select=null) {
        var act = "";
        $.get(url, {country_id: country_id}, function (data) {
            if (data.status_code == 200) {
                $(output).html('<option value="">-- Please Select City --</option>');
                data.result.forEach(function (item, index) {
                    if (select != null) {
                        if ((item.name).toLowerCase() == select.toLowerCase()) {
                            act = "selected='selected'";
                        } else {
                            act = "";
                        }
                    }
                    var option = "<option value='" + item.id + "' " + act + ">" + item.name + "</option>";
                    $(output).append(option);
                });
            }

        });

    }

    /* End Add Project*/
    /* Property Listing */
    doc.on('click', '.delete-property', function () {
        var id = $(this).attr('id');
        var status = "false";
        var url = $(this).attr('datasrc');
        console.log(url, id);
        $('.popup-model').find('.action-btn-property')
            .attr('datasrc', url)
            .attr('id_project', id)
            .attr('status', status);
        popup_message('Are Want to Delete ? ', 'Waning', 'change-status');

    });
    doc.on('click', '.action-btn-property', function () {
        var id = $(this).attr('id_project');
        var url = $(this).attr('datasrc');
        $.post(url + "/" + id, {_token: tokent}, function (data) {
            var response = JSON.parse(data);
            if (response.status_code == 200) {
                $('.popup-model').fadeOut();
                var in_parameter = $('.parameter').attr('content');
                var json = JSON.parse(in_parameter);
                check_parameter_property(json);
                refresh_data(json);
                notification("Delete Property Successfully", 'ok');
            } else {
                notification("Delete Property Unsuccess", "false");
            }
        }).fail(function (error) {
            console.log(error);
        });
    });
    /* End Property Listing */
    /* Event Function */
    doc.on('click', '.save-event', function () {
        var THIS = $(this);
        event_process('', THIS);
    });
    doc.on('click', '.update-event', function () {
        var THIS = $(this);
        event_process(true, THIS);
    });
    doc.on('click', '.save-banner', function () {
        var THIS = $(this);
        banner_process(true, THIS);
    });

    function banner_process(update=false, element) {
        var data = new FormData();
        var title = $('.title-banner').val();
        var url = element.attr('datasrc');
        var check = $('.receive-background').attr('check_image');
        data.append('title', title);
        if (check == "true") {
            var thum = $('.receive-background').css('background-image');
            var thumnew = thum.split('"')[1];
            var file = dataURLtoFile(thumnew, randomstr(20));
            var type1 = file.type.substr(6, file.type.length);
            data.append('file', file, randomstr(20) + "." + type1);
        }
        $.ajaxSetup({
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': tokent
            }
        });
        $.post(url, data, function (result) {
            if (result.status_code == 200) {
                validation_banner([]);
                notification('Insert Banner Successfully', 'ok');
            }
        }).fail(function (errro) {
            console.log(errro);
            validation_banner(errro.responseJSON.message);
        });


    }

    function validation_banner(json) {
        var message = [];
        if (typeof json.title != "undefined") {
            $('.title-banner')
                .addClass('is-invalid')
                .removeClass('is-valid')
                .closest('.form-group')
                .find('.has-error-text')
                .text(json.title)
                .show();
            message.push("* " + json.title);
        } else {
            $('.title-banner')
                .removeClass('is-invalid')
                .addClass('is-valid')
                .closest('.form-group')
                .find('.has-error-text')
                .hide();
        }

        if (typeof json.file != "undefined") {
            $('.receive-background').css('border', '1px solid #901e1e')
                .closest('.row')
                .find('.message')
                .css('color', '#901e1e')
                .text('Please Select Image')
                .show();
            message.push("* " + json.file);
        } else {
            $('.receive-background').css('border', 'none')
                .closest('.row')
                .find('.message')
                .hide();
        }
        if (Object.keys(json).length > 0) {
            notification(message.join('<br>'));
        }
    }

    function event_process(update=false, element) {
        var data = new FormData();
        var title = $('.title-event').val();
        var event_date = $('.event-date').val();
        var des = $('#des-event').find('.ql-editor').html();
        var url = element.attr('datasrc');
        var check = $('.receive-background').attr('check_image');
        if (update != false) {
            var id = $('.id-event').val();
            data.append('id', id);
        }
        data.append('title', title);
        data.append('event_date', event_date);
        data.append('description', des);
        if (check == "true") {
            var thum = $('.receive-background').css('background-image');
            var thumnew = thum.split('"')[1];
            var file = dataURLtoFile(thumnew, randomstr(20));
            var type1 = file.type.substr(6, file.type.length);
            data.append('file', file, randomstr(20) + "." + type1);
        }
        $.ajaxSetup({
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            headers: {
                'X-CSRF-TOKEN': tokent
            }
        });
        $.post(url, data, function (result) {
            if (result.status_code == 200) {
                validation_event([]);
                if (update != true) {
                    notification('Insert Event Successfully', 'ok');
                } else {
                    notification('Update Event Successfully', 'ok')
                }
            }
        }).fail(function (errro) {
            console.log(errro);
            validation_event(errro.responseJSON.message);
        });


    }

    function validation_event(json) {
        var message = [];
        if (typeof json.title != "undefined") {
            $('.title-event')
                .addClass('is-invalid')
                .removeClass('is-valid')
                .closest('.form-group')
                .find('.has-error-text')
                .text(json.title)
                .show();
            message.push("* " + json.title);
        } else {
            $('.title-event')
                .removeClass('is-invalid')
                .addClass('is-valid')
                .closest('.form-group')
                .find('.has-error-text')
                .hide();
        }

        if (typeof json.event_date != "undefined") {
            $('.event-date')
                .addClass('is-invalid')
                .removeClass('is-valid')
                .closest('.form-group')
                .find('.has-error-text')
                .text(json.event_date)
                .show();
            message.push("* " + json.event_date);
        } else {
            $('.event-date')
                .removeClass('is-invalid')
                .addClass('is-valid')
                .closest('.form-group')
                .find('.has-error-text')
                .hide();
        }


        if (typeof json.file != "undefined") {
            $('.receive-background').css('border', '1px solid #901e1e')
                .closest('.row')
                .find('.message')
                .css('color', '#901e1e')
                .text('Please Select Image')
                .show();
            message.push("* " + json.file);
        } else {
            $('.receive-background').css('border', 'none')
                .closest('.row')
                .find('.message')
                .hide();
        }

        if (Object.keys(json).length > 0) {
            notification(message.join('<br>'));
        }


    }

    var index;
    doc.on('click', '.cancel-enable', function () {
        v.switchButton.setcheck({
            fill: index,
            status: false
        })
    });
    doc.on('click', '.cancel-disable', function () {
        v.switchButton.setcheck({
            fill: index,
            status: true
        })
    });

    doc.on('change', '.status_check', function () {

        var check = v.switchButton.getcheck({fill: this});
        index = this;
        if (check.check) {
            v.alert.set({
                title: "Message",
                message: "Are You Want To Enable Event ?",
                button: "action-enable-event",
                buttontxt: "Enable",
                buttonCancel: "cancel-enable"
            });
        } else {
            v.alert.set({
                title: "Waning",
                message: "Are You Want To Disable Event ?",
                button: "action-delete-event",
                buttontxt: "Disable",
                buttonCancel: "cancel-disable"
            });
        }
    });
    doc.on('click', '.action-enable-banner', function () {
        check_status_banner(true);
    });
    doc.on('click', '.action-delete-banner', function () {
        check_status_banner(false);
    });
    doc.on('change', '.banner_check', function () {
        var check = v.switchButton.getcheck({fill: this});
        index = this;
        if (check.check) {
            v.alert.set({
                title: "Message",
                message: "Are You Want To Enable Banner ?",
                button: "action-enable-banner",
                buttontxt: "Enable",
                buttonCancel: "cancel-enable"
            });
        } else {
            v.alert.set({
                title: "Waning",
                message: "Are You Want To Disable Banner ?",
                button: "action-delete-banner",
                buttontxt: "Disable",
                buttonCancel: "cancel-disable"
            });
        }
    });

    function check_status_banner(check) {
        var id = $(index)
            .closest('.odd')
            .find('.banner_id')
            .text();
        var url = $('.delete-banner-link').attr('datasrc');
        loadingmode('on');
        $.post(url + "/" + id, {_token: tokent, status: check}, function (result) {
            console.log(result);
            if (typeof result.status_code != "undefined" && result.status_code == 200) {
                window.location.reload();
            } else {
                notification('Delete Banner False', 'false');
            }
        }).fail(function (error) {
            notification('Delete Banner False', 'false');
            console.log(error);
            loadingmode('off');
        });
    }

    doc.on('click', '.action-delete-event', function () {
        change_status(false);
    });
    doc.on('click', '.action-enable-event', function () {
        change_status(true);
    });

    function change_status(check) {
        var id = $(index).closest('.odd').find('#event_id').text();
        var url = $('.delete-event-link').attr('datasrc');
        loadingmode('on');
        $.post(url + "/" + id, {_token: tokent, status: check}, function (result) {
            if (typeof result.status_code != "undefined" && result.status_code == 200) {
                window.location.reload();
            } else {
                notification('Delete Event False', 'false');
            }

        }).fail(function (error) {
            console.log(error);
            loadingmode('off');
        });
    }


    doc.on('change', '.status-list-event', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.status = data;
        var page = check_parameter_event(json);
        window.open(page, '_self');
    });
    doc.on('change', '.limit-list-event', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.limit = data;
        var page = check_parameter_event(json);

        window.open(page, '_self');
    });

    function check_parameter_event(json={}) {
        var current_url = window.location.href.split('?')[0];
        var query = [];
        if (typeof json.limit != "undefined") {
            query.push("limit=" + json.limit);
        }
        if (typeof json.status != "undefined") {
            query.push("status=" + json.status);
        }
        var result = current_url + "?" + query.join('&');
        return result;
    }


    /* End Event Function */

    /* Banner Function */
    doc.on('change', '.banner-limit', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.limit = data;
        var page = check_parameter_event(json);
        window.open(page, '_self');
    });
    doc.on('change', '.banner-status', function () {
        var data = $(this).val();
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.status = data;
        var page = check_parameter_event(json);
        window.open(page, '_self');
    });
    /* End Banner Function */
    /* User Project */
    doc.on('change','.limit-user-project',function () {
        var data = $(this).val();
        console.log(data);
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.status = data;
        var page = check_parameter_user_project(json);
        window.open(page, '_self');
    });
    doc.on('change','.status-user-project',function () {
        var data = $(this).val();
        console.log(data);
        var in_parameter = $('.parameter').attr('content');
        var json = JSON.parse(in_parameter);
        json.status = data;
        var page = check_parameter_user_project(json);
        window.open(page, '_self');
    });

    doc.on('keyup','.search-name-user-project',function () {
        var data = $(this).val();
        var url  = $(this).attr('datasrc');
        $.post(url,{search:data,_token:tokent},function (data) {
            if(typeof data.result !="undefined"){
                $('#project-list-search').empty();
                data.result.forEach(function (item) {
                    $('#project-list-search').append('<option>'+ item.name +'</option>');
                });
            }
        });
    });

    function check_parameter_user_project(json={}) {
        var current_url = window.location.href.split('?')[0];
        var query = [];
        if (typeof json.limit != "undefined") {
            query.push("limit=" + json.limit);
        }
        if (typeof json.status != "undefined") {
            query.push("status=" + json.status);
        }
        if (typeof json.search != "undefined") {
            query.push("search=" + json.search);
        }
        var result = current_url + "?" + query.join('&');
        return result;
    }
    doc.on('keypress','.search-name-user-project',function (e) {
        if(e.key=="Enter"){
            search_project_use();
        }
        
    });
    doc.on('click','.action-search-project-user-title',function () {
        search_project_use();
    });
    function search_project_use() {
        var data = $('.search-name-user-project').val();
        if(data!=""){
            var in_parameter = $('.parameter').attr('content');
            var json = JSON.parse(in_parameter);
            json.search = data;
            var page = check_parameter_user_project(json);
            window.open(page, '_self');
        }else{
            notification('Invalid Search','false');
        }

    }

    doc.on('change','.custom-btn-project-user',function () {
     var check =   v.switchButton.getcheck({
            fill:this
       });
     index = this;
     var id = $(this).closest('tr').find('.odd').text();
     delete_project.url = $('.link-change-status').attr('datasrc');
     delete_project.id_project = $(this).closest('tr').find('.odd').text();
     if(check.check){
         v.alert.set({
             title:"Message",
             message:"Are You want to Enable ?",
             button:"action-enable-project-user",
             buttontxt:"Enable",
             buttonCancel:"cancel-project-user-enable"
         });
         delete_project.status = "true";
     }else{
        v.alert.set({
            title:"Waning",
            message:"Are You want to Disable ?",
            button:"action-disable-project-user",
            buttontxt:"Disable",
            buttonCancel:"cancel-project-user-disable"
        });
         delete_project.status = "false";
     }
     console.log(delete_project);
    });

    doc.on('click','.cancel-project-user-disable',function (){
        v.switchButton.setcheck({
            fill:index,
            status:true
        });
    });
    doc.on('click','.cancel-project-user-enable',function (){
        v.switchButton.setcheck({
            fill:index,
            status:false
        });
    });
    doc.on('click','.action-disable-project-user',function () {
        delete_user_project(false);
    });
    doc.on('click','.action-enable-project-user',function () {

    });
    
    function delete_user_project(status) {
        var url = delete_project.url;
        var status = delete_project.status;
        var id = delete_project.id_project;
        loadingmode('on');
        $.post(url, {_token: tokent, id: id, status: status}, function (data) {
            loadingmode('off');
            console.log(data);
            if (data.status_code == 200) {
                if(status!==true){
                    notification('Disable Project Successfuly', 'ok');
                }else{
                    notification('Enable Project Successfuly', 'ok');
                }

                /* window.open(window.location.href,'_self');*/
            } else {
                if(status!==true){
                    notification('can`t Disable Project', 'false');
                }else{
                    notification('can`t Enable Project', 'false');
                }

            }

        }).fail(function (data) {
            /*console.log(data);*/
            loadingmode('off');
            if(status!==true){
                notification('can`t Disable Project', 'false');
            }else{
                notification('can`t Enable Project', 'false');
            }

        });
        
    }


    /* End User Project*/

});

