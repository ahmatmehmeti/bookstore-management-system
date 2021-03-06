<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

    <style type="text/css">
        @media only screen and (max-width: 620px) {
            .span-2,
            .span-3 {
                max-width: none !important;
                width: 100% !important;
            }
            .span-2 > table,
            .span-3 > table {
                max-width: 100% !important;
                width: 100% !important;
            }
        }
        @media all {
            .btn-primary table td:hover {
                background-color: #34495e !important;
            }
            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
        }
        @media all {
            .btn-secondary a:hover {
                border-color: #34495e !important;
                color: #34495e !important;
            }
        }
        @media only screen and (max-width: 620px) {
            h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }
            h2 {
                font-size: 22px !important;
                margin-bottom: 10px !important;
            }
            h3 {
                font-size: 16px !important;
                margin-bottom: 10px !important;
            }
            .main p,
            .main ul,
            .main ol,
            .main td,
            .main span {
                font-size: 16px !important;
            }
            .wrapper {
                padding: 10px !important;
            }
            .article {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            .content {
                padding: 0 !important;
            }
            .container {
                padding: 0 !important;
                width: 100% !important;
            }
            .header {
                margin-bottom: 10px !important;
            }
            .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }
            .btn table {
                max-width: 100% !important;
                width: 100% !important;
            }
            .btn a {
                max-width: 100% !important;
                padding: 12px 5px !important;
                width: 100% !important;
            }
            .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
            .alert td {
                border-radius: 0 !important;
                padding: 10px !important;
            }
            .receipt {
                width: 100% !important;
            }
            hr {
                Margin-bottom: 10px !important;
                Margin-top: 10px !important;
            }
            .hr tr:first-of-type td,
            .hr tr:last-of-type td {
                height: 10px !important;
                line-height: 10px !important;
            }
        }
        @media all {
            .ExternalClass {
                width: 100%;
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }
            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
        }
    </style>
</head>
<body style="font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;">
<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;" width="100%" bgcolor="#f6f6f6">
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; Margin: 0 auto !important; max-width: 580px; padding: 10px; width: 580px;" width="580" valign="top">
            <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">
                <table border="0" cellpadding="0" cellspacing="0" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; border-radius: 3px;" width="100%">
                    <tr>
                        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                                        <h1 style="color: #222222; font-family: sans-serif; font-weight: 300; line-height: 1.4; margin: 0; Margin-bottom: 30px; font-size: 35px; text-align: center; text-transform: capitalize;">'Welcome To Book Store Management System!</h1>

                                        <p style="font-family: sans-serif; text-align:center; font-size: 14px; font-weight: normal; Margin: 0; Margin-bottom: 15px;">Hi {{$user->name}}, Your account has been registered by Book Store Management System, now you can login by clicking the bottom below<br>
                                            email: {{$user->email}}<br>
                                            password: {{$user->name.".".$user->id}}<br></p>
                                        <table border="0" cellpadding="0" cellspacing="0" class="hr" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                            <tbody>
                                            <tr>

                                                <td align="center" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                                        <tbody>
                                                        <tr>
                                                            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #08158c; border-radius: 5px; text-align: center;" valign="top" bgcolor="#3498db" align="center"> <a href="{{ route('login')}}" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 2px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Login</a> </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- END MAIN CONTENT AREA -->
                    <!-- START CALL OUT -->
                    <tr>
                        <td class="wrapper section-callout" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px; background-color: #2495ff; color: #ffffff;" valign="top" bgcolor="#1abc9c">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                <tr>
                                    <td class="align-center" style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #ffffff;" valign="top" align="center">
                                        Great to have you!
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- END CALL OUT -->
                </table>
                <!-- START FOOTER -->
                <div class="footer" style="clear: both; padding-top: 10px; text-align: center; width: 100%;">
                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                        <tr>
                            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-top: 10px; padding-bottom: 10px; font-size: 12px; color: #999999; text-align: center;" valign="top" align="center">
                                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Book Store Management System</span>
                            </td>
                        </tr>


                    </table>
                </div>
                <!-- END FOOTER -->
                <!-- END CENTERED WHITE CONTAINER -->
            </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
    </tr>
</table>
</body>
</html>
