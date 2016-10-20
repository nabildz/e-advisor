@extends('student.master')

@section('content')


  <h1 class="ui header">المرشد</h1>    <br>
    <p>ينصح المرشد الالكتروني بتنزيل المواد التالية للفصل الدراسي قادم</p>
<br>

   
   <!--  <h3 class="ui header">المواد المقترحة</h3> -->
<h2 class="ui dividing header">المواد المقترحة ({{ count($maincourses) }}) <div class="ui teal horizontal label">ترتيب حسب الأهمية بالنسية الخطة الدراسية</div></h2>
     <table class="ui single line table">
  <thead>
    <tr>
      <th width="10%">رمز المادة</th>
      <th width="70%">اسم المادة</th>
 
      <th width="20%"><center>الوحدات</center></th>
    </tr>
  </thead>

  <tbody>
  @foreach ($maincourses as $course)
    <tr>
      <td>{{ $course['prefix'] }}</td>
      <td>{{ $course['title']  }}</td>
      
          <td><center>{{ $course['unit'] }}</center></td>
    </tr>
  @endforeach
  </tbody>
  
</table>

@if ($electivecourses !== '')
<h3 class="ui dividing header">المواد الاضافية ({{ count($electivecourses) }}) <div class="ui teal horizontal label">من داخل القسم</div></h3>
     <table class="ui single line table">
   <thead>
    <tr>
      <th width="10%">رمز المادة</th>
      <th width="70%">اسم المادة</th>
 
      <th width="20%"><center>الوحدات</center></th>
    </tr>
  </thead>

  <tbody>
  @foreach ($electivecourses as $course)
    <tr>
      <td>{{ $course['prefix'] }}</td>
      <td>{{ $course['title']  }}</td>
      
          <td><center>{{ $course['unit'] }}</center></td>
    </tr>
  @endforeach
  </tbody>
  
</table>
@endif
@if ($belectivecourses !== '')
<h3 class="ui dividing header">المواد الاضافية ({{ count($belectivecourses) }})<div class="ui teal horizontal label">من خارج القسم</div></h3>
    <table class="ui single line table">
   <thead>
    <tr>
      <th width="10%">رمز المادة</th>
      <th width="70%">اسم المادة</th>
 
      <th width="20%"><center>الوحدات</center></th>
    </tr>
  </thead>

  <tbody>
  @foreach ($belectivecourses as $course)
    <tr>
      <td>{{ $course['prefix'] }}</td>
      <td>{{ $course['title']  }}</td>
      
          <td><center>{{ $course['unit'] }}</center></td>
    </tr>
  @endforeach
  </tbody>
  
</table>
 @endif

<button class="big ui  button fluid">طباعة</button>

<br>
@stop