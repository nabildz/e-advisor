<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>المرشد</title>


  <link href="https://fonts.googleapis.com/css?family=Cairo|Mirza" rel="stylesheet">
  <link href="{{asset('/css/semantic.min.css')}}" rel="stylesheet">
  <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet">
  <script src="{{asset('/js/jquery.min.js')}}"></script>
  <script src="{{asset('/js/semantic.js')}}"></script>

<link rel="apple-touch-icon" sizes="180x180" href="{{asset('/images/favicons/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" href="{{asset('/images/favicons/favicon-32x32.png')}}" sizes="32x32">
<link rel="icon" type="image/png" href="{{asset('/images/favicons/favicon-16x16.png')}}" sizes="16x16">
<link rel="manifest" href="{{asset('/images/favicons/manifest.json')}}">
<link rel="mask-icon" href="{{asset('/images/favicons/safari-pinned-tab.svg')}}" color="#0f9ca3">
<meta name="theme-color" content="#0f9ca3">

  <style type="text/css">
 body {
    background-color: #FFFFFF;
  }
  .ui.menu .item img.logo {
    margin-left: 1.5em;
  }
  .main.container {
    margin-top: 8em;
  }
  .wireframe {
    margin-top: 2em;
  }
     @media (min-height: 320px) {
.Site {
  display: flex;
  min-height: 100vh;
  flex-direction: column;
}

.Site-content {
  flex: 1;
}
  }
}

}
  </style>
      @yield('css')
</head>
<body class="Site"> 
<div class="Site-content">
  <div class="ui fixed inverted menu">
    <div class="ui container">
      <a href="#" class="header item">
        <img class="logo" src="{{URL::to('/images/logo2.png')}}">
        المرشد الالكتروني
      </a>
      <a href="{{ URL::route('home') }}"  class="item">الرئيسية</a>
            <a href="{{ URL::route('guide') }}" class="item">المرشد</a>
                  <a href="{{ URL::route('home') }}" class="item">المواد</a>
                        <a href="{{ URL::route('logout') }}" class="item">تسجيل الخروج</a>
      <!--<div class="ui simple dropdown item">
        Dropdown <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="#">Link Item</a>
          <a class="item" href="#">Link Item</a>
          <div class="divider"></div>
          <div class="header">Header Item</div>
          <div class="item">
            <i class="dropdown icon"></i>
            Sub Menu
            <div class="menu">
              <a class="item" href="#">Link Item</a>
              <a class="item" href="#">Link Item</a>
            </div>
          </div>
          <a class="item" href="#">Link Item</a>
        </div>
      </div>-->
    </div>
  </div>

<div class="ui main text container">
     @yield('content')
  
  </div>
  </div>
  <div class="ui inverted vertical footer segment form-page">

    <div class="ui center aligned container">
      
      <img src="{{URL::to('/images/logo2.png')}}" class="ui centered mini image">

    

    </div>
  </div>

</body>

</html>
