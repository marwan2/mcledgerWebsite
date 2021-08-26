@php
  use App\Forms;
@endphp
@extends('front.layouts.master')
@section('title') Job Application - Marketing Manager - @stop
@section('content')
<section id="hero" class="d-flex align-items-center terms-hero job_apps_hero">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-md-12 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Job Application - Marketing Manager</h1>
      </div>
    </div>
  </div>
</section>
<main id="main">
  <section id="job_app" class="job_app">
    <div class="container" data-aos="fade-up">
      @if ($errors->any())
          <div class="alert alert-danger errors_list rounded-lg alert-dismissible">
              <ul class="errors_ul">
                  @foreach ($errors->all() as $error)
                    <li class="error_li">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{url('job-application')}}" method="post" enctype="multipart/form-data" role="form" class="contactForm h-100 pt-3">
          @csrf
          <div class="accordion" id="accordionExample">
            <div class="card card-outline-light bg-transparent" style="border: none;">
              <div class="card-header bg-transparent" id="headingOne">
                <h3 class="mb-0">Applicant Information</h3>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  {!!Forms::text('job', 'Apply for job')!!}
                  {!!Forms::text('hear_from', 'How did you hear about us?')!!}
                  {!!Forms::text('name', 'Full Name')!!}
                  {!!Forms::num('mobile', 'Mobile No.')!!}
                  {!!Forms::email('email', 'Email Address')!!}
                  {!!Forms::select('nationality', 'Nationality', $countries)!!}
                  {!!Forms::text('age', 'Date of Birth', 'datepicker')!!}
                  {!!Forms::select('gender', 'Gender', Forms::$genders)!!}
                  {!!Forms::select('family_status', 'Family Status', Forms::$family_status)!!}
                  {!!Forms::text('education', 'Highest Education Qualifications')!!}
                  {!!Forms::text('college', 'Name of the College')!!}
                  {!!Forms::text('major', 'Major / Degree')!!}
                  {!!Forms::text('graduation_year', 'Graduated in the Year')!!}
                  {!!Forms::text('edu_attested', 'Education Qualification Attested?')!!}
                  {!!Forms::text('experience_years', 'Work Experience / Years')!!}
                  {!!Forms::text('experience_years_dubai', 'Work Experience (Dubai)')!!}
                  {!!Forms::textarea('skills', 'Skills')!!}
                  {!!Forms::text('current_organization', 'Current Organization')!!}
                  {!!Forms::yesNo('worked_for_us', 'Have you previously worked with us?')!!}
                  {!!Forms::yesNo('has_relatives', 'Do you have any Relatives working with SAAE Group?', '', true, 'relatives', 
                    'Names of any relatives emplyed by this company')!!}
                  {!!Forms::text('cur_designation', 'Current Designation')!!}
                  {!!Forms::text('cur_salary', 'Current Salary')!!}
                  {!!Forms::text('expected_salary', 'Expected Salary')!!}
                  {!!Forms::select('employment_status', 'What is your current employment status?', Forms::$employment_status)!!}
                  {!!Forms::text('when_tostart', 'When can you start?', 'datepicker')!!}
                  {!!Forms::text('notice_period', 'Notice Period')!!}
                  {!!Forms::text('leaving_reason', 'Reason for leaving')!!}
                  {!!Forms::file('cover_letter', 'Cover Letter')!!}
                  {!!Forms::file('cv', 'Upload your CV')!!}
                  <div class="row">
                    <div class="offset-4 p-3">
                      <button class="btn btn-primary btn-lg btn_next" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Next Step <i class='bx bxs-chevrons-right' style="line-height:30px"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card bg-transparent" style="border: none;">
              <div class="card-header bg-transparent" id="headingTwo">
                <h3 class="mb-0">Applicant Information</h3>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  {!!Forms::yesNo('have_saas_exp', 'Do you have experience in Saas?', '', true, 'saas_details')!!}
                  {!!Forms::yesNo('understand_platforms', 'Do you understand how digital platforms work?', '', true, 'platforms_details')!!}
                  {!!Forms::yesNo('have_marketing_exp', 'Do you have a Proven experience in Digital Marketing?', '', true, 'marketing_exp_details')!!}
                  {!!Forms::yesNo('have_bs_marketing', 'Do you have a BS/MS in Marketing or related field?', '', true, 'bs_marketing_details')!!}
                  {!!Forms::yesNo('have_lead_exp', 'Do you have experience to lead and manage SESO/SEM, Marketing Database & Email?', '', true, 'lead_exp_details')!!}
                  {!!Forms::yesNo('can_adv_campaigns', 'Can you display advertising campaigns & handle social Media?', '', true, 'adv_campaigns_details')!!}
                  {!!Forms::yesNo('can_identify_audience', 'Can you identify target audiences/Engaging, informing & motivating digital campaigns?', '', true, 'identify_audience_detais')!!}
                  {!!Forms::yesNo('able_optimise_pages', 'Are you able to optimise landing pages & user funnels?', '', true, 'optimise_pages_details')!!}
                  {!!Forms::yesNo('have_ab_exp', 'Do you have Experience with A/B & multivariate Experiements?', '', true, 'ab_exp_details')!!}
                  {!!Forms::yesNo('have_knowledge_webtools', 'Do you have a solid knowledge about website analytics tools?', '', true, 'knowledge_webtools_details')!!}
                  {!!Forms::yesNo('can_optimize_adwords', 'Can you set up and optimize google adwords campaigns?', '', true, 'optimize_adwords_details')!!}
                  {!!Forms::yesNo('data_driven_thinker', 'Are you a Data Driven thinker with strong Analytical skills?', '', true, 'data_driven_thinker_details')!!}
                  {!!Forms::yesNo('latest_trends', 'Are you updated with the lastest trends & practices in Online Marketing & Measurement?', '', true, 'latest_trends_details')!!}
                  <div class="row">
                    <div class="offset-4 p-3">
                      <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
                      <button class="btn btn-outline-dark btn-lg btn_back" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Go back
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
    </div>
  </section>
