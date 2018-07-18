<div class="layui-card-body">
    <form class="layui-form" action="{{ url()->current() }}" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">活动名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" placeholder="活动名称" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <input type="text" name="description" placeholder="描述" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">总金额</label>
            <div class="layui-input-block">
                <input type="text" name="amount" placeholder="总金额" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">金额区间</label>
            <div class="layui-input-block">
                <input type="text" name="range" placeholder="红包大小区间" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否自动补余</label>
            <div class="layui-input-block">
                <input type="radio" name="flag" value="1" title="自动" checked>
                <input type="radio" name="flag" value="2" title="非自动">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">开始时间</label>
            <div class="layui-input-block">
                <input type="text" name="start_date" placeholder="开始时间" id="start_date" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">结束时间</label>
            <div class="layui-input-block">
                <input type="text" name="end_date" placeholder="结束时间" id="end_date" value="" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">广告链接</label>
            <div class="layui-input-block">
                <input type="text" name="link_url" placeholder="广告链接" value="" class="layui-input">
            </div>
        </div>

    </form>
</div>
<script type="text/javascript" src=../backend/layui/layui.js"></script>
<script>
layui.use('laydate', function () {
    var laydate = layui.laydate;
    //执行一个laydate实例
    laydate.render({
        elem: '#start_date', //指定元素

    });
    laydate.render({
        elem: '#end_date', //指定元素

    });
});
</script>