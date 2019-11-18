<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey_basic;
use App\Survey_question;
use App\Puzzle;
use App\Quiz_title;
use Intervention\Image\ImageManagerStatic as Image;

class QuizController extends Controller
{

  
public function __construct()
    {
        $this->middleware('auth');
    }

  function quizListing(){

    $Quiz_titles = Quiz_title::where('is_deleted',0)->Paginate(5);

     return view('quiz/quizListing',compact('Quiz_titles'));

   }
 function createQuiz(){

  return view('quiz/quizCreate');

 }

 function storeQuiz(Request $request){
 	$created_at= date('Y-m-d H:i:s');

	 $request->validate([

         'title' =>'required',
         'description' =>'required'
        
         
     ]);

	    $form_data = array(
	            'title'          =>   $request->title,
              'description'    =>   $request->description,
              'time'          =>    $request->time,
	            'created_at'    =>    $created_at,
	            'is_deleted'    =>   0
	        );
	        $titleId = Quiz_title::insertGetId($form_data);
	  		 $i=0;
         $questions= $request->question;

          foreach($questions as $question) {
              $form_data2 = array([
                'question'      => $question,
                'options'        => $request->options[$i],
                'right_answer'  => $request->right_answer[$i],
                'is_deleted'    => 0,
                'titleId'       => $titleId,
             ]);
               Puzzle::insert($form_data2);
              $i++;
            }
           
 }

      function editQuiz($id){

        $quiz_title = Quiz_title::whereId($id)->first();
     
      return view('quiz/quizEdit', compact('quiz_title'));

     }

       function deleteQuiz($id){
        $soft_delete = array(
              'is_deleted' => 1,
            );

              $quiz_title = Quiz_title::whereId($id)->update($soft_delete);
              $quiz_puzzle = Puzzle::where('titleId',$id)->update($soft_delete);


            return redirect('quizListing')->with('success','Quiz deleted successfully');

           }
           function quiz_multidelete(Request $request){
            $ids=$request->ids;
            dd($ids);
            foreach ($ids as $id) {
            echo "string";
            }


            return redirect('quizListing')->with('success','Quiz deleted successfully');

           }

}
