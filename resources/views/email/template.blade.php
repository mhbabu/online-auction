<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>@yield('subject',env('APP_NAME','Laravel Application'))</title>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <style type="text/css">
        *{
            font-family: Vollkorn;
        }
    </style>
</head>


<body>
<table width="80%" style="background-color:#D2E0E8;margin:0 auto; height:50px; border-radius: 4px;font-size: 14px">
    <thead>
    <tr>
        <td style="padding: 10px; border-bottom: 1px solid rgba(0, 102, 255, 0.21);">
            <img style="margin-left: auto; margin-right: auto; display: block;" src="https://image.flaticon.com/icons/png/512/281/281769.png" width="80px"
                 alt="{{ env('APP_NAME','Laravel Application') }}"/>
            <h4 style="text-align:center">
                @yield('subject',env('APP_NAME','Laravel Application'))
            </h4>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="margin-top: 20px; padding: 15px;">
            @yield('content')
            <br/><br/><br/>
            Thanks,<br/>
            <a target="_blank" href="{{ env('APP_URL','www.google.com') }}"><b>{{ env('APP_NAME','Laravel Application') }}</b></a>
        </td>
    </tr>
    <tr style="margin-top: 15px;">
        <td style="padding: 1px; border-top: 1px solid rgba(0, 102, 255, 0.21);">
            <h5 style="text-align:center">All right reserved by {{ env('APP_NAME','Laravel Application') }} {{ date('Y') }}.</h5>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
