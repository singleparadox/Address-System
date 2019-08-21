@extends('layouts.master')


@section('title', 'Edit Barangay')


@section('content')

    <div>
        <h4>Edit Barangay</h4>
        <label for="edit_barangay">Edit Barangay</label>
        <input id='barangayName' name="edit_barangay" type="text" value="{{$old_name}}">

        <div class="back_div">
                <a href="/{{$region_id}}/{{$prov_id}}/{{$muni_id}}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>
        </div>
        <div class="submit_div">
                <button class="waves-effect waves-light btn btn-small" id="createButton">Edit Barangay</button>
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
            var barangay_id = {{$barangay_id}};

            $.ajax({
                type: "post",
                url: "/sendAndEditBarangay",
                data: {'value' : barangay_name, 'barangay_id': barangay_id},
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


