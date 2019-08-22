<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('templates.head')
    <body>
        <div class="flex-center position-ref full-height">
           
            <nav class="navbar __navbart" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://vima.com.ng"><img src="assets/img/vima_logo.svg" class="__logoimg"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            @auth 
                            <li><a href="{{ url('/home') }}" class="__navlink">Home</a></li>
                            <li><a href="{{ url('/expenses') }}" class="__navlink">My Expenses</a></li>
                         
                            @else
                            <li><a href="{{ route('login') }}" class="__navlinkbtn" style="border-color:#fff;color:#fff !important">Login</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="__navlinkbtn1">Register</a></li>
                                @endif

                            @endauth
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
</nav>
            <div class="content2">

                <div class="header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <section>
                                    <h2>Calculate expense seemlessly</h2>

                                    <p>Let us handle your expenses, while you take a nap.You can be sure that all your expenses are well accounted for. Log in to see all your expenses. And guess what, you can convert from EUR to GBP</p>
                                </section>
                                

                            </div>

                            <div class="col-md-6">
                               <img src="{{asset('assets/img/relax.png')}}" alt="" style="height:400px;width:400px" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
