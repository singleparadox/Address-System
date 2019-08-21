@extends('layouts.master')


@section('title', 'Edit Province')


@section('content')

    <div>
        <h4>Edit Province</h4>
        <label for="create_province">Edit Province</label>
        <input id='provinceName' name="create_province" type="text" value="{{$old_name}}">

        <div class="back_div">
                <a href="/{{$region_id}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>
        </div>
        <div class="submit_div">
                <button class="waves-effect waves-light btn btn-small" id="createButton">Edit Province</button>
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

            var prov_name = $('#provinceName').val();
            var prov_id = {{$prov_id}};

            $.ajax({
                type: "post",
                url: "/sendAndEditProvince",
                data: {'value' : prov_name, 'prov_id': prov_id},
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


