<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $tweet = new Tweet();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()->route('tweets.index');
    }
}
