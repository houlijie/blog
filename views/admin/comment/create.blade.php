@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">新增一条评论</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>新增失败</strong>输入不符合要求！<br><br>
							{!! implode('<br>',$errors->all()) !!}
						</div>
					@endif

					<form action="{{ url('admin/comment') }}" method="POST">
						{!! csrf_field() !!}
						<input type="text" name="nickname" class="form-control" required="required" placeholder="请输入昵称">
						<br>
						<input type="email" name="email" class="form-control" required="required" placeholder="请输入邮箱">
						<br>
						<input type="website" name="website" class="form-control" required="required" placeholder="">
						<br>
						<textarea name="content" rows="10" class="form-control" required="required" placeholder="请输入评论"></textarea>
						<br>
						<button class="btn btn-lg btn-info">新增评论</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
