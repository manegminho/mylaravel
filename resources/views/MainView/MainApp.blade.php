@section('content')
        <div class= "MainStyle">
             MyApp
        </div>
        <div class= "IconStyle">
          <hr><hr>
            <table width =120 height=10 align="center">
              @guest
                <td class ="HomeStyle"><i class="fas fa-clipboard-list"></i></td> <td class ="HomeStyle">
                        <i class="fas fa-server"></i></td><tr>
                        <td class ="FontStyle">[ 게시판 ]</td> <td class ="FontStyle">[ 가비아 ]</td>
              @else
                @if(Auth::user()->name == 'root')
                        <td class ="HomeStyle"><a href="/articles"><i class="fas fa-clipboard-list"></i></a></td> <td class ="HomeStyle">
                        <i class="fas fa-server"></i></td><tr>
                        <td class ="FontStyle"><a href="/articles">[ 게시판 ]</a></td> <td class ="FontStyle">[ 가비아 ]</td>
                @else
                       <td class ="HomeStyle"><a href="/articles"><i class="fas fa-clipboard-list"></i></a></td> <td class ="HomeStyle">
                        <i class="fas fa-server"></i></td><tr>
                        <td class ="FontStyle"><a href="/articles">[ 게시판 ]</a></td> <td class ="FontStyle">[ 가비아 ]</td>

                @endif




              @endguest
            </table>
         <hr><hr>
        </div>
        <div class= "space4"></div>
@stop


<style>
    .space4{
        margin-bottom: 50px;
    }
</style>

