@extends('admin.layout') 
@section('action-btn')
<button class="layui-btn layui-btn-normal layui-btn-sm ajax-form" data-url="{{route('wxcash-add')}}"><i class="layui-icon">&#xe61f;</i> 新增</button>
@endsection
@section('content')
<div class="data-list">
    <form class="layui-form inline-form">
        <div class="layui-inline">
            <input class="layui-input" name="keyword" placeholder="输入活动期数">
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm layui-btn-normal search"><i class="layui-icon">&#xe615;</i></button>
        </div>
    </form>
    <div class="data">
        <p><i class="fa fa-spinner fa-spin"></i> 加载中...</p>
    </div>
</div>
@endsection