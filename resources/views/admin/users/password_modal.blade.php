<div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="myPSModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
        {!! Form::open(['method'=>'POST','url'=>['admin/settings/changepassword'],'class'=>'form-horizontal']) !!}
        {!!Form::hidden('user_id',null,['id'=>'ch_user_id'])!!}
          <div class="modal-body">
            <div class="form-group">
                {!! Form::label('password', 'New password: ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('password_confirm', 'Confirm new password: ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('password_confirm', null, ['class' => 'form-control','required' => 'required']) !!}
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>