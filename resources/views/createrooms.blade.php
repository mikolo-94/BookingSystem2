@extends('layouts.backend')

@section('content')

    <!-- Page content -->
    <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Rooms</div>

                    <div class="panel-body">
                        <form action="{{route('docreaterooms')}}" method="post">

                            <label for="base_availability">Room type</label>
                           <input type="text" class="form-control" id="disabledInput" name="base_availability" placeholder="" value="{{$rooms->roomtype}}" disabled>
                            @for($i = 0; $i < $rooms->base_availability; $i++)

                                <label for="room_type">Room number</label>
                                <input type="text" class="form-control" id="roomnumber" name="room_number">
                            @endfor

                            <input type="hidden" value="{{$id}}" name="roomtype_id">
                            <button type="submit" class="btn btn-success">Create rooms</button>
                            <input type="hidden" value="{{Session::token()}}" name="_token">
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Room Information</div>

                    <div class="panel-body">
                        <h3>{{$rooms->roomtype}}</h3>
                        <p>{{$rooms->description}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <p class="alert alert-danger"> @foreach ($errors->all() as $error){{ $error }}<br>
            @endforeach
        </p>
    @endif

</div>

@endsection