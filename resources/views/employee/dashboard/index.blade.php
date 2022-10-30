@extends('employee.layout.master')
@section('page_name','- '.__('page_name.dashboard'))
@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <ol class="breadcrumb" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="#">{{__('page_name.dashboard')}}</a></li>
            </ol>
        </div>
    </div>
@endsection
