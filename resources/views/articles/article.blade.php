@extends('layouts.app')
@extends('MainView.MainApp')


@section('content2')
    <div class = "container">
        <h1>review article</h1>
        <p> 작성자 : {{ $Article->content }} </p>
        <p> 작성일자 : {{ $Article->created_at }} </p>
        <hr/>
        <form action = "{{ route('articles.store') }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">제목</label>
                <input type="text" name="title" id="title" value="{{$Article->title}}" class="form-control" readonly  />
                {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                <label for="content">본문</label>
                <textarea name="content" id="content" rows="10" class="form-control " readonly>{{ $Article->content }}</textarea>
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
            </div>
            <div >
                <input type="hidden" name="hit" id="hit" value=0  disalbed=TRUE >
            </div>
            <div class ="form-group">
                <button type="submit" class="btn btn-primary">
                    edit
                </button>

            </div>
        </form>
    </div>
@stop
