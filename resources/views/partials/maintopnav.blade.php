<!-- BEGIN LAYOUTS/PARTIALS/MAINTOPNAV -->

<dd>
    <nav role="navigation">
        <ul>
            <li>
                <a href="#" id="topMenu">
                    {{ strtolower(Auth::user()->name) }} <!--span class="smallTriangle">&#9660;</span-->
                </a>
                <div id="maintopnavDiv">
                    <ul>
                        <li>
                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/main') }}">settings</a>
                        </li>
                        <li>
                            &nbsp;
                        </li>
                        <li>
                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/main') }}">tasks</a>
                        </li>
                        <li>
                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/people') }}">people</a>
                        </li>
                        <li>
                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/projects') }}">projects</a>
                        </li>
                        <li>
                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/company') }}">groups</a>
                        </li>
                        <li>
                            <a href="{{ url('/u/'.App\Util::idPad(Auth::id()).'/p/main') }}">billing</a>
                        </li>
                        <li>
                            &nbsp;
                        </li>
                        <li><a id="logoutClick" href="#">logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</dd>
<!-- END LAYOUTS/PARTIALS/MAINTOPNAV -->