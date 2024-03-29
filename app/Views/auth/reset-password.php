<!DOCTYPE html>
<html lang="zxx" class="js">
<?php include(APPPATH . '/Views/_head.php'); ?>
<body class="nk-body npc-crypto bg-white pg-auth">
<!-- app body @s -->
<div class="nk-app-root">
    <div class="nk-split nk-split-page nk-split-md">
        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                            class="icon ni ni-info"></em></a>
            </div>
            <div class="nk-block nk-block-middle nk-auth-body">
                <div class="brand-logo pb-4 ml-0">
                    <a href="/" class="logo-link ml-n5">
                        <img class="logo-light logo-img logo-img-lg" src="/assets/images/logo.png" alt="logo">
                        <img class="logo-dark ml-n4" style="width: 5em !important;"
                             src="/assets/images/logo.png" alt="logo-dark">
                    </a>
                </div>
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Reset Password</h5>
                        <div class="nk-block-des">
                            <p>Enter your new password below.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <form class="form-validate" action="<?= site_url('reset-password') ?>" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="password" for="default-01">Password</label>
                        </div>
                        <input autocomplete="off" type="password" class="form-control form-control-lg" id="password"
                               name="password"
                               placeholder="Enter your password" required>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="password_2" for="default-01">Confirm Password</label>
                        </div>
                        <input autocomplete="off" type="password" class="form-control form-control-lg" id="password_2"
                               name="password_confirmation"
                               placeholder="Enter your password again" required>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <input type="hidden" class="invalid_password"/>
                        <input type="hidden" name="token" value="<?= $token ?>"/>
                        <button class="btn btn-lg btn-primary btn-block">Reset Password</button>
                    </div>
                </form><!-- form -->
                <div class="form-note-s2 pt-4"> New on our platform? <a href="/auth/membership">Fill & submit
                        the membership form here</a>
                </div>
            </div><!-- .nk-block -->
            <div class="nk-block nk-auth-footer">
                <div class="mt-3">
                    <p>&copy; <?= date('Y') ?> Connexxion Telecom. All Rights Reserved.</p>
                </div>
            </div><!-- .nk-block -->
        </div><!-- .nk-split-content -->
        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
             data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                <div class="slider-init mb-3" data-slick='{"dots":false, "arrows":false, "autoplay": true}'>
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="/assets/images/slides/slide-7.png" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>SLB Staff Coop</h4>
                                <p>
                                    Get in touch today for more information on your benefits. <br>
                                    <em class="icon ni ni-browser mr-1"></em> <a href="https://slbcoop.com"
                                                                                 target="_blank">slbcoop.com</a>
                                    <br>
                                    <em class="icon ni ni-call-alt mr-1"></em> <a href="tel:+2348090160565">+234 (0) 809
                                        016 0565</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="/assets/images/slides/slide-8.png" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>SLB Staff Coop</h4>
                                <p>
                                    Get in touch today for more information on your benefits. <br>
                                    <em class="icon ni ni-browser mr-1"></em> <a href="https://slbcoop.com"
                                                                                 target="_blank">slbcoop.com</a>
                                    <br>
                                    <em class="icon ni ni-call-alt mr-1"></em> <a href="tel:+2348090160565">+234 (0) 809
                                        016 0565</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="/assets/images/slides/slide-9.png" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>SLB Staff Coop</h4>
                                <p>
                                    Get in touch today for more information on your benefits. <br>
                                    <em class="icon ni ni-browser mr-1"></em> <a href="https://slbcoop.com"
                                                                                 target="_blank">slbcoop.com</a>
                                    <br>
                                    <em class="icon ni ni-call-alt mr-1"></em> <a href="tel:+2348090160565">+234 (0) 809
                                        016 0565</a>
                                </p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                </div><!-- .slider-init -->
                <div class="slider-dots"></div>
                <div class="slider-arrows"></div>
            </div><!-- .slider-wrap -->
        </div><!-- .nk-split-content -->

    </div><!-- .nk-split -->
</div><!-- app body @e -->
<!-- JavaScript -->
<?php include(APPPATH . '/Views/_scripts.php'); ?>
<?php if (session()->getFlashdata('invalid_password') !== NULL) : ?>
    <script>
        $('.invalid_password').click()
    </script>
<?php endif; ?>
</body>

</html>