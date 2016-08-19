<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">로그인</h4>
      </div>
        <form class="form-horizontal" action="<?=site_url('/auth/authentication?returnURL='.rawurlencode($returnURL))?>" method="post">
      <div class="modal-body">
        <div class="control-group">
          <label class="control-label" for="inputEmail">아이디</label>
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="이메일">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">비밀번호</label>
          <div class="controls">
            <input type="password" id="password" name="password"  placeholder="비밀번호">
          </div>
        </div>      
      </div>
      <div class="modal-footer">
         <input type="submit" class="btn btn-primary" value="로그인" />
      </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->