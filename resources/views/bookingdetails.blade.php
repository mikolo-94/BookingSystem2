@extends('layouts.bookinglayout')

@section('content')


    <div class="container">
        <style>
            .form-inline {
                padding:10px;
            }
            .form-inline > * {
                margin:15px 3px !important;
            }
            .bs-wizard {margin-top: 40px;}

            /*Form Wizard*/
            .bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
            .bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
            .bs-wizard > .bs-wizard-step + .bs-wizard-step {}
            .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
            .bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
            .bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #628cb0; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;}
            .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #2a6496; border-radius: 50px; position: absolute; top: 8px; left: 8px; }
            .bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
            .bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
            .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%; background: #628cb0}
            .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%; background: #628cb0}
            .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
            .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
            .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
            .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
            .bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
            .bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
            .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
        </style>


        <div class="row">

            <div class="bs-wizard" style="border-bottom:0; padding-bottom: 120px;">

                <div class="col-xs-3 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">Search</div>
                    <div class="progress"><div class="progress-bar "></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Choose Room</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Booking Details</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                    <div class="text-center bs-wizard-stepnum">Recipe</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>

                </div>
            </div>




        </div>





        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">Customer Information</div>

                <div class="panel-body">
                    <form action="{{ route('receipt') }}" method="post">

                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Firstname</label>
                                <input class='form-control' size='20' type='text' id="first_name" name="first_name">
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Surname</label>
                                <input class='form-control' size='20' type='text' id="last_name" name="last_name">
                            </div>
                        </div>



                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Phone</label>
                                <input class='form-control' size='20' type='text' id="phone" name="phone">
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Email</label>
                                <input class='form-control' size='20' type='text' id="email" name="email">
                            </div>
                        </div>




                        <input type="hidden" name="start_dt" value="{{ $start_dt }}">
                        <input type="hidden" name="end_dt" value="{{ $end_dt }}">
                        <input type="hidden" name="roomtype_id" value="{{ $roomTypeDetails->id }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn btn-primary btn-block">Book »</button>
                    </form>

                </div>
            </div>
        </div>
        <div class=" col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Booking Details</div>

                <div class="panel-body">

                    <table class="table">

                        <tr>
                            <td>Check-in</td>
                            <td>{{$start_dt}}</td>

                        </tr>
                        <tr>
                            <td>Check-out</td>

                            <td>{{$end_dt}}</td>
                        </tr>
                        <tr>

                            <td>Number of Nights</td>
                            <td></td>

                        </tr>
                        <tr>

                            <td>Roomtype</td>
                            <td>{{$roomTypeDetails->roomtype}}</td>

                        </tr>

                        <tr>

                            <td>Total Price</td>
                            <td> SEK</td>

                        </tr>




                    </table>

                </div>
            </div>
        </div>

    </div>




@endsection
