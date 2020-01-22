<footer>
    <div id="footer-container">
        <div id="footer-left">

            @if(!empty($contact))
                <div>
                    <a href="{!! "mailto:".$contact->email !!}">{!! $contact->email !!}</a>
                </div>
                <div>
                    <a href="#?">{!! $contact->phone !!}</a>
                </div>
            @endif


            <div>
                Follow us

                @if(!empty($linkers))
                    @foreach($linkers as $linker)
                        <a href="{{ $linker->social_link }}" target="_blank">
                            <img src="{{ $linker->social_icon }}" alt="{{ $linker->name }}" />
                        </a>
                    @endforeach
                @endif

                @if(!empty($linkers_blog))
                    @foreach($linkers_blog as $linker)
                        <a href="{{ $linker->social_link }}" target="_blank">
                            <img src="{{ '../'.$linker->social_icon }}" alt="{{ $linker->name }}" />
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
        <div id="footer-right">
            <form action="" method="post">
                <label>Subscribe to Newsletter</label>
                <div>
                    <input type="text" name="email" placeholder=" Email">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div id="copyright" class="hide-mobile">
        Copyright &copy; 2019 MAJU CURATED INC, and All Rights Reserved.
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('web/js/ytplayer.js') }}"></script>
<script src="{{ asset('web/js/script.js') }}"></script>

