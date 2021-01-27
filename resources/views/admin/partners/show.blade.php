@extends('admin.layouts.master')

@section('title','Product Details')
@section('content')
<div class="card ">
    <div class="card-body">
        <strong>ID</strong>
        <p class="text-muted">{{$partner->id ?? '-'}}</p>
        <hr>

        <strong>Title</strong>
        <p class="text-muted">{{$partner->title ?? '-'}}</p>
        <hr>

        <strong>Subtitle</strong>
        <p class="text-muted">{{$partner->subtitle ?? '-'}}</p>
        <hr>

        <strong>Category</strong>
        <p class="text-muted">{{$partner->category ?? '-'}}</p>
        <hr>

        <strong>Icon Url</strong>
        @if (empty($partner->icon_url))
        <p class="text-muted">-</p>
        @else
        <img class="img-responsive" src="{{$partner->icon_url}}" alt="" style="max-width:100px;">
        @endif
        <hr>

        <strong>Banner Url</strong>
        @if (empty($partner->banner_url))
        <p class="text-muted">-</p>
        @else
        <img class="img-responsive" src="{{$partner->banner_url}}" alt="" style="max-width:100px;">
        @endif
        <hr>

        <strong>Banner Title</strong>
        <p class="text-muted">{{$partner->banner_title ?? '-'}}</p>
        <hr>

        <strong>Banner Subtitle</strong>
        <p class="text-muted">{{$partner->banner_subtitle ?? '-'}}</p>
        <hr>

        <strong>Banner Button</strong>
        <p class="text-muted">{{$partner->banner_button ?? '-'}}</p>
        <hr>

        <strong>Banner Action</strong>
        <p class="text-muted">{{$partner->banner_action ?? '-'}}</p>
        <hr>

        <strong>Body</strong>
        <p class="text-muted">
            {!!$partner->body ? html_entity_decode(htmlentities($partner->body)) : '-'!!}
        </p>
        <hr>

        <strong>Button Text</strong>
        <p class="text-muted">{{$partner->button_text ?? '-'}}</p>
        <hr>

        <strong>Action</strong>
        <p class="text-muted">{{$partner->action ?? '-'}}</p>
        <hr>

        <strong>Type</strong>
        <p class="text-muted">{{$partner->type ?? '-'}}</p>
        <hr>

        @if(empty($partner->type) || $partner->type === 'affiliate')
        <strong>Meta Description</strong>
        <p class="text-muted">{{$partner->meta_description ?? '-'}}</p>
        <hr>

        <strong>Meta Keyword</strong>
        <p class="text-muted">{{$partner->meta_keyword ?? '-'}}</p>
        <hr>
        @endif

        <strong>Order</strong>
        <p class="text-muted">{{$partner->order ?? '-'}}</p>
        <hr>

        <strong>Partner</strong>
        <p class="text-muted">{{empty($admin->name) ? '-' : $admin->name}}</p>
        <hr>

        <strong>Status</strong>
        <p class="text-muted">{{$partner->is_active ? 'Active' : 'Inactive'}}</p>
        <hr>

        <strong>Created at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($partner->created_at)) ?? '-' }}</p>
        <hr>

        <strong>Updated at</strong>
        <p class="text-muted">{{date('F j, Y, g:i a' , strtotime($partner->updated_at)) ?? '-' }}</p>
        <hr>

        <a href="{{route('partners.edit',['partner'=>$partner->id])}}" class="btn btn-primary btn-block"><b>Edit</b></a>
    </div>
</div>
@endsection