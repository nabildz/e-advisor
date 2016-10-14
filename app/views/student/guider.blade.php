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
  <link href="{{URL::to('/css/semantic.min.css')}}" rel="stylesheet">
  <link href="{{URL::to('/css/font-awesome.min.css')}}" rel="stylesheet">

  <style type="text/css">
  body {
    background-color: #FFFFFF;
  }
  .ui.menu .item img.logo {
    margin-left: 1.5em;
  }
  .main.container {
    margin-top: 6em;
  }
  .wireframe {
    margin-top: 2em;
  }
  .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
  </style>

</head>
<body>

  <div class="ui fixed inverted menu">
    <div class="ui container">
      <a href="#" class="header item">
        <img class="logo" src="{{URL::to('/images/logo2.png')}}">
        المرشد الالكتروني
      </a>
      <a href="#" class="item">الرئيسية</a>
            <a href="#" class="item">المرشد</a>
                  <a href="#" class="item">الفصول الدراسية</a>
                        <a href="#" class="item">تسجيل الخروج</a>
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
   
    <h1 class="ui header">المرشد</h1>    <br>
    <p>ينصح المرشد الالكتروني بتنزيل المواد التالية للفصل الدراسي قادم</p>
<br>
    


   
   <!--  <h3 class="ui header">المواد المقترحة</h3> -->

     <table class="ui single line table">
  <thead>
    <tr>
      <th>رمز المادة</th>
      <th>اسم المادة</th>
      <th>تصنيف المادة</th>
      <th>الوحدات</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($courses as $course)
  
    <tr>
      <td>{{ $course[0] }}</td>
      <td>{{ $course[1] }}</td>
        <td>{{ "تصنيف" }}</td>
          <td>{{ "3" }}</td>
    </tr>

@endforeach
    
  </tbody>
</table>

<button class="big ui  button fluid">طباعة</button>
  </div>

  <div class="ui inverted vertical footer segment">

    <div class="ui center aligned container">
      
      <img src="{{URL::to('/images/logo2.png')}}" class="ui centered mini image">

    

    </div>
  </div>

</body>

</html>
