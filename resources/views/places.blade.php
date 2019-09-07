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
            <h3>اماکن</h3>
            <div class="line" style="width: 80%"></div>
        </div>
        @if(count($places) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">مکانی وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnPlace')}}">
                {{csrf_field()}}
                @foreach($places as $place)
                    <div class="col-xs-12">
                        <span>
                            {{$place->name}}
                        </span>
                        <button name="editPlace" value="{{$place->id}}" class="btn btn-info" data-toggle="tooltip" title="ویرایش مکان" style="width: auto">
                            <span class="glyphicon glyphicon-edit" style="margin-left: 30%"></span>
                        </button>
                        <button name="deletePlace" value="{{$place->id}}" class="btn btn-danger" data-toggle="tooltip" title="حذف مکان" style="width: auto">
                            <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode2 == "see")
            <div class="col-xs-12">
                <a href="{{URL('addPlace')}}">
                    <button class="btn btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن مکان جدید">
                        <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                    </button>
                </a>
            </div>
        @elseif($mode2 == "add")
            <form method="post" action="{{URL('addPlace')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>مکان</span>
                        <input type="text" name="placeName" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" name="addPlace" value="اضافه کن" class="btn" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @elseif($mode2 == "edit")
            <form method="post" action="{{URL('opOnPlace')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>مکان</span>
                        <input type="text" name="placeName" value="{{$selectedPlace->name}}" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="text" name="placeId" value="{{$selectedPlace->id}}" style="visibility: hidden">
                    <input type="submit" name="doEditPlace" value="ویرایش کن" class="btn" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @endif
    </center>
@stop