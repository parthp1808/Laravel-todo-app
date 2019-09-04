@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        @if (Auth::check())
            <div class="card-header">Tasks List</div>
            <div class="card-body">
                <a href="/task" class="btn btn-primary">Add new Task</a>
                <table class="table mt-4">
                    <thead><tr>
                        <th colspan="2">Tasks</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($user->tasks as $task)
                    <tr>
                        <td>
                            {{$task->description}}
                        </td>
                        <td>
                            
                            <form action="/task/{{$task->id}}">
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                    

                @endforeach
                </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <h3>You need to log in. <a href="/login">Click here to login</a></h3>
            </div>
        @endif
    </div>                         
</div>
@endsection