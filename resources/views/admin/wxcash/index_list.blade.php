<table class="layui-table  text-center" lay-size="sm">
    <tbody>
    <thead>
        <tr>
            <th>
                <div class="text-left">id</div>
            </th>
            <th>
                <div class="text-left">活动标题</div>
            </th>
            <th>
                <div class="text-left">描述</div>
            </th>
            <th>
                <div class="text-left">总金额(单位:分)</div>
            </th>
            <th>
                <div class="text-left">金额区间(单位:分)</div>
            </th>
            <th>
                <div class="text-left">开始时间</div>
            </th>
            <th>
                <div class="text-left">结束时间</div>
            </th>
            <th>
                <div class="text-left">是否自动补余</div>
            </th>
            <th>
                <div class="text-left">跳转链接</div>
            </th>
            <th>
                <div class="text-left">是否上线</div>
            </th>
            <th>操作</th>
        </tr>
    </thead>
    @foreach ($Wxcash as $vo)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <div class="text-left">{{ $vo['title'] }}</div>
        </td>
        <td>
            <div class="text-left"> {{ $vo['description'] }}</div>
        </td>
        <td>
            <div class="text-left"> {{ $vo['amount'] }}</div>
        </td>
        <td>
            <div class="text-left"> {{ $vo['range'] }}</div>
        </td>
        <td>
            <div class="text-left"> {{ $vo['start_date'] }}</div>
        </td>
        <td>
            <div class="text-left"> {{ $vo['end_date'] }}</div>
        </td>
        <td>
            @if($vo['flag']==1)
            <div class="text-left">自动补余</div>
            @else
            <div class="text-left">非自动</div>
            @endif
        </td>
        <td>
            <div class="text-left"> {{ $vo['link_url'] }}</div>
        </td>
        <td>
            @if($vo['online']==1)
            <div class="text-left">上线</div>
            @else
            <div class="text-left">未上线</div>
            @endif
        </td>

        <td>
            <a href="{{ route('wxcash-edit',['id'=>$vo['id']]) }}" class="layui-btn layui-btn-xs layui-btn-normal  ajax-form" title="修改">修改</a>
            @if($vo['online']==1)
            <a href="{{ route('wxcash-putonline',['id'=>$vo['id'],'type'=>0]) }}" confirm="1" class="layui-btn layui-btn-xs layui-btn-warm ajax-post" title="上线">下线</a>
            @else
            <a href="{{ route('wxcash-putonline',['id'=>$vo['id'],'type'=>1]) }}" confirm="1" class="layui-btn layui-btn-xs ajax-post" title="上线">上线</a>
            @endif
            <a href="{{ route('wxcash-delete',['id'=>$vo['id']]) }}" title="删除" confirm="1" class="layui-btn layui-btn-xs layui-btn-danger  ajax-post">删除</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>