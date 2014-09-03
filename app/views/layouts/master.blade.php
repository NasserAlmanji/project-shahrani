<CTYPE html>
<html lang="ar">
    <head>
        <title>
            @section('title')
            أهليـــــن
            @if (isset($PagesTitlesArabic[Request::path()]))
                :: 
                {{ $PagesTitlesArabic[Request::path()] }}
            @endif
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS are placed here -->
        {{ HTML::style('css/pure-css.min') }}

        <style>
        @section('styles')



            body {
                background-image: url('/img/dirty_old_shirt.png');
                color:white;
                direction: rtl;

            }


                #bigContainer {
                    margin:100px auto;
                    max-width:500px;

                }

                #container {
                    border: 2px solid rgb(100,100,100);
                    border-radius:10px;
                    padding: 40px;

                }

                #controls {
                    width: 100%;
                    text-align: center;
                }

                #controls label {
                    text-align: right;
                    margin-right: 15px;
                }

                #controls button {
                    width: 80%;
                    margin-top: 20px;
                }

            .alert-box {
                color:#555;
                border-radius:10px;
                font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
                padding:10px 36px;
                margin:10px;
            }
            .alert-box span {
                font-weight:bold;
                text-transform:uppercase;
            }
            .error {
                background:#ffecec url('img/error.png') no-repeat 10px 50%;
                border:1px solid #f5aca6;
            }
            .success {
                background:#e9ffd9 url('img/success.png') no-repeat 10px 50%;
                border:1px solid #a6ca8a;
            }
            .warning {
                background:#fff8c4 url('img/warning.png') no-repeat 10px 50%;
                border:1px solid #f2c779;
            }
            .notice {
                background:#e3f7fc url('img/notice.png') no-repeat 10px 50%;
                border:1px solid #8ed9f6;
            }

            @import url(http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
            /*font-family: 'Droid Arabic Naskh', serif;*/

            @import url(http://fonts.googleapis.com/earlyaccess/amiri.css);
          /* font-family: 'Amiri', serif; */

            #menu {
                background-image:url('/img/binding_dark.png');
                height: 70px;

                }
            #menu ul {
                margin-top:15px;
                direction:rtl;
                float:right;
                width: 100%;
            }
            #menu ul li {
                padding: 3px;
            }
            #menu a {
                color:white;
                font-family: 'Amiri', serif;
                font-size: 14px;
            }
            #menu a:hover {
                color:black;
            }

                .button-success,
                .button-error,
                .button-warning,
                .button-secondary {
                    color: white;
                    border-radius: 4px;
                    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
                    padding: 3px;

                }

                .button-success {
                    background: rgb(28, 184, 65); /* this is a green */
                }

                .button-error {
                    background: rgb(202, 60, 60); /* this is a maroon */
                }

                .button-warning {
                    background: rgb(223, 117, 20); /* this is an orange */
                }

                .button-secondary {
                    background: rgb(66, 184, 221); /* this is a light blue */
                }

                .badge {
                  background: #ff0000;
                  border-radius: 0.8em;
                  -moz-border-radius: 0.8em;
                  -webkit-border-radius: 0.8em;
                  color: #ffffff;
                  display: inline-block;
                  font-weight: bold;
                  line-height: 1.6em;
                  text-align: center;
                  width: 1.6em; 
                  float:left;
                  margin-top: -0.8em;
                  margin-left:-0.8em;
                }

                .pure-form select {
                    width: 100%;
                }


        @show
        </style>
    </head>

    <body>
        @section ('header') 
              <div id='menu' class="pure-menu pure-menu-open pure-menu-horizontal">
                <ul>

                @if (!Sentry::check())
                    @if (!Request::is('login'))
                        <li> <a class="pure-button pure-button-primary" href="{{URL::to('login');}}">دخول</a> </li>
                    @endif

                    @if (!Request::is('signup'))
                        <li> <a class="button-success pure-button" href="{{URL::to('signup');}}">سجّل</a> </li>
                    @endif
                @endif


                @if (Sentry::check())
                    @if (!Request::is('home'))
                        <li> <a class="pure-button pure-button-primary" href="{{URL::to('home');}}">الرئيسية </a> </li>
                    @endif
                        @if (Sentry::getUser()->hasAccess('admin'))
                            @if (!Request::is('admin/post/create'))
                               <li> <a  class="pure-button pure-button-primary" href="{{URL::to('admin/post/create');}}">انشر</a> </li>
                            @endif
                            @if (!Request::is('admin/company/create'))
                               <li> <a  class="pure-button pure-button-primary" href="{{URL::to('admin/company/create');}}">أضف شركة</a> </li>
                            @endif
                        @endif
                    <li> <a class="button-error pure-button" href="{{URL::to('logout');}}">خروج</a> </li>
                @endif


                </ul>
            </div>

        @show

        <!-- Container -->
            <div id="bigContainer">
                    @if (isset($message))
                            <div class="alert-box {{ $Messagetype }}"><span> </span> {{ $message }} </div>
                    @endif

                    <!-- Content -->
                    @yield('content')
                </div>


        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery.js') }}

    <style>
            @media only screen and (max-width: 480px) {
                .pure-form-aligned .pure-control-group{
                    text-align: center;
                }

                .pure-form-aligned .pure-control-group label{
                    text-align: right;
                    margin-right: 0px;
                }
                #bigContainer {
                    margin:0px auto;
                }
                body {
                    /* color: green; */
                }

                #container {
                    padding: 10px 40px;
                    border: none;
                }


            }

    </style>
    </body>
</html>