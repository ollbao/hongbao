<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wxcash;
use Illuminate\Support\Facades\Validator;
use App\Library\Y;

class WxcashController extends Controller {

    //广告微信红包列表
    public function index(Request $request) {

        if ($request->isMethod('post')) {
            $Wxcash = \App\Models\Wxcash::all()->toArray();
            return view('admin.wxcash.index_list', [
                'Wxcash' => $Wxcash
            ]);
        } else {
            return view('admin.wxcash.index');
        }
    }

    //添加活动
    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $post = $request->post();
            $validator = Validator::make($post, [
                        'title' => 'required',
                        'description' => 'required',
                        'amount' => 'required',
                        'range' => 'required',
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'link_url' => 'required',
            ]);
            if ($validator->fails()) {
                return Y::error($validator->errors());
            }
            $wxcash = new Wxcash();
            $wxcash->title = $post['title'];
            $wxcash->description = $post['description'];
            $wxcash->amount = $post['amount'];
            $wxcash->range = $post['range'];
            $wxcash->start_date = $post['start_date'];
            $wxcash->end_date = $post['end_date'];
            $wxcash->link_url = $post['link_url'];
            $wxcash->online = 0;
            $wxcash->status = 1;
            $wxcash->flag = empty($post['flag']) ? 0 : 1;
            $wxcash->created_at = date("Y-m-d H:i:s", time());
            $wxcash->updated_at = date("Y-m-d H:i:s", time());
            $wxcash->save();
            return Y::success('添加成功');
        } else {
            return view('admin.wxcash.add');
        }
    }

    //修改权限
    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {
            $post = $request->post();
            $validator = Validator::make($post, [
                        'title' => 'required',
                        'description' => 'required',
                        'amount' => 'required',
                        'range' => 'required',
                        'start_date' => 'required',
                        'end_date' => 'required',
                        'link_url' => 'required',
            ]);
            if ($validator->fails()) {
                return Y::error($validator->errors());
            }
            try {
                $result = Wxcash::where('id', $id)->update($post);
            } catch (\Exception $e) {
                return Y::error($e->getMessage());
            }
            if ($result) {
                return Y::success('更新成功');
            }
            return Y::success('更新失败');
        } else {
            //当前权限
            $info = Wxcash::findOrFail($id);
            return view('admin.wxcash.edit', [
                'info' => $info
            ]);
        }
    }

    //删除
    public function delete($id) {
        if (Wxcash::destroy($id) > 0) {
            return Y::success('删除成功');
        }
        return Y::error('删除失败');
    }

    //上下线
    public function putonline(Request $request, $id, $type) {
        if ($request->isMethod('post')) {
            $post['online'] = $type == 0 ? "0" : 1;
            try {
                $result = Wxcash::where('id', $id)->update($post);
            } catch (\Exception $e) {
                return Y::error($e->getMessage());
            }
            if ($result) {
                Y::success('上线成功');
            } else {
                Y::error('上线失败');
            }
        }
    }

}
