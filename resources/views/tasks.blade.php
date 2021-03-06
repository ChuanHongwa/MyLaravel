@extends("layouts.app")

@section("content_1")
<!-- TODO: Bootstrap 樣板... -->
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">

            <div class="panel-heading">
                New Task
            </div>

            <div class="panel-body">
                <!-- TODO: 顯示驗證錯誤 -->
                @include("common.errors")

                <!-- 新任務的表單 -->
                <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- TODO: 任務名稱 -->
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                    </div>

                    <!-- TODO: 增加任務按鈕-->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i>增加任務</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if(count($tasks) > 0)
            <div class="panel panel-default">

                <div class="panel-heading">
                    目前任務
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <thead>
                            <th>Task</th><th>&nbsp;</th>
                        </thead>

                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="table-text"><div>{{$task->name}}</div></td>
                                <td>
                                    <form action="{{url("task/$task->id")}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field("DELETE") }}
                                        
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash">DELETE</i>
                                        </button>
                                        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        @endif
    </div>
</div>

<!-- 目前任務 -->
@endsection