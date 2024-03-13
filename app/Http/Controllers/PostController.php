<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('student')->get();

        if ($posts->count() > 0) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data is',
                'data' => $posts,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No posts found',
            ]);
        }
    }

    public function store(PostRequest $request)
{
    $validatedData = $request->validated();

    $post = Post::create([
        'title' => $validatedData['title'],
        'student_id' => $validatedData['student_id'],
        // Add other fields as needed
    ]);

    if ($post) {
        return response()->json([
            'status' => 'success',
            'message' => 'Data inserted',
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'Failed to insert data',
    ]);
}

public function show(){

}











}
