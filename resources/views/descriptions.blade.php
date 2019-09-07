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
            <h3>توضیحات</h3>
            <div class="line" style="width: 80%"></div>
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
                        <button name="editDesc" value="{{$description->id}}" class="btn btn-info" data-toggle="tooltip" title="ویرایش توضیح" style="width: auto">
                            <span class="glyphicon glyphicon-edit" style="margin-left: 30%"></span>
                        </button>
                        <button name="deleteDesc" value="{{$description->id}}" class="btn btn-danger" data-toggle="tooltip" title="حذف توضیح" style="width: auto">
                            <span class="glyphicon glyphicon-remove" style="margin-left: 30%"></span>
                        </button>
                    </div>
                @endforeach
            </form>
        @endif

        @if($mode == "see")
            <div class="col-xs-12">
                <a href="{{URL('addDescription')}}">
                    <button class=" btn btn-default" style="width: auto; border-radius: 50% 50% 50% 50%" data-toggle="tooltip" title="اضافه کردن توضیح جدید">
                        <span class="glyphicon glyphicon-plus" style="margin-left: 30%"></span>
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
                    <input type="submit" name="addDesc" value="اضافه کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
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
                    <input type="text" name="descId" value="{{$selectedDesc->id}}" style="visibility: hidden">
                    <input type="submit" name="doEditDesc" value="ویرایش کن" class="btn btn-primary" style="width: auto; margin-top: 10px">
                </div>
            </form>
        @endif
    </center>
@stop