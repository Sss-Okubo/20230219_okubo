<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONTACT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
    .mt-1{
        margin-top: 1em;;
    }
    .btn{
        width: 10rem;
    }
</style>
<body>
    <div class="container">
        <h1 class="text-center mt-2 mb-5">内容確認</h1>
        <div class="container">
            <form action="/create" method="post">
                @csrf
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">お名前</p>
                    <div class="col-sm-8 flex">
                       <p class="col-sm-12">{{$inputs['fullname']}}
                        <input type="hidden" name="fullname" value="{{$inputs['fullname']}}" />
                    </div>
                 </div>
 
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">性別</p>
                    <div class="col-sm-8">
                        @if($inputs['gender'] ==1)
                                    <p>男性</p>
                                @else
                                    <p>女性</p>
                                @endif
                        <input type="hidden" name="gender" value={{$inputs['gender']}} />
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">メールアドレス</p>
                    <div class="col-sm-8">
                        <p class="col-sm-12">{{$inputs['email']}}</p>
                        <input type="hidden" name="email" value={{$inputs['email']}} />
                    </div>
                </div>
 
                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">郵便番号</p>
                    <div class="col-sm-8">
                        <p class="col-sm-12">{{$inputs['postcode']}}</p>
                        <input type="hidden" name="postcode" value={{$inputs['postcode']}} />
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">住所</p>
                    <div class="col-sm-8">
                        <p class="col-sm-12">{{$inputs['address']}}</p>
                        <input type="hidden" name="address" value={{$inputs['address']}} />
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">建物名</p>
                    <div class="col-sm-8">
                         <p class="col-sm-12">{{$inputs['building_name']}}</p>
                         <input type="hidden" name="building_name" value={{$inputs['building_name']}} />
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-4 col-form-label">ご意見</p>
                    <div class="col-sm-8">
                         <p class="col-sm-12">{{$inputs['opinion']}}</p>
                         <input type="hidden" name="opinion" value={{$inputs['opinion']}} />
                    </div>
                </div>
                <div class="text-center mt-1">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
                <div class="text-center mt-2">
                    <a href="javascript:history.back()">修正する</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>