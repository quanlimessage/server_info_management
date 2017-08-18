@extends('admin.master')
@section('content')
<main id="main">
    <form action="" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table_fix">
            <caption>List product</caption>
            <thead>
            <tr>
                <th>check</th>
                <th>Product</th>
                <th>Price</th>
            </tr>
        </thead>
            <tbody>
            @foreach($product_data as $val)
            <tr>
                <td><input type="radio" name="id" id="id" value="{!! $val['id'] !!}"></td>
                <td>{!! $val["name"] !!}</td>
                <td>{!! $val["price"] !!}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td><input type="text" class="form-control" name="name" id="name"></td>
                <td><input type="text" class="form-control" name="price" id="price"></td>
            </tr>
        </tbody>
        </table>
        <div class="table-end">
            <input type="submit" class="btn btn-primary" value="add" onclick="javascript: form.action='Add';" name="action" id="check">
            <input type="submit" class="btn btn-primary" value="update" onclick="javascript: form.action='Update';" name="action" id="check2">
            <input type="submit" class="btn btn-primary" value="delete" onclick="javascript: form.action='Delete';" name="action" id="check3">
        </div>
    </form>
</main>
@endsection