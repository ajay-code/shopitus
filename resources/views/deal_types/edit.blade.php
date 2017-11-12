@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Deal Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dealType, ['route' => ['dealTypes.update', $dealType->id], 'method' => 'patch']) !!}

                        @include('deal_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection