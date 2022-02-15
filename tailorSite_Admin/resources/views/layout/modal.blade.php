<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="shared_modal" tabindex="-1" role="dialog" aria-labelledby="shared_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content {{$modal_class}}">
      <div class="modal-header">
        <h5 class="modal-title" id="shared_modalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p class="_msg"></p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
        <form method="post" >
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-outline-light" >Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
