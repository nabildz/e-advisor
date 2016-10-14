<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>المرشد الإلكتروني - التسجيل</title>

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
      background-color: #ffffff;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      

        margin-top: 50px;

    }
    .column {
      max-width: 450px;
    }
    .titletext{
          margin: 30px!important;
    }
  </style>

   <script>
  $(document)
    .ready(function() {
      $('.ui.selection.dropdown').dropdown();
      $('.ui.menu .ui.dropdown').dropdown({
        on: 'hover'
      });
    })
  ;
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
      <h3 class="ui teal image header">
      <img src="{{asset('/images/logo.png')}}" class="image">
      
    </h3>
  
      <h2 class="ui teal header titletext">
      تسجيل في نظام المرشد الإلكتروني
    </h2>

   {{ Form::open(array('route' => 'store_student','method' => 'post','class' => 'ui large form')) }}

      <div class="ui segment">
        @if (count($errors) > 0)
            
   <div class="ui red message"  style="text-align:right">
        <ul>
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        
@endif
       <div class="field">
         <div class="field ">
          <div class="ui right icon input">
            <i class="user icon"></i>
            <input type="text" name="name" placeholder="الاسم" value="{{ Input::old('name') }}">
          </div>
        </div>
        </div>
        <div class="field">
          <div class="ui right icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="اسم المستخدم" value="{{ Input::old('username') }}">
          </div>
        </div>
        <div class="field">
          <div class="ui right icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="كلمة السر" value="{{ Input::old('password') }}">
          </div>
        </div>
 <div class="field">
          <div class="ui selection dropdown">
        <input type="hidden" name="depratment">
        <i class="dropdown icon"></i>
        <div class="default text">اختر التخصص</div>
        <div class="menu">
        @foreach( $departments as $depratment)
          <div class="item @if( Input::old('depratment') === $depratment->prefix ) selected @endif" data-value="{{ $depratment->prefix }}">{{ $depratment->title }}</div>
        @endforeach
        </div>
      </div>
        </div>
 <div class="ui divider"></div>

          <button class="ui fluid large teal basic submit button">
      التسجيل
    </button>
      </div>

      <div class="ui error message"></div>

       {{ Form::close() }}


  </div>
</div>

</body>

</html>
