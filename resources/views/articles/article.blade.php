@extends('.layouts.app')
@extends('.MainView.MainApp')


@section('content2')
    <div class = "container">
        <table cellspacing=0 cellpdding=0 width='100%' class="txt" align="center">
        <tr  bordercolor ="lightgray" >
        <td class= "ReviewHeadStyle" width="75%"> <b>{{$Article->title}}</b></td>
        <td class= "DateStyle" width="20%" align="right">작성일 : <b>{{ $Article->created_at }}</b></td>
        <td class= "DateStyle" width="5%" align="right">hit : <b>{{ $Article->hit }}</b></td>
         </table>
        <hr>
        {{-- <input type="text" name="title" id="title" value="{{$Article->title}}" class="form-control" color ="#f8fafc" readonly/> --}}

         <form action = "{{ route('articles.store') }}" method="post">

            {!! csrf_field() !!}

            <div class="form-group">
                <label for="title"><i class="fas fa-user-alt"></i> <b>{{ $User->name}}</b> </label>
            </div>

            <div class="form-group" {{ $errors->has('content') ? 'has-error' : ''}}>
                <label for="content">본문</label>

                    @if(Auth::check() == FALSE)
                        <textarea name="context" id="content" rows="15" class="form-control " readonly>{{ $Article->content }}</textarea>
                    @elseif(Auth::user()->name == $User->name || Auth::user()->name == 'root')
                        <textarea name="context" id="content" rows="15" class="form-control">{{ $Article->content }}</textarea>
                    @else
                        <textarea name="context" id="content" rows="15" class="form-control " readonly>{{ $Article->content }}</textarea>
                    @endif
                         {!! $errors->first('content', '<span class="form-error">:message</span>') !!}

            </div>
            <script>
                function test(){
                     var myElem = $("#content").val();
                     var strID = '<?= $Article->id ?>';
                     location.href="/edit/" +strID +"/" + myElem;
                }
            </script>
            <div >
                <input type="hidden" name="hit" id="hit" value=0  disalbed=TRUE >
            </div>

            <div class ="form-group" align="right">
                @if(Auth::check() )

                    @if(Auth::user()->email == $User->email || Auth::user()->name == 'root')
                    {{--  <a href="/edit/{{$Article->id}}/" >
                    <input type="button" class="btn btn-primary" value="수정" onclick = "test()" >
                    </a> --}}


                    <input type="button" class="btn btn-primary" value="수정" onclick = "test()" >

                    <a href="/delete/{{$Article->id}}">
                        <input type="button" class="btn btn-primary" value="삭제" >
                    </a>

                    @endif
                @endif
            </div>
        </form>

         <form action = "{{ route('Comments.store') }}" method="post">
            {!! csrf_field() !!}
            <label for="content">댓글 남기기</label>
            <div class="form-group" {{ $errors->has('content') ? 'has-error' : ''}}>
                 <table width = 100% height=10 align="center">
                    <td class ="HomeStyle" width="92%" align="center">
                        @if(auth::check())
                            <textarea name=content id="content" rows="1" class="form-control"> </textarea>
                        @endif
                    </td>
                    <td class ="HomeStyle" width="8%" align="center">
                            <input type="hidden" name="article_id" id = "article_id" class="btn btn-primary" value= "{{$Article->id}}" >
                        @if(auth::check())
                            <input type="hidden" name="name" id = "name" class="btn btn-primary" value= "{{Auth::user()->name}}" >
                            <button type="submit" class="btn btn-primary"> 댓글 </button>
                         @endif
                    </td>
                  </table>
             </div>
             <hr>
          </form>


          <div class="form-group"></div>
           @if(auth::check())
             @forelse($Comments as $Comment )
                <table width = 100% height=10 >
                    <tr  height="25px">

                        <td class ="CommentWriterStyle" width="8%" align="left">
                            {{$CommentCount++}}
                        </td>

                        <td class ="CommentStyle" width="82%" align="left">
                            {{$Comment->content}}
                        </td>
                        <td class ="CommentWriterStyle" width="10%" align="center">
                            {{$Comment->name}}
                        </td>
                    </tr>
                </table>
                 <hr>
                @empty
             @endforelse
            @endif
          </div>

    </div>
@stop
