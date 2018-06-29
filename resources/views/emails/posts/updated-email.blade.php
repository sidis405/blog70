@component('mail::message')
# Ciao {{ $recipient->name }}

The post "{{ $post->title }}" was updated by {{ $sender->name }}.

@component('mail::button', ['url' => route('posts.show', $post) ])
See updated post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
