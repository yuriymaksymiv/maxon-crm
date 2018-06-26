@extends('office.layouts.app_office')
@section('content')
    <div class="container">
        <form class="form-horizontal" action="{{route('office.category.update', $category)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">

            {{csrf_field()}}
            {{-- Form include --}}

            @include('office.categories.partials.form')
        </form>
    </div>
@endsection