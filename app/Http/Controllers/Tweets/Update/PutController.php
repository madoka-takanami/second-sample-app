<?php

namespace App\Http\Controllers\Tweets\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
            ->route('tweets.update.index', ['id' => $tweet->id])
            ->with('feedback.success', 'つぶやきを編集しました');
    }
}
