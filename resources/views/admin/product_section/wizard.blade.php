@extends('admin.layouts.master')

@section('title', $title ?? 'Category Wizard')

@section('content')
<div class="row blockRow template" style="display:none">
    <div class="col-md-10">
        <div class="block">
            <div class="form-group">
                <label>Section</label>
                <select class="form-control section_select_template" placeholder="Section name" name="sections[0]" value="0" required>
                    <option></option>
                </select>
            </div>

            
        </div>
    </div>
    <div class="col-md-2 text-right">
        <div class="buttons">
            <button type="button" class="btn btn-success blockAdd">+</button>
            <button type="button" class="btn btn-danger blockRemove">-</button>
        </div>
    </div>
    <div class="col-11 offset-1">
        <div class="innerRows">
            <div class="innerRow">
                <div class="row align-items-end block-text">
                    <div class="col-10">
                        <div class="form-group">
                            <label>Item</label>
                            <select class="form-control section_item_select_template" name="section_items[0][]" value="0" required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="buttons item_buttons">
                            <button type="button" class="btn btn-success blockTextAdd" data-section="0">+</button>
                            <button type="button" class="btn btn-danger blockTextRemove">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="innerRowTemplate" style="display:none">
    <div class="row align-items-end block-text">
        <div class="col-10">
            <div class="form-group">
                <label>Item</label>
                <select class="form-control section_item_select_template" name="section_items[0][]" value="0" required>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="buttons item_buttons">
                <button type="button" class="btn btn-success blockTextAdd" data-section="0">+</button>
                <button type="button" class="btn btn-danger blockTextRemove">-</button>
            </div>
        </div>
    </div>
</div>

