@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Users</h1></div>

                <div class="panel-body">
                   
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div> @include('partials.addUserButton')</div>
                    <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Email No</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }} </td>
                            <td>{{ $user->email }} </td>
                            <td>{{ $user->status }} </td>
                            <td>
                                <form action="{{ route('user.update',$user->id) }}" method="POST" class="">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    @if ($user->status == 1)
                                    <button type="submit" class="btn btn-danger">Ban</button>
                                    @else
                                    <button type="submit" class="btn btn-danger">UnBan</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
