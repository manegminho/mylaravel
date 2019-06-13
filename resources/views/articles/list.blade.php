{{--
 <table border=1 cellspacing=0 cellpdding=0 width='70%' class="txt" align="center">

    <tr height=25>
     <td width="50" align="center"><strong>번호</strong></td>
                        <td width="450" align=center><strong>제목</strong></td>
                        <td width="76" align=center><strong>글쓴이</strong></td>
                        <td width="145" align=center><strong>작성일</strong></td>
                        <td width="55" align=center><strong>조회</strong></td>
 </tr>
</table> --}}
@section('content2')

    <pre class ="ListStyle">        Article</pre>
    <div class="FontStyle">
        {{-- <table border=1 bordercolor ="white" cellspacing=0 cellpdding=0 width='90%' class="txt" align="center" bgcolor ="DDDDFF"> --}}
            <table cellspacing=0 cellpdding=0 width='90%' class="txt" align="center" bgcolor ="DDDDFF">
            <tr bgcolor="#5AB2C8">
                <td colspan="5" height=1></td>
            </tr>
            <tr height="65px" bordercolor ="lightgray" >
                        <td width="10%" align="center">번호</td>
                        <td width="45%" align=center>제목</td>
                        <td width="25%" align=center>글쓴이</td>
                       {{--  <td width="20%" align=center>작성일</td> --}}
                        <td width="10%" align=center>조회</td>
            </tr>

            <tr bgcolor="#5AB2C8">
                <td colspan="5" height=1></td>
            </tr>

            @forelse($articles as $article)
                 <tr  height="65px"  bgcolor ='#FFFFFF'>
                    <td align="center">{{$article->id}}</td>
                    <td align=center><a href="/article/{{$article->id}}">{{$article->title}}</a></td>
                    <td align=center>{{$article->user->name}}</td>
                    <td align=center>{{$article->hit}}</td>
                 </tr>
            <tr bgcolor="#CCCCCC">
                <td colspan="5" height=1></td>
            </tr>
            @empty
            <p>글이 없습니다.</p>
            @endforelse
        </table>
        {{-- <table border=1 bordercolor ="lightgray" cellspacing=0 cellpdding=0 width='90%'  class="txt" align="center" bgcolor ="FFFFFF"> --}}
           {{--  <table  bordercolor ="lightgray" cellspacing=0 cellpdding=0 width='90%'  class="txt" align="center" bgcolor ="FFFFFF">
            @forelse($articles as $article)
            <tr height="65px">
                <td width="10%"  align="center">{{$article->id}}</td><hz></hz>
                 <td width="45%" align=center>{{$article->title}}</td>
                 <td width="25%" align=center>{{$article->user->name}}</td>
                 <td width="20%" align=center>{{$article->created_at}}</td>
                 <td width="10%" align=center>{{$article->hit}}</td>

            </tr> --}}


        </table>
    </div>
    @if($articles->count() > 0 )
        <div class="container">
            <br>
            {!! $articles->render() !!}
            <br>
        </div>
    @endif
    <div>
        <br><br>
        <hr>
        <table width="8%" height= '7%' align="center">
                 <td class ="HomeStyle" width="4%" align="center">
                     <a href="create"><i class="fas fa-edit"></i></a>
                 </td>

                 <td class ="HomeStyle" width="4%" align="center">
                      <i class="fas fa-search"></i>
                 </td>
                 <tr>
                <td class ="FontStyle" width="4%" align=center>[작성]</td>
                <td class ="FontStyle" width="4%" align=center>[검색]</td>

        </table>
        <hr><hr>
    </div>


@stop
