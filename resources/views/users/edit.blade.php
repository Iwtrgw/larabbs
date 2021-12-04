@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-default col-md-10 col-md-offset-1">
        <div class="panel-heading">
            <h4>
                <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
            </h4>
        </div>

        @include('common.error')

        <div class="panel-body">
            <form action="{{ route('users.update',$user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name-field">用户名</label>
                    <input type="text" class="form-control" id="name-field" name="name" value="{{ old('name',$user->name) }}"  />
                </div>
                <div class="form-group">
                    <label for="email-field">邮 箱</label>
                    <input type="text" class="form-control" id="email-field" name="email" value="{{ old('email',$user->email) }}">
                </div>
                <div class="form-group">
                    <label for="introduction-field">个人简介</label>
                    <textarea name="introduction" id="introduction-field" rows="3" class="form-control">{{ old('introduction',$user->introduction) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="" class="avatar-label">用户头像</label>
                    <input type="file" name="avatar">
                    @if($user->avatar)
                        <br>
                        <img src="{{ $user->avatar }}" width="200" class="thumbnail img-responsive" width="200">
                    @endif
                </div>
                <div class="well well-sm">
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop