@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">评论管理</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif

		
					@foreach ($comments as $comment)
						<hr>
						<div>
							<table class="table">
								<tr>
									<th>作者</th>
									<th>评论</th>
									<th>文章</th>
									<th>提交时间</th>
									<th>操作</th>
								</tr>
								<tr>
									<th>{{ $comment->nickname }}</th>
									<th>{{ $comment->content }}</th>
									<th>{{ $comment->article_id }}</th>
									<th>{{ $comment->article_id }}</th>
	
									<th>
					                 	<a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">回复</a> &nbsp; &nbsp; |&nbsp;&nbsp; <a href="{{ url('admin/comment/destroy') }}" class="btn btn-danger"> 删除</a>
									</th>
								</tr>
							</table>
						</div>
				    
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
					
