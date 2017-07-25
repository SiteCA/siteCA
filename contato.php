<?php include 'header.php'; ?>
	<section id="home" class="home">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-sm" style="color: black;">
				<!--FAZ SUAS PARADAS DAQUI PRA BAIXO :)-->
				<div class="container"> <div class="row">
         <div class="col-md-6 col-md-offset-3">
            
            
            <div class="well text-center">
               <p><small>Os campos marcados com um asterisco (*) são obrigatórios</small></p>
               <form action="" method="post">
                  <input type='hidden'/>
                  <div class="form-group">
                     <input class="form-control" id="id_nome" maxlength="100" name="nome" placeholder="Seu nome *" type="text" />
                        
                  </div>
                  
                  <div class="form-group">
                     <input class="form-control" id="id_email" name="email" placeholder="Seu e-mail" type="email" />
                     
                  </div>
                  
                  <div class="form-group">
                     <input class="form-control" id="id_assunto" maxlength="100" name="assunto" placeholder="Assunto *" type="text" />
                     
                  </div>
                  
                  <div class="form-group">
                     <textarea class="form-control" cols="40" id="id_mensagem" name="mensagem" placeholder="Mensagem *" rows="10">
</textarea>
                     
                  </div>
                  
                  <button type="submit" class="btn btn-default">Enviar</button>
               </form>
            
            </div>
         </div>
         
         
      </div>
</div>
			</div>
		</div>
		
	</div>
	</section>


<?php include 'footer.php'; ?>