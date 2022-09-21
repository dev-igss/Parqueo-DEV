<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{url('static/imagenes/Isotipo.png')}}" class="img-fluid">
        </div>

        <div class="user">
            <span class="subtitle">Bienvenido: {{ Auth::user()->name }} {{ Auth::user()->lastname }}</span> <br>
            <span class="subtitle">IBM: {{ Auth::user()->ibm }} </span>
            <div class="salir">
                Salir
                <a href="{{url('/logout')}}" data-toogle="tooltrip" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="main">
        <ul>

            @if(kvfj(Auth::user()->permissions, 'dashboard'))
                <li>
                    <a href="{{ url('/admin') }}" class="lk-dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'park_list'))
                <li>
                    <a href="{{ url('/admin/asignaciones') }}" class="lk-park_add lk-park_list lk-park_edit "><i class="fa-solid fa-square-parking"></i> Parqueos</a>
                </li>
            @endif

            
            @if(kvfj(Auth::user()->permissions, 'user_list'))
                <li>
                    <a href="{{ url('/admin/usuarios') }}" class="lk-user_add lk-user_list lk-user_edit lk-user_permissions lk-user_requests_out lk-user_assignments"><i class="fas fa-user-lock"></i> Usuarios</a>
                </li>
            @endif

            @if(kvfj(Auth::user()->permissions, 'user_info'))
                <li>
                    <a href="{{ url('/admin/usuario/cuenta/informacion') }}" class="lk-user_add lk-user_list lk-user_edit lk-user_permissions lk-user_assignments lk-user_info lk-user_change_password"><i class="fas fa-id-card"></i> Información de Cuenta</a>
                </li>
            @endif
        </ul>
    </div>

</div>