</main>
<style>
  .form-control::placeholder {color: #c0c7ce;}
  select.form-control { border-radius: 18px; }
  input[type="file"] { padding: 10px; }
  .custom-radio .custom-control-label { line-height: 29px; }
</style>
@endsection

@section('styles')
   <link rel="stylesheet" type="text/css" href="{{url('backend/vendor/datepicker/bootstrap-datepicker3.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{url('backend/vendor/datepicker/bootstrap-datepicker3.standalone.min.css')}}">
@endsection
@section('scripts')
   <script src="{{url('backend/vendor/datepicker/bootstrap-datepicker.min.js')}}"></script>
   <script type="text/javascript">
      $(document).ready(function() {
           $.fn.datepicker.defaults.format = "dd-mm-yyyy";
           $('.datepicker').datepicker();

           $(document).on('click', '.custom-control-input', function(event) {
             $has_field = $(this).data('hastxt');
             $txt_field_id = $(this).data('txtid');
             $val = $(this).val();

             if($has_field) {
               if($val==1 || $val=='yes') {
                $('#'+$txt_field_id).slideDown('fast');
                $('#'+$txt_field_id).prop('required', 'required');
               } else {
                $('#'+$txt_field_id).slideUp('fast');
                $('#'+$txt_field_id).removeAttr('required');
               }
             }
           });

            var scrolltoOffset = $('#header').outerHeight() - 16;
            if (window.matchMedia("(max-width: 991px)").matches) {
              scrolltoOffset += 16;
            }
            
            $('.btn_back, .btn_next').on('click', function (e) {
                //e.preventDefault();
                var target = $('#job_app');
                if (target.length) {
                  var scrollto = target.offset().top - scrolltoOffset;
                  $('html, body').animate({
                    scrollTop: scrollto
                  }, 1000, 'easeInOutExpo');
                }
            });
      });
   </script>
@endsection