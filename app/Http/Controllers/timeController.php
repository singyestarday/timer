<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# For DB
use Illuminate\Support\Facades\DB;

class timeController extends Controller
{
    //メインページ
    public function index(){

        # DB読み込み
        // $timerList = DB::select('select * from timer_lists');

        $timerList = DB::table('timer_lists')->orderBy('time', 'asc')->get();
        /*
        $item = [
            'timerCount'=>"5",
            'status'=>True
        ];
        
        $items = array($item, $item);
        */

        // return view('menu.index', ['items' => $items]);
        return view('menu.index', ['items' => $timerList]);
    }

    //メインページからのポスト
    public function post(Request $request){
        
        // タイマーの追加
        if ($request->input('timerCount')){

            // データチェック
            $validate_rule = [
                'time' => 'required'
            ];

            $this->validate($request, $validate_rule);
            
            
            $param = [
                'time' => $request->time
            ];
            DB::insert('insert into timer_lists (time) values (:time)', $param);

        }elseif($request->input('start')){
            $param = ['id' => $request->id];
            //実行時間取得
            $data = DB::select('select * from timer_lists where id = :id', $param);
            // Python 実行
            $command = "python wiringpy.py " . $data[0]->time;
            exec($command, $output);

        }elseif($request->input('delete')){
            //対象の削除
            $param = ['id' => $request->id];
            DB::delete('delete from timer_lists where id = :id ', $param);
        }
        
        // リダイレクト
        return redirect('/');
    }
}
