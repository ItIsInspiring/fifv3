<div class="ressource col-md-6 px-0 pb-4 mx-0 ">
    <div class="row">

        <div class="col-sm-12 col-md-3">
            <div class="wrapper-img">
                @if($ressource['img_url'] )
                    <img src="{{ $ressource['img_url']  }}" alt="{{ $ressource['title'] }}">
                @else
                    <img src="@asset('images/default.jpg')" alt="{{ $ressource['title'] }}">
                @endif
            </div>
        </div>

        <div class="col-sm-12 col-md-8">
            <div class="p-2">
                <h2>{!! $ressource['title'] !!}</h2>
                <div>{!! $ressource['content']  !!}</div>
                <ul>
                @if($ressource['adress']) 
                    <li><a href="https://www.google.com/maps/place/{!! $ressource['adress'] !!}"><span class="dashicons dashicons-admin-home"></span> {!! $ressource['adress'] !!}</a></li> 
                @endif
                @if($ressource['phone']) 
                    <li><a href="tel:{{ $ressource['phone']  }}" target="_blank"><span class="dashicons dashicons-phone"></span> {{ $ressource['phone']  }}</a></li>
                @endif
                @if($ressource['url']) 
                    <li><a href="{{ $ressource['url']  }}" target="_blank"><span class="dashicons dashicons-admin-links"></span> {{ $ressource['url']  }}</a></li>
                @endif
                <ul>
            </div>
        </div>

    </div>
</div>