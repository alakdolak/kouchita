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
        @if($mode2 == 'select1')
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=adab')}}"><button class="btn btn-primary" style="width: auto">آداب و رسوم</button></a>
            </div>
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=amaken')}}"><button class="btn btn-primary" style="width: auto">اماکن گردشگری</button></a>
            </div>
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=concert')}}"><button class="btn btn-primary" style="width: auto">کنسرت</button></a>
            </div>
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=hotel')}}"><button class="btn btn-primary" style="width: auto">هتل</button></a>
            </div>
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=jashnvare')}}"><button class="btn btn-primary" style="width: auto">جشنواره</button></a>
            </div>
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=majara')}}"><button class="btn btn-primary" style="width: auto">ماجراجویی</button></a>
            </div>
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=restaurant')}}"><button class="btn btn-primary" style="width: auto">رستوران</button></a>
            </div>
            <div class="col-xs-12">
                <a href="{{URL('addMeta/kind=rosoom')}}"><button class="btn btn-primary" style="width: auto">رسوم</button></a>
            </div>

        @elseif($mode2 == "select2")
            @foreach($target as $itr)
                <div class="col-xs-12">
                    <a href="{{URL('addMeta/kind=' . $kind . '/id=' . $itr->id)}}"><button class="btn btn-primary" style="width: auto">{{$itr->name}}</button></a>
                </div>
            @endforeach

        @else
            <form method="post" action="{{URL('changeMeta/kind=' . $kind . '/id=' . $id)}}">
                {{csrf_field()}}
                <div class="col-xs-12">
                    <h4>متن مورد نظر خود را وارد نمایید</h4>
                    <textarea style="width: 60%; height: 400px" name="newMeta" maxlength="1024">{{$meta}}</textarea>
                </div>
                <div class="col-xs-12">
                    <input type="submit" class="btn btn-primary" style="width: auto" value="تایید">
                </div>
            </form>
        @endif

    </center>
@stop