<!-- Modal -->
<div class="modal fade" tabindex="-1" id="form-modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-heading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (count($errors)>0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endif
            <div class="modal-body">
                <form action="{{route('form.store')}}" method="post" id="user_form">
                    <input type="hidden" name="id" id="user-id">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
                        <div class="text-danger">
                            <small class="form-text" id="error-name"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                        <div class="text-danger">
                            <small class="form-text" id="error-email"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{old('address')}}">
                        <div class="text-danger">
                            <small class="form-text" id="error-address"></small>
                        </div>

                    </div>
                    <div class="form-group phone_field">
                        <label>Phone</label>
                        <input type="number" name="phone[]" class="form-control" id="phone"  placeholder="phone" value="{{old('phone[]')}}"><a href="javascript:void (0);" class="add_button"><i class="fa fa-plus-circle"></i></a>
                        <div class="text-danger">
                            <small class="form-text" id="error-phone"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-save" value="create">Save</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
