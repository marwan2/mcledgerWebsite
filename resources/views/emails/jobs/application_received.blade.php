@php
	use App\Forms;
@endphp
<!DOCTYPE html>
<html>
<head>
<style>
.jobapp_table th, td, tr {border-bottom: 1px solid #ddd;}
.jobapp_table {font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;}
.jobapp_table td, jobapp_table td {border: 1px solid #f0f0f0; padding: 10px;}
.jobapp_table tr:nth-child(even){background-color: #deffe4;}
.jobapp_table tr:nth-child(odd){background-color: #fefefe;}
.jobapp_table tr:hover {background-color: #b4dbbb;}
.jobapp_table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<div style="width: 90%; margin: 10px auto; background: #f5f5f5; border-radius: 20px; box-sizing: border-box; padding: 15px; font-family: sans-serif; margin-bottom: 30px;">
	<h3>New job application has been received via McLedger website</h3>

	<div style="margin-bottom: 10px; width: 100%;">
		<table border="0" style="width:100%; border:none;">
			<tr style="border: none;">
				<td style="width: 60%;border: none;">
					<span>Apply for job:</span>
					<strong style="color: #5846f9; font-size: 15px;">{{$application->job}}</strong> 
				</td>
				<td>
					@if($application->cv)
						<a href="{{url('uploads/'.$application->cv)}}" target="_blank" style="display: inline-block; padding: 5px 10px; background: #5846f9; color: #fff; border-radius: 8px; text-decoration: none;">Uploaded CV</a>
					@endif
				</td>
				<td>
					@if($application->cover_letter)
						<a href="{{url('uploads/'.$application->cover_letter)}}" target="_blank" style="display: inline-block; padding: 5px 10px; background: #5846f9; color: #fff; border-radius: 8px; text-decoration: none;">Cover Letter</a>
					@endif
				</td>
		</table>
	</div>
	<table cellpadding="10" style="border-collapse: collapse; width: 100%; font-family: sans-serif; font-size: 14px;" class="jobapp_table">
		<tr>
			<td colspan="2" style="background: #5846f9 !important; color: #fff; font-weight: bold;">Basic Information</td>
		</tr>
		{!!Forms::td($application, 'hear_from', 'How did you hear about us?')!!}
		{!!Forms::td($application, 'name', 'Full name')!!}
		{!!Forms::td($application, 'email', 'Email address')!!}
		{!!Forms::td($application, 'mobile', 'Mobile no.')!!}
		{!!Forms::td($application, 'nationality', 'Nationality')!!}
		{!!Forms::td($application, 'age', 'Date of Birth')!!}
		{!!Forms::td($application, 'gender', 'Gender')!!}
		{!!Forms::td($application, 'family_status', 'Family Status')!!}
		{!!Forms::td($application, 'education', 'Highest Education Qualifications')!!}
		{!!Forms::td($application, 'college', 'Name of the College')!!}
		{!!Forms::td($application, 'major', 'Major / Degree')!!}
		{!!Forms::td($application, 'graduation_year', 'Graduated in the Year')!!}
		{!!Forms::td($application, 'edu_attested', 'Education Qualification Attested?')!!}
		{!!Forms::td($application, 'experience_years', 'Work Experience / Years')!!}
		{!!Forms::td($application, 'experience_years_dubai', 'Work Experience (Dubai)')!!}
		{!!Forms::td($application, 'skills', 'Skills')!!}
		{!!Forms::td($application, 'current_organization', 'Current Organization')!!}
		{!!Forms::td($application, 'worked_for_us', 'Have you previously worked us?')!!}
		{!!Forms::td($application, 'has_relatives', 'Do you have any Relatives working with SAAE Group?')!!}
		{!!Forms::td($application, 'relatives', 'Names of any relatives emplyed by this company')!!}
		{!!Forms::td($application, 'cur_designation', 'Current Designation')!!}
		{!!Forms::td($application, 'cur_salary', 'Current Salary')!!}
		{!!Forms::td($application, 'expected_salary', 'Expected Salary')!!}
		{!!Forms::td($application, 'employment_status', 'What is your current employment status?')!!}
		{!!Forms::td($application, 'when_tostart', 'When can you start?')!!}
		{!!Forms::td($application, 'notice_period', 'Notice Period')!!}
		{!!Forms::td($application, 'leaving_reason', 'Reason for leaving')!!}

		<tr>
			<td colspan="2" style="background: #5846f9 !important; color: #fff; font-weight: bold;">Questions</td>
		</tr>
		{!!Forms::td($application, 'have_saas_exp', 'Do you have experience in Saas?', 'saas_details')!!}
		{!!Forms::td($application, 'understand_platforms', 'Do you understand how digital platforms work?', 'platforms_details')!!}
		{!!Forms::td($application, 'have_marketing_exp', 'Do you have a Proven experience in Digital Marketing?', 'marketing_exp_details')!!}
		{!!Forms::td($application, 'have_bs_marketing', 'Do you have a BS/MS in Marketing or related field?', 'bs_marketing_details')!!}
		{!!Forms::td($application, 'have_lead_exp', 'Do you have experience to lead and manage SESO/SEM, Marketing Database & Email?', 'lead_exp_details')!!}
		{!!Forms::td($application, 'can_adv_campaigns', 'Can you display advertising campaigns & handle social Media?', 'adv_campaigns_details')!!}
		{!!Forms::td($application, 'can_identify_audience', 'Can you identify target audiences/Engaging, informing & motivating digital campaigns', 'identify_audience_detais')!!}
		{!!Forms::td($application, 'able_optimise_pages', 'Are you able to optimise landing pages & user funnels?', 'optimise_pages_details')!!}
		{!!Forms::td($application, 'have_ab_exp', 'Do you have Experience with A/B & multivariate Experiements?', 'ab_exp_details')!!}
		{!!Forms::td($application, 'have_knowledge_webtools', 'Do you have a solid knowledge about website analytics tools?', 'knowledge_webtools_details')!!}
		{!!Forms::td($application, 'can_optimize_adwords', 'Can you set up and optimize google adwords campaigns?', 'optimize_adwords_details')!!}
		{!!Forms::td($application, 'data_driven_thinker', 'Are you a Data Driven thinker with strong Analytical skills?', 'data_driven_thinker_details')!!}
		{!!Forms::td($application, 'latest_trends', 'Are you updated with the lastest trends & practices in Online Marketing & Measurement?', 'latest_trends_details')!!}
	</table>
	<div style="margin-top:20px; font-style: italic; color: #666; text-align: center;" class="app_hint">
		To check application details, <a href="{{url('jobapp/preview/'.$application->id)}}" target="_blank">Click here.</a> <br><br>
	</div>
</div>
</body></html>