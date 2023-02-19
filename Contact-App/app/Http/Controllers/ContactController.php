<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ContactController extends Controller
{
    // お問い合わせ画面初期表示
    public function index()
    {
        return view('contact.index');
    }

    // 確認画面表示
    public function confirm(ClientRequest $request)
    {
        // フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        $fullname = $inputs['firstName']." " .$inputs['lastName'] ;
        $inputs['fullname']=$fullname;
        $inputs['opinion']=str_replace("\r\n", '', $inputs['opinion']);// 改行を削除
        return view('contact.confirm', ['inputs' => $inputs]);
    }

    // コンタクトデータ作成処理
    public function create(Request $request)
    {
        $form = $request->all();
        Contact::create($form);
        return  view('contact.thanks');
    }

    // 管理システム画面初期表示
    public function find()
    {
        $inputs['fullname'] = "";  // input初期化
        $inputs['gender'] = "0";
        $inputs['createdDateFrom'] = "";
        $inputs['createdDateTo'] = "";
        $inputs['email'] = "";
        
        $contacts = Contact::Paginate(10);
        return view('contact.search', ['contacts' =>$contacts ,'inputs' =>$inputs]);  // search.blade.phpを呼び出す
    }

    public function search(Request $request)
    {
        // Contact検索クエリ生成 
        $query = Contact::where('fullname','LIKE BINARY',"%{$request->fullname}%") ;// 名前部分一致
        
        if($request->gender == "1" or $request->gender == "2" ){//  性別
            $query->where('gender','=',"{$request->gender}");
        };
    
        if($request->createdDateFrom != null){ //登録日(FROM)
            $query->where('created_at','>=',"{$request->createdDateFrom}");
        };

        if($request->createdDateTo != null){ //登録日(TO)
            $toDate = date( "Y-m-d", strtotime($request->createdDateTo . "+1 day"));
            $query->where('created_at','<',"{$toDate}");
        };

        $query->where('email','LIKE BINARY',"%{$request->email}%");// メールアドレス部分一致
        
        // Contact検索
        $contacts = $query->paginate(10);

        // inputの値を取得
        $inputs = $request->all();
        $inputs['fullname'] = (array_key_exists('fullname',$inputs) ? $request['fullname'] :""); 
        $inputs['gender'] = (array_key_exists('gender',$inputs) ? $request['gender'] :"0");
        $inputs['createdDateFrom'] = (array_key_exists('createdDateFrom',$inputs) ? $request['createdDateFrom'] :"");
        $inputs['createdDateTo'] = (array_key_exists('createdDateTo',$inputs) ? $request['createdDateTo'] :"");
        $inputs['email'] =(array_key_exists('email',$inputs) ? $request['email'] :"");

        return view('contact.search', ['contacts' => $contacts,'inputs' =>$inputs]); // search.blade.phpを呼び出す  
    }

    public function delete(Request $request)
    {
 
        Contact::find($request->id)->delete(); // deleteメソッドで削除
         return redirect('/maintenance');       // リダイレクト

    }


}