<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>
        Welcome to Bhagyraj Tea
    </title>

</head>

<body style="font-family: Arial, Helvetica, sans-serif; background:#f5f5f5; padding:30px;">

    <div
        style="max-width:650px; margin:auto; background:#ffffff; border-radius:10px; overflow:hidden; border:1px solid #dddddd;">

        <div style="background:#111111; color:#ffffff; padding:25px; text-align:center;">

            <h1 style="margin:0;">
                Bhagyraj Tea
            </h1>

            <p style="margin-top:10px;">
                Dealer Portal Account Created
            </p>

        </div>

        <div style="padding:30px;">

            <p>
                Dear <strong>{{ $dealer->name }}</strong>,
            </p>

            <p>
                Welcome to <strong>Bhagyraj Tea Management System</strong>.
                Your dealer account has been created successfully.
            </p>

            <h3>
                Login Details
            </h3>

            <table cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">

                <tr>
                    <td style="border:1px solid #ddd; width:180px;">
                        <strong>Email</strong>
                    </td>

                    <td style="border:1px solid #ddd;">
                        {{ $dealer->email }}
                    </td>
                </tr>

                <tr>
                    <td style="border:1px solid #ddd;">
                        <strong>Temporary Password</strong>
                    </td>

                    <td style="border:1px solid #ddd;">
                        {{ $password }}
                    </td>
                </tr>

                <tr>
                    <td style="border:1px solid #ddd;">
                        <strong>Dealer Name</strong>
                    </td>

                    <td style="border:1px solid #ddd;">
                        {{ $dealer->name }}
                    </td>
                </tr>

                <tr>
                    <td style="border:1px solid #ddd;">
                        <strong>Shop Name</strong>
                    </td>

                    <td style="border:1px solid #ddd;">
                        {{ $dealer->shop_name }}
                    </td>
                </tr>

            </table>

            <br>

            <div style="text-align:center;">

                <a href="{{ url('/login') }}"
                    style="background:#000000; color:#ffffff; padding:14px 28px; text-decoration:none; border-radius:6px; display:inline-block;">

                    Login to Dealer Portal

                </a>

            </div>

            <br>

            <p style="color:#cc0000;">

                <strong>Important:</strong>
                Please log in using the above credentials and change your password immediately after your first login.

            </p>

            <hr>

            <p>

                <strong>Website:</strong>
                {{ url('/') }}

                <br>

                <strong>Email:</strong>
                {{ config('mail.from.address') }}

                <br>

                <strong>Company:</strong>
                Bhagyraj Tea

            </p>

        </div>

        <div style="background:#f3f3f3; padding:15px; text-align:center; font-size:13px; color:#666666;">

            © {{ date('Y') }} Bhagyraj Tea. All Rights Reserved.

        </div>

    </div>

</body>

</html>