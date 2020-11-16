@php
    use App\Blog;
    use App\Helper;

    $categories = \App\BlogCategory::get();
    $recent = Blog::orderBy('id', 'desc')->take(3)->get();
@endphp
<div class="col-lg-4 order-lg-2 order-2">
    <div class="right-side-blog">
        <div class="iq-sidebar-widget">
            <form action="{{url('blog/search')}}">
                <div class="iq-widget-search position-relative"><a href="javascript:void(0)"> <i class="fa fa-search"></i></a>
                    <input name="q" type="search" placeholder="Search" class="form-control placeholder search-btn">
                </div>
            </form>
        </div>
        @if($featured_posts->count() > 0)
        <div class="iq-mt-80 blog_sidebar_featured">
            <h5 class="iq-widget-title iq-fw-8 mb-4">Featured Posts</h5>
            @foreach($featured_posts as $fpost)
                <div class="media mb-3">
                    <a href="{{Blog::url($fpost)}}">
                        {!!Helper::image2($fpost->image, ['class'=>'mr-3', 'title'=>$fpost->title], false)!!}
                    </a>
                    <div class="media-body">
                        <a href="{{Blog::url($fpost)}}"><h6 class="mt-0">{{$fpost->title}}</h6></a>
                        <span class="sd_date">{{Blog::date($fpost)}}</span>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        <div class="iq-sidebar-widget iq-mt-80 blog_sidebar_cats">
            <h5 class="iq-fw-8 mb-4">Categories</h5>
            <ul class="d-block">
                @foreach($blog_cats as $cat)
                <li class="d-block mb-3"><a href="{{App\BlogCategory::url($cat)}}" class="iq-fw-5">{{$cat->title}}<span>{{$cat->articles_count}}</span></a></li>
                @endforeach
            </ul>
        </div>
        <div class="iq-mt-80">
            <h5 class="iq-widget-title  iq-tw-6 mb-4">Tags</h5>
            <div class="iq-tags list-inline">
                @php
                    $ctags = 0;
                    $uniqueTags = [];
                @endphp
                @foreach($blog_tags as $row)
                    @if(!empty($row->tags))
                        @php
                            $tags_arr = explode(',', $row->tags);
                        @endphp

                        @foreach($tags_arr as $tag)
                            @if(isset($uniqueTags[strtolower($tag)]))
                                @php continue; @endphp
                            @else
                                @php
                                    $uniqueTags[strtolower($tag)] = $tag;
                                @endphp
                                <a href="{{Blog::tag_url($tag)}}" class="btn btn-tag btn-outline-info mb-1 mr-1">{{$tag}}</a>
                            @endif
                        @endforeach

                        @php $ctags++; @endphp
                    @endif
                @endforeach
            </div>
        </div>
        </div>
</div>