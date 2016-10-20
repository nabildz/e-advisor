@extends('student.master')

@section('css')
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

@stop
@section('content')

<h1 class="ui header">تعديل البيانات الشخصية</h1>    <br>

{{ Form::open(array('route' => 'update_student','method' => 'post','class' => 'ui large form')) }}

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
<!-- 
         <div class="field ">
          <div class="ui right icon input">
            <i class="user icon"></i>
            <input type="text" name="name" placeholder="الاسم" value="{{ Auth::user()->name }}">
          </div>
        </div> -->
  <input type="hidden" name="id" value="{{ Auth::user()->id }}">
  <div class="field">
    <label>الاسم</label>
    
      <div class="field">
         <div class="ui right icon input">
            <i class="user icon"></i>
            <input type="text" name="name" placeholder="الاسم" value="{{ Auth::user()->name }}">
        
      </div>
      
    </div>
  </div>

  <div class="field">
    <label>كلمة السر</label>
    
      <div class="field">
          <div class="ui right icon input">
            <i class="lock icon"></i>
            <label></label>
            <input type="password" name="password" placeholder="كلمة السر الجديدة" value="{{ Input::old('password') }}">
          </div>
      
    </div>
  </div>

   <div class="field">
    <label>التخصص</label>
      <div class="field">
       <label></label>
           <div class="ui selection dropdown">
        <input type="hidden" name="depratment" value="{{ Auth::user()->depratment }}">
        <i class="dropdown icon"></i>
        <div class="default text">{{ Auth::user()->depratment }}</div>
        <div class="menu">
        @foreach( $departments as $depratment)
          <div class="item @if(  Auth::user()->depratment === $depratment->prefix ) active selected @endif" data-value="{{ $depratment->prefix }}">{{ $depratment->title }}</div>
        @endforeach
        </div>
    
          </div>
  </div>
      
  </div>
        
 <div class="field">
         
        </div>
 <div class="ui divider"></div>

          <button class="ui fluid large teal  submit button">
      حفظ المعلومات
    </button>
      </div>

      <div class="ui error message"></div>

       {{ Form::close() }}




@stop