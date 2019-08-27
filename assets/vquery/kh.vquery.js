var v = {};
$(document).ready(function () {
    var len = $('.v-switch-button').length;
    for(var i=0;i<len;i++){
        var element = $('.v-switch-button').eq(i);

        if(typeof  element.attr('checked')!="undefined"){
            element.html(' <label class="switch">\n' +
                '<input type="checkbox" class="event-status" checked>\n' +
                '<span class="slider round move-right"></span>\n' +
                '</label>');

        }else{
            element.html(' <label class="switch">\n' +
                '<input type="checkbox" class="event-status">\n' +
                '<span class="slider round move-left"></span>\n' +
                '</label>');
        }

    }

    $('body').append('<div class="tage-vquery"></div>');
    var str = "<div class=\"background-mode popup-model\" status=\"false\" type=\"change-status\">\n" +
        "    <div class=\"main-layout-alert\">\n" +
        "        <div class=\"title\" style=\"background-color: rgb(179, 4, 4);\"></div>\n" +
        "        <div class=\"body\"></div>\n" +
        "        <div class=\"footer-alert\">\n" +
        "            <span class=\"btn-custom cancel-btn\" style=\"background-color: rgb(179, 4, 4);\">Cancel</span>\n" +
        "            <span class=\"btn-custom action-btn\" style=\"background-color: rgb(179, 4, 4);\"></span>\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>";
   $('.tage-vquery').append(str);
});
$(document).on('click','.action-btn',function () {
    $('.main-layout-alert')
        .removeClass('fadeInDown')
        .addClass('fadeOutUp');
    $('.popup-model').fadeOut();
    $('body').css('overflow', 'auto');
});
$(document).on('click', '.cancel-btn', function () {
    $(this).closest('.popup-model').fadeOut(300);
    $('.main-layout-alert').removeClass('fadeInDown').addClass('fadeOutUp');
    $('body').css('overflow', 'auto');

});
v.public_parameter = {};
v.popupmessage = function(message, title,cls=null,buttontxt=null,buttonCancel=null){
    var doc = $(document);
        $('.popup-model').fadeIn(300);
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

        if(cls!=null){
            $('.action-btn')
                .removeClass()
                .addClass('btn-custom action-btn '+cls)

        }
        if(buttontxt!=null) {
            $('.action-btn').text(buttontxt);
        }else{
            $('.action-btn').text('OK');
        }
        if(buttonCancel!=null){
            $('.cancel-btn')
                .removeClass()
                .addClass('btn-custom cancel-btn '+buttonCancel);
        }

};
v.loadingmode = {
    touch: true,
    loading: function (option={}) {
        if (typeof option.turn != "undefined" && option.turn == "off") {
            this.touch = false;
        } else {
            this.touch = true;
        }
        console.log(this.touch);

        if (this.touch) {
            $(document).ready(function () {
                $('body').append('<div id="v-loading">\n' +
                    '    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwcHgiICBoZWlnaHQ9IjIwMHB4IiAgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pZFlNaWQiIGNsYXNzPSJsZHMtcmlwcGxlIiBzdHlsZT0iYmFja2dyb3VuZDogbm9uZTsiPjxjaXJjbGUgY3g9IjUwIiBjeT0iNTAiIHI9IjI3LjE4MjMiIGZpbGw9Im5vbmUiIG5nLWF0dHItc3Ryb2tlPSJ7e2NvbmZpZy5jMX19IiBuZy1hdHRyLXN0cm9rZS13aWR0aD0ie3tjb25maWcud2lkdGh9fSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2Utd2lkdGg9IjIiPjxhbmltYXRlIGF0dHJpYnV0ZU5hbWU9InIiIGNhbGNNb2RlPSJzcGxpbmUiIHZhbHVlcz0iMDs0MCIga2V5VGltZXM9IjA7MSIgZHVyPSIxIiBrZXlTcGxpbmVzPSIwIDAuMiAwLjggMSIgYmVnaW49Ii0wLjVzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSI+PC9hbmltYXRlPjxhbmltYXRlIGF0dHJpYnV0ZU5hbWU9Im9wYWNpdHkiIGNhbGNNb2RlPSJzcGxpbmUiIHZhbHVlcz0iMTswIiBrZXlUaW1lcz0iMDsxIiBkdXI9IjEiIGtleVNwbGluZXM9IjAuMiAwIDAuOCAxIiBiZWdpbj0iLTAuNXMiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIj48L2FuaW1hdGU+PC9jaXJjbGU+PGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgcj0iMy45NDgyOSIgZmlsbD0ibm9uZSIgbmctYXR0ci1zdHJva2U9Int7Y29uZmlnLmMyfX0iIG5nLWF0dHItc3Ryb2tlLXdpZHRoPSJ7e2NvbmZpZy53aWR0aH19IiBzdHJva2U9IiNlZGVkZWQiIHN0cm9rZS13aWR0aD0iMiI+PGFuaW1hdGUgYXR0cmlidXRlTmFtZT0iciIgY2FsY01vZGU9InNwbGluZSIgdmFsdWVzPSIwOzQwIiBrZXlUaW1lcz0iMDsxIiBkdXI9IjEiIGtleVNwbGluZXM9IjAgMC4yIDAuOCAxIiBiZWdpbj0iMHMiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIj48L2FuaW1hdGU+PGFuaW1hdGUgYXR0cmlidXRlTmFtZT0ib3BhY2l0eSIgY2FsY01vZGU9InNwbGluZSIgdmFsdWVzPSIxOzAiIGtleVRpbWVzPSIwOzEiIGR1cj0iMSIga2V5U3BsaW5lcz0iMC4yIDAgMC44IDEiIGJlZ2luPSIwcyIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiPjwvYW5pbWF0ZT48L2NpcmNsZT48L3N2Zz4=">\n' +
                    ' </div>');
                jQuery('#v-loading').fadeIn();
            });

        } else {
            $(document).ready(function () {
                $('#v-loading').fadeOut();
            });
        }
    }
};
v.ValidateBootstrap = {
    getvalidate: function (option={}) {
        if (typeof option.dataset != "undefined") {
            option.dataset.forEach(function (item) {
                if (typeof item.message == "undefined") {
                    item.message = null;
                }
                if (item.message != null) {
                    $(document).ready(function () {

                        $(item.fill)
                            .closest('.form-group')
                            .find('.help-block')
                            .remove();
                        $(item.fill)
                            .addClass('is-invalid')
                            .closest('.form-group')
                            .append('<span class="help-block" style="display: block;color:rgb(230, 15, 47) !important;padding: 5px 0;">\n' +
                                ' <strong>' + item.message + '</strong>\n' +
                                ' </span>');
                    });
                } else {
                    $(document).ready(function () {
                        $(item.fill).removeClass('is-invalid');
                    });
                }

            });
        }


    }
};
v.switchButton = {
    getcheck: function (option={}) {
        if (typeof option.fill != "undefined") {
            var obj = {};
            obj.check = $(option.fill).find('.event-status').is(':checked');
            obj.index = $(option.fill).eq();
            return obj;
        }
    },
    setcheck: function (option={}) {
        if (typeof option.fill != "undefined" && typeof option.status != "undefined") {
            if (option.status) {
                $(option.fill)
                    .find('.event-status')
                    .prop('checked', true);
                $(option.fill)
                    .find('.slider')
                    .removeClass('move-left')
                    .addClass('move-right');

            } else {
                $(option.fill)
                    .find('.event-status')
                    .prop('checked', false)
                    .removeAttr('checked')
                    .attr('checked', 'checked');
                $(option.fill)
                    .find('.slider')
                    .removeClass('move-right')
                    .addClass('move-left');
            }
        }
    }
};

