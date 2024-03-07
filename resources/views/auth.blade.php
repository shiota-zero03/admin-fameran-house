<!DOCTYPE html>
<html lang="en">
<head>
    @include('theme.meta')
    <title>Fameran House - Login</title>
</head>

<body class="bg-theme bg-theme2">
    <div id="wrapper">
        <div class="mt-5 pt-5">
            <div class="card card-authentication1 mx-auto my-5">
                <div class="card-body">
                    <div class="card-content p-2">
                        <div class="text-center">
                            <img src="assets/images/logo.png" alt="logo icon" width="100">
                        </div>
                        <div class="card-title text-uppercase text-center py-3">Sign In</div>
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <div class="position-relative has-icon-right">
                                    <input name="email" type="text" id="email" class="form-control input-shadow" placeholder="Enter Email">
                                    <div class="form-control-position">
                                        <i class="icon-envelope"></i>
                                    </div>
                                </div>
                                @error('email')
                                    <small class="mr-2"><i class="icon-info text-danger"></i></small><small><em class="text-white">{{ $message }}</em></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <div class="position-relative has-icon-right">
                                    <input name="password" type="password" id="password" class="form-control input-shadow" placeholder="Enter Password">
                                    <div class="form-control-position">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <small class="mr-2"><i class="icon-info text-danger"></i></small><small><em class="text-white">{{ $message }}</em></small>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <div class="icheck-material-white">
                                        <input type="checkbox" id="remember" name="remember" />
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light btn-block">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('theme.script')

</body>
</html>
