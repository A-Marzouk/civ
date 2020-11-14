@component('mail::message')

# Notification from civ.ie.
## Hi civ administrator.

{{$title}}

{{$body}}

@component('mail::button', ['url' => 'https://civ.ie/workforce-admin'])
Admin panel
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