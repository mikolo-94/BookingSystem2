@extends('layouts.backend')

@section('content')
    <!-- Page content -->
    <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new Roomtype</div>

                    <div class="panel-body">
                        <form action="{{ route('createRoomtype') }}" method="post">
                            <label for="room_type">Roomtype</label>
                            <input type="text" class="form-control" id="roomtype" name="roomtype" placeholder="Rumstyp">





                            <label for="base_price">Price</label>
                            <div class="input-group">

                                <input type="text" class="form-control" id="base_price" name="base_price" placeholder="Pris">
                                <div class="input-group-addon">USD</div>
                            </div>

                            <label for="base_availability">Max number of People</label>
                            <select class="form-control" name="max_occupancy">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>

                            <label for="base_availability">Number of Rooms</label>
                            <input type="text" class="form-control" id="base_availability" name="base_availability" placeholder="Antal rum">

                            <label for="description">Room description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Rumsbeskrivning"></textarea>
                            <button type="submit" class="btn btn-success">Create Roomtype</button>
                            <input type="hidden" value="{{Session::token()}}" name="_token">
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Rumstyper</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Rumstyp</th>
                                <th>Pris</th>
                                <th>Antal</th>
                                <th>Personer</th>
                                <th>Ändra</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roomtypes as $roomtype)
                                <tr>
                                    <td>{{$roomtype->roomtype}}</td>
                                    <td>{{$roomtype->base_price}}</td>
                                    <td>{{$roomtype->base_availability}}</td>
                                    <td>{{$roomtype->max_occupancy}}</td>

                                    <td><a href="/createrooms/{{$roomtype->id}}" class="btn btn-info" role="button">Manage Rooms</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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