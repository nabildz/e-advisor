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

<h1 class="ui header">اضافة مادة</h1>    <br>
<p>رجاء ادخال جميع المواد التي تم تصفيتها من الخطة الدراسية</p>
<br>


<!--  <h3 class="ui header">المواد المقترحة</h3> -->
{{ Form::open(array('route' => 'store_student','method' => 'post','class' => 'ui large form')) }}

	<div id="courses">
	<div class="ui three column grid">
		<div class="row">
		<div class="wide column">	<div class="field">	<div class="ui selection dropdown">مادة رقم 1</div> </div>
		 </div>

			<div class="wide column">   
			<div class="field">
				<div class="ui selection dropdown">
					<input type="hidden" onchange="jsfunction(this.value,1)" name="depratment">
					<i class="dropdown icon"></i>
					<div class="default text">اختر التخصص</div>
					<div class="menu">
						@foreach( $departments as $depratment)
						<div class="item @if( Input::old('depratment') === $depratment->prefix ) selected @endif" data-value="{{ $depratment->prefix }}">{{ $depratment->title }}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="wide column">   
			<div class="field">
				<div id="dropdown1" class="ui selection dropdown disabled">
					<input id="course1" type="hidden" name="course1">
					<i class="dropdown icon"></i>
					<div id="d1" class="default text">اختر المادة</div>
					<div class="menu">
						@foreach( $courses as $course)
						<div id="{{ substr($course->prefix , 0, 2)}}1" class="item c1" data-value="{{ $course->prefix }}" style="display:none">{{ $course->prefix }} {{ $course->title }}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

{{ Form::close() }}
<div class="ui two column grid">
	<div class="row">
		<div class="wide column"><button class="big ui green button fluid" onclick="addCourse()">اضافة المادة اخري</button> </div>
		<div class="wide column"><button class="big ui blue button fluid">حفظ المواد</button> </div>
	</div>
</div>

<script>
            function jsfunction(v,id){
                alert(".item "+v.toUpperCase()+id);
                $("#dropdown"+id).attr("class","ui selection dropdown");
                //$(".item "+v.toUpperCase()+id).attr("style","display:block");
                $(".c"+id).each(function() {
                	// console.log( $( this ).text() );
                	var itemid = this.id;
                	// alert(this.id);
                	if ( itemid == v.toUpperCase()+id) 
                		{$( this ).attr("style","display:block");
                }
                else{$( this ).attr("style","display:none")}
});
                $("#d"+id).attr("class","default");
                $("#course"+id).attr("value","");
                 $("#d"+id).text("اختر المادة");
               // $("."+v.toUpperCase()+id).attr("style","display:block");

            }
               function addCourse(){
               	var id=2;
               	var large='<div class="ui three column grid"> <div class="row"> <div class="wide column"> <div class="field"> <div class="ui selection dropdown">مادة رقم '+id+'</div> </div> </div> <div class="wide column"> <div class="field"> <div class="ui selection dropdown"> <input type="hidden" onchange="jsfunction(this.value,'+id+')" name="depratment"> <i class="dropdown icon"></i> <div class="default text">اختر التخصص</div> <div class="menu"> @foreach( $departments as $depratment) <div class="item" data-value="{{ $depratment->prefix }}">{{ $depratment->title }}</div> @endforeach </div> </div> </div> </div> <div class="wide column"> <div class="field"> <div id="dropdown'+id+'" class="ui selection dropdown disabled"> <input id="course'+id+'" type="hidden" name="course1"> <i class="dropdown icon"></i> <div id="d'+id+'" class="default text">اختر المادة</div> <div class="menu"> @foreach( $courses as $course) <div id="{{ substr($course->prefix , 0, 2)}}'+id+'" class="item c'+id+'" data-value="{{ $course->prefix }}" style="display:none">{{ $course->prefix }} {{ $course->title }}</div> @endforeach </div> </div> </div> </div> </div> </div>';

 $("#courses").append(large);
 $('.ui.selection.dropdown').dropdown();
		$('.ui.menu .ui.dropdown').dropdown({
			on: 'hover'
		});
            }
        </script>

@stop