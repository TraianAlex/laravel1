@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Something fails.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    Welcome, please login or create an account
                </div>
            </div>

            <div class="container-fluid">
                @if(sizeof($photos) > 0)
                    @foreach($photos as $index => $photo)
                        @if($index%4 == 0)
                        <div class="row">
                        @endif
                          <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img src="{{ url($photo->path) }}">
                              <div class="caption">
                                <h3>{{$photo->title}}</h3>
                              </div>
                            </div>
                          </div>
                        @if(($index+1)%4 == 0)
                        </div>
                        @endif
                    @endforeach
                @else
                    <div class="alert alert-danger">
                        <p>This album is empty. Please create a new photo.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection