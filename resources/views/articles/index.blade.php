@extends('layouts.app')

@section('title', 'Список статей')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">
            <i class="fas fa-newspaper me-2"></i>
            Список статей
        </h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>
            Новая статья
        </a>
    </div>

    @if($articles->count() > 0)
        <div class="row g-4">
            @foreach($articles as $article)
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0">{{ $article->title }}</h5>
                                <span class="badge bg-primary rounded-pill">
                                    <i class="far fa-clock me-1"></i>
                                    {{ $article->created_at_human }}
                                </span>
                            </div>
                            
                            <p class="card-text text-muted mb-3">
                                {{ Str::limit($article->content, 150) }}
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $article->created_at_formatted }}
                                </small>
                                <a href="{{ route('articles.show', $article) }}" class="btn btn-primary btn-sm">
                                    Читать далее
                                    <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {!! $articles->links('pagination::bootstrap-5') !!}
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            Статей пока нет.
        </div>
    @endif
@endsection

@push('styles')
<style>
.pagination svg {
    width: 20px;
    height: 20px;
}

.badge {
    font-weight: 500;
    padding: 0.5em 1em;
}

.card-title {
    font-size: 1.25rem;
    line-height: 1.4;
}

.btn-sm {
    padding: 0.375rem 1rem;
}
</style>
@endpush 