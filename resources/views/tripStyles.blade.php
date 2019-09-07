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
            <h3>سبک های سفر</h3>
        </div>
        @if(count($tripStyles) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">سبک سفری وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnTripStyle')}}">
                {{csrf_field()}}
                @foreach($tripStyles as $tripStyle)
                    <div class="col-xs-12">
                    <span>
                        {{$tripStyle["name"]}}
                    </span>
                        <button name="editTripStyle" value="{{$tripStyle["id"]}}" class="btn btn-info" data-toggle="tooltip" title="ویرایش سبک سفر" style="width: auto">
                            <span class="glyphicon glyphicon-edit" style="margin-left: 30%"></span>
                        </button>
                        <button name="deleteTripStyle" value="{{$tripStyle["id"]}}" class="btn btn-danger" data-toggle="tooltip" title="حذف سبک سفر" style="width: auto">
                            <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode2 == "see")
            <div class="col-xs-12">
                <a href="{{URL('addTripStyle')}}">
                    <button class=" btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن سبک سفر جدید">
                        <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                    </button>
                </a>
            </div>
        @elseif($mode2 == "add")
            <form method="post" action="{{URL('addTripStyle')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام سبک سفر</span>
                        <input type="text" name="tripStyleName" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" name="addTripStyle" value="اضافه کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @elseif($mode2 == "edit")
            <form method="post" action="{{URL('opOnTripStyle')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام سبک سفر</span>
                        <input type="text" name="tripStyleName" value="{{$selectedTripStyle->name}}" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="text" name="tripStyleId" value="{{$selectedTripStyle->id}}" style="visibility: hidden">
                    <input type="submit" class="btn btn-primary" name="doEditTripStyle" value="ویرایش کن" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @endif
    </center>
@stop