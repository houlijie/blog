@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">评论管理</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif

					<a href="{{ url('admin/comment/create') }}" class="btn btn-lg btn-primary">新增</a>
		
					@foreach ($comments as $comment)
						<hr>
						<div class="comment">
							<table>
								<tr>
									<th>Content</th>
									<th>User</th>
									<th>Page</th>
									<th>编辑</th>
									<th>删除</th>
								</tr>
								<tr>
									<th>{{ $comment->content }}</th>
									<th>{{ $comment->nickname }}</th>
									<th>{{ $comment->website }}</th>
									<th>
					                 	<a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
									</th>
									<th>
									
									</th>
								</tr>
								


							</table>
						</div>
				    
						<a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
						<form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
							{{ method_field('DELETE') }}	
							{{csrf_field()}}
							<button type="submit" class="btn btn-danger">删除</button>
						</form>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
					
