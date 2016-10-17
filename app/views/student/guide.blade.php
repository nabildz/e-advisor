@extends('student.master')

@section('content')


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

@stop