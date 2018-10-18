<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function store(ReplyRequest $request, Reply $reply)
	{
        $reply->content = clean($request->input('content'), 'user_topic_body');

        if(empty($reply->content)){
            return redirect()->back()->with('danger', '回复内容错误！');
        }

		$reply->topic_id = $request->input('topic_id');
		$reply->user_id = Auth::id();
		$reply->save();

		return redirect()->to($reply->topic->link())->with('success', '回复成功！');
	}

	public function destroy(Reply $reply)
	{
		$this->authorize('destroy', $reply);
		$reply->delete();

		return redirect()->to($reply->topic->link())->with('success', '删除回复成功！');
	}
}