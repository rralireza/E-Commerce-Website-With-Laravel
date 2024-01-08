<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request , Product $product)
    {
        $this->validate($request, [
            'content' => ['required']
        ]);

        Comment::query()->create([
            'content' => $request->get('content'),
            'user_id' => auth()->id(),
            'product_id' => $product->id
        ]);

        Session::flash('message_leaved_success' , 'New message leaved successfully!');
        return redirect()->back();
    }
}
