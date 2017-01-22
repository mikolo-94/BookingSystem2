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
            .bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: rgba(42, 100, 150, 0.72); top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;}
            .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #2a6496; border-radius: 50px; position: absolute; top: 8px; left: 8px; }
            .bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
            .bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
            .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
            .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
            .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
            .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
            .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
            .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
            .bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
            .bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
            .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
        </style>
        <div class="row">
            <div class="page-header">
                <h1 style="text-align: center">Search available rooms</h1>
            </div>
            <div class="bs-wizard" style="border-bottom:0; padding-bottom: 120px;">

                <div class="col-xs-3 bs-wizard-step active">
                    <div class="text-center bs-wizard-stepnum">Sök</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Välj</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Detaljer & Betala</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                    <div class="text-center bs-wizard-stepnum">Kvitto</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>

                </div>
            </div>





        </div>
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">



                <div class="panel-body" style="text-align: center">

                    <!-- Include Bootstrap Datepicker -->
                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
                    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

                    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

                    <style type="text/css">
                        /**
                         * Override feedback icon position
                         * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
                         */
                        #eventForm .form-control-feedback {
                            top: 0;
                            right: -15px;
                        }
                    </style>

                    <form action="{{ route('searchresult') }}" id="eventForm" method="post" class="form-inline">


                        <div class="form-group">

                            <div class="col-xs-10 date">
                                <div class="input-group input-append date" id="datePicker">
                                    <input type="text" class="form-control" name="start_dt" placeholder="Incheckning" />
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">

                            <div class="col-xs-10 date">
                                <div class="input-group input-append date" id="datePicker2">
                                    <input type="text" class="form-control" name="end_dt" placeholder="Utcheckning" />
                                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <select class="col-xs-10 form-control" name="min_occupancy">
                                <option value="1">1 Person</option>
                                <option value="2">2 Personer</option>
                                <option value="3">3 Personer</option>
                                <option value="4">4 Personer</option>
                                <option value="5">5 Personer</option>
                                <option value="6">6 Personer</option>
                                <option value="7">7 Personer</option>
                                <option value="8">8 Personer</option>
                                <option value="9">9 Personer</option>
                                <option value="10">10 Personer</option>
                            </select>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-xs-10">
                                <button type="submit" class="btn btn-default">Sök</button>
                            </div>
                        </div>
                    </form>



                    <script>
                        var nowDate = new Date();
                        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

                        $(document).ready(function() {
                            $('#datePicker')
                                    .datepicker({
                                        format: 'yyyy-mm-dd',
                                        startDate: today,
                                        todayHighlight: true
                                    })
                                    .on('changeDate', function(e) {
                                        // Revalidate the date field
                                        $('#eventForm').formValidation('revalidateField', 'date');

                                    });

                            $('#datePicker2')
                                    .datepicker({
                                        format: 'yyyy-mm-dd',

                                    })
                                    .on('changeDate', function(e) {
                                        // Revalidate the date field
                                        $('#eventForm').formValidation('revalidateField', 'date');
                                    });

                            $('#eventForm').formValidation({
                                framework: 'bootstrap',
                                icon: {
                                    valid: 'glyphicon glyphicon-ok',
                                    invalid: 'glyphicon glyphicon-remove',
                                    validating: 'glyphicon glyphicon-refresh'
                                },
                                fields: {
                                    name: {
                                        validators: {
                                            notEmpty: {
                                                message: 'The name is required'
                                            }
                                        }
                                    },
                                    date: {
                                        validators: {
                                            notEmpty: {
                                                message: 'The date is required'
                                            },
                                            date: {
                                                format: 'MM/DD/YYYY',
                                                message: 'The date is not a valid'
                                            }
                                        }
                                    }
                                }
                            });
                        });
                    </script>



                </div>
            </div>
        </div>

    </div>


@endsection
