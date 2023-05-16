<!DOCTYPE html>
<html>

<head>
    <title>Clima en el Mundo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <link href="/css/cover.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <header class="mt-auto text-white-50 slide-left">
        <p>Esta es una aplicacion de prueba para la empresa <em><img class="logobts" src="/img/bts.png"
                    alt="logo de browser travel solutions"></em> Elaborado por Fernando Carrillo</p>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col1">
                <table id="datatable" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ciudad</th>
                            <th>Tiempo</th>
                            <th>Temperatura</th>
                            <th>Pronostico</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registros as $rgt)
                            <tr>
                                <td>{{ $rgt->id }}</td>
                                <td>{{ $rgt->ciudad }}</td>
                                <td>{{ $rgt->tiempo }}</td>
                                <td>{{ $rgt->temperatura }}</td>
                                <td>{{ $rgt->pronostico }}</td>
                                <td>{{ Carbon\Carbon::parse($rgt->created_at)->format('Y-m-d') }}</td>
                                <td>{{ Carbon\Carbon::parse($rgt->created_at)->format('H:m:i') }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col2">
                <h2>Búsqueda Global del Clima</h2>
                <form action="{{ route('search') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <label class="city">
                            Introduce el nombre de la ciudad
                        </label>
                        <div id="inpCity" style="display:none">
                            <input type="text" class="form-control mt-2" name="city" id="city"
                                placeholder="Nombre de la ciudad">
                        </div>
                        <div id="selCity" style="display: block" >
                            <select name="city" id="city" class="form-control mt-2">
                                <option disabled selected value="">--</option>
                                <option value="Miami">Miami</option>
                                <option value="Orlando">Orlando</option>
                                <option value="New York">New York</option>
                            </select>
                        </div>
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @isset($notFound)
                        <div class="alert alert-danger mt-3" role="alert">
                            Ciudad no encontrada, intente de nuevo!
                        </div>
                    @endisset

                    <div class="row">
                        <div class="inline-block" style="margin-left: 30%; display: inline-block">

                            <button type="submit" class="btn btn-success mt-3" id="consulta"
                                onclick="cambiarboton()">Consultar</button>
                </form>
            </div>
            <div class="inline-block" style="margin-left: 4rem; display: inline-block">
                <form action="{{ route('clima.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="ciudad" id="ciudad" value="{{ $name }}">
                    <input type="hidden" name="tiempo" id="tiempo" value="{{ $main }}">
                    <input type="hidden" name="temperatura" id="temperatura" value="{{ intval($temp) }}&deg;C">
                    <input type="hidden" name="pronostico" id="pronostico" value="{{ $weather }}">
                    <button class="btn btn-info mt-3" type="submit">Registrar</button>
                </form>
            </div>
        </div>

        <div class="col-md-4 main-weather">
            @isset($ok)
                <div class="col-md-12">
                    <h5>{{ $main }}</h5>
                    <h1>{{ intval($temp) }}&deg;C</h1>
                </div>

                <div class="col-md-12">
                    <h3>{{ $name }}, {{ $country }}</h3>
                </div>

                <div class="col-md-12">
                    <h4>{{ $weather }}</h4>
                </div>
            @endisset
        </div>
    </div>
    </div>
    </div>

    <div class="cont">
        <iframe id="fram"
            src="https://openweathermap.org/weathermap?basemap=map&cities=true&layer=temperature&lat=4.6203&lon=-74.1212&zoom=5"
            frameborder="0">
        </iframe>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            orderable: true,
            searchable: true
        });
    });
</script>


