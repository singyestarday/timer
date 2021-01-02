@extends('layouts.base')

@section('contentTitle', 'Ficility List')

@section('content1')
    <!--表示テーブル-->
    <table class="table table-striped">
    <tr><th>時間</th><th>操作</th><th>削除</th></tr>
    @foreach ($items as $item)
        <tr><td>{{$item->time}}</td>
        <form action="/" method="post">
            @csrf
            <input type="hidden" value = "{{$item->id}}" name="id">
            <td>
                <input type="submit" class="btn btn-primary" value = "START" name="start">
            </td>
            <td>
                <input type="submit" class="btn btn-danger" value = "DELETE" name="delete">
            </td>
        </form>
    </tr>
    @endforeach
    </table>
    <!-- <input type="button" onclick="location.href='/edit'" value="編集"> -->
    <hr color="black">
    <h5>カウンター追加</h5>
    <form action="/" method="post">
        @csrf
        <table class="table table-dark">
            <tr><td><label>タイマーカウント：</td><td><input type="text" name="time"></label></td></tr>
        </table>
        <input type="submit" class="btn btn-primary" value="追加" name="timerCount">
    </form>　

@endsection