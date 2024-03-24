<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content=" We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv & Startimes), Electricity Bill Payment and more">

    <title>Amazing-Data</title>
    <!-- Favicon icon -->
    <link rel="icon" sizes="16x16" href="{{asset('ama.jpg')}}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('admin/style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/plugin.min.css')}}" rel="stylesheet" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('unicons.iconscout.com/release/v3.0.0/css/line.css')}}" rel="stylesheet" />
</head>
    @include('sweetalert::alert')
<body>
            {{ $slot }}

            <script src="{{asset('js/script.min.js')}}"></script>
            <script src="{{asset('js/plugins.min.js')}}"></script>



<style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:16px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://wa.me/2347065946772/?text=Goodday, My Username is....." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    </body>
