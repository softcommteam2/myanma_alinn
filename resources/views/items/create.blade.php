@extends('admin.layouts.app')


@section('content')
<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Setup
        </li>
        <li class="breadcrumb-item">Items</li>
        <li class="breadcrumb-item active">Item Register</li>
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('items') }}" method="POST">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <i class="icon-note"></i> Item Register Form
                                        <div class="card-header-actions">
                                            <a class="card-header-action" href="{{ url('items') }}">
                                                <div class="btn btn-primary"><i class="fa fa-arrow-left"></i></div>
                                            </a>
                                        </div>
                                    </div>
                        <div class="card-body">
                            <form>
                            <fieldset>
                                <div style="display: none;">
                                    <label class="switch switch-label switch-success">
                                        <input type="hidden" name="status" value="0">
                                        <input class="switch-input" type="hidden" checked name="status" value="1">
                                    </label>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Item Name</label>
                                <div class="input-group border border-info rounded">
                                    <input class="form-control" id="name" type="text" required name="name">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Category</label>
                                <div class="input-group border border-info rounded">
                                    <select required class="form-control"  id="category-dropdown" name="category_id" >
                                        <option selected>Choose Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Item SKU</label>
                                <div class="input-group border border-info rounded">
                                    <select required class="form-control"  id="itemsku-dropdown" name="itemsku_id" ></select>
                                    </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Item Price</label>
                                <div class="input-group border border-info rounded">
                                    <input class="form-control" id="price" type="text" required name="price">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Cost Price</label>
                                <div class="input-group border border-info rounded">
                                    <input class="form-control" id="cost_price" type="text" required name="cost_price">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Brand</label>
                                <div class="input-group border border-info rounded">
                                    <input class="form-control" id="brand" type="text" required name="brand">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Item Stock Amount</label>
                                <div class="input-group border border-info rounded">
                                    <input class="form-control" id="stock_amount" type="text" required name="stock_amount">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Description</label>
                                <div class="input-group border border-info rounded">
                                    <input class="form-control" id="description" type="text" required name="description">
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="input-group">
                                </div>
                            </fieldset>
                            <fieldset class="form-group pull-right">
                                <input type="submit" value="Save" class="btn btn-success">
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.rowdd-->
        </div>
    </div>
</main>

@section('script')

<script src="{{ asset('asset/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            $("#itemsku-dropdown").html('');
            $.ajax({
                url:"api/items",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: '{{csrf_token()}}'
                },
                dataType : 'json',
                    success: function(result){
                        console.log(result);
                        $('#itemsku-dropdown').html('<option value="">Select ItemSKU</option>');
                        $.each(result,function(key,value){
                            $("#itemsku-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
            });
        });
    });
</script>
@endsection

@endsection


