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
            <h3>مدال ها</h3>
        </div>
        @if(count($medals) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">مدالی وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnMedal')}}">
                {{csrf_field()}}
                @foreach($medals as $medal)
                    <div class="col-xs-12">
                        <img width="40px" height="40px" src="{{$medal['pic_1']}}">
                        <img style="margin-right: 10px" width="40px" height="40px" src="{{$medal['pic_2']}}">
                        <span>
                            {{$medal["name"]}}
                        </span>
                        <span>حداقل امتیاز برای فعالیت </span>
                        <span>{{$medal["activity"]}}</span>
                        <span> {{$medal["floor"]}} </span>
                        <span>&nbsp;&nbsp;مکان مربوطه</span>
                        <span>{{$medal["kindPlaceId"]}}</span>
                        <button name="deleteMedal" value="{{$medal["id"]}}" class="btn btn-danger" data-toggle="tooltip" title="حذف مدال" style="width: auto">
                            <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode2 == "see")
            <div class="col-xs-12">
                <a href="{{URL('addMedal')}}">
                    <button class="btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن مدال جدید">
                        <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                    </button>
                </a>
            </div>
        @elseif($mode2 == "add")
            <form method="post" action="{{URL('addMedal')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام مدال</span>
                        <input type="text" name="medalName" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>فعالیت مربوطه</span>
                        <select name="activity">
                            @foreach($activities as $activity)
                                <option value="{{$activity->id}}">{{$activity->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="col-xs-12">
                    <label>
                        <span>مکان مربوطه</span>
                        <select name="kindPlaceId">
                            <option value="-1">مهم نیست</option>
                            @foreach($places as $place)
                                <option value="{{$place->id}}">{{$place->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>حداقل امتیاز</span>
                        <input type="number" min="0" max="1000" value="1" name="floor">
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>تصویر قیل از اخذ مدال</span>
                        <input name="beforeImg" type="file" required>
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>تصویر بعد از اخذ مدال</span>
                        <input name="afterImg" type="file" required>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" name="addMedal" value="اضافه کن" class="btn btn-primay" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @endif
    </center>
@stop