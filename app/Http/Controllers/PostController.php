<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    //Constructor
    private $postService;
    public function __construct(PostService $postService){
        $this->postService = $postService;
    }
    // Index
    public function index(){
        try {
            $posts = $this->postService->getAll();
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'posts' => $posts->items(),
                'meta' => [
                    'total' => $posts->total(),
                    'perPage' => $posts->perPage(),
                    'currentPage' => $posts->currentPage()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage()
            ]);
        }
    }
    //Create
    public function store(PostRequest $request){
        try {
            $post = $this->postService->save([
                'title' => $request->title,
                'description' => $request->description
            ]);
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'post' => $post
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function show($id) {
        try {
            $post = $this->postService->getById($id);
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'post' => $post
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function update(PostRequest $request, $id){
        try {
            $post = $this->postService->save([
                'title' => $request->title,
                'description' => $request->description
            ], $id);
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'post' => $post
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage()
            ]);
        }
    }
    //Delete
    public function destroy($id){
        try {
            $this->postService->delete($id);
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage()
            ]);
        }
    }
}
