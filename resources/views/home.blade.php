@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!!!
                    <script>
                        setTimeout(function() {
                            location.href = "/";
<<<<<<< HEAD
                        }, 1000); // 3000ms(3초)가 경과하면 이 함수가 실행됩니다.
=======
                        }, 3000); // 3000ms(3초)가 경과하면 이 함수가 실행됩니다.
>>>>>>> a945983c23d4ebee28a69908ffadec7c7645a7a2
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
