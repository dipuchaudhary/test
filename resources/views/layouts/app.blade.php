<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TESTAPP') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
    <div class="app">
        @include('inc.navbar')
        <div class="container">
            <br>
{{--            @include('inc.message')--}}
                @yield('content')
        </div>
    </div>
@include('addmodel')
</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--form script-->
<script type="text/javascript">
    $(document).ready(function () {
        var add_button = $(".add_button");
        var phone_field = $(".phone_field");
        var x =1;
        var max_fields =10;
        var fieldHTML = '<div><input type="text" class="form-control" name="phone[]" placeholder="phone"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle"></i></a></div>';

        $(add_button).click( function () {
            if(x< max_fields) {
                x++;
                $(phone_field).append(fieldHTML);
            }
        });

        $(phone_field).on("click",".remove_button", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });

    });
</script>
<!-- menu script-->
<script type="text/javascript">
    $(document).ready(function () {
        var add_menu = $(".add_menu");
        var add_sub_menu = $(".add_sub_menu");
        var menu = $(".menu");
        var sub_menu = $(".sub_menu");
        var y =1;
        var x=1;

        $(add_menu).click(function () {
            y++;
            $(menu).append('<li><input type="text" class="form-control" name="menu" placeholder="Add menu"><a href="javascript:void(0);" class="remove_menu"><i class="fa fa-minus-circle"></i></a><a href="javascript:void (0);" title="add sub menu" class="add_sub_sub_menu"> <i class="fa fa-plus-circle"></i></a></li>');

            var add_sub_sub_menu = $(".add_sub_sub_menu");
            var z =1;
            $(add_sub_sub_menu).click(function () {
                $(sub_menu).append('<ol><li><input type="text" class="form-control" name="sub_menu[]" placeholder="add sub menu"><a href="javascript:void(0);" class="remove_sub_menu"><i class="fa fa-minus-circle"></i></a></li></ol>');
            })
        });

        $(menu).on("click",".remove_menu",function (e) {
            e.preventDefault();
            $(this).parent('li').remove();
            y--;

        });

        $(add_sub_menu).click(function ()
        {
            x++;
            $(sub_menu).append('<li><ol><input type="text" class="form-control" name="sub_menu[]" placeholder="Add sub menu"><a href="javascript:void(0);" class="remove_sub_menu"><i class="fa fa-minus-circle"></i></a></ol></li>');
        });

        $(sub_menu).on("click",".remove_sub_menu", function (e) {
            e.preventDefault();
            $(this).parent('li').remove();
            x--;

        });

        $()
    });
</script>


<!--form model-->
<script>
    $(document).ready(function(){

        $('#add_btn').click(function () {
            $('#form-heading').html("Add new User");
            $('#user_form').trigger("reset");
            $('#btn-save').val('create user');
            $('#form-modal').modal('show');

        });

        //delete
        $('body').on('click','.delete-btn',function () {
            var user_id = $(this).data("id");
            confirm('Are you sure want to delete!');

            $.ajax({
                type:"DELETE",
                url:"{{ url('form')}}"+'/'+user_id+'/delete',
                data: { _token: $('input[name="_token"][type="hidden"]').val() },
                success: function (data) {
                    console.log(data.id);
                    $("#user_id"+data.id).remove();
                },
                error: function (data) {
                    alert('Error:', data);
                }
            });
            $('#form-modal').trigger("reset");
        });

        //edit
        $('body').on('click','#edit-btn',function () {
            var user_id = $(this).data('id');
             $.get('form'+'/'+user_id+'/edit', function (data) {
                $('#form-modal').modal('show');
                $('#form-heading').html('Edit User');
                $('#user_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#address').val(data.address);
                $('#phone').val(data.phone);
            })
            $('#form-modal').trigger("reset");
        });

        //save
        $('#btn-save').click(function (e) {
            e.preventDefault();
            $( '#error-name' ).html( "" );
            $( '#email-error' ).html( "" );
            $( '#address-error' ).html( "" );
            $( '#phone-error').html( "");
            $.ajax({
                data:$('#user_form').serialize(),
                type:"POST",
                url:"{{route('form.store')}}",
                success:function (data) {
                    console.log(data);
                        $("#user-list").append("<tr id='user_id" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td>" +
                            "<td>"+data.email+"</td>"+
                            "<td>"+data.address+"</td>"+
                            "<td>"+data.phone+"</td>"+
                           "<td><a href='javascript:void(0);' class='btn btn-info' id='edit-btn' data-id='" + data.id + "'><i class='fa fa-edit'></i></a>" +
                           "<a href='javascript:void(0);' class='btn btn-danger delete-btn' id='delete-btn' data-id='" + data.id + "'><i class='fa fa-trash'></i></a>" +
                            "</td></tr>");
                    alert("data saved successfully!");
                    $('#ack').html('Data saved successfully!');
                    $('#user_form').trigger("reset");
                    $('#form-modal').modal('hide',2000);

                },
                error: function (data) {
                      data = data.responseJSON;
                       console.log(data);
                       alert('Error:',data);
                       //var phone = data.phone ? data.phone : '&nbsp';
                        if(data.name) {
                            $('#error-name').html(data.name[0]);
                        }
                        if(data.email){
                            $('#error-email').html(data.email[0]);
                        }
                        if(data.address){
                            $('#error-address').html(data.address[0]);
                        }
                        if(data.phone){
                            $('#error-phone').html(data.phone[0]);
                        }
                    $('#form-modal').modal('show');
                    $(document).on('hidden.bs.modal','#form-modal', function () {
                       $('#user_form')[0].reset();
                        $('#error-name').remove();
                        $('#error-email').remove();
                        $('#error-address').remove();
                        $('#error-phone').remove();

                    });
                }

            });
            $('#user_form').trigger("reset");

        });
    });

</script>

</html>
