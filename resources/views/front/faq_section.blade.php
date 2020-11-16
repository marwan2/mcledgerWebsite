<section id="faq" class="faq">
   <div class="container" data-aos="fade-up">
      <div class="card mc-card">
         <div class="card-body">
            <div class="section-title">
               <h2>Frequently Asked Questions</h2>
               <p></p>
            </div>
            <div class="faq-list">
               <ul>
                  @foreach(array_slice(App\Faq::$faqs_arr, 0, 5) as $index=>$row)
                  <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                     <a data-toggle="collapse" class="collapse q_content" href="#faq-list-{{$index}}">
                        {{$row['qa']}}
                        <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                     <div id="faq-list-{{$index}}" class="collapse show" data-parent=".faq-list">
                        <p>{!! $row['ans'] !!}</p>
                     </div>
                  </li>
                  @endforeach
               </ul>
            </div>
            <div class="pl-4 pr-4 mt-4 mb-4">
               <a href="{{url('faq')}}" class="btn btn-lg btn_bg btn-primary btn-block mt-3 font-weight-bold">All Questions</a>
            </div>
         </div>
      </div>
   </div>
</section>