@extends('layouts.master')


@section('title', 'Edit Region')


@section('content')

    <div>
        <h4>Edit Region</h4>
        <label for="create_region">Edit Region</label>
        <input id='regionName' name="create_region" type="text" value="{{$old_name}}">

        <div class="back_div">
                <a href="/" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>
        </div>
        <div class="submit_div">
                <button class="waves-effect waves-light btn btn-small" id="createButton">Edit Region</button>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#createButton').click(function (e) {
            e.preventDefault();

            var region_name = $('#regionName').val();
            var region_id = {{$region_id}};

            $.ajax({
                type: "post",
                url: "/sendAndEditRegion",
                data: {'value' : region_name, 'reg_id': region_id},
                dataType: "text",
                success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        alert("Success");
                    }
                }
            });

        });;

    </script>

@endsection


