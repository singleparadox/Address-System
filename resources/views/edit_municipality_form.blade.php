@extends('layouts.master')


@section('title', 'Edit Municipality')


@section('content')

    <div>
        <h4>Edit Municipality</h4>
        <label for="edit_municipality">Edit Municipality</label>
        <input id='municipalityName' name="edit_municipality" type="text" value="{{$old_name}}">

        <div class="back_div">
                <a href="/{{$region_id}}/{{$prov_id}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>
        </div>
        <div class="submit_div">
                <button class="waves-effect waves-light btn btn-small" id="createButton">Edit Municipality</button>
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

            var municipality_name = $('#municipalityName').val();
            var municipality_id = {{$muni_id}};

            $.ajax({
                type: "post",
                url: "/sendAndEditMunicipality",
                data: {'value' : municipality_name, 'muni_id': municipality_id},
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


