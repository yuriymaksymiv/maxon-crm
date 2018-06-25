@extends('office.layouts.app_office')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="page-header">Категорії товарів</h1>
            </div>
            <div class="col-lg-9 ">
                <a href="{{route('office.category.create')}}" class="btn btn-success btn-lg pull-right page-header"><i class="fa fa-plus"></i> Додати категорію</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <th>Назва</th>
                                <th>Дії</th>
                            </thead>
                            <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <a href="{{route('office.category.edit', ['id' => $category->id])}}"><i class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"><h2>Категорії відсутні</h2></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->
@endsection