@extends('layouts.master')


@section('title', 'Create Barangay')


@section('content')

    <div>
        <h4>Create Barangay</h5>
        <label for="create_barangay">Create Barangay</label>
        <input id='muniId' hidden name="muni_id" type="int" value="{{$muni_id}}">
        <input id='barangayName' name="create_barangay" type="text">

        <div class="back_div">
                <a href="/{{$region_id}}/{{$prov_id}}/{{$muni_id}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>
        </div>
        <div class="submit_div">
                <button class="waves-effect waves-light btn btn-small" id="createButton">Create Barangay</button>
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

            var barangay_name = $('#barangayName').val();
            var muni_id = $('#muniId').val();

            $.ajax({
                type: "post",
                url: "/sendAndCreateBarangay",
                data: {'value' : barangay_name, 'muni_id': muni_id},
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


