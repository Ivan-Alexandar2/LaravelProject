@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Добави нова обява</h2>
    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Заглавие</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="company">Компания</label>
            <input type="text" class="form-control" id="company" name="company" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="location">Локация</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group mb-3">
            <label for="salary">Заплата</label>
            <input type="text" class="form-control" id="salary" name="salary" required>
        </div>
        <div class="form-group mb-3">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Създай</button>
    </form>
</div>
@endsection