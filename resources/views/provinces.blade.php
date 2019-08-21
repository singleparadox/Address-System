@extends('layouts.master')


@section('title', 'Provinces')


@section('content')

    <ul class="collection with-header">
        <li class="collection-header"><h4>Provinces</h4></li>
        @foreach ($provinces as $item)
            <li class="collection-item" provinceId={{$item[0]}}>
                <div class="inline_block_content">
                        <a class="text_size" href='/{{$region_id}}/{{$item[0]}}'> {{$item[1]}} </a>
                </div>
                <div class="inline_block_e_d">
                        <a class="waves-effect waves-light btn btn-small" href='/{{$region_id}}/{{$item[0]}}/edit_province/{{$item[1]}}'><i class="material-icons">edit</i></a>
                        <button class="waves-effect waves-light btn red btn-small" id='deleteButton' value='{{$item[0]}}'><i class="material-icons">delete</i></button>
                </div>
            </li>
        @endforeach

        @empty($provinces)
            <p>No Provinces Found</p>
        @endempty

    </ul>
    <a href="/{{$region_id}}/create_province" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">add</i></a>
    <a href="/" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">chevron_left</i></a>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('button').click(function (e) {
            e.preventDefault();

            var clicked_button_value = $(this).val();


            $.ajax({
                type: "post",
                url: "/delete_province",
                data: {'value' : clicked_button_value},
                dataType: "text",
                success: function (response) {
                    if (response == 'success') {
                        $('li[provinceId='+clicked_button_value+']').remove();
                        console.log('success');
                    } else if (response == 'has_children') {
                        alert('Cannot delete an item that has children...');
                        console.log('has_children');
                    } else {
                        console.log('fail');
                    }
                }
            });



        });;
    </script>
@endsection


