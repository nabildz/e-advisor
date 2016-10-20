<?php

class GuideController extends \BaseController {

	public function Home(){
		$count1 = StudentsCourses::where('student_id',Auth::user()->id)->count();
		$count2 = StudentsCourses::where('student_id',Auth::user()->id)->where('course','like','%'.Auth::user()->depratment.'%')->count();
		$count3 = StudentsCourses::where('student_id',Auth::user()->id)->where('course','not like','%se%')->where('course','not like','%se%')->
		where('course','not like','%cn%')->
		where('course','not like','%ce%')->where('course','not like','%is%')->where('course','not like','%cs%')->count();
		return View::make('student.home',array('count1'=> $count1,'count2'=> $count2,'count3'=> $count3));
	}

	public function courses(){
		$departments = Departments::all();
		$courses = Courses::all();
		return View::make('student.courses', array('departments' => $departments,'courses' => $courses));
		

	}

		

	public function store_courses(){
		$coursesNo = Input::get('coursesNo');
		for ($id=1; $id <= $coursesNo  ; $id++) { echo "<br>";

			$coursecheck = Input::get('course'.$id);

		if ($coursecheck != "") {
			// echo "xxx";
			$course = new StudentsCourses;
			$course->course = Input::get('course'.$id);
			$course->student_id = Auth::user()->id;
			$save= $course->save();
			if ($save) {
				// echo "تم اضافة ".Input::get('course'.$id)." بنجاح";
			}
			
			// echo "<br>";echo "<br>";
		}

	}

 return Response::view('messages.add-success');

}


public function FindPriority($cource_name,$cource_opens,$priority_array)
{	
		if(array_key_exists($cource_name,$cource_opens)){
		for ($i=0; $i <sizeof($cource_opens[$cource_name]) ; $i++) { 
			$priority_array=$this->FindPriority($cource_opens[$cource_name][$i],$cource_opens,$priority_array);
			$priority_array[$cource_name]=$priority_array[$cource_name]+$priority_array[$cource_opens[$cource_name][$i]];
		}
		$priority_array[$cource_name]=$priority_array[$cource_name]+sizeof($cource_opens[$cource_name]);
	}
	return $priority_array;
}

public function GetMaterialFromVersion($LookingForVersion,$NAV,$Vtree,$cources)
{

	$cources_arra_keys=array_keys($cources);
	$mate_pure=array();
	for ($i=0; $i <sizeof($cources) ; $i++) { 
		$d2=explode(".-",$cources[$cources_arra_keys[$i]][0]);
		if($d2[0]==$LookingForVersion){
			if (sizeof($d2)==2) {
				if(in_array($d2[1], $NAV,true)){
					$mate_pure[sizeof($mate_pure)]=$cources_arra_keys[$i];
				}
			}else{
				$mate_pure[sizeof($mate_pure)]=$cources_arra_keys[$i];
			}
		}
	}
	if(array_key_exists($LookingForVersion,$Vtree)){

		for ($i=0; $i <sizeof($Vtree[$LookingForVersion]) ; $i++) { 
			if(in_array($Vtree[$LookingForVersion][$i], $NAV,true)){}else{
				$mate=array();
				$mate=$this->GetMaterialFromVersion($Vtree[$LookingForVersion][$i],$NAV,$Vtree,$cources);
				for($g=0;$g<sizeof($mate);$g++){
					$mate_pure[sizeof($mate_pure)]=$mate[$g];
				}
			}
		}
	}
	return $mate_pure;
}


public function guide()
{
	
	$root_index = Plans::where('course', 'root')->get()->toArray();
	// print_r($root_index);
	$root_plan = Plans::where('pre_courses', 'root')->get()->toArray();
	$all_plan = Plans::all()->toArray();
	$department_plan = Plans::where('department', Auth::user()->depratment)->get()->toArray();
	 $x = array_merge($root_index,$all_plan);
	// $x= $all_plan;
// print_r($cources_arra = arr);

	$cources_arra =array();
	$y=Auth::user()->depratment;

for ($i=0; $i <sizeof($x) ; $i++) { 
	if (in_array('it',$x[$i],true) || in_array($y,$x[$i],true)) {
		if (in_array('add',$x[$i],true)) {
			$cources_arra[$x[$i]['course']] = array($x[$i]['version'],$x[$i]['pre_courses'],$x[$i]['elective'],$x[$i]['semesterNo'],$x[$i]['units']);
		}else{
			$cources_arra[$x[$i]['course']] = array($x[$i]['version'],$x[$i]['pre_courses'],$x[$i]['semesterNo'],$x[$i]['units']);
		}	
	}else{
		if (! array_key_exists($x[$i]['course'], $cources_arra)) {
			$cources_arra[$x[$i]['course']] = array($x[$i]['version'],$x[$i]['pre_courses'],'addout',7,$x[$i]['units']);
		}
	}

}
// print_r($cources_arra);
		$StudentsCourses2 = StudentsCourses::where('student_id',Auth::user()->id)->lists('course');
		$courses =  array_values($StudentsCourses2);
		$addroot =  array_unshift($courses,'root');
		// print_r($courses);
$V_Array=array();
$material=array();
$notInPlan=array();
//echo

//to find the Vs that are not in plan
for ($i=0; $i < sizeof($courses); $i++) { 
	$Vmat=explode(".-",$cources_arra[$courses[$i]][0]);
	if (sizeof($Vmat)==2) {
		$notInPlan[sizeof($notInPlan)]=$Vmat[1];	
	}
}
//echo "  what's not allowed <br>";
//print_r($notInPlan);
//echo "<br>";
//cources names:-
$cources_arra_keys=array_keys($cources_arra);


for ($i=0; $i < sizeof($cources_arra); $i++) { 
	$d2=explode(".-",$cources_arra[$cources_arra_keys[$i]][0]);
	if (sizeof($d2)==2) {
		if (array_key_exists($d2[0],$V_Array)) {

			if ( in_array($d2[1],$V_Array[$d2[0]],true ) ) {
				//in case it was already there!
			}else{
				$V_Array[$d2[0]][sizeof($V_Array[$d2[0]])]=$d2[1];
			}
		}else{
			$V_Array[$d2[0]][0]=$d2[1];
		}
	}	
}
// echo " tree of versions <br>";
//print_r($V_Array);
//echo "<br> all the courses that you should study <br>";

$material=$this->GetMaterialFromVersion('v1',$notInPlan,$V_Array,$cources_arra);
//print_r($material);

//echo "<br> now we make the academic guidance!!<br>";
// first thing, priority will be set based on how many cources it will eventually opens lol
$priority_array_main=array();
for ($i=0; $i <sizeof($material) ; $i++) { 
	$priority_array_main[$material[$i]]=0;
}
$cource_opens=array();
for ($i=0; $i <sizeof($material) ; $i++) { 
	for ($j=0; $j <sizeof($material) ; $j++) { 
		$d2=explode(",",$cources_arra[$material[$j]][1]);
		if ($material[$i]==$d2[0]) {
			if(array_key_exists($material[$i],$cource_opens)){
				$cource_opens[$material[$i]][sizeof($cource_opens[$material[$i]])]=$material[$j];
			}else{
				$cource_opens[$material[$i]][0]=$material[$j];
			}
			
		}
		if(sizeof($d2)==2){
			if ($material[$i]==$d2[1]) {
				if(array_key_exists($material[$i],$cource_opens)){
					$cource_opens[$material[$i]][sizeof($cource_opens[$material[$i]])]=$material[$j];
				}else{
					$cource_opens[$material[$i]][0]=$material[$j];
				}
				
			}	
		}
	}
}

//print_r($cource_opens);
//
//echo "<br><br><br><br>";
$priority_array_main=$this->findPriority('root',$cource_opens,$priority_array_main);
//print_r($priority_array_main);
//echo "<br><br><br><br>";

//$courses=['root','IT101'];
$number_of_units_taken=0;
for ($i=0; $i <sizeof($courses) ; $i++) { 
	$number_of_units_taken=$number_of_units_taken+$cources_arra[$courses[$i]][sizeof($cources_arra[$courses[$i]])-1];
}

// echo "<br> number of units=".$number_of_units_taken."<br>";

$Cneeded=array();
for ($i=0; $i <sizeof($courses) ; $i++) { 
	if (array_key_exists($courses[$i],$cource_opens)) {
		
		for ($j=0; $j<sizeof($cource_opens[$courses[$i]]); $j++){ 
			if( in_array($cource_opens[$courses[$i]][$j],$courses,true) ){}else{
				if(in_array($cource_opens[$courses[$i]][$j], $Cneeded,true)){}else{
					$Cneeded[sizeof($Cneeded)]=$cource_opens[$courses[$i]][$j];
				}
				
			}
		}
	}
}
//echo "<br>b33333333333<br>";
//print_r($Cneeded);
//echo "<br><br>";

$Copened=array();
for ($i=0; $i <sizeof($Cneeded) ; $i++) { 
	$kkk="";
	$d2=explode(",",$cources_arra[$Cneeded[$i]][1]);
	for ($j=0; $j <sizeof($d2) ; $j++) { 
		if (in_array($d2[$j],$courses,true)) {
			$kkk=$kkk."1";
		}else{
			if(! in_array($d2[$j],$material,true)){
				$kkk=$kkk."1";
			}

		}
	}
	
	if (strlen($kkk)==sizeof($d2)) {
		$Copened[sizeof($Copened)]=$Cneeded[$i];
	}
}
//print_r($Copened);
//echo "<br> <br> <br>";
//

//
$recomended=array();
$recomended_add=array();
$recomended_add_out=array();
$recomended_main=array();
$looper=sizeof($Copened);
//echo "<br> copened <br>";
//print_r($Copened);
//echo "<br>";
//echo "<br> priority_array_main <br>";
//print_r($priority_array_main);
//echo "<br>";
while(sizeof($Copened)>0 && ($looper!=0)){
	$rot=-1;
	for ($i=0; $i <sizeof($Copened) ; $i++) {
		if($rot==-1){
			if(in_array($Copened[$i],$recomended,true)){

			}else{
				$key=$priority_array_main[$Copened[$i]];
				$rot=$i;
			}
		}else{
			if($key<$priority_array_main[$Copened[$i]]){
				if(in_array($Copened[$i],$recomended,true)){

				}else{
					$key=$priority_array_main[$Copened[$i]];
					$rot=$i;
				}
				
			}
		}
		
	}
	if (in_array('add',$cources_arra[$Copened[$rot]],true)) {
		$recomended_add[sizeof($recomended_add)]=$Copened[$rot];
	}else{
		if (in_array('addout',$cources_arra[$Copened[$rot]],true)) {
			$recomended_add_out[sizeof($recomended_add_out)]=$Copened[$rot];
		}else{
			$recomended_main[sizeof($recomended_main)]=$Copened[$rot];
		}
	}
	$recomended[sizeof($recomended)]=$Copened[$rot];
	// echo $Copened[$rot]."      ".$key."<br>";
	$looper--;
}



for ($i=0; $i <sizeof($cources_arra_keys) ; $i++) { 
	$d2=explode(",",$cources_arra[$cources_arra_keys[$i]][1]);
	if(sizeof($d2)==1){
		if(is_numeric($d2[0])){
			if($cources_arra_keys[$i]==='root'){}else{
				$keyii=$cources_arra[$cources_arra_keys[$i]][1];
				if (!array_key_exists($keyii, $cources_arra)) {
					if($keyii<=$number_of_units_taken){
							$recomended[sizeof($recomended)]=$cources_arra_keys[$i];
							if (in_array('add',$cources_arra[$cources_arra_keys[$i]],true)) {
								$recomended_add[sizeof($recomended_add)]=$cources_arra_keys[$i];
							}else{
								if (in_array('addout',$cources_arra[$cources_arra_keys[$i]],true)) {
									$recomended_add_out[sizeof($recomended_add_out)]=$cources_arra_keys[$i];
								}else{
									$recomended_main[sizeof($recomended_main)]=$cources_arra_keys[$i];
								}
							}
					}
				}
			}
		}
	}
}


// echo "<br>";
// print_r($recomended);
// echo "<br>";
// print_r($recomended_main);
$number_of_add_taken=0;
for ($i=0; $i <sizeof($courses) ; $i++) { 
	if(in_array('add',$cources_arra[$courses[$i]],true)){
		$number_of_add_taken=$number_of_add_taken+1;
	}
}
// echo "<br> i wanna play a game <br> you have to choose ".(3-$number_of_add_taken)." from the following <br>";
// print_r($recomended_add);
// echo "<br> courses out of plan <br>";

$number_of_addout_taken=0;
for ($i=0; $i <sizeof($courses) ; $i++) { 
	if(in_array('addout',$cources_arra[$courses[$i]],true)){
		$number_of_addout_taken=$number_of_addout_taken+1;
	}
}
// echo "<br> i wanna play a game <br> you have to choose ".(2-$number_of_addout_taken)." from the following <br>";
// print_r($recomended_add_out);
$guiding0=array();
for ($i=0; $i <sizeof($recomended_main) ; $i++) { 
	$p=($cources_arra[$recomended_main[$i]][2]-1);
	
	if(array_key_exists($p, $guiding0)){
		$guiding0[$p][sizeof($guiding0[$p])]=$recomended_main[$i];
	}
	else{
		$guiding0[$p][0]=$recomended_main[$i];	
	}
}
// echo "<br> guiding0 <br>";
// print_r($guiding0);

$guiding1=array();
for ($i=0; $i <sizeof($recomended_add) ; $i++) { 
	$p=($cources_arra[$recomended_add[$i]][3]-1);
	
	if(array_key_exists($p, $guiding1)){
		$guiding1[$p][sizeof($guiding1[$p])]=$recomended_add[$i];
	}
	else{
		$guiding1[$p][0]=$recomended_add[$i];	
	}
}
// echo "<br> guiding1 <br>";
// print_r($guiding1);


$guiding2=array();
for ($i=0; $i <sizeof($recomended_add_out) ; $i++) { 
	$p=($cources_arra[$recomended_add_out[$i]][3]-1);
	
	if(array_key_exists($p, $guiding2)){
		$guiding2[$p][sizeof($guiding2[$p])]=$recomended_add_out[$i];
	}
	else{
		$guiding2[$p][0]=$recomended_add_out[$i];	
	}
}
// echo "<br> guiding2 <br>";
// print_r($guiding2);

$resulting_matrix=array();
for ($i=0; $i < 8 && sizeof($resulting_matrix)!=6; $i++) { 
	if (array_key_exists($i,$guiding0)) {
		for ($j=0; $j<sizeof($guiding0[$i]) && sizeof($resulting_matrix)!=6; $j++) { 
			$resulting_matrix[sizeof($resulting_matrix)]=$guiding0[$i][$j];	
		}
	}
	if (array_key_exists($i,$guiding1)) {
		for ($j=0; $j<sizeof($guiding1[$i]) && sizeof($resulting_matrix)!=6 && $j<(3-$number_of_add_taken); $j++) { 
			$resulting_matrix[sizeof($resulting_matrix)]='مادة إضافية من داخل القسم';	
		}
	}
	if (array_key_exists($i,$guiding2)) {
		for ($j=0; $j<sizeof($guiding2[$i]) && sizeof($resulting_matrix)!=6 && $j<(2-$number_of_addout_taken); $j++) { 
			$resulting_matrix[sizeof($resulting_matrix)]='مادة إضافية من خارج القسم';	
		}
	}
}
// echo "<br> result <br>";
// print_r($resulting_matrix);

// // print_r($guiding0); // Main courses sorted by semster then sorted by prority
// // echo "<br> <br>";
// // print_r($guiding1); // Electives from student department 
// // echo "<br> <br>";
// // print_r($guiding2); // Breath Electives from student department
// // echo "<br> <br>";
// // print_r($resulting_matrix); // Final Courses with Courses and breath
// // echo "<br> <br>";

	// foreach ($resulting_matrix as $course) {

	// 	$title = Courses::where('prefix', $course)->pluck('title');
	// 	$title = Courses::where('prefix', $course)->pluck('title');
	// 	$finalcourses[] = array('prefix' => $course,'title' => $title);

	// }
// 	// // print_r($finalcourses);
// 	// return View::make('student.guide', array('courses' => $finalcourses));

$electivecourses = '';
$belectivecourses ='';

foreach ($resulting_matrix as $course) {

		$title = Courses::where('prefix', $course)->pluck('title');
		$units = Plans::where('course', $course)->pluck('units');
		if ($title && $units) {
			$maincourses[] = array('prefix' => $course,'title' => $title,'unit' => $units);
		}
		else{
			$maincourses[] = array('prefix' => $course,'title' => '-','unit' => '-');
		}
		

	}

if (isset($guiding1[5]) && $number_of_add_taken < 3) {
	foreach ($guiding1[5] as $course) {

		$title = Courses::where('prefix', $course)->pluck('title');
		$units = Plans::where('course', $course)->pluck('units');
		
		if ($title && $units) {
			$electivecourses[] = array('prefix' => $course,'title' => $title,'unit' => $units);
		}
		else{
			$maincourses[] = array('prefix' => $course,'title' => '-','unit' => '-');
		}


	}
}
	
	if (Auth::user()->depratment != 'it') {
		# code...


if (isset($guiding2[6]) && $number_of_addout_taken < 2) {
foreach ($guiding2[6] as $course) {

		$title = Courses::where('prefix', $course)->pluck('title');
		$units = Plans::where('course', $course)->pluck('units');
		

		if ($title && $units) {
			$belectivecourses[] = array('prefix' => $course,'title' => $title,'unit' => $units);
		}
		else{
			$maincourses[] = array('prefix' => $course,'title' => '-','unit' => '-');
		}


	}
}	}


// // 'electivecourses' => $electivecourses,'belectivecourses' => $belectivecourses

// 	// print_r($finalcourses);
	return View::make('student.guide', array('maincourses' => $maincourses,'electivecourses' => $electivecourses,'belectivecourses' => $belectivecourses));
}



public function login()
{
	return View::make('login');
}
}
