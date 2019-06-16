<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id)
    {
        /* echo $foo;
        return __METHOD__ . '은(는)다음 기본키를 가진 Article 모델을 조회합니다.:' . $id; */
        $articles = \App\Article::findOrFail($id);
        return $articles->toArray();
    }
    public function create()
    {
        return view('articles.create');
    }
    public function index()
    {
        $articles = \App\Article::latest()->paginate(10);
        //$articles = \App\Article::get();
        //$articles->load('user');
        //$articles = \App\Article::with('user')->get();
        return view('articles.index', compact('articles'));
    }



    public function store(Request $request)
    {
        $rules = ['title' => ['required'], 'content' => ['required', 'min:10']];
        $message = [
            'title.required' => '제목은 필수 입력 항목입니다.',
            'content.required' => '본문은 필수 입력 항목입니다.',
            'content.min' => '본문은 최소 : 10 글자 이상이 필요합니다.',
        ];

        $this->validate($request, $rules, $message);

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $article = \App\User::find($request->userID)->articles()->create($request->all());

        if (!$article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        var_dump('이벤트를 던집니다');
        //event('article.created', [$article]);
        event(new \App\Events\ArticleCreated($article));
        var_dump('이벤트를 던졌습니다');


        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }
}
