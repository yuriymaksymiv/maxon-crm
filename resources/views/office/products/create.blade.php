@extends('office.layouts.app_office')
@section('content')

    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="{{route('office.product.store')}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    {{-- Form include --}}

                    @include('office.products.partials.form')


                </form>
            </div>
        </div>
    </div>
@endsection
