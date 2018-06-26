@extends('office.layouts.app_office')
@section('content')
<div class="container">
    <form class="form-horizontal" action="{{route('office.category.store')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}
        {{-- Form include --}}

        @include('office.categories.partials.form')
    </form>
</div>
@endsection