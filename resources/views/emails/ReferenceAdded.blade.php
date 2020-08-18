@component('mail::message')
    # Reference added

    A new reference has been added!

    @component('mail::button', ['url' => 'civ.ie/reference'])
        View reference
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent