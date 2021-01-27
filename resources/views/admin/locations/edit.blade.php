@extends('admin.layouts.master')

@section('title','Locations')

@section('content')
<div class="card card-primary">
    @if (Route::currentRouteName() == 'locations.edit')
    <form role="form" action="{{ route('locations.update',['location'=>$location->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @else
        <form role="form" action="{{ route('locations.store') }}" method="POST" enctype="multipart/form-data">
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

                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="details-tab" href="#">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="preferences-tab" href="#">Preferences</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" placeholder="Location" name="location" value="{{old('location') ?? $location->location ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" value="{{old('title') ?? $location->title ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="5" cols="80">{{old('short_description') ?? $location->short_description ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" cols="80">{{old('description') ?? $location->description ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Title</label>
                                <textarea class="form-control" name="meta_title" rows="5" cols="80">{{old('meta_title') ?? $location->meta_title ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="5" cols="80">{{old('meta_description') ?? $location->meta_description ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <input class="form-control" name="meta_keyword" value="{{old('meta_keyword') ?? $location->meta_keyword ?? ''}}"/>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" placeholder="Latitude" name="latitude"  value="{{old('latitude') ?? $location->latitude ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" placeholder="Longitude" name="longitude" value="{{old('longitude') ?? $location->longitude ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Schools</label>
                                <input type="number" class="form-control" placeholder="Schools" name="schools" value="{{old('schools') ?? $location->schools ?? 0}}" min="0">
                            </div>
                            <div class="form-group">
                                <label>Supermarkets</label>
                                <input type="number" class="form-control" placeholder="Supermarkets" name="supermarkets" value="{{old('supermarkets') ?? $location->supermarkets ?? 0}}" min="0">
                            </div>
                            <div class="form-group">
                                <label>Restaurants</label>
                                <input type="number" class="form-control" placeholder="Restaurants" name="restaurants" value="{{old('restaurants') ?? $location->restaurants ?? 0}}" min="0">
                            </div>
                            <div class="form-group">
                                <label>Parks</label>
                                <input type="number" class="form-control" placeholder="Parks" name="parks" value="{{old('parks') ?? $location->parks ?? 0}}" min="0">
                            </div>
                            <div class="form-group">
                                <label>Source URL</label>
                                <input type="text" class="form-control" placeholder="Source URL" name="source_url" value="{{old('source_url') ?? $location->source_url ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="active" value="1" name="is_active" {{(isset($location) && $location->is_active) || old('is_active') == "1" ? 'checked' : ''}}>
                                        <label for="active" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="inactive" value="0" name="is_active" {{(!isset($location) || !$location->is_active) && empty(old('is_active') || old('is_active') == "0") ? 'checked' : ''}}>
                                        <label for="inactive" class="custom-control-label">Inactive</label>
                                    </div>
                                </div>
<!--
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="is_active" value="1" name="is_active" {{isset($location) && $location->is_active ? 'checked' : ''}}>
                                        <label for="is_active" class="custom-control-label">Active</label>
                                    </div>
                                </div>
-->
                            </div>

                            @if (isset($location))
                            <ul id="sortable" style="list-style: none;">
                                @php
                                    $images = $location->images->sortBy('order');
                                @endphp
                                @foreach ($images as $location)
                                <li id="image-<?= $location->id ?>" class="img-wrap" data-id="{{$location->id}}">
                                    <span class="close remove-image" data-id="{{$location->id}}">&times;</span>
                                    <img class="img-responsive" src="{{$location->image_url}}" alt="" style="max-width:100px;">
                                </li>
                                 @endforeach
                            </ul>
                            @endif
                            
                            <input type="hidden" class="form-control" id="removeImagesIds" name="remove_image_ids" value="{{old('remove_image_ids') ?? ''}}">

                            {{-- <button id="save" class="btn btn-primary">Save image order</button>         --}}

                            <div class="form-group">
                                <label>Image</label>
                                <div class="dropzone" id="imageDropzone">
                                    <div id="imageDropzonePreview"></div>
                                </div>
                            </div>
                            <span id="locationImages"></span>
                            

                        </div>
                        <div class="tab-pane fade" id="preferences" role="tabpanel" aria-labelledby="preferences-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                  <div class="card">
                                    <div class="card-body">
                                      <table class="table table-bordered data-table" id="score">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Preference</th>
                                            <th>Score</th>
                                            <th width="200px">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                    </div>
                              
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <a class="btn btn-info" href="{{ route('locations.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </div>
        </form>
         <!-- Modal -->
        <div class="modal fade" id="edit_preference" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit score</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form id="scores-update">
                        @csrf
                    <div class="form-group">
                        <label>Scores</label>
                        <input type="number" class="form-control scores" placeholder="Scores" name="score" min="0" max="5">
                        <input type="hidden" class="id" name="id">
                        <input type="hidden" value="{{$location->id ?? ''}}" name="location_id">
                        <input type="hidden" class="id_reference" name="id_reference">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-scores">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        </div>
@endsection

@section('css')
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#details-tab').on('click', function(e){
            $('#preferences-tab').removeClass('active');
            $(this).addClass('active');
            $('#preferences').removeClass('show active');
            $('#details').addClass('show active');
        });

        $('#preferences-tab').on('click', function(e){
            $('#details-tab').removeClass('active');
            $(this).addClass('active');
            $('#details').removeClass('show active');
            $('#preferences').addClass('show active');
        });
        
            let $modal = $('#edit_preference');

            // show the modal when delete button clicked
            $('#score').on('click', '.edit-modal' ,function(e){
            e.preventDefault();
            var id = $(this).data('id'),
                value = $(this).data('score')
                reference = $(this).data('id_reference');
            $('.id_reference').val(reference);
            $('.scores').val(value);
            $('.id').val(id);
            $modal.modal('show');
            });
            $('.scores').on('input',function(){
                if($(this).val() > 5){
                    $(this).val('');
                }
            });
            $('#save-scores').on('click',function(){
              var data = $('#scores-update').serialize(),
                  url  = "{{route('get_score')}}"
              $.ajax({
                 url: url,
                 data:data,
                 method:'POST',
                 success:function(result){
                     table.draw();
                     $modal.modal('hide');
                 }
              });
              console.log(url);
            });
            
            var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('locations.scores',['location'=>$location->id ?? 0]) }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'preference', name: 'preference'},
                {data: 'score', name: 'score',defaultContent: "0"},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        var successCallback = function(file, response) {
            $("#locationImages").append(`<input type="hidden" name="images[]" value="${response.image_url}"/>`);
                                
        }
        dropzoneInit("#imageDropzone", "portal/ajax/upload/location-image", successCallback, true);   

        $('.remove-image').on('click', function() {
            var id = $(this).data('id');
            var $remove_images_ids = $("#removeImagesIds");
            if ($remove_images_ids.val().length > 0) {
                var image_ids = $remove_images_ids.val().split(",");
            } else {
                var image_ids = [];
            }
            image_ids.push($(this).data('id'));
            $remove_images_ids.val(image_ids.join(","));
            $(`.img-wrap[data-id="${id}"]`).remove();
        });

        $("#sortable").sortable({
            revert: 100,
            placeholder: 'placeholder',
            update: function(event,ui) {
                var sortable_data = $("#sortable").sortable('serialize'); 

                $.ajax({ 
                    data: sortable_data,
                    type: 'POST',
                    url: `${base_url}/portal/ajax/location/reorder-location-images`, // save.php - file with database update
                });  
             }
            });
        $("#sortable").disableSelection();

        $('#save').on('click', function(e){
            e.preventDefault(); 
                
        });

    });
</script>

@endsection