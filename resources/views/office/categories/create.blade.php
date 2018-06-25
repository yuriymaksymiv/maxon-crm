@extends('office.layouts.app_office')
@section('content')
<div class="container">
    <form class="form-horizontal" action="{{route('office.category.store')}}" method="post">

        {{csrf_field()}}
        {{-- Form include --}}

        @include('office.categories.partials.form')
    </form>
</div>
@endsection