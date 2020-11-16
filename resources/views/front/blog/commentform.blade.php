<div class="comments-area">
    {{-- <div class="sidebar-title"><h3>Comments ({{$item->comments->count()}})</h3></div> --}}
    <div class="">
        @if(isset($item->comments) && $item->comments->count()>0)
        <ul class="clearfix">
            @foreach($item->comments as $comment)
                <div class="comments-box position-relative mb-4">
                    <div class="media">
                        <img class="mr-3 rounded-circle" style="height: 100px; min-height: initial" src="{{url('images/blog/clients/03.jpg')}}" alt="{{$comment->name}}">
                        <div class="media-body">
                            <h5 class="mt-0 float-left">{{$comment->name}}</h5>
                            <a class="month-detail float-right" href="#"><i class="far fa-calendar-alt"></i> {{Carbon\Carbon::parse($comment->created_at)->format('l j F Y')}}</a>
                            <div class="clearfix"></div>
                            <P>{{$comment->comment}}</P>
                            {{-- <a class="reply-btn text-green iq-font-18" href="javascript:void(0)">Reply <i class="fas fa-long-arrow-alt-right"></i></a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
        @endif
    </div>
</div>

<div class="comment-form default-form">
    <div class="sidebar-title"><h4>Leave a comment</h4></div>
    <form method="post" action="{{url('blog/comments')}}">
        {{csrf_field()}}
        <input type="hidden" value="{{$item->id}}" name="record_id">
        <input type="hidden" value="{{$model}}" name="model">
        <div class="row clearfix">
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="form-group pl-2">
                    <div class="field-label">Name</div>
                    {!!Form::text('name', null, ['id'=>'cmnt_name','required'=>'required', 'class'=>'form-control'])!!}
                </div>
                <div class="form-group pl-2">
                    <div class="field-label">Email</div>
                    {!!Form::email('email', null, ['id'=>'cmnt_email','required'=>'required', 'class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="form-group pr-4">
                    <div class="field-label">Comment</div>
                    {!!Form::textarea('comment', null, ['required'=>'required','rows'=>4, 'class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group pl-2">
                    <button type="submit" class="btn btn-primary btn_bg hd_cmnt_btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>