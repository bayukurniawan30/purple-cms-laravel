<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Purple CMS | {{ $pageTitle }}</title>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="/master-assets/plugins/iconfonts/mdi/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="/master-assets/css/vendor.bundle.base.css" rel="stylesheet">
        @if ($step == 'administrative')
            <link href="/master-assets/plugins/password/password.min.css" rel="stylesheet">
        @endif
        <link href="/master-assets/plugins/parsley/src/parsley.css" rel="stylesheet">
        <link href="/master-assets/css/style.css" rel="stylesheet">
        <link href="/master-assets/plugins/uikit/css/uikit.css" rel="stylesheet">
        <script src="/master-assets/js/vendor.bundle.base.js"></script>
      
        <!-- Favicon -->
        <link rel="icon" href="/master-assets/img/favicon.png'">
        <style type="text/css">
            .auth .brand-logo img {
              width: 100%;
            }
            .setup-loader {
                color: #ffffff;
            }
            .setup-loader p {
                font-size: 1rem;
            }
            .purple-check-req-step, .purple-check-extension {
                display: none;
            }
            .setup-information {
                position: relative;
            }
            .setup-information .uk-overlay {
                width: 100%;
            }
            select.form-control {
                color: #495057!important;
            }
        </style>
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth text-center" style="background-image: linear-gradient(120deg, #63cfb3 0%, #9f5eff 100%)">
                    @if ($step == 'database' || $step == 'administrative')
                    <div class="uk-overlay uk-position-center setup-loader">
                        <p>{{ $currentLoad }}</p><br>
                        
                        <div class="setup-loader-spinner" uk-spinner="ratio: 2"></div>
                        
                        <ul class="uk-iconnav uk-iconnav-vertical purple-check-req-step">
                            <li class="uk-animation-slide-bottom-medium purple-check-php-version"><span class="purple-check-php-version-icon" uk-spinner></span> <span class="purple-check-php-version-text">{{ __('setup.check_php_version') }}</span></li>
                            <li class="uk-animation-slide-bottom-medium purple-check-extension"><span class="purple-check-extension-icon" uk-spinner></span> <span class="purple-check-extension-text">{{  __('setup.check_php_extension') }}</span></li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div id="modal-setup-purple" class="uk-modal-full" uk-modal>
            <div class="uk-modal-dialog">
                <div class="uk-grid-collapse uk-flex-middle" uk-grid>
                    <div class="uk-width-1-2@m uk-visible@m uk-background-contain setup-information" style="background-image: linear-gradient(120deg, #63cfb3 0%, #9f5eff 100%)" uk-height-viewport>
                        <div class="uk-overlay uk-overlay-default" uk-height-viewport>
                            <img src="/master-assets/img/{{ $vectorImg }}" alt="{{ $currentStep }}">
                            <div class="uk-position-bottom uk-padding">
                                <h3 class="text-primary"><strong>{{ $currentStep }}</strong></h3>
                                <p class="uk-margin-remove-bottom">
                                    {{ $currentDesc }}
                                    <br><a href="https://bayukurniawan30.github.io/purple-cms/#/" target="_blank"><span class="mdi mdi-open-in-new"></span> {{ __('setup.read_full_docs') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-width-1-1@s uk-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="auth-form-light text-left">
                                        <div class="brand-logo">
                                            <img src="/master-assets/img/logo.svg" alt="" data-id="login-cover-image" width="250">
                                        </div>
                                        <h4 class="uk-margin-small">{{ $purpleTag }}</h4>

                                        @yield('content')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- plugins:js -->
        <script src="/master-assets/plugins/parsley/dist/parsley.js"></script>
        <script src="/master-assets/plugins/moment/moment.js"></script>
        <script src="/master-assets/plugins/moment-timezone/moment-timezone-with-data.js"></script>
        @if ($step == 'administrative')
            <script src="/master-assets/plugins/password/password.min.js"></script>
            <script src="/master-assets/plugins/password/password-generator.js"></script>
        @endif
        <!-- UI Kit -->
        <script src="/master-assets/plugins/uikit/js/uikit.js"></script>
        <script src="/master-assets/plugins/uikit/js/uikit-icons.js"></script>
        <!-- End UI Kit -->
        <!-- endinject -->
        <!-- inject:js -->
        <script src="/master-assets/js/off-canvas.js"></script>
        <script src="/master-assets/js/misc.js"></script>
        <!-- endinject -->

        @if ($step == 'database')
        <script>
            $(document).ready(function() {
                let versionCompare = {{ $phpVersionCheck }};
                let extensionCheck = {{ $phpExtCheck }};

                $('.purple-check-req-step').hide();
                setTimeout(function() {
                    $('.setup-loader-spinner').hide();
                }, 2000);

                setTimeout(function() {
                    $('.purple-check-req-step').show();
                }, 2000);

                setTimeout(function() {
                    // Icon
                    $('.purple-check-php-version').find('.purple-check-php-version-icon').removeClass('uk-spinner');
                    $('.purple-check-php-version').find('.purple-check-php-version-icon').removeAttr('uk-spinner');

                    if (versionCompare) {
                        // Icon
                        $('.purple-check-php-version').find('.purple-check-php-version-icon').attr('uk-icon', 'icon: check');
                        $('.purple-check-php-version').find('.purple-check-php-version-icon').attr('uk-icon', 'icon: check');

                        // Text
                        $('.purple-check-php-version').find('.purple-check-php-version-text').text('PHP 7.3 or greater');
                    } 
                    else {
                        // List
                        $('.purple-check-php-version').addClass('uk-text-danger');
                        
                        // Icon
                        $('.purple-check-php-version').find('.purple-check-php-version-icon').attr('uk-icon', 'icon: warning');

                        // Text
                        $('.purple-check-php-version').find('.purple-check-php-version-text').text('You need PHP 7.3 or greater');
                    }
                }, 3000);

                setTimeout(function() {
                    $('.purple-check-extension').show();
                }, 3500);

                setTimeout(function() {
                    // Icon
                    $('.purple-check-extension').find('.purple-check-extension-icon').removeClass('uk-spinner');
                    $('.purple-check-extension').find('.purple-check-extension-icon').removeAttr('uk-spinner');
                    
                    if (extensionCheck) {
                        // Icon
                        $('.purple-check-extension').find('.purple-check-extension-icon').attr('uk-icon', 'icon: check');
                        $('.purple-check-extension').find('.purple-check-extension-icon').attr('uk-icon', 'icon: check');

                        // Text
                        $('.purple-check-extension').find('.purple-check-extension-text').text('All required PHP extension enabled');
                    }
                    else {
                        // List
                        $('.purple-check-extension').addClass('uk-text-danger');
                        
                        // Icon
                        $('.purple-check-extension').find('.purple-check-extension-icon').attr('uk-icon', 'icon: warning');

                        // Text
                        $('.purple-check-extension').find('.purple-check-extension-text').text('Please enable required PHP extension');
                    }
                }, 4500);

                setTimeout(function() {
                    if (versionCompare && extensionCheck) {
                        $('.purple-check-req-step').append('<li class="uk-animation-slide-bottom-medium">You are ready to go! </li>')
                    }
                    else {
                        $('.purple-check-req-step').append('<li class="uk-animation-slide-bottom-medium">Your machine does not meet the minimum requirements.</li>')
                    }
                }, 5500);
            })
        </script>
        @endif

        @if ($step == 'database' || $step == 'administrative')
        <script>
            $(document).ready(function() {
                let versionCompare = {{ $phpVersionCheck }};
                let extensionCheck = {{ $phpExtCheck }};

                @if ($step == 'administrative')
                var userTimezone = moment.tz.guess();
                $('select[name=timezone] option:contains('+userTimezone+')').attr('selected', 'selected');
                @endif

                if (versionCompare && extensionCheck) {
                    setTimeout(function() {
                        UIkit.modal('#modal-setup-purple').show();
                        $(".setup-loader").hide();
                    @if ($step == 'database')
                        }, 6600);
                    @else
                        }, 2000);
                    @endif
                }
            })
        </script>
        @else
        <script>
            $(document).ready(function() {
                if (versionCompare && extensionCheck) {
                    UIkit.modal('#modal-setup-purple').show();
                }
            })
        </script>
        @endif
    </body>
</html>