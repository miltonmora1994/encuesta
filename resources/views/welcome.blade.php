
@extends('layouts.app')

@section('content')

    </head>
    <body>


                    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('status') }}
                        </div>
 @endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        @include('sweet::alert')

                <div class="card-body">

                    @php
                        $url= url('/');
                    @endphp
                        
                        @if ($url=='http://itp.edu.co')
                            <center><img src="{{asset('img/escudo.png')}}" alt="" ></center><br><br>
                        @else
                            
                            <center><img src="{{asset('img/escudo.png')}}" width="20%" height="20%" alt="" class="glyphicon-align-left"> </center>
                        </p>

                        @endif
                      
                {!! Form::open(['route' => 'tipotrabajo', 'method'=>'GET','id'=>'fom1']) !!}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Cédula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control @error('name') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" autocomplete="cedula" autofocus placeholder="Digite la cédula">

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <br>
                                <div class="icheck-primary">
                                  <input type="checkbox" id="remember" required>
                                  <label for="remember">
                                    Se informa acerca de los términos y condiciones de uso de la información Política de Protección Base de Datos<p>

                                    @if ($url=='')

                                       <img src="{{asset('img/pdf.svg')}}" alt="Política" width="8%" height="8%"><a href="{{asset('pdf/documento.pdf')}}" title="">  Por medio de la cual se prorroga la resolución No. 337 del 27 de julio de 2020.pdf</a>      
                                  
                                   @else

                                     <img src="{{asset('img/pdf.svg')}}" alt="Política" width="8%" height="8%"><a href="{{asset('pdf/documento.pdf')}}" title="">   Política de Protección Base de Datos Instituto tecnologio del putumayo.pdf</a>


                                   @endif 
                                  </label>
                                </div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    Realizar encuesta
                                </button>
                            </div>

                            
                        </div>

                        <center><div class="links">
                    <a href="http://www.itp.edu.co/">Instituto tecnologico del putumayo</a>
                
                 
                </div></center>


                
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>



                    
                </div>

                <
            </div>
        </div>
    </body>
</html>


@endsection