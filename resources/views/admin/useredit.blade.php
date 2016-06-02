@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        {!! Form::model($user,['method'=>'PATCH','action'=>['UserController@update',$user->id],'class'=>'form-horizontal']) !!}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                {!! Form::text('fname',null,['class'=>'form-control','placeholder'=>'name']) !!}

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                {!! Form::text('lname',null,['class'=>'form-control','placeholder'=>'name']) !!}

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('university') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">University </label>

                            <div class="col-md-6">
                                {!! Form::text('university',null,['class'=>'form-control','placeholder'=>'name']) !!}

                                @if ($errors->has('university'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                {!! Form::text('department',null,['class'=>'form-control','placeholder'=>'name']) !!}

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Student Id</label>

                            <div class="col-md-6">
                                {!! Form::text('student_id',null,['class'=>'form-control','placeholder'=>'name']) !!}

                                @if ($errors->has('student_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'name']) !!}

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'name']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('is_a') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">User Role </label>
                            <div class="col-md-6">
                                {!! Form::select('is_a',array('user'=>'user','admin'=>'admin'),null,['class'=>'form-control from-width']) !!}
                                @if ($errors->has('is_a'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('is_a') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Edit User
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