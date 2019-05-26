@section("Header_Style")
 <style>
     .headerStyle { text-align: right; color : rebeccapurple ; font-size:15pt;}
  </style>
@endsection

<body>
         @yield('Header_Style')
        <div class = "headerStyle">
            <a href="/"><i class="fas fa-home"></i></a>&nbsp;
            <a href="/login"><i class="fas fa-user"></i></a>&nbsp;
            <i class="fas fa-sign-out-alt"></i>
        </div>
        <hr size = "1px">
</body>




