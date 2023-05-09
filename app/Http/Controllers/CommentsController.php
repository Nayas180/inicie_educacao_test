<?php

namespace App\Http\Controllers;

use App\Http\Requests\comments\{StoreCommentRequest};
use Illuminate\Http\{Request, Response};
use Illuminate\Support\Facades\{Http};

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (StoreCommentRequest $request) : Response
    {
        try {
            $response = Http::withToken(env('TOKEN_GOREST'))->post(env('BASE_URL_API') . "/posts/{$request->id_post}/comments", [
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body
            ]);

            if ($response->failed()) {
                return response([
                    'success' => false,
                    'message' => $response->json()
                ], $response->status());
            }

            return response([
                'success' => true,
                'message' => "Create comment with success!",
                'comment' => $response->json()
            ]);
        }
        catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
