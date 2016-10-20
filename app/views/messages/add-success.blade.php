@extends('student.master')

@section('content')
<div class="ui middle aligned center aligned grid">
  <div class="column">
     

      <div class="ui segment">
      <center>     <i class="teal massive checkmark icon"></i>
       <h2 class="ui  header titletext">
  
       <p>
      تمت عملية اضافة المواد بنجاح </p>
    </h2></center><br><br>
          <button class="ui  basic button"><a href="{{ URL::route('home') }}"> العودة للرئسية</a>

    </button>   <br><br>
      </div>



       


  </div>
</div>
@stop