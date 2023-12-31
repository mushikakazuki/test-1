@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品変更画面</h2>
        </div>
</div>

<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                ID:{{ $product->id }}  
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                商品画像:
                @if($product->image)
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="商品画像" class="img-thumbnail" id="image-preview">
                @else
                    <p>画像なし</p>
                @endif
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <input type="file" name="image" class="form-control" id="image" placeholder="商品画像">
        </div>


        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                商品名:
                <input type="text" name="syouhinmei" value="{{$product->syouhinmei}}" class="form-control" placeholder="商品名">
                @error('syouhinmei')
                <span style="color:red;">商品名を入力してください。</span>
                @enderror
            </div>
        </div>
      
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                価格:
                <input type="text" name="kakaku" value="{{$product->kakaku}}" class="form-control" placeholder="価格">
                @error('kakaku')
                <span style="color:red;">価格を入力してください。</span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                在庫数:
                <input type="text" name="zaikosuu" value="{{$product->zaikosuu}}" class="form-control" placeholder="在庫数">
                @error('zaikosuu')
                <span style="color:red;">在庫数を入力してください。</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                メーカー名:
                <select name="company_name" class="form-select">    
                    <option value="0">メーカー名</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" @if($company->id == $product->company_name) selected @endif>
                            {{ $company->company_name }}
                        </option>
                    @endforeach
                </select>
                @error('company_name')
                    <span style="color: red;">メーカーを選択してください。</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                コメント:
                <input type="text" name="comment" value="{{$product->comment}}" class="form-control" placeholder="コメント">
                @error('comment')
                <span style="color:red;">コメントを入力してください。</span>
                @enderror
            </div>
        </div>
       

        <div class="col-12 mb-2 mt-2">
            <button type="submit" class="btn btn-primary">変更</button>
            <a class="btn btn-success" href="{{ route('product.show', $product->id) }}?page_id={{$page_id}}">戻る</a>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#image').change(function() {
            var input = this;
            var url = URL.createObjectURL(input.files[0]);
            $('#image-preview').attr('src', url);
        });
    });
</script>

@endsection