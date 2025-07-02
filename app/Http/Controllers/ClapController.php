<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClapController extends Controller
{
    public function clapUnclap(Post $post)
    {
        $hasClapped = auth()->user()->hasClapped($post);
        if ($hasClapped) {
            $post->claps()->where('user_id', Auth::id())->delete();
        } else {

            $post->claps()->create([
                'user_id' => Auth::id(),
            ]);
        }

        return response()->json([
            'clapsCount' => $post->claps()->count(),
        ]);
    }
}
