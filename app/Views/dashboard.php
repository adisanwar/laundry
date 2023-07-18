<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h2 class="m-0 font-weight-bold text-primary">Cuci Kuy</h2>
    </div>
    <div class="card-body">
    
      The styling for this basic card example is created by using default Bootstrap
      utility classes. By using utility classes, the style of the card component can be
      easily modified with no need for any custom CSS!
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cuciModal"
      data-bs-whatever="@getbootstrap">Cuci Kuy!</button>
  </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="cuciModal" tabindex="1" aria-labelledby="cuciModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cuciModalLabel">Masukan Detail Cucianmu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nama">Masukan Nama</label><input class="form-control"
              id="nama" type="email" placeholder="Masukan Nama">
          </div>
          <div class="mb-3">
            <label for="no_hp">Masukan No Hp</label><input class="form-control"
              id="no_hp" type="email" placeholder="Masukan No HP">
          </div>
          <div class="mb-3"><label for="alamat">Alamat</label><textarea class="form-control"
              id="alamat" rows="3"></textarea></div>
      
      <div class="mb-3">
        <label for="exampleFormControlInput1">Masukan No Hp</label><input class="form-control"
          id="exampleFormControlInput1" type="email" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1">Jenis</label><input class="form-control" id="exampleFormControlInput1"
          type="email" placeholder="Masukan Jenis Pakaian Yang Akan dilaundry">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control"
          id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Cuci Pakaian</button>
      </div>
    </div>
  </div>
</div>

</div>

<?= $this->endSection() ?>