@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Всички обяви</h2>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Добави нова обява</a>

    <div class="row">
        @foreach($jobs as $job)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($job->image)
                        <img src="{{ asset('images/'.$job->image) }}" class="card-img-top" alt="Job Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $job->company }}</h6>
                        <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                        <p><strong>Локация:</strong> {{ $job->location }}</p>
                        <p><strong>Заплата:</strong> {{ $job->salary }}</p>
                        <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning">Редактирай</a>
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Сигурни ли сте?')">Изтрий</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection