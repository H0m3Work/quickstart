{{-- Modal Create Link --}}
{{-- <div class="modal fade" id="createLink"> --}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >New link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label class="col-form-label">Url:</label>
            <input type="text" class="form-control" name="url" placeholder="Url" readonly>
          </div>
          <div class="form-group">
            <label class="col-form-label">Description:</label>
            <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
{{-- </div> --}}
<script>
  $('input[name=title]').on('change', function () {
    let title = $(this).val();
    
  })
</script>
