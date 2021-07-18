@component('mail::message')
# ForgotPasswordMail
<a href="http://localhost:8000/new-password">Create New Password</a>
<!-- @component('mail::button', ['url' => 'http://localhost:8000/login/admin'])
<button class="btn btn-warning">Create New Password</button>
@endcomponent -->

Thanks,<br>
{{ config('app.name') }}
@endcomponent
