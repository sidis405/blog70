
<h4>Archive</h4>

<div class="card">
    <div class="card-body">
        <ul style="list-style: none;">
            @foreach($archives as $archive)
                <li>
                    <a href="/?month={{ $archive->month }}&year={{ $archive->year }}">{{ $archive->month }} {{ $archive->year }}</a> ({{ $archive->published }})
                </li>
            @endforeach
        </ul>
    </div>
</div>

<hr>
<h4>Categories ({{ $categories->count() }})</h4>

<div class="card">
    <div class="card-body">
        <ul style="list-style: none;">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a> ({{ $category->posts_count }})
                </li>
            @endforeach
        </ul>
    </div>
</div>

<hr>

<h4>Tags</h4>

<div class="card">
    <div class="card-body">
        @foreach($tags as $tag)
            <a href="{{ route('tags.show', $tag) }}" style="font-size: {{ $tag->posts_count*.7 }}px">{{ $tag->name }}</a>  ({{ $tag->posts_count }})
        @endforeach
    </div>
</div>

<hr>
