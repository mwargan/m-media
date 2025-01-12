@extends('layouts.clean')

@section('title', 'Billing')

@section('above_container')
    <div class="header-section bg-secondary">
        <h1>Billing</h1>
        <p>{{$user->name}} {{$user->surname}}</p>
    </div>
@endsection

@section('content')
Jump to:
    <a href="#upcoming">upcoming invoice</a> |
    <a href="#subscriptions">subscriptions</a> |
    <a href="#paymentMethods">payment methods</a> |
    <a href="#invoices">invoices</a> |
    <a href="#discounts">discounts</a>  |
    <a href="#help">help</a>

<div class="row m-0 pt-5 pb-5 ">
<h2 class="mt-5 mb-0" id="upcoming">Upcoming invoice</h2>
  <future-invoice-component userid="{{$user->id}}"></future-invoice-component>
</div>

<div class="row m-0 pt-5 pb-5 ">
<h2 class="mt-5 mb-0" id="subscriptions">Subscriptions</h2>
	@if(isset($subscriptions->data) && count($subscriptions->data) > 0)
   {{--  <button id="show-modal" @click="showModal = true">Show Modal</button>
  <modal-component v-if="showModal" @close="showModal = false">
    <h3 slot="header">Custom header</h3>
  </modal-component> --}}
	<div class="table-responsive">
		<table class="table mb-0">
				<thead>
					<tr>
						<th>Status</th>
					   <th>ID</th>
					   <th>Plan</th>
					</tr>
				</thead>
				<tbody>
			@foreach ($subscriptions->data as $subscription)
				<tr>
					<td class="text-{{ $subscription->status == 'active'  ? 'success' : 'secondary' }}">{{ ucfirst($subscription->status) }}</td>
					<td>{{ $subscription->id }}</td>

					@if(isset($subscription->plan))
						<td>{{ $subscription->plan->amount/100 }} EUR / {{ $subscription->plan->interval }}</td>
					@else
					<td>
						@foreach ($subscription->items->data as $item)
							{{ $item->plan->amount/100 }} {{ strtoupper($item->plan->currency) }} / {{ $item->plan->interval }}
							@if(!$loop->last)
						    	+
						    @endif
						@endforeach
					</td>
					@endif

				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="text-muted">
         To cancel or pause subscriptions, <a href="/contact">contact us</a>.
    </div>
	@else
		<div class="alert text-muted">
			 You have no active subscription to an {{Config('app.name')}} service yet. When you do, it will show up here.
		</div>
	@endif
</div>

<div class="row m-0 pt-5 pb-5 ">
	<h2 class="mt-5 mb-0" id="paymentMethods">Payment methods</h2>
	@if($pmethod && count($pmethod) > 0)
	<div class="table-responsive">
		<table class="table mb-0">
				<thead>
					<tr>
					   <th>Brand</th>
					   <th>Last four</th>
					   <th>Expires</th>
					   <th>Notes</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($pmethod as $method)
				<tr>
					<td>{{ ucfirst($method->card->brand) }} {{ $method->card->funding }} card</td>
					<td class="text-muted">**** {{ $method->card->last4 }}</td>
					<td>{{ $method->card->exp_month }}/{{ $method->card->exp_year }}</td>
					<td>{{$user->card_last_four == $method->card->last4 ? 'Primary payment method' : null}}</td>
				</tr>
				@endforeach
				@foreach ($sepa_sources as $method)
				<tr>
					<td>{{ $method->sepa_debit->country }} bank account<br/><small class="text-muted">Bank code: {{ $method->sepa_debit->bank_code }}</small></td>
					<td class="text-muted">**** {{ $method->sepa_debit->last4 }}</td>
					<td></td>
					<td>{{$user->card_last_four == $method->sepa_debit->last4 ? 'Primary payment method' : null}}</td>
				</tr>
				@endforeach
				</tbody>
		</table>
	</div>
	@else
		<div class="alert text-muted">
			 You haven't set up a payment method yet.
		</div>
	@endif
{{-- 	<card-payment-component :user_id="{{$user->id}}"></card-payment-component>
 --}}

<!-- Stripe Elements Placeholder -->
@can('update', $user)
	<label class="mt-4 mb-0">Add a new card</label>
	<div class="row">
		<div class="form-control nine columns" style="color: inherit;border: 1px solid var(--gray);border-radius: var(--border-radius);padding: .5rem .75rem;margin-bottom: 1rem;">
			<div id="card-element"></div>
		</div>
		<div class="three columns">
		<button id="card-button" data-secret="{{ $intent->client_secret }}" class="button button-primary">
		    Add card
		</button>
		{{-- 	<a href="/users/{{$user->id}}/billing/payment-methods/sepas/create" class="small text-muted ml-3">Add a SEPA bank account</a> --}}
		</div>
	</div>
