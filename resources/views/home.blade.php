@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    <table class="table table-bordered">

                       <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Join Date</th>
                          <th>Status</th>
                       </tr>
                      

                       <tr>
                           <td>{{$users->name}}</td>
                           <td>{{$users->email}}</td>
                           <td>{{$users->created_at}}</td>
                           <td>Active</td>

                       </tr>
                
                   
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</script>

@endsection
