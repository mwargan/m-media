@extends('layouts.clean')

@section('above_container')
	<div class="header-section bg-secondary">
		<h1>Phone logs</h1>
		<p>{{config('app.name')}} Phones</p>
	</div>
<div class="container">
<h2 class="mt-5 mb-0">{{count($phone_logs)}} phones</h2>
	@if($phone_logs && count($phone_logs) > 0)
	<div class="table-responsive table-hover">
		<table class="table mb-0">
			<thead>
				<tr>
				   <th>ID</th>
				   <th>Notes</th>
				   <th>Number</th>
				   <th>Owner</th>
				   <th>Phone type</th>
				   <th>Direction</th>
				   <th>Created at</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($phone_logs->sortByDesc('created_at') as $log)
				<tr>
					<td><a href="/phone-logs/{{ $log->id }}">{{ $log->id }}</a></td>
					<td>{{ $log->notes }}</td>
					<td><a href="/phones/{{ $log->phone_id }}">{{ $log->phone->e164 }}</a></td>
					<td>{{ optional($log->phone->defaultForUser)->name ?? null }}</td>
					<td>{{ $log->phone->number_type }}</td>
					<td>{{ $log->type }}</td>
					<td>{{ $log->created_at->diffForHumans() }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	@else
		<div class="alert text-muted">
			 There's currently no phone numbers associated with your account. When you asscociate a phone number with your {{config('app.name')}} account, you access more and better services via phone, and ensure more security over your account.
		</div>
	@endif
</div>
@endsection
