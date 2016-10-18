@extends('student.master')



@section('content')
    <h1 class="ui header">مرحبا بك يا {{ Auth::user()->name }} !</h1>    <br>
    <h2 class="ui header">خيارات سريعة</h2>

     <div class="ui three column grid">
    <div class="row">
   
    	<div class="wide column"> <button class="big ui blue button fluid"><a style="color:#ffffff!important;" href="{{ URL::route('guide') }}">الى المرشد</a></button></div>
		<div class="wide column"> <button class="big ui green button fluid"><a style="color:#ffffff!important;" href="{{ URL::route('courses') }}">اضافة مادة جديدة +</a></button></div>
		<div class="wide column"> <button class="big ui  button fluid"><a style="color:#000000!important;" href="{{ URL::route('guide') }}">تعديل المعلومات الشخصية</a></button></div>


  </div>

  </div>

 <br>
   
    <h2 class="ui header">احصائيات</h2>

     <div class="ui wide four column grid">
    <div class="row">
   
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class="fa fa-book" aria-hidden="true"></i> {{ $count1 }}</div>
    <br>
    <div class="meta">مادة</div>
         <div class="meta"> تم
 تصفيتها</div>
  
  </div>
</div></div>
              
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class="fa fa-book" aria-hidden="true"></i> {{ $count2 }}</div>
      <br>
    <div class="meta">مادة تخصص </div>
      <div class="meta"> تم
 تصفيتها</div>
   
   
  </div>
</div></div>
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class=" fa fa-book" aria-hidden="true"></i>  {{ $count3 }}</div>
      <br>
    <div class="meta">مادة عامة </div>
         <div class="meta"> تم
 تصفيتها</div>
   
  </div>
</div></div>
         <div class=" column"> 
     <div class="ui card">
  <div class="content">
    <div class="header"><i class="fa fa-bar-chart" aria-hidden="true"></i></div>
      <br>
    <div class="meta">المزيد من </div>
         <div class="meta"> الاحصائيات</div>
  
  </div>
</div></div>


  </div>

  </div>
@stop