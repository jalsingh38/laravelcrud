<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey_basic;
use App\Survey_question;
use App\Quiz;
use Intervention\Image\ImageManagerStatic as Image;

class SurveyController extends Controller 
{
  
public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
         return view('home');
    }
     function home(){
    
  return view('home');
 }

 function storeSurvey(){
    
  return view('surveyCreate');
 }
 function survey(){
     $surveys= Survey_basic::where('is_deleted','0')->paginate(5);
      return view('survey',compact('surveys'));
 }
 
 
 function createSurvey(Request $request){
  
  $created_at= date('Y-m-d H:i:s');

  $request->validate([

         'title' =>'required|max:255',
         'description' =>'required|max:100000',
        
         
     ]);

    $form_data = array(
            'title'          =>   $request->title,
            'description'    =>   $request->description,
            'custom_css'     =>   $request->custom_css,
            'created_at'    =>    $created_at,
            'is_deleted'    =>   0
        );
        $survey_basic_id = Survey_basic::insertGetId($form_data);
          $id=base64_encode($survey_basic_id);

   //return  view('surveyStep2',compact('survey_basic_id'));
     return   redirect('surveyStep2/'.$id);
   

 }
 function surveyStep2($id){

          return view('surveyStep2',compact('id'));



 }
 function createAdvancedSurvey(Request $request){
  
  $created_at= date('Y-m-d H:i:s');
  $survey_basic_id= $request->survey_basic_id;
   $id= base64_decode($survey_basic_id);
          $request->validate([
      
         'question' => 'required',
         'question_type'=> 'required',
         'options'=> 'required'

     ]);

         $i=0;
         $questions= $request->question;

          foreach($questions as $question) {
              $form_data = array([
                'question'      => $question,
                'question_type'  => $request->question_type[$i],
                'options'        => $request->options[$i],
                'created_at'     => $created_at,
                'survey_id'      => $id,
                'is_deleted'      => 0,
             ]);
              $i++;
              Survey_question::insert($form_data);
          }
          return redirect('survey')->with('success','Survey is Successfully Created');

}
 function surveyEdit($id){
  $id=base64_decode($id);
  $survey= Survey_basic::whereId($id)->first();
  return view('surveyEdit',compact('survey'));

 }

 function updateSurvey(Request $request){
  $updated_at= date('Y-m-d H:i:s');
  $id = $request->id;
  $request->validate([

         'title'     => 'required',
         'description'=> 'required'
          ]);

               $form_data = array(
               'title'  => $request->title,
               'description'  => $request->description,
               'custom_css'  => $request->custom_css,
               'updated_at'  => $updated_at
              );
         survey_basic::whereId($id)->update($form_data);
            $id=base64_encode($id);
      
           return redirect('surveyStep2Edit/'.$id);
  

 }
     function surveyStep2Edit($id){
           $id=base64_decode($id);
           $survey_questions= Survey_question::where('survey_id',$id)->get();
          return view('surveyStep2Edit',compact('survey_questions','id'));



 }
 function updateSurveyStep2(Request $request){
  
      Survey_question::where('survey_id',$request->survey_basic_id)->delete();
          $request->validate([
      
         'question' => 'required',
         'question_type'=> 'required',
         'options'=> 'required'

     ]);

         $i=0;
         $questions= $request->question;

          foreach($questions as $question) {
              $form_data = array([
                'question'      => $question,
                'question_type'  => $request->question_type[$i],
                'options'        => $request->options[$i],
                'survey_id'      => $request->survey_basic_id,
                'is_deleted'      => 0,
             ]);
               Survey_question::insert($form_data);
              $i++;
            }
             
                 return redirect('survey')->with('success','Survey is Successfully Updated');
  

 }

  function surveyFormView($id){
         $id=base64_decode($id);
         $survey_basic= Survey_basic::whereId($id)->first();
         $survey_questions= Survey_question::where('survey_id',$id)->get();
          return view('front/viewForm',compact('survey_basic','survey_questions'));
          }
  function deleteSurvey($id){
          $id=base64_decode($id);
          $soft_delete = array(
            'is_deleted'  => 1,
              );
  Survey_basic::whereId($id)->update($soft_delete);
  $delete_survey_questions=Survey_question::where('survey_id',$id)->update($soft_delete);
    return redirect('survey')->with('success','Survey is successfully deleted');

 }
}
