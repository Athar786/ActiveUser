@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                   @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover table-dark">

                       <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Join Date</th>
                          <th>Status</th>
                       </tr>
                       @foreach($users as $user)

                       <tr>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->created_at}}</td>
                           <td><input data-id="{{$user->id}}" class="toggle" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}></td>

                       </tr>
                       @endforeach
                   
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $('.toggle').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    });
  });
</script>

@endsection

