@extends('admin.layouts.master')

@section('title', $title ?? 'Edit Product Wizard')

@section('content')
<form role="form" action="{{ route('product_detail.wizard.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" id="product_id" value="{{$product->id}}"/>
    <section class="add">
        @foreach ($sections as $section)
        <div class="row blockRow">
            <div class="block col-12">
                <div class="form-group">
                    <label class="col-12">Section "{{$section->name}}"</label>
                </div>
            </div>
            <div class="col-11 offset-1">
                <div class="innerRows">
                    @foreach ($section->items as $section_item)
                    <div class="innerRow">
                        <div class="row align-items-end block-text">
                            <div class="block col-12">
                                <div class="form-group col-12">
                                    <label class="col-12">{{$section_item->name}}</label>
                                </div>
                            </div>
                            <div class="block col-12">
                                <div class="form-group col-12">
                                    <button type="cancel" class="tick btn btn-default"><span class="ok"></span></button>
                                    <button type="cancel" class="cross btn btn-default"><span class="cancel"></span></button>
                                    <input class="form-control item_value" name="item_values[{{$section_item->id}}]" value="{{$details[$section_item->id]->name ?? ''}}" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <div class="card-footer">
        <a class="btn btn-info" href="{{ $back_link }}">Back</a>
        <button type="submit" class="btn btn-primary float-right">Save</button>
    </div>
</form>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.tick').on('click', function (e) {
            e.preventDefault();
            $(this).siblings(".item_value").val('<span class="ok"></span>');
        });

        $('.cross').on('click', function (e) {
            e.preventDefault();
            $(this).siblings(".item_value").val('<span class="cancel"></span>');
        });
    });
</script>
@endsection