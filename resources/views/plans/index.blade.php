@extends('layouts.app2')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-header">
                        New Task
                    </div>
                    <div class="card-body">
                        <b>Task</b>
                        <form action="{{route('plans.store')}}" method="post" class="row">
                            @csrf
                            <div class="form-group col-12">
                                <input type="text" class="task form-control" name="content">
                            </div>
                            <div class="form-group col-12">
                                <input type="hidden" class="task form-control" name="email"
                                       value="{{auth()->user()->email}}">
                            </div>
                            <div class="col-4">
                                <button class="save form-control" type="submit"><i class="fas fa-plus"></i> Add Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="row">
                        <div class="col">
                            <div class="card-header">
                                Current Task
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <b>Task</b>
                                    </div>
                                </div>
                                <table class="table-striped">
                                    <thead></thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr class="row-12">
                                            <td class="col-6">{{$plan->content}}</td>
                                            <td class="col-6">
                                                <form action="{{route('plans.destroy',$plan->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" value="{{$plan->id}}" name="id">
                                                <button type="submit" class="btn btn-danger m-1"><i class="far fa-trash-alt">delete</i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script.plugins')
    <script type="text/javascript">
        $(function () {
            $('.save').click(function () {
                if ($('.task').val() == "") {
                    alert('값을 입력하세요');
                    return false;
                }
            });
        });
    </script>
@endsection