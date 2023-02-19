<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ管理システム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<script language="javascript" type="text/javascript">
        function OnLinkClick() {
            resetfullname = document.getElementById("fullname");
            resetfullname.value='';

            resetgender = document.getElementById("gender");
            resetgender.checked=true;

            resetfrom = document.getElementById("createdDateFrom");
            resetfrom.value='';

            resetto = document.getElementById("createdDateTo");
            resetto.value='';

            resetemail = document.getElementById("email");
            resetemail.value='';

            return false; 
        }
    </script>
<style>
    .header{
        font-size: 2rem;
        font-weight: bold;
    }
    .table th{
        border:none;
    }
    .seachbtn{
        width: 10rem;
    }
</style>
<body>
    <div class="container">
        <h3 class="text-center mt-4 mb-4">管理システム</h3>
        <div class="container">
            <form action="/search" method="get">
                @csrf 
                <div class="row form-group">
                    <!-- お名前-->
                    <label class="col-sm-2 col-form-label">お名前</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="fullname" id="fullname" value={{ old('fullname', $inputs['fullname']) ;}}>
                    </div>
                    <!-- 性別-->
                    <div class="col-sm-6">
                        @if($inputs['gender'] == '0')
                            <input type="radio" name="gender" value="0" id="gender" checked>全て
                        @else
                            <input type="radio" name="gender" value="0" id="gender">全て
                        @endif;
                        @if($inputs['gender'] == '1')
                            <input type="radio" name="gender" value="1" checked>男性
                        @else
                            <input type="radio" name="gender" value="1">男性
                        @endif;
                        @if($inputs['gender'] == '2')
                            <input type="radio" name="gender" value="2" checked>女性
                        @else
                            <input type="radio" name="gender" value="2">女性
                        @endif;
                    </div>
                </div>
                <div class="row form-group">
                    <!-- 登録日-->
                    <label for="inputDate" class="col-sm-2 col-form-label">登録日</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="createdDateFrom"  id="createdDateFrom" value="{{ old('createdDateFrom', $inputs['createdDateFrom']) ;}}">
                    </div>
                    <div class="col-sm-6">
                        <div class="row form-group">
                            <div class="col-sm-1"><p>~</P></div>
                            <div class="col-sm-8">
                                <input type="date" class="form-control ml-0" name="createdDateTo" id="createdDateTo" value="{{ old('createdDateTo', $inputs['createdDateTo']);}}">
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <!-- メールアドレス-->
                    <label for="inputFullname" class="col-sm-2 col-form-label">メールアドレス</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="email" name="email" id="email" value="{{ old('email', $inputs['email']) ;}}">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn seachbtn btn-primary">検索</button>
                </div>
                <div class="text-center mb-4 mt-3">
                    <a href="javascript:OnLinkClick();">リセット</a>
                </div>
            </form>

            <!-- Contact一覧 -->
            <div id="outputlist">
                <div class="row" >
                    <div class="col-sm-7 text-info">
                        @if (count($contacts) >0)
                            <p>全{{ $contacts->total() }}件中 
                            {{  ($contacts->currentPage() -1) * $contacts->perPage() + 1}} -  {{ (($contacts->currentPage() -1) * $contacts->perPage() + 1) + (count($contacts) -1)  }}件のデータが表示されています。</p>
                        @else
                            <p>データがありません。</p>
                        @endif 
                    </div>
                    <div class="col-sm-5">{{ $contacts->appends($inputs)->links('pagination::bootstrap-4') }}</div>
                </div>
            @if($contacts != null && count ($contacts) > 0 )      
                <table class="table text-nowrap">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">お名前</th>
                        <th scope="col">性別</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">ご意見</th>
                        <th scope="col"></th>
                    </tr>
                <tbody>  
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->fullname}}</td>
                            <td>
                                @if($contact->gender ==1)
                                    <p>男性</p>
                                @else
                                    <p>女性</p>
                                @endif
                            </td>
                            <td>{{$contact->email}}</td>
                            <td title ="{{$contact->opinion}}">{{ Str::limit($contact->opinion, 50, '...') }}</td>
                            <td>
                                <!-- 削除-->
                                <form action="/delete" method="post">
                                @csrf
                                    <td>
                                        <input type="hidden" name="id" value="{{$contact->id}}">
                                        <button type="submit" class="btn btn-warning">削除</button>
                                    </td>
                                </form>
                                <!-- End 削除-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
        </div>
    </body>
</html>