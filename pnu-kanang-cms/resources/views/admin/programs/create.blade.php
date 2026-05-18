@extends('layouts.admin')
@section('title', 'Tambah Program')
@section('page_title', 'Tambah Program')
@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.programs._form')
    </form>
</div>
@endsection
