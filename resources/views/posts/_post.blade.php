<article>
    <div class="card">

        <a href="{{ route('posts.show', $post) }}">
            <img src="{{ $post->cover }}" style="width: 100%">
        </a>

        <div class="card-header">
            <h5><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
            <small>posts by: {{ $post->user->name }}</small>
            <small>on: <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a></small>

            @can('update', $post)

                <small class="pull-right"><a href="{{ route('posts.edit', $post) }}">Edit</a></small>

            @endcan

        </div>
        <div class="card-body">
            <p>
                {{ $post->preview }}
            </p>

            @if(isset($fullPost) && $fullPost)
                <p>
                    {{ $post->body }}
                </p>
            @endif
        </div>
        <div class="card-footer">
            <small>{{ $post->created_at->format('d/m/Y H:i') }}</small>
            <small>{!! $post->tagLinks() !!}</small>
        </div>
    </div>
</article>
<hr>
