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
                @if(Auth::user()->name == $User->name || Auth::user()->name == 'root')
                <textarea name=context id="strtext" rows="15" class="form-control" value= >{{ $Article->content }}</textarea>
                @else
                <textarea name="context" id="strtext" rows="15" class="form-control " readonly>{{ $Article->content }}</textarea>
                @endif
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
            </div>
            <script>
                function test(){
                     var myElem = $("#strtext").val();
                     var strID = '<?= $Article->id ?>';
                     location.href="/edit/" +strID +"/" + myElem;
                }
            </script>
            <div >
                <input type="hidden" name="hit" id="hit" value=0  disalbed=TRUE >
            </div>

            <div class ="form-group" align="right">
                @if(Auth::user()->name == $User->name || Auth::user()->name == 'root')
               {{--  <a href="/edit/{{$Article->id}}/" >
                   <input type="button" class="btn btn-primary" value="수정" onclick = "test()" >
                </a> --}}


                <input type="button" class="btn btn-primary" value="수정" onclick = "test()" >

                <a href="/delete/{{$Article->id}}">
                     <input type="button" class="btn btn-primary" value="삭제" >
                </a>

                @endif
            </div>
        </form>
    </div>
@stop
