<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB testing</title>
</head>
<body>
    Usuario:
    @if (auth()->user())
        {{auth()->user()->name}} {{auth()->user()->last_name}}
        <a class="dropdown-item" href="http://127.0.0.1:8000/logout"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>

        {{-- Administrador --}}
        <br>
        <button onclick="admin_show();">Adminitrador</button> Pulse para añadir productos o codigos promocionales

        {{-- Cliente --}}
        <div style="display: flex;">
            {{-- Listado de productos --}}
            <div class="bigbox" style="width: 20%">

                <label> Listado de Productos
                    <div class="box">
                        <form method='POST' action='/' accept-charset='UTF-8'  autocomplete='off'>
                            @csrf
                            @if ($product)
                                @foreach ($product->all() as $p)
                                    <div style="display: flex;">
                                        <input type="text" value="{{ $p->name }}" style="width:30%" disabled>
                                        <input type="text" value="{{ $p->description }}" style="width:30%" disabled>
                                        <input type="text" value="Q.{{ $p->price }}" style="width:30%" disabled>
                                    </div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                </label>
            </div>

            {{-- Selección de productos --}}
            <div class="bigbox" style="width: 25%">
                @if ($product)
                <label> Seleccione su producto
                    <div class="box">
                        <form method='POST' action='/products' accept-charset='UTF-8'  autocomplete='off'>
                            @csrf
                            @if ($product)
                            <select name="product">
                                @foreach ($product->all() as $p)
                                    <option value="{{ $p->idproduct }}">{{ $p->name }}</option>
                                @endforeach
                            </select><br>
                            @endif
                            <input type="text" placeholder="unidades" name="units" ><br>
                            <input type="submit">
                        </form>
                    </div>
                </label>
                @endif
            </div>

            {{-- Añadir nueva direccion --}}
            @if (!$address)
                <div class="bigbox" style="width:25%">
                    <label> Añadir direccion
                        <div class="box">
                            <form method='POST' action='/address' accept-charset='UTF-8'  autocomplete='off'>
                                @csrf
                                {{-- <input type="text" placeholder="address" name="address" value="8va calle 13-45 zona 1 de la Ciudad Capital"><br>
                                <input type="text" placeholder="departamento" name="departamento" value="Guatemala"><br>
                                <input type="text" placeholder="municipio" name="municipio" value="Mixco"><br>
                                <input type="text" placeholder="comments" name="comments" value="Por favor entregar a la persona disponible"><br>
                                <input type="text" placeholder="receiver" name="receiver" value="indiferente"><br> --}}
                                <input type="text" placeholder="Direccion" name="address" ><br>
                                <input type="text" placeholder="departamento" name="departamento" value="Guatemala"><br>
                                <input type="text" placeholder="municipio" name="municipio" value="Guatemala"><br>
                                <input type="text" placeholder="Comentarios" name="comments" ><br>
                                <input type="text" placeholder="Receptor" name="receiver" ><br>
                                <input type="submit">
                            </form>
                        </div>
                    </label>
                </div>
            @endif

            {{-- Resumen de orden --}}
            <div class="bigbox" style="width: 29%">
                <label> Resumen de Orden
                    <div class="box">
                        @if (auth()->user())
                            {{auth()->user()->name}} {{auth()->user()->last_name}}
                        @endif
                        <form method='POST' action='/order' accept-charset='UTF-8'  autocomplete='off'>
                            @csrf
                            @if ($products)
                            <label for="">listado de productos</label>
                            <div class="box" style="display:block;">
                                @foreach ($products->all() as $p)
                                    <div>{{ $p->units }} {{ $p->name}} {{ 'Q.'.$p->price.'.00'}}</div>
                                @endforeach
                                <div id="discount"> </div>
                                <div id="total"> </div>
                            </div>
                            <input id="promo" type="text" name="promo" placeholder="Introducir codigo" >
                            <div style="background-color:rgb(228, 228, 228);width:fit-content;cursor:pointer;text-align:center;padding:1%;" onclick="check_promo()">Aplicar codigo</div>
                            <br>
                            <label for="">Direccion registrada</label>
                            @if ($address)
                                <div>{{ $address[0]->address}}</div>
                                <br>
                            @endif
                            <input type="text" name="idorder" value="{{ $products[0]->idorder }}" hidden>
                            @endif
                            <br>
                            nit
                            <input type="text" placeholder="nit" name="nit" ><br>
                            <select name="payment">
                                <option value="1">Efectivo</option>
                                <option value="2">Tarjeta</option>
                                <option value="3">Deposito</option>
                            </select><br>
                            <select name="shipping">
                                <option value="1">Capital</option>
                                <option value="2">Bodega</option>
                                <option value="3">Departamental</option>
                            </select>
                            <input type="text" placeholder="comments" name="comments" value="Porfavor entregar a la persona disponible"><br>
                            <input type="submit" value="Pagar">
                        </form>
                    </div>
                </label>
            </div>
        </div>

        <div style="display: flex;">
            {{-- Billing --}}
            <div class="bigbox" style="width:50%; display:block;">
                @if ($billing)
                    @foreach ($billing->all() as $b)
                        <div class="small-box">
                            <label for="">Factura</label>
                            <div>No.Factura : {{ $b->billing_number}}</div>
                            <div>Total : {{ 'Q.'.$b->total}}</div>
                            <div>Fecha : {{ $b->created_at}}</div>
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- Tracking --}}
            <div class="bigbox" style="width:50%; display:block;">
                @if ($tracking)
                    @foreach ($tracking->all() as $t)
                        <div class="small-box">
                            <label for="">Tracking</label>
                            <div>No.Tracking : {{ $t->tracking_number}}</div>
                            <div>Estado : {{ $t->status}}</div>
                            <div>Fecha : {{ $t->created_at}}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        @else

        <div class="center-box">
            <label> Registro
                <div class="box">
                    <form id="form-reg" method='POST' action='/register' accept-charset='UTF-8'  autocomplete='off'>
                        @csrf
                        {{-- <input type="text" placeholder="name" name="name" value="Kevin"><br>
                        <input type="text" placeholder="last_name" name="last_name" value="Armas"><br>
                        <input type="text" placeholder="email" name="email" value="kevinarmas7@gmail.com"><br>
                        <input type="text" placeholder="password" name="password" value="12345"><br> --}}
                        <input type="text" placeholder="name" name="name" ><br>
                        <input type="text" placeholder="last_name" name="last_name" ><br>
                        <input type="text" placeholder="email" name="email" ><br>
                        <input type="text" placeholder="password" name="password" ><br>
                        <input type="text" placeholder="password confirmation" name="password_confirmation" ><br>
                        <input type="button" onclick="regValid();" value="Registrar">
                        <div class="reg-errors"></div>
                        @if(Session::has('error'))
                            <div class="errors">
                                @foreach (Session::get('error')  as $e)
                                    <div>{{ $e }}</div>
                                @endforeach
                            </div>
                        @endif
                    </form>

                </div>
            </label>
        </div>

        <div class="center-box">
            <label>Login
                <div class="box">
                    <form id="form-log" method='POST' action='/login' accept-charset='UTF-8'  autocomplete='off'>
                        @csrf
                        <input type="text" placeholder="email" name="email" required><br>
                        <input type="text" placeholder="password" name="password" required><br>
                        <input type="button" value="Login" onclick="logValid()">
                        <div class="log-errors"></div>
                    </form>
                </div>
            </label>
        </div>

        @if($users)
            <div class="center-box">
                <label for="">Usuarios
                    <div>
                @foreach ($users as $user)
                    {{ $user->name }}|||{{ $user->last_name }}|||{{ $user->email}}
                    <br>
                @endforeach
                    </div>
                </label>
            </div>
        @endif

    @endif


    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script>
        products = {!! json_encode($products,JSON_HEX_TAG) !!};
        promo =  {!! json_encode($promo,JSON_HEX_TAG) !!};
    </script>
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>
</body>
</html>
