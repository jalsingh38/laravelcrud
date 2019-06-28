<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Pagination\LengthAwarePaginator;
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
         $posts = Post::where('is_delete','=','0')->paginate(3);

         return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
     $request->validate([
         'title' => 'required|max:255',
         'description' => 'required|max:255',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
         'added_by' => 'required'

     ]);

    $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'title'              =>   $request->title,
            'description'        =>   $request->description,
            'added_by'           =>   $request->added_by,
            'image'              =>   $new_name
        );


     $post = Post::create($form_data);

     return redirect('/posts')->with('success', 'Post is successfully saved');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts/edit', compact('post'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
         'title' => 'required|max:255',
         'description' => 'required|max:255',
         'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048'  
    
     ]);
      
     
      $form_data = array(
            'title'              =>   $request->title,
            'description'        =>   $request->description
        );

        $image = $request->file('image');
        if($image!==null){
          $new_name = rand() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('images'), $new_name);
           $form_data['image']= $new_name;
        }
        

        Post::whereId($id)->update($form_data);

        return redirect('/posts')->with('success', 'Post is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post = Post::findOrFail($id);
        //$post->delete();
        $data= array('is_delete' => 1 );
        Post::whereId($id)->update($data);
        return redirect('/posts')->with('success', 'Post is successfully deleted');
    }
}
