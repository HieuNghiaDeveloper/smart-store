<div id="content">
    <div class="box-head">
        <h1>LOGIN</h1>
    </div>
    <div class="box-body">
        <form method="post">
            <input type="text" name="username" id="username_l" placeholder="Username">
            <?php echo form_error('username') ?>
            <input type="password" name="password" id="password_l" placeholder="Password">
            <?php echo form_error('password') ?>
            <input type="submit" name="btn_login" value="LOGIN">
            <?php echo form_error('account_exist') ?>
        </form>
    </div>
</div>
<style>
    body {
        margin-top: 0;
        position: relative;
        background: whitesmoke;
    }

    #content {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 380px;
        margin: 0 auto;
        background-color: #2c3947;
        display: flex;
        flex-wrap: wrap;
        border-radius: 4px;
        box-shadow: 0 2px 5px 1px rgb(64 60 67 / 35%)
    }

    .box-head {
        flex-basis: 100%;
    }

    .box-head h1 {
        color: #fff;
        text-align: center;
    }

    .box-body {
        flex-basis: 100%;
        padding: 20px;
    }

    .box-body form {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 0;
        padding: 20px;
        justify-content: center;
    }

    .box-body form input {
        flex-basis: 100%;
        padding: 10px;
        border-radius: 3px;
        border: none;
        outline: none;
        margin-bottom: 20px;
        background: whitesmoke;
        text-align: center;
    }

    .box-body form input[type=submit] {
        margin-top: 20px;
        flex-basis: 50%;
        color: #435c84;
        background: whitesmoke;
        box-shadow: 0 2px 5px 1px rgb(64 60 67 / 35%)
    }
    .box-body form input[type=submit]:hover {
        background: beige;
        font-weight: bold;
    }
    p.error{
        text-align: center;
        flex-basis: 100%;
        margin-top: 0;
        font-size: 14px;
        color: #fff;
    }
</style>