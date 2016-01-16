<!-- BEGIN U/P/TASKLIST -->
@extends('layouts.app')

@section('content')

    <div class="Container">

        <div class="Grid Grid--guttersLg Grid--full med-Grid--fit">
            <div class="Grid-cell">
                <div id="twcontent">

                </div>
            </div>
        </div>
    </div>

    <script>
        try {
            if (mkgnaoNs.tw_task_list) {
                twAddJson(mkgnaoNs.tw_task_list, "twcontent");
            } else {

            }
            //twAdd(window.tw_project_all);
        } catch (e) {
            console.log(e);
            if (window.tw_errors) {
                console.log(window.tw_errors);
            }
        }
    </script>

@endsection
<!-- END U/P/TASKLIST -->