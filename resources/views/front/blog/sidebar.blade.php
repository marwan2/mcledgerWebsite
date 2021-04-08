@php
    use App\Blog;
    use App\Helper;

    $categories = \App\BlogCategory::get();
    $recent = Blog::orderBy('id', 'desc')->take(3)->get();
@endphp
<div class="col-lg-3 order-lg-2 order-2">
    <div class="right-side-blog">
        <div class="iq-sidebar-widget mb-4">
            <form action="{{url('blog/search')}}" method="GET" class="searchBlogForm">
              <div class="input-group blog_search">
                <input type="text" name="q" class="form-control" placeholder="Search articles" aria-label="Search" aria-describedby="btnSearch">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit" id="btnSearch"><i class="bx bx-search"></i></button>
                </div>
              </div>
            </form>
        </div>
        @if($featured_posts->count() > 0)
        <div class="iq-mt-80 blog_sidebar_featured mb-4">
            <h5 class="iq-widget-title iq-fw-8 mb-4">Featured Posts</h5>
            <div class="row">
                @each('front.blog.single_side', $featured_posts, 'post')
            </div>
        </div>
        @endif

        <div class="blog_sidebar_cats mb-4">
            <h5 class="iq-fw-8 mb-4">Categories</h5>
            <div class="d-block text-left">
                @foreach($blog_cats as $cat)
                <a href="{{App\BlogCategory::url($cat)}}" class="d-block mb-3">{{$cat->title}}</a>
                @endforeach
            </div>
        </div>

        @if($blog_tags->count() > 0)
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
        @endif
    </div>
</div>