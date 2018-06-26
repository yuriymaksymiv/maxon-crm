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
                                <th></th>
                                <th>Назва</th>
                                <th>Дії</th>
                            </thead>
                            <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td><img src="{{asset('storage' . '/' . 'user' . '-' . $category->user_id . '/' . 'category' . '/' .$category->image)}}" class="category-image"></td>
                                    <td>{{$category->name}}</td>
                                    <td class="text-right">
                                        <form onsubmit="if(confirm('Видалити')){ return true }else{ return false}"
                                              action="{{route('office.category.destroy', $category)}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}

                                            <a class="btn btn-default" href="{{route('office.category.edit', $category)}}"><i class="fa fa-edit"></i> </a>
                                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i> </button>
                                        </form>
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