<?php

class GuideController extends \BaseController {

	public function Home(){
		$count1 = StudentsCourses::count();
		$count2 = StudentsCourses::where('course','like','%'.Auth::user()->depratment.'%')->count();
		$count3 = StudentsCourses::where('course','not like','%se%')->where('course','not like','%se%')->
		where('course','not like','%cn%')->
		where('course','not like','%ce%')->where('course','not like','%is%')->where('course','not like','%cs%')->count();
    return View::make('student.home',array('count1'=> $count1,'count2'=> $count2,'count3'=> $count3));
	}

	public function courses(){
		$departments = Departments::all();
		$courses = Courses::all();
    return View::make('student.courses', array('departments' => $departments,'courses' => $courses));
	
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
		$root_plan = Plans::where('pre_courses', 'root')->get()->toArray();
		$genral_plan = Plans::where('department', Auth::user()->depratment)->get()->toArray();
		$department_plan = Plans::where('department', Auth::user()->depratment)->get()->toArray();
		$x = array_merge($root_index,$root_plan, $genral_plan,$department_plan);
// print_r($cources_arra);


for ($i=0; $i <sizeof($x) ; $i++) { 
	if(in_array('addout',$x[$i],true)){
		$cources_arra[$x[$i]['course']] = array($x[$i]['version'],$x[$i]['pre_courses'],$x[$i]['elective'],$x[$i]['units']);
	}elseif (in_array('add',$x[$i],true)) {
		$cources_arra[$x[$i]['course']] = array($x[$i]['version'],$x[$i]['pre_courses'],$x[$i]['elective'],$x[$i]['units']);
	}else{
		$cources_arra[$x[$i]['course']] = array($x[$i]['version'],$x[$i]['pre_courses'],$x[$i]['units']);
	}
}

// print_r($cources_arra);
// // $array = array();
// // 		foreach ($final_plans as $plan ) {
// // 			$cources_arra[$plan['course']]=array($plan['version'],$plan['pre_courses'],$plan['elective'],$plan['units']);
		   
// // 		}

// 		$StudentsCourses2 = StudentsCourses::where('student_id',Auth::user()->id)->lists('course');
// 		$courses =  array_values($StudentsCourses2);
		// $courses[] =  array_unshift($courses,'root');

// print_r($courses);
// echo "<br>";

// echo "<br>";echo "<br>";echo "<br>";echo "<br>";
// print_r($root_plan);
// print_r($department_plan);

// 		$plan = DB::table('plans')->join('plans', 'pre_courses', 'root')->join('plans', 'department', Auth::user()->depratment)->get();
// print_r($plan);


		// $StudentsCourses = DB::table('students_courses')->where('student_id', Auth::user()->id)->get()->toArray();

	
		//  		print_r($courses);
		// // $courses[] =  array_unshift($courses, 'root');

		// // print_r($courses);
		//  		echo "<br>";
		//  // $courses2=['root','IT111','GS113','IT101','IT112','SE201'];
				// $courses2 =  array_unshift($courses2, 'root');
		// print_r($courses);
// 		$cources_arra=array( 
// 	'root'=>array('v1','',0),
// 	'IT101'=>array('v1','root',0),
// 	'IT111'=>array('v1','root',0),
// 	'GE111'=>array('v1','root',0),
// 	'GS111'=>array('v1.-v5','root',0),
// 	'GS113'=>array('v5','root',0),
// 	'GS114'=>array('v5','GS113',0),
// 	'GS213'=>array('v5','GS114',0),
// 	'GE101'=>array('v1','root',0),
// 	'GE131'=>array('v1.-v4','root',0),
// 	'GE132'=>array('v1.-v2','GE131',0),
// 	''GE331=>array('v4','root',0),
// 	'Ge331'=>array('v2','GE131',0),
// 	'GS141'=>array('v1','root',0),
// 	'IT112'=>array('v1','IT111',0),
// 	'IT121'=>array('v1','IT101',0),
// 	'GS112'=>array('v1.-v5','GS111',0),
// 	'GE112'=>array('v1','GE111',0),
// 	'IT212'=>array('v1','IT112',0),
// 	'IT201'=>array('v1','GS111,IT111',0),
// 	'GS221'=>array('v1.-v5','GS112',0),
// 	'Gs221'=>array('v5','GS114',0),
// 	'GE231'=>array('v1','GE132',0),
// 	'IT222'=>array('v1','IT202,IT221',0),
// 	'IT271'=>array('v1','IT221',0),
// 	'GE232'=>array('v1','GE231',0),
// 	'GE311'=>array('v1','GE112',0),
// 	'IT341'=>array('v1','IT212',0),
// 	'IT322'=>array('v1','IT212',0),
// 	'IT342'=>array('v1','IT271',0),
// 	'IT301'=>array('v1','IT101,IT111',0),

// 	'SE201'=>array('v1','IT112',0),
// 	'SE211'=>array('v1','SE201',0),
// 	'CN281'=>array('v1','IT112',0),
// 	'CS211'=>array('v1','IT201,IT112',0),
// 	'IS201'=>array('v1','IT112',0),
// 	'SE312'=>array('v1','SE201,IT201',0),
// 	'SE321'=>array('v1','SE201',0),
// 	'SE322'=>array('v1','SE201',0),
// 	'SE331'=>array('v1','SE201',0),
// 	'SE341'=>array('v1','SE201',0),
// 	'SE441'=>array('v1','SE321',0),
// 	'SE461'=>array('v1','SE321',0),
// 	'SE490'=>array('v1','IT341,SE321',0),
// 	'SE492'=>array('v1','SE201',0),
	
// 	'SE301'=>array('v1','SE201','add',0),
// 	'SE421'=>array('v1','SE321','add',0),
// 	'SE422'=>array('v1','SE321','add',0),
// 	'SE443'=>array('v1','SE321','add',0),
// 	'CS331'=>array('v1','IT112','add',0),
// 	'CS451'=>array('v1','IT212,IT201','add',0),
// 	'CS471'=>array('v1','IT322','add',0),
	// 'IS475'=>array('v1','IS201,CN281','add',0));
// print_r($cources_arra2);
// root cource must always be taken and added in the code for the b33 to work
$courses=['root'];
// //echo "  all cources <br>";
$V_Array=array();
$material=array();
$notInPlan=array();
//echo 
for ($i=0; $i < sizeof($courses); $i++) { 
	$Vmat=explode(".-",$cources_arra[$courses[$i]][0]);
	if (sizeof($Vmat)==2) {
		$notInPlan[sizeof($notInPlan)]=$Vmat[1];	
	}
}
//print_r($notInPlan);
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
// echo "  what's not allowed <br>";
//print_r($V_Array);
//echo " tree of versions <br>";
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
// print_r($cource_opens);
// echo "<br><br><br><br>";
$priority_array_main=$this->FindPriority('root',$cource_opens,$priority_array_main);
// print_r($priority_array_main);
// echo "<br><br><br><br>";
//$courses=['root','IT101'];
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
//print_r($Cneeded);
//echo "<br><br>";
$Copened=array();
for ($i=0; $i <sizeof($Cneeded) ; $i++) { 
	$kkk="";
	$d2=explode(",",$cources_arra[$Cneeded[$i]][1]);
	if (in_array($d2[0],$courses,true)) {
		$kkk="1";
	}
	if(sizeof($d2)==2){
		if (in_array($d2[1],$courses,true)) {
			$kkk=$kkk."1";
		}	
	}else{
		$kkk=$kkk."1";
	}
	if (strlen($kkk)==2) {
		$Copened[sizeof($Copened)]=$Cneeded[$i];
	}
}
//print_r($Copened);
//echo "<br> <br> <br>";
$recomended=array();
$recomended_add=array();
$recomended_main=array();
$sorted=array();
$looper=sizeof($Copened);

  //echo "================================================<br><br>";
  // echo "Courses<br><br>";
//print_r($Copened);
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
		$recomended_main[sizeof($recomended_main)]=$Copened[$rot];
	}
	$recomended[sizeof($recomended)]=$Copened[$rot];
	if($key != 0){
	$sorted[] = array($Copened[$rot],$key);
	}
	$looper--;
}

	// print_r($recomended_main);

	foreach ($recomended_main as $course) {

	$title = Courses::where('prefix', $course)->pluck('title');
    $title = Courses::where('prefix', $course)->pluck('title');
	$finalcourses[] = array('prefix' => $course,'title' => $title);

	}
	// print_r($finalcourses);
	    return View::make('student.guide', array('courses' => $finalcourses));
	}



	public function login()
	{
		return View::make('login');
	}
}
