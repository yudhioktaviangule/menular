<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('materi.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Materi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('soal.index')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Soal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" onclick="var f=()=>{$('#logout-form').submit()};f();" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Log out</p>
            </a>
        </li>
    </ul>
</nav>