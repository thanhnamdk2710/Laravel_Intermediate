@extends('layouts.app')

@section('content')
    {{--Display Validation Errors--}}
    @include('includes.errors')

    {{--Create Task Form--}}
    <div class="panel panel-default">
        <div class="panel-heading">@lang('lang.new_task')</div>
        <div class="panel-body">
            {{--New Task Form--}}
            {{ Form::open(['route' => 'tasks.store', 'method' => 'POST']) }}
            {{--Task Name--}}
            <div class="form-group">
                {{ Form::label('name', trans('lang.task_name'), ['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-6">
                    {{ Form::text('name', '',['class' => 'form-control', 'id' => 'task-name']) }}
                </div>
            </div>

            {{--Add Task Button--}}
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    {{ Form::button('<i class="glyphicon glyphicon-plus"></i> ' . trans('lang.add'), ['class' => 'btn btn-default', 'type' => 'submit']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    {{--Current Task--}}
    @if(count($tasks))
        <div class="panel panel-default">
            <div class="panel-heading">@lang('lang.current_tasks')</div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <tr>
                        <th>@lang('lang.task_name')</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            {{--Task Name--}}
                            <td>{{ $task->name }}</td>

                            {{--Delete Button--}}
                            <td>
                                {{ Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'DELETE']) }}
                                {{ Form::button('<i class="glyphicon glyphicon-trash"></i> ' . trans('lang.delete'), ['class' => 'btn btn-danger', 'type' => 'submit']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
