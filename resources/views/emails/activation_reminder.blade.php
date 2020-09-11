@component('mail::message')

# You have only {{$reminderPeriod}} left to restore your account.
## Hi {{$user->name}}

Unfortunately, your account @component('mail::link', ['url' => "https://civ.ie/$user->username"]) civ.ie/{{$user->username}} @endcomponent has been deactivated on {{Carbon\Carbon::now()}}.

You have only {{$reminderPeriod}} left to restore your account, After that you will not be able to restore it.

To restore your account you just need to login or click on this button.

@component('mail::button', ['url' => 'https://civ.ie/login'])
Restore
@endcomponent

Kindest regards,<br>
civ.ie team
@endcomponent

<style>
    body {
        color: #888DB1 !important;
    }

    body>table>tbody>tr>td>table>tbody>tr:nth-child(2)>td>table>tbody>tr>td>table>tbody>tr>td>table>tbody>tr>td>table {
        float: left !important;
    }

    .button .button-primary {
        background-color: #0046FE !important;
        border-bottom: 8px solid #0046FE !important;
        border-left: 18px solid #0046FE !important;
        border-right: 18px solid #0046FE !important;
        border-top: 8px solid #0046FE !important;
        border-radius: 5px !important;
    }

    .mail-hyper-link{
        text-decoration: none;
    }
</style>