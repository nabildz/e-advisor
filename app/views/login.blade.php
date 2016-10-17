<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>المرشد الإلكتروني - الدخول</title>


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
      margin-top: 100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="{{URL::to('/images/logo.png')}}" class="image">
      
    </h2>
    {{ Form::open(array('route' => 'login','method' => 'post','class' => 'ui large form')) }}
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
          <div class="ui right icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="اسم المستخدم">
          </div>
        </div>
        <div class="field">
          <div class="ui right icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="كلمة السر">
          </div>
        </div>
       <!--  <div class="ui fluid large teal submit button"></div> -->
          <button class="ui fluid large teal  submit button">
    الدخول
    </button>
      </div>

      <div class="ui error message"></div>

       {{ Form::close() }}

    <div class="ui message">
      لاتملك حساب <a href="{{ URL::route('register') }}">سجل الان</a>
    </div>
  </div>
</div>

</body>

</html>
