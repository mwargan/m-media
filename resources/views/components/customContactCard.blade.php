<div class="action-section card round-all-round u-center-text" data-aos="fade" data-aos-anchor-placement="top-bottom" id="{{$id}}">
    @if(isset($image))
    <img src="{{$image}}" class="u-center" style="max-height: 135px;object-fit: scale-down;margin-bottom:-1rem;" alt="{{Config('app.name')}}">
    @endif
      <div class="card-body">
        <h3 class="card-title">{{$title}}</h3>
        <p class="card-text">{{$slot}}</p>
            <div class="card-footer">
                @if(isset($buttons))
                    @foreach($buttons as $button)
                    <a class="button button-{{$button['type'] ?? 'general'}}" href="{{$button['link']}}">
                        {{ __($button['text']) }}
                    </a>
                    @endforeach
                @else
                    <a class="button button-primary" href="/contact">
                        {{ __('Contact us') }}
                    </a>
                @endif
            </div>
      </div>
</div>