<script type="text/javascript">
    var snowStorm = function(e, d) {
    function g(a, d) {
    isNaN(d) && (d = 0);
    return Math.random() * a + d
    }

    function o() {
    e.setTimeout(function() {
        a.start(true)
    }, 20);
    a.events.remove(i ? d : e, "mousemove", o)
    }

    function r() {
    if (!a.excludeMobile || !s) a.freezeOnBlur ? a.events.add(i ? d : e, "mousemove", o) : o();
    a.events.remove(e, "load", r)
    }
    this.flakesMax = 128;
    this.flakesMaxActive = 120;
    this.animationInterval = 40;
    this.excludeMobile = true;
    this.flakeBottom = null;
    this.followMouse = true;
    this.snowColor = "#ffffff";
    this.snowCharacter = "&bull;";
    this.snowStick = true;
    this.targetElement = null;
    this.useMeltEffect = true;
    this.usePositionFixed = this.useTwinkleEffect = false;
    this.freezeOnBlur = true;
    this.flakeRightOffset = this.flakeLeftOffset = 0;
    this.flakeHeight = this.flakeWidth = 8;
    this.vMaxX = 5;
    this.vMaxY = 4;
    this.zIndex = 0;
    var a = this,
    y = this,
    i = navigator.userAgent.match(/msie/i),
    z = navigator.userAgent.match(/msie 6/i),
    A = navigator.appVersion.match(/windows 98/i),
    s = navigator.userAgent.match(/mobile/i),
    B = i && d.compatMode === "BackCompat",
    t = s || B || z,
    h = null,
    k = null,
    j = null,
    m = null,
    u = null,
    v = null,
    p = 1,
    n = false,
    q;
    a: {
    try {
        d.createElement("div").style.opacity = "0.5"
    } catch (C) {
        q = false;
        break a
    }
    q = true
    }
    var w = false,
    x = d.createDocumentFragment();
    this.timers = [];
    this.flakes = [];
    this.active = this.disabled = false;
    this.meltFrameCount = 20;
    this.meltFrames = [];
    this.events = function() {
    function a(b) {
        var b = f.call(b),
            c = b.length;
        l ? (b[1] = "on" + b[1], c > 3 && b.pop()) : c === 3 && b.push(false);
        return b
    }

    function d(a, c) {
        var e = a.shift(),
            f = [b[c]];
        if (l) e[f](a[0], a[1]);
        else e[f].apply(e, a)
    }
    var l = !e.addEventListener && e.attachEvent,
        f = Array.prototype.slice,
        b = {
            add: l ? "attachEvent" : "addEventListener",
            remove: l ? "detachEvent" : "removeEventListener"
        };
    return {
        add: function() {
            d(a(arguments), "add")
        },
        remove: function() {
            d(a(arguments), "remove")
        }
    }
    }();
    this.randomizeWind = function() {
    var c;
    c = g(a.vMaxX, 0.2);
    u = parseInt(g(2), 10) === 1 ? c * -1 : c;
    v = g(a.vMaxY, 0.2);
    if (this.flakes)
        for (c = 0; c < this.flakes.length; c++) this.flakes[c].active && this.flakes[c].setVelocities()
    };
    this.scrollHandler = function() {
    var c;
    m = a.flakeBottom ? 0 : parseInt(e.scrollY || d.documentElement.scrollTop || d.body.scrollTop,
        10);
    isNaN(m) && (m = 0);
    if (!n && !a.flakeBottom && a.flakes)
        for (c = a.flakes.length; c--;) a.flakes[c].active === 0 && a.flakes[c].stick()
    };
    this.resizeHandler = function() {
    e.innerWidth || e.innerHeight ? (h = e.innerWidth - (!i ? 16 : 16) - a.flakeRightOffset, j = a
        .flakeBottom ? a.flakeBottom : e.innerHeight) : (h = (d.documentElement.clientWidth || d
            .body.clientWidth || d.body.scrollWidth) - (!i ? 8 : 0) - a.flakeRightOffset, j = a
        .flakeBottom ? a.flakeBottom : d.documentElement.clientHeight || d.body.clientHeight || d
        .body.scrollHeight);
    k = parseInt(h / 2, 10)
    };
    this.resizeHandlerAlt =
    function() {
        h = a.targetElement.offsetLeft + a.targetElement.offsetWidth - a.flakeRightOffset;
        j = a.flakeBottom ? a.flakeBottom : a.targetElement.offsetTop + a.targetElement.offsetHeight;
        k = parseInt(h / 2, 10)
    };
    this.freeze = function() {
    var c;
    if (a.disabled) return false;
    else a.disabled = 1;
    for (c = a.timers.length; c--;) clearInterval(a.timers[c])
    };
    this.resume = function() {
    if (a.disabled) a.disabled = 0;
    else return false;
    a.timerInit()
    };
    this.toggleSnow = function() {
    a.flakes.length ? (a.active = !a.active, a.active ? (a.show(), a.resume()) : (a.stop(),
        a.freeze())) : a.start()
    };
    this.stop = function() {
    var c;
    this.freeze();
    for (c = this.flakes.length; c--;) this.flakes[c].o.style.display = "none";
    a.events.remove(e, "scroll", a.scrollHandler);
    a.events.remove(e, "resize", a.resizeHandler);
    a.freezeOnBlur && (i ? (a.events.remove(d, "focusout", a.freeze), a.events.remove(d, "focusin", a
        .resume)) : (a.events.remove(e, "blur", a.freeze), a.events.remove(e, "focus", a
        .resume)))
    };
    this.show = function() {
    var a;
    for (a = this.flakes.length; a--;) this.flakes[a].o.style.display = "block"
    };
    this.SnowFlake =
    function(a, e, l, f) {
        var b = this;
        this.type = e;
        this.x = l || parseInt(g(h - 20), 10);
        this.y = !isNaN(f) ? f : -g(j) - 12;
        this.vY = this.vX = null;
        this.vAmpTypes = [1, 1.2, 1.4, 1.6, 1.8];
        this.vAmp = this.vAmpTypes[this.type];
        this.melting = false;
        this.meltFrameCount = a.meltFrameCount;
        this.meltFrames = a.meltFrames;
        this.twinkleFrame = this.meltFrame = 0;
        this.active = 1;
        this.fontSize = 10 + this.type / 5 * 10;
        this.o = d.createElement("div");
        this.o.innerHTML = a.snowCharacter;
        this.o.style.color = a.snowColor;
        this.o.style.position = n ? "fixed" : "absolute";
        this.o.style.width =
            a.flakeWidth + "px";
        this.o.style.height = a.flakeHeight + "px";
        this.o.style.fontFamily = "arial,verdana";
        this.o.style.overflow = "hidden";
        this.o.style.fontWeight = "normal";
        this.o.style.zIndex = a.zIndex;
        x.appendChild(this.o);
        this.refresh = function() {
            if (isNaN(b.x) || isNaN(b.y)) return false;
            b.o.style.left = b.x + "px";
            b.o.style.top = b.y + "px"
        };
        this.stick = function() {
            t || a.targetElement !== d.documentElement && a.targetElement !== d.body ? b.o.style.top =
                j + m - a.flakeHeight + "px" : a.flakeBottom ? b.o.style.top = a.flakeBottom + "px" : (b
                    .o.style.display =
                    "none", b.o.style.top = "auto", b.o.style.bottom = "0px", b.o.style.position =
                    "fixed", b.o.style.display = "block")
        };
        this.vCheck = function() {
            if (b.vX >= 0 && b.vX < 0.2) b.vX = 0.2;
            else if (b.vX < 0 && b.vX > -0.2) b.vX = -0.2;
            if (b.vY >= 0 && b.vY < 0.2) b.vY = 0.2
        };
        this.move = function() {
            var d = b.vX * p;
            b.x += d;
            b.y += b.vY * b.vAmp;
            if (b.x >= h || h - b.x < a.flakeWidth) b.x = 0;
            else if (d < 0 && b.x - a.flakeLeftOffset < -a.flakeWidth) b.x = h - a.flakeWidth - 1;
            b.refresh();
            if (j + m - b.y < a.flakeHeight) b.active = 0, a.snowStick ? b.stick() : b.recycle();
            else {
                if (a.useMeltEffect && b.active &&
                    b.type < 3 && !b.melting && Math.random() > 0.998) b.melting = true, b.melt();
                if (a.useTwinkleEffect)
                    if (b.twinkleFrame) b.twinkleFrame--, b.o.style.visibility = b.twinkleFrame && b
                        .twinkleFrame % 2 === 0 ? "hidden" : "visible";
                    else if (Math.random() > 0.9) b.twinkleFrame = parseInt(Math.random() * 20, 10)
            }
        };
        this.animate = function() {
            b.move()
        };
        this.setVelocities = function() {
            b.vX = u + g(a.vMaxX * 0.12, 0.1);
            b.vY = v + g(a.vMaxY * 0.12, 0.1)
        };
        this.setOpacity = function(a, b) {
            if (!q) return false;
            a.style.opacity = b
        };
        this.melt = function() {
            !a.useMeltEffect || !b.melting ?
                b.recycle() : b.meltFrame < b.meltFrameCount ? (b.meltFrame++, b.setOpacity(b.o, b
                        .meltFrames[b.meltFrame]), b.o.style.fontSize = b.fontSize - b.fontSize * (b
                        .meltFrame / b.meltFrameCount) + "px", b.o.style.lineHeight = a.flakeHeight +
                    2 + a.flakeHeight * 0.75 * (b.meltFrame / b.meltFrameCount) + "px") : b.recycle()
        };
        this.recycle = function() {
            b.o.style.display = "none";
            b.o.style.position = n ? "fixed" : "absolute";
            b.o.style.bottom = "auto";
            b.setVelocities();
            b.vCheck();
            b.meltFrame = 0;
            b.melting = false;
            b.setOpacity(b.o, 1);
            b.o.style.padding = "0px";
            b.o.style.margin =
                "0px";
            b.o.style.fontSize = b.fontSize + "px";
            b.o.style.lineHeight = a.flakeHeight + 2 + "px";
            b.o.style.textAlign = "center";
            b.o.style.verticalAlign = "baseline";
            b.x = parseInt(g(h - a.flakeWidth - 20), 10);
            b.y = parseInt(g(j) * -1, 10) - a.flakeHeight;
            b.refresh();
            b.o.style.display = "block";
            b.active = 1
        };
        this.recycle();
        this.refresh()
    };
    this.snow = function() {
    for (var c = 0, d = 0, e = 0, f = null, f = a.flakes.length; f--;) a.flakes[f].active === 1 ? (a
            .flakes[f].move(), c++) : a.flakes[f].active === 0 ? d++ : e++, a.flakes[f].melting && a
        .flakes[f].melt();
    if (c < a.flakesMaxActive &&
        (f = a.flakes[parseInt(g(a.flakes.length), 10)], f.active === 0)) f.melting = true
    };
    this.mouseMove = function(c) {
    if (!a.followMouse) return true;
    c = parseInt(c.clientX, 10);
    c < k ? p = -2 + c / k * 2 : (c -= k, p = c / k * 2)
    };
    this.createSnow = function(c, d) {
    var e;
    for (e = 0; e < c; e++)
        if (a.flakes[a.flakes.length] = new a.SnowFlake(a, parseInt(g(6), 10)), d || e > a
            .flakesMaxActive) a.flakes[a.flakes.length - 1].active = -1;
    y.targetElement.appendChild(x)
    };
    this.timerInit = function() {
    a.timers = !A ? [setInterval(a.snow, a.animationInterval)] : [setInterval(a.snow, a
        .animationInterval *
        3), setInterval(a.snow, a.animationInterval)]
    };
    this.init = function() {
    var c;
    for (c = 0; c < a.meltFrameCount; c++) a.meltFrames.push(1 - c / a.meltFrameCount);
    a.randomizeWind();
    a.createSnow(a.flakesMax);
    a.events.add(e, "resize", a.resizeHandler);
    a.events.add(e, "scroll", a.scrollHandler);
    a.freezeOnBlur && (i ? (a.events.add(d, "focusout", a.freeze), a.events.add(d, "focusin", a
        .resume)) : (a.events.add(e, "blur", a.freeze), a.events.add(e, "focus", a.resume)));
    a.resizeHandler();
    a.scrollHandler();
    a.followMouse && a.events.add(i ? d : e, "mousemove",
        a.mouseMove);
    a.animationInterval = Math.max(20, a.animationInterval);
    a.timerInit()
    };
    this.start = function(c) {
    if (w) {
        if (c) return true
    } else w = true;
    if (typeof a.targetElement === "string" && (c = a.targetElement, a.targetElement = d.getElementById(
            c), !a.targetElement)) throw Error('Snowstorm: Unable to get targetElement "' + c + '"');
    if (!a.targetElement) a.targetElement = !i ? d.documentElement ? d.documentElement : d.body : d
        .body;
    if (a.targetElement !== d.documentElement && a.targetElement !== d.body) a.resizeHandler = a
        .resizeHandlerAlt;
    a.resizeHandler();
    a.usePositionFixed = a.usePositionFixed && !t;
    n = a.usePositionFixed;
    if (h && j && !a.disabled) a.init(), a.active = true
    };
    a.events.add(e, "load", r, false);
    return this
    }(window, document);]] >
</script>

</html>
