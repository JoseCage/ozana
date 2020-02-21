@component('mail::message')
# Welcome to {{ config('app.name') }}

Hello {{ $fullName }}. We are happy you joined.

Now you don't need to worry about forgetting or lose a movie you want to watch.
We will send you a reminder about movies for new movies and relesed ones.

@component('mail::button', ['url' => 'https://watchitlater.tv'])
Get the app
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
