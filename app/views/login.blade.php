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
  <link href="{{URL::to('/css/semantic.min.css')}}" rel="stylesheet">
  <link href="{{URL::to('/css/font-awesome.min.css')}}" rel="stylesheet">

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
    {{ Form::open(array('url' => 'login','class' => 'ui large form')) }}
      <div class="ui segment">
        <div class="field">
          <div class="ui right icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="اسم المستخدم">
          </div>
        </div>
        <div class="field">
          <div class="ui right icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="كلمة السر">
          </div>
        </div>
        <div class="ui fluid large teal submit button">الدخول</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      لاتملك حساب <a href="#">سجل الان</a>
    </div>
  </div>
</div>

</body>

</html>