@endcan
</div>
<div class="row m-0 pt-5 pb-5 ">
    <h2 class="mt-5 mb-0" id="invoices">All invoices</h2>
	@if(count($invoices) > 0)
		<div class="table-responsive">
			<table class="table mb-0">
					<thead>
				     <tr>
					   <th>Date</th>
					   <th>Description</th>
					   <th>Download</th>
					 </tr>
					</thead>
					<tbody>
				    @foreach ($invoices as $invoice)
				        <tr>
				            <td>
				            	{{ $invoice->date()->toFormattedDateString() }}
				            	@if ($invoice->amount_paid !== $invoice->amount_due && $invoice->attempt_count >= 1)
							        <br/><span class="text-danger">Payment overdue</span>
							    @endif
				            </td>
				            <td>
	{{-- 			            	@foreach ($invoice->subscriptions() as $subscription)
				            		{{$subscription->description}}
				            		@if(!$loop->last)
							    		+
							    	@endif
				            	@endforeach --}}

				            	@foreach($invoice->lines->data as $line_item)
				            	{{$line_item->description}}
					            	@if(!$loop->last)
							    		+
							    	@endif
				            	@endforeach
				            </td>
				            <td><a href="/invoices/{{ $invoice->id }}/pdf">Download</a></td>
				        </tr>
				    @endforeach
				</tbody>
			</table>
		</div>
		@php
		$amount_spent = 0;
        foreach ($invoices as $invoice) {
            $amount_spent += $invoice->amount_paid;
        }
        @endphp
		<div class="text-muted">Total expenditure: {{$amount_spent / 100}} {{strtoupper($invoices[0]->currency)}}</div>
	@else
		<div class="alert text-muted">
	         There's no invoices to show. When you make a payment to {{config('app.name')}}, it will show here.
	    </div>
	@endif
</div>

<div class="row m-0 pt-5 pb-5">
    <h2 class="mt-5 mb-0" id="discounts">Discounts</h2>
	@if($discounts && count($discounts) > 0)
    <div class="table-responsive">
		<table class="table mb-0">
				<thead>
			     <tr>
				   <th>Name</th>
				   <th>Discount</th>
				 </tr>
				</thead>
				<tbody>
			        <tr>
			            <td>{{ $discounts->coupon->name }}</td>
			            <td>{{ $discounts->coupon->amount_off ? $discounts->coupon->amount_off : $discounts->coupon->percent_off."% off" }} {{ $discounts->coupon->duration }}</td>
			        </tr>
			</tbody>
			</table>
		</div>
	@else
		<div class="alert text-muted">
	         There's no discounts applied to your account.
	    </div>
	@endif
</div>

<div class="row m-0 pt-5 pb-5">
    <h2 class="mt-5 mb-0" id="help">From our Help Center</h2>
	<block-post-component category="36"></block-post-component>
	</div>

@endsection
@section('footer_scripts')
<script>

	var style = {
        base: {
            // color: '#32325d',
            lineHeight: '1.8',
            fontFamily: '"Roboto", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '18px',
            '::placeholder': {
                // color: '#aab7c4'
            }
        },
        invalid: {
            // color: '#fa755a',
            // iconColor: '#fa755a'
        }
    };

    const stripe = Stripe('{{config('services.stripe.key')}}');

    const elements = stripe.elements();
    const cardElement = elements.create('card', { style: style });

    cardElement.mount('#card-element');

    //const cardHolderName = document.getElementById('card-holder-name');
	const cardButton = document.getElementById('card-button');
	const clientSecret = cardButton.dataset.secret;

	cardButton.addEventListener('click', async (e) => {
		cardButton.setAttribute("disabled", "disabled");
		cardButton.innerText = 'Please wait...';
		const { setupIntent, error } = await stripe.confirmCardSetup(
	        clientSecret, {
	            payment_method: {
	                card: cardElement,
	                //billing_details: { name: cardHolderName.value }
	            }
	        }
	    );
	    if (error) {
	        // Display "error.message" to the user...
	        alert(error.message)
			cardButton.innerText = 'Try again';
	       	cardButton.removeAttribute("disabled");
	    } else {
	        axios.post('/api/users/{{$user->id}}/update-card', {
                    card_token: setupIntent.payment_method,
                }).then(response => {
                	console.log(response)
                	cardButton.innerText = 'Card added';
					location.reload();
                }).catch(e => {
                    console.log(e)
                	cardButton.innerText = 'Something went wrong';
                })
	    }
	});
</script>
@endsection
