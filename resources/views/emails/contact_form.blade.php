<div style="width: 90%; margin: 10px auto; background: #f0f0f0; border-radius: 20px; box-sizing: border-box; padding: 15px;">
	<h3>New form received via McLedger website</h3>

	<table cellpadding="10" style="border-collapse: collapse;">
		<tr>
			<td style="width: 160px;">Name</td>
			<td>{{$form->name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$form->email}}</td>
		</tr>
		<tr>
			<td>Subject</td>
			<td>{{$form->subject}}</td>
		</tr>
		<tr>
			<td>Message</td>
			<td>{{$form->message}}</td>
		</tr>
	</table>
</div>