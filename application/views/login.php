
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row login_box">
        <div class="col-md-12 col-xs-12" align="center">
            <div class="line"><h3 id="time"></h3></div>
            <hr>
            <h1>Ola visitante</h1>
            <span>Seja bem vindo</span><br><br>
        </div>
        
        <div class="col-md-12 col-xs-12 login_control">
                
                <?php echo form_open('login/validate'); ?>
                <div class="control">
                    <div class="label">E-mail</div>
                   <?php echo form_input('email', $email, 'class=form-control'); ?>
                </div>
                
                <div class="control">
                     <div class="label">Senha</div>
                    <?php echo form_password('senha', $senha, 'class=form-control'); ?>
                </div>
                <div align="center">
                <?php echo form_submit('login', 'Login', 'class="btn btn-orange"'); ?>
                     
                </div>
                  <?php echo form_close(); ?>
                
        </div>
        
        
            
    </div>
</div>

<script>
    var currentdate = new Date(); 
                var datetime =  currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
                
                $("#time").html(datetime);
    
</script>