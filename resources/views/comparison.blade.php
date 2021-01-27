@extends('layout.app')
@section('content')

<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$product_type->name}} Comparisons</li>
            </ol>
        </nav>
    </div>
</div>

<section class="comparison">
    <div class="container">
        @php
            $product_tab = Request::get('product');
        @endphp
        @if (count($product_type->product_category) > 1)
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach ($product_type->product_category as $category)
                        <a class="nav-item nav-link @if (($loop->first && empty($product_tab)) || $product_tab == Str::slug($category->name)) active @endif" id="{{Str::slug($category->name)}}-tab" data-toggle="tab" href="#{{Str::slug($category->name)}}" role="tab" aria-controls="{{Str::slug($category->name)}}" aria-selected="true">
                            <span class="icon"><img src="{{$category->image}}" alt=""></span>
                            <span class="title">{{$category->name}}</span>
                        </a>
                    @endforeach
                </div>
            </nav>
        @endif


        @if (!isset($_COOKIE['partner-deals']))
            <div class="alert alert-secondary" role="alert" id="dismiss-partner-deals">
                Scroll to the right to see all of our partner deals
                <a href="#" class="close">
                    <img src="{{asset('assets/img/close-topic.svg')}}" alt="" aria-label="Close">
                </a>
            </div>
        @endif

          <div class="tab-content" id="nav-tabContent">
            <?php $indexNumber = 0; ?>
            @foreach ($product_type->product_category as $category)
                <div class="tab-pane fade show @if (($loop->first && empty($product_tab)) || $product_tab == Str::slug($category->name)) active @endif" id="{{Str::slug($category->name)}}" role="tabpanel" aria-labelledby="{{Str::slug($category->name)}}-tab">
                    <div name="myElements<?php echo $indexNumber; ?>" class="syncscroll comparison__promo <?php if (count($category->product) >= 2) { echo 'with-scroll';}  ?>">
                        <div class="comparison__promo--item empty"></div>
                        @foreach ($category->product as $product)
                            <div class="comparison__promo--item">
                                <div>
                                    <div class="poster">
                                        <img src="{{$product->image}}" alt="">
                                    </div>
                                    <div class="right">
                                        <span class="title">{{$product->name}}</span>
                                        <span class="price">{{$product->subtitle}}</span>
                                    </div>
                                </div>
                                @if ($product_type->name == "Banks")
                                    <a href="{{$product->action_url}}" class="btn" target="_blank">Learn More</a>
                                @else
                                    <a href="{{$product->action_url}}" class="btn" target="_blank">Buy Now</a>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    @php
                        $section_items = array();
                    @endphp
                    @foreach ($category->product as $product)
                        @php
                            $section_items[] = $product->detail->groupBy('section_item_id')
                        @endphp
                    @endforeach
                    @if (empty($section_items))
                        @php
                            $section_items = array_fill(0, count($category->product), []);
                        @endphp
                    @endif
                  
                    <div class="comparison__table <?php if (count($category->product) >= 2) { echo 'with-scroll';}  ?>">
                        @foreach ($category->product_section as $section)
                        <div class="comparison__table--item @if ($loop->first) active @else active @endif">
                            <span class="comparison__table--header">{{$section->name}}</span>

                            <div name="myElements<?php echo $indexNumber; ?>" class="syncscroll comparison__table--content" style="-webkit-overflow-scrolling: touch;">
                                
                                @foreach ($section_items as $section_item)
                                    @foreach ($section->items->groupBy('name.product_id') as $item)
                                        <div class="comparison__table--content-item d-md-none">
                                            @foreach ($item as $i)
                                            <div class="block">
                                                @php
                                                    $item_name = $section_item[$i->id] ?? [];
                                                @endphp
                                                <span class="block__title">{{$i->name}}</span>
                                                @if (!empty($item_name))
                                                    <span class="block__text">{!!collect($item_name)->first()->name!!}</span>
                                                @else
                                                    <span class="block__text">-</span>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                                
                                <table>
                                    <tbody>
                                       @foreach ($section->items as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            @foreach ($section_items as $section_item)
                                                @php
                                                    $item_name = $section_item[$item->id] ?? [];
                                                @endphp
                                                @if (!empty($item_name))
                                                    <td>{!!collect($item_name)->first()->name!!}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <?php $indexNumber++; ?>
            @endforeach
          </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('assets/libs/syncscroll/syncscroll.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            var queryParams = new URLSearchParams(window.location.search);
            queryParams.set("product", e.target.hash.replace("#",""));
            history.replaceState(null, null, "?"+queryParams.toString());
            console.log(queryParams);

            console.log('reset scroll')
            syncscroll.reset();
        });

        $('#dismiss-partner-deals .close').click(function( e ){
            e.preventDefault();
            $("#dismiss-partner-deals").alert('close');
            document.cookie = "partner-deals=closed; max-age=86400; path=/";
        });

        // blocks dynamic sizes
        function sizeBlock() {
            let windowWidth = $(window).width();
            let width;
            if (windowWidth > 992) {
                width = $('#nav-tabContent').width();
            } else if (windowWidth > 767) {
                width = '992';
            } else {
                width = '550';
            }
            
            if (windowWidth > 767) {
                $('.comparison__table.with-scroll table td').width(width / 3);
                $('.comparison__table.with-scroll table tr').css('margin-left', (width / 3) + 21);
                $('.comparison__promo.with-scroll .comparison__promo--item').width((width / 3) - 35);
                $('.comparison__table--content-item').width(width / 3);
            } else {
                $('.comparison__promo.with-scroll .comparison__promo--item').width((width / 3) - 40);
                $('.comparison__table--content-item').width(width / 3);
            }

        }
        sizeBlock();
        $(window).on('resize', function(){
            sizeBlock();
        });


        //sync scrolls
        // $( ".tab-pane.active " ).each(function() {
        //     if ($(window).width() > 767) {
        //         var div1 = $(this).find('.comparison__table.with-scroll .comparison__table--content');
        //         var div2 = $(this).find('.comparison__promo.with-scroll ');

        //         div1.scroll(function() {
        //             div2.scrollLeft($(this).scrollLeft());
        //         });

        //         div2.scroll(function() {
        //             div1.scrollLeft($(this).scrollLeft());
        //         });
        //     } else {
        //         //only for mobile scroll sync
        //         var master = $(this).find('.master');
        //         var slave = $(this).find('.slave');
        //         var slaves = $(this).find('.slave');
        //         var slaveLength = slave.length;
        //         var master_tmp;
        //         var slave_tmp;
        //         var timer;

        //         console.log(slave)
                
        //         function excludeFunc() {

        //         }
        //         var sync = function () {
        //             // function sync(type) {
        //                 // console.log(slaveLength)
        //                 // console.log(slave)
                        
        //             // console.log($(this))
        //             if($(this).attr('class').split(' ')[0] == slave.attr('class').split(' ')[0]) {
        //                 // console.log('check')
        //                 // console.log($(this))
        //                 master_tmp = master;
        //                 // slave_tmp = slave;
        //                 master = slaves.filter(excludeFunc);
        //                 // for ($(this)) {

        //                 // }
        //                 slave = master_tmp;

        //                 console.log(master)
        //                 console.log(slaves)
        //                 console.log(slave)
        //             }
                    
        //             //disable default scroll
        //             slave.unbind("scroll");
                    
        //             var percentage = this.scrollLeft / (this.scrollWidth - this.offsetWidth);
                    
        //             var x = percentage * (slave.get(0).scrollWidth - slave.get(0).offsetWidth);

        //             slave.scrollLeft(x);
                    
        //             if(typeof(timer) !== 'undefind')
        //             clearTimeout(timer);
                    
        //             timer = setTimeout(function(){ slave.scroll(sync) }, 200)
        //         }
                
        //         // $(master).scroll(sync);
                
        //         $(master).scroll(sync);

        //         // $(slave).scroll(sync);
        //         $(slave).each(function() {
        //             // console.log($(this))
        //             $( this ).scroll(sync);
        //         });
        //         // $(master, slave).scroll(sync);
        //         // $(slave).scroll(sync(slave));
        //     }
            

        // });
        
        // drag scroll block
        const sliders = document.querySelectorAll('.comparison__promo.with-scroll');
            let isDown = false;
            let startX;
            let scrollLeft;

        sliders.forEach(slider => {
          slider.addEventListener('mousedown', (e) => {
              isDown = true;
              slider.classList.add('active');
              startX = e.pageX - slider.offsetLeft;
              scrollLeft = slider.scrollLeft;
          });
          slider.addEventListener('mouseleave', () => {
              isDown = false;
              slider.classList.remove('active');
          });
          slider.addEventListener('mouseup', () => {
              isDown = false;
              slider.classList.remove('active');
          });
          slider.addEventListener('mousemove', (e) => {
              if(!isDown) return;
              e.preventDefault();
              
              const x = e.pageX - slider.offsetLeft;
              const walk = (x - startX) * 3; //scroll-fast
              slider.scrollLeft = scrollLeft - walk;
          });
        });
        
    });
</script>
@endsection