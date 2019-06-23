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
                <label for="title"><i class="fas fa-user-alt"></i> <b>{{ $ArtWriter->name }}</b> </label>
            </div>



            <div class="form-group" {{ $errors->has('content') ? 'has-error' : ''}}>
                <label for="content">본문</label>

                    @if(Auth::check() == FALSE)
                        <textarea name="context" id="content" rows="15" class="form-control " readonly>{{ $Article->content }}</textarea>
                    @elseif(Auth::user()->email == $ArtWriter->email || Auth::user()->name == 'root')
                        <textarea name="context" id="content" rows="15" class="form-control">{{ $Article->content }}</textarea>
                    @else
                        <textarea name="context" id="content" rows="15" class="form-control " readonly>{{ $Article->content }}</textarea>
                    @endif
                         {!! $errors->first('content', '<span class="form-error">:message</span>') !!}

            </div>
            <script>
                function EditArticle(){
                     var myElem = $("#content").val();
                     var strID = {{$Article_id}} ;
                     //location.href = '../edit';
                     location.href="/edit/" +strID +"/" + myElem;
                }
                 function EditComment(){
                     var myElem = $("#Com_content").val();
                     //alert(myElem);
                     if(myElem != "") {
                         var strID = $("#Com_id").val();
                     location.href="/CommentsEdit/" +strID +"/" + myElem;
                     }

                     //alert("/Comments/Edit/" +strID +"/" + myElem);
                }
            </script>
            <div >
                <input type="hidden" name="hit" id="hit" value=0  disalbed=TRUE >
            </div>

            <div class ="form-group" align="right">
                    @if(Auth::user()->email == $ArtWriter->email || Auth::user()->name == 'root')
                    <input type="button" class="btn btn-primary" value="수정" onclick = "EditArticle()" >
                    <a href="/delete/{{$Article->id}}">
                        <input type="button" class="btn btn-primary" value="삭제" >
                    </a>
                    @endif
            </div>
        </form>

         <form action = "{{ route('Comments.store') }}" method="post">
            {!! csrf_field() !!}
            <label for="content">댓글 남기기</label>
            <div class="form-group" {{ $errors->has('content') ? 'has-error' : ''}}>
                 <table width = 100% height=10 align="center">
                    <td class ="HomeStyle" width="92%" align="center">
                         <textarea name=content id="content" rows="1" class="form-control"> </textarea>
                    </td>
                    <td class ="HomeStyle" width="8%" align="center">
                            <input type="hidden" name="article_id" id = "article_id" class="btn btn-primary" value= "{{$Article_id}}" >
                            <input type="hidden" name="name" id ="name" class="btn btn-primary" value= "{{Auth::user()->name}}" >
                            <input type="hidden" name="email" id ="email" class="btn btn-primary" value= "{{Auth::user()->email}}" >
                            <button type="submit" class="btn btn-primary"> 댓글 </button>
                    </td>
                  </table>
             </div>
             <hr>
          </form>

          <div class="form-group"></div>

             @forelse($Comments as $Comment )
                <table width = 100% height=10 >
                    <tr class ="CommentView" height="25px">
                        <td  width="4%" align="left">
                             {{ $CommentCount++}}
                        </td>
                                @if(Auth::user()->email == $Comment->email || Auth::user()->name == 'root')
                                    <td  width="76%" align="left">
                                        <input type="hidden" name="Com_id" id ="Com_id" class="btn btn-primary" value={{ $Comment->id }}>
                                        <input type="text" id ="Com_content" name ="Com_content"height ="3px" size ="95" style="border:none; solid ;"placeholder= {{ $Comment->content }}  />
                                    </td>
                                    <td width="10%" align="center">
                                    <div class ="removeBtn">
                                        <i class="fas fa-edit" type="submit" onclick = "EditComment()"></i>
                                        <a href="/Comments/delete/{{$Comment->id}}">
                                        <i class="fas fa-trash-alt" ></i></a>
                                    </div>
                                @else
                                    <td  width="72%" align="left">
                                        <input type="text" height ="3px" size ="95" style="border:none; solid ;"placeholder= {{ $Comment->content }} readonly />
                                    </td>
                                    <td width="10%" align="center">
                                @endif


                        </td>
                         <td  width="10%" align="center">
                             {{$Comment->name}}
                        </td>
                    </tr>
                </table>
                @empty
             @endforelse
          </div>
    </div>
@stop
