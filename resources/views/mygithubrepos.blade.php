@extends('adminlte::layouts.app')

@section('htmlheader_title')
    My github repos
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">My Repos</div>

                    <div class="panel-body">
                        <ul>
                            @foreach ($githubrepos as $repo)
                                <li>{{ $repo }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
