<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\{StoreUserRequest};
use Illuminate\Http\{Request, Response};
use Illuminate\Support\Facades\{Http};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $response = Http::withToken(env('TOKEN_GOREST'))->get(env('BASE_URL_API') . "/users");
            
            if ($response->failed()) {
                return response([
                    'success' => false,
                    'message' => $response->json()
                ], $response->status());
            }

            return response([
                'success' => true,
                'message' => "Get users in API with success!",
                'users' => $response->json()
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (StoreUserRequest $request) : Response
    {
        try {
            $response = Http::withToken(env('TOKEN_GOREST'))->post(env('BASE_URL_API') . "/users", [
                'email' => $request->email,
                'name' => $request->name,
                'gender' => $request->genero,
                'status' => "active"
            ]);

            if ($response->failed()) {
                return response([
                    'success' => false,
                    'message' => $response->json()
                ], $response->status());
            }

            return response([
                'success' => true,
                'message' => "User Create with success!",
                'user' => $response->json()
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
    public function show (int $id_user) : Response
    {
        try {
            $response = Http::withToken(env('TOKEN_GOREST'))->get(env('BASE_URL_API') . "/users/{$id_user}");
            
            if ($response->failed()) {
                return response([
                    'success' => false,
                    'message' => $response->json()
                ], $response->status());
            }

            return response([
                'success' => true,
                'message' => "Get user in API with success!",
                'users' => $response->json()
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
