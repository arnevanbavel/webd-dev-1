<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

            .business-header {
                height: 600px;
                background: url('img/background2.jpg') center center no-repeat scroll; /*1920-600*/
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            }

            /* Customize the text color and shadow color and to optimize text legibility. */

            .tagline {
                text-shadow: 0 0 10px #000;
                color: #fff;
            }

            .img-center {
                margin: 0 auto;
            }

            footer {
              margin: 50px 0;
            }

        </style>
    </head>
    <body>
      <div id="app" class="welcome">
        @include('inc.nav')
      </div>
      <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="tagline">Corona</h1>
                </div>
            </div>
        </div>
      </header>

    <!-- Page Content -->
    <div class="container">
      <div class="call-to-action text-center">
        <div class="row">
            <div class="col-sm-12">
                <h1>PASSPORT TO PARADISE</h1>
                <p>Every bottle of Corona is your Passport to Paradise. From Cape Town to Columbia, Dubai to Italy, reconnect with friends, embrace the outdoors and live the spirit of summer with Corona.</p>
                <p>Just click on your home country to participate and grab your passport for the trip of a lifetime.</p>
                <p>
                  <a href="/home"> <button class="btn-3"> Enter contest </button> </a>
                </p>
            </div>
        </div>
      </div>

      <div class="map text-center">
        <div class="row">
            <div class="col-sm-12">
                <img src="img/map5.png">
            </div>
        </div>
      </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <h1>WINNERS PREVIOUS MONTH</h1>
        </div>
    </div>

    @if(count($winners) > 0)
    <div class="wrappertable">
      <div class="table">
        <div class="row header green">
          <div class="cell">Naam</div>
          <div class="cell"></div>
          <div class="cell">Land</div>
          <div class="cell">Winning code</div>
          <div class="cell">Status</div>
        </div>
            @foreach($winners->all() as $winner )
                <div class="row">
                    <div class="cell">{{$winner->user->name}}</div>
                    <div class="cell">Is flying too</div>
                    <div class="cell">{{$winner->land}}</div>
                    <div class="cell">{{$winner->winnendeCode}}</div>
                    <div class="cell">party</div>
                </div>
            @endforeach
      </div>
    </div>
    @else
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>NO WINNERS PREVIOUS MONTH</h2>
        </div>
    </div>
    @endif

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
