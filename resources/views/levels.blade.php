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
            <h3>سطوح</h3>
        </div>
        @if(count($levels) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">سطحی وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnLevel')}}">
                {{csrf_field()}}
                @foreach($levels as $level)
                    <div class="col-xs-12">
                        <span>
                            {{$level["name"]}}
                        </span>
                        <span>حداقل امتیاز </span>
                        <span> {{$level["floor"]}} </span>
                        <button name="editLevel" value="{{$level["id"]}}" class="btn btn-info" data-toggle="tooltip" title="ویرایش سطح" style="width: auto">
                            <span class="glyphicon glyphicon-edit" style="margin-left: 30%"></span>
                        </button>
                        <button name="deleteLevel" value="{{$level["id"]}}" class="btn btn-danger" data-toggle="tooltip" title="حذف سطح" style="width: auto">
                            <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode2 == "see")
            <div class="col-xs-12">
                <a href="{{URL('addLevel')}}">
                    <button class=" btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن سطح جدید">
                        <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                    </button>
                </a>
            </div>
        @elseif($mode2 == "add")
            <form method="post" action="{{URL('addLevel')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام سطح</span>
                        <input type="text" name="levelName" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>حداقل امتیاز</span>
                        <input type="number" min="0" max="1000" value="1" name="floor">
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" name="addLevel" value="اضافه کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @elseif($mode2 == "edit")
            <form method="post" action="{{URL('opOnLevel')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام سطح</span>
                        <input type="text" name="levelName" value="{{$selectedLevel->name}}" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <label>
                        <span>حداقل امتیاز</span>
                        <input type="number" min="0" max="1000" value="{{$selectedLevel->floor}}" name="floor">
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="text" name="levelId" value="{{$selectedLevel->id}}" style="visibility: hidden">
                    <input type="submit" name="doEditLevel" value="ویرایش کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @endif
    </center>
@stop