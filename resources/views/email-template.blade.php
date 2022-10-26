<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset='utf-8'>

    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <style type="text/css">
        * {
            font-family: Vollkorn;
        }
    </style>
</head>


<body>
<table width="80%" style="background-color:#D2E0E8;margin:0 auto; height:50px; border-radius: 4px;">
    <thead>
    <tr>
        <td style="padding: 10px; border-bottom: 1px solid rgba(0, 102, 255, 0.21);">
            <img style="margin-left: auto; margin-right: auto; display: block;"
                 src="http://www.hmc.mil.ar/wp-content/uploads/2017/01/emailforward.png" width="80px">
            <h3>{{ $header }}</h3>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="margin-top: 20px; padding: 15px;">

            <br/><br/>
            {{--@yield('content')--}}
            {!! $param !!}<br/>
        </td>
    </tr>
    <tr style="margin-top: 15px;">
        <td style="padding: 1px; border-top: 1px solid rgba(0, 102, 255, 0.21);">
            {{--<h5 style="text-align:center">Mail sent from: <a href=""></a></h5>--}}
            <h5 style="text-align:center">All right reserved by Online Auction</h5>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
