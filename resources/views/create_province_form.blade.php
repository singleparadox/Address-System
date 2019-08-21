@extends('layouts.master')


@section('title', 'Create Province')


@section('content')

    <div>
        <h4>Create Province</h5>
        <label for="create_prov">Create Province</label>
        <input id='regId' hidden name="reg_id" type="int" value="{{$region_id}}">
        <input id='provName' name="create_prov" type="text">

        <div class="back_div">
                <a href="/{{$region_id}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>
        </div>
        <div class="submit_div">
                <button class="waves-effect waves-light btn btn-small" id="createButton">Create Province</button>
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

            var prov_name = $('#provName').val();
            var reg_id = $('#regId').val();

            $.ajax({
                type: "post",
                url: "/sendAndCreateProvince",
                data: {'value' : prov_name, 'reg_id': reg_id},
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


