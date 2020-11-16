@php use App\Blog; @endphp
<div class="col-md-6">
    <div class="card border-0 rad p-3 blog_card mb-3">
        <a href="{{Blog::url($post)}}">
            {!!Blog::getImage($post, 'card-img-top', true, false)!!}
        </a>
        <div class="card-body">
            <div class="post_tags mb-3">
                <a href="{{App\BlogCategory::url($post->category)}}" class="btn btn-light bg-white">{{$post->category->title??''}}</a>
                <div class="btn btn-light bg-white">{{Blog::date($post)}}</div>
            </div>
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">
                {{Blog::limit($post, 80)}}
            </p>
            {{-- <p class="card-text"><small class="text-muted">Last updated {{Helper::since($post->updated_at)}}</small></p> --}}
        </div>
    </div>
</div>