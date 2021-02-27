<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('peserta.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Data Member</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('trik.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Tips &amp; Trick</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('materi.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Materi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('soal_latihan.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Soal Latihan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('jadwal.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Jadwal Ujian</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('verif.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Verifikasi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" onclick="var f=()=>{$('#logout-form').submit()};f();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Log out</p>
            </a>
        </li>
    </ul>
</nav>