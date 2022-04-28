<div class="login-body">
    <div>
        <div class="main-cont">
            <h2>SIGN UP</h2>
            <form action="/register" method="POST">
                <input type="text" placeholder="Username" name="name" class="input-login">
                <input type="text" placeholder="Email" name="email" class="input-login">
                <input type="password" placeholder="Password" name="password" class="input-login">
                <input type="password" placeholder="Confirm Password" name="confirm_password" class="input-login">
                <button type="submit" class="login-btn">Sign In</button>
            </form>
            <?php
                if(isset($validation)){
            ?>
                <?= $validation->listErrors()?>
            <?php    
                }
            ?>
        </div>
        <h4>Already a User? <a href="/">LOG IN</a></h4>
    </div>
</div>