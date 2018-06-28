@extends('office.layouts.app_office')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="container">
                <form class="form-horizontal" action="{{route('office.category.store')}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    {{-- Form include --}}

                    @include('office.categories.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection