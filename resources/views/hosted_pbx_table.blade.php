@extends('layouts.base')

@section('content')

    <div class="text-center my-3">
        <h1>Hosted PBX Table</h1>


        <div class="d-flex align-items-center justify-content-center">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Host</th>
                    <th class="text-center">YMP</th>
                    <th class="text-center">PBX</th>
                    <th class="text-center">Sync</th>
                    <th class="text-center">Licenced</th>
                    <th class="text-center">Provisioned</th>
                    <th class="text-center">In Use</th>
                    <th class="text-center">Matched</th>
                    <th class="text-center">Modified</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <x-modal/>

    <script type="text/javascript" src="{{ mix('resources/js/app.js') }}"></script>



@endsection
