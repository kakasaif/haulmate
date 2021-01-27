@extends('admin.layouts.master')

@section('title','Housing Detail')

@section('content')
<div class="card ">
    <div class="card-body">
        <strong>Title</strong>
        <p class="text-muted">{{$housing->title ?? '-'}}</p>
        <hr>

        <strong>Type</strong>
        <p class="text-muted">{{$type->type ?? '-'}}</p>
        <hr>

        <strong>Rate</strong>
        <p class="text-muted">{{$housing->rate ?? '-'}}</p>
        <hr>

        <strong>Description</strong>
        <p class="text-muted">{!! $housing->description ?? '-' !!}</p>
        <hr>

        <strong>Meta Title</strong>
        <p class="text-muted">{{$housing->meta_title ?? '-'}}</p>
        <hr>

        <strong>Meta Description</strong>
        <p class="text-muted">{{$housing->meta_description ?? '-'}}</p>
        <hr>

        <strong>Meta Keyword</strong>
        <p class="text-muted">{{$housing->meta_keyword ?? '-'}}</p>
        <hr>

        <strong>Location</strong>
        <p class="text-muted">{{$location->location ?? '-'}}</p>
        <hr>

        <strong>Bedrooms</strong>
        <p class="text-muted">{{$housing->bedrooms ?? '-'}}</p>
        <hr>

        <strong>Persons</strong>
        <p class="text-muted">{{$housing->persons ?? '-'}}</p>
        <hr>

        <strong>Showers</strong>
        <p class="text-muted">{{$housing->showers ?? '-'}}</p>
        <hr>

        <strong>Area</strong>
        <p class="text-muted">{{$housing->area ?? '-'}}</p>
        <hr>

        <strong>Postal Code</strong>
        <p class="text-muted">{{$housing->postal_code ?? '-'}}</p>
        <hr>

        <strong>Latitude</strong>
        <p class="text-muted">{{$housing->latitude ?? '-'}}</p>
        <hr>

        <strong>Longitude</strong>
        <p class="text-muted">{{$housing->longitude ?? '-'}}</p>
        <hr>

        <strong>Listed Date</strong>
        <p class="text-muted">{{$housing->listed_date ?? '-'}}</p>
        <hr>

        <strong>Source URL</strong>
        <p class="text-muted">{{$housing->source_url ?? '-'}}</p>
        <hr>

        <strong>Partner</strong>
        <p class="text-muted">{{empty($admin->name) ? '-' : $admin->name}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$housing->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>
        
        <strong>Photos</strong>
        @if (isset($housing->images))
        <ul class="list-inline">
            @php
                $images = $housing->images->sortBy('order');
            @endphp
            @foreach ($housing->images as $image)
            <li id="image-<?= $image->id ?>" class="img-wrap" data-id="{{$image->id}}">
                <img class="img-responsive" src="{{$image->image_url}}" alt="" style="max-width:100px;">
            </li>
             @endforeach
        </ul>
        @endif
        <hr>

        <a href="{{route('housing.edit',['housing'=>$housing->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection