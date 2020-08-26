@component('mail::message')
# Introduction 
## Hi John,

You recently requested a link to reset your civ.ie password.
Please set a new password by the link below:


@component('mail::button', ['url' => ''])
Change Password

@endcomponent

Kindest regards,<br>
civ.ie team
<!-- {{ config('app.name') }} -->
@endcomponent
<style>
</style>