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
            <h3>سنین</h3>
        </div>
        @if(count($ages) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">سنی وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnAge')}}">
                {{csrf_field()}}
                @foreach($ages as $age)
                    <div class="col-xs-12">
                        <span>
                            {{$age->name}}
                        </span>
                        <button name="ageId" value="{{$age->id}}" class="btn btn-danger" data-toggle="tooltip" title="حذف سن" style="width: auto">
                            <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode2 == "see")
            <div class="col-xs-12">
                <a href="{{URL('addAge')}}">
                    <button class=" btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن سن جدید">
                        <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                    </button>
                </a>
            </div>
        @elseif($mode2 == "add")
            <form method="post" action="{{URL('addAge')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>نام سن</span>
                        <input type="text" name="ageName" maxlength="40" required autofocus>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" name="addAge" value="اضافه کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @endif
    </center>
@stop