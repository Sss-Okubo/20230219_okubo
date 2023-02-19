<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<script language="javascript" type="text/javascript">
    function toHalfWidth() { // 全角から半角に変換(全角ハイフンが長音文字になる場合があるので2重変換)
        let elm = document.getElementById("postcode");
        let changed =  elm.value.replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-').replace(/[Ａ-Ｚａ-ｚ０-９！-～]/g, function(s){
            return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
        });
        elm.value=changed;
        };
</script>
<style>
    .kome{
        color: red;
    }
    .flex{
        display: flex;
    }
    .ex{
        color:lightgray;
    }
    .input-error{
        color: red;
    }
   .btn{
        width: 10rem;
        margin-bottom: 5em;
    }
</style>
<body>
    <div class="container">
        <h3 class="text-center mt-4 mb-4">お問い合わせ</h3>
        <div class="container">
            <form action="/confirm" method="post" class="h-adr">
                @csrf
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お名前<span class="kome ml-1">※</span></p>
                    <div class="col-sm-8 flex">
                        <input type="text" class="form-control" name="firstName" value="{{old('firstName')}}">
                        <input type="text" class="form-control ml-2" name="lastName" value="{{old('lastName')}}">
                    </div>
                    <!-- エラーメッセージ 名前-->
                    @if ($errors -> has('firstName') ||  $errors -> has('lastName'))
                        <p class="col-sm-4 col-form-label"></p>
                        <div class="col-sm-8 flex">
                            <p class="col-sm-6 input-error">{{$errors->first('firstName')}}</p>
                            <p class="col-sm-6 input-error">{{$errors->first('lastName')}}</p>
                        </div>
                    @endif
                    <!---->
                    <p class="col-sm-4 col-form-label"></p>
                    <div class="col-sm-8 flex">
                        <p class="col-sm-6 ex">例）山田</p>
                        <p class="col-sm-6 ex">例）太郎</p>
                    </div>
                </div>
 
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">性別<span class="kome ml-1">※</span></p>
                    <div class="col-sm-8">
                        <input type="radio" name="gender" value="1" checked>男性
                        <input type="radio" name="gender" value="2">女性
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス<span class="kome ml-1">※</span></p>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    </div>
                </div>
                <!-- エラーメッセージ メールアドレス-->
                @if ($errors -> has('email'))
                <div class="form-group row">
                    <p class="col-sm-4"></p>
                    <div class="col-sm-8 input-error">{{$errors->first('email')}}</div>
                </div>
                @endif
                <!---->
                <div class="form-group row">
                    <p class="col-sm-4 "></p>
                    <div class="col-sm-8 ex"> 例）test@example.com</div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">郵便番号<span class="kome ml-1">※</span></p>
                    <div class="col-sm-8">
                        <div class="row">
                            <p class="col-sm-1">〒</p>
                            <span class="p-country-name" style="display:none;">Japan</span>
                            <input name="postcode" type="text" class="col-sm-11 form-control p-postal-code" value="{{old('postcode')}}"  id="postcode"  onblur=toHalfWidth()>
                        </div>
                    </div>
                </div>
                <!-- エラーメッセージ 郵便番号-->
                @if ($errors -> has('postcode') )
                <div class="form-group row">
                    <p class="col-sm-4"></p>
                    <div class="col-sm-8 input-error">{{$errors->first('postcode')}}</div>
                </div>
                @endif
                <div class="form-group row">
                    <p class="col-sm-4"></p>
                    <div class="col-sm-8 ex">例）123-4567</div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">住所<span class="kome ml-1">※</span></p>
                    <div class="col-sm-8">
                        <input type="text" class="form-control p-region p-locality p-street-address p-extended-address" name="address" value="{{old('address')}}";>
                    </div>
                </div>
                <!-- エラーメッセージ 住所-->
                @if ($errors -> has('address') )
                <div class="form-group row">
                    <p class="col-sm-4"></p>
                    <div class="col-sm-8 input-error">{{$errors->first('address')}}</div>
                </div> 
                @endif
                <div class="form-group row">
                    <p class="col-sm-4"></p>
                    <div class="col-sm-8 ex">例）東京都渋谷区千駄木1-2-3</div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">建物名</p>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="building_name" value="{{old('building_name')}}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4"></p>
                    <div class="col-sm-8 ex">例）千駄ヶ谷マンション101</div>
                </div>
                
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">ご意見<span class="kome ml-1">※</span></p>
                    <div class="col-sm-8">
                        <textarea maxlength="120" rows="10" class="form-control" name="opinion" value="{{old('opinion')}}"></textarea>
                    </div>
                </div>
               <!-- エラーメッセージ ご意見-->
                @if ($errors -> has('opinion') )
                <div class="form-group row">
                    <p class="col-sm-4"></p>
                    <div class="col-sm-8 input-error">{{$errors->first('opinion')}}</div>
                </div> 
                @endif
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">確認</button>
                </div>
            </form>
        </div>
    </div>
    <!-- 郵便番号から住所自動入力 -->
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
</body>
</html>