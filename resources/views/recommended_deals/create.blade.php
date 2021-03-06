@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Recommended Deal
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'recommendedDeals.store', 'files' => true]) !!}

                        @include('recommended_deals.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
