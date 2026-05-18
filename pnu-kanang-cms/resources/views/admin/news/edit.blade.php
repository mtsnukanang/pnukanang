@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')

@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.news._form')
    </form>
</div>
@endsection
