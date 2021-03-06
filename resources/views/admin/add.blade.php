@extends('admin.master')
@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background: #3f9ae5">{{ __('Add New Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="add" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('productName') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('productName') ? ' is-invalid' : '' }}" name="productName" value="{{ old('productName') }}" required autofocus>

                                @if ($errors->has('productName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Product Price" class="col-md-4 col-form-label text-md-left">{{ __('productPrice') }}</label>

                            <div class="col-md-6">
                                <input id="Product Price" type="number" class="form-control{{ $errors->has('productPrice') ? ' is-invalid' : '' }}" name="productPrice" value="{{ old('Product Price') }}" required>

                                @if ($errors->has('productPrice'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productPrice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productAddress" class="col-md-4 col-form-label text-md-left">{{ __('where you bought it') }}</label>

                            <div class="col-md-6">
                                <input id="productAddress" type="text" class="form-control{{ $errors->has('productAddress') ? ' is-invalid' : '' }}" name="productAddress" value="{{ old('productAddress') }}" required autofocus>

                                @if ($errors->has('productAddress'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productDescription" class="col-md-4 col-form-label text-md-left">{{ __('Product Description') }}</label>
                            <div class="col-md-6">
                                <input id="productDescription" type="text" class="form-control{{ $errors->has('productDescription') ? ' is-invalid' : '' }}" name="productDescription" value="{{ old('productDescription') }}" required autofocus>
                                @if ($errors->has('productDescription'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productDescription') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productImage" class="col-md-4 col-form-label text-md-left">{{ __('Image for Product') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control{{ $errors->has('productImage') ? ' is-invalid' : '' }}" name="productImage" value="" id="productImage" >
                                {{--<input id="productImage" type="file" value="Abload File" class="form-control{{ $errors->has('productImage') ? ' is-invalid' : '' }}" name="productImage" required autofocus>--}}
                                @if ($errors->has('productImage'))
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('productImage') }}</strong>
                                                                         </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row  ">
                            <label for="type" class="col-md-4 col-form-label text-md-left"></label>
                            <div class="col-md-6 ">

                                <label for="sel1">Category Name:</label>
                                <span class="form-group" name="catname">
                                    <select class="form-control" id="sel1" name="catname">
                                        @foreach($catName as $catname)
                                        <option name="catname" >{{$catname->categoryName}}</option>
                                        @endforeach
                                    </select>

                                </span>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

