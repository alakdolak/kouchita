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

        .mg-lt-30per {
            margin-left: 30%;
        }

        .border-radius-50per {
            border-radius: 50%;
        }

        .width-auto {
            width: auto;
        }

        .width-80per {
            width: 80%;
        }

        .mg-tp-10 {
            margin-top: 10px;
        }
    </style>
@stop

@section('main')

    <center class="row">
        <div class="col-xs-12">
            <h3>تصاویر پیش فرض</h3>
            <div class="line width-80per"></div>
        </div>
        @if(count($pics) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">تصویری وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnPic')}}">
                {{csrf_field()}}
                @foreach($pics as $pic)
                    <div class="col-xs-12">
                        <img width="100px" height="100px" src="{{URL::asset('defaultPic') . '/' . $pic->name}}">

                        <button name="deletePic" value="{{$pic->id}}" class="btn btn-danger width-auto" data-toggle="tooltip" title="حذف تصویر">
                            <span class="glyphicon glyphicon-remove mg-lt-30per"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode2 == "see")
            <div class="col-xs-12">
                <a href="{{URL('addPic')}}">
                    <button class="btn btn-primary width-auto border-radius-50per" data-toggle="tooltip" title="اضافه کردن تصویر جدید">
                        <span class="glyphicon glyphicon-plus mg-lt-30per"></span>
                    </button>
                </a>
            </div>
        @elseif($mode2 == "add")
            <form method="post" action="{{URL('addPic')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>تصویر مربوطه</span>
                        <input type="file" name="pic" accept="image/png" required>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" class="btn btn-primary width-auto mg-tp-10" name="addPic" value="اضافه کن">
                </div>
            </form>
        @endif
    </center>
@stop