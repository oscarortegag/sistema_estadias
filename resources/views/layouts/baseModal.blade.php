@yield('modalcss')
<div class="modal-header" id="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="modal-title">@yield('modalTitle')</h4>
</div>
<div class="modal-body" id="modal-body">
	@yield('modalBody')
</div>
<div class="modal-footer" id="modal-footer">
	@yield('modalFooter')
</div>

@yield('modalScripts')
