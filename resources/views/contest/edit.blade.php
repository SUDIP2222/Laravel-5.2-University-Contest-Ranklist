@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contest</div>
                    <div class="panel-body">
                        {!! Form::model($contest,['method'=>'PATCH','action'=>['ContestController@update',$contest->id],'class'=>'form-horizontal'])!!}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                {!! Form::date('date',null,['class'=>'date form-control','placeholder'=>'Enter First Name']) !!}

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">User</label>

                            <div class="col-md-6">
                                {!!Form::select('full_name',$users,$contest->user_id,['class'=>'form-control','multiple'])!!}

                                @if ($errors->has('full_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contest_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contest Name</label>

                            <div class="col-md-6">
                                {!! Form::text('contest_name',null,['class'=>'form-control','placeholder'=>'Enter First Name']) !!}

                                @if ($errors->has('contest_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contest_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('penalty') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Penalty</label>

                            <div class="col-md-6">
                                {!! Form::number('penalty',null,['class'=>'form-control','placeholder'=>'Enter First Name']) !!}

                                @if ($errors->has('penalty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penalty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('solve') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Solve</label>

                            <div class="col-md-6">
                                {!! Form::number('solve',null,['class'=>'form-control','placeholder'=>'Enter First Name']) !!}

                                @if ($errors->has('solve'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('solve') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Contest Edit
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">

        $('.date').datepicker({

            format: 'dd-mm-yyyy'

        });

    </script>
@endsection