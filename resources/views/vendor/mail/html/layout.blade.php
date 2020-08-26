<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    {{ $header ?? '' }}

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        <!-- {{ Illuminate\Mail\Markdown::parse($slot) }} -->
                                        <h1>Password Reset</h1>
                                        <hr class="custom-hrline">
                                        <h2>Hi John,</h2>
                                        <p class="custom-msg-content">
                                            You recently requested a link to reset your civ.ie password.
                                            Please set a new password by the link below:
                                        </p>
                                        <p class="reset-link"><a href="http://www.civ.ie/password/reset/5dfg789sfsdrsfsfd/edit">
                                                http://www.civ.ie/password/reset/5dfg789sfsdrsfsfd/edit
                                            </a></p>

                                        <p>
                                            <a href="#" class="btn-change-password">Change Password</a>
                                        </p>

                                        <p class="custom-msg-content">
                                            Kindest regards,
                                            <br>
                                            civ.team
                                        </p>


                                        {{ $subcopy ?? '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{ $footer ?? '' }}
                </table>
            </td>
        </tr>
    </table>
</body>

</html>

<style>
    @media screen and (max-width: 667px) {
        .custom-msg-content {
            font-size: 12px !important;
        }

        .reset-link {
            font-size: 12px !important;
        }
    }
</style>