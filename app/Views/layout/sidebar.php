<div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="/" class="header-logo">
            <img src="<?= base_url()?>images/diskominfo_loader.png" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-uppercase" style="color: #13998A;"><b>Side</b><span class="text-primary ml-1"><b>bar.</b></span></span>
            </div>
        </a>
    <div class="iq-menu-bt-sidebar">
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
            </div>
        </div>
    </div>
</div>
<div id="sidebar-scrollbar">
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li>
                <a href="/" class="iq-waves-effect"><i class="las la-house-damage"></i><span>Beranda</span></a>
            </li>
            <li>
                <a href="/acara" class="iq-waves-effect"><i class="las la-calendar iq-arrow-left"></i><span>Acara</span></a>
            </li>
            <li>
                <a href="/users" class="iq-waves-effect"><i class="las la-user iq-arrow-left"></i><span>Pengguna</span></a>
            </li>
            <li>
                <a href="/login" class="iq-waves-effect"><i class="las fa-power-off"></i><span>Keluar Aplikasi</span></a>
            </li>
            <!-- <li>
                <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                    <li><a href="profile.html"><i class="las la-id-card-alt"></i>User Profile</a></li>
                    <li><a href="profile-edit.html"><i class="las la-edit"></i>User Edit</a></li>
                    <li><a href="add-user.html"><i class="las la-plus-circle"></i>User Add</a></li>
                    <li><a href="user-list.html"><i class="las la-th-list"></i>User List</a></li>
                </ul>
            </li>

            <li>
                <a href="#pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-file-alt iq-arrow-left"></i><span>Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li>
                        <a href="#authentication" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pages-line"></i><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="authentication" class="iq-submenu collapse" data-parent="#pages">
                            <li><a href="sign-in.html"><i class="las la-sign-in-alt"></i>Login</a></li>
                            <li><a href="sign-up.html"><i class="ri-login-circle-line"></i>Register</a></li>
                            <li><a href="pages-recoverpw.html"><i class="ri-record-mail-line"></i>Recover Password</a></li>
                            <li><a href="pages-confirm-mail.html"><i class="ri-file-code-line"></i>Confirm Mail</a></li>
                            <li><a href="pages-lock-screen.html"><i class="ri-lock-line"></i>Lock Screen</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Extra Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="extra-pages" class="iq-submenu collapse" data-parent="#pages">
                            <li><a href="pages-timeline.html"><i class="ri-map-pin-time-line"></i>Timeline</a></li>
                            <li><a href="pages-invoice.html"><i class="ri-question-answer-line"></i>Invoice</a></li>
                            <li><a href="blank-page.html"><i class="ri-invision-line"></i>Blank Page</a></li>
                            <li><a href="pages-error.html"><i class="ri-error-warning-line"></i>Error 404</a></li>
                            <li><a href="pages-error-500.html"><i class="ri-error-warning-line"></i>Error 500</a></li>
                            <li><a href="pages-pricing.html"><i class="ri-price-tag-line"></i>Pricing</a></li>
                            <li><a href="pages-maintenance.html"><i class="ri-archive-line"></i>Maintenance</a></li>
                            <li><a href="pages-comingsoon.html"><i class="ri-mastercard-line"></i>Coming Soon</a></li>
                            <li><a href="pages-faq.html"><i class="ri-compasses-line"></i>Faq</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#menu-level" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line iq-arrow-left"></i><span>Menu Level</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="menu-level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="#"><i class="ri-record-circle-line"></i>Menu 1</a></li>
                    <li>
                        <a href="#"><i class="ri-record-circle-line"></i>Menu 2</a>
                        <ul>
                            <li class="menu-level">
                                <a href="#sub-menus" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>Sub-menu</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                <ul id="sub-menus" class="iq-submenu iq-submenu-data collapse">
                                    <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 1</a></li>
                                    <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 2</a></li>
                                    <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="ri-record-circle-line"></i>Menu 3</a></li>
                    <li><a href="#"><i class="ri-record-circle-line"></i>Menu 4</a></li>
                </ul>
            </li> -->
        </ul>
    </nav>
    <!-- <div id="sidebar-bottom" class="p-3 position-relative">
                    <div class="iq-card bg-primary rounded">
                        <div class="iq-card-body">
                            <div class="sidebarbottom-content">
                                <div class="image"><img src="images/page-img/side-bkg.png" alt=""></div>
                                <h5 class="mb-3 text-white">Upgrade to PRO</h5>
                                <p class="mb-0 text-light">Become a pro user & enjoy more.</p>
                                <button type="submit" class="btn btn-white w-100  mt-4 text-primary viwe-more">View More</button>
                            </div>
                        </div>
                    </div>
                </div> -->
</div>