<!DOCTYPE html>
<html>
<head>
    @include('users/include/header')
</head>
<body>
    <div class='container'>
        <form method='post' action='insert' enctype='multipart/form-data'>
            {{ csrf_field() }}
            <legend>Add User</legend>
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class='alert alert-danger'>
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class='form-group'>
                <label class='col-lg-2 control-label'>
                    Full Name :
                </label>
                <div class='col-lg 10'>
                    <input type='text' class='form-control' name='fullname' value='<?php if(isset($users)) echo $users->fullname; ?>' ></input>
                </div><!--col-lg 10-->
            </div><!--form-group-->
            <div class='form-group'>
                <label class='col-lg-2 control-label'>
                    Email :
                </label>
                <div class='col-lg 10'>
                    <input type='email' class='form-control' name='email' value='<?php if(isset($users)) echo $users->email; ?>'></input>
                </div><!--col-lg 10-->
            </div><!--form-group-->
            <div class='form-group'>
                <label class='col-lg-2 control-label'>
                    Picture :
                </label>
                <div class='col-lg 10'>
                    <input type='file' name='picture'></input>
                    <?php if(isset($users)){ echo "<img src='/image/$users->picture' width='200' height='240'></img>"; } ?>
                </div><!--col-lg 10-->
            </div><!--form-group-->
            <div class='form-group'>
                <label class='col-lg-2 control-label'>
                    Date Of Birth :
                </label>
                <div class='col-sm 10'>
                    <input type='date' class='form-control' name='dob' value='<?php if(isset($users)) echo $users->dob; ?>'></input>
                </div><!--col-lg 10-->
            </div><!--form-group-->
            <div class='form-group'>
                <label class='col-lg-2 control-label'>
                    Gender :
                </label>
                <div class='col-lg 10'>
                    <fieldset>
                        <div class='form-check'>
                            <label class='form-check-label'>
                                <input class='form-check-input' type='radio' name='gender' value='M' <?php if(isset($users) && $users->gender == 'M') echo 'checked'; ?>> Male </input>
                            </label>
                        </div><!-- .form-check -->
                        <div class='form-check'>
                            <label class='form-check-label'>
                                <input class='form-check-input' type='radio' name='gender' value='F' <?php if(isset($users) && $users->gender == 'F') echo 'checked'; ?>> Female </input>
                            </label>
                        </div><!-- .form-check -->
                    </fieldset>
                </div><!--col-lg 10-->
            </div><!--form-group-->
            <div class='form-group'>
                <label class='col-lg-2 control-label'>
                    Standard :
                </label>
                <div class='col-lg 10'>
                    <input type='text' class='form-control' name='standard' value='<?php if(isset($users)) echo $users->standard; ?>'></input>
                </div><!--col-lg 10-->
            </div><!--form-group-->
            <div class='form-group'>
                <button type="submit" class='btn btn-info'>
                    Submit
                </button>
            </div>
        </form>
    </div><!--container-->
</body>
</html>
