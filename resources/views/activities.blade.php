<?php $mode = "setting" ?>
@extends('layouts.bodyProfile')

@section('header')
    @parent
    <style>
        .col-xs-12 {
            margin-top: 10px;
        }

        button {
            margin-right: 10px;
        }

        .row {
            direction: rtl;
        }
    </style>
@stop

@section('main')
    <center class="row">
        <div class="col-xs-12">
            <h3>فعالیت ها</h3>
        </div>
        @if(count($activities) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">فعالیتی وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnActivity')}}">
                {{csrf_field()}}
                @foreach($activities as $activity)
                    <div class="col-xs-12">
                        <img width="100" height="100" src="{{URL::asset('activities') . '/' . $activity->pic}}">
                        <span>
                            {{$activity->name}}
                        </span>
                        <span> امتیاز </span>
                        <span>
                            {{$activity->rate}}
                        </span>
                        <button name="editActivity" value="{{$activity->id}}" class="btn btn-info" data-toggle="tooltip" title="ویرایش فعالیت" style="width: auto">
                            <span class="glyphicon glyphicon-edit" style="margin-left: 30%"></span>
                        </button>
                        <button name="deleteActivity" value="{{$activity->id}}" class="btn btn-danger" data-toggle="tooltip" title="حذف فعالیت" style="width: auto">
                            <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode2 == "see")
            <div class="col-xs-12">
                <a href="{{URL('addActivity')}}">
                    <button class="btn btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن فعالیت جدید">
                        <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                    </button>
                </a>
            </div>
        @elseif($mode2 == "add")
            <form method="post" action="{{URL('addActivity')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام فعالیت</span>
                        <input type="text" name="activityName" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>امتیاز فعالیت</span>
                        <input type="number" name="activityRate" max="10000" min="0" value="1">
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>تصویر مربوطه</span>
                        <input type="file" name="pic" accept="image/png" required>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" name="addActivity" value="اضافه کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @elseif($mode2 == "edit")
            <form method="post" action="{{URL('opOnActivity')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام فعالیت</span>
                        <input type="text" name="activityName" value="{{$selectedActivity->name}}" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>امتیاز فعالیت</span>
                        <input type="number" name="activityRate" max="10000" min="0" value="{{$selectedActivity->rate}}">
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>تصویر جدید</span>
                        <input type="file" name="pic" accept="image/png">
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="text" name="activityId" value="{{$selectedActivity->id}}" style="visibility: hidden">
                    <input type="submit" name="doEditActivity" value="ویرایش کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @endif
    </center>
@stop