@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Редактирай обява</h2>
    <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Заглавие</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $job->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="company">Компания</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ $job->company }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $job->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="location">Локация</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $job->location }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="salary">Заплата</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{ $job->salary }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($job->image)
                <img src="{{ asset('images/'.$job->image) }}" style="max-width: 200px" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Обнови</button>
    </form>
</div>
@endsection