

<p>Hi,</p>

<p>Someone has invited you to access their account.</p>

<a href="{{ route('accept',$invite->token) }}">Click here</a> to activate!
<br>
<p>Cordialement,<br>{{ config('app.name') }}</p>