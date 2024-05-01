<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="organik-icon-close"></i></span>

        <div class="logo-box">
            <a href="{{ route('home') }}" aria-label="logo image"><img src="{{ asset('logo.png') }}"
                    width="155" alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="organik-icon-email"></i>
                <a href="mailto:sahla@test.com">sahla@test.com</a>
            </li>
            <li>
                <i class="organik-icon-calling"></i>
                <a href="tel:01128752357">01128752357</a>
            </li>
        </ul>
        <div class="mobile-nav__top">
            <div class="main-menu__login">
                <a href="{{ route('login') }}"><i class="organik-icon-user"></i>Login / Register</a>
            </div>
        </div>
    </div>
</div>