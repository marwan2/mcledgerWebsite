@php use App\Blog; @endphp
<div class="col-md-6" data-aos="fade-up">
    <div class="card border-0 rad blog_card mb-3">
        <a href="{{Blog::url($post)}}" class="p-3 pb-0">
            {!!Blog::getImage($post, 'card-img-top', true, false)!!}
        </a>
        <div class="card-body pt-0">
            <div class="post_tags mb-3">
                <a href="{{App\BlogCategory::url($post->category)}}" class="btn btn-light btn-sm bg-white font-weight-normal">{{$post->category->title??''}}</a>
                <button class="btn btn-light btn-sm bg-white font-weight-normal">{{Blog::date($post)}}</button>
            </div>
            <a href="{{Blog::url($post)}}"><h5 class="card-title">{{$post->title}}</h5></a>
            <p class="card-text">{!!Blog::limit($post, 80)!!}</p>
            {{-- <p class="card-text"><small class="text-muted">Last updated {{Helper::since($post->updated_at)}}</small></p> --}}
        </div>
    </div>
</div>