@component('mail::message')
# Someone has posted a blog post

Be sure to read it.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
