<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đăng nhập</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('login')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
     <input type="email" placeholder="email" required name="email">
     <br>
	<input type="password" placeholder="password" name="password">
	<br>
	<input type="submit" name="" value="đăng nhập">
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>