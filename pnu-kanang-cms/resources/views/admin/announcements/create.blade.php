@extends('layouts.admin')
@section('title', 'Tambah Pengumuman')
@section('page_title', 'Tambah Pengumuman')
@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.announcements.store') }}" method="POST">
        @include('admin.announcements._form')
    </form>
</div>
@endsection
