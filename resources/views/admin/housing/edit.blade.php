@extends('admin.layouts.master')

@section('title','Housing')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'housing.edit')
    <form role="form" action="{{ route('housing.update',['housing'=>$housing->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
    <form role="form" action="{{ route('housing.store') }}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" value="{{old('title') ?? $housing->title ?? ''}}">
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="custom-control custom-select" name="type_id">
                    <option class="custom-control-input" value="0" {{empty($housing->type_id) ? 'selected=""' : ''}}>Select Type</option>
                    @if (!empty($types))
                        @foreach ($types as $type)
                        <option class="custom-control-input" value="{{$type->id}}" {{(!empty($housing->type_id) && $housing->type_id === $type->id || old('type_id') == $type->id) ? 'selected=""' : ''}}>{{$type->type}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label>Rate</label>
                <input type="text" class="form-control" placeholder="Rate" name="rate" value="{{old('rate') ?? $housing->rate ?? ''}}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea id="description" class="form-control" name="description" rows="5" cols="80">{{old('description') ?? $housing->description ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label>Meta Title</label>
                <textarea class="form-control" name="meta_title" rows="5" cols="80">{{old('meta_title') ?? $housing->meta_title ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label>Meta Description</label>
                <textarea id="meta_description" class="form-control" name="meta_description" rows="5" cols="80">{{old('meta_description') ?? $housing->meta_description ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label>Meta Keyword</label>
                <input class="form-control" name="meta_keyword" value="{{old('meta_keyword') ?? $housing->meta_keyword ?? ''}}"/>
            </div>
            <div class="form-group">
                <label>Location</label>
                <select class="custom-control custom-select" name="location_id">
                    <option class="custom-control-input" value="0" {{empty($housing->location_id) ? 'selected=""' : ''}}>Select Location</option>
                    @if (!empty($locations))
                        @foreach ($locations as $location)
                        <option class="custom-control-input" value="{{$location->id}}" {{(!empty($housing->location_id) && $housing->location_id === $location->id || old('location_id') == $location->id) ? 'selected=""' : ''}}>{{$location->location}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label>Bedrooms</label>
                <input type="number" class="form-control" placeholder="Bedrooms" name="bedrooms" value="{{old('bedrooms') ?? $housing->bedrooms ?? 0}}" min="0">
            </div>
            <div class="form-group">
                <label>Persons</label>
                <input type="number" class="form-control" placeholder="Persons" name="persons" value="{{old('persons') ?? $housing->persons ?? 0}}" min="0">
            </div>
            <div class="form-group">
                <label>Showers</label>
                <input type="text" class="form-control" placeholder="Showers" name="showers" value="{{old('showers') ?? $housing->showers ?? ''}}">
            </div>
            <div class="form-group">
                <label>Area</label>
                <input type="text" class="form-control" placeholder="Area" name="area" value="{{old('area') ?? $housing->area ?? ''}}">
            </div>
            <div class="form-group">
                <label>Postal Code</label>
                <input type="text" class="form-control" placeholder="Postal Code" name="postal_code" value="{{old('postal_code') ?? $housing->postal_code ?? ''}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="button" id="get-lat-lng" disabled>Get Lat / Lng</button>
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input type="text" class="form-control" placeholder="Latitude" name="latitude" value="{{old('latitude') ?? $housing->latitude ?? ''}}">
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input type="text" class="form-control" placeholder="Longitude" name="longitude" value="{{old('longitude') ?? $housing->longitude ?? ''}}">
            </div>
            <div class="form-group">
                <label>Listed Date</label>
                <input type="text" class="form-control daterangepicker" placeholder="Listed Date" name="listed_date" value="{{old('listed_date') ?? $housing->listed_date ?? ''}}">
            </div>
            <div class="form-group">
                <label>Source URL</label>
                <input type="text" class="form-control" placeholder="Source URL" name="source_url" value="{{old('source_url') ?? $housing->source_url ?? ''}}">
            </div>
            @if (!empty($admins))
            <div class="form-group">
                <label>Partner</label>
                <select id="partner_select" class="custom-control custom-select" name="partner_id">
                    <option class="custom-control-input" value="" {{ empty($housing->partner_id) ? 'selected' : '' }}>Select Partner</option>
                    @foreach ($admins as $admin)
                    <option class="custom-control-input" value="{{ $admin->id }}" {{(!empty($housing->partner_id) && $housing->partner_id === $admin->id) || old('partner_id') == $admin->id ? 'selected' : ''}}>{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="form-group">
                <label>Status</label>
                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{(isset($housing) && $housing->is_active) || old('is_active') == "1" ? 'checked' : ''}}>
                        <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{(!isset($housing) || !$housing->is_active) && empty(old('is_active') || old('is_active') == "0") ? 'checked' : ''}}>
                        <label for="inactive" class="custom-control-label">Inactive</label>
                    </div>
                </div>
<!--                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="is_active" value="1" name="is_active" {{isset($housing) && $housing->is_active ? 'checked' : ''}}>
                        <label for="is_active" class="custom-control-label">Active</label>
                    </div>
                </div>-->
            
                <div class="form-group">
                    <label>Image</label>

                    @if (old('images'))
                        <ul class="list-inline">
                            @foreach (old('images') as $image)
                            <li class="img-wrap">
                                <img class="img-responsive" src="{{$image}}" alt="" style="max-width:100px;">
                                <input type="hidden" name="images[]" value="{{$image}}"/>
                            </li>
                             @endforeach
                        </ul>
                    @endif

                    @if (isset($housing->images))
                    <ul class="list-inline" id="sortable" style="list-style: none;">
                        @php
                            $images = $housing->images->sortBy('order');
                        @endphp
                        @foreach ($images as $housing)
                        <li id="image-<?= $housing->id ?>" class="img-wrap" data-id="{{$housing->id}}">
                            <span class="close remove-image" data-id="{{$housing->id}}">&times;</span>
                            <img class="img-responsive" src="{{$housing->image_url}}" alt="" style="max-width:100px;">
                        </li>
                         @endforeach
                    </ul>
                    @endif

                    <input type="hidden" class="form-control" id="removeImagesIds" name="remove_image_ids" value="">

                    <div class="dropzone" id="imageDropzone">
                        <div id="imageDropzonePreview"></div>
                    </div>
                </div>
                <span id="locationImages"></span>
                
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-info" href="{{ route('housing.index') }}">Cancel</a>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </form>
</div>

@endsection

@section('script')
    <script src="{{asset('assets/admin/js')}}/pages/housing_edit.js"></script>
@endsection