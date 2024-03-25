<?php

namespace App\Http\Controllers\Web;


use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use Auth;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
 /**   private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository) 
    {
        $this->postRepository = $postRepository;
    }
    
     * Display a listing of the resource.
     */

        public function index()
        {
            $posts = Post::all();
    
            return view('posts.index', compact('posts'));
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
                'body' => 'required',
            ]);
            $request['user_id'] = Auth::user()->id;
            Post::create($request->all());
    
            return redirect()->route('posts.index')
                ->with('success', 'Post created successfully.');
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
                'body' => 'required',
            ]);
    
            $post = Post::find($id);
            
            // authorize the user's action
            $this->authorize('update', $post);
            
            $post->update($request->all());
    
            return redirect()->route('posts.index')
                ->with('success', 'Post updated successfully.');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
    
            $post = Post::find($id);
            
            // authorize the user's action
            $this->authorize('destroy', $post);
            
            $post->delete();
    
            return redirect()->route('posts.index')
                ->with('success', 'Post deleted successfully');
        }
    
        // routes functions
        /**
         * Show the form for creating a new post.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('posts.create');
        }
    
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $post = Post::find($id);
    
            return view('posts.show', compact('post'));
        }
    
        /**
         * Show the form for editing the specified post.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $post = Post::find($id);
    
            return view('posts.edit', compact('post'));
        }
}