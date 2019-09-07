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

    @if(empty($kindPlaceIds))
        <center class="row">
            <div class="col-xs-12">
                <h3>آیتم ها</h3>
            </div>
            @if(count($picItems) == 0)
                <div class="col-xs-12">
                    <h4 class="warning_color">آیتمی وجود ندارد</h4>
                </div>
            @else
                <form method="post" action="{{route('opOnPicItem', ['mode' => $kindPlaceId])}}">
                    {{csrf_field()}}
                    @foreach($picItems as $picItem)
                        <div class="col-xs-12">
                        <span>
                            {{$picItem->name}}
                        </span>
                            <button name="picItemId" value="{{$picItem->id}}" class="btn btn-danger" data-toggle="tooltip" title="حذف آیتم" style="width: auto">
                                <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                            </button>
                        </div>
                    @endforeach
                </form>

            @endif

            @if($mode2 == "see")
                <div class="col-xs-12">
                    <a href="{{route('addPicItem', ['mode' => $kindPlaceId])}}">
                        <button class=" btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن آیتم جدید">
                            <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                        </button>
                    </a>
                </div>
            @elseif($mode2 == "add")
                <form method="post" action="{{route('addPicItem', ['mode' => $kindPlaceId])}}">
                    {{csrf_field()}}
                    <div class="col-xs-12">
                        <label>
                            <span>نام آیتم</span>
                            <input type="text" name="picItemName" maxlength="40" required autofocus>
                        </label>
                    </div>
                    <div class="col-xs-12">
                        <p class="warning_color">{{$msg}}</p>
                        <input type="submit" name="addPicItem" value="اضافه کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                    </div>
                </form>
            @endif

            <div class="col-xs-12">
                <a href="{{URL('picItems')}}"><button class="btn btn-default">بازگشت</button></a>
            </div>
        </center>

    @else
        <center class="row">
            @foreach($kindPlaceIds as $itr)
                <div class="col-xs-12">
                    <a href="{{route('picItems', ['mode' => $itr->id])}}">
                        <button class="btn btn-primary">{{$itr->name}}</button>
                    </a>
                </div>
            @endforeach
        </center>
    @endif
@stop