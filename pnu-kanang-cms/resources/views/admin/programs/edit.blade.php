@extends('layouts.admin')
@section('title', 'Edit Program')
@section('page_title', 'Edit Program')
@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.programs._form')
    </form>
</div>
@endsection
