@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row entercode">
        <div class="col-md-4 col-lg-push-4 text-center">
            <h1>ENTER YOU CODE HERE</h1>
                @include('inc.message')

                {!! Form::open(array('url' => 'home/submit', 'method' => 'POST')) !!}
                    <div class="form-group">
                        {!! Form::label('code', 'Code:') !!}
                        {!! Form::text('code', '', ['class' => 'form-control inputCode', 'placeholder' => 'Enter code']) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn-3" type="submit" name="submit"> Send Code </button>
                    </div>
                {!! Form::close() !!}
        </div>
        <div class="col-md-4 col-lg-pull-4 text-center">
            <img src="img\corona-extra.png">
            <h2>CORONA EXTRA</h2>
            <div>
                <p>Born in Mexico and brought up on the beach, Corona is the perfect compliment to life’s simple pleasures. The golden colour, light refreshing flavor and iconic hand painted bottle, topped off with a freshly squeezed lime. When the living is easy, the beer is Corona.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <img src="img\coronita.png">
            <h2>CORONITA</h2>
            <div>
                <p>Corona Extra’s little brother. The same refreshing taste, just in a smaller 21cl. Bottle. Perfect for when you want a mini-break from the hectic everyday, this small, easy-going beer goes easy with friends, sun and sand.</p>
            </div>
        </div>
    </div>
    <hr>
</div>
</br>
</br>
<div class="container">  
        
        <div class="col-md-6 text-right">
            <img src="img\corona-box.jpg" height="400px">
        </div>
        <div class="col-md-6 text-left">
            <div>
                <h2>How its works</h2>
                <p>On every bottle of corona you can find a code. Which you can enter after the registration on the contest page. 
You will see immediately if you won or not. Every winner will be contacted by mail, By our contest manager</p>
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Corona 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
</div>

@endsection
