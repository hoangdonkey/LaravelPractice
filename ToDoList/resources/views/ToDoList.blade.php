<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <title>ToDo List</title>
    </head>
    <body>
        <div class="panel-body">
            @if (count($errors) > 0)
                @include('errors.503')
            @endif

            <form action="{{url('task')}}" method="post" class="form-horizontal">
                {{csrf_field()}}

                <div class="">
                    <label for="task" class="title">ToDo List</label>
                    <h2>Enter your task and hit the button</h2>
                    <div class="textBx">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus">Add Task</i>
                        </button>
                    </div>
                </div>
            </form>

            @if (count($tasks)>0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Your Current Task
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <td>Task</td>
                                <td>&nbsp;</td>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{$task->name}}</div>
                                        </td>
                                        <td>
                                            <form action="task/{{$task->id}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn">Delete Task</button>
                                                <input type="hidden" name="method" value="DELETE">
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
    </body>
</html>
