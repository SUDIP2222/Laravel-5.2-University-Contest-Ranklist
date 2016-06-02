@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Information</div>
                    <div class="panel-body">
                        {!! Form::open(['url'=>['/profile/addinfo'],'class'=>'form-horizontal']) !!}
                        {!! csrf_field() !!}



                        <div class="form-group{{ $errors->has('codeforces_handle') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Codeforces Handle</label>

                            <div class="col-md-6">
                                {!! Form::text('codeforces_handle',null,['class'=>'form-control','placeholder'=>'Enter Codeforces Handle']) !!}

                                @if ($errors->has('codeforces_handle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('codeforces_handle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Add Information
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection