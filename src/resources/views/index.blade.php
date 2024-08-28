@extends('layout.base')
@section('base.content')
        <div class="row">
            <div class="col-md-4 pt-5">
                <form action="{{route('tasks.store')}}" method="POST">
                    <div class="form-group">
                        <input name="task_name" type="text" class="form-control" placeholder="{{__('Insert Task Name')}}" >
                        @error('task_name')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-block"> Add </button>
                </form>
            </div>
            <div class="col-md-8 tasks shadow">
                @if($tasks->count() > 0)
                    <table class="table">
                        <thead>
                        <tr class="tasks-header-row">
                            <td class="td-min">
                                #
                            </td>
                            <td>
                                Task
                            </td>
                            <td>
                                {{--  Actions td.. --}}
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $index => $task)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td @if($task->is_completed) class="line-through" @endif>{{$task->task_name}}</td>
                                    <td>
                                        @if(!$task->is_completed)
                                           <div class="float-right">
                                               <div class="d-inline">
                                                   <form method="POST" class="button" action="{{ route('tasks.complete', $task) }}">
                                                       @csrf
                                                       <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></button>
                                                   </form>
                                               </div>
                                               <div class="d-inline">
                                                   <form method="POST" class="button" action="{{ route('tasks.destroy', $task) }}">
                                                       @csrf
                                                       @method('DELETE')
                                                       <button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                                   </form>
                                               </div>
                                           </div>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tasks->links() }}
                @else
                    <p class="text-muted">{{__('There are currently no tasks! Add a task using the input on the left')}}.</p>
                @endif

            </div>
        </div>

@endsection
