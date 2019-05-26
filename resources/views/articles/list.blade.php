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

    <div class="container">
        <h1 class = "ListStyle"> Article</h1>
        <table border=1 bordercolor ="white" cellspacing=0 cellpdding=0 width='100%' height= '5%' class="txt" align="center" bgcolor ="DDDDFF">
            <tr class ="TableHeadFont">
                        <td width="10%" align="center"> 번호</td>
                        <td width="50%" align=center>제목</td>
                        <td width="10%" align=center>글쓴이</td>
                        <td width="20%" align=center>작성일</td>
                        <td width="10%" align=center>조회</td>
            </tr>
        </table>
        <table border=1 bordercolor ="lightgray" cellspacing=0 cellpdding=0 width='100%'  class="txt" align="center" bgcolor ="FFFFFF">
            @forelse($articles as $article)
            <tr height="65px">
                <td width="10%"  align="center"><strong>{{$article->id}}</strong></td><hz></hz>
                 <td width="50%" align=center><strong>{{$article->title}}</strong></td>
                 <td width="10%" align=center><strong>{{ $article->user->name }}</strong></td>
                 <td width="20%" align=center><strong>{{ $article->created_at }}</strong></td>
                 <td width="10%" align=center><strong>{{ $article->hit }}</strong></td>
            </tr>

            @empty
            <p>글이 없습니다.</p>
            @endforelse
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
