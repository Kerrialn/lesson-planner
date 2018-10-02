<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-7870205334974711",
          enable_page_level_ads: true
     });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125787082-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125787082-1');
</script>

</head>
<style type="text/css">
.buffer{height:120px;width:100%;background-color:#455a64}
.nolink{text-decoration:none;color:#333;}
.serachable{
    background-color: rgba(50,50,50,0.05);
  -webkit-transition: background-color 0.8s ease-out;
  -moz-transition: background-color 0.8s ease-out;
  -o-transition: background-color 0.8s ease-out;
  transition: background-color 0.8s ease-out;    
}
#search-input{
     box-shadow: 0 1px 0 0 rgba(50,50,50,0.05);
}

#search-input:focus{
  box-shadow: 0 1px 0 0 #263238;
  border-bottom: 1px solid #aaa;
 -webkit-box-shadow: 0 1px 0 0 #aaa;
}

@font-face {
    font-family: Phino tight;
    src: url('fonts/Phino.ttf');
    src: url('fonts/Phino.ttf') format('embedded-opentype'), /* IE6-IE8 */
       url('fonts/Phino.ttf') format('woff2'), /* Super Modern Browsers */
       url('fonts/Phino.ttf') format('woff'), /* Pretty Modern Browsers */
       url('fonts/Phino.ttf')  format('truetype'), /* Safari, Android, iOS */
       url('fonts/Phino.ttf') format('svg'); /* Legacy iOS */
}

.pt-1{padding-top:10px;}
.pt-2{padding-top:20px;}
.pt-3{padding-top:30px;}
    .content{white-space:pre-line;}
    .pdf_embed{width:100%;}
    .hidden_form_part{display: none;}
    .advert{margin: 20px 0;}
.videoWrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
}
.videoWrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}


  .script_holder{background-color:#eee;padding:15px!important;border-radius:5px;position:relative;width: 100%;}
 
  .script_outter{display: block;width: 100%;margin: 10px 0px;}

 .script_outter:nth-child(odd) .script{padding:10px;background-color:#8E8E93;border-radius:10px;width:40%;color:#fff;} 

 .script_outter:nth-child(even) .script{padding:10px;background-color:#0076FF;border-radius:10px;width:40%;color:#fff;float:right;} 

 .script_outter:nth-child(n+3) .script{margin-top:5%}
 #toast-container {
  top: auto !important;
  right: 1% !important;
  left: auto !important;
  bottom: 1%;
}
.w-100{width:100%}
.collapsible-body{padding:0px!important;}

.slider .indicators .indicator-item.active {
    background-color: #333;
}
.slider .slides li .caption {
    color: #fff;
    position: absolute;
    top: 5%;
    left: 5%;
    width: 90%;
    opacity: 0;
}

.slider .slides li img {
  -webkit-filter: contrast(1.1);
  filter: contrast(1.1);
}

.switch label input[type=checkbox]:checked + .lever {
    background-color: rgba(0, 0, 0, 0.12);
}

.card-hover{
  color:#333;
  -webkit-transition: background-color 0.8s ease-out;
  -moz-transition: background-color 0.8s ease-out;
  -o-transition: background-color 0.8s ease-out;
  transition: background-color 0.8s ease-out;
}
.card-hover:hover{background-color: rgba(50,50,50,0.05);}

.pb-1{padding-bottom:10px}
.bb-1{border-bottom: 1px solid rgba(50,50,50,0.06);}
.collect li{border-bottom: 1px solid rgba(50,50,50,0.06);padding:5px;}
label.rating{margin-right:50px}

.m-0{margin:0px;}
.vocab-slide i{color:#9e9e9e}
.vocab-definition{display: none;}
.collection .collection-item:last-child {
      border-bottom: 1px solid #e0e0e0;
}

.collapsible{
-webkit-box-shadow: none;
box-shadow: none;
margin: 0; 
}
.p-1{padding:10px;}

.pagination li.active a {
    color: #fff;
    background: #263238;
    border-radius: 3px;
}

.brand-logo {
font-family: 'Phino tight';
font-weight:normal;
font-style:normal;
}
.card .card-image .card-title {
    color: #333;
    position: absolute;
    bottom: 0;
    left: 0;
    max-width: 100%;
    padding: 15px;
    
}
.card .card-image img {
    display: block;
    border-radius: 2px 2px 0 0;
    position: relative;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    width: 100%;
    height: 70px;
    object-fit: cover;
  -webkit-filter: opacity(.5);
  filter: opacity(.5);    
}
.card .card-title {
    font-size: 20px;
    font-weight: 300;
    line-height: 0px;
}
.card .card-title h5{
     font-weight: bold;
     font-size: 20px;
}
.card .card-content{
    padding:10px;
}
.card .card-action{
    padding:10px 10px;
}
</style>
<body>
<div id="app">

  <nav class="blue-grey darken-4">
    <div class="nav-wrapper container">
      <a href="/" class="brand-logo">LP</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
 
         @guest

        <li><a href="{{ route('about') }}">{{ __('About') }}</a></li>
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
         @else 
    
        <li><a href="{{ route('home') }}" class="tooltipped" data-position="bottom" data-tooltip="{{ Auth::user()->name }}"><i class="large material-icons">account_circle</i></a></li>
        <li><a href="{{ route('user.account') }}" class="tooltipped" data-position="bottom" data-tooltip="{{ __('Account') }}">  <i class="large material-icons">account_balance</i></a></li>
        
        <li><a href="{{ route('logout') }}" class="tooltipped" data-position="bottom" data-tooltip="{{ __('Logout') }}">  <i class="large material-icons">exit_to_app</i></a></li>
        @endguest

      </ul>
    </div>
  </nav>

  <nav class="blue-grey darken-2">
    <div class="nav-wrapper container">
      <ul id="nav-mobile" class="hide-on-med-and-down">
         <li><a href="{{ route('resource.level', 'beginner') }}">Beginner</a></li>
         <li><a href="{{ route('resource.level', 'lower-intermediate') }}">Lower-intermediate</a></li>
         <li><a href="{{ route('resource.level', 'intermediate') }}">Intermediate</a></li>
         <li><a href="{{ route('resource.level', 'upper-intermediate') }}">Upper-intermediate</a></li>
         <li><a href="{{ route('resource.level', 'advanced') }}">Advanced</a></li>
      </ul>
    </div>
  </nav>
        


      <ul class="sidenav" id="mobile-demo">
     @guest

         <li><a href="{{ route('resource.level', 'beginner') }}">Beginner</a></li>
         <li><a href="{{ route('resource.level', 'lower-intermediate') }}">Lower-intermediate</a></li>
         <li><a href="{{ route('resource.level', 'intermediate') }}">Intermediate</a></li>
         <li><a href="{{ route('resource.level', 'upper-intermediate') }}">Upper-intermediate</a></li>
         <li><a href="{{ route('resource.level', 'advanced') }}">Advanced</a></li>
         <li><div class="divider"></div></li>
    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
     @else 

         <li><h5 class="center-align">{{ Auth::user()->name }}</h5></li>
         <li><div class="divider"></div></li>
         <li><a href="{{ route('resource.level', 'beginner') }}">Beginner</a></li>
         <li><a href="{{ route('resource.level', 'lower-intermediate') }}">Lower-intermediate</a></li>
         <li><a href="{{ route('resource.level', 'intermediate') }}">Intermediate</a></li>
         <li><a href="{{ route('resource.level', 'upper-intermediate') }}">Upper-intermediate</a></li>
         <li><a href="{{ route('resource.level', 'advanced') }}">Advanced</a></li>
         <li><div class="divider"></div></li>
         <li><a href="{{ route('home') }}">{{ __('Account') }}</a></li>
         <li><div class="divider"></div></li>
    <li><a href="{{ route('logout') }}">{{ __('logout') }}</a></li>
    @endguest
      </ul>


        <main class="py-4">
            <div class="container">
                @if(Request::is('/'))
                
                @else
              <div class="advert">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- lesson-planner-banner -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:970px;height:250px"
                 data-ad-client="ca-pub-7870205334974711"
                 data-ad-slot="3970711740"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>                
              </div>
              
              @endif
            </div>
            <div class="pt-2">
                @yield('content')
            </div>
        </main>


        <footer class="page-footer grey">
          <div class="container">
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 lesson-planner.org
              <a class="grey-text text-lighten-4 right" href="{{ url('https://www.facebook.com/lessonplannerorg') }}">facebook</a>
            </div>
          </div>
        </footer>



    </div>

<script type="text/javascript">
$(document).ready(function(){ 
  $(".dropdown-trigger").dropdown();  
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slider();
  });
</script>


@if(session()->has('message'))
<script>
$(document).ready(function(){   
M.toast({html: '{{ session()->get('message') }}' })
});
</script>
@endif


@if($errors->any())
   @foreach ($errors->all() as $error)

<script>
$(document).ready(function(){   
M.toast({html: '{{ $error }}' })
});
</script>

  @endforeach
@endif 

<script>
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });    
</script>

</body>
</html>
