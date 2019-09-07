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
                <h3>گزارشات</h3>
            </div>
            @if(count($reports) == 0)
                <div class="col-xs-12">
                    <h4 class="warning_color">گزارشی وجود ندارد</h4>
                </div>
            @else
                <form method="post" action="{{route('opOnReport', ['mode' => $kindPlaceId])}}">
                    {{csrf_field()}}
                    @foreach($reports as $report)
                        <div class="col-xs-12">
                        <span>
                            {{$report->description}}
                        </span>
                            <button name="reportId" value="{{$report->id}}" class="btn btn-danger" data-toggle="tooltip" title="حذف گزارش" style="width: auto">
                                <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                            </button>
                        </div>
                    @endforeach
                </form>

            @endif

            @if($mode2 == "see")
                <div class="col-xs-12">
                    <a href="{{route('addReport', ['mode' => $kindPlaceId])}}">
                        <button class=" btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن گزارش جدید">
                            <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
                        </button>
                    </a>
                </div>
            @elseif($mode2 == "add")
                <form method="post" action="{{route('addReport', ['mode' => $kindPlaceId])}}">
                    {{csrf_field()}}
                    <div class="col-xs-12">
                        <label>
                            <span>شرح گزارش</span>
                            <input type="text" name="reportDesc" maxlength="40" required autofocus>
                        </label>
                    </div>
                    <div class="col-xs-12">
                        <p class="warning_color">{{$msg}}</p>
                        <input type="submit" name="addReport" value="اضافه کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                    </div>
                </form>
            @endif

            <div class="col-xs-12">
                <a href="{{URL('reports')}}"><button class="btn btn-default">بازگشت</button></a>
            </div>
        </center>

    @else
        <center class="row">
            @foreach($kindPlaceIds as $itr)
                <div class="col-xs-12">
                    <a href="{{route('reports', ['mode' => $itr->id])}}">
                        <button class="btn btn-primary">{{$itr->name}}</button>
                    </a>
                </div>
            @endforeach
        </center>
    @endif
@stop