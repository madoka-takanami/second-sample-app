<?php

namespace App\Http\Controllers\Tweets\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id = (int) $request->route('id');
        $tweet = Tweet::where('id', $id)->first();

        if (is_null($tweet)) {
                throw new NotFoundHttpException('存在しないつぶやきです');
            } else {
                return view('tweets.update.index')
                        ->with('tweet', $tweet);
        };
    }
}
