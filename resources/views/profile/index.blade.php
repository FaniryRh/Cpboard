@extends('layouts.app')


@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mon profile</div>
                <div class="panel-body">

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Photo de profile</div>
                            <div class="panel-body" style="text-align: center;">

                                @if (Auth::user()->photo)
                                    <a href="/profilpic/{{Auth::user()->photo}}"><img width="200" src="/profilpic/{{Auth::user()->photo}}" style="border-radius: 5px; border: solid 1px #CCC;
    -moz-box-shadow: 5px 5px 0px #999;
    -webkit-box-shadow: 5px 5px 0px #999;
        box-shadow: 5px 5px 0px #999;"></img></a></br>
                                @elseif (Auth::user()->gender == "Homme")

                                    <img src="/img/man.png" width="80px" height="80px"></img style=
                                    "border-radius: 10px
                                    ;"></br>
                                @else
                                    <img src="/img/women.png" width="80px" height="80px"></img style=
                                    "border-radius: 10px
                                    ;"></br>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">Modifier photo de profile</div>
                            <div class="panel-body">

                                @if (count($errors) > 0)

                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    <div class="row">
                                        <form action="{{url('/')}}/uploadPic" method="post" enctype="multipart/form-data">
                                            <div class="col-md-12" style="text-align: center">
                                                <img style="border-radius: 5px; border: solid 1px #CCC;
    -moz-box-shadow: 5px 5px 0px #999;
    -webkit-box-shadow: 5px 5px 0px #999;
        box-shadow: 5px 5px 0px #999;" src="/profilpic/{{ Session::get('imageName') }}"/>
                                                <br/>
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input style="display: none" type="text" name="pic"
                                                       value="{{ Session::get('imageName') }}">
                                                <br/>
                                                <button type="submit" class="btn btn-xs btn-danger">Enregistrer l'image</button>
                                            </div>

                                        </form>
                                    </div>
                                @endif
                                {!! Form::open(array('route' => 'resizeImagePost','enctype' => 'multipart/form-data')) !!}
                                <div class="row">
                                    {{--<div class="col-md-4">--}}
                                    {{--<br/>--}}
                                    {{--{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Add Title')) !!}--}}
                                    {{--</div>--}}
                                    <div class="col-md-12">
                                        <br/>
                                        {!! Form::file('image', array('class' => 'image')) !!}
                                    </div>
                                    <div class="col-md-12">
                                        <br/>
                                        <button type="submit" class="btn btn-success">Telecharger l'image</button>

                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection