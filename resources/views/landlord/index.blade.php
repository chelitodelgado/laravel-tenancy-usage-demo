<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DEMO</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background: #f3c538;
        }

        .forget-pwd>a {
            color: #dc3545;
            font-weight: 500;
        }

        .forget-password .panel-default {
            padding: 31%;
            margin-top: -27%;
        }

        .forget-password .panel-body {
            padding: 15%;
            margin-bottom: -50%;
            background: #fff;
            border-radius: 5px;
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        img {
            width: 40%;
            margin-bottom: 10%;
        }

        .btnForget {
            background: #c0392b;
            border: none;
        }

        .forget-password .dropdown {
            width: 100%;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        .forget-password .dropdown button {
            width: 100%;
        }

        .forget-password .dropdown ul {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container forget-password">
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <div class="panel panel-default">
                    @if (session('correcto'))
                    <div class="alert alert-success bg-success" role="alert">
                        {{ session('correcto') }}
                    </div>
                    @endif
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="https://www.nubersia.com/wp-content/uploads/2020/11/02-HOME-cloud_migration-1024x1009.png"
                                alt="car-key" border="0">
                            <h2 class="text-center">Registrate como empresa</h2>
                            <form action="{{ route('registro.tenant.post') }}" autocomplete="off" class="form"
                                method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="nombre" placeholder="Nombre de la empresa" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="dominio" placeholder="Dominio de la empresa" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"
                                        value="Registrar" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>