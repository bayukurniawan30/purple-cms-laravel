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
            .purple-check-req-step, .purple-check-mbstring, .purple-check-intl, .purple-check-exif {
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
                        <p><?= $currentLoad ?></p><br>
                        
                        <div class="setup-loader-spinner" uk-spinner="ratio: 2"></div>
                        
                        <ul class="uk-iconnav uk-iconnav-vertical purple-check-req-step">
                            <li class="uk-animation-slide-bottom-medium purple-check-php-version"><span class="purple-check-php-version-icon" uk-spinner></span> <span class="purple-check-php-version-text">Checking PHP version...</span></li>

                            <li class="uk-animation-slide-bottom-medium purple-check-mbstring"><span class="purple-check-mbstring-icon" uk-spinner></span> <span class="purple-check-mbstring-text">Checking mbstring PHP extension...</span></li>

                            <li class="uk-animation-slide-bottom-medium purple-check-intl"><span class="purple-check-intl-icon" uk-spinner></span> <span class="purple-check-intl-text">Checking intl PHP extension...</span></li>

                            <li class="uk-animation-slide-bottom-medium purple-check-exif"><span class="purple-check-exif-icon" uk-spinner></span> <span class="purple-check-exif-text">Checking exif PHP extension...</span></li>
                        </ul>
                    </div>
                    @endif
                </div>
              <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <div id="modal-setup-purple" class="uk-modal-full" uk-modal>
            <div class="uk-modal-dialog">
                <div class="uk-grid-collapse uk-flex-middle" uk-grid>
                    <div class="uk-width-1-2@m uk-visible@m uk-background-contain setup-information" style="background-image: linear-gradient(120deg, #63cfb3 0%, #9f5eff 100%)" uk-height-viewport>
                        <div class="uk-overlay uk-overlay-default" uk-height-viewport>
                            <img src="" alt="">
                            <?= $this->Html->image('/master-assets/img/'.$vectorImg, ['alt' => $currentStep]) ?>
                            <div class="uk-position-bottom uk-padding">
                                <h3 class="text-primary"><strong><?= $currentStep ?></strong></h3>
                                <p class="uk-margin-remove-bottom">
                                    <?= $currentDesc ?>
                                    <br><a href="https://bayukurniawan30.github.io/purple-cms/#/" target="_blank"><span class="mdi mdi-open-in-new"></span> Read full documentation</a>
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
                                            <?= $this->Html->image('/master-assets/img/logo.svg', ['alt' => 'Setup Page', 'data-id' => 'login-cover-image', 'width' => '250']) ?>
                                        </div>
                                        <h4 class="uk-margin-small"><?= $purpleTag ?></h4>

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
        <?= $this->Html->script('/master-assets/plugins/parsley/dist/parsley.js'); ?>
        <?= $this->Html->script('/master-assets/plugins/moment/moment.js'); ?>
        <?= $this->Html->script('/master-assets/plugins/moment-timezone/moment-timezone-with-data.js'); ?>
        <?php if ($checkStep == 'administrative'): ?>
        <?= $this->Html->script('/master-assets/plugins/password/password.min.js'); ?>
        <?= $this->Html->script('/master-assets/plugins/password/password-generator.js'); ?>
        <?php endif; ?>
        <!-- UI Kit -->
        <?= $this->Html->script('/master-assets/plugins/uikit/js/uikit.js'); ?>
        <?= $this->Html->script('/master-assets/plugins/uikit/js/uikit-icons.js'); ?>
        <!-- End UI Kit -->
        <!-- endinject -->
        <!-- inject:js -->
        <?= $this->Html->script('/master-assets/js/off-canvas.js'); ?>
        <?= $this->Html->script('/master-assets/js/misc.js'); ?>
        <!-- endinject -->
        <?php
            if ($checkStep == 'index'):
        ?>
        <script>
            $(document).ready(function() {
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
                <?php
                    if (version_compare(PHP_VERSION, '7.1.3') >= 0):
                ?>  
                    // Icon
                    $('.purple-check-php-version').find('.purple-check-php-version-icon').attr('uk-icon', 'icon: check');
                    $('.purple-check-php-version').find('.purple-check-php-version-icon').attr('uk-icon', 'icon: check');

                    // Text
                    $('.purple-check-php-version').find('.purple-check-php-version-text').text('PHP 7.1.3 or greater');
                <?php
                    else:
                ?>
                    // List
                    $('.purple-check-php-version').addClass('uk-text-danger');
                    
                    // Icon
                    $('.purple-check-php-version').find('.purple-check-php-version-icon').attr('uk-icon', 'icon: warning');

                    // Text
                    $('.purple-check-php-version').find('.purple-check-php-version-text').text('You need PHP 7.1.3 or greater');
                <?php
                    endif;
                ?>
                }, 3000);

                setTimeout(function() {
                    $('.purple-check-mbstring').show();
                }, 3500);

                setTimeout(function() {
                    // Icon
                    $('.purple-check-mbstring').find('.purple-check-mbstring-icon').removeClass('uk-spinner');
                    $('.purple-check-mbstring').find('.purple-check-mbstring-icon').removeAttr('uk-spinner');
                <?php
                    if (extension_loaded('intl')):
                ?>  
                    // Icon
                    $('.purple-check-mbstring').find('.purple-check-mbstring-icon').attr('uk-icon', 'icon: check');
                    $('.purple-check-mbstring').find('.purple-check-mbstring-icon').attr('uk-icon', 'icon: check');

                    // Text
                    $('.purple-check-mbstring').find('.purple-check-mbstring-text').text('mbstring PHP extension enabled');
                <?php
                    else:
                ?>
                    // List
                    $('.purple-check-mbstring').addClass('uk-text-danger');
                    
                    // Icon
                    $('.purple-check-mbstring').find('.purple-check-mbstring-icon').attr('uk-icon', 'icon: warning');

                    // Text
                    $('.purple-check-mbstring').find('.purple-check-mbstring-text').text('Please enable mbstring PHP extension');
                <?php
                    endif;
                ?>
                }, 4500);

                setTimeout(function() {
                    $('.purple-check-intl').show();
                }, 5000);

                setTimeout(function() {
                    // Icon
                    $('.purple-check-intl').find('.purple-check-intl-icon').removeClass('uk-spinner');
                    $('.purple-check-intl').find('.purple-check-intl-icon').removeAttr('uk-spinner');
                <?php
                    if (extension_loaded('intl')):
                ?>  
                    // Icon
                    $('.purple-check-intl').find('.purple-check-intl-icon').attr('uk-icon', 'icon: check');
                    $('.purple-check-intl').find('.purple-check-intl-icon').attr('uk-icon', 'icon: check');

                    // Text
                    $('.purple-check-intl').find('.purple-check-intl-text').text('intl PHP extension enabled');
                <?php
                    else:
                ?>
                    // List
                    $('.purple-check-intl').addClass('uk-text-danger');
                    
                    // Icon
                    $('.purple-check-intl').find('.purple-check-intl-icon').attr('uk-icon', 'icon: warning');

                    // Text
                    $('.purple-check-intl').find('.purple-check-intl-text').text('Please enable intl PHP extension');
                <?php
                    endif;
                ?>
                }, 6000);

                setTimeout(function() {
                    $('.purple-check-exif').show();
                }, 6500);

                setTimeout(function() {
                    // Icon
                    $('.purple-check-exif').find('.purple-check-exif-icon').removeClass('uk-spinner');
                    $('.purple-check-exif').find('.purple-check-exif-icon').removeAttr('uk-spinner');
                <?php
                    if (extension_loaded('exif')):
                ?>  
                    // Icon
                    $('.purple-check-exif').find('.purple-check-exif-icon').attr('uk-icon', 'icon: check');
                    $('.purple-check-exif').find('.purple-check-exif-icon').attr('uk-icon', 'icon: check');

                    // Text
                    $('.purple-check-exif').find('.purple-check-exif-text').text('exif PHP extension enabled');
                <?php
                    else:
                ?>
                    // List
                    $('.purple-check-exif').addClass('uk-text-danger');
                    
                    // Icon
                    $('.purple-check-exif').find('.purple-check-exif-icon').attr('uk-icon', 'icon: warning');

                    // Text
                    $('.purple-check-exif').find('.purple-check-exif-text').text('Please enable exif PHP extension');
                <?php
                    endif;
                ?>
                }, 7500);

                setTimeout(function() {
                <?php
                    if (version_compare(PHP_VERSION, '7.1.3') >= 0 && extension_loaded('intl') && extension_loaded('mbstring') && extension_loaded('exif')):
                ?>
                    $('.purple-check-req-step').append('<li class="uk-animation-slide-bottom-medium">You are ready to go! </li>')
                <?php
                    else:
                ?>
                    $('.purple-check-req-step').append('<li class="uk-animation-slide-bottom-medium">Your machine does not meet the minimum requirements.</li>')
                <?php
                    endif;
                ?>
                }, 8500);
            })
        </script>
        <?php
            endif;

            if ($checkStep == 'index' || $checkStep == 'administrative' || ($this->request->getParam('controller') == 'Production' && ($checkStep == 'userVerification' || $checkStep == 'codeVerification' || $checkStep == 'databaseMigration'))):
        ?>
        <script>
            $(document).ready(function() {
                <?php if ($checkStep == 'administrative'): ?>
                var userTimezone = moment.tz.guess();
                $('select[name=timezone] option:contains('+userTimezone+')').attr('selected', 'selected');
                <?php endif; ?>

                <?php
                    if (version_compare(PHP_VERSION, '7.1.3') >= 0 && extension_loaded('intl') && extension_loaded('mbstring') && extension_loaded('exif')):
                ?>
                    setTimeout(function() {
                        UIkit.modal('#modal-setup-purple').show();
                        $(".setup-loader").hide();
                    <?php if ($checkStep == 'index') echo '}, 10000);'; else echo '}, 2000);'; ?>
                <?php
                    endif;
                ?>
            })
        </script>
        <?php
            else:
        ?>
        <script>
            $(document).ready(function() {
                <?php
                    if (version_compare(PHP_VERSION, '7.1.3') >= 0 && extension_loaded('intl') && extension_loaded('mbstring') && extension_loaded('exif')):
                ?>
                    UIkit.modal('#modal-setup-purple').show();
                <?php
                    endif;
                ?>
            })
        </script>
        <?php
            endif;
        ?>
    </body>
</html>