@extends('student.master')



@section('content')
    <h1 class="ui header">مرحبا بك يا {{ Auth::user()->name }} !</h1>    <br>
    <h2 class="ui header">خيارات سريعة</h2>

     <div class="ui three column grid">
    <div class="row">
   
     <div class="wide column"> <button class="big ui blue button fluid">الى المرشد</button></div>
         <div class="wide column"> <button class="big ui green button fluid">اضافة مادة جديدة +</button></div>
              <div class="wide column"> <button class="big ui  button fluid">تعديل المعلومات الشخصية</button></div>


  </div>

  </div>


   
    <h2 class="ui header">احصائيات</h2>

     <div class="ui wide four column grid">
    <div class="row">
   
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class="fa fa-book" aria-hidden="true"></i> 27</div>
    <div class="meta">مادة تم تصفيتها</div>
  
  </div>
</div></div>
              
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class="fa fa-book" aria-hidden="true"></i> 15</div>
    <div class="meta">مادة تخصص تم
 تصفيتها</div>
   
  </div>
</div></div>
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class="fa fa-book" aria-hidden="true"></i> 13</div>
    <div class="meta">مادة عامة تم
 تصفيتها</div>
   
  </div>
</div></div>
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
    <div class="meta">المزيد من الاحصائيات</div>
  
  </div>
</div></div>


  </div>

  </div>
@stop