@extends('layouts.admin')
@section('title', 'Edit Pengumuman')
@section('page_title', 'Edit Pengumuman')
@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
        @method('PUT')
        @include('admin.announcements._form')
    </form>
</div>
@endsection
