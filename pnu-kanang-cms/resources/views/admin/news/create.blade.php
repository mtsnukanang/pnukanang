@extends('layouts.admin')

@section('title', 'Tambah Berita')
@section('page_title', 'Tambah Berita')

@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.news._form')
    </form>
</div>
@endsection