<form role="form" action="{{ route('category_sections.wizard.update', ['product_category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" id="category_id" value="{{$category->id}}"/>
    <section class="add">
        
        @php
        $max_section_id = 0;
        @endphp
        @if (empty($sections))
            <div class="row blockRow">
                <div class="col-10">
                    <div class="block">
                        <div class="form-group">
                            <label>Section</label>
                            <select class="form-control section_select" placeholder="Section name" name="sections[0]" value="" required></select>
                        </div>

                        
                    </div>
                </div>
                <div class="col-2 text-right">
                    <div class="buttons">
                        <button type="button" class="btn btn-success blockAdd">+</button>
                        <button type="button" class="btn btn-danger blockRemove">-</button>
                    </div>
                </div>
                <div class="col-11 offset-1">
                    <div class="innerRows">
                        <div class="innerRow">
                            <div class="row align-items-center block-text">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Item</label>
                                        <select class="form-control section_item_select" name="section_items[0][]" value="" required></select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="buttons item_buttons">
                                        <button type="button" class="btn btn-success blockTextAdd" data-section="0">+</button>
                                        <button type="button" class="btn btn-danger blockTextRemove">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        @else
            @foreach ($sections as $section)
            @if ($section->id > $max_section_id)
                @php
                $max_section_id = $section->id;
                @endphp
            @endif
            <div class="row blockRow">
                <div class="col-10">
                    <div class="block">
                        <div class="form-group">
                            <label>Section</label>
                            <select class="form-control section_select" placeholder="Section name" name="sections[{{$section->id}}]" value="" required>
                                @if (!empty($section->name))
                                <option value="{{$section->name}}" selected="">{{$section->name}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-2 text-right">
                    <div class="buttons">
                        <button type="button" class="btn btn-success blockAdd">+</button>
                        <button type="button" class="btn btn-danger blockRemove">-</button>
                    </div>
                </div>
                <div class="col-11 offset-1">
                    <div class="innerRows">
                        @foreach ($section->items as $section_item)
                        <div class="innerRow">
                            <div class="row align-items-end block-text">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Item</label>
                                        <select class="form-control section_item_select" name="section_items[{{$section->id}}][]" value="" required>
                                            @if (!empty($section_item->name))
                                            <option value="{{$section_item->name}}" selected="">{{$section_item->name}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="buttons item_buttons">
                                        <button type="button" class="btn btn-success blockTextAdd" data-section="{{$section->id}}">+</button>
                                        <button type="button" class="btn btn-danger blockTextRemove">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </section>

    <input type="hidden" id="max_section_id" value="{{$max_section_id}}"/>

    <div class="card-footer">
        <a class="btn btn-info" href="{{ $back_link }}">Back</a>
        <button type="submit" class="btn btn-primary float-right">Save</button>
    </div>
</form>
@endsection

@section('script')
<script>
    function init_select(elem, title, url) {
        $(elem).each(function( index, element ) {
            if ($(this).hasClass("select2-hidden-accessible")) {
                $(this).select2('destroy');
            }
            $(this).select2({
                placeholder: 'Choose or add ' + title + ' name',
                allowClear: true,
                ajax: {
                    url: url,
                    data: function (params) {
                        var query = {search: params.term}
                        return query;
                    },
                    dataType: 'json'
                }
            });
        });

        // drag & drop
        $( "section.add" ).sortable({
            placeholder: "ui-state-highlight"
        });
        $( "section.add" ).disableSelection();

        $( "section.add .innerRows" ).sortable({
            placeholder: "ui-state-highlight"
        });
        $( "section.add .innerRows" ).disableSelection();
    }

    $(document).ready(function () {
        $('body').on('click', '.blockTextAdd', function(e) {
            e.preventDefault();
            var section_id = $(this).data('section');
            $('.innerRowTemplate').clone().insertAfter($(this).parents('.innerRow'));
            $(this).parents('.innerRows')
                .find('.innerRowTemplate .section_item_select_template')
                .attr('name', 'section_items[' + section_id + '][]')
                .addClass('section_item_select')
                .removeClass('section_item_select_template')
                .html('');
            var buttons = $(this).parent().html();
            $(this).parents('.innerRows')
                .find('.innerRowTemplate .item_buttons')
                .html(buttons);
            $(this).parents('.innerRows')
                .find(".innerRowTemplate")
                .addClass('innerRow')
                .removeClass('innerRowTemplate')
                .show();
            init_select('.section_item_select', 'section item', '{{route("get_items")}}');
        });

        $('body').on('click', '.blockTextRemove', function(e) {
            e.preventDefault();
            $(this).parents('.innerRow').remove();
        });

        $('body').on('click', '.blockAdd', function(e) {
            e.preventDefault();
            $('.template').clone().appendTo( 'section.add');
            var max_section_id = parseInt($('#max_section_id').val()) + 1;
            $('#max_section_id').val(max_section_id);
            $(".blockRow:last-child .section_select_template")
                .attr('name', 'sections[' + max_section_id + ']')
                .addClass('section_select')
                .removeClass('section_select_template');
            $(".blockRow:last-child .section_item_select_template")
                .attr('name', 'section_items[' + max_section_id + '][]')
                .addClass('section_item_select')
                .removeClass('section_item_select_template');
            $('.blockRow:last-child .item_buttons')
                .html('<button type="button" class="btn btn-success blockTextAdd" data-section="' + max_section_id + '">+</button> ' +
                    '<button type="button" class="btn btn-danger blockTextRemove">-</button>');
            $(".blockRow:last-child").removeClass('template');
            $(".blockRow:last-child").show();
            
            init_select('.section_select', 'section', '{{route("get_sections")}}');
            init_select('.section_item_select', 'section item', '{{route("get_items")}}');
        })

        $('body').on('click', '.blockRemove', function(e) {
            e.preventDefault();
            $(this).parents('.blockRow').remove();
        })

        init_select('.section_select', 'section', '{{route("get_sections")}}');
        init_select('.section_item_select', 'section item', '{{route("get_items")}}');
    });
</script>

@endsection