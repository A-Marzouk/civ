@component('mail::message')

# Your account has been deleted on civ.ie
## Hi {{$user->name}}

We are sorry to inform you that your account has been permanently deleted from civ.ie.

Your account @component('mail::link', ['url' => "https://civ.ie/$user->username"]) civ.ie/{{$user->username}} @endcomponent has been deactivated on {{Carbon\Carbon::now()}}.

@component('mail::button', ['url' => 'https://civ.ie/register'])
Create account
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