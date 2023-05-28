<?php
if (Auth::user()->dashboard_style == 'light') {
    $bgmenu = 'blue';
    $bg = 'light';
    $text = 'dark';
    $mode = $status = $bg;
} else {
    $bgmenu = 'dark';
    $bg = 'dark';
    $text = 'light';
    $mode = $text;
    $status = 'secondary';
}

?>
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="{{ $bgmenu }}">
        <a href="{{ url('/') }}"><img class="img-fluid" style="max-height: 50px"
                src="{{ asset('img/logo-color-no-background.png') }}" alt="{{ $settings->site_name }}"> </a>

        <button class="ml-auto navbar-toggler sidenav-toggler" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="{{ $bgmenu }}">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    @if (Auth::user()->account_verify == 'Verified')
                        <p class="m-0 text-{{ $status }}">
                            <i class="glyphicon glyphicon-ok"></i><strong style=""> Account verified</strong>
                        </p>
                    @elseif (Auth::user()->account_verify == 'Under review')
                        <p class="m-0 text-{{ $status }}">
                            <i class="glyphicon glyphicon-ok"></i><strong style=""> Account under review</strong>
                        </p>
                    @else
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <strong style="">Account {{ Auth::user()->account_verify }}</strong>
                        </a>
                    @endif
                    @if (Auth::user()->account_verify != 'Verified' && Auth::user()->account_verify != 'Under review')
                        <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                            <div class="quick-actions-scroll scrollbar-outer">
                                <div class="quick-actions-items">
                                    <span class="mb-1 title">Verification status: {{ Auth::user()->account_verify }}</span>
                                    <div class="m-0 row">
                                        @if (Auth::user()->account_verify != 'yes')
                                            <a href="{{ route('account.verify') }}" class="btn btn-success">Verify Account</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </li>
                <li class="nav-item hidden-caret">
                    <form action="javascript:void(0)" method="post" id="styleform" class="form-inline">
                        <div class="form-group">
                            {{-- <label class="text-{{ $mode }}">Background Mode</label> --}}
                            <label class="style_switch ml-2">
                                <input name="style" id="style" type="checkbox" value="true" class="modes">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        @if (Auth::user()->dashboard_style == 'dark')
                            <script>
                                document.getElementById("style").checked = true;
                            </script>
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </li>
                {{-- @if ($settings->google_translate == 'on') --}}
                <li class="nav-item hidden-caret">
                    <div id="google_translate_element"></div>
                    {{-- <div class="skiptranslate goog-te-gadget" dir="ltr" style="">
                        <div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;">
                            <img src="https://www.google.com/images/cleardot.gif" class="goog-te-gadget-icon" alt="" style="background-image: url(&quot;https://translate.googleapis.com/translate_static/img/te_ctrl3.gif&quot;); background-position: -65px 0px;">
                            <span style="vertical-align: middle;">
                                <a aria-haspopup="true" class="goog-te-menu-value" href="javascript:void(0)">
                                    <span>Select Language</span>
                                    {{-- <img src="https://www.google.com/images/cleardot.gif" alt="" width="1" height="1"> --}}
                    {{-- <span style="border-left: 1px solid rgb(187, 187, 187);">​</span>
                                    <img src="https://www.google.com/images/cleardot.gif" alt="" width="1" height="1"><span aria-hidden="true" style="color: rgb(213, 213, 213);">▼
                                    </span></a></span>
                                </div>
                            </div> --}}
                </li>
                {{-- @endif --}}

                {{-- <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        
                        
                        <li>
                            <a class="see-all" href="{{ url('dashboard/notification') }}">See all notifications<i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- @if ($settings->enable_kyc == 'yes') --}}
                {{-- @endif --}}
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <a class="dropdown-item" href="{{ url('dashboard/changepassword') }}">Change
                                    Password</a>
                                <a class="dropdown-item" href="{{ url('dashboard/profile') }}">Account Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
<script type="text/javascript">
    $("#styleform").on('change', function() {
        $.ajax({
            url: "{{ url('/dashboard/changetheme') }}",
            type: 'POST',
            data: $("#styleform").serialize(),
            success: function(data) {
                location.reload(true);
            },
            error: function(data) {
                console.log('Something went wrong');
            },

        });
    });
</script>
