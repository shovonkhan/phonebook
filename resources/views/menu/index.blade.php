<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Menu Example</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('menu/style.css') }}">

        {{-- {!! Html::style('css/style.css') !!} --}}

    </head>

    <body>

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <ul class="nav navbar-nav navbar-left">
                    @foreach($categories as $item)
                    @if($item->children->count() > 0)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{$item->title}}
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach($item->children as $submenu)
                                <li><a href="#">{{$submenu->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li><a href="">{{$item->title}}</a></li>
                        @endif
                        @endforeach
                </ul>
            </nav>
        </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>

</html>