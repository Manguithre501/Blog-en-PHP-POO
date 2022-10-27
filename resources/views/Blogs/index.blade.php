@extends('guest')
@section('content')


<div class="wrap">
    <div class="wrap_float">
        <div class="post-items-list posts-grid">
            @forelse ($articles as $article)
            <a href="{{ route::name('single', ['id' => $article->article_id]) }}" class="post-item">
                <img src="@asset('img/' . $article->image)" alt="" class="post-bg-img">
                <div class="post-tags">
                    <div class="tag">{{ $article->nom_categorie }}</div>
                </div>
                <h3 class="post-title">
                    {{ $article->title }}
                </h3>
                <div class="post-info">
                    <div class="post-author post-info-author">
                        <div class="author-image">
                            <img src="{{ logo::firstChars($article->name) }}" alt="" class="image-cover">
                        </div>
                        <span>{{ ucfirst($article->name) }}</span>
                    </div>
                    <div class="post-date post-info-date">
                        <time class="timeago" datetime="{{ $article->date_pub }}"></time>
                    </div>
                    <div class="post-views post-info-views">
                        3457
                    </div>
                </div>
            </a>
            @empty
            <div style="text-align: center;">
                <p>Aucune article pour l'instant !</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush