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
</style>