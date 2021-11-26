@extends('layouts.setup')

@section('content')
    <form id="form-database-setup" class="uk-grid pt-3" action="{{ route('setup.ajaxDatabase') }}" method="POST" data-parsley-validate>
        <div class="uk-width-1-1 uk-margin-small">
            <input type="text" name="name" class="uk-input" placeholder="{{  __('setup.database_name_plh') }}" data-parsley-maxlength="30" uk-tooltip="title: {{ __('setup.database_name_tooltip') }}; pos: bottom-left" autofocus required>
        </div>
        <div class="uk-width-1-1 uk-margin-small">
            <input type="text" name="username" class="uk-input" placeholder="{{  __('setup.username_plh') }}" uk-tooltip='title: {{ __('setup.username_tooltip') }}; pos: bottom-left' required>
        </div>
        <div class="uk-width-1-1 uk-margin-small">
            <div class="uk-inline" style="width: 100%">
                <a id="button-visible-password" class="uk-form-icon uk-form-icon-flip" tabindex="-1" href="#" uk-icon="icon: lock" uk-tooltip="title: {{ __('setup.unlock_password') }}; pos: bottom-right"></a>
                <input type="text" name="password" class="uk-input" placeholder="{{  __('setup.password_plh') }}" uk-tooltip='title: {{ __('setup.password_tooltip') }}; pos: bottom-left' autocomplete="current-password">
            </div>
        </div>

        <div class="uk-width-1-1 uk-margin-small">
            <button type="submit" id="button-database-setup" class="btn btn-gradient-primary btn-block btn-lg font-weight-medium auth-form-btn">{{ __('setup.next') }}</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            function visiblePassword() {
                function visiblePassword1() {
                    $(this).one("click", visiblePassword2);
                    $(this).attr('uk-icon', 'icon: unlock');
                    $(this).attr('uk-tooltip', 'title: {{ __('setup.lock_password') }}; pos: bottom-right');
                    $('input[name=password]').attr('type', 'text');
                }
    
                function visiblePassword2() {
                    $(this).one("click", visiblePassword1);
                    $(this).attr('uk-icon', 'icon: lock');
                    $(this).attr('uk-tooltip', 'title: {{ __('setup.unlock_password') }}; pos: bottom-right');
                    $('input[name=password]').attr('type', 'password');
                }
                $("#button-visible-password").one("click", visiblePassword1);
            };
    
            visiblePassword();
            
            var databaseSetup;
            var countClick = 0;
            $("#form-database-setup").submit(function(event){
                if ($(this).parsley().isValid()) {
                    countClick++;
                    if (databaseSetup) {
                        databaseSetup.abort();
                    }
                    var $form   = $(this);
                    var $inputs = $(this).find("button, input, select, textarea");
                    var $button = $(this).find("button[type=submit]");

                    var buttonLoadingText = '{{ __('setup.checking_database') }}';
                    var buttonSuccessText = '{{ __('setup.database_is_ok') }}';
                    var errorMessageText  = '{{ __('setup.database_error') }}';
                    var redirect          = '{{ route('setup.administrative') }}'
                    var serializedData = $form.serialize();
                    databaseSetup = $.ajax({
                        url: $form.attr('action'),
                        type: "post",
                        beforeSend: function(){
                            $inputs.prop("disabled", true);
                            $button.html('<i class="fa fa-circle-o-notch fa-spin"></i> ' + buttonLoadingText);
                            $button.attr('disabled','disabled');},
                        data: serializedData
                    });
                    databaseSetup.done(function (msg){
                        console.log(msg);
                        var json   = $.parseJSON(msg);
                        var status = (json.status);
                        if(status == 'error') {
                            var error = (json.error);
                            var error_type = (json.error_type);
                        }
    
                        if(status == 'ok') {
                            $button.html('<i class="fa fa-check"></i> ' + buttonSuccessText);
                            window.location = redirect;
                        }
                        else if(status == 'error') {
                            $button.removeAttr('disabled');
                            $button.html('Next');
                            if (error_type == 'form') {
                                $.each (error, function (index) {
                                    var validation = error[index];
                                    var validationText = '';
                                    $.each (validation, function (indexValidation) {
                                        validationText += validation[indexValidation]+", ";
                                    })
                                    if(countClick == 1) {
                                        console.log('adderror');
                                        $form.find($("input[name="+index+"]")).parsley().addError(index+'Validation', {message: validationText, updateClass: true});
                                    }
                                    else {
                                        console.log('updateerror');
                                        $form.find($("input[name="+index+"]")).parsley().updateError(index+'Validation', {message: validationText, updateClass: true});
                                    }
                                });
                            }
                            else {
                                alert('Error. ' + error);
                            }
                        }
                        else {
                            $button.removeAttr('disabled');
                            $button.html('Next');
                            $("#modal-message").modal('show');
                            alert(errorMessageText);
                        }
                    });
                    databaseSetup.fail(function(jqXHR, textStatus) {
                        $button.removeAttr('disabled');
                        $button.html('Next');
                        $("#modal-message").modal('show');
                        alert('Error. '+textStatus);
                    });
                    databaseSetup.always(function () {
                        $inputs.prop("disabled", false);
                    });
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection