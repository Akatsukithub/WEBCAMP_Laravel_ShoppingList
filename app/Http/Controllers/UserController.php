<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterPost;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 登録ページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.register');
    }

    /**
     * 
     */
    public function register(UserRegisterPost $request)
    {
        // validate済みのデータの取得
        $datum = $request->validated();

        // テーブルへのINSERT
        try {
            // パスワードをハッシュ化
            $datum['password'] = Hash::make($datum['password']);
            // insert
            $r = UserModel::create($datum);
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }

        // ユーザー登録成功
        $request->session()->flash('front.user_register_success', true);
        //
        return redirect(route('front.index'));
    }    

}
