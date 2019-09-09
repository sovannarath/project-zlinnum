$(document).ready(function () {
    var user_data = {};
    $('.login-submit').on('click', function () { login() });
    $('.input100').on('keypress',function (e) {
        if(e.key=="Enter"){
            login();
        }
    });

    function login() {
        var email = $('input[name="email"]').val();
        var pass = $('input[name="pass"]').val();
        var remember = $('#remember:checked').val();
        var url = $('.login-submit').attr('data-action');
        var tokent = $('meta[name="csrf_token"]').attr('content');

        if (remember == "on") {
            remember = true;
        } else {
            remember = false;
        }
        $('#loading').fadeIn(300);
        $.post(url, {
            _token: tokent,
            email: email,
            pass: pass,
            remember: remember,
        }, function (success) {
            if (typeof success.status != "undefined" && typeof success.status_code != "undefined" && success.status_code == "200") {
                $('#pass_message').removeClass('alert-validate').attr('data-validate', "");
                window.open(success.data, '_self');

            } else {
                $('#pass_message').addClass('alert-validate').attr('data-validate', "Incorrect Password");
            }

        }).fail(function (error) {
            var json = error.responseJSON.errors;
            console.log(error);
            $('#loading').fadeOut(300);
            if (asset(json.pass)) {
                $('#pass_message').addClass('alert-validate').attr('data-validate', json.pass);
            } else {
                $('#pass_message').removeClass('alert-validate').attr('data-validate', "");
            }
            if (asset(json.email)) {
                $('#email_message').addClass('alert-validate').attr('data-validate', json.email);
            } else {
                $('#email_message').removeClass('alert-validate').attr('data-validate', "");
            }

        });

        function asset(data) {
            if (data != "" && typeof data !== "undefined") {
                return true;
            } else {
                return false;
            }

        }

    }


    function check_time(s) {
        var mn = Math.trunc(s / 60);
        var str = "";
        if (mn > 0) {
            str += mn + "mn "
        }
        ;
        var ss = s - mn * 60;
        str += ss + "s"


        return str;
    }

    $(document).on('click', '.cancel-verify', function () {
        $('.popup-model').fadeOut();
        $('.get-code').val("");
    });

    function sent_code(again=false, THIS=false) {

        var first_name = $('.first_name').val();
        var last_name = $('.last_name').val();
        var email = $('.email').val();
        var pass = $('.password').val();
        var confirm = $('.confirm_password').val();
        var gender = $('.gender').val();
        var tokent = $('meta[name="csrf_token"]').attr('content');
        var url = $('.sign-up-submit').attr('data-action');
        user_data.first_name = first_name;
        user_data.last_name = last_name;
        user_data.email = email;
        user_data.password = pass;
        user_data.confirm_password = confirm;
        user_data.gender = gender;
        v.loadingmode.loading({
            turn: "on"
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': tokent
            }
        });
        $.post(url, {
            first_name: first_name,
            last_name: last_name,
            email: email,
            password: pass,
            confirm_password: confirm,
            gender: gender
        }, function (data) {
            validator_signup([]);
            v.loadingmode.loading({
                turn: "off"
            });

            if (data.status_code == 200) {
                if (again != true) {
                    v.alert.set({
                        title: "Verify Email",
                        message: `<div><p>A verification code was sent to email</p>
                    <input type="text" class="form-control get-code" placeholder="Code">
                    </div>`,
                        button: "false",
                        buttontxt: "Verify",
                        buttonCancel: "disable",
                        otherbutton: [
                            {
                                text: "Verify",
                                on: "action-verify"
                            }, {
                                text: "Send Code Again",
                                on: "sent-again"
                            },
                            , {
                                text: "Cancel",
                                on: "cancel-verify"
                            },
                        ],
                    });
                } else {
                    v.notify.message({
                        message: "Code was sent to email"
                    });
                    $('.cancel-verfiy').hide();
                    var i = 180;
                    var time = setInterval(function () {
                        if (i <= 0) {
                            $(THIS).html('Send Code Again');
                            $(THIS).addClass('sent-again')
                                .removeClass('disable-sent');
                            $('.cancel-verfiy').show();
                            clearInterval(time);
                        } else {
                            $(THIS).find('.timer-check').remove();
                            $(THIS).html('wait ' + check_time(i));
                        }
                        i--;
                    }, 1000);
                    $(THIS).removeClass('sent-again').addClass('disable-sent');


                }

            } else {
                v.notify.message({
                    message: "Error Sent Email",
                    type: "danger"
                });
            }

        }).fail(function (error) {
            v.loadingmode.loading({
                turn: "off"
            });
            console.log(error);
            validator_signup(error.responseJSON.message);
        });
    }

    $('.sign-up-submit').click(function () {
        sent_code();
    });
    $(document).on('click', '.sent-again', function () {
        sent_code(true, this);
    });

    function validator_signup(json={}) {
        var message = [];
        if (typeof json.first_name != "undefined") {
            message.push(['* ' + json.first_name]);
            $('.first_name').closest('.wrap-input100').addClass('alert-validate').attr('data-validate', json.first_name);
        } else {
            $('.first_name').closest('.wrap-input100').removeClass('alert-validate').attr('data-validate', "");

        }
        if (typeof json.last_name != "undefined") {
            message.push(['* ' + json.last_name]);
            $('.last_name').closest('.wrap-input100').addClass('alert-validate').attr('data-validate', json.last_name);
        } else {
            $('.last_name').closest('.wrap-input100').removeClass('alert-validate').attr('data-validate', "");

        }
        if (typeof json.email != "undefined") {
            message.push(['* ' + json.email]);
            $('.email').closest('.wrap-input100').addClass('alert-validate').attr('data-validate', json.email);
        } else {
            $('.email').closest('.wrap-input100').removeClass('alert-validate').attr('data-validate', "");

        }
        if (typeof json.email_error != "undefined") {
            message.push(['* ' + json.email_error]);
            $('.popup-model')
                .find('.main-layout-alert')
                .removeClass('fadeInDown')
                .addClass('fadeInUp')
                .closest('.popup-model')
                .fadeOut();
            $('.email').closest('.wrap-input100').addClass('alert-validate').attr('data-validate', json.email_error);
        }
        if (typeof json.password != "undefined") {
            message.push(['* ' + json.password]);
            $('.password').closest('.wrap-input100').addClass('alert-validate').attr('data-validate', json.password);
        } else {
            $('.password').closest('.wrap-input100').removeClass('alert-validate').attr('data-validate', "");

        }
        if (typeof json.confirm_password != "undefined") {
            message.push(['* ' + json.confirm_password]);
            $('.confirm_password').closest('.wrap-input100').addClass('alert-validate').attr('data-validate', json.confirm_password);
        } else {
            $('.confirm_password').closest('.wrap-input100').removeClass('alert-validate').attr('data-validate', "");

        }
        if (typeof json.gender != "undefined") {
            message.push(['* ' + json.gender]);
            $('.gender').closest('.wrap-input100').addClass('alert-validate').attr('data-validate', json.gender);
        } else {
            $('.gender').closest('.wrap-input100').removeClass('alert-validate').attr('data-validate', "");
        }

        if (typeof json.general != "undefined") {
            message.push(['* ' + json.general]);
        }
        if (Object.keys(json).length > 0) {
            v.notify.message({type: "danger", message: message.join('<br>')});
        }
    }


    $(document).on('click', '.action-verify', function () {
        var email = $('.email').val();
        var get_code = $('.get-code').val();
        var url = $('meta[name="enable-email"]').attr('datasrc');
        var data = {
            code: get_code,
            email: email
        };
        if (get_code != "") {
            v.loadingmode.loading({
                turn:"on"
            });
            $.ajax({
                type: "post",
                url: url,
                data: data,
                success: function (data) {
                    if (data.status_code == 200) {
                        var signup_url = $('meta[name="sign-up-post"]').attr('datasrc');
                        $.post(signup_url, user_data, function (result1) {
                            v.loadingmode.loading({
                                turn:"off"
                            });
                            if (result1.status_code == 200) {
                                v.notify.message({
                                    message: "Sign Up Success"
                                });
                                setTimeout(function () {
                                    var url_login = $('meta[name="login-route"]').attr('datasrc');
                                    window.open(url_login,'_self');
                                },1000);
                            } else {
                                console.log(result1);
                                v.notify.message({
                                    message: "Sign Up Unsuccess",
                                    type: "danger"
                                })
                            }
                        }).fail(function (error) {
                            v.loadingmode.loading({
                                turn:"off"
                            });
                            console.log(error);
                            v.notify.message({
                                message: "Sign Up Unsuccess",
                                type: "danger"
                            })
                        })
                    } else {
                        v.loadingmode.loading({
                            turn:"off"
                        });
                        v.notify.message({
                            message: "Verify Unsuccess",
                            type: 'danger'
                        });
                    }

                }, error: function (error) {
                    var json = error.responseJSON;
                    if (typeof json.message != "undefined") {
                        v.notify.message({
                            message: json.message,
                            type: 'danger'
                        });
                    }

                }
            })

        } else {
            v.notify.message({
                message: "Invalid Code",
                type: "danger"
            })
        }

    });
});
