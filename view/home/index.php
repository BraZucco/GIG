<header class="ctn-header">
    <h1>Agenda</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#mdl-add-contact">+</button>
</header>
<main class="ctn-main">
    <div class="row" id="lst-contacts"></div>

    <script id="tpl-card" type="text/x-custom-template">
        <div class="ctn-card col-xl-3 col-lg-4 col-md-6 col-sm-12" data-contact-id="{{contact-id}}">
            <div class="card contact-card">
            <div class="card-header">
                <div class="actions">
                    <button class="btn btn-primary btn-edit"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{name}}</h5>
                <ul>
                    <li class="itm-age">
                        <span>Idade</span>
                        {{age}}
                    </li>
                    <li class="itm-phone">
                        <span>Telefone</span>
                        {{phone}}
                    </li>
                    <li class="itm-email">
                        <span>E-mail</span>
                        {{email}}
                    </li>
                </ul>
                
            </div>
        </div>
    </script>
</main>
<div class="modal fade" id="mdl-add-contact">
	<div class="modal-dialog modal-sm" role="document">
		<form id="frm-add-contact" action="/GIG/contacts" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<i class="fa fa-user-circle" aria-hidden="true"></i> Gerenciar Locais</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<fiedset class="row">
						<input type="hidden" name="id" value="">
						<label class="col-12">
							<span>Nome *</span>
							<input type="text" name="nome" data-required="required" />
                        </label>
                        <label class="col-12">
							<span>Idade *</span>
							<input type="text" name="age" data-required="required" />
                        </label>
						<label class="col-12">
							<span>Telefone *</span>
							<input type="text" name="phone" data-required="required" />
                        </label>
                        <label class="col-12">
							<span>E-mail *</span>
							<input type="text" name="email" data-required="required" />
						</label>
					</fieldset>
				</div>
				<div class="modal-footer">
					<div class="col-12 text-right">
						<button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
