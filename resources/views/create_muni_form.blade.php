@extends('layouts.master')


@section('title', 'Create Municipality')


@section('content')

    <div>
        <h4>Create Municipality</h5>
        <label for="create_prov">Create Municipality</label>
        <input id='provId' hidden name="prov_id" type="int" value="{{$prov_id}}">
        <input id='muniName' name="create_muni" type="text">

        <div class="back_div">
                <a href="/{{$region_id}}/{{$prov_id}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>
        </div>
        <div class="submit_div">
                <button class="waves-effect waves-light btn btn-small" id="createButton">Create Municipality</button>
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

            var muni_name = $('#muniName').val();
            var prov_id = $('#provId').val();

            $.ajax({
                type: "post",
                url: "/sendAndCreateMunicipality",
                data: {'value' : muni_name, 'prov_id': prov_id},
                dataType: "text",
                success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        alert('Success');
                    }
                }
            });

        });;

    </script>

@endsection