v.alert = {
    title:"Alert Message",
    message:"Are You Sure ?",
    button:null,
    buttontxt:null,
    parameter:null,
    set:function (option={}) {

        if(typeof option.title != "undefined" ){
            this.title = option.title;
        }
        if(typeof option.message != "undefined"){
            this.message = option.message;
        }
        if(typeof option.button != "undefined"){
            this.button = option.button;
        }
        if(typeof option.buttontxt != "undefined"){
            this.buttontxt = option.buttontxt;
        }
        if(typeof option.buttonCancel != "undefined"){
            this.buttonCancel = option.buttonCancel;
        }
        if(typeof option.parameter!=null){
           this.parameter = option.parameter;
        }

        v.popupmessage(this.message,this.title,this.button,this.buttontxt,this.buttonCancel);
        $(document).ready(function () {
            $('.popup-model')
                .find('.main-layout-alert')
                .removeClass('fadeOutUp')
                .addClass('fadeInDown');
        });

    }
};
v.notify = {
    option:{
        placement: {
            from: "bottom",
            align: "right"
        },
        animate: {
            enter: 'animated fadeInRight 300ms',
            exit: 'animated fadeOutRight 300ms'
        },
        mouse_over:'pause',
        newest_on_top: true,
        allow_dismiss: true
    },
    message:function (content={}) {
        if(typeof content.type!= "undefined"){
           $.extend(this.option,{type:content.type});
        }
        $.notify(content.message,this.option);
    }
};





