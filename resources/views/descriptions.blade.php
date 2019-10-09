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

        .visibility-hidden {
            visibility: hidden;
        }
    </style>
@stop

@section('main')
    <center class="row">
        <div class="col-xs-12">
            <h3>توضیحات</h3>
            <div class="line width-80per"></div>
        </div>
        @if(count($descriptions) == 0)
            <div class="col-xs-12">
                <h4 class="warning_color">توضیحی وجود ندارد</h4>
            </div>
        @else
            <form method="post" action="{{URL('opOnDescription')}}">
                {{csrf_field()}}
                @foreach($descriptions as $description)
                    <div class="col-xs-12">
                        <span>
                            {{$description->description}}
                        </span>
                        <button name="editDesc" value="{{$description->id}}" class="btn btn-info width-auto" data-toggle="tooltip" title="ویرایش توضیح">
                            <span class="glyphicon glyphicon-edit mg-lt-30per"></span>
                        </button>
                        <button name="deleteDesc" value="{{$description->id}}" class="btn btn-danger width-auto" data-toggle="tooltip" title="حذف توضیح">
                            <span class="glyphicon glyphicon-remove mg-lt-30per"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode == "see")
            <div class="col-xs-12">
                <a href="{{URL('addDescription')}}">
                    <button class=" btn btn-default width-auto border-radius-50per" data-toggle="tooltip" title="اضافه کردن توضیح جدید">
                        <span class="glyphicon glyphicon-plus mg-lt-30per"></span>
                    </button>
                </a>
            </div>
        @elseif($mode == "add")
            <form method="post" action="{{URL('addDescription')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>توضیح</span>
                        <textarea type="text" name="desc" maxlength="100" required autofocus></textarea>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="submit" name="addDesc" value="اضافه کن" class="btn btn-primary width-auto mg-tp-10">
                </div>
            </form>
        @elseif($mode == "edit")
            <form method="post" action="{{URL('opOnDescription')}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <label>
                        <span>توضیح</span>
                        <textarea type="text" name="desc"  maxlength="100" required autofocus>{{$selectedDesc->blockDesc}}</textarea>
                    </label>
                </div>
                <div class="col-xs-12">
                    <p class="warning_color">{{$msg}}</p>
                    <input type="text" name="descId" value="{{$selectedDesc->id}}" class="visibility-hidden">
                    <input type="submit" name="doEditDesc" value="ویرایش کن" class="btn btn-primary mg-tp-10 width-auto">
                </div>
            </form>
        @endif
    </center>
@stop